<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Providers\RouteServiceProvider;

class SocialLoginController extends Controller
{
    public function redirectToProvider(Request $request, $provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback(Request $request, $provider)
    {
        try {
            if ($provider == 'twitter') {
                $user = Socialite::driver('twitter')->user();
            } else {
                $user = Socialite::driver($provider)->stateless()->user();
            }
        } catch (\Exception $e) {
            return redirect()->route('login')->with('success', translate('Something Went wrong. Please try again'));
        }
  
        $existingUserByProviderId = User::where('provider_id', $user->id)->where('role', 1)->first();
        $users = User::where('role', 1)->orderBy('id', 'desc')->pluck('custom_id')->first();
        if ($users) {
            $numbers = substr($users, 2);
            $customer_id = 'C' . str_pad(($numbers +  1), 4, '0', STR_PAD_LEFT);
            $custom_id = $customer_id;
        } else {
            $custom_id = 'C0001';
        }
        if ($existingUserByProviderId) {
            $existingUserByProviderId->access_token = $user->token;
            $existingUserByProviderId->save();

            auth()->login($existingUserByProviderId, true);
        } else {
            //check if email exist
            $existingUser = User::where('email', $user->email)->where('role', 1)->first();

            if ($existingUser) {
                //update provider_id
                $existing_User = $existingUser;
                $existing_User->provider_id = $user->id;
                $existing_User->provider = $provider;
                $existing_User->access_token = $user->token;
                $existing_User->save();

                //proceed to login
                auth()->login($existing_User, true);
            } else {
                $existingUserOthers = User::where('email', $user->email)->where('role', '<>', 1)->first();
                if ($existingUserOthers) {
                    return redirect()->back()->with('error', translate('Email Exists another role. please try another!'));
                }
                //create a new user
                $newUser = new User;
                $newUser->fname = $user->name;
                $newUser->username = $user->name;
                $newUser->email = $user->email;
                $newUser->email_verified_at = date('Y-m-d Hms');
                $newUser->provider_id = $user->id;
                $newUser->provider = $provider;
                $newUser->access_token = $user->token;
                $newUser->role = 1;
                $newUser->custom_id = $custom_id;
                $newUser->save();
                //proceed to login
                auth()->login($newUser, true);
            }
        }

        return redirect()->route('customer.dashboard')->with('success', translate('Social Login Successfully'));
    }
}
