<?php

use Carbon\Carbon;
use App\Models\Tour;
use App\Models\Hotel;
use App\Models\Activities;
use App\Models\Transport;
use App\Models\Blog;
use App\Models\User;
use App\Models\Store;
use App\Models\Setting;
use App\Models\Currency;
use App\Models\Visa;
use App\Models\Translation;
use Illuminate\Support\Str;
use App\Models\EmailTemplate;
use App\Models\PaymentMethod;
use App\Models\ProductReview;
use App\Models\WidgetContent;
use App\Models\PurchaseVerify;
use App\Models\Destination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Models\MenuItem;
use App\Models\Location;
use App\Models\VisaCategory;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\App;
use App\Models\Product;
use App\Models\Order;

//highlights the selected navigation on frontend
if (!function_exists('default_language')) {
    function default_language()
    {
        return get_setting('DEFAULT_LANGUAGE', 'en');
    }
}

if (!function_exists('static_asset')) {
    /**
     * Generate an asset path for the application.
     *
     * @param  string  $path
     * @param  bool|null  $secure
     * @return string
     */
    function static_asset($path, $secure = null)
    {
        return app('url')->asset('public/' . $path, $secure);
    }
}

/**
 * translate
 *
 * @param  mixed $key
 * @param  mixed $lang
 * @param  mixed $addslashes
 * @return Response
 */


if (!function_exists('translate')) {

    function translate($key, $lang = null, $addslashes = false)
    {
        if (alreadyInstalled() !== false) {
            if ($lang == null) {
                $lang = App::getLocale();
            }

            $lang_key = preg_replace('/[^A-Za-z0-9\_]/', '', str_replace(' ', '_', strtolower($key)));

            $translations_default = Cache::rememberForever('translations-' . get_setting('DEFAULT_LANGUAGE', 'en'), function () {
                return Translation::where('lang', get_setting('DEFAULT_LANGUAGE', 'en'))->pluck('lang_value', 'lang_key')->toArray();
            });

            if (!isset($translations_default[$lang_key])) {
                $translation_def = new Translation;
                $translation_def->lang = get_setting('DEFAULT_LANGUAGE', 'en');
                $translation_def->lang_key = $lang_key;
                $translation_def->lang_value = $key;
                $translation_def->save();
                Cache::forget('translations-' . get_setting('DEFAULT_LANGUAGE', 'en'));
            }

            $translation_locale = Cache::rememberForever('translations-' . $lang, function () use ($lang) {
                return Translation::where('lang', $lang)->pluck('lang_value', 'lang_key')->toArray();
            });

            //Check for session lang
            if (isset($translation_locale[$lang_key])) {
                return $addslashes ? addslashes($translation_locale[$lang_key]) : $translation_locale[$lang_key];
            } elseif (isset($translations_default[$lang_key])) {
                return $translations_default[$lang_key];
            } else {
                return $key;
            }
        }
    }
}



/**
 * Generate a setting path for the application.
 */
if (!function_exists('get_setting')) {
    function get_setting($key, $default = null)
    {
        if (alreadyInstalled() !== false) {
            $setting = Setting::where('type', $key)->first();
            return $setting == null ? $default : $setting->value;
        }

        return null;
    }
}

/**
 * send to a email for the application.
 */
if (!function_exists('email_send')) {
    function email_send($template, $emailTo = null, $token = null)
    {
        $templates = EmailTemplate::where('slug', $template)->first();
        if ($templates) {
            $user = Auth::user() ?? User::where('email', $emailTo)->first();
            $subject = $templates->subject;
            $body = $templates->body;
            $emailToName = $user->fname ? $user->fname . ' ' . $user->lname : $user->username;

            $shortcodes['company_name'] = get_setting('company_name') ?? 'TripRex';
            if ($token) {
                $shortcodes['reset_password_link'] = '<a href="' . url("/password/reset/$token?email=$emailTo") . '" 
            class="eg-btn btn--primary back-btn">Reset Password</a>';
            }
            if ($user->role == 1) {
                $shortcodes['customer_fname'] = $user->fname ?? '';
                $shortcodes['customer_lname'] = $user->lname ?? '';
                $shortcodes['customer_full_name'] = $user->fname ? $user->fname . ' ' . $user->lname : $user->username;
                $shortcodes['customer_username'] = $user->username ?? '';
                $shortcodes['customer_email'] = $user->email ?? '';
                $shortcodes['customer_phone'] = $user->phone ?? '';
                $shortcodes['customer_address'] = $user->address ?? '';
                $shortcodes['customer_country'] = $user->countries->name ?? '';
                $shortcodes['customer_state'] = $user->states->name ?? '';
                $shortcodes['customer_city'] = $user->cities->name ?? '';
                $shortcodes['customer_zip_code'] = $user->zip_code ?? '';
            } else if ($user->role == 2) {
                $shortcodes['merchant_fname'] = $user->fname ?? '';
                $shortcodes['merchant_lname'] = $user->lname ?? '';
                $shortcodes['merchant_full_name'] = $user->fname ? $user->fname . ' ' . $user->lname : $user->username;
                $shortcodes['merchant_username'] = $user->username ?? '';
                $shortcodes['merchant_email'] = $user->email ?? '';
                $shortcodes['merchant_phone'] = $user->phone ?? '';
                $shortcodes['merchant_address'] = $user->address ?? '';
                $shortcodes['merchant_country'] = $user->countries->name ?? '';
                $shortcodes['merchant_state'] = $user->states->name ?? '';
                $shortcodes['merchant_city'] = $user->cities->name ?? '';
                $shortcodes['merchant_zip_code'] = $user->zip_code ?? '';
            }
            foreach ($shortcodes as $key => $parameter) {
                $body = str_replace('[' . $key . ']', $parameter, $body);
            }
            if ($emailTo) {
                try {
                    Mail::send('backend.email_template.email_body', ['body' => $body], function ($message) use ($emailTo, $emailToName, $subject) {
                        $message->to($emailTo, $emailToName);
                        $message->subject($subject);
                        
                    });

                    return 'success';
                } catch (\Throwable $th) {
                    
                }
            } else {
                return redirect()->back()->with('error', translate('User Email not found'));
            }
        } else {
            return redirect()->back()->with('error', translate('Email Template not found'));
        }
    }
}
/**
 * Generate a currency symbol for the application.
 */
if (!function_exists('currency_symbol')) {
    function currency_symbol($currency_id = null)
    {
        $currency = $currency_id ?? get_setting('default_currency');

        if ($currency) {
            $default_currency = Currency::findOrFail($currency);
            $symbol = $default_currency?->symbol;

            return $symbol;
        }

        return false;
    }
}
/**
 * Generate a currncy code for the application.
 */
if (!function_exists('currency_code')) {
    function currency_code($currency_id = null)
    {
        $currency = $currency_id ?? get_setting('default_currency');

        if ($currency) {
            $default_currency = Currency::findOrFail($currency);
            $symbol = $default_currency?->code;

            return $symbol;
        }

        return false;
    }
}

/**
 * get shop for the application.
 */
if (!function_exists('has_shop')) {
    function has_shop($user_id)
    {
        $shop = Store::where('author_id', $user_id)->first();
        return $shop;
    }
}

/**
 * Generate a payment method path for the application.
 */
if (!function_exists('get_payment_method')) {
    function get_payment_method($key)
    {
        $method = explode('_', $key);
        $payment_method = PaymentMethod::where('method_name', $method[0])->first();
        if ($payment_method) {
            if ($method[1] == 'mode') {
                return $payment_method->mode == 2 ? false : true;
            } elseif ($method[1] == 'key') {
                return $payment_method->key;
            } elseif ($method[1] == 'secret') {
                return $payment_method->secret;
            } elseif ($method[1] == 'conversion') {
                return $payment_method->conversion_currency_rate;
            }
        } else {
            return null;
        }
    }
}

/**
 * alreadyInstalled
 *
 * @return response
 */
if (!function_exists('alreadyInstalled')) {

    function alreadyInstalled()
    {
        return file_exists(storage_path('installed'));
    }
}

/**
 * dateFormat
 *
 * @param  mixed  $date
 * @return Response
 */
if (!function_exists('dateFormat')) {
    function dateFormat($date)
    {
        if ($date !== '') {
            $parse = Carbon::parse($date);

            return $parse->format(get_setting('date_format'));
        }

        return false;
    }
}

/**
 * dateFormat
 *
 * @param  mixed  $date
 * @return Response
 */
function calculate_read_time(string $words): int
{
    return (int) ceil(
        Str::wordCount($words) / 260
    );
}
/**
 * paymentMethods
 *
 * @return Response
 */
if (!function_exists('paymentMethods')) {

    function paymentMethods()
    {
        return PaymentMethod::where('status', 1)->get();
    }
}

/** fileExists
 *
 *========= fileExists ==========
 *
 * @return Response
 */
if (!function_exists('fileExists')) {

    function fileExists($folder, $fileName)
    {

        if (!empty($fileName)) {

            $filePath = public_path($folder . '/' . $fileName);

            if (File::exists($filePath)) {
                return true;
            } else {
                return false;
            }
        }

        return false;
    }
}


/**blog post
 *
 *========= blog ==========
 * @return Response
 */

if (!function_exists('news')) {

    function news($limit = null, $perPage = null, $sortedBy = 'DESC')
    {
        $blog = Blog::with('users')->where('status', 1)
            ->orderBy('id', $sortedBy)
            ->select('id', 'title', 'slug', 'image', 'description', 'created_at', 'user_id', 'category_id')
            ->withCount('comments');
        if (isset($limit) || isset($perPage)) {
            return $limit ? $blog->limit($limit)->get() : $blog->paginate($perPage);
        } else {
            return $blog->get();
        }
    }
}

/**Visa
 *
 *========= Visa ==========
 * @return Response
 */

if (!function_exists('visa')) {

    function visa($limit = null, $perPage = null, $sortedBy = 'DESC')
    {
        $visa = Visa::where('status', 1)
            ->orderBy('id', $sortedBy);
        if (isset($limit) || isset($perPage)) {
            return $limit ? $visa->limit($limit)->get() : $visa->paginate($perPage);
        } else {
            return $visa->get();
        }
    }
}


/**Tour Destination
 *
 * @return Response
 */

if (!function_exists('destinations')) {

    function destinations($limit = null, $perPage = null, $sortedBy = 'DESC')
    {
        $destination = Destination::withCount('tours')->where('status', 1)
            //->having('tours_count', '>', 0)
            ->orderBy('id', $sortedBy);
        if (isset($limit) || isset($perPage)) {
            return $limit ? $destination->limit($limit)->get() : $destination->paginate($perPage);
        } else {
            return $destination->get();
        }
    }
}

/**Tour Featured
 *
 * @return Response
 */

 if (!function_exists('tour_featured')) {

    function tour_featured($limit = null, $sortedBy = 'DESC')
    {
        $destination = Tour::where('status', 1)
            ->where('is_featured', 1)
            ->orderBy('id', $sortedBy);
        if (isset($limit)) {
            return $destination->limit($limit)->get();
        } else {
            return $destination->get();
        }
    }
}

/**merchants
 *
 *========= merchants List ==========
 * @return Response
 */

if (!function_exists('merchants')) {

    function merchants($limit = null, $perPage = null, $sortedBy = 'DESC')
    {
        $merchants = User::with('shop')
            ->withCount('activeProducts')
            ->where(['role' => 2,  'status' => 1])
            ->orderBy('id', $sortedBy);
        if (isset($limit) || isset($perPage)) {
            return $limit ? $merchants->limit($limit)->get() : $merchants->paginate(2);
        } else {
            return $merchants->get();
        }
    }
}

/**products
 *
 *========= products List ==========
 * @return Response
 */

if (!function_exists('products')) {

    function products($type, $order, $perPage = null, $limit = null)
    {
        if ($type == 'tour') {
            $products = Tour::where('status', 1)->orderBy('id', $order);
            if (isset($limit) && $limit) {
                return $products->limit($limit)->get();
            } elseif (isset($perPage) && $perPage) {
                return $products->paginate($perPage);
            } else {
                return $products->get();
            }
        } elseif ($type == 'hotel') {
            $products = Hotel::where('status', 1)->orderBy('id', $order);
            if (isset($limit) && $limit) {
                return $products->limit($limit)->get();
            } elseif (isset($perPage) && $perPage) {
                return $products->paginate($perPage);
            } else {
                return $products->get();
            }
        } elseif ($type == 'activities') {
            $products = Activities::where('status', 1)->orderBy('id', $order);
            if (isset($limit) && $limit) {
                return $products->limit($limit)->get();
            } elseif (isset($perPage) && $perPage) {
                return $products->paginate($perPage);
            } else {
                return $products->get();
            }
        } elseif ($type == 'transport') {
            $products = Transport::where('status', 1)->orderBy('id', $order);
            if (isset($limit) && $limit) {
                return $products->limit($limit)->get();
            } elseif (isset($perPage) && $perPage) {
                return $products->paginate($perPage);
            } else {
                return $products->get();
            }
        }
    }
}

/**sidebar products
 *
 *========= products List ==========
 * @return Response
 */

if (!function_exists('sidebarProducts')) {

    function sidebarProducts($type)
    {
        if ($type == 'tour') {
            $products = Tour::where('status', 1)->orderBy('view', 'DESC')->take(5)->get();
        } elseif ($type == 'hotel') {
            $products = Hotel::where('status', 1)->orderBy('view', 'DESC')->take(5)->get();
        } elseif ($type == 'activities') {
            $products = Activities::where('status', 1)->orderBy('view', 'DESC')->take(5)->get();
        } elseif ($type == 'transport') {
            $products = Transport::where('status', 1)->orderBy('view', 'DESC')->take(5)->get();
        }
        return $products;
    }
}

/**Tours
 *
 *========= tours List ==========
 * @return Response
 */

if (!function_exists('tours')) {

    function tours($limit = null, $sortedBy = 'DESC', $perPage = null)
    {
        $tours = Tour::query();
        $tours->where('status', 1)->orderBy('id', $sortedBy);

        if (isset($limit) || isset($perPage)) {
            return $limit ? $tours->limit($limit)->get() : $tours->paginate($perPage);
        } else {
            return $tours->get();
        }
    }
}

/**Hotels
 *
 *========= hotels List ==========
 * @return Response
 */

if (!function_exists('hotels')) {

    function hotels($limit = null, $sortedBy = 'DESC', $perPage = null)
    {
        $hotels = Hotel::query();
        $hotels->where('status', 1)->orderBy('id', $sortedBy);

        if (isset($limit) || isset($perPage)) {
            return $limit ? $hotels->limit($limit)->get() : $hotels->paginate($perPage);
        } else {
            return $hotels->get();
        }
    }
}

/**Activities
 *
 *========= activities List ==========
 * @return Response
 */

if (!function_exists('activities')) {

    function activities($limit = null, $sortedBy = 'DESC', $perPage = null)
    {
        $activities = Activities::query();
        $activities->where('status', 1)->orderBy('id', $sortedBy);

        if (isset($limit) || isset($perPage)) {
            return $limit ? $activities->limit($limit)->get() : $activities->paginate($perPage);
        } else {
            return $activities->get();
        }
    }
}

/**Transports
 *
 *========= transports List ==========
 * @return Response
 */

if (!function_exists('transports')) {

    function transports($limit = null, $sortedBy = 'DESC', $perPage = null)
    {
        $transports = Transport::query();
        $transports->where('status', 1)->orderBy('id', $sortedBy);

        if (isset($limit) || isset($perPage)) {
            return $limit ? $transports->limit($limit)->get() : $transports->paginate($perPage);
        } else {
            return $transports->get();
        }
    }
}

if (!function_exists('filter_destinations')) {

    function filter_destinations()
    {
        $destinations = Destination::withCount('tours')->where('status', 1)->get();

        return $destinations;
    }
}


/**
 * getWidgetContent
 *
 * @param  mixed  $pageId
 * @param  mixed  $widgetName
 * @return Response
 */
if (!function_exists('getWidgetContent')) {

    function getWidgetContent($pageId, $widgetName)
    {
        return WidgetContent::where(['page_id' => $pageId, 'widget_slug' => $widgetName])->first();
    }
}

/**
 * highestPrice
 *
 * @return Response
 */

if (!function_exists('highestPrice')) {

    function highestPrice($type)
    {
        if ($type == 'tour') {
            $amount = Tour::where('status', 1)->max('price');
        } elseif ($type == 'hotel') {
            $amount = Hotel::where('status', 1)->max('price');
        } elseif ($type == 'activities') {
            $amount = Activities::where('status', 1)->max('price');
        } elseif ($type == 'transport') {
            $amount = Transport::where('status', 1)->max('car_price');
        }


        return $amount;
    }
}


/**
 * active_language
 *
 * @return Response
 */

if (!function_exists('active_language')) {

    function active_language()
    {
        $locale = "";
        if (Session::has('locale')) {
            $locale = Session::get('locale');
        } else {
            $locale =  'en';
        }
        return  $locale;
    }
}

/**
 * random_number
 *
 * @return Response
 */

if (!function_exists('random_number')) {

    function random_number()
    {
        return  strtoupper(Str::random(7));
    }
}

/**
 * totalMerchantProduct
 *
 * @return Response
 */

if (!function_exists('totalMerchantProduct')) {

    function totalMerchantProduct($merchantId)
    {
        return Product::where('author_id', $merchantId)->whereHas('categories', function ($query) {
            $query->where('status', 1);
        })
            ->where('status', 1)
            ->count();
    }
}


/**
 * totalSaleMerchant
 *
 * @return Response
 */

if (!function_exists('totalSaleMerchant')) {

    function totalSaleMerchant($merchantId)
    {
        return Order::where('status', 4)
            ->where('merchant_id', $merchantId)
            ->count();
    }
}


/**
 * merchantViewRating
 *
 * @return Response
 */

if (!function_exists('merchantViewRating')) {

    function merchantViewRatings($merchantId)
    {
        $user_products_id = Product::whereHas('categories', function ($query) {
            $query->where('status', 1);
        })->where('author_id', $merchantId)
            ->where('status', 1)
            ->pluck('id')
            ->toArray();

        return ProductReview::whereNotNull('rate')
            ->whereNull('reply_id')
            ->whereIn('product_id', $user_products_id)
            ->get();
    }
}


/**
 * latestBidPrice
 *
 * @return Response
 */

if (!function_exists('latestBidPrice')) {

    function latestBidPrice($productId)
    {
        return Order::where('product_id', $productId)
            ->orderBy('bid_amount', 'desc')
            ->select('bid_amount')
            ->first();
    }
}

/**
 * strLimit
 *
 * @param  string $string
 * @param  int $limit
 * @return Response
 */
if (!function_exists('strLimit')) {

    function strLimit($string, $limit = 35)
    {
        return  Str::limit($string, $limit);
    }
}


/**
 * currentDate
 * @return Response
 */

if (!function_exists('currentDate')) {

    function currentDate()
    {
        return  Carbon::now();
    }
}

/**
 * CurrencyFormet
 * @return Response
 */
if (!function_exists('format_currency')) {

    function format_currency($amount) 
    {
        $currency_symbol = currency_symbol();
        return $currency_symbol . number_format($amount, 2);
    }
}


/**
 * currentDate
 * @return Response
 */

if (!function_exists('prelaceScript')) {

    function prelaceScript($descipt)
    {
        return preg_replace('#<script(.*?)>(.*?)</script>#is', '', $descipt);
    }
}

/**
 * indexFile
 * @return Response
 */

if (!function_exists('indexFile')) {
    function indexFile()
    {
        if (File::exists(public_path('index.php'))) {
            return true;
        };
        return false;
    }
}

/**
 * selectedTheme
 *
 * @return Response
 */

if (!function_exists('selectedTheme')) {

    function selectedTheme()
    {
        return get_setting('theme_id') ?? 1;
    }
}

/**
 * selectedTheme
 *
 * @return Response
 */

if (!function_exists('purchaseCode')) {

    function purchaseCode()
    {
        return PurchaseVerify::select('purchase_code')->latest()->first();
    }
}


/**
 * Youtube
 *
 * @return Response
 */
function youtube_link($url)
{
    if (strlen($url) > 11) {
        if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match)) {
            $youtube_link = 'https://youtube.com/embed/' . $match[1];
            return $youtube_link;
        } else
            return false;
    }

    return $url;
}

/**
 * Menu Items
 *
 * @return Response
 */
if (!function_exists('primary_menus')) {
function primary_menus()
{
    $menu_items = MenuItem::with('page', 'blog')
                ->where('menu_id', 1)
                ->where('parent_id', null)
                ->orderBy('order', 'asc')
                ->get();

    return $menu_items;
}
}

/**
 * primary_menus
 *
 * @return Response
 */
if (!function_exists('footer_menus')) {
    function footer_menus()
    {
        $menu_items = MenuItem::with('page', 'blog')
                    ->where('menu_id', 2)
                    ->where('parent_id', null)
                    ->orderBy('order', 'asc')
                    ->get();
    
        return $menu_items;
    }
    }

/**
 * footer_bottom_menus
 *
 * @return Response
 */
if (!function_exists('footer_bottom_menus')) {
    function footer_bottom_menus()
    {
        $menu_items = MenuItem::with('page', 'blog')
                    ->where('menu_id', 3)
                    ->where('parent_id', null)
                    ->orderBy('order', 'asc')
                    ->get();
    
        return $menu_items;
    }
}

/**
 * countries
 *
 * @return Response
 */
if (!function_exists('countries')) {
    function countries()
    {
        $countries = App\Models\Location::where('country_id', null)->where('state_id', null)->get();
    
        return $countries;
    }
}

/**
 * visa_categories
 *
 * @return Response
 */
if (!function_exists('visa_categories')) {
    function visa_categories()
    {
        $visas = App\Models\VisaCategory::where('status',1)->get();
    
        return $visas;
    }
}