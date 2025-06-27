<?php

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/sanctum/csrf-cookie' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sanctum.csrf-cookie',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/install' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'install',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/install/requirements' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'install.requirement',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/install/permission' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'install.permission',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/install/environment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'install.environment',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/install/database' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'install.database',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/install/import-demo' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'install.import-demo',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/install/demo' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'install.demo',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/install/final' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'install.final',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/install/purchase-code' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'purchase.code',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Z33exoxGx6OPSu3i',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agent/register' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent.register.show',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'agent.register',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.login.show',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.login',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'home.page',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/blogs' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'blog.page',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/contact' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'contact.save',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/inquiry' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'inquiry.post',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/subscribe' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'newsletter.subscribe',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/search' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'main.search',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/shop_name_available_check' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'shop_name_available_check',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/review/submit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'review.submit',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/home/changelanguage' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'home.change.language',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/get/tour/category' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'get.tour.category',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/changelanguage' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'language.change',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/location/get/state' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'location.get.state',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/location/get/city' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'location.get.city',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'login',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::qLenZpnlCxNsPI7b',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'logout',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::gyI8YQt887rvH2d3',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/register' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'register',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Z92M7bjbu7ovENev',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/password/reset' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.request',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'password.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/password/email' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.email',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/password/confirm' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.confirm',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::834Lzs2b7rfJUtNP',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/email/verify' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'verification.notice',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/email/resend' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'verification.resend',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/checkout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'checkout',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'checkout.check',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/thank-you' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'thank_you',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/razorpay/success' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'razorpay.success',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/razorpay/error' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'razorpay.error',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/customer/dashboard' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.dashboard',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/customer/setting' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.profile',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/customer/booking' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.booking',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/customer/transaction' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.transaction',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/customer/payment/method' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.payment.method',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/customer/paypal/cancel' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'paypal.error',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/customer/stripe/confirm' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'stripe.confirm',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.dashboard',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.profile',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/shop' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.shop',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/shop/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.shop.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/transaction' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.transaction',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/order-info' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.order.info',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/order/change/status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'order.change.status',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/delete/old-data' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'deleteDemoData',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/merchant' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'merchant.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/merchant/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'merchant.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/merchant/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'merchant.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/merchant/change/status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'merchant.change.status',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/menu/add-menu' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'add.menu',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/menu/menu-item' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'menu.item',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/menu/menu-item-update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'menu.item.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/email/template' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'email.template.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/frontend/settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'frontend.setting',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/frontend/settings/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'frontend.settings.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/backend/settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.setting',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/backend/settings/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.settings.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/backend/settings/testmail' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.testmail',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/backend/settings/cache-clear' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.cache-clear',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/payment/methods' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payment.methods',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/payment/methods/edit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payment.methods.edit',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/payment/methods/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payment.methods.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/payment/methods/change/status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payment.methods.status.change',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/customer' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/customer/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/customer/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/customer/change/status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.change.status',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/languages' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'languages.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/languages/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'languages.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/languages/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'languages.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/languages/change/status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'languages.change.status',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/contacts' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'contact.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/location' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'location.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/country/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'country.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/deposits' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'deposits.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/pages' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'page.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/pages/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'page.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/pages/change/status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'page.change.status',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/pages/widget-save-by-page' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pages.widget.save',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/pages/widget-sorted-by-page' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pages.widget.storted',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/pages/image-upload-file' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pages.image.upload',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/blogs/category' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'blog.category.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/blogs/category/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'blog.category.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/blogs/category/change/status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'blog.category.change.status',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/blogs' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'blog.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/blogs/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'blog.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/blogs/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'blog.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/blogs/change/status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'blog.change.status',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/hotel/attribute' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'hotel.attribute.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/hotel/attribute/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'hotel.attribute.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/hotels' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'hotels.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/hotels/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'hotels.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/hotels/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'hotels.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/hotels/change/status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'hotels.change.status',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/hotels/gallery/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'hotels.gallery.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/hotels/reply' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'hotels.review.reply',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/hotels/review/change/status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'hotel.review.change.status',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/tour/attribute' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tour.attribute.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/tour/attribute/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tour.attribute.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/tour/category' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tour.category.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/tour/category/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tour.category.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/tour/category/change/status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tours.category.change.status',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/tours' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tours.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/tours/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tours.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/tours/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tours.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/tours/change/status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tours.change.status',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/tours/change/featured' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tours.change.featured',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/tours/gallery/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tours.gallery.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/tours/reply' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tours.review.reply',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/tours/review/change/status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tour.review.change.status',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/activities/attribute' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'activities.attribute.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/activities/attribute/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'activities.attribute.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/activities' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'activities.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/activities/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'activities.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/activities/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'activities.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/activities/change/status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'activities.change.status',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/activities/gallery/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'activities.gallery.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/activities/reply' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'activities.review.reply',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/activities/review/change/status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'activities.review.change.status',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/transports/attribute' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'transports.attribute.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/transports/attribute/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'transports.attribute.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/transports' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'transports.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/transports/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'transports.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/transports/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'transports.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/transports/change/status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'transports.change.status',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/transports/gallery/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'transports.gallery.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/transports/reply' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'transport.review.reply',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/transports/review/change/status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'transports.review.change.status',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/destination' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'destination.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/destination/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'destination.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/destination/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'destination.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/destination/change/status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'destination.change.status',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/destination/gallery/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'destination.gallery.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/visa/category' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'visa.category.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/visa/category/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'visa.category.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/visa/category/change/status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'visa.category.change.status',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/visa' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'visa.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/visa/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'visa.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/visa/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'visa.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/visa/change/status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'visa.change.status',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/inquiry' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'inquiry.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/inquiry/change/status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'inquiry.change.status',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/supports' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'support.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/supports/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'support.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/supports/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'support.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/license' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'updateform.application',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/license/verify' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'license.verify',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/license/theme-update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update.theme',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/license/license-verify-update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'license.verify.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/license/license-purcahase-remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'license.purcahase.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/users' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'users.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/t(?|our/([^/]++)(*:24)|ransport/([^/]++)(*:48))|/hotel/([^/]++)(*:71)|/activities/([^/]++)(*:98)|/blog/(?|category/([^/]++)(*:131)|tag/([^/]++)(*:151)|([^/]++)(*:167)|comment(*:182))|/s(?|hop/([^/]++)(*:208)|ocial\\-login/(?|redirect/([^/]++)(*:249)|([^/]++)/callback(*:274)))|/visa/([^/]++)(*:298)|/d(?|estination/([^/]++)(*:330)|ashboard/(?|p(?|rofile/([^/]++)/update(*:376)|ages/(?|([^/]++)/(?|edit(*:408)|update(*:422)|destroy(*:437))|add\\-widget\\-page/([^/]++)(*:472)|widget\\-(?|status/([^/]++)(*:506)|delete\\-by\\-page/([^/]++)(*:539))))|order\\-details/([^/]++)(*:573)|me(?|rchant/(?|([^/]++)/(?|edit(*:612)|update(*:626)|destroy(*:641)|profile(*:656))|login/([^/]++)(*:679))|nu/m(?|anage(?:/([^/]++))?(*:714)|enu\\-item\\-(?|edit/([^/]++)(*:749)|delete/([^/]++)(*:772))))|email/template/([^/]++)/(?|edit(*:814)|update(*:828))|c(?|ustomer/(?|([^/]++)/(?|edit(*:868)|update(*:882)|destroy(*:897)|profile(*:912))|login/([^/]++)(*:935))|o(?|ntacts/([^/]++)/(?|view(*:971)|destroy(*:986))|untry/([^/]++)/(?|edit(*:1017)|update(*:1032)|destroy(*:1048)))|ity/([^/]++)/(?|create(*:1081)|store(*:1095)|edit(*:1108)|update(*:1123)|destroy(*:1139)))|languages/([^/]++)(?|/(?|edit(*:1179)|update(*:1194)|destroy(*:1210)|key_value_store(*:1234))|(*:1244))|s(?|tate/([^/]++)/(?|create(*:1281)|store(*:1295)|edit(*:1308)|update(*:1323)|destroy(*:1339))|upports/(?|([^/]++)/(?|reply(*:1377)|update(*:1392)|destroy(*:1408))|close\\-ticket/([^/]++)(*:1440)))|blogs/(?|category/([^/]++)/(?|edit(*:1485)|update(*:1500)|destroy(*:1516))|([^/]++)/(?|edit(*:1542)|update(*:1557)|destroy(*:1573)))|hotel(?|/attribute/([^/]++)/(?|edit(*:1619)|update(*:1634)|destroy(*:1650)|terms(?|(*:1667)|/(?|store(*:1685)|([^/]++)/(?|edit(*:1710)|update(*:1725)|destroy(*:1741)))))|s/(?|([^/]++)/(?|edit(*:1775)|update(*:1790)|destroy(*:1806)|approve(*:1822))|review/([^/]++)(*:1847)))|t(?|our(?|/(?|attribute/([^/]++)/(?|edit(*:1898)|update(*:1913)|destroy(*:1929)|terms(?|(*:1946)|/(?|store(*:1964)|([^/]++)/(?|edit(*:1989)|update(*:2004)|destroy(*:2020)))))|category/([^/]++)/(?|edit(*:2058)|update(*:2073)|destroy(*:2089)))|s/(?|([^/]++)/(?|edit(*:2121)|update(*:2136)|destroy(*:2152)|approve(*:2168))|review/([^/]++)(*:2193)))|ransports/(?|attribute/([^/]++)/(?|edit(*:2243)|update(*:2258)|destroy(*:2274)|terms(?|(*:2291)|/(?|store(*:2309)|([^/]++)/(?|edit(*:2334)|update(*:2349)|destroy(*:2365)))))|([^/]++)/(?|edit(*:2394)|update(*:2409)|destroy(*:2425)|approve(*:2441))|review/([^/]++)(*:2466)))|activities/(?|attribute/([^/]++)/(?|edit(*:2517)|update(*:2532)|destroy(*:2548)|terms(?|(*:2565)|/(?|store(*:2583)|([^/]++)/(?|edit(*:2608)|update(*:2623)|destroy(*:2639)))))|([^/]++)/(?|edit(*:2668)|update(*:2683)|destroy(*:2699)|approve(*:2715))|review/([^/]++)(*:2740))|destination/([^/]++)/(?|edit(*:2778)|update(*:2793)|destroy(*:2809)|approve(*:2825))|visa/(?|category/([^/]++)/(?|edit(*:2868)|update(*:2883)|destroy(*:2899))|([^/]++)/(?|edit(*:2925)|update(*:2940)|destroy(*:2956)|approve(*:2972)))|inquiry/([^/]++)/destroy(*:3007)))|/password/reset/([^/]++)(*:3042)|/email/([^/]++)/verify(*:3073)|/customer/(?|p(?|rofile/([^/]++)/update(?|/data(*:3129)|(*:3138))|aypal/([^/]++)/success(*:3170))|booking/([^/]++)/details(*:3204))|/([^/]++)(*:3223))/?$}sDu',
    ),
    3 => 
    array (
      24 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tour.details',
          ),
          1 => 
          array (
            0 => 'slug',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      48 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'transport.details',
          ),
          1 => 
          array (
            0 => 'slug',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      71 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'hotel.details',
          ),
          1 => 
          array (
            0 => 'slug',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      98 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'activities.details',
          ),
          1 => 
          array (
            0 => 'slug',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      131 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'blog.category',
          ),
          1 => 
          array (
            0 => 'slug',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      151 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'blog.tag',
          ),
          1 => 
          array (
            0 => 'name',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      167 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'blog.details',
          ),
          1 => 
          array (
            0 => 'slug',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      182 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'blog.comment',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      208 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'shop.details',
          ),
          1 => 
          array (
            0 => 'slug',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      249 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'social.login',
          ),
          1 => 
          array (
            0 => 'provider',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      274 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'social.callback',
          ),
          1 => 
          array (
            0 => 'provider',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      298 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'visa.details',
          ),
          1 => 
          array (
            0 => 'slug',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      330 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'destination.details',
          ),
          1 => 
          array (
            0 => 'slug',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      376 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.profile.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      408 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'page.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      422 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'page.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      437 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'page.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      472 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pages.add.widget',
          ),
          1 => 
          array (
            0 => 'slug',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      506 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pages.widget.status.change',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      539 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pages.widget.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      573 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.order.details',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      612 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'merchant.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      626 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'merchant.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      641 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'merchant.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      656 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'merchant.view',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      679 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'merchant.login',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      714 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'menu.list',
            'id' => NULL,
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      749 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'menu.item.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      772 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'menu.item.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      814 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'email.template.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      828 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'email.template.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      868 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      882 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      897 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      912 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.view',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      935 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.login',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      971 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'contact.view',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      986 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'contact.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1017 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'country.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1032 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'country.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1048 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'country.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1081 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.create',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1095 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.store',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1108 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1123 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1139 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1179 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'languages.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1194 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'languages.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1210 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'languages.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1234 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'languages.key_value_store',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1244 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'languages.translations',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1281 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'state.create',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1295 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'state.store',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1308 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'state.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1323 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'state.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1339 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'state.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1377 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'support.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1392 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'support.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1408 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'support.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1440 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'support.close.ticket',
          ),
          1 => 
          array (
            0 => 'supportId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1485 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'blog.category.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1500 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'blog.category.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1516 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'blog.category.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1542 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'blog.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1557 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'blog.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1573 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'blog.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1619 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'hotel.attribute.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1634 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'hotel.attribute.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1650 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'hotel.attribute.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1667 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'hotel.attribute.terms.list',
          ),
          1 => 
          array (
            0 => 'attribute_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1685 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'hotel.attribute.terms.store',
          ),
          1 => 
          array (
            0 => 'attribute_id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1710 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'hotel.attribute.terms.edit',
          ),
          1 => 
          array (
            0 => 'attribute_id',
            1 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1725 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'hotel.attribute.terms.update',
          ),
          1 => 
          array (
            0 => 'attribute_id',
            1 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1741 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'hotel.attribute.terms.delete',
          ),
          1 => 
          array (
            0 => 'attribute_id',
            1 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1775 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'hotels.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1790 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'hotels.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1806 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'hotels.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1822 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'hotels.approve',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1847 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'hotels.review',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1898 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tour.attribute.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1913 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tour.attribute.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1929 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tour.attribute.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1946 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tour.attribute.terms.list',
          ),
          1 => 
          array (
            0 => 'attribute_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1964 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tour.attribute.terms.store',
          ),
          1 => 
          array (
            0 => 'attribute_id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1989 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tour.attribute.terms.edit',
          ),
          1 => 
          array (
            0 => 'attribute_id',
            1 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2004 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tour.attribute.terms.update',
          ),
          1 => 
          array (
            0 => 'attribute_id',
            1 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2020 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tour.attribute.terms.delete',
          ),
          1 => 
          array (
            0 => 'attribute_id',
            1 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2058 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tour.category.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2073 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tour.category.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2089 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tour.category.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2121 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tours.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2136 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tours.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2152 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tours.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2168 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tours.approve',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2193 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tours.review',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2243 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'transports.attribute.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2258 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'transports.attribute.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2274 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'transports.attribute.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2291 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'transports.attribute.terms.list',
          ),
          1 => 
          array (
            0 => 'attribute_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2309 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'transports.attribute.terms.store',
          ),
          1 => 
          array (
            0 => 'attribute_id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2334 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'transports.attribute.terms.edit',
          ),
          1 => 
          array (
            0 => 'attribute_id',
            1 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2349 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'transports.attribute.terms.update',
          ),
          1 => 
          array (
            0 => 'attribute_id',
            1 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2365 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'transports.attribute.terms.delete',
          ),
          1 => 
          array (
            0 => 'attribute_id',
            1 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2394 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'transports.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2409 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'transports.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2425 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'transports.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2441 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'transports.approve',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2466 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'transport.review',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2517 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'activities.attribute.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2532 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'activities.attribute.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2548 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'activities.attribute.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2565 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'activities.attribute.terms.list',
          ),
          1 => 
          array (
            0 => 'attribute_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2583 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'activities.attribute.terms.store',
          ),
          1 => 
          array (
            0 => 'attribute_id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2608 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'activities.attribute.terms.edit',
          ),
          1 => 
          array (
            0 => 'attribute_id',
            1 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2623 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'activities.attribute.terms.update',
          ),
          1 => 
          array (
            0 => 'attribute_id',
            1 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2639 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'activities.attribute.terms.delete',
          ),
          1 => 
          array (
            0 => 'attribute_id',
            1 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2668 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'activities.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2683 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'activities.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2699 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'activities.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2715 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'activities.approve',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2740 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'activities.review',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2778 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'destination.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2793 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'destination.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2809 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'destination.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2825 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'destination.approve',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2868 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'visa.category.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2883 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'visa.category.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2899 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'visa.category.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2925 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'visa.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2940 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'visa.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2956 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'visa.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2972 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'visa.approve',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3007 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'inquiry.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3042 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.reset',
          ),
          1 => 
          array (
            0 => 'token',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3073 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'verification.verify',
          ),
          1 => 
          array (
            0 => 'token',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3129 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.profile.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3138 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.security.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3170 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'paypal.success',
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3204 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.booking.details',
          ),
          1 => 
          array (
            0 => 'order_number',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3223 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'all_pages',
          ),
          1 => 
          array (
            0 => 'slug',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'sanctum.csrf-cookie' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sanctum/csrf-cookie',
      'action' => 
      array (
        'uses' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'controller' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'namespace' => NULL,
        'prefix' => 'sanctum',
        'where' => 
        array (
        ),
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'sanctum.csrf-cookie',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'install' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'install',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
        ),
        'uses' => 'App\\Http\\Controllers\\installer\\InstallerController@installContent',
        'controller' => 'App\\Http\\Controllers\\installer\\InstallerController@installContent',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'install',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'install.requirement' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'install/requirements',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
        ),
        'uses' => 'App\\Http\\Controllers\\installer\\InstallerController@requirement',
        'controller' => 'App\\Http\\Controllers\\installer\\InstallerController@requirement',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'install.requirement',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'install.permission' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'install/permission',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
        ),
        'uses' => 'App\\Http\\Controllers\\installer\\InstallerController@permission',
        'controller' => 'App\\Http\\Controllers\\installer\\InstallerController@permission',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'install.permission',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'install.environment' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'install/environment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
        ),
        'uses' => 'App\\Http\\Controllers\\installer\\InstallerController@environment',
        'controller' => 'App\\Http\\Controllers\\installer\\InstallerController@environment',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'install.environment',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'install.database' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'install/database',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
        ),
        'uses' => 'App\\Http\\Controllers\\installer\\InstallerController@database',
        'controller' => 'App\\Http\\Controllers\\installer\\InstallerController@database',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'install.database',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'install.import-demo' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'install/import-demo',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
        ),
        'uses' => 'App\\Http\\Controllers\\installer\\InstallerController@importDemo',
        'controller' => 'App\\Http\\Controllers\\installer\\InstallerController@importDemo',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'install.import-demo',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'install.demo' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'install/demo',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
        ),
        'uses' => 'App\\Http\\Controllers\\installer\\InstallerController@imported',
        'controller' => 'App\\Http\\Controllers\\installer\\InstallerController@imported',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'install.demo',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'install.final' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'install/final',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
        ),
        'uses' => 'App\\Http\\Controllers\\installer\\InstallerController@finish',
        'controller' => 'App\\Http\\Controllers\\installer\\InstallerController@finish',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'install.final',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'purchase.code' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'install/purchase-code',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
        ),
        'uses' => 'App\\Http\\Controllers\\installer\\InstallerController@purchaseCode',
        'controller' => 'App\\Http\\Controllers\\installer\\InstallerController@purchaseCode',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'purchase.code',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Z33exoxGx6OPSu3i' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000008cd0000000000000000";}}',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::Z33exoxGx6OPSu3i',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.register.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'agent/register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\MerchantRegisterController@index',
        'controller' => 'App\\Http\\Controllers\\Auth\\MerchantRegisterController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'agent.register.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.register' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agent/register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\MerchantRegisterController@register',
        'controller' => 'App\\Http\\Controllers\\Auth\\MerchantRegisterController@register',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'agent.register',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.login.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\AdminLoginController@index',
        'controller' => 'App\\Http\\Controllers\\Auth\\AdminLoginController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'admin.login.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.login' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\AdminLoginController@login',
        'controller' => 'App\\Http\\Controllers\\Auth\\AdminLoginController@login',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'admin.login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'home.page' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
          2 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@index',
        'controller' => 'App\\Http\\Controllers\\HomeController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'home.page',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tour.details' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'tour/{slug}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
          2 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@tour_details',
        'controller' => 'App\\Http\\Controllers\\HomeController@tour_details',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'tour.details',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'hotel.details' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'hotel/{slug}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
          2 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@hotel_details',
        'controller' => 'App\\Http\\Controllers\\HomeController@hotel_details',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'hotel.details',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'activities.details' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'activities/{slug}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
          2 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@activities_details',
        'controller' => 'App\\Http\\Controllers\\HomeController@activities_details',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'activities.details',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'transport.details' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'transport/{slug}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
          2 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@transport_details',
        'controller' => 'App\\Http\\Controllers\\HomeController@transport_details',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'transport.details',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'blog.page' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'blogs',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
          2 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@blogs',
        'controller' => 'App\\Http\\Controllers\\HomeController@blogs',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'blog.page',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'blog.category' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'blog/category/{slug}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
          2 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@blog_category',
        'controller' => 'App\\Http\\Controllers\\HomeController@blog_category',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'blog.category',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'blog.tag' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'blog/tag/{name}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
          2 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@blog_tag',
        'controller' => 'App\\Http\\Controllers\\HomeController@blog_tag',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'blog.tag',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'blog.details' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'blog/{slug}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
          2 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@blog_details',
        'controller' => 'App\\Http\\Controllers\\HomeController@blog_details',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'blog.details',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'blog.comment' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'blog/comment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
          2 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@blog_comment',
        'controller' => 'App\\Http\\Controllers\\HomeController@blog_comment',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'blog.comment',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'contact.save' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'contact',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
          2 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@contact_store',
        'controller' => 'App\\Http\\Controllers\\HomeController@contact_store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'contact.save',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'inquiry.post' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'inquiry',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
          2 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@inquiry_post',
        'controller' => 'App\\Http\\Controllers\\HomeController@inquiry_post',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'inquiry.post',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'newsletter.subscribe' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'subscribe',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
          2 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@newsletter_subscribe',
        'controller' => 'App\\Http\\Controllers\\HomeController@newsletter_subscribe',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'newsletter.subscribe',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'main.search' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'search',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
          2 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@search',
        'controller' => 'App\\Http\\Controllers\\HomeController@search',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'main.search',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'shop_name_available_check' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'shop_name_available_check',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
          2 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@shop_name_available_check',
        'controller' => 'App\\Http\\Controllers\\HomeController@shop_name_available_check',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'shop_name_available_check',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'shop.details' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'shop/{slug}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
          2 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@shop_details',
        'controller' => 'App\\Http\\Controllers\\HomeController@shop_details',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'shop.details',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'review.submit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'review/submit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
          2 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@review_submit',
        'controller' => 'App\\Http\\Controllers\\HomeController@review_submit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'review.submit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'visa.details' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'visa/{slug}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
          2 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@visa_details',
        'controller' => 'App\\Http\\Controllers\\HomeController@visa_details',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'visa.details',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'destination.details' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'destination/{slug}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
          2 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@destination_details',
        'controller' => 'App\\Http\\Controllers\\HomeController@destination_details',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'destination.details',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'home.change.language' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'home/changelanguage',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
          2 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@homeChangeLanguage',
        'controller' => 'App\\Http\\Controllers\\HomeController@homeChangeLanguage',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'home.change.language',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'get.tour.category' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'get/tour/category',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
          2 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@getTourCat',
        'controller' => 'App\\Http\\Controllers\\HomeController@getTourCat',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'get.tour.category',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'language.change' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'changelanguage',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
          2 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\LanguageController@changeLanguage',
        'controller' => 'App\\Http\\Controllers\\LanguageController@changeLanguage',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'language.change',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'location.get.state' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'location/get/state',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
          2 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\LocationController@get_state',
        'controller' => 'App\\Http\\Controllers\\LocationController@get_state',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'location.get.state',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'location.get.city' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'location/get/city',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
          2 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\LocationController@get_city',
        'controller' => 'App\\Http\\Controllers\\LocationController@get_city',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'location.get.city',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
          2 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@showLoginForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@showLoginForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::qLenZpnlCxNsPI7b' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
          2 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@login',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@login',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::qLenZpnlCxNsPI7b',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'logout' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
          2 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@logout',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@logout',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'logout',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'register' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
          2 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\RegisterController@showRegistrationForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\RegisterController@showRegistrationForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'register',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Z92M7bjbu7ovENev' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
          2 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\RegisterController@register',
        'controller' => 'App\\Http\\Controllers\\Auth\\RegisterController@register',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::Z92M7bjbu7ovENev',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.request' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'password/reset',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
          2 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@showLinkRequestForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@showLinkRequestForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.request',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.email' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'password/email',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
          2 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@sendResetLinkEmail',
        'controller' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@sendResetLinkEmail',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.email',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.reset' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'password/reset/{token}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
          2 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@showResetForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@showResetForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.reset',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'password/reset',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
          2 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@reset',
        'controller' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@reset',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.confirm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'password/confirm',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
          2 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@showConfirmForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@showConfirmForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.confirm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::834Lzs2b7rfJUtNP' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'password/confirm',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
          2 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@confirm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@confirm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::834Lzs2b7rfJUtNP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::gyI8YQt887rvH2d3' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@logout',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@logout',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::gyI8YQt887rvH2d3',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'social.login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'social-login/redirect/{provider}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\SocialLoginController@redirectToProvider',
        'controller' => 'App\\Http\\Controllers\\Auth\\SocialLoginController@redirectToProvider',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'social.login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'social.callback' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'social-login/{provider}/callback',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\SocialLoginController@handleProviderCallback',
        'controller' => 'App\\Http\\Controllers\\Auth\\SocialLoginController@handleProviderCallback',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'social.callback',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'verification.notice' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'email/verify',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'XssSanitization',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\VerificationController@show',
        'controller' => 'App\\Http\\Controllers\\Auth\\VerificationController@show',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'verification.notice',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'verification.verify' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'email/{token}/verify',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'XssSanitization',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\VerificationController@verify_email',
        'controller' => 'App\\Http\\Controllers\\Auth\\VerificationController@verify_email',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'verification.verify',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'verification.resend' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'email/resend',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'XssSanitization',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\VerificationController@resend',
        'controller' => 'App\\Http\\Controllers\\Auth\\VerificationController@resend',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'verification.resend',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'checkout' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'checkout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'is_verified',
          3 => 'customer',
          4 => 'XssSanitization',
          5 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@checkout',
        'controller' => 'App\\Http\\Controllers\\HomeController@checkout',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'checkout',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'checkout.check' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'checkout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'is_verified',
          3 => 'customer',
          4 => 'XssSanitization',
          5 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@checkout_check',
        'controller' => 'App\\Http\\Controllers\\HomeController@checkout_check',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'checkout.check',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'thank_you' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'thank-you',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'is_verified',
          3 => 'customer',
          4 => 'XssSanitization',
          5 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@thank_you',
        'controller' => 'App\\Http\\Controllers\\HomeController@thank_you',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'thank_you',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'razorpay.success' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'razorpay/success',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'is_verified',
          3 => 'customer',
          4 => 'XssSanitization',
          5 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\RazorpayController@success',
        'controller' => 'App\\Http\\Controllers\\RazorpayController@success',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'razorpay.success',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'razorpay.error' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'razorpay/error',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'is_verified',
          3 => 'customer',
          4 => 'XssSanitization',
          5 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\RazorpayController@error',
        'controller' => 'App\\Http\\Controllers\\RazorpayController@error',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'razorpay.error',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'customer/dashboard',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'is_verified',
          3 => 'customer',
          4 => 'XssSanitization',
          5 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@dashboard',
        'controller' => 'App\\Http\\Controllers\\HomeController@dashboard',
        'namespace' => NULL,
        'prefix' => '/customer',
        'where' => 
        array (
        ),
        'as' => 'customer.dashboard',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.profile' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'customer/setting',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'is_verified',
          3 => 'customer',
          4 => 'XssSanitization',
          5 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@customer_profile',
        'controller' => 'App\\Http\\Controllers\\HomeController@customer_profile',
        'namespace' => NULL,
        'prefix' => '/customer',
        'where' => 
        array (
        ),
        'as' => 'customer.profile',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.profile.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'customer/profile/{id}/update/data',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'is_verified',
          3 => 'customer',
          4 => 'XssSanitization',
          5 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@customer_update_data',
        'controller' => 'App\\Http\\Controllers\\HomeController@customer_update_data',
        'namespace' => NULL,
        'prefix' => '/customer',
        'where' => 
        array (
        ),
        'as' => 'customer.profile.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.security.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'customer/profile/{id}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'is_verified',
          3 => 'customer',
          4 => 'XssSanitization',
          5 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@security_update',
        'controller' => 'App\\Http\\Controllers\\HomeController@security_update',
        'namespace' => NULL,
        'prefix' => '/customer',
        'where' => 
        array (
        ),
        'as' => 'customer.security.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.booking' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'customer/booking',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'is_verified',
          3 => 'customer',
          4 => 'XssSanitization',
          5 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@customer_booking',
        'controller' => 'App\\Http\\Controllers\\HomeController@customer_booking',
        'namespace' => NULL,
        'prefix' => '/customer',
        'where' => 
        array (
        ),
        'as' => 'customer.booking',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.booking.details' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'customer/booking/{order_number}/details',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'is_verified',
          3 => 'customer',
          4 => 'XssSanitization',
          5 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@booking_details',
        'controller' => 'App\\Http\\Controllers\\HomeController@booking_details',
        'namespace' => NULL,
        'prefix' => '/customer',
        'where' => 
        array (
        ),
        'as' => 'customer.booking.details',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.transaction' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'customer/transaction',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'is_verified',
          3 => 'customer',
          4 => 'XssSanitization',
          5 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@customer_transaction',
        'controller' => 'App\\Http\\Controllers\\HomeController@customer_transaction',
        'namespace' => NULL,
        'prefix' => '/customer',
        'where' => 
        array (
        ),
        'as' => 'customer.transaction',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.payment.method' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'customer/payment/method',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'is_verified',
          3 => 'customer',
          4 => 'XssSanitization',
          5 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\PaymentController@customer_payment',
        'controller' => 'App\\Http\\Controllers\\PaymentController@customer_payment',
        'namespace' => NULL,
        'prefix' => '/customer',
        'where' => 
        array (
        ),
        'as' => 'customer.payment.method',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'paypal.success' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'customer/paypal/{type}/success',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'is_verified',
          3 => 'customer',
          4 => 'XssSanitization',
          5 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\PaypalController@success',
        'controller' => 'App\\Http\\Controllers\\PaypalController@success',
        'namespace' => NULL,
        'prefix' => '/customer',
        'where' => 
        array (
        ),
        'as' => 'paypal.success',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'paypal.error' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'customer/paypal/cancel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'is_verified',
          3 => 'customer',
          4 => 'XssSanitization',
          5 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\PaypalController@error',
        'controller' => 'App\\Http\\Controllers\\PaypalController@error',
        'namespace' => NULL,
        'prefix' => '/customer',
        'where' => 
        array (
        ),
        'as' => 'paypal.error',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'stripe.confirm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'customer/stripe/confirm',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'is_verified',
          3 => 'customer',
          4 => 'XssSanitization',
          5 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\StripeController@confirm',
        'controller' => 'App\\Http\\Controllers\\StripeController@confirm',
        'namespace' => NULL,
        'prefix' => '/customer',
        'where' => 
        array (
        ),
        'as' => 'stripe.confirm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'XssSanitization',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@index',
        'controller' => 'App\\Http\\Controllers\\AdminController@index',
        'namespace' => NULL,
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
        'as' => 'backend.dashboard',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.profile' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'XssSanitization',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@profile',
        'controller' => 'App\\Http\\Controllers\\AdminController@profile',
        'namespace' => NULL,
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
        'as' => 'backend.profile',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.profile.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'dashboard/profile/{id}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'XssSanitization',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@profile_update',
        'controller' => 'App\\Http\\Controllers\\AdminController@profile_update',
        'namespace' => NULL,
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
        'as' => 'backend.profile.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.shop' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/shop',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'XssSanitization',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@shop',
        'controller' => 'App\\Http\\Controllers\\AdminController@shop',
        'namespace' => NULL,
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
        'as' => 'backend.shop',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.shop.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/shop/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'XssSanitization',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@shop_update',
        'controller' => 'App\\Http\\Controllers\\AdminController@shop_update',
        'namespace' => NULL,
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
        'as' => 'backend.shop.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.transaction' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/transaction',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'XssSanitization',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@transaction',
        'controller' => 'App\\Http\\Controllers\\AdminController@transaction',
        'namespace' => NULL,
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
        'as' => 'backend.transaction',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.order.info' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/order-info',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'XssSanitization',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@order',
        'controller' => 'App\\Http\\Controllers\\AdminController@order',
        'namespace' => NULL,
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
        'as' => 'backend.order.info',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.order.details' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/order-details/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'XssSanitization',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@order_details',
        'controller' => 'App\\Http\\Controllers\\AdminController@order_details',
        'namespace' => NULL,
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
        'as' => 'backend.order.details',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'order.change.status' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/order/change/status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'XssSanitization',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@changeStatus',
        'controller' => 'App\\Http\\Controllers\\AdminController@changeStatus',
        'namespace' => NULL,
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
        'as' => 'order.change.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'deleteDemoData' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/delete/old-data',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'XssSanitization',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@deleteDemoData',
        'controller' => 'App\\Http\\Controllers\\AdminController@deleteDemoData',
        'namespace' => NULL,
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
        'as' => 'deleteDemoData',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'merchant.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/merchant',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\MerchantController@index',
        'controller' => 'App\\Http\\Controllers\\MerchantController@index',
        'namespace' => NULL,
        'prefix' => 'dashboard/merchant',
        'where' => 
        array (
        ),
        'as' => 'merchant.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'merchant.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/merchant/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\MerchantController@create',
        'controller' => 'App\\Http\\Controllers\\MerchantController@create',
        'namespace' => NULL,
        'prefix' => 'dashboard/merchant',
        'where' => 
        array (
        ),
        'as' => 'merchant.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'merchant.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/merchant/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\MerchantController@store',
        'controller' => 'App\\Http\\Controllers\\MerchantController@store',
        'namespace' => NULL,
        'prefix' => 'dashboard/merchant',
        'where' => 
        array (
        ),
        'as' => 'merchant.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'merchant.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/merchant/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\MerchantController@edit',
        'controller' => 'App\\Http\\Controllers\\MerchantController@edit',
        'namespace' => NULL,
        'prefix' => 'dashboard/merchant',
        'where' => 
        array (
        ),
        'as' => 'merchant.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'merchant.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'dashboard/merchant/{id}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\MerchantController@update',
        'controller' => 'App\\Http\\Controllers\\MerchantController@update',
        'namespace' => NULL,
        'prefix' => 'dashboard/merchant',
        'where' => 
        array (
        ),
        'as' => 'merchant.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'merchant.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/merchant/{id}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\MerchantController@destroy',
        'controller' => 'App\\Http\\Controllers\\MerchantController@destroy',
        'namespace' => NULL,
        'prefix' => 'dashboard/merchant',
        'where' => 
        array (
        ),
        'as' => 'merchant.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'merchant.change.status' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/merchant/change/status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\MerchantController@changeStatus',
        'controller' => 'App\\Http\\Controllers\\MerchantController@changeStatus',
        'namespace' => NULL,
        'prefix' => 'dashboard/merchant',
        'where' => 
        array (
        ),
        'as' => 'merchant.change.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'merchant.view' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/merchant/{id}/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\MerchantController@show',
        'controller' => 'App\\Http\\Controllers\\MerchantController@show',
        'namespace' => NULL,
        'prefix' => 'dashboard/merchant',
        'where' => 
        array (
        ),
        'as' => 'merchant.view',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'merchant.login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/merchant/login/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\MerchantController@login',
        'controller' => 'App\\Http\\Controllers\\MerchantController@login',
        'namespace' => NULL,
        'prefix' => 'dashboard/merchant',
        'where' => 
        array (
        ),
        'as' => 'merchant.login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'menu.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/menu/manage/{id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\MenuController@menu',
        'controller' => 'App\\Http\\Controllers\\MenuController@menu',
        'namespace' => NULL,
        'prefix' => 'dashboard/menu',
        'where' => 
        array (
        ),
        'as' => 'menu.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'add.menu' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/menu/add-menu',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\MenuController@addToMenu',
        'controller' => 'App\\Http\\Controllers\\MenuController@addToMenu',
        'namespace' => NULL,
        'prefix' => 'dashboard/menu',
        'where' => 
        array (
        ),
        'as' => 'add.menu',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'menu.item' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/menu/menu-item',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\MenuController@storeMenuItem',
        'controller' => 'App\\Http\\Controllers\\MenuController@storeMenuItem',
        'namespace' => NULL,
        'prefix' => 'dashboard/menu',
        'where' => 
        array (
        ),
        'as' => 'menu.item',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'menu.item.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/menu/menu-item-edit/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\MenuController@editMenuItem',
        'controller' => 'App\\Http\\Controllers\\MenuController@editMenuItem',
        'namespace' => NULL,
        'prefix' => 'dashboard/menu',
        'where' => 
        array (
        ),
        'as' => 'menu.item.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'menu.item.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/menu/menu-item-update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\MenuController@updateMenuItem',
        'controller' => 'App\\Http\\Controllers\\MenuController@updateMenuItem',
        'namespace' => NULL,
        'prefix' => 'dashboard/menu',
        'where' => 
        array (
        ),
        'as' => 'menu.item.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'menu.item.delete' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/menu/menu-item-delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\MenuController@deleteMenuItem',
        'controller' => 'App\\Http\\Controllers\\MenuController@deleteMenuItem',
        'namespace' => NULL,
        'prefix' => 'dashboard/menu',
        'where' => 
        array (
        ),
        'as' => 'menu.item.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'email.template.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/email/template',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\EmailTemplateController@index',
        'controller' => 'App\\Http\\Controllers\\EmailTemplateController@index',
        'namespace' => NULL,
        'prefix' => 'dashboard/email/template',
        'where' => 
        array (
        ),
        'as' => 'email.template.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'email.template.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/email/template/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\EmailTemplateController@edit',
        'controller' => 'App\\Http\\Controllers\\EmailTemplateController@edit',
        'namespace' => NULL,
        'prefix' => 'dashboard/email/template',
        'where' => 
        array (
        ),
        'as' => 'email.template.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'email.template.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'dashboard/email/template/{id}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\EmailTemplateController@update',
        'controller' => 'App\\Http\\Controllers\\EmailTemplateController@update',
        'namespace' => NULL,
        'prefix' => 'dashboard/email/template',
        'where' => 
        array (
        ),
        'as' => 'email.template.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'frontend.setting' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/frontend/settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\FrontendSettingController@index',
        'controller' => 'App\\Http\\Controllers\\FrontendSettingController@index',
        'namespace' => NULL,
        'prefix' => 'dashboard/frontend/settings',
        'where' => 
        array (
        ),
        'as' => 'frontend.setting',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'frontend.settings.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/frontend/settings/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\FrontendSettingController@store',
        'controller' => 'App\\Http\\Controllers\\FrontendSettingController@store',
        'namespace' => NULL,
        'prefix' => 'dashboard/frontend/settings',
        'where' => 
        array (
        ),
        'as' => 'frontend.settings.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.setting' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/backend/settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\BackendSettingController@index',
        'controller' => 'App\\Http\\Controllers\\BackendSettingController@index',
        'namespace' => NULL,
        'prefix' => 'dashboard/backend/settings',
        'where' => 
        array (
        ),
        'as' => 'backend.setting',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.settings.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/backend/settings/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\BackendSettingController@store',
        'controller' => 'App\\Http\\Controllers\\BackendSettingController@store',
        'namespace' => NULL,
        'prefix' => 'dashboard/backend/settings',
        'where' => 
        array (
        ),
        'as' => 'backend.settings.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.testmail' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/backend/settings/testmail',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\BackendSettingController@sendTestMail',
        'controller' => 'App\\Http\\Controllers\\BackendSettingController@sendTestMail',
        'namespace' => NULL,
        'prefix' => 'dashboard/backend/settings',
        'where' => 
        array (
        ),
        'as' => 'backend.testmail',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.cache-clear' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/backend/settings/cache-clear',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\BackendSettingController@cacheClear',
        'controller' => 'App\\Http\\Controllers\\BackendSettingController@cacheClear',
        'namespace' => NULL,
        'prefix' => 'dashboard/backend/settings',
        'where' => 
        array (
        ),
        'as' => 'backend.cache-clear',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'payment.methods' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/payment/methods',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\PaymentMethodController@index',
        'controller' => 'App\\Http\\Controllers\\PaymentMethodController@index',
        'namespace' => NULL,
        'prefix' => 'dashboard/payment/methods',
        'where' => 
        array (
        ),
        'as' => 'payment.methods',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'payment.methods.edit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/payment/methods/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\PaymentMethodController@edit',
        'controller' => 'App\\Http\\Controllers\\PaymentMethodController@edit',
        'namespace' => NULL,
        'prefix' => 'dashboard/payment/methods',
        'where' => 
        array (
        ),
        'as' => 'payment.methods.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'payment.methods.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/payment/methods/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\PaymentMethodController@update',
        'controller' => 'App\\Http\\Controllers\\PaymentMethodController@update',
        'namespace' => NULL,
        'prefix' => 'dashboard/payment/methods',
        'where' => 
        array (
        ),
        'as' => 'payment.methods.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'payment.methods.status.change' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/payment/methods/change/status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\PaymentMethodController@changeStatus',
        'controller' => 'App\\Http\\Controllers\\PaymentMethodController@changeStatus',
        'namespace' => NULL,
        'prefix' => 'dashboard/payment/methods',
        'where' => 
        array (
        ),
        'as' => 'payment.methods.status.change',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/customer',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@index',
        'controller' => 'App\\Http\\Controllers\\CustomerController@index',
        'namespace' => NULL,
        'prefix' => 'dashboard/customer',
        'where' => 
        array (
        ),
        'as' => 'customer.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/customer/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@create',
        'controller' => 'App\\Http\\Controllers\\CustomerController@create',
        'namespace' => NULL,
        'prefix' => 'dashboard/customer',
        'where' => 
        array (
        ),
        'as' => 'customer.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/customer/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@store',
        'controller' => 'App\\Http\\Controllers\\CustomerController@store',
        'namespace' => NULL,
        'prefix' => 'dashboard/customer',
        'where' => 
        array (
        ),
        'as' => 'customer.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/customer/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@edit',
        'controller' => 'App\\Http\\Controllers\\CustomerController@edit',
        'namespace' => NULL,
        'prefix' => 'dashboard/customer',
        'where' => 
        array (
        ),
        'as' => 'customer.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'dashboard/customer/{id}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@update',
        'controller' => 'App\\Http\\Controllers\\CustomerController@update',
        'namespace' => NULL,
        'prefix' => 'dashboard/customer',
        'where' => 
        array (
        ),
        'as' => 'customer.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/customer/{id}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@destroy',
        'controller' => 'App\\Http\\Controllers\\CustomerController@destroy',
        'namespace' => NULL,
        'prefix' => 'dashboard/customer',
        'where' => 
        array (
        ),
        'as' => 'customer.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.change.status' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/customer/change/status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@changeStatus',
        'controller' => 'App\\Http\\Controllers\\CustomerController@changeStatus',
        'namespace' => NULL,
        'prefix' => 'dashboard/customer',
        'where' => 
        array (
        ),
        'as' => 'customer.change.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.view' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/customer/{id}/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@show',
        'controller' => 'App\\Http\\Controllers\\CustomerController@show',
        'namespace' => NULL,
        'prefix' => 'dashboard/customer',
        'where' => 
        array (
        ),
        'as' => 'customer.view',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/customer/login/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@login',
        'controller' => 'App\\Http\\Controllers\\CustomerController@login',
        'namespace' => NULL,
        'prefix' => 'dashboard/customer',
        'where' => 
        array (
        ),
        'as' => 'customer.login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'languages.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/languages',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\LanguageController@index',
        'controller' => 'App\\Http\\Controllers\\LanguageController@index',
        'namespace' => NULL,
        'prefix' => 'dashboard/languages',
        'where' => 
        array (
        ),
        'as' => 'languages.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'languages.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/languages/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\LanguageController@create',
        'controller' => 'App\\Http\\Controllers\\LanguageController@create',
        'namespace' => NULL,
        'prefix' => 'dashboard/languages',
        'where' => 
        array (
        ),
        'as' => 'languages.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'languages.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/languages/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\LanguageController@store',
        'controller' => 'App\\Http\\Controllers\\LanguageController@store',
        'namespace' => NULL,
        'prefix' => 'dashboard/languages',
        'where' => 
        array (
        ),
        'as' => 'languages.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'languages.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/languages/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\LanguageController@edit',
        'controller' => 'App\\Http\\Controllers\\LanguageController@edit',
        'namespace' => NULL,
        'prefix' => 'dashboard/languages',
        'where' => 
        array (
        ),
        'as' => 'languages.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'languages.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/languages/{id}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\LanguageController@update',
        'controller' => 'App\\Http\\Controllers\\LanguageController@update',
        'namespace' => NULL,
        'prefix' => 'dashboard/languages',
        'where' => 
        array (
        ),
        'as' => 'languages.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'languages.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/languages/{id}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\LanguageController@destroy',
        'controller' => 'App\\Http\\Controllers\\LanguageController@destroy',
        'namespace' => NULL,
        'prefix' => 'dashboard/languages',
        'where' => 
        array (
        ),
        'as' => 'languages.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'languages.change.status' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/languages/change/status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\LanguageController@changeStatus',
        'controller' => 'App\\Http\\Controllers\\LanguageController@changeStatus',
        'namespace' => NULL,
        'prefix' => 'dashboard/languages',
        'where' => 
        array (
        ),
        'as' => 'languages.change.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'languages.translations' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/languages/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\LanguageController@translations',
        'controller' => 'App\\Http\\Controllers\\LanguageController@translations',
        'namespace' => NULL,
        'prefix' => 'dashboard/languages',
        'where' => 
        array (
        ),
        'as' => 'languages.translations',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'languages.key_value_store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/languages/{id}/key_value_store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\LanguageController@key_value_store',
        'controller' => 'App\\Http\\Controllers\\LanguageController@key_value_store',
        'namespace' => NULL,
        'prefix' => 'dashboard/languages',
        'where' => 
        array (
        ),
        'as' => 'languages.key_value_store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'contact.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/contacts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ContactController@index',
        'controller' => 'App\\Http\\Controllers\\ContactController@index',
        'namespace' => NULL,
        'prefix' => 'dashboard/contacts',
        'where' => 
        array (
        ),
        'as' => 'contact.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'contact.view' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/contacts/{id}/view',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ContactController@show',
        'controller' => 'App\\Http\\Controllers\\ContactController@show',
        'namespace' => NULL,
        'prefix' => 'dashboard/contacts',
        'where' => 
        array (
        ),
        'as' => 'contact.view',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'contact.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/contacts/{id}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ContactController@destroy',
        'controller' => 'App\\Http\\Controllers\\ContactController@destroy',
        'namespace' => NULL,
        'prefix' => 'dashboard/contacts',
        'where' => 
        array (
        ),
        'as' => 'contact.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'location.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/location',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\LocationController@index',
        'controller' => 'App\\Http\\Controllers\\LocationController@index',
        'namespace' => NULL,
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
        'as' => 'location.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'country.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/country/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\LocationController@store',
        'controller' => 'App\\Http\\Controllers\\LocationController@store',
        'namespace' => NULL,
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
        'as' => 'country.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'country.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/country/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\LocationController@edit',
        'controller' => 'App\\Http\\Controllers\\LocationController@edit',
        'namespace' => NULL,
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
        'as' => 'country.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'country.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'dashboard/country/{id}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\LocationController@update',
        'controller' => 'App\\Http\\Controllers\\LocationController@update',
        'namespace' => NULL,
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
        'as' => 'country.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'country.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/country/{id}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\LocationController@destroy',
        'controller' => 'App\\Http\\Controllers\\LocationController@destroy',
        'namespace' => NULL,
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
        'as' => 'country.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'state.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/state/{id}/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\LocationController@state_create',
        'controller' => 'App\\Http\\Controllers\\LocationController@state_create',
        'namespace' => NULL,
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
        'as' => 'state.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'state.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/state/{id}/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\LocationController@state_store',
        'controller' => 'App\\Http\\Controllers\\LocationController@state_store',
        'namespace' => NULL,
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
        'as' => 'state.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'state.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/state/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\LocationController@state_edit',
        'controller' => 'App\\Http\\Controllers\\LocationController@state_edit',
        'namespace' => NULL,
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
        'as' => 'state.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'state.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'dashboard/state/{id}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\LocationController@state_update',
        'controller' => 'App\\Http\\Controllers\\LocationController@state_update',
        'namespace' => NULL,
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
        'as' => 'state.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'state.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/state/{id}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\LocationController@state_destroy',
        'controller' => 'App\\Http\\Controllers\\LocationController@state_destroy',
        'namespace' => NULL,
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
        'as' => 'state.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'city.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/city/{id}/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\LocationController@city_create',
        'controller' => 'App\\Http\\Controllers\\LocationController@city_create',
        'namespace' => NULL,
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
        'as' => 'city.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'city.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/city/{id}/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\LocationController@city_store',
        'controller' => 'App\\Http\\Controllers\\LocationController@city_store',
        'namespace' => NULL,
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
        'as' => 'city.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'city.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/city/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\LocationController@city_edit',
        'controller' => 'App\\Http\\Controllers\\LocationController@city_edit',
        'namespace' => NULL,
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
        'as' => 'city.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'city.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'dashboard/city/{id}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\LocationController@city_update',
        'controller' => 'App\\Http\\Controllers\\LocationController@city_update',
        'namespace' => NULL,
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
        'as' => 'city.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'city.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/city/{id}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\LocationController@city_destroy',
        'controller' => 'App\\Http\\Controllers\\LocationController@city_destroy',
        'namespace' => NULL,
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
        'as' => 'city.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'deposits.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/deposits',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\DepositController@index',
        'controller' => 'App\\Http\\Controllers\\DepositController@index',
        'namespace' => NULL,
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
        'as' => 'deposits.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'page.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/pages',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\PageController@index',
        'controller' => 'App\\Http\\Controllers\\PageController@index',
        'namespace' => NULL,
        'prefix' => 'dashboard/pages',
        'where' => 
        array (
        ),
        'as' => 'page.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'page.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/pages/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\PageController@store',
        'controller' => 'App\\Http\\Controllers\\PageController@store',
        'namespace' => NULL,
        'prefix' => 'dashboard/pages',
        'where' => 
        array (
        ),
        'as' => 'page.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'page.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/pages/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\PageController@edit',
        'controller' => 'App\\Http\\Controllers\\PageController@edit',
        'namespace' => NULL,
        'prefix' => 'dashboard/pages',
        'where' => 
        array (
        ),
        'as' => 'page.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'page.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'dashboard/pages/{id}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\PageController@update',
        'controller' => 'App\\Http\\Controllers\\PageController@update',
        'namespace' => NULL,
        'prefix' => 'dashboard/pages',
        'where' => 
        array (
        ),
        'as' => 'page.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'page.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/pages/{id}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\PageController@destroy',
        'controller' => 'App\\Http\\Controllers\\PageController@destroy',
        'namespace' => NULL,
        'prefix' => 'dashboard/pages',
        'where' => 
        array (
        ),
        'as' => 'page.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'page.change.status' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/pages/change/status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\PageController@changeStatus',
        'controller' => 'App\\Http\\Controllers\\PageController@changeStatus',
        'namespace' => NULL,
        'prefix' => 'dashboard/pages',
        'where' => 
        array (
        ),
        'as' => 'page.change.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pages.add.widget' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/pages/add-widget-page/{slug}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\PageController@widgetAddedToPage',
        'controller' => 'App\\Http\\Controllers\\PageController@widgetAddedToPage',
        'namespace' => NULL,
        'prefix' => 'dashboard/pages',
        'where' => 
        array (
        ),
        'as' => 'pages.add.widget',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pages.widget.save' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/pages/widget-save-by-page',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\PageController@widgetUpdateByPage',
        'controller' => 'App\\Http\\Controllers\\PageController@widgetUpdateByPage',
        'namespace' => NULL,
        'prefix' => 'dashboard/pages',
        'where' => 
        array (
        ),
        'as' => 'pages.widget.save',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pages.widget.status.change' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/pages/widget-status/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\PageController@widgetStatusChange',
        'controller' => 'App\\Http\\Controllers\\PageController@widgetStatusChange',
        'namespace' => NULL,
        'prefix' => 'dashboard/pages',
        'where' => 
        array (
        ),
        'as' => 'pages.widget.status.change',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pages.widget.delete' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/pages/widget-delete-by-page/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\PageController@widgetDeleteByPage',
        'controller' => 'App\\Http\\Controllers\\PageController@widgetDeleteByPage',
        'namespace' => NULL,
        'prefix' => 'dashboard/pages',
        'where' => 
        array (
        ),
        'as' => 'pages.widget.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pages.widget.storted' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/pages/widget-sorted-by-page',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\PageController@widgetSortedByPage',
        'controller' => 'App\\Http\\Controllers\\PageController@widgetSortedByPage',
        'namespace' => NULL,
        'prefix' => 'dashboard/pages',
        'where' => 
        array (
        ),
        'as' => 'pages.widget.storted',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pages.image.upload' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/pages/image-upload-file',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\PageController@imageUpload',
        'controller' => 'App\\Http\\Controllers\\PageController@imageUpload',
        'namespace' => NULL,
        'prefix' => 'dashboard/pages',
        'where' => 
        array (
        ),
        'as' => 'pages.image.upload',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'blog.category.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/blogs/category',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\BlogCategoryController@index',
        'controller' => 'App\\Http\\Controllers\\BlogCategoryController@index',
        'namespace' => NULL,
        'prefix' => 'dashboard/blogs',
        'where' => 
        array (
        ),
        'as' => 'blog.category.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'blog.category.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/blogs/category/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\BlogCategoryController@store',
        'controller' => 'App\\Http\\Controllers\\BlogCategoryController@store',
        'namespace' => NULL,
        'prefix' => 'dashboard/blogs',
        'where' => 
        array (
        ),
        'as' => 'blog.category.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'blog.category.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/blogs/category/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\BlogCategoryController@edit',
        'controller' => 'App\\Http\\Controllers\\BlogCategoryController@edit',
        'namespace' => NULL,
        'prefix' => 'dashboard/blogs',
        'where' => 
        array (
        ),
        'as' => 'blog.category.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'blog.category.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'dashboard/blogs/category/{id}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\BlogCategoryController@update',
        'controller' => 'App\\Http\\Controllers\\BlogCategoryController@update',
        'namespace' => NULL,
        'prefix' => 'dashboard/blogs',
        'where' => 
        array (
        ),
        'as' => 'blog.category.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'blog.category.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/blogs/category/{id}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\BlogCategoryController@destroy',
        'controller' => 'App\\Http\\Controllers\\BlogCategoryController@destroy',
        'namespace' => NULL,
        'prefix' => 'dashboard/blogs',
        'where' => 
        array (
        ),
        'as' => 'blog.category.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'blog.category.change.status' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/blogs/category/change/status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\BlogCategoryController@changeStatus',
        'controller' => 'App\\Http\\Controllers\\BlogCategoryController@changeStatus',
        'namespace' => NULL,
        'prefix' => 'dashboard/blogs',
        'where' => 
        array (
        ),
        'as' => 'blog.category.change.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'blog.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/blogs',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\BlogController@index',
        'controller' => 'App\\Http\\Controllers\\BlogController@index',
        'namespace' => NULL,
        'prefix' => 'dashboard/blogs',
        'where' => 
        array (
        ),
        'as' => 'blog.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'blog.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/blogs/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\BlogController@create',
        'controller' => 'App\\Http\\Controllers\\BlogController@create',
        'namespace' => NULL,
        'prefix' => 'dashboard/blogs',
        'where' => 
        array (
        ),
        'as' => 'blog.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'blog.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/blogs/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\BlogController@store',
        'controller' => 'App\\Http\\Controllers\\BlogController@store',
        'namespace' => NULL,
        'prefix' => 'dashboard/blogs',
        'where' => 
        array (
        ),
        'as' => 'blog.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'blog.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/blogs/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\BlogController@edit',
        'controller' => 'App\\Http\\Controllers\\BlogController@edit',
        'namespace' => NULL,
        'prefix' => 'dashboard/blogs',
        'where' => 
        array (
        ),
        'as' => 'blog.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'blog.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'dashboard/blogs/{id}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\BlogController@update',
        'controller' => 'App\\Http\\Controllers\\BlogController@update',
        'namespace' => NULL,
        'prefix' => 'dashboard/blogs',
        'where' => 
        array (
        ),
        'as' => 'blog.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'blog.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/blogs/{id}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\BlogController@destroy',
        'controller' => 'App\\Http\\Controllers\\BlogController@destroy',
        'namespace' => NULL,
        'prefix' => 'dashboard/blogs',
        'where' => 
        array (
        ),
        'as' => 'blog.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'blog.change.status' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/blogs/change/status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
          4 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\BlogController@changeStatus',
        'controller' => 'App\\Http\\Controllers\\BlogController@changeStatus',
        'namespace' => NULL,
        'prefix' => 'dashboard/blogs',
        'where' => 
        array (
        ),
        'as' => 'blog.change.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'hotel.attribute.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/hotel/attribute',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HotelAttributeController@index',
        'controller' => 'App\\Http\\Controllers\\HotelAttributeController@index',
        'namespace' => NULL,
        'prefix' => 'dashboard/hotel/attribute',
        'where' => 
        array (
        ),
        'as' => 'hotel.attribute.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'hotel.attribute.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/hotel/attribute/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HotelAttributeController@store',
        'controller' => 'App\\Http\\Controllers\\HotelAttributeController@store',
        'namespace' => NULL,
        'prefix' => 'dashboard/hotel/attribute',
        'where' => 
        array (
        ),
        'as' => 'hotel.attribute.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'hotel.attribute.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/hotel/attribute/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HotelAttributeController@edit',
        'controller' => 'App\\Http\\Controllers\\HotelAttributeController@edit',
        'namespace' => NULL,
        'prefix' => 'dashboard/hotel/attribute',
        'where' => 
        array (
        ),
        'as' => 'hotel.attribute.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'hotel.attribute.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'dashboard/hotel/attribute/{id}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HotelAttributeController@update',
        'controller' => 'App\\Http\\Controllers\\HotelAttributeController@update',
        'namespace' => NULL,
        'prefix' => 'dashboard/hotel/attribute',
        'where' => 
        array (
        ),
        'as' => 'hotel.attribute.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'hotel.attribute.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/hotel/attribute/{id}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HotelAttributeController@destroy',
        'controller' => 'App\\Http\\Controllers\\HotelAttributeController@destroy',
        'namespace' => NULL,
        'prefix' => 'dashboard/hotel/attribute',
        'where' => 
        array (
        ),
        'as' => 'hotel.attribute.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'hotel.attribute.terms.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/hotel/attribute/{attribute_id}/terms',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HotelAttributeTermController@index',
        'controller' => 'App\\Http\\Controllers\\HotelAttributeTermController@index',
        'namespace' => NULL,
        'prefix' => 'dashboard/hotel/attribute/{attribute_id}/terms',
        'where' => 
        array (
        ),
        'as' => 'hotel.attribute.terms.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'hotel.attribute.terms.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/hotel/attribute/{attribute_id}/terms/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HotelAttributeTermController@store',
        'controller' => 'App\\Http\\Controllers\\HotelAttributeTermController@store',
        'namespace' => NULL,
        'prefix' => 'dashboard/hotel/attribute/{attribute_id}/terms',
        'where' => 
        array (
        ),
        'as' => 'hotel.attribute.terms.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'hotel.attribute.terms.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/hotel/attribute/{attribute_id}/terms/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HotelAttributeTermController@edit',
        'controller' => 'App\\Http\\Controllers\\HotelAttributeTermController@edit',
        'namespace' => NULL,
        'prefix' => 'dashboard/hotel/attribute/{attribute_id}/terms',
        'where' => 
        array (
        ),
        'as' => 'hotel.attribute.terms.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'hotel.attribute.terms.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'dashboard/hotel/attribute/{attribute_id}/terms/{id}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HotelAttributeTermController@update',
        'controller' => 'App\\Http\\Controllers\\HotelAttributeTermController@update',
        'namespace' => NULL,
        'prefix' => 'dashboard/hotel/attribute/{attribute_id}/terms',
        'where' => 
        array (
        ),
        'as' => 'hotel.attribute.terms.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'hotel.attribute.terms.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/hotel/attribute/{attribute_id}/terms/{id}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HotelAttributeTermController@destroy',
        'controller' => 'App\\Http\\Controllers\\HotelAttributeTermController@destroy',
        'namespace' => NULL,
        'prefix' => 'dashboard/hotel/attribute/{attribute_id}/terms',
        'where' => 
        array (
        ),
        'as' => 'hotel.attribute.terms.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'hotels.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/hotels',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HotelController@index',
        'controller' => 'App\\Http\\Controllers\\HotelController@index',
        'namespace' => NULL,
        'prefix' => 'dashboard/hotels',
        'where' => 
        array (
        ),
        'as' => 'hotels.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'hotels.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/hotels/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HotelController@create',
        'controller' => 'App\\Http\\Controllers\\HotelController@create',
        'namespace' => NULL,
        'prefix' => 'dashboard/hotels',
        'where' => 
        array (
        ),
        'as' => 'hotels.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'hotels.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/hotels/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HotelController@store',
        'controller' => 'App\\Http\\Controllers\\HotelController@store',
        'namespace' => NULL,
        'prefix' => 'dashboard/hotels',
        'where' => 
        array (
        ),
        'as' => 'hotels.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'hotels.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/hotels/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HotelController@edit',
        'controller' => 'App\\Http\\Controllers\\HotelController@edit',
        'namespace' => NULL,
        'prefix' => 'dashboard/hotels',
        'where' => 
        array (
        ),
        'as' => 'hotels.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'hotels.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'dashboard/hotels/{id}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HotelController@update',
        'controller' => 'App\\Http\\Controllers\\HotelController@update',
        'namespace' => NULL,
        'prefix' => 'dashboard/hotels',
        'where' => 
        array (
        ),
        'as' => 'hotels.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'hotels.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/hotels/{id}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HotelController@destroy',
        'controller' => 'App\\Http\\Controllers\\HotelController@destroy',
        'namespace' => NULL,
        'prefix' => 'dashboard/hotels',
        'where' => 
        array (
        ),
        'as' => 'hotels.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'hotels.change.status' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/hotels/change/status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HotelController@changeStatus',
        'controller' => 'App\\Http\\Controllers\\HotelController@changeStatus',
        'namespace' => NULL,
        'prefix' => 'dashboard/hotels',
        'where' => 
        array (
        ),
        'as' => 'hotels.change.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'hotels.approve' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'dashboard/hotels/{id}/approve',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HotelController@approve',
        'controller' => 'App\\Http\\Controllers\\HotelController@approve',
        'namespace' => NULL,
        'prefix' => 'dashboard/hotels',
        'where' => 
        array (
        ),
        'as' => 'hotels.approve',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'hotels.gallery.remove' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/hotels/gallery/remove',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HotelController@gallery_remove',
        'controller' => 'App\\Http\\Controllers\\HotelController@gallery_remove',
        'namespace' => NULL,
        'prefix' => 'dashboard/hotels',
        'where' => 
        array (
        ),
        'as' => 'hotels.gallery.remove',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'hotels.review' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/hotels/review/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HotelController@review',
        'controller' => 'App\\Http\\Controllers\\HotelController@review',
        'namespace' => NULL,
        'prefix' => 'dashboard/hotels',
        'where' => 
        array (
        ),
        'as' => 'hotels.review',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'hotels.review.reply' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/hotels/reply',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HotelController@reply',
        'controller' => 'App\\Http\\Controllers\\HotelController@reply',
        'namespace' => NULL,
        'prefix' => 'dashboard/hotels',
        'where' => 
        array (
        ),
        'as' => 'hotels.review.reply',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'hotel.review.change.status' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/hotels/review/change/status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HotelController@reviewStatus',
        'controller' => 'App\\Http\\Controllers\\HotelController@reviewStatus',
        'namespace' => NULL,
        'prefix' => 'dashboard/hotels',
        'where' => 
        array (
        ),
        'as' => 'hotel.review.change.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tour.attribute.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/tour/attribute',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TourAttributeController@index',
        'controller' => 'App\\Http\\Controllers\\TourAttributeController@index',
        'namespace' => NULL,
        'prefix' => 'dashboard/tour/attribute',
        'where' => 
        array (
        ),
        'as' => 'tour.attribute.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tour.attribute.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/tour/attribute/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TourAttributeController@store',
        'controller' => 'App\\Http\\Controllers\\TourAttributeController@store',
        'namespace' => NULL,
        'prefix' => 'dashboard/tour/attribute',
        'where' => 
        array (
        ),
        'as' => 'tour.attribute.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tour.attribute.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/tour/attribute/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TourAttributeController@edit',
        'controller' => 'App\\Http\\Controllers\\TourAttributeController@edit',
        'namespace' => NULL,
        'prefix' => 'dashboard/tour/attribute',
        'where' => 
        array (
        ),
        'as' => 'tour.attribute.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tour.attribute.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'dashboard/tour/attribute/{id}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TourAttributeController@update',
        'controller' => 'App\\Http\\Controllers\\TourAttributeController@update',
        'namespace' => NULL,
        'prefix' => 'dashboard/tour/attribute',
        'where' => 
        array (
        ),
        'as' => 'tour.attribute.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tour.attribute.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/tour/attribute/{id}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TourAttributeController@destroy',
        'controller' => 'App\\Http\\Controllers\\TourAttributeController@destroy',
        'namespace' => NULL,
        'prefix' => 'dashboard/tour/attribute',
        'where' => 
        array (
        ),
        'as' => 'tour.attribute.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tour.attribute.terms.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/tour/attribute/{attribute_id}/terms',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TourAttributeTermController@index',
        'controller' => 'App\\Http\\Controllers\\TourAttributeTermController@index',
        'namespace' => NULL,
        'prefix' => 'dashboard/tour/attribute/{attribute_id}/terms',
        'where' => 
        array (
        ),
        'as' => 'tour.attribute.terms.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tour.attribute.terms.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/tour/attribute/{attribute_id}/terms/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TourAttributeTermController@store',
        'controller' => 'App\\Http\\Controllers\\TourAttributeTermController@store',
        'namespace' => NULL,
        'prefix' => 'dashboard/tour/attribute/{attribute_id}/terms',
        'where' => 
        array (
        ),
        'as' => 'tour.attribute.terms.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tour.attribute.terms.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/tour/attribute/{attribute_id}/terms/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TourAttributeTermController@edit',
        'controller' => 'App\\Http\\Controllers\\TourAttributeTermController@edit',
        'namespace' => NULL,
        'prefix' => 'dashboard/tour/attribute/{attribute_id}/terms',
        'where' => 
        array (
        ),
        'as' => 'tour.attribute.terms.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tour.attribute.terms.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'dashboard/tour/attribute/{attribute_id}/terms/{id}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TourAttributeTermController@update',
        'controller' => 'App\\Http\\Controllers\\TourAttributeTermController@update',
        'namespace' => NULL,
        'prefix' => 'dashboard/tour/attribute/{attribute_id}/terms',
        'where' => 
        array (
        ),
        'as' => 'tour.attribute.terms.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tour.attribute.terms.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/tour/attribute/{attribute_id}/terms/{id}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TourAttributeTermController@destroy',
        'controller' => 'App\\Http\\Controllers\\TourAttributeTermController@destroy',
        'namespace' => NULL,
        'prefix' => 'dashboard/tour/attribute/{attribute_id}/terms',
        'where' => 
        array (
        ),
        'as' => 'tour.attribute.terms.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tour.category.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/tour/category',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TourCategoryController@index',
        'controller' => 'App\\Http\\Controllers\\TourCategoryController@index',
        'namespace' => NULL,
        'prefix' => 'dashboard/tour/category',
        'where' => 
        array (
        ),
        'as' => 'tour.category.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tour.category.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/tour/category/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TourCategoryController@store',
        'controller' => 'App\\Http\\Controllers\\TourCategoryController@store',
        'namespace' => NULL,
        'prefix' => 'dashboard/tour/category',
        'where' => 
        array (
        ),
        'as' => 'tour.category.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tour.category.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/tour/category/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TourCategoryController@edit',
        'controller' => 'App\\Http\\Controllers\\TourCategoryController@edit',
        'namespace' => NULL,
        'prefix' => 'dashboard/tour/category',
        'where' => 
        array (
        ),
        'as' => 'tour.category.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tour.category.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'dashboard/tour/category/{id}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TourCategoryController@update',
        'controller' => 'App\\Http\\Controllers\\TourCategoryController@update',
        'namespace' => NULL,
        'prefix' => 'dashboard/tour/category',
        'where' => 
        array (
        ),
        'as' => 'tour.category.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tour.category.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/tour/category/{id}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TourCategoryController@destroy',
        'controller' => 'App\\Http\\Controllers\\TourCategoryController@destroy',
        'namespace' => NULL,
        'prefix' => 'dashboard/tour/category',
        'where' => 
        array (
        ),
        'as' => 'tour.category.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tours.category.change.status' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/tour/category/change/status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TourCategoryController@changeStatus',
        'controller' => 'App\\Http\\Controllers\\TourCategoryController@changeStatus',
        'namespace' => NULL,
        'prefix' => 'dashboard/tour/category',
        'where' => 
        array (
        ),
        'as' => 'tours.category.change.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tours.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/tours',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TourController@index',
        'controller' => 'App\\Http\\Controllers\\TourController@index',
        'namespace' => NULL,
        'prefix' => 'dashboard/tours',
        'where' => 
        array (
        ),
        'as' => 'tours.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tours.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/tours/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TourController@create',
        'controller' => 'App\\Http\\Controllers\\TourController@create',
        'namespace' => NULL,
        'prefix' => 'dashboard/tours',
        'where' => 
        array (
        ),
        'as' => 'tours.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tours.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/tours/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TourController@store',
        'controller' => 'App\\Http\\Controllers\\TourController@store',
        'namespace' => NULL,
        'prefix' => 'dashboard/tours',
        'where' => 
        array (
        ),
        'as' => 'tours.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tours.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/tours/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TourController@edit',
        'controller' => 'App\\Http\\Controllers\\TourController@edit',
        'namespace' => NULL,
        'prefix' => 'dashboard/tours',
        'where' => 
        array (
        ),
        'as' => 'tours.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tours.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'dashboard/tours/{id}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TourController@update',
        'controller' => 'App\\Http\\Controllers\\TourController@update',
        'namespace' => NULL,
        'prefix' => 'dashboard/tours',
        'where' => 
        array (
        ),
        'as' => 'tours.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tours.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/tours/{id}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TourController@destroy',
        'controller' => 'App\\Http\\Controllers\\TourController@destroy',
        'namespace' => NULL,
        'prefix' => 'dashboard/tours',
        'where' => 
        array (
        ),
        'as' => 'tours.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tours.change.status' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/tours/change/status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TourController@changeStatus',
        'controller' => 'App\\Http\\Controllers\\TourController@changeStatus',
        'namespace' => NULL,
        'prefix' => 'dashboard/tours',
        'where' => 
        array (
        ),
        'as' => 'tours.change.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tours.change.featured' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/tours/change/featured',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TourController@changeFeatured',
        'controller' => 'App\\Http\\Controllers\\TourController@changeFeatured',
        'namespace' => NULL,
        'prefix' => 'dashboard/tours',
        'where' => 
        array (
        ),
        'as' => 'tours.change.featured',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tours.approve' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'dashboard/tours/{id}/approve',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TourController@approve',
        'controller' => 'App\\Http\\Controllers\\TourController@approve',
        'namespace' => NULL,
        'prefix' => 'dashboard/tours',
        'where' => 
        array (
        ),
        'as' => 'tours.approve',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tours.gallery.remove' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/tours/gallery/remove',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TourController@gallery_remove',
        'controller' => 'App\\Http\\Controllers\\TourController@gallery_remove',
        'namespace' => NULL,
        'prefix' => 'dashboard/tours',
        'where' => 
        array (
        ),
        'as' => 'tours.gallery.remove',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tours.review' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/tours/review/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TourController@review',
        'controller' => 'App\\Http\\Controllers\\TourController@review',
        'namespace' => NULL,
        'prefix' => 'dashboard/tours',
        'where' => 
        array (
        ),
        'as' => 'tours.review',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tours.review.reply' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/tours/reply',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TourController@reply',
        'controller' => 'App\\Http\\Controllers\\TourController@reply',
        'namespace' => NULL,
        'prefix' => 'dashboard/tours',
        'where' => 
        array (
        ),
        'as' => 'tours.review.reply',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tour.review.change.status' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/tours/review/change/status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TourController@reviewStatus',
        'controller' => 'App\\Http\\Controllers\\TourController@reviewStatus',
        'namespace' => NULL,
        'prefix' => 'dashboard/tours',
        'where' => 
        array (
        ),
        'as' => 'tour.review.change.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'activities.attribute.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/activities/attribute',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\ActivitiesAttributeController@index',
        'controller' => 'App\\Http\\Controllers\\ActivitiesAttributeController@index',
        'namespace' => NULL,
        'prefix' => 'dashboard/activities/attribute',
        'where' => 
        array (
        ),
        'as' => 'activities.attribute.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'activities.attribute.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/activities/attribute/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\ActivitiesAttributeController@store',
        'controller' => 'App\\Http\\Controllers\\ActivitiesAttributeController@store',
        'namespace' => NULL,
        'prefix' => 'dashboard/activities/attribute',
        'where' => 
        array (
        ),
        'as' => 'activities.attribute.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'activities.attribute.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/activities/attribute/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\ActivitiesAttributeController@edit',
        'controller' => 'App\\Http\\Controllers\\ActivitiesAttributeController@edit',
        'namespace' => NULL,
        'prefix' => 'dashboard/activities/attribute',
        'where' => 
        array (
        ),
        'as' => 'activities.attribute.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'activities.attribute.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'dashboard/activities/attribute/{id}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\ActivitiesAttributeController@update',
        'controller' => 'App\\Http\\Controllers\\ActivitiesAttributeController@update',
        'namespace' => NULL,
        'prefix' => 'dashboard/activities/attribute',
        'where' => 
        array (
        ),
        'as' => 'activities.attribute.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'activities.attribute.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/activities/attribute/{id}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\ActivitiesAttributeController@destroy',
        'controller' => 'App\\Http\\Controllers\\ActivitiesAttributeController@destroy',
        'namespace' => NULL,
        'prefix' => 'dashboard/activities/attribute',
        'where' => 
        array (
        ),
        'as' => 'activities.attribute.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'activities.attribute.terms.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/activities/attribute/{attribute_id}/terms',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\ActivitiesAttributeTermController@index',
        'controller' => 'App\\Http\\Controllers\\ActivitiesAttributeTermController@index',
        'namespace' => NULL,
        'prefix' => 'dashboard/activities/attribute/{attribute_id}/terms',
        'where' => 
        array (
        ),
        'as' => 'activities.attribute.terms.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'activities.attribute.terms.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/activities/attribute/{attribute_id}/terms/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\ActivitiesAttributeTermController@store',
        'controller' => 'App\\Http\\Controllers\\ActivitiesAttributeTermController@store',
        'namespace' => NULL,
        'prefix' => 'dashboard/activities/attribute/{attribute_id}/terms',
        'where' => 
        array (
        ),
        'as' => 'activities.attribute.terms.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'activities.attribute.terms.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/activities/attribute/{attribute_id}/terms/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\ActivitiesAttributeTermController@edit',
        'controller' => 'App\\Http\\Controllers\\ActivitiesAttributeTermController@edit',
        'namespace' => NULL,
        'prefix' => 'dashboard/activities/attribute/{attribute_id}/terms',
        'where' => 
        array (
        ),
        'as' => 'activities.attribute.terms.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'activities.attribute.terms.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'dashboard/activities/attribute/{attribute_id}/terms/{id}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\ActivitiesAttributeTermController@update',
        'controller' => 'App\\Http\\Controllers\\ActivitiesAttributeTermController@update',
        'namespace' => NULL,
        'prefix' => 'dashboard/activities/attribute/{attribute_id}/terms',
        'where' => 
        array (
        ),
        'as' => 'activities.attribute.terms.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'activities.attribute.terms.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/activities/attribute/{attribute_id}/terms/{id}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\ActivitiesAttributeTermController@destroy',
        'controller' => 'App\\Http\\Controllers\\ActivitiesAttributeTermController@destroy',
        'namespace' => NULL,
        'prefix' => 'dashboard/activities/attribute/{attribute_id}/terms',
        'where' => 
        array (
        ),
        'as' => 'activities.attribute.terms.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'activities.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/activities',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\ActivitiesController@index',
        'controller' => 'App\\Http\\Controllers\\ActivitiesController@index',
        'namespace' => NULL,
        'prefix' => 'dashboard/activities',
        'where' => 
        array (
        ),
        'as' => 'activities.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'activities.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/activities/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\ActivitiesController@create',
        'controller' => 'App\\Http\\Controllers\\ActivitiesController@create',
        'namespace' => NULL,
        'prefix' => 'dashboard/activities',
        'where' => 
        array (
        ),
        'as' => 'activities.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'activities.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/activities/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\ActivitiesController@store',
        'controller' => 'App\\Http\\Controllers\\ActivitiesController@store',
        'namespace' => NULL,
        'prefix' => 'dashboard/activities',
        'where' => 
        array (
        ),
        'as' => 'activities.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'activities.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/activities/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\ActivitiesController@edit',
        'controller' => 'App\\Http\\Controllers\\ActivitiesController@edit',
        'namespace' => NULL,
        'prefix' => 'dashboard/activities',
        'where' => 
        array (
        ),
        'as' => 'activities.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'activities.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'dashboard/activities/{id}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\ActivitiesController@update',
        'controller' => 'App\\Http\\Controllers\\ActivitiesController@update',
        'namespace' => NULL,
        'prefix' => 'dashboard/activities',
        'where' => 
        array (
        ),
        'as' => 'activities.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'activities.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/activities/{id}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\ActivitiesController@destroy',
        'controller' => 'App\\Http\\Controllers\\ActivitiesController@destroy',
        'namespace' => NULL,
        'prefix' => 'dashboard/activities',
        'where' => 
        array (
        ),
        'as' => 'activities.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'activities.change.status' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/activities/change/status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\ActivitiesController@changeStatus',
        'controller' => 'App\\Http\\Controllers\\ActivitiesController@changeStatus',
        'namespace' => NULL,
        'prefix' => 'dashboard/activities',
        'where' => 
        array (
        ),
        'as' => 'activities.change.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'activities.approve' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'dashboard/activities/{id}/approve',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\ActivitiesController@approve',
        'controller' => 'App\\Http\\Controllers\\ActivitiesController@approve',
        'namespace' => NULL,
        'prefix' => 'dashboard/activities',
        'where' => 
        array (
        ),
        'as' => 'activities.approve',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'activities.gallery.remove' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/activities/gallery/remove',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\ActivitiesController@gallery_remove',
        'controller' => 'App\\Http\\Controllers\\ActivitiesController@gallery_remove',
        'namespace' => NULL,
        'prefix' => 'dashboard/activities',
        'where' => 
        array (
        ),
        'as' => 'activities.gallery.remove',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'activities.review' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/activities/review/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\ActivitiesController@review',
        'controller' => 'App\\Http\\Controllers\\ActivitiesController@review',
        'namespace' => NULL,
        'prefix' => 'dashboard/activities',
        'where' => 
        array (
        ),
        'as' => 'activities.review',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'activities.review.reply' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/activities/reply',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\ActivitiesController@reply',
        'controller' => 'App\\Http\\Controllers\\ActivitiesController@reply',
        'namespace' => NULL,
        'prefix' => 'dashboard/activities',
        'where' => 
        array (
        ),
        'as' => 'activities.review.reply',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'activities.review.change.status' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/activities/review/change/status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\ActivitiesController@reviewStatus',
        'controller' => 'App\\Http\\Controllers\\ActivitiesController@reviewStatus',
        'namespace' => NULL,
        'prefix' => 'dashboard/activities',
        'where' => 
        array (
        ),
        'as' => 'activities.review.change.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'transports.attribute.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/transports/attribute',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TransportAttributeController@index',
        'controller' => 'App\\Http\\Controllers\\TransportAttributeController@index',
        'namespace' => NULL,
        'prefix' => 'dashboard/transports/attribute',
        'where' => 
        array (
        ),
        'as' => 'transports.attribute.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'transports.attribute.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/transports/attribute/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TransportAttributeController@store',
        'controller' => 'App\\Http\\Controllers\\TransportAttributeController@store',
        'namespace' => NULL,
        'prefix' => 'dashboard/transports/attribute',
        'where' => 
        array (
        ),
        'as' => 'transports.attribute.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'transports.attribute.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/transports/attribute/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TransportAttributeController@edit',
        'controller' => 'App\\Http\\Controllers\\TransportAttributeController@edit',
        'namespace' => NULL,
        'prefix' => 'dashboard/transports/attribute',
        'where' => 
        array (
        ),
        'as' => 'transports.attribute.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'transports.attribute.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'dashboard/transports/attribute/{id}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TransportAttributeController@update',
        'controller' => 'App\\Http\\Controllers\\TransportAttributeController@update',
        'namespace' => NULL,
        'prefix' => 'dashboard/transports/attribute',
        'where' => 
        array (
        ),
        'as' => 'transports.attribute.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'transports.attribute.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/transports/attribute/{id}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TransportAttributeController@destroy',
        'controller' => 'App\\Http\\Controllers\\TransportAttributeController@destroy',
        'namespace' => NULL,
        'prefix' => 'dashboard/transports/attribute',
        'where' => 
        array (
        ),
        'as' => 'transports.attribute.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'transports.attribute.terms.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/transports/attribute/{attribute_id}/terms',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TransportAttributeTermController@index',
        'controller' => 'App\\Http\\Controllers\\TransportAttributeTermController@index',
        'namespace' => NULL,
        'prefix' => 'dashboard/transports/attribute/{attribute_id}/terms',
        'where' => 
        array (
        ),
        'as' => 'transports.attribute.terms.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'transports.attribute.terms.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/transports/attribute/{attribute_id}/terms/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TransportAttributeTermController@store',
        'controller' => 'App\\Http\\Controllers\\TransportAttributeTermController@store',
        'namespace' => NULL,
        'prefix' => 'dashboard/transports/attribute/{attribute_id}/terms',
        'where' => 
        array (
        ),
        'as' => 'transports.attribute.terms.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'transports.attribute.terms.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/transports/attribute/{attribute_id}/terms/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TransportAttributeTermController@edit',
        'controller' => 'App\\Http\\Controllers\\TransportAttributeTermController@edit',
        'namespace' => NULL,
        'prefix' => 'dashboard/transports/attribute/{attribute_id}/terms',
        'where' => 
        array (
        ),
        'as' => 'transports.attribute.terms.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'transports.attribute.terms.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'dashboard/transports/attribute/{attribute_id}/terms/{id}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TransportAttributeTermController@update',
        'controller' => 'App\\Http\\Controllers\\TransportAttributeTermController@update',
        'namespace' => NULL,
        'prefix' => 'dashboard/transports/attribute/{attribute_id}/terms',
        'where' => 
        array (
        ),
        'as' => 'transports.attribute.terms.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'transports.attribute.terms.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/transports/attribute/{attribute_id}/terms/{id}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TransportAttributeTermController@destroy',
        'controller' => 'App\\Http\\Controllers\\TransportAttributeTermController@destroy',
        'namespace' => NULL,
        'prefix' => 'dashboard/transports/attribute/{attribute_id}/terms',
        'where' => 
        array (
        ),
        'as' => 'transports.attribute.terms.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'transports.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/transports',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TransportController@index',
        'controller' => 'App\\Http\\Controllers\\TransportController@index',
        'namespace' => NULL,
        'prefix' => 'dashboard/transports',
        'where' => 
        array (
        ),
        'as' => 'transports.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'transports.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/transports/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TransportController@create',
        'controller' => 'App\\Http\\Controllers\\TransportController@create',
        'namespace' => NULL,
        'prefix' => 'dashboard/transports',
        'where' => 
        array (
        ),
        'as' => 'transports.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'transports.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/transports/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TransportController@store',
        'controller' => 'App\\Http\\Controllers\\TransportController@store',
        'namespace' => NULL,
        'prefix' => 'dashboard/transports',
        'where' => 
        array (
        ),
        'as' => 'transports.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'transports.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/transports/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TransportController@edit',
        'controller' => 'App\\Http\\Controllers\\TransportController@edit',
        'namespace' => NULL,
        'prefix' => 'dashboard/transports',
        'where' => 
        array (
        ),
        'as' => 'transports.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'transports.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'dashboard/transports/{id}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TransportController@update',
        'controller' => 'App\\Http\\Controllers\\TransportController@update',
        'namespace' => NULL,
        'prefix' => 'dashboard/transports',
        'where' => 
        array (
        ),
        'as' => 'transports.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'transports.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/transports/{id}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TransportController@destroy',
        'controller' => 'App\\Http\\Controllers\\TransportController@destroy',
        'namespace' => NULL,
        'prefix' => 'dashboard/transports',
        'where' => 
        array (
        ),
        'as' => 'transports.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'transports.change.status' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/transports/change/status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TransportController@changeStatus',
        'controller' => 'App\\Http\\Controllers\\TransportController@changeStatus',
        'namespace' => NULL,
        'prefix' => 'dashboard/transports',
        'where' => 
        array (
        ),
        'as' => 'transports.change.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'transports.approve' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'dashboard/transports/{id}/approve',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TransportController@approve',
        'controller' => 'App\\Http\\Controllers\\TransportController@approve',
        'namespace' => NULL,
        'prefix' => 'dashboard/transports',
        'where' => 
        array (
        ),
        'as' => 'transports.approve',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'transports.gallery.remove' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/transports/gallery/remove',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TransportController@gallery_remove',
        'controller' => 'App\\Http\\Controllers\\TransportController@gallery_remove',
        'namespace' => NULL,
        'prefix' => 'dashboard/transports',
        'where' => 
        array (
        ),
        'as' => 'transports.gallery.remove',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'transport.review' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/transports/review/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TransportController@review',
        'controller' => 'App\\Http\\Controllers\\TransportController@review',
        'namespace' => NULL,
        'prefix' => 'dashboard/transports',
        'where' => 
        array (
        ),
        'as' => 'transport.review',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'transport.review.reply' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/transports/reply',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TransportController@reply',
        'controller' => 'App\\Http\\Controllers\\TransportController@reply',
        'namespace' => NULL,
        'prefix' => 'dashboard/transports',
        'where' => 
        array (
        ),
        'as' => 'transport.review.reply',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'transports.review.change.status' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/transports/review/change/status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\TransportController@reviewStatus',
        'controller' => 'App\\Http\\Controllers\\TransportController@reviewStatus',
        'namespace' => NULL,
        'prefix' => 'dashboard/transports',
        'where' => 
        array (
        ),
        'as' => 'transports.review.change.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'destination.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/destination',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\DestinationController@index',
        'controller' => 'App\\Http\\Controllers\\DestinationController@index',
        'namespace' => NULL,
        'prefix' => 'dashboard/destination',
        'where' => 
        array (
        ),
        'as' => 'destination.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'destination.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/destination/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\DestinationController@create',
        'controller' => 'App\\Http\\Controllers\\DestinationController@create',
        'namespace' => NULL,
        'prefix' => 'dashboard/destination',
        'where' => 
        array (
        ),
        'as' => 'destination.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'destination.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/destination/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\DestinationController@store',
        'controller' => 'App\\Http\\Controllers\\DestinationController@store',
        'namespace' => NULL,
        'prefix' => 'dashboard/destination',
        'where' => 
        array (
        ),
        'as' => 'destination.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'destination.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/destination/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\DestinationController@edit',
        'controller' => 'App\\Http\\Controllers\\DestinationController@edit',
        'namespace' => NULL,
        'prefix' => 'dashboard/destination',
        'where' => 
        array (
        ),
        'as' => 'destination.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'destination.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'dashboard/destination/{id}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\DestinationController@update',
        'controller' => 'App\\Http\\Controllers\\DestinationController@update',
        'namespace' => NULL,
        'prefix' => 'dashboard/destination',
        'where' => 
        array (
        ),
        'as' => 'destination.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'destination.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/destination/{id}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\DestinationController@destroy',
        'controller' => 'App\\Http\\Controllers\\DestinationController@destroy',
        'namespace' => NULL,
        'prefix' => 'dashboard/destination',
        'where' => 
        array (
        ),
        'as' => 'destination.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'destination.change.status' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/destination/change/status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\DestinationController@changeStatus',
        'controller' => 'App\\Http\\Controllers\\DestinationController@changeStatus',
        'namespace' => NULL,
        'prefix' => 'dashboard/destination',
        'where' => 
        array (
        ),
        'as' => 'destination.change.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'destination.approve' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'dashboard/destination/{id}/approve',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\DestinationController@approve',
        'controller' => 'App\\Http\\Controllers\\DestinationController@approve',
        'namespace' => NULL,
        'prefix' => 'dashboard/destination',
        'where' => 
        array (
        ),
        'as' => 'destination.approve',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'destination.gallery.remove' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/destination/gallery/remove',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\DestinationController@gallery_remove',
        'controller' => 'App\\Http\\Controllers\\DestinationController@gallery_remove',
        'namespace' => NULL,
        'prefix' => 'dashboard/destination',
        'where' => 
        array (
        ),
        'as' => 'destination.gallery.remove',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'visa.category.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/visa/category',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\VisaCategoryController@index',
        'controller' => 'App\\Http\\Controllers\\VisaCategoryController@index',
        'namespace' => NULL,
        'prefix' => 'dashboard/visa/category',
        'where' => 
        array (
        ),
        'as' => 'visa.category.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'visa.category.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/visa/category/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\VisaCategoryController@store',
        'controller' => 'App\\Http\\Controllers\\VisaCategoryController@store',
        'namespace' => NULL,
        'prefix' => 'dashboard/visa/category',
        'where' => 
        array (
        ),
        'as' => 'visa.category.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'visa.category.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/visa/category/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\VisaCategoryController@edit',
        'controller' => 'App\\Http\\Controllers\\VisaCategoryController@edit',
        'namespace' => NULL,
        'prefix' => 'dashboard/visa/category',
        'where' => 
        array (
        ),
        'as' => 'visa.category.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'visa.category.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'dashboard/visa/category/{id}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\VisaCategoryController@update',
        'controller' => 'App\\Http\\Controllers\\VisaCategoryController@update',
        'namespace' => NULL,
        'prefix' => 'dashboard/visa/category',
        'where' => 
        array (
        ),
        'as' => 'visa.category.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'visa.category.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/visa/category/{id}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\VisaCategoryController@destroy',
        'controller' => 'App\\Http\\Controllers\\VisaCategoryController@destroy',
        'namespace' => NULL,
        'prefix' => 'dashboard/visa/category',
        'where' => 
        array (
        ),
        'as' => 'visa.category.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'visa.category.change.status' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/visa/category/change/status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\VisaCategoryController@changeStatus',
        'controller' => 'App\\Http\\Controllers\\VisaCategoryController@changeStatus',
        'namespace' => NULL,
        'prefix' => 'dashboard/visa/category',
        'where' => 
        array (
        ),
        'as' => 'visa.category.change.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'visa.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/visa',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\VisaController@index',
        'controller' => 'App\\Http\\Controllers\\VisaController@index',
        'namespace' => NULL,
        'prefix' => 'dashboard/visa',
        'where' => 
        array (
        ),
        'as' => 'visa.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'visa.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/visa/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\VisaController@create',
        'controller' => 'App\\Http\\Controllers\\VisaController@create',
        'namespace' => NULL,
        'prefix' => 'dashboard/visa',
        'where' => 
        array (
        ),
        'as' => 'visa.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'visa.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/visa/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\VisaController@store',
        'controller' => 'App\\Http\\Controllers\\VisaController@store',
        'namespace' => NULL,
        'prefix' => 'dashboard/visa',
        'where' => 
        array (
        ),
        'as' => 'visa.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'visa.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/visa/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\VisaController@edit',
        'controller' => 'App\\Http\\Controllers\\VisaController@edit',
        'namespace' => NULL,
        'prefix' => 'dashboard/visa',
        'where' => 
        array (
        ),
        'as' => 'visa.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'visa.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'dashboard/visa/{id}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\VisaController@update',
        'controller' => 'App\\Http\\Controllers\\VisaController@update',
        'namespace' => NULL,
        'prefix' => 'dashboard/visa',
        'where' => 
        array (
        ),
        'as' => 'visa.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'visa.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/visa/{id}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\VisaController@destroy',
        'controller' => 'App\\Http\\Controllers\\VisaController@destroy',
        'namespace' => NULL,
        'prefix' => 'dashboard/visa',
        'where' => 
        array (
        ),
        'as' => 'visa.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'visa.change.status' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/visa/change/status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\VisaController@changeStatus',
        'controller' => 'App\\Http\\Controllers\\VisaController@changeStatus',
        'namespace' => NULL,
        'prefix' => 'dashboard/visa',
        'where' => 
        array (
        ),
        'as' => 'visa.change.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'visa.approve' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'dashboard/visa/{id}/approve',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\VisaController@approve',
        'controller' => 'App\\Http\\Controllers\\VisaController@approve',
        'namespace' => NULL,
        'prefix' => 'dashboard/visa',
        'where' => 
        array (
        ),
        'as' => 'visa.approve',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'inquiry.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/inquiry',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\InquiryController@index',
        'controller' => 'App\\Http\\Controllers\\InquiryController@index',
        'namespace' => NULL,
        'prefix' => 'dashboard/inquiry',
        'where' => 
        array (
        ),
        'as' => 'inquiry.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'inquiry.change.status' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/inquiry/change/status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\InquiryController@changeStatus',
        'controller' => 'App\\Http\\Controllers\\InquiryController@changeStatus',
        'namespace' => NULL,
        'prefix' => 'dashboard/inquiry',
        'where' => 
        array (
        ),
        'as' => 'inquiry.change.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'inquiry.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/inquiry/{id}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\InquiryController@destroy',
        'controller' => 'App\\Http\\Controllers\\InquiryController@destroy',
        'namespace' => NULL,
        'prefix' => 'dashboard/inquiry',
        'where' => 
        array (
        ),
        'as' => 'inquiry.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'support.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/supports',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\SupportTicketController@index',
        'controller' => 'App\\Http\\Controllers\\SupportTicketController@index',
        'namespace' => NULL,
        'prefix' => 'dashboard/supports',
        'where' => 
        array (
        ),
        'as' => 'support.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'support.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/supports/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\SupportTicketController@create',
        'controller' => 'App\\Http\\Controllers\\SupportTicketController@create',
        'namespace' => NULL,
        'prefix' => 'dashboard/supports',
        'where' => 
        array (
        ),
        'as' => 'support.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'support.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/supports/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\SupportTicketController@store',
        'controller' => 'App\\Http\\Controllers\\SupportTicketController@store',
        'namespace' => NULL,
        'prefix' => 'dashboard/supports',
        'where' => 
        array (
        ),
        'as' => 'support.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'support.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/supports/{id}/reply',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\SupportTicketController@edit',
        'controller' => 'App\\Http\\Controllers\\SupportTicketController@edit',
        'namespace' => NULL,
        'prefix' => 'dashboard/supports',
        'where' => 
        array (
        ),
        'as' => 'support.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'support.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'dashboard/supports/{id}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\SupportTicketController@update',
        'controller' => 'App\\Http\\Controllers\\SupportTicketController@update',
        'namespace' => NULL,
        'prefix' => 'dashboard/supports',
        'where' => 
        array (
        ),
        'as' => 'support.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'support.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/supports/{id}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\SupportTicketController@destroy',
        'controller' => 'App\\Http\\Controllers\\SupportTicketController@destroy',
        'namespace' => NULL,
        'prefix' => 'dashboard/supports',
        'where' => 
        array (
        ),
        'as' => 'support.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'support.close.ticket' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/supports/close-ticket/{supportId}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
          3 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\SupportTicketController@closeTicket',
        'controller' => 'App\\Http\\Controllers\\SupportTicketController@closeTicket',
        'namespace' => NULL,
        'prefix' => 'dashboard/supports',
        'where' => 
        array (
        ),
        'as' => 'support.close.ticket',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'updateform.application' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/license',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
        ),
        'uses' => 'App\\Http\\Controllers\\LicenseController@index',
        'controller' => 'App\\Http\\Controllers\\LicenseController@index',
        'namespace' => NULL,
        'prefix' => 'dashboard/license',
        'where' => 
        array (
        ),
        'as' => 'updateform.application',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'license.verify' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/license/verify',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
        ),
        'uses' => 'App\\Http\\Controllers\\LicenseController@licenseVerifyForm',
        'controller' => 'App\\Http\\Controllers\\LicenseController@licenseVerifyForm',
        'namespace' => NULL,
        'prefix' => 'dashboard/license',
        'where' => 
        array (
        ),
        'as' => 'license.verify',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update.theme' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/license/theme-update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
        ),
        'uses' => 'App\\Http\\Controllers\\LicenseController@themeUpdate',
        'controller' => 'App\\Http\\Controllers\\LicenseController@themeUpdate',
        'namespace' => NULL,
        'prefix' => 'dashboard/license',
        'where' => 
        array (
        ),
        'as' => 'update.theme',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'license.verify.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/license/license-verify-update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
        ),
        'uses' => 'App\\Http\\Controllers\\LicenseController@verifyUpdate',
        'controller' => 'App\\Http\\Controllers\\LicenseController@verifyUpdate',
        'namespace' => NULL,
        'prefix' => 'dashboard/license',
        'where' => 
        array (
        ),
        'as' => 'license.verify.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'license.purcahase.remove' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/license/license-purcahase-remove',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'backend',
        ),
        'uses' => 'App\\Http\\Controllers\\LicenseController@purcahaseRemove',
        'controller' => 'App\\Http\\Controllers\\LicenseController@purcahaseRemove',
        'namespace' => NULL,
        'prefix' => 'dashboard/license',
        'where' => 
        array (
        ),
        'as' => 'license.purcahase.remove',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'users.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'users',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@index',
        'controller' => 'App\\Http\\Controllers\\UserController@index',
        'namespace' => NULL,
        'prefix' => '/users',
        'where' => 
        array (
        ),
        'as' => 'users.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'all_pages' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '{slug}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'XssSanitization',
          2 => 'pverify',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@loadPagesContent',
        'controller' => 'App\\Http\\Controllers\\HomeController@loadPagesContent',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'all_pages',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
  ),
)
);
