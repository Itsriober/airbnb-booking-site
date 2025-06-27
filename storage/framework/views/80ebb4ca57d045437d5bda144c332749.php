<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('frontend.template-' . selectedTheme() . '.breadcrumb.breadcrumb', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <div class="checkout-page pt-120 mb-120">
        <div class="container">
            <form action="<?php echo e(route('customer.payment.method')); ?>" method="POST" class="require-validation"
                data-cc-on-file-modal="false" data-stripe-publishable-key="<?php echo e(get_payment_method('stripe_key')); ?>"
                id="payment-form">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="current_url" value="<?php echo e(URL::full()); ?>">
                <input type="hidden" name="type" value="2">
                <div id="razorScript">

                </div>
                <div class="row g-lg-4 gy-5">
                    <div class="col-lg-6">
                        <div class="inquiry-form">
                            <div class="title">
                                <h4><?php echo e(translate('Billing Information')); ?></h4>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-inner mb-30">
                                        <label><?php echo e(translate('First Name')); ?> <span class="text-danger">*</span></label>
                                        <input type="text" name="first_name"
                                            value="<?php echo e(old('first_name', $loginUser->fname)); ?>" placeholder="Jackson">
                                        <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="error text-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-inner mb-30">
                                        <label><?php echo e(translate('Last Name')); ?></label>
                                        <input type="text" name="last_name"
                                            value="<?php echo e(old('last_name', $loginUser->lname)); ?>" placeholder="Mile">
                                        <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="error text-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-inner mb-30">
                                        <label><?php echo e(translate('Phone')); ?> <span class="text-danger">*</span></label>
                                        <input type="text" name="phone" value="<?php echo e(old('phone', $loginUser->phone)); ?>"
                                            placeholder="Ex- +880-13* ** ***">
                                        <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="error text-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-inner mb-30">
                                        <label><?php echo e(translate('Email')); ?> <span class="text-danger">*</span></label>
                                        <input type="email" name="email" value="<?php echo e(old('email', $loginUser->email)); ?>"
                                            placeholder="Ex- info@gmail.com">
                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="error text-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-inner mb-30">
                                        <label><?php echo e(translate('Address')); ?> <span class="text-danger">*</span></label>
                                        <input type="text" name="address"
                                            value="<?php echo e(old('address', $loginUser->address)); ?>"
                                            placeholder="<?php echo e(translate('Dhaka, Bangladesh')); ?>">
                                        <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="error text-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-inner mb-30">
                                        <label><?php echo e(translate('Street Address')); ?></label>
                                        <input type="text" name="street_address" value="<?php echo e(old('street_address')); ?>"
                                            placeholder="<?php echo e(translate('Your Street')); ?>">
                                        <?php $__errorArgs = ['street_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="error text-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-inner mb-30">
                                        <label><?php echo e(translate('Postal Code')); ?></label>
                                        <input type="text" name="postal_code"
                                            value="<?php echo e(old('postal_code', $loginUser->zip_code)); ?>"
                                            placeholder="<?php echo e(translate('City Postal')); ?>">
                                        <?php $__errorArgs = ['postal_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="error text-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-inner mb-30">
                                        <label><?php echo e(translate('Short Notes')); ?></label>
                                        <textarea name="notes" placeholder="<?php echo e(translate('Write Something')); ?>..."><?php echo e(old('notes')); ?></textarea>
                                        <?php $__errorArgs = ['notes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="error text-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="inquiry-form">
                            <div class="title">
                                <h4><?php echo e(translate('Order Summary')); ?></h4>
                            </div>
                            <form>
                                <div class="cart-menu">
                                    <div class="cart-body">
                                        <?php if($singleProduct): ?>
                                            <ul>
                                                <li class="single-item">
                                                    <div class="item-area">
                                                        <div class="main-item">
                                                            <?php if($singleProduct->features_image): ?>
                                                                <div class="item-img">
                                                                    <img src="<?php echo e('uploads/tour/features/' . $singleProduct->features_image); ?>"
                                                                        alt="<?php echo e($singleProduct->title); ?>">
                                                                </div>
                                                            <?php endif; ?>
                                                            <div class="content-and-quantity">
                                                                <div class="content">
                                                                    <h6>
                                                                        <a
                                                                            href="<?php echo e('' . $customer_cart['product_type'] . '/' . $singleProduct->slug . ''); ?>">
                                                                            <?php echo e($singleProduct->title); ?>

                                                                        </a>
                                                                    </h6>
                                                                    <div
                                                                        class="mt-3 price-and-btn d-flex align-items-center justify-content-between">
                                                                        <span><?php echo e($customer_cart['product_type'] == 'hotel' ? translate('Room') : translate('Adult')); ?>:
                                                                            <?php echo e(currency_symbol()); ?><?php echo e($customer_cart['adult_unit_sale_price'] ? $customer_cart['adult_unit_sale_price'] : $customer_cart['adult_unit_price']); ?>

                                                                            x <?php echo e($quantity); ?> <?php if($customer_cart['product_type'] == 'hotel'): ?>
                                                                                x <?php echo e($customer_cart['days'] . ' days'); ?>

                                                                            <?php endif; ?>
                                                                        </span>
                                                                        <?php
                                                                            if (
                                                                                $customer_cart['product_type'] ==
                                                                                'hotel'
                                                                            ) {
                                                                                $price =
                                                                                    $price * $customer_cart['days'];
                                                                            } else {
                                                                                $price = $price;
                                                                            }
                                                                        ?>
                                                                        <span><?php echo e(currency_symbol() . $price); ?></span>
                                                                    </div>
                                                                    <?php if(isset($customer_cart['child_qty']) &&
                                                                            $customer_cart['child_qty'] > 0 &&
                                                                            isset($customer_cart['child_unit_price']) &&
                                                                            $customer_cart['child_unit_price'] > 0): ?>
                                                                        <div
                                                                            class="mt-3 price-and-btn d-flex align-items-center justify-content-between">
                                                                            <span><?php echo e(translate('Child')); ?>:
                                                                                <?php echo e(currency_symbol() . $customer_cart['child_unit_price']); ?>

                                                                                x <?php echo e($customer_cart['child_qty']); ?></span>
                                                                            <span><?php echo e(currency_symbol() . $customer_cart['child_price']); ?></span>
                                                                        </div>
                                                                    <?php endif; ?>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </li>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                    <div class="cart-footer">
                                        <div class="pricing-area">
                                            <ul>
                                                <li><span><?php echo e(translate('Sub Total')); ?></span><span><?php echo e(currency_symbol()); ?><?php echo e($price + $customer_cart['child_price']); ?></span>
                                                </li>
                                                <?php if(isset($customer_cart['services_list']) && $customer_cart['services_list']): ?>
                                                    <?php
                                                        $services = json_decode($singleProduct->service_fees);
                                                    ?>
                                                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if(in_array($key, $customer_cart['services_list'])): ?>
                                                            <?php
                                                                if ($val->unit == 'fixed') {
                                                                    if ($val->price_type == 'per_person') {
                                                                        $value =
                                                                            $val->price *
                                                                            ($customer_cart['quantity'] +
                                                                                $customer_cart['child_qty']);
                                                                    } else {
                                                                        $value = $val->price;
                                                                    }
                                                                } else {
                                                                    if ($val->price_type == 'per_person') {
                                                                        if ($customer_cart['adult_unit_sale_price']) {
                                                                            $avalue =
                                                                                ($val->price / 100) *
                                                                                $customer_cart[
                                                                                    'adult_unit_sale_price'
                                                                                ] *
                                                                                $customer_cart['quantity'];
                                                                        } else {
                                                                            $avalue =
                                                                                ($val->price / 100) *
                                                                                $customer_cart['adult_unit_price'] *
                                                                                $customer_cart['quantity'];
                                                                        }
                                                                        $cvalue =
                                                                            ($val->price / 100) *
                                                                            $customer_cart['child_unit_price'] *
                                                                            $customer_cart['child_qty'];

                                                                        $value = $avalue + $cvalue;
                                                                    } else {
                                                                        if ($customer_cart['adult_unit_sale_price']) {
                                                                            $avalue =
                                                                                ($val->price / 100) *
                                                                                $customer_cart['adult_unit_sale_price'];
                                                                        } else {
                                                                            $avalue =
                                                                                ($val->price / 100) *
                                                                                $customer_cart['adult_unit_price'];
                                                                        }
                                                                        $cvalue =
                                                                            ($val->price / 100) *
                                                                            $customer_cart['child_unit_price'];

                                                                        $value = $avalue + $cvalue;
                                                                    }
                                                                }
                                                            ?>
                                                            <li><span><?php echo e($val->name); ?></span><span><?php echo e(currency_symbol() . $value); ?></span>
                                                            </li>
                                                            <input type="hidden"
                                                                name="services[<?php echo e($key); ?>][name]"
                                                                value="<?php echo e($val->name); ?>">
                                                            <input type="hidden"
                                                                name="services[<?php echo e($key); ?>][price]"
                                                                value="<?php echo e($value); ?>">
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                                <?php
                                                    if (get_setting('tax_rate') > 0) {
                                                        $tax_rate = get_setting('tax_rate');
                                                        $tax_amount =
                                                            ($customer_cart['total_amount'] / 100) *
                                                            get_setting('tax_rate');
                                                        $total_with_tax = $customer_cart['total_amount'] + $tax_amount;
                                                    } else {
                                                        $tax_rate = 0;
                                                        $tax_amount = 0;
                                                        $total_with_tax = $customer_cart['total_amount'];
                                                    }
                                                ?>
                                                <li><span><?php echo e(translate('Tax') . ' (' . $tax_rate . '%)'); ?>

                                                    </span><span><?php echo e($tax_amount); ?></span></li>
                                                <input type="hidden" name="tax_amount" value="<?php echo e($tax_amount); ?>">
                                                <input type="hidden" name="tax_rate" value="<?php echo e($tax_rate); ?>">
                                            </ul>
                                            <ul class="total">
                                                <input type="hidden" name="total_with_tax"
                                                    value="<?php echo e(number_format($total_with_tax, 2)); ?>">
                                                <li><span><?php echo e(translate('Total')); ?></span><span><?php echo e(currency_symbol() . $total_with_tax); ?></span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="choose-payment-method">
                                            <h6><?php echo e(translate('Select Payment Method')); ?></h6>
                                            <?php if($payment_methods): ?>
                                                <input type="hidden" name="payment_method" class="payment_method"
                                                    value="<?php echo e($payment_methods[0]->method_name); ?>">
                                                <div class="payment-option">
                                                    <ul>
                                                        <?php $__currentLoopData = $payment_methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $payment_method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li class="<?php echo e($payment_method->method_name); ?> <?php echo e($key == 0 ? 'active' : ''); ?> payment-method-item" data-method="<?php echo e($payment_method->method_name); ?>">
                                                            <?php if($payment_method->method_name === 'crypto'): ?>
                                                                <img src="<?php echo e(asset('uploads/payment_methods/crypto.png')); ?>" alt="Crypto Payment" style="height:32px;">
                                                                <span class="ms-2">Pay with Crypto</span>
                                                            <?php else: ?>
                                                                <img src="<?php echo e(asset('uploads/payment_methods/' . $payment_method->default_logo)); ?>" alt="<?php echo e($payment_method->method_name); ?>">
                                                            <?php endif; ?>
                                                                <div class="checked">
                                                                    <i class="bi bi-check"></i>
                                                                </div>
                                                                <?php if($payment_method->method_name === 'crypto'): ?>
                                                                    <span class="badge bg-info ms-2">Secure Payment</span>
                                                                <?php endif; ?>
                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                </div>
                                            <?php endif; ?>
                                            
                                            
                                            <div class="pt-25" id="CryptoPayment" style="display: none;">
                                                <div class="alert alert-info">
                                                    <i class="bi bi-shield-check"></i> You will be redirected to our secure payment gateway to complete your transaction.
                                                </div>
                                                <button type="submit" class="primary-btn1 w-100" id="crypto-submit">
                                                    <i class="bi bi-shield-lock"></i> Proceed to Secure Checkout
                                                </button>
                                                <div class="text-danger mt-2" id="crypto-error" style="display:none;"></div>
                                            </div>
                                            
                                            
                                            <div class="pt-25 payment-option-hide mt-30" id="StripePayment" style="display: none;">
                                                <div class="row g-4">
                                                    <div class="col-lg-12">
                                                        <div class="form-inner">
                                                            <label><?php echo e(translate('Card Number')); ?></label>
                                                            <input type="text" name="card_number" class="card-number"
                                                                placeholder="1234 1234 1234 1234" maxlength="16">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-inner">
                                                            <label><?php echo e(translate('Expiry Month')); ?></label>
                                                            <input type="text" name="expiry_month" class="card-expiry-month"
                                                                placeholder="MM" maxlength="2">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-inner">
                                                            <label><?php echo e(translate('Expiry Year')); ?></label>
                                                            <input type="text" name="expiry_year" class="card-expiry-year"
                                                                placeholder="YY" maxlength="2">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-inner">
                                                            <label><?php echo e(translate('CVC')); ?></label>
                                                            <input type="text" name="cvc" class="card-cvc"
                                                                placeholder="123" maxlength="4">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-inner" id="DefaultPlaceOrder">
                                                <button class="primary-btn1" type="submit"><?php echo e(translate('Place Order')); ?></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="balance-content">
        <?php echo $__env->make('frontend.template-1.partials.payment_modal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>
    <?php $__env->startPush('js'); ?>
        <script src="<?php echo e(asset('frontend/js/payment.js')); ?>"></script>
        <script>
            $(document).ready(function() {
                // Initialize first payment method
                var firstMethod = $('.payment-method-item:first').data('method');
                if (firstMethod === 'crypto') {
                    $('#CryptoPayment').show();
                    $('#DefaultPlaceOrder').hide();
                    $('#StripePayment').hide();
                } else if (firstMethod === 'stripe') {
                    $('#StripePayment').show();
                    $('#CryptoPayment').hide();
                    $('#DefaultPlaceOrder').show();
                } else {
                    $('#CryptoPayment').hide();
                    $('#StripePayment').hide();
                    $('#DefaultPlaceOrder').show();
                }

                $('.payment-method-item').on('click', function() {
                    var method = $(this).data('method');
                    $('.payment-method-item').removeClass('active');
                    $(this).addClass('active');
                    $('.payment_method').val(method);
                    
                    if (method === 'crypto') {
                        $('#CryptoPayment').show();
                        $('#DefaultPlaceOrder').hide();
                        $('#StripePayment').hide();
                    } else if (method === 'stripe') {
                        $('#StripePayment').show();
                        $('#CryptoPayment').hide();
                        $('#DefaultPlaceOrder').show();
                    } else {
                        $('#CryptoPayment').hide();
                        $('#StripePayment').hide();
                        $('#DefaultPlaceOrder').show();
                    }
                });

                // Crypto form validation
                $('#crypto-submit').on('click', function(e) {
                    var missing = [];
                    if (!$('input[name="first_name"]').val().trim()) missing.push('First Name');
                    if (!$('input[name="last_name"]').val().trim()) missing.push('Last Name');
                    if (!$('input[name="address"]').val().trim()) missing.push('Address');
                    if (!$('input[name="phone"]').val().trim()) missing.push('Phone');
                    if (!$('input[name="email"]').val().trim()) missing.push('Email');
                    
                    if (missing.length > 0) {
                        e.preventDefault();
                        $('#crypto-error').text('Please fill in the following required fields: ' + missing.join(', ')).show();
                        return false;
                    } else {
                        $('#crypto-error').hide();
                        // Show loading state
                        $(this).html('<i class="bi bi-hourglass-split"></i> Redirecting to Secure Payment...').prop('disabled', true);
                    }
                });
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.template-' . selectedTheme() . '.partials.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /mnt/c/Users/jstnh/airbnb-booking-site/resources/views/frontend/template-1/checkout.blade.php ENDPATH**/ ?>