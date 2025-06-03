<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use App\Models\ActivitiesAttribute;
use App\Models\ActivitiesGallery;
use App\Models\Blog;
use App\Models\Page;
use App\Models\User;
use App\Models\Order;
use App\Models\Store;
use App\Models\Wallet;
use App\Models\Contact;
use App\Models\Currency;
use App\Models\Location;
use App\Models\BlogComment;
use Illuminate\Support\Str;
use App\Models\BlogCategory;
use App\Models\Destination;
use App\Models\DestinationGallery;
use App\Models\Hotel;
use App\Models\HotelAttribute;
use App\Models\HotelAttributeTerm;
use App\Models\HotelGallery;
use App\Models\Inquiry;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Models\Review;
use App\Models\WidgetContent;
use App\Models\ProductGallery;
use DrewM\MailChimp\MailChimp;
use Illuminate\Support\Facades\DB;
use App\Models\ProductSpecification;
use App\Models\Tour;
use App\Models\TourAttribute;
use App\Models\TourGallery;
use App\Models\TourTranslation;
use App\Models\TourCategory;
use App\Models\Transport;
use App\Models\TransportAttribute;
use App\Models\TransportGallery;
use App\Models\VisaInquiryGallery;
use App\Models\Visa;
use App\Models\VisaCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function tour_details($slug)
    {
        $templateId = get_setting('theme_id') ?? 1;
        try {
            $tour = Tour::where('slug', $slug)->first();
            $user = Auth::user();

            $title = $tour->meta_title ?? $tour->getTranslation('title');
            $meta_description = $tour->meta_desc != '' ? $tour->meta_desc : Str::of($tour->content)->words(20);
            $meta_keyward = $tour->meta_keyward ? implode(', ', $tour->meta_keyward) : get_setting('meta_keyward');
            $meta_image = $tour->meta_img ? url('uploads/tour/meta/' . $tour->meta_img) : url('uploads/tour/features/' . $tour->feature_img);

            if (!$tour) {
                throw new \Exception('Tour not found');
            }
            $tour_id = $tour->id;
            $galleries       = TourGallery::where('tour_id', $tour_id)->get();
            $includes        = json_decode($tour->includes, true);
            $excludes        = json_decode($tour->excludes, true);
            $fixed_dates      = json_decode($tour->fixed_dates, true);
            $faqs            = json_decode($tour->faqs, true);
            $person_types    = json_decode($tour->person_types, true);
            $attributes      = TourAttribute::orderBy('name', 'asc')->get();
            $highlights      = json_decode($tour->highlights, true);
            $itinerary       = json_decode($tour->itinerary, true);
            $services        = json_decode($tour->service_fees);
            $reviews         = Review::where('status', 1)->where('product_type', 'tour')->where('product_id', $tour_id)->whereNull('parent_id')->latest()->get();
            $total_reviews   = Review::where('product_type', 'tour')->where('product_id', $tour_id)->whereNull('parent_id')->count();
            $total_rating    = Review::where('product_type', 'tour')->where('product_id', $tour_id)->whereNull('parent_id')->sum('rating');
            $average_rating  = $total_reviews > 0 ? $total_rating / $total_reviews : 0;
            if ($user) {
                $have_booking    = Order::where('product_type', 'tour')->where('product_id', $tour_id)->where('user_id', $user->id)->first();
                $have_review     = Review::where('product_type', 'tour')->where('product_id', $tour_id)->where('user_id', $user->id)->first();
            } else {
                $have_booking = null;
                $have_review = null;
            }
            $tour->increment('view', 1);

            return view('frontend.template-' . $templateId . '.tour_details', compact(
                'title',
                'meta_description',
                'meta_keyward',
                'meta_image',
                'templateId',
                'tour',
                'galleries',
                'includes',
                'excludes',
                'faqs',
                'fixed_dates',
                'attributes',
                'person_types',
                'services',
                'highlights',
                'itinerary',
                'reviews',
                'total_reviews',
                'average_rating',
                'have_booking',
                'have_review',
            ));
        } catch (\Throwable $th) {
            Log::error('Error in tour_details: ' . $th->getMessage());
            return view('frontend.errors.index', ['templateId' => $templateId]);
        }
    }

    public function destination_details($slug)
    {
        try {
            $templateId = get_setting('theme_id') ?? 1;

            $destinations = Destination::where('slug', $slug)->first();

            $meta_title = $destinations->meta_title;
            $title = $destinations->getTranslation('title');

            if (!$destinations) {
                abort(404, 'Tour not found');
            }

            $destination_id  = $destinations->id;
            $galleries       = DestinationGallery::where('destination_id', $destination_id)->get();

            return view('frontend.template-' . $templateId . '.destination-details', compact('destinations', 'title', 'templateId', 'galleries'));
        } catch (\Throwable $th) {
            Log::error('Error in destination_details: ' . $th->getMessage());
            return view('frontend.errors.index', ['templateId' => $templateId]);
        }
    }

    public function transport_details($slug)
    {
        try {
            $templateId = get_setting('theme_id') ?? 1;

            $transports = Transport::where('slug', $slug)->first();
            $user = Auth::user();
            $transports->increment('view', 1);

            $title = $transports->meta_title ?? $transports->getTranslation('title');
            $meta_description = $transports->meta_desc ?? Str::of(strip_tags($transports->content))->words(20) ?? get_setting('meta_description');
            $meta_keyward = $transports->meta_keyward ? json_decode($transports->meta_keyward) : '';
            $meta_keyward = $meta_keyward ? implode(', ', $meta_keyward) : get_setting('meta_keyward');
            $meta_image = $transports->meta_img ? url('uploads/transports/meta/' . $transports->meta_img) : url('uploads/transports/features/' . $transports->feature_img);

            $transport_id   = $transports->id;
            $galleries      = TransportGallery::where('transport_id', $transport_id)->get();
            $includes       = json_decode($transports->includes, true);
            $excludes       = json_decode($transports->excludes, true);
            $faqs           = json_decode($transports->faqs, true);
            $services       = json_decode($transports->service_fees);
            $attributes     = TransportAttribute::orderBy('name', 'asc')->get();
            $reviews        = Review::where('status', 1)->where('product_type', 'transports')->where('product_id', $transport_id)->whereNull('parent_id')->latest()->get();
            $total_reviews  = Review::where('product_type', 'transports')->where('product_id', $transport_id)->whereNull('parent_id')->count();
            $total_rating   = Review::where('product_type', 'transports')->where('product_id', $transport_id)->whereNull('parent_id')->sum('rating');
            $average_rating = $total_reviews > 0 ? $total_rating / $total_reviews : 0;
            if ($user) {
                $have_booking   = Order::where('product_type', 'transports')->where('product_id', $transport_id)->where('user_id', $user->id)->first();
                $have_review    = Review::where('product_type', 'transports')->where('product_id', $transport_id)->where('user_id', $user->id)->first();
            } else {
                $have_booking = null;
                $have_review = null;
            }

            return view('frontend.template-' . $templateId . '.transport_details', compact('title', 'meta_description', 'meta_keyward', 'meta_image', 'templateId', 'transports', 'galleries', 'includes', 'excludes', 'faqs', 'services', 'attributes', 'reviews', 'total_reviews', 'average_rating', 'have_booking', 'have_review'));
        } catch (\Throwable $th) {
            Log::error('Error in transport_details: ' . $th->getMessage());
            return view('frontend.errors.index', ['templateId' => $templateId]);
        }
    }

    public function hotel_details($slug)
    {
        try {
            $templateId = get_setting('theme_id') ?? 1;

            $hotels = Hotel::where('slug', $slug)->first();
            $user = Auth::user();
            $hotels->increment('view', 1);

            $title = $hotels->meta_title ?? $hotels->getTranslation('title');
            $meta_description = $hotels->meta_desc ?? Str::of(strip_tags($hotels->content))->words(20) ?? get_setting('meta_description');
            $meta_keyward = $hotels->meta_keyward ? implode(', ',$hotels->meta_keyward) : get_setting('meta_keyward');
            $meta_image = $hotels->meta_img ? url('uploads/hotel/meta/' . $hotels->meta_img) : url('uploads/hotel/features/' . $hotels->feature_img);

            $hotel_id       = $hotels->id;
            $galleries      = HotelGallery::where('hotel_id', $hotel_id)->get();
            $policies       = json_decode($hotels->policies, true);
            $attributes     = HotelAttribute::orderBy('name', 'asc')->get();
            $services       = json_decode($hotels->service_fees);
            $reviews        = Review::where('status', 1)->where('product_type', 'hotel')->where('product_id', $hotel_id)->whereNull('parent_id')->latest()->get();
            $total_reviews  = Review::where('product_type', 'hotel')->where('product_id', $hotel_id)->whereNull('parent_id')->count();
            $total_rating   = Review::where('product_type', 'hotel')->where('product_id', $hotel_id)->whereNull('parent_id')->sum('rating');
            $average_rating = $total_reviews > 0 ? $total_rating / $total_reviews : 0;
            if ($user) {
                $have_booking   = Order::where('product_type', 'hotel')->where('product_id', $hotel_id)->where('user_id', $user->id)->first();
                $have_review    = Review::where('product_type', 'hotel')->where('product_id', $hotel_id)->where('user_id', $user->id)->first();
            } else {
                $have_booking = null;
                $have_review = null;
            }

            return view('frontend.template-' . $templateId . '.hotel_details', compact('title', 'meta_description','meta_keyward','meta_image','templateId', 'hotels', 'galleries', 'policies', 'attributes', 'services', 'reviews', 'total_reviews', 'average_rating', 'have_booking', 'have_review'));
        } catch (\Throwable $th) {
            Log::error('Error in hotel_details: ' . $th->getMessage());
            return view('frontend.errors.index', ['templateId' => $templateId]);
        }
    }

    public function activities_details($slug)
    {
        try {
            $templateId = get_setting('theme_id') ?? 1;

            $activities = Activities::where('slug', $slug)->first();
            $activities->increment('view', 1);
            $user = Auth::user();

            $title = $activities->meta_title ?? $activities->getTranslation('title');
            $meta_description = $activities->meta_desc ?? Str::of(strip_tags($activities->content))->words(20) ?? get_setting('meta_description');
            $meta_keyward = $activities->meta_keyward ? json_decode($activities->meta_keyward) : '';
            $meta_keyward = $meta_keyward ? implode(', ', $meta_keyward) : get_setting('meta_keyward');
            $meta_image = $activities->meta_img ? url('uploads/activities/meta/' . $activities->meta_img) : url('uploads/activities/features/' . $activities->feature_img);

            if (!$activities) {
                abort(404, 'Activity not found');
            }

            $activity_id = $activities->id;
            $galleries = ActivitiesGallery::where('activities_id', $activity_id)->get();

            $services        = json_decode($activities->service_fees);
            $highlights      = json_decode($activities->highlights, true);
            $includes        = json_decode($activities->includes, true);
            $excludes        = json_decode($activities->excludes, true);
            $activities_plan = json_decode($activities->activities_plan, true);
            $frequently      = json_decode($activities->faqs, true);
            $attributes      = ActivitiesAttribute::orderBy('name', 'asc')->get();
            $reviews         = Review::where('status', 1)->where('product_type', 'activities')->where('product_id', $activity_id)->whereNull('parent_id')->latest()->get();
            $total_reviews   = Review::where('product_type', 'activities')->where('product_id', $activity_id)->whereNull('parent_id')->count();
            $total_rating    = Review::where('product_type', 'activities')->where('product_id', $activity_id)->whereNull('parent_id')->sum('rating');
            $average_rating  = $total_reviews > 0 ? $total_rating / $total_reviews : 0;
            if ($user) {
                $have_booking    = Order::where('product_type', 'activities')->where('product_id', $activity_id)->where('user_id', $user->id)->first();
                $have_review     = Review::where('product_type', 'activities')->where('product_id', $activity_id)->where('user_id', $user->id)->first();
            } else {
                $have_booking = null;
                $have_review = null;
            }

            return view('frontend.template-' . $templateId . '.activities_details', compact('title', 'meta_description', 'meta_keyward', 'meta_image', 'activities', 'templateId', 'galleries', 'services', 'highlights', 'includes', 'excludes', 'activities_plan', 'frequently', 'reviews', 'total_reviews', 'average_rating', 'have_booking', 'have_review', 'attributes'));
        } catch (\Throwable $th) {
            Log::error('Error in activities_details: ' . $th->getMessage());
            return view('frontend.errors.index', ['templateId' => $templateId]);
        }
    }

    /** Show the application Home.
     *
     * @return View
     */
    public function index(Request $request)
    {
        $templateId = get_setting('theme_id') ?? 1;
        $lang = $request->lang;
        $slug = 'home';
        try {

        $singlePageData = Page::with(['widgetContents' => function ($query) {
            $query->where('status', 1);
        }])->where('page_slug', '=', $slug)->first();

        if ($singlePageData) {
            $activeWidgets = $singlePageData->widgetContents;
            $title = $singlePageData->meta_title ?? $singlePageData->page_name ?? get_setting('meta_title');
            $meta_description = $singlePageData->meta_description ?? get_setting('meta_description');
            $meta_keyward = $singlePageData->meta_keyward ? json_decode($singlePageData->meta_keyward) : '';
            $meta_keyward = $meta_keyward ? implode(', ', $meta_keyward) : get_setting('meta_keyward');
            $meta_image = get_setting('header_logo') ? url('assets/logo/' . get_setting('header_logo')) : '';

            return view('frontend.index', ['activeWidgets' => $activeWidgets, 'templateId' => $templateId, 'params' => $slug, 'title' => $title, 'meta_description' => $meta_description, 'meta_keyward' => $meta_keyward, 'meta_image' => $meta_image, 'lang' => $lang]);
        } else {
            return view('frontend.errors.index', ['templateId' => $templateId, 'lang' => $lang]);
        }
    } catch (\Throwable $th) {
        Log::error('Error in home_page: ' . $th->getMessage());
        return view('frontend.errors.index', ['templateId' => $templateId]);
    }
    }


    /**
     * loadPagesContent
     *
     * @param  mixed $request
     * @param  string $slug
     * @return View
     */
    public function loadPagesContent(Request $request, $slug)
    {
        $templateId = get_setting('theme_id') ?? 1;
        $lang = $request->lang;
        if ($slug == 'signup') {
            if (Auth::id()) {
                return redirect()->to('customer/dashboard');
            }
        }
        try {

        if ($slug) {
            $singlePageData = Page::where('page_slug', $slug)->first();
            if ($singlePageData) {
                $activeWidgets = $singlePageData->widgetContents;
                $is_bread_crumb = $singlePageData?->is_bread_crumb;
                $title = $singlePageData->getTranslation('meta_title') ?? $singlePageData->getTranslation('page_name') ?? get_setting('meta_title');
                $meta_description = $singlePageData->getTranslation('meta_description') ?? get_setting('meta_description');
                $meta_keyward = $singlePageData->meta_keyward ? json_decode($singlePageData->meta_keyward) : '';
                $meta_keyward = $meta_keyward ? implode(', ', $meta_keyward) : get_setting('meta_keyward');
                $meta_image = get_setting('header_logo') ? url('assets/logo/' . get_setting('header_logo')) : '';

                if ($request->ajax()) {

                    if (isset($request->widget_name)) {
                        if ($request->widget_name == 'all-product') {
                            $widgetItem = getWidgetContent($singlePageData->id, 'all-product');
                            return $this->productSearch($request, $widgetItem->widget_content['display_per_page'], $templateId, $lang);
                        }
                    }
                }

                return view('frontend.index', ['activeWidgets' => $activeWidgets, 'templateId' => $templateId, 'params' => $slug, 'title' => $title, 'meta_description' => $meta_description, 'meta_keyward' => $meta_keyward, 'meta_image' => $meta_image, 'lang' => $lang, 'is_bread_crumb' => $is_bread_crumb]);
            } else {
                return view('frontend.errors.index', ['templateId' => $templateId, 'lang' => $lang]);
            }
        }
    } catch (\Throwable $th) {
        Log::error('Error in pages: ' . $th->getMessage());
        return view('frontend.errors.index', ['templateId' => $templateId]);
    }
    }

    /**
     * shop_details
     *
     * @param  mixed $request
     * @param  string $slug
     * @return View
     */
    public function shop_details(Request $request, $slug)
    {
        try {
            $templateId = get_setting('theme_id') ?? 1;
            $lang = $request->lang;

            $options = [];

            if (isset($request->filter_by)) {
                $options['type'] = $request->filter_by;
            }

            $shop_details = Store::where('slug', $slug)->firstOrFail();
            $title = $shop_details->name;
            $meta_description = get_setting('meta_description');
            $meta_keyward = get_setting('meta_keyward');
            $meta_image = $shop_details->logo ? url('uploads/shop/' . $shop_details->logo) : url('assets/logo/' . get_setting('header_logo'));

            $currentDateTime = now();

            $products = Product::query();
            if (!empty($options['type'])) {

                if ($options['type'] != "all") {
                    $products->when(function ($query) use ($options, $currentDateTime) {
                        if ($options['type'] == 1 || $options['type'] == 2) {
                            $query->where('sale_type', $options['type']);
                        } else if ($options['type'] == 3) {
                            $query->where('start_date', '>=', $currentDateTime);
                        }
                    });
                }
            }
            $products = $products->where('status', 1)->whereHas('categories', function ($query) {
                $query->where('status', 1);
            })
                ->where('author_id', $shop_details->author_id)
                ->when('sale_type' == 1, function ($q) use ($currentDateTime) {
                    return $q->where('start_date', '<=', $currentDateTime)->where('end_date', '>=', $currentDateTime);
                })
                ->latest()
                ->paginate(12);

            if ($request->ajax()) {
                $data = view('frontend.template-' . $templateId . '.partials.filter-products', compact('products', 'lang'))->render();

                return response()->json(['status' => true, 'products' => $data, 'total' => $products->count(), 'first_item' => $products->firstItem(),  'last_item' => $products->lastItem()]);
            }

            return view('frontend.template-' . $templateId . '.shop-details', compact('shop_details', 'title', 'meta_description', 'meta_keyward', 'meta_image', 'lang', 'products', 'templateId'));
        } catch (\Throwable $th) {
            return view('frontend.errors.index', ['templateId' => $templateId, 'lang' => $lang]);
        }
    }


    /**
     * blogs
     *
     * @param  mixed $request
     * @return View
     */
    public function blogs(Request $request)
    {
        $templateId = get_setting('theme_id') ?? 1;
        $lang = $request->lang;
        try {
            if (isset($request->search)) {
                $title = translate('Search') . ': ' . $request->search;
                $blogs = Blog::where('status', 1)->where('title', 'like', '%' . $request->search . '%')->orWhere('description', 'like', '%' . $request->search . '%')->latest()->paginate(9);
            } else {
                $title = translate('Blogs');
                $blogs = Blog::where('status', 1)->latest()->paginate(9);
            }
            $meta_description = get_setting('meta_description');
            $meta_keyward = get_setting('meta_keyward');
            $meta_image = get_setting('header_logo') ? url('assets/logo/' . get_setting('header_logo')) : '';

            return view('frontend.template-' . $templateId . '.blog-page', compact('title', 'meta_description', 'meta_keyward', 'meta_image', 'blogs', 'lang', 'templateId'));
        } catch (\Throwable $th) {
            return view('frontend.errors.index', ['templateId' => $templateId, 'lang' => $lang]);
        }
    }


    /**
     * blog_category
     *
     * @param  mixed $request
     * @param  string $slug
     * @return View
     */
    public function blog_category(Request $request, $slug)
    {
        $templateId = get_setting('theme_id') ?? 1;
        $lang = $request->lang;
        try {
            $blog_category = BlogCategory::where('slug', $slug)->first();
            $title = $blog_category->getTranslation('name', $lang);
            $meta_description = get_setting('meta_description');
            $meta_keyward = get_setting('meta_keyward');
            $meta_image = get_setting('header_logo') ? url('assets/logo/' . get_setting('header_logo')) : '';
            $blogs = Blog::where('status', 1)->where('category_id', $blog_category->id)->latest()->paginate(9);

            return view('frontend.template-' . $templateId . '.blog-page', compact('title', 'meta_description', 'meta_keyward', 'meta_image', 'blogs', 'lang', 'templateId'));
        } catch (\Throwable $th) {
            return view('frontend.errors.index', ['templateId' => $templateId, 'lang' => $lang]);
        }
    }


    /**
     * blog_tag
     *
     * @param  mixed $request
     * @param  View $tag
     * @return void
     */
    public function blog_tag(Request $request, $tag)
    {
        $templateId = get_setting('theme_id') ?? 1;
        $title = $tag;
        $lang = $request->lang;
        try {
            $meta_description = get_setting('meta_description');
            $meta_keyward = get_setting('meta_keyward');
            $meta_image = get_setting('header_logo') ? url('assets/logo/' . get_setting('header_logo')) : '';

            $blogs = Blog::whereRaw("find_in_set('" . $tag . "',tags)")->where('status', 1)->latest()->paginate(12);

            return view('frontend.template-' . $templateId . '.blog-page', compact('title', 'meta_description', 'meta_keyward', 'meta_image', 'blogs', 'lang', 'templateId'));
        } catch (\Throwable $th) {
            return view('frontend.errors.index', ['templateId' => $templateId, 'lang' => $lang]);
        }
    }


    /**
     * blog_details
     *
     * @param  mixed $request
     * @param  string $slug
     * @return View
     */
    public function blog_details(Request $request, $slug)
    {
        $templateId = get_setting('theme_id') ?? 1;
        $lang = $request->lang;
        try {
            $blog_details = Blog::where('slug', $slug)->first();
            $title = $blog_details->meta_title ?? $blog_details->title;
            $desc = strip_tags($blog_details->description);
            $meta_description = $blog_details->meta_description ?? Str::words($desc, 50, ' (...)') ?? get_setting('meta_description');
            $meta_keyward = $blog_details->meta_keyward ? implode(', ', $blog_details->meta_keyward) : get_setting('meta_keyward');
            $meta_image = $blog_details->image ? url('uploads/blog/' . $blog_details->image) : url('assets/logo/' . get_setting('header_logo'));
            $recentBlogs = Blog::where('status', 1)->latest()->take(5)->get();
            $categories = BlogCategory::where('status', 1)->inRandomOrder()->take(5)->get();
            $comments = BlogComment::where('blog_id', $blog_details->id)->where('parent_id', 0)->latest()->get();

            $randomBlog = Blog::where('status', 1)->inRandomOrder()->first();

            return view('frontend.template-' . $templateId . '.blog-details', compact('blog_details', 'title', 'meta_description', 'meta_keyward', 'meta_image', 'lang', 'recentBlogs', 'categories', 'comments', 'randomBlog', 'templateId'));
        } catch (\Throwable $th) {
            return view('frontend.errors.index', ['templateId' => $templateId, 'lang' => $lang]);
        }
    }

    /**
     * blog_comment
     *
     * @param  mixed $request
     * @return Response
     */
    public function blog_comment(Request $request)
    {
        /** Validation */
        $validator = Validator::make($request->all(), [
            'comment' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $comments = new BlogComment;
        if (Auth::guest()) {
            $comments->user_name = $request->user_name;
            $comments->user_email = $request->user_email;
        } else {
            $comments->user_id = Auth::user()->id;
        }
        $comments->blog_id = $request->blog_id;
        $comments->comment = $request->comment;
        if (isset($request->parent_id)) {
            $comments->parent_id = $request->parent_id;
        }
        $comments->save();
        if (isset($request->parent_id)) {
            return redirect()->back()->with('success', translate('Your reply save successfully'));
        } else {
            return redirect()->back()->with('success', translate('Your comment save successfully'));
        }
    }


    public function visa_details(Request $request, $slug)
    {
        $templateId = get_setting('theme_id') ?? 1;
        $lang = $request->lang;

        try {
            $visa_details = Visa::where('slug', $slug)->first();
            $visa_title = $visa_details->title;
            $title = $visa_title;
            $includes   = json_decode($visa_details->includes, true);
            $faqs       = json_decode($visa_details->faqs, true);

            return view('frontend.template-' . $templateId . '.visa_details', compact('visa_details', 'includes', 'faqs', 'title', 'lang', 'templateId'));
        } catch (\Throwable $th) {
            return view('frontend.errors.index', ['templateId' => $templateId, 'lang' => $lang]);
        }
    }


    /**
     * dashboard
     *
     * @param  mixed $request
     * @return View
     */

    public function dashboard(Request $request)
    {
        $templateId = get_setting('theme_id') ?? 1;
        $lang = $request->lang;
        $customerSingle = Auth::user();
        try {
            $title = translate('Dashboard');
            $orders = Order::where('user_id', Auth::user()->id)
                ->when($request->type, function ($q) use ($request) {
                    return $q->where('product_type', $request->type);
                })->when($request->status, function ($q) use ($request) {
                    return $q->where('status', $request->status);
                })->latest()->paginate(10);

            $data['total_tours']       = Order::where('user_id', Auth::user()->id)->where('product_type', 'tour')->count();
            $data['tour_hotels']       = Order::where('user_id', Auth::user()->id)->where('product_type', 'hotel')->count();
            $data['tour_transports']   = Order::where('user_id', Auth::user()->id)->where('product_type', 'transports')->count();
            $data['tour_activities']   = Order::where('user_id', Auth::user()->id)->where('product_type', 'activities')->count();
            $data['total_deposit']   = Wallet::where('type', 1)->where('user_id', Auth::user()->id)->where('status', 2)->count();


            return view('frontend.template-' . $templateId . '.customer.dashboard', compact('title', 'customerSingle', 'orders', 'data'));
        } catch (\Throwable $th) {
            return view('frontend.errors.index', ['templateId' => $templateId, 'lang' => $lang]);
        }
    }

    /**
     * customer_profile
     *
     * @param  mixed $request
     * @return View
     */
    public function customer_profile(Request $request)
    {
        $templateId = get_setting('theme_id') ?? 1;
        $lang = $request->lang;
        try {
            $title = translate('Profile');
            $meta_description = get_setting('meta_description');
            $meta_keyward = get_setting('meta_keyward');
            $meta_image = get_setting('header_logo') ? url('assets/logo/' . get_setting('header_logo')) : '';
            $customerSingle = User::where('id', Auth::user()->id)->first();
            $countries = Location::where('country_id', null)->where('state_id', null)->get();

            return view('frontend.template-' . $templateId . '.customer.profile', compact('title', 'customerSingle', 'countries'));
        } catch (\Throwable $th) {
            return view('frontend.errors.index', ['templateId' => $templateId, 'lang' => $lang]);
        }
    }


    /**
     * customer_purchase
     *
     * @param  mixed $request
     * @return View
     */
    public function customer_booking(Request $request)
    {
        $templateId = get_setting('theme_id') ?? 1;
        $lang = $request->lang;
        try {
            $title = translate('Booking History');
            $orders = Order::where('user_id', Auth::user()->id)
                ->when($request->type, function ($q) use ($request) {
                    return $q->where('product_type', $request->type);
                })->when($request->status, function ($q) use ($request) {
                    return $q->where('status', $request->status);
                })->latest()->paginate(10);

            return view('frontend.template-' . $templateId . '.customer.booking', compact('title', 'orders'));
        } catch (\Throwable $th) {
            return view('frontend.errors.index', ['templateId' => $templateId, 'lang' => $lang]);
        }
    }

    /**
     * customer_purchase_deatails
     *
     * @param  mixed $request
     * @return View
     */

    public function booking_details(Request $request, $order_number)
    {
        $templateId = get_setting('theme_id') ?? 1;
        $lang = $request->lang;
        try {
            $title = translate('Booking Details');
            $order = Order::where('order_number', $order_number)->first();

            return view('frontend.template-' . $templateId . '.customer.booking_details', compact('title', 'order'));
        } catch (\Throwable $th) {
            return view('frontend.errors.index', ['templateId' => $templateId, 'lang' => $lang]);
        }
    }

    /**
     * customer_deposit
     *
     * @param  mixed $request
     * @return View
     */
    public function customer_deposit(Request $request)
    {

        $templateId = get_setting('theme_id') ?? 1;
        $lang = $request->lang;
        try {
            $title = translate('Deposits');
            $meta_description = get_setting('meta_description');
            $meta_keyward = get_setting('meta_keyward');
            $meta_image = get_setting('header_logo') ? url('assets/logo/' . get_setting('header_logo')) : '';
            if (isset($request->search)) {
                $deposits = Wallet::where('user_id', Auth::user()->id)->where('type', 1)->latest()->paginate($request->search);
            } else {
                $deposits = Wallet::where('user_id', Auth::user()->id)->where('type', 1)->latest()->paginate(10);
            }
            $payment_methods = PaymentMethod::where('status', 1)->where('id', '<>', 1)->get();

            return view('frontend.template-' . $templateId . '.customer.deposit', compact('title', 'meta_image', 'meta_description', 'meta_keyward', 'deposits', 'payment_methods'));
        } catch (\Throwable $th) {
            return view('frontend.errors.index', ['templateId' => $templateId, 'lang' => $lang]);
        }
    }

    /**
     * customer_transaction
     *
     * @param  mixed $request
     * @return View
     */
    public function customer_transaction(Request $request)
    {
        $templateId = get_setting('theme_id') ?? 1;
        $lang = $request->lang;
        try {
            $title = translate('Transactions');
            $meta_description = get_setting('meta_description');
            $meta_keyward = get_setting('meta_keyward');
            $meta_image = get_setting('header_logo') ? url('assets/logo/' . get_setting('header_logo')) : '';
            if (isset($request->search)) {
                $transactions = Wallet::where('user_id', Auth::user()->id)->latest()->paginate($request->search);
            } else {
                $transactions = Wallet::where('user_id', Auth::user()->id)->latest()->paginate(10);
            }

            return view('frontend.template-' . $templateId . '.customer.transaction', compact('title', 'transactions'));
        } catch (\Throwable $th) {
            return view('frontend.errors.index', ['templateId' => $templateId, 'lang' => $lang]);
        }
    }

    /**
     * customer_update
     *
     * @param  mixed $request
     * @param  int $id
     * @return Response
     */
    public function customer_update_data(Request $request, $id)
    {
        $customers = User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'first_name'    => 'required|max:255',
            'last_name'     => 'required|max:255',
            'email'         => 'required|max:255|unique:users,email,' . $customers->id,
            'phone'         => 'nullable|max:255|unique:users,phone,' . $customers->id,
            'address'       => 'nullable|max:255',
            'country_id'    => 'nullable|max:255',
            'state_id'      => 'nullable|max:255',
            'city_id'       => 'nullable|max:255',
            'zip_code'      => 'nullable|max:255',
            'image'         => 'nullable|image',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        /** image upload */
        $image = $request->file('image');
        if ($image != '') {
            if (file_exists(public_path('uploads/users/' . $customers->image))) {
                unlink(public_path('uploads/users/' . $customers->image));
            }
            $image_name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/users'), $image_name);
            $customers->image = $image_name;
        }
        $customers->fname = $request->first_name;
        $customers->lname = $request->last_name;
        $customers->address = $request->address;
        $customers->email = $request->email;
        $customers->phone = $request->phone;
        $customers->country_id = $request->country_id;
        $customers->state_id = $request->state_id;
        $customers->city_id = $request->city_id;
        $customers->zip_code = $request->zip_code;

        $customers->save();

        return redirect()->back()->with('success', translate('Your Profile has been updated successfully'));
    }

    public function security_update(Request $request, $id)
    {
        $customer = User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'old_password' => 'required|min:8',
            'new_password' => 'required|confirmed',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if (!Hash::check($request->old_password, $customer->password)) {
            return redirect()->back()->with('error', translate('The old password is incorrect!'));
        }
        if ($request->new_password) {
            $customer->password = Hash::make($request->new_password);
        }
        $customer->save();

        return redirect()->back()->with('success', translate('Password Change successfully'));
    }


    /**
     * checkout_check
     *
     * @param  mixed $request
     * @return Response
     */
    public function checkout_check(Request $request)
    {
        $currency = Currency::findOrFail(get_setting('default_currency'));
        $user = Auth::user();
        $templateId = get_setting('theme_id') ?? 1;
        if (isset($request->product_type) && isset($request->product_id)) {
            $customer_cart = [
                'transport_type' => $request->transportType ?? null,
                'product_id' => $request->product_id,
                'product_type' => $request->product_type,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date ?? null,
                'days' => $request->days ?? null,
                'quantity' => $request->aqty ?? null,
                'child_qty' => $request->cqty ?? null,
                'adult_unit_price' => $request->adult_unit_price ?? null,
                'adult_unit_sale_price' => $request->adult_unit_sale_price ?? null,
                'child_unit_price' => $request->child_unit_price ?? null,
                'price' => $request->price ?? null,
                'child_price' => $request->child_price ?? null,
                'total_amount' => $request->total_amount ?? null,
                'services_list' => $request->services_list ?? null,
            ];

            Session::put('customer_cart', $customer_cart);

            return redirect()->route('checkout');
        } else {
            return view('frontend.errors.index', ['templateId' => $templateId]);
        }
    }


    /**
     * checkout
     *
     * @param  mixed $request
     * @return View
     */
    public function checkout(Request $request)
    {
        $templateId = get_setting('theme_id') ?? 1;
        $customer_cart = Session::get('customer_cart');
        $lang = $request->lang;
        if (isset($customer_cart['price'], $customer_cart['product_id'])) {

            if (is_numeric((int)$customer_cart['price']) && is_numeric($customer_cart['product_id'])) {
                if ($customer_cart['product_type'] == 'tour') {
                    $singleProduct = Tour::findOrFail($customer_cart['product_id']);
                } elseif ($customer_cart['product_type'] == 'hotel') {
                    $singleProduct = Hotel::findOrFail($customer_cart['product_id']);
                } elseif ($customer_cart['product_type'] == 'activities') {
                    $singleProduct = Activities::findOrFail($customer_cart['product_id']);
                } elseif ($customer_cart['product_type'] == 'transports') {
                    $singleProduct = Transport::findOrFail($customer_cart['product_id']);
                }

                $price = abs($customer_cart['price']);
                $quantity = abs($customer_cart['quantity']);

                $loginUser = Auth::user();
                $countries = Location::where('country_id', null)->where('state_id', null)->get();
                $title = translate('Checkout');
                $meta_description = get_setting('meta_description');
                $meta_keyward = get_setting('meta_keyward');
                $meta_image = get_setting('header_logo') ? url('assets/logo/' . get_setting('header_logo')) : '';
                $payment_methods = PaymentMethod::where('status', 1)->get();

                return view('frontend.template-' . $templateId . '.checkout', compact('title', 'meta_image', 'meta_description', 'meta_keyward', 'loginUser', 'singleProduct', 'price', 'quantity', 'countries', 'lang', 'payment_methods', 'customer_cart'));
            } else {

                return redirect()->back()->with('error', translate('Wrong'));
            }
        } else {
            return view('frontend.errors.index', ['templateId' => $templateId, 'lang' => $lang]);
        }
    }


    /**
     * thank_you
     *
     * @param  mixed $request
     * @return View
     */
    public function thank_you(Request $request)
    {
        $templateId = get_setting('theme_id') ?? 1;
        $lang = $request->lang;
        $title = translate('Thank You');
        $meta_description = get_setting('meta_description');
        $meta_keyward = get_setting('meta_keyward');
        $meta_image = get_setting('header_logo') ? url('assets/logo/' . get_setting('header_logo')) : '';
        if (Session::has('orders')) {
            $orderSingle = Session::get('orders');

            return view('frontend.template-' . $templateId . '.thankyou', compact('title', 'meta_image', 'meta_description', 'meta_keyward', 'lang', 'orderSingle', 'templateId'));
        } else {
            return view('frontend.errors.index', ['templateId' => $templateId, 'lang' => $lang]);
        }
    }


    /** Send message to admin for contact.
     *
     * contact_store
     *
     * @param  mixed $request
     */
    public function contact_store(Request $request)
    {
        if (get_setting('google_recapcha_check') == 1) {
            $recaptcha_response = $request->input('g-recaptcha-response');
            if (empty($recaptcha_response)) {
                return redirect()->back()->with('g-recaptcha-response', 'Please Check Recaptcha');
            }
        }

        /** Validation */
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'nullable|max:255',
            'subject' => 'required|max:255',
            'message' => 'required',
            'g-recaptcha-response' => function ($attribute, $value, $fail) {
                $secretKey = get_setting('recaptcha_secret');
                $response = $value;
                $userIP = $_SERVER['REMOTE_ADDR'];
                $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$response&remoteip=$userIP";
                $response = Http::asForm()->post($url);
                $response = json_decode($response);
                if (!$response->success) {
                    Session::flash('g-recaptcha-response', 'Please Check Recaptcha');
                    $fail($attribute . 'Google Recaptcha Failed');
                }
            },
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $contacts = new Contact;
        $contacts->name = $request->name;
        $contacts->email = $request->email;
        $contacts->phone = $request->phone;
        $contacts->subject = $request->subject;
        $contacts->message = $request->message;
        $contacts->save();

        return redirect()->back()->with('success', translate('Your Message has been Send Successfully'));
    }

    /** Send message to admin for contact.
     *
     * inquiry_store
     *
     * @param  mixed $request
     */

    public function inquiry_post(Request $request)
    {
        /** Validation */
        $validator = Validator::make($request->all(), [
            'product_type' => 'required|max:255',
            'product_id'  => 'required|max:255',
            'name'        => 'required|max:255',
            'email'       => 'required|max:255',
            'phone'       => 'nullable|max:20',
            'country_id'  => 'nullable|max:255',
            'visa_type'   => 'nullable|max:255',
            'images'       => 'nullable',
            'message'     => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $inquiry = new Inquiry;

        $inquiry->type       = $request->product_type;
        $inquiry->product_id = $request->product_id;
        $inquiry->author_id  = $request->author_id;
        $inquiry->name       = $request->name;
        $inquiry->email      = $request->email;
        $inquiry->phone      = $request->phone;
        $inquiry->message    = $request->message;
        $inquiry->country_id = $request->country_id;
        $inquiry->visa_type  = $request->visa_type;
        if($inquiry->save()){
            if ($request->hasFile('images')) {
                $images = $request->file('images');
                if ($images != '') {
                    foreach($images as $image){
                    $gallery = new VisaInquiryGallery;
                    $img_name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('uploads/inquiry'), $img_name);
                    $gallery->image = $img_name;
                    $gallery->visa_inquiry_id = $inquiry->id;
                    $gallery->save();
                }
                }
            }
        }

        return redirect()->back()->with('success', translate('Your Inquiry Message has been Send Successfully'));
    }


    public function homeChangeLanguage(Request $request)
    {
        $request->session()->put('locale', $request->locale);
        $language = Language::where('code', $request->locale)->first();
        $response = array('output' => 'success', 'message' => translate('Language changed to ') . $language->name);
        return response()->json($response);
    }


    /**
     * newsletter_subscribe
     *
     * @param  mixed $request
     * @return Response
     */
    public function newsletter_subscribe(Request $request)
    {

        try {
            if ($request->email == "") {
                return redirect()->back()->with('success', translate('Enter Your Email'));
            }


            $api_key = get_setting('MAILCHIMP_API_KEY');
            $list_id = get_setting('MAILCHIMP_LIST_ID');

            $MailChimp = new MailChimp($api_key);

            $result = $MailChimp->post("lists/$list_id/members", [
                'email_address' => $request->email,
                'status' => 'subscribed',
            ]);

            if ($MailChimp->success()) {
                return redirect()->back()->with('success', translate('Thanks For Subscribe'));
            } else {
                return redirect()->back()->with('error', $MailChimp->getLastError());
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',  translate('Credentials Wrong!'));
        }
    }


    /** Show the application customer search.
     * search
     *
     * @param  mixed $request
     * @return Response
     */

    public function search(Request $request)
    {
        $templateId = get_setting('theme_id') ?? 1;
        $lang = $request->lang;
        $type = $request->type;
        try {
            $title = translate('Search') . ': ' . $type;
            $meta_description = get_setting('meta_description');
            $meta_keyward = get_setting('meta_keyward');
            $meta_image = get_setting('header_logo') ? url('assets/logo/' . get_setting('header_logo')) : '';
            if ($type == 'tour') {
                $products = Tour::when($request->destination, function ($q) use ($request) {
                    $destination = Destination::where('destination',$request->destination)->pluck('id')->first();
                    return $q->where('destination_id', $destination);
                })->when($request->tour_type, function ($q) use ($request) {
                    $tour_type = TourCategory::where('name',$request->tour_type)->pluck('id')->first();
                    return $q->where('category_id', $tour_type);
                })->when($request->month, function ($q) {
                        return $q->where('enable_fixed_dates', 1);
                    })->paginate(12);
            } elseif ($type == 'hotel') {
                $cities = explode(', ',$request->destination);
                if(isset($cities[0])){
                    $city = Location::where('name', $cities[0])->pluck('id')->first();
                }else{
                    $city = '';
                }
                $products = Hotel::when($city, function ($q) use ($city) {
                    return $q->where('city_id', $city);
                })->where('room_type', 'like', '%' . $request->room_type . '%')->where('guest_capability', $request->adult_quantity)->paginate(12);
            } elseif ($type == 'activities') {
                $country = Location::where('name',$request->location)->pluck('id')->first();
                $products = Activities::where('country_id', $country)->paginate(12);
            } elseif ($type == 'visa') {
                $products = Visa::when($request->location, function ($q) use ($request) {
                    $country = Location::where('name',$request->location)->pluck('id')->first();
                    return $q->where('country_id', $country);
                })->when($request->visa_type, function ($q) use ($request) {
                    $visa_type = VisaCategory::where('name',$request->visa_type)->pluck('id')->first();
                    return $q->where('category_id', $visa_type);
                })->when($request->visa_mode, function ($q) use ($request) {
                    return $q->where('visa_mode', $request->visa_mode);
                })->paginate(12);
            } elseif ($type == 'transport') {
                $products = Transport::when($request->from_location, function ($q) use ($request) {
                    $city = explode(',',$request->from_location);
                    $city_id = Location::where('name',$city[0])->first();
                    return $q->where('city_id', $city_id->id);
                })->when($request->transport_type, function ($q) use ($request) {
                    if($request->transport_type == 'Car'){
                        return $q->where('car_price','>', 0);
                    }elseif($request->transport_type == 'Bus'){
                        return $q->where('bus_price','>', 0);
                    }elseif($request->transport_type == 'Train'){
                        return $q->where('train_price','>', 0);
                    }elseif($request->transport_type == 'Boat'){
                        return $q->where('boat_price','>', 0);
                    }
                })->paginate(12);
            }
            return view('frontend.template-' . $templateId . '.search-page', compact('title', 'meta_image', 'meta_description', 'meta_keyward', 'products', 'type', 'lang', 'templateId','request'));
        } catch (\Throwable $th) {
            return view('frontend.errors.index', ['templateId' => $templateId, 'lang' => $lang]);
        }
    }


    /**
     * shop_name_available_check
     *
     * @param  mixed $request
     * @return Response
     */
    public function shop_name_available_check(Request $request)
    {

        if ($request->get('shop_name')) {
            $shop_name = $request->get('shop_name');
            $data = Store::where('name', $shop_name)
                ->count();

            return $data;
        }
    }


    /** product review submit from customer.
     *
     * review_submit
     *
     * @param  mixed $request
     * @param  int $id
     */
    public function review_submit(Request $request)
    {
        $lang = $request->lang;
        $templateId = get_setting('theme_id') ?? 1;
        $customer = Auth::user();
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|max:255',
            'product_type' => 'required|max:255',
            'rating' => 'nullable|max:255',
            'review' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        /** Validation */
        if ($request->product_type == 'tour') {
            $product = Tour::findOrFail($request->product_id);
        } elseif ($request->product_type == 'hotel') {
            $product = Hotel::findOrFail($request->product_id);
        } elseif ($request->product_type == 'activities') {
            $product = Activities::findOrFail($request->product_id);
        } elseif ($request->product_type == 'transports') {
            $product = Transport::findOrFail($request->product_id);
        }

        $ProductReview = new Review;
        $ProductReview->rating = $request->rating ?? 0;
        $ProductReview->product_id = $request->product_id;
        $ProductReview->product_type = $request->product_type;
        $ProductReview->user_id = $customer->id;
        $ProductReview->review = $request->review;
        $ProductReview->author_id = $product->author_id;
        $ProductReview->save();

        return redirect()->back()->with('success', translate('Your Rating and Review submit successfully'));
    }

    /**
     * productSearch
     *
     * @param  mixed  $request
     * @param  int  $item
     * @param  string  $lang
     * @param  int  $templateId
     * @return Response
     */
    public function productSearch($request, $item, $templateId, $lang)
    {

        $price_order_by = '';
        $productType = '';
        $keyword = '';
        $min_value = '';
        $max_value = '';
        $destinations = '';

        if (isset($request->product_type) && $request->product_type) {
            $productType = $request->product_type;
        }
        if (isset($request->keyword) && $request->keyword) {
            $keyword = $request->keyword;
        }
        if (isset($request->price_order_by) && $request->price_order_by) {
            $price_order_by = $request->price_order_by;
        }
        if (isset($request->min_value) && $request->min_value) {
            $min_value = $request->min_value;
        }
        if (isset($request->max_value) && $request->max_value) {
            $max_value = $request->max_value;
        }
        if (isset($request->destinations) && $request->destinations) {
            $destinations = $request->destinations;
        }

        if ($productType == 'tour') {
            $products = Tour::where('status', 1);
            if ($destinations) {
                $products->where('destination_id', $destinations);
            }
        } elseif ($productType == 'hotel') {
            $products = Hotel::where('status', 1);
        } elseif ($productType == 'activities') {
            $products = Activities::where('status', 1);
        } elseif ($productType == 'transport') {
            $products = Transport::where('status', 1);
        }

        $products->when($keyword, function ($query) use ($keyword) {
                $query->where('title', 'LIKE', '%' . $keyword . '%');
        });

        if ($min_value && $max_value) {
            if ($productType == 'transport') {
                $products->when($min_value && $max_value, function ($q) use ($min_value, $max_value) {
                    $q->whereBetween('car_price', [$min_value, $max_value])
                        ->orWhereBetween('train_price', [$min_value, $max_value])
                        ->orWhereBetween('bus_price', [$min_value, $max_value])
                        ->orWhereBetween('boat_price', [$min_value, $max_value]);
                });
            } else {
                $products->when($min_value && $max_value, function ($q) use ($min_value, $max_value) {
                    $q->whereBetween('price', [$min_value, $max_value]);
                });
            }
        }
        if ($price_order_by) {
            if ($productType == 'transport') {
            $products->when($price_order_by, function ($query) use ($price_order_by) {
                $query->orderBy('car_price', $price_order_by);
            });
            }else{
                $products->when($price_order_by, function ($query) use ($price_order_by) {
                    $query->orderBy('price', $price_order_by);
                });
            }
        }

        $products = $products->paginate($item ? $item : 9);

        if ($request->ajax()) {
            $data = view('frontend.template-' . $templateId . '.partials.filter-products', compact('products', 'lang', 'productType', 'templateId'))->render();

            return response()->json(['status' => true, 'products' => $data, 'total' => $products->count(), 'first_item' => $products->firstItem(),  'last_item' => $products->lastItem()]);
        }
    }

    public function getState(Request $request)
    {

        $country = Location::findOrFail($request->country_id);
        $states = Location::where('country_id', $country->id)->get();
        return response()->json($states);
    }

    public function getTourCat(Request $request)
    {
        $category = Tour::where('destination_id', $request->des_id)->groupBy('category_id')->pluck('category_id');
        $durations = Tour::where('destination_id', $request->des_id)->pluck('fixed_dates');
        if($durations){
            $dates = [];
            foreach($durations as $duration){
                $durs = json_decode($duration);
                if($durs){
                    foreach($durs as $du){
                        $start_date = Carbon::parse($du->start_date);
                        $end_date = Carbon::parse($du->end_date);
                        $days = $start_date->diffInDays($end_date);
                        $night = $days+1;
                        $dates[] = ['day'=>$days,'duration'=>$days.' Days/'.$night.' Night'];
                    }
                }
            }
            $data['duration'] = array_map("unserialize", array_unique(array_map("serialize", $dates)));
        }else{
            $data['duration'] = '';
        }


        $data['categories'] = TourCategory::whereIn('id',$category)->get();
        return response()->json($data);
    }

}
