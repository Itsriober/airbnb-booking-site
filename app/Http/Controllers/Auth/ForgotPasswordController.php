<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Mail; 
use Hash;
use Illuminate\Support\Str;
use DB;

class ForgotPasswordController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */
    

       public function showLinkRequestForm(){

        $templateId=get_setting('theme_id') ?? 1;
        $title = translate('Password Reset');
        return view('frontend.template-'.$templateId.'.auth.passwords.email',compact('title'));
       }

       public function sendResetLinkEmail(Request $request){
   
            $request->validate([
                'email' => 'required|email|exists:users',
            ]);

            $token = Str::random(64);

            DB::table('password_resets')->insert([
                'email' => $request->email, 
                'token' => $token, 
            ]);

            email_send('forgot_password', $request->email, $token);

        return back()->with('success', translate('We have emailed your password reset link'));
    
        }
    
}
