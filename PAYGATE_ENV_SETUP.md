# PayGate Environment Variables Setup

## Required PayGate Variables (Add these to your .env file)

```env
# PayGate Configuration
PAYGATE_SECRET=your_secret_key_here
PAYGATE_CHECKOUT_URL=https://checkout.harmostays.com/checkout
PAYGATE_WALLET_ADDRESS=0x6734be2F7C16de208483453DC64588C3c856ee0D
```

## How to Generate Your Secret Key

Run this command to generate a secure secret key:

```bash
cd /mnt/c/Users/jstnh/airbnb-booking-site && php artisan tinker
```

Then in the tinker console, run:
```php
echo base64_encode(random_bytes(32));
exit
```

Copy the generated key and use it as your PAYGATE_SECRET.

## Variables You Can Remove (if not using these services)

If you're not using these payment methods, you can remove their environment variables:

### Stripe (if not using)
- STRIPE_KEY
- STRIPE_SECRET
- STRIPE_WEBHOOK_SECRET

### PayPal (if not using)
- PAYPAL_CLIENT_ID
- PAYPAL_CLIENT_SECRET
- PAYPAL_MODE

### Razorpay (if not using)
- RAZORPAY_KEY
- RAZORPAY_SECRET

### Other unused services
- Any AWS S3 keys if not using file storage
- Any social login keys if not using social authentication
- Any email service keys if using only one email provider

## Keep These Essential Variables
- APP_KEY
- APP_URL
- DB_* (database configuration)
- MAIL_* (email configuration you're actually using)
- Any variables for services you're actively using

## Final Setup Steps

1. Add the PayGate variables to your .env file
2. Generate and set your PAYGATE_SECRET
3. Make sure the same PAYGATE_SECRET is also set in your checkout.harmostays.com application
4. Remove any unused payment gateway variables to clean up your .env file
