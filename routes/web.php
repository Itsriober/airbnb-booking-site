<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\LicenseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
*/


Route::group(['middleware' => ['XssSanitization']], function () {

    Route::controller(App\Http\Controllers\Auth\MerchantRegisterController::class)->group(
        function () {
            Route::get('/agent/register', 'index')->name('agent.register.show');
            Route::post('/agent/register', 'register')->name('agent.register');
        }
    );

    Route::controller(App\Http\Controllers\Auth\AdminLoginController::class)->group(
        function () {
            Route::get('/admin/login', 'index')->name('admin.login.show');
            Route::post('/admin/login', 'login')->name('admin.login');
        }
    );

    Route::group(['middleware' => ['pverify']], function () {

        // ======== HomeController

        Route::controller(HomeController::class)->group(
            function () {

                Route::get('/', 'index')->name('home.page');
                Route::get('/tour/{slug}', 'tour_details')->name('tour.details');
                Route::get('/hotel/{slug}', 'hotel_details')->name('hotel.details');
                Route::get('/activities/{slug}', 'activities_details')->name('activities.details');
                Route::get('/transport/{slug}', 'transport_details')->name('transport.details');
                Route::get('/blogs', 'blogs')->name('blog.page');
                Route::get('blog/category/{slug}', 'blog_category')->name('blog.category');
                Route::get('blog/tag/{name}', 'blog_tag')->name('blog.tag');
                Route::get('/blog/{slug}', 'blog_details')->name('blog.details');
                Route::post('/blog/comment', 'blog_comment')->name('blog.comment');
                Route::post('/contact', 'contact_store')->name('contact.save');

                Route::post('/inquiry', 'inquiry_post')->name('inquiry.post');
                Route::post('/subscribe', 'newsletter_subscribe')->name('newsletter.subscribe');
                Route::get('/search', 'search')->name('main.search');
                Route::post('/shop_name_available_check', 'shop_name_available_check')->name('shop_name_available_check');
                Route::get('/shop/{slug}', 'shop_details')->name('shop.details');
                Route::post('/review/submit', 'review_submit')->name('review.submit');
                Route::get('/visa/{slug}', 'visa_details')->name('visa.details');
                Route::get('/destination/{slug}', 'destination_details')->name('destination.details');
                Route::post('/home/changelanguage', 'homeChangeLanguage')->name('home.change.language');
                Route::post('/get/tour/category',  'getTourCat')->name('get.tour.category');
            }
        );


        Route::post('/changelanguage', [App\Http\Controllers\LanguageController::class, 'changeLanguage'])->name('language.change');

        // Get State and City
        Route::post('/location/get/state', [App\Http\Controllers\LocationController::class, 'get_state'])->name('location.get.state');
        Route::post('/location/get/city', [App\Http\Controllers\LocationController::class, 'get_city'])->name('location.get.city');
        Auth::routes();
    });
    Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);

    Route::controller(App\Http\Controllers\Auth\SocialLoginController::class)->group(
        function () {
            Route::get('/social-login/redirect/{provider}', 'redirectToProvider')->name('social.login');
            Route::get('/social-login/{provider}/callback', 'handleProviderCallback')->name('social.callback');
        }
    );
});

/**
 * Verification Routes
 */
Route::group(
    ['middleware' => ['auth', 'XssSanitization', 'pverify']],
    function () {
        Route::controller(App\Http\Controllers\Auth\VerificationController::class)->group(
            function () {
                Route::get('/email/verify', 'show')->name('verification.notice');
                Route::get('email/{token}/verify', 'verify_email')->name('verification.verify');
                Route::post('/email/resend', 'resend')->name('verification.resend');
            }
        );
    }
);

Route::group(
    ['middleware' => ['auth', 'is_verified', 'customer', 'XssSanitization', 'pverify']],
    function () {
        Route::controller(App\Http\Controllers\HomeController::class)->group(
            function () {
                Route::get('/checkout', 'checkout')->name('checkout');
                Route::post('/checkout', 'checkout_check')->name('checkout.check');
                Route::get('/thank-you', 'thank_you')->name('thank_you');
            }
        );
        Route::post('/razorpay/success', [App\Http\Controllers\RazorpayController::class, 'success'])->name('razorpay.success');
        Route::get('/razorpay/error', [App\Http\Controllers\RazorpayController::class, 'error'])->name('razorpay.error');
    }
);

Route::group(
    ['prefix' => 'customer', 'middleware' => ['auth', 'is_verified', 'customer', 'XssSanitization', 'pverify']],
    function () {
        Route::controller(App\Http\Controllers\HomeController::class)->group(
            function () {
                Route::get('/dashboard', 'dashboard')->name('customer.dashboard');
                Route::get('/setting', 'customer_profile')->name('customer.profile');
                Route::patch('/profile/{id}/update/data', 'customer_update_data')->name('customer.profile.update');
                Route::patch('/profile/{id}/update', 'security_update')->name('customer.security.update');
                Route::get('/booking', 'customer_booking')->name('customer.booking');
                Route::get('/booking/{order_number}/details', 'booking_details')->name('customer.booking.details');

                Route::get('/deposit', 'customer_deposit')->name('customer.deposit');
              
                Route::get('/transaction', 'customer_transaction')->name('customer.transaction');
            }
        );
        Route::controller(App\Http\Controllers\PaymentController::class)->group(function () {
            Route::post('/payment/method', 'customer_payment')->name('customer.payment.method');
        });

        Route::get('/paypal/{type}/success', [App\Http\Controllers\PaypalController::class, 'success'])->name('paypal.success');
        Route::get('/paypal/cancel', [App\Http\Controllers\PaypalController::class, 'error'])->name('paypal.error');
        Route::get('/stripe/confirm', [App\Http\Controllers\StripeController::class, 'confirm'])->name('stripe.confirm');
    }
);

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'backend', 'pverify']], function () {
    Route::group(['middleware' => ['XssSanitization']], function () {
        Route::controller(App\Http\Controllers\AdminController::class)->group(function () {

            Route::get('/', 'index')->name('backend.dashboard');
            Route::get('/profile', 'profile')->name('backend.profile');
            Route::patch('/profile/{id}/update', 'profile_update')->name('backend.profile.update');
            Route::get('/shop', 'shop')->name('backend.shop');
            Route::post('/shop/update', 'shop_update')->name('backend.shop.update');
            Route::get('/transaction', 'transaction')->name('backend.transaction');
            Route::get('/order-info', 'order')->name('backend.order.info');
            Route::get('/order-details/{id}', 'order_details')->name('backend.order.details');
            Route::post('/order/change/status', 'changeStatus')->name('order.change.status');
            Route::get('/delete/old-data', 'deleteDemoData')->name('deleteDemoData');
        });
    });

    Route::group(
        ['middleware' => ['admin']],
        function () {

            // Merchant
            Route::group(
                ['prefix' => 'merchant'],
                function () {
                    Route::controller(App\Http\Controllers\MerchantController::class)->group(
                        function () {

                            Route::get('/', 'index')->name('merchant.list');
                            Route::get('/create', 'create')->name('merchant.create');
                            Route::post('/store', 'store')->name('merchant.store');
                            Route::get('/{id}/edit', 'edit')->name('merchant.edit');
                            Route::patch('/{id}/update', 'update')->name('merchant.update');
                            Route::delete('/{id}/destroy', 'destroy')->name('merchant.delete');
                            Route::post('/change/status', 'changeStatus')->name('merchant.change.status');
                            Route::get('/{id}/profile', 'show')->name('merchant.view');
                            Route::get('/login/{id}', 'login')->name('merchant.login');
                        }
                    );
                }
            );
            // ================= menu Settings

            Route::group(
                ['prefix' => 'menu'],
                function () {

                    Route::controller(MenuController::class)->group(
                        function () {
                            Route::get('manage/{id?}', 'menu')->name('menu.list');
                            Route::get('add-menu', 'addToMenu')->name('add.menu');
                            Route::get('menu-item', 'storeMenuItem')->name('menu.item');
                            Route::get('menu-item-edit/{id}', 'editMenuItem')->name('menu.item.edit');
                            Route::post('menu-item-update', 'updateMenuItem')->name('menu.item.update');
                            Route::get('menu-item-delete/{id}', 'deleteMenuItem')->name('menu.item.delete');
                        }
                    );
                }
            );

            // Email Template
            Route::group(
                ['prefix' => 'email/template'],
                function () {

                    Route::controller(App\Http\Controllers\EmailTemplateController::class)->group(
                        function () {
                            Route::get('/', 'index')->name('email.template.list');
                            Route::get('/{id}/edit', 'edit')->name('email.template.edit');
                            Route::patch('/{id}/update', 'update')->name('email.template.update');
                        }
                    );
                }
            );

            // Frontend Settings
            Route::group(
                ['prefix' => 'frontend/settings'],
                function () {
                    Route::controller(App\Http\Controllers\FrontendSettingController::class)->group(
                        function () {
                            Route::get('/', 'index')->name('frontend.setting');
                            Route::post('/store', 'store')->name('frontend.settings.store');
                        }
                    );
                }
            );

            // Backend Settings
            Route::group(
                ['prefix' => 'backend/settings'],
                function () {
                    Route::controller(App\Http\Controllers\BackendSettingController::class)->group(
                        function () {
                            Route::get('/', 'index')->name('backend.setting');
                            Route::post('/store', 'store')->name('backend.settings.store');
                            Route::post('/testmail', 'sendTestMail')->name('backend.testmail');
                            Route::get('/cache-clear', 'cacheClear')->name('backend.cache-clear');
                        }
                    );
                }
            );

            // Payment Methods
            Route::group(
                ['prefix' => 'payment/methods'],
                function () {
                    Route::controller(App\Http\Controllers\PaymentMethodController::class)->group(
                        function () {
                            Route::get('/', 'index')->name('payment.methods');
                            Route::post('/edit', 'edit')->name('payment.methods.edit');
                            Route::post('/update', 'update')->name('payment.methods.update');
                            Route::post('/change/status', 'changeStatus')->name('payment.methods.status.change');
                        }
                    );
                }
            );

            // Customer
            Route::group(
                ['prefix' => 'customer'],
                function () {

                    Route::controller(App\Http\Controllers\CustomerController::class)->group(
                        function () {
                            Route::get('/', 'index')->name('customer.list');
                            Route::get('/create', 'create')->name('customer.create');
                            Route::post('/store', 'store')->name('customer.store');
                            Route::get('/{id}/edit', 'edit')->name('customer.edit');
                            Route::patch('/{id}/update', 'update')->name('customer.update');
                            Route::delete('/{id}/destroy', 'destroy')->name('customer.delete');
                            Route::post('/change/status', 'changeStatus')->name('customer.change.status');
                            Route::get('/{id}/profile', 'show')->name('customer.view');
                            Route::get('/login/{id}', 'login')->name('customer.login');
                        }
                    );
                }
            );

            // ============== Language

            Route::group(
                ['prefix' => 'languages'],
                function () {

                    Route::controller(App\Http\Controllers\LanguageController::class)->group(
                        function () {

                            Route::get('', 'index')->name('languages.list');
                            Route::get('/create', 'create')->name('languages.create');
                            Route::post('/store', 'store')->name('languages.store');
                            Route::get('/{id}/edit', 'edit')->name('languages.edit');
                            Route::post('/{id}/update', 'update')->name('languages.update');
                            Route::delete('/{id}/destroy', 'destroy')->name('languages.delete');
                            Route::post('/change/status', 'changeStatus')->name('languages.change.status');
                            Route::get('/{id}', 'translations')->name('languages.translations');
                            Route::post('/{id}/key_value_store', 'key_value_store')->name('languages.key_value_store');
                        }
                    );
                }
            );

            // ============== Contact

            Route::group(
                ['prefix' => 'contacts'],
                function () {

                    Route::controller(App\Http\Controllers\ContactController::class)->group(
                        function () {
                            Route::get('/', 'index')->name('contact.list');
                            Route::get('/{id}/view', 'show')->name('contact.view');
                            Route::delete('/{id}/destroy', 'destroy')->name('contact.delete');
                        }
                    );
                }
            );

            // Location

            Route::controller(App\Http\Controllers\LocationController::class)->group(
                function () {

                    Route::get('/location', 'index')->name('location.list');
                    Route::post('/country/store', 'store')->name('country.store');
                    Route::get('country/{id}/edit', 'edit')->name('country.edit');
                    Route::patch('country/{id}/update', 'update')->name('country.update');
                    Route::delete('country/{id}/destroy', 'destroy')->name('country.delete');
                    Route::get('state/{id}/create', 'state_create')->name('state.create');
                    Route::post('state/{id}/store', 'state_store')->name('state.store');
                    Route::get('state/{id}/edit', 'state_edit')->name('state.edit');
                    Route::patch('state/{id}/update', 'state_update')->name('state.update');
                    Route::delete('state/{id}/destroy', 'state_destroy')->name('state.delete');
                    Route::get('city/{id}/create', 'city_create')->name('city.create');
                    Route::post('city/{id}/store', 'city_store')->name('city.store');
                    Route::get('city/{id}/edit', 'city_edit')->name('city.edit');
                    Route::patch('city/{id}/update', 'city_update')->name('city.update');
                    Route::delete('city/{id}/destroy', 'city_destroy')->name('city.delete');
                }
            );

            // Deposits
            Route::get('/deposits', [App\Http\Controllers\DepositController::class, 'index'])->name('deposits.list');

            // ============ Pages

            Route::group(
                ['prefix' => 'pages'],
                function () {

                    Route::controller(App\Http\Controllers\PageController::class)->group(
                        function () {
                            Route::get('/', 'index')->name('page.list');
                            Route::post('/store', 'store')->name('page.store');
                            Route::get('/{id}/edit', 'edit')->name('page.edit');
                            Route::patch('/{id}/update', 'update')->name('page.update');
                            Route::delete('/{id}/destroy', 'destroy')->name('page.delete');
                            Route::post('/change/status', 'changeStatus')->name('page.change.status');
                            Route::get('add-widget-page/{slug}', 'widgetAddedToPage')->name('pages.add.widget');
                            Route::post('widget-save-by-page', 'widgetUpdateByPage')->name('pages.widget.save');
                            Route::get('/widget-status/{id}', 'widgetStatusChange')->name('pages.widget.status.change');
                            Route::get('widget-delete-by-page/{id}', 'widgetDeleteByPage')->name('pages.widget.delete');
                            Route::get('/widget-sorted-by-page', 'widgetSortedByPage')->name('pages.widget.storted');
                            Route::post('/image-upload-file', 'imageUpload')->name('pages.image.upload');
                        }
                    );
                }
            );

            // Blog
            Route::group(
                ['prefix' => 'blogs'],
                function () {

                    Route::controller(App\Http\Controllers\BlogCategoryController::class)->group(
                        function () {

                            Route::get('/category', 'index')->name('blog.category.list');
                            Route::post('/category/store', 'store')->name('blog.category.store');
                            Route::get('category/{id}/edit', 'edit')->name('blog.category.edit');
                            Route::patch('category/{id}/update', 'update')->name('blog.category.update');
                            Route::delete('category/{id}/destroy', 'destroy')->name('blog.category.delete');
                            Route::post('category/change/status', 'changeStatus')->name('blog.category.change.status');
                        }
                    );

                    Route::controller(App\Http\Controllers\BlogController::class)->group(
                        function () {
                            Route::get('/', 'index')->name('blog.list');
                            Route::get('/create', 'create')->name('blog.create');
                            Route::post('/store', 'store')->name('blog.store');
                            Route::get('/{id}/edit', 'edit')->name('blog.edit');
                            Route::patch('/{id}/update', 'update')->name('blog.update');
                            Route::delete('/{id}/destroy', 'destroy')->name('blog.delete');
                            Route::post('change/status', 'changeStatus')->name('blog.change.status');
                        }
                    );
                }
            );
        }
    );

    // Hotel Attribute
    Route::group(['prefix' => 'hotel/attribute'], function () {
        Route::controller(App\Http\Controllers\HotelAttributeController::class)->group(
            function () {
                Route::get('/', 'index')->name('hotel.attribute.list');
                Route::post('/store', 'store')->name('hotel.attribute.store');
                Route::get('/{id}/edit', 'edit')->name('hotel.attribute.edit');
                Route::patch('/{id}/update', 'update')->name('hotel.attribute.update');
                Route::delete('/{id}/destroy', 'destroy')->name('hotel.attribute.delete');
            }
        );
    });

    // Hotel Attribute Terms
    Route::group(['prefix' => 'hotel/attribute/{attribute_id}/terms'], function () {
        Route::controller(App\Http\Controllers\HotelAttributeTermController::class)->group(
            function () {
                Route::get('/', 'index')->name('hotel.attribute.terms.list');
                Route::post('/store', 'store')->name('hotel.attribute.terms.store');
                Route::get('/{id}/edit', 'edit')->name('hotel.attribute.terms.edit');
                Route::patch('/{id}/update', 'update')->name('hotel.attribute.terms.update');
                Route::delete('/{id}/destroy', 'destroy')->name('hotel.attribute.terms.delete');
            }
        );
    });

    // Hotels
    Route::group(['prefix' => 'hotels'], function () {
        Route::controller(App\Http\Controllers\HotelController::class)->group(
            function () {
                Route::get('/', 'index')->name('hotels.list');
                Route::get('/create', 'create')->name('hotels.create');
                Route::post('/store', 'store')->name('hotels.store');
                Route::get('/{id}/edit', 'edit')->name('hotels.edit');
                Route::patch('/{id}/update', 'update')->name('hotels.update');
                Route::delete('/{id}/destroy', 'destroy')->name('hotels.delete');
                Route::post('/change/status', 'changeStatus')->name('hotels.change.status');
                Route::patch('/{id}/approve', 'approve')->name('hotels.approve');
                Route::post('/gallery/remove', 'gallery_remove')->name('hotels.gallery.remove');
                Route::get('/review/{id}', 'review')->name('hotels.review');
                Route::post('/reply', 'reply')->name('hotels.review.reply');
                Route::post('/review/change/status', 'reviewStatus')->name('hotel.review.change.status');
            }
        );
    });

    // Tour Attribute
    Route::group(['prefix' => 'tour/attribute'], function () {
        Route::controller(App\Http\Controllers\TourAttributeController::class)->group(
            function () {
                Route::get('/', 'index')->name('tour.attribute.list');
                Route::post('/store', 'store')->name('tour.attribute.store');
                Route::get('/{id}/edit', 'edit')->name('tour.attribute.edit');
                Route::patch('/{id}/update', 'update')->name('tour.attribute.update');
                Route::delete('/{id}/destroy', 'destroy')->name('tour.attribute.delete');
            }
        );
    });

    // Tour Attribute Terms
    Route::group(['prefix' => 'tour/attribute/{attribute_id}/terms'], function () {
        Route::controller(App\Http\Controllers\TourAttributeTermController::class)->group(
            function () {
                Route::get('/', 'index')->name('tour.attribute.terms.list');
                Route::post('/store', 'store')->name('tour.attribute.terms.store');
                Route::get('/{id}/edit', 'edit')->name('tour.attribute.terms.edit');
                Route::patch('/{id}/update', 'update')->name('tour.attribute.terms.update');
                Route::delete('/{id}/destroy', 'destroy')->name('tour.attribute.terms.delete');
            }
        );
    });

    // Tour Category
    Route::group(['prefix' => 'tour/category'], function () {
        Route::controller(App\Http\Controllers\TourCategoryController::class)->group(
            function () {
                Route::get('/', 'index')->name('tour.category.list');
                Route::post('/store', 'store')->name('tour.category.store');
                Route::get('/{id}/edit', 'edit')->name('tour.category.edit');
                Route::patch('/{id}/update', 'update')->name('tour.category.update');
                Route::delete('/{id}/destroy', 'destroy')->name('tour.category.delete');
                Route::post('/change/status', 'changeStatus')->name('tours.category.change.status');
            }
        );
    });

    // Tours
    Route::group(['prefix' => 'tours'], function () {
        Route::controller(App\Http\Controllers\TourController::class)->group(
            function () {
                Route::get('/', 'index')->name('tours.list');
                Route::get('/create', 'create')->name('tours.create');
                Route::post('/store', 'store')->name('tours.store');
                Route::get('/{id}/edit', 'edit')->name('tours.edit');
                Route::patch('/{id}/update', 'update')->name('tours.update');
                Route::delete('/{id}/destroy', 'destroy')->name('tours.delete');
                Route::post('/change/status', 'changeStatus')->name('tours.change.status');
                Route::post('/change/featured', 'changeFeatured')->name('tours.change.featured');
                Route::patch('/{id}/approve', 'approve')->name('tours.approve');
                Route::post('/gallery/remove', 'gallery_remove')->name('tours.gallery.remove');
                Route::get('/review/{id}', 'review')->name('tours.review');
                Route::post('/reply', 'reply')->name('tours.review.reply');
                Route::post('/review/change/status', 'reviewStatus')->name('tour.review.change.status');
            }
        );
    });

    // Activities Attribute
    Route::group(['prefix' => 'activities/attribute'], function () {
        Route::controller(App\Http\Controllers\ActivitiesAttributeController::class)->group(
            function () {
                Route::get('/', 'index')->name('activities.attribute.list');
                Route::post('/store', 'store')->name('activities.attribute.store');
                Route::get('/{id}/edit', 'edit')->name('activities.attribute.edit');
                Route::patch('/{id}/update', 'update')->name('activities.attribute.update');
                Route::delete('/{id}/destroy', 'destroy')->name('activities.attribute.delete');
            }
        );
    });

    // Activities Attribute Terms
    Route::group(['prefix' => 'activities/attribute/{attribute_id}/terms'], function () {
        Route::controller(App\Http\Controllers\ActivitiesAttributeTermController::class)->group(
            function () {
                Route::get('/', 'index')->name('activities.attribute.terms.list');
                Route::post('/store', 'store')->name('activities.attribute.terms.store');
                Route::get('/{id}/edit', 'edit')->name('activities.attribute.terms.edit');
                Route::patch('/{id}/update', 'update')->name('activities.attribute.terms.update');
                Route::delete('/{id}/destroy', 'destroy')->name('activities.attribute.terms.delete');
            }
        );
    });

    // Activities
    Route::group(['prefix' => 'activities'], function () {
        Route::controller(App\Http\Controllers\ActivitiesController::class)->group(
            function () {
                Route::get('/', 'index')->name('activities.list');
                Route::get('/create', 'create')->name('activities.create');
                Route::post('/store', 'store')->name('activities.store');
                Route::get('/{id}/edit', 'edit')->name('activities.edit');
                Route::patch('/{id}/update', 'update')->name('activities.update');
                Route::delete('/{id}/destroy', 'destroy')->name('activities.delete');
                Route::post('/change/status', 'changeStatus')->name('activities.change.status');
                Route::patch('/{id}/approve', 'approve')->name('activities.approve');
                Route::post('/gallery/remove', 'gallery_remove')->name('activities.gallery.remove');
                Route::get('/review/{id}', 'review')->name('activities.review');
                Route::post('/reply', 'reply')->name('activities.review.reply');
                Route::post('/review/change/status', 'reviewStatus')->name('activities.review.change.status');
            }
        );
    });

    // transports Attribute
    Route::group(['prefix' => 'transports/attribute'], function () {
        Route::controller(App\Http\Controllers\TransportAttributeController::class)->group(
            function () {
                Route::get('/', 'index')->name('transports.attribute.list');
                Route::post('/store', 'store')->name('transports.attribute.store');
                Route::get('/{id}/edit', 'edit')->name('transports.attribute.edit');
                Route::patch('/{id}/update', 'update')->name('transports.attribute.update');
                Route::delete('/{id}/destroy', 'destroy')->name('transports.attribute.delete');
            }
        );
    });

    // transports Attribute Terms
    Route::group(['prefix' => 'transports/attribute/{attribute_id}/terms'], function () {
        Route::controller(App\Http\Controllers\TransportAttributeTermController::class)->group(
            function () {
                Route::get('/', 'index')->name('transports.attribute.terms.list');
                Route::post('/store', 'store')->name('transports.attribute.terms.store');
                Route::get('/{id}/edit', 'edit')->name('transports.attribute.terms.edit');
                Route::patch('/{id}/update', 'update')->name('transports.attribute.terms.update');
                Route::delete('/{id}/destroy', 'destroy')->name('transports.attribute.terms.delete');
            }
        );
    });

    // transports
    Route::group(['prefix' => 'transports'], function () {
        Route::controller(App\Http\Controllers\TransportController::class)->group(
            function () {
                Route::get('/', 'index')->name('transports.list');
                Route::get('/create', 'create')->name('transports.create');
                Route::post('/store', 'store')->name('transports.store');
                Route::get('/{id}/edit', 'edit')->name('transports.edit');
                Route::patch('/{id}/update', 'update')->name('transports.update');
                Route::delete('/{id}/destroy', 'destroy')->name('transports.delete');
                Route::post('/change/status', 'changeStatus')->name('transports.change.status');
                Route::patch('/{id}/approve', 'approve')->name('transports.approve');
                Route::post('/gallery/remove', 'gallery_remove')->name('transports.gallery.remove');
                Route::get('/review/{id}', 'review')->name('transport.review');
                Route::post('/reply', 'reply')->name('transport.review.reply');
                Route::post('/review/change/status', 'reviewStatus')->name('transports.review.change.status');
            }
        );
    });

    // Destination
    Route::group(['prefix' => 'destination'], function () {
        Route::controller(App\Http\Controllers\DestinationController::class)->group(
            function () {
                Route::get('/', 'index')->name('destination.list');
                Route::get('/create', 'create')->name('destination.create');
                Route::post('/store', 'store')->name('destination.store');
                Route::get('/{id}/edit', 'edit')->name('destination.edit');
                Route::patch('/{id}/update', 'update')->name('destination.update');
                Route::delete('/{id}/destroy', 'destroy')->name('destination.delete');
                Route::post('/change/status', 'changeStatus')->name('destination.change.status');
                Route::patch('/{id}/approve', 'approve')->name('destination.approve');
                Route::post('/gallery/remove', 'gallery_remove')->name('destination.gallery.remove');
            }
        );
    });
    // Visa Category
    Route::group(['prefix' => 'visa/category'], function () {
        Route::controller(App\Http\Controllers\VisaCategoryController::class)->group(
            function () {
                Route::get('/', 'index')->name('visa.category.list');
                Route::post('/store', 'store')->name('visa.category.store');
                Route::get('/{id}/edit', 'edit')->name('visa.category.edit');
                Route::patch('/{id}/update', 'update')->name('visa.category.update');
                Route::delete('/{id}/destroy', 'destroy')->name('visa.category.delete');
                Route::post('/change/status', 'changeStatus')->name('visa.category.change.status');
            }
        );
    });
    // Visa
    Route::group(['prefix' => 'visa'], function () {
        Route::controller(App\Http\Controllers\VisaController::class)->group(
            function () {
                Route::get('/', 'index')->name('visa.list');
                Route::get('/create', 'create')->name('visa.create');
                Route::post('/store', 'store')->name('visa.store');
                Route::get('/{id}/edit', 'edit')->name('visa.edit');
                Route::patch('/{id}/update', 'update')->name('visa.update');
                Route::delete('/{id}/destroy', 'destroy')->name('visa.delete');
                Route::post('/change/status', 'changeStatus')->name('visa.change.status');
                Route::patch('/{id}/approve', 'approve')->name('visa.approve');
            }
        );
    });

    // Inquiry
    Route::group(['prefix' => 'inquiry'], function () {
        Route::controller(App\Http\Controllers\InquiryController::class)->group(
            function () {
                Route::get('/', 'index')->name('inquiry.list');
                Route::post('/change/status', 'changeStatus')->name('inquiry.change.status');
                Route::delete('/{id}/destroy', 'destroy')->name('inquiry.delete');
            }
        );
    });



    // ============ withdraws

    Route::group(
        ['prefix' => 'withdraw'],
        function () {
            Route::controller(App\Http\Controllers\WithdrawController::class)->group(
                function () {
                    Route::get('/', 'index')->name('withdraw.list');
                    Route::get('/request', 'withdraw_new')->name('withdraw.new');
                    Route::post('/request', 'withdraw_request')->name('withdraw.request');
                    Route::get('/details/{id}', 'details')->name('withdraw.details');
                    Route::patch('/status/{id}', 'status')->name('withdraw.status.change');
                }
            );
        }
    );

    // Support Ticket
    Route::group(
        ['prefix' => 'supports'],
        function () {

            Route::controller(App\Http\Controllers\SupportTicketController::class)->group(
                function () {
                    Route::get('/', 'index')->name('support.list');
                    Route::get('/create', 'create')->name('support.create');
                    Route::post('/store', 'store')->name('support.store');
                    Route::get('/{id}/reply', 'edit')->name('support.edit');
                    Route::patch('/{id}/update', 'update')->name('support.update');
                    Route::delete('/{id}/destroy', 'destroy')->name('support.delete');
                    Route::get('close-ticket/{supportId}', 'closeTicket')->name('support.close.ticket');
                }
            );
        }
    );
});

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'backend']],  function () {

    Route::group(['prefix' => 'license'], function () {
        Route::get('/', [LicenseController::class, 'index'])->name('updateform.application');
        Route::get('/verify', [LicenseController::class, 'licenseVerifyForm'])->name('license.verify');
        Route::post('theme-update', [LicenseController::class, 'themeUpdate'])->name('update.theme');
        Route::post('license-verify-update', [LicenseController::class, 'verifyUpdate'])->name('license.verify.update');
        Route::post('license-purcahase-remove', [LicenseController::class, 'purcahaseRemove'])->name('license.purcahase.remove');
    });
});



Route::group(['middleware' => ['XssSanitization', 'pverify']], function () {
    Route::get('/{slug}', [App\Http\Controllers\HomeController::class, 'loadPagesContent'])->name('all_pages');
});
