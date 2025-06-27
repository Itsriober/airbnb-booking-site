<?php $__env->startSection('content'); ?>
<div class="row mb-35 g-4">
    <div class="col-md-6">
        <div class="page-title text-md-start">
            <h4><?php echo e($page_title ?? ''); ?></h4>
        </div>
    </div>
</div>
<div class="row d-flex justify-content-center g-4">
    <div class="col">
        <div class="eg-card-two green-teal">
            <h5 class="title"><?php echo e(translate('Total Sales')); ?></h5>
            <h2 class="number"><?php echo e($data['total_sales'] ? currency_symbol().number_format($data['total_sales'], 2) : '0'); ?></h2>
        </div>
    </div>
    <div class="col">
        <div class="eg-card-two primary">
            <h5 class="title"><?php echo e(translate('Total Orders')); ?></h5>
            <h2 class="number"><?php echo e($data['total_orders'] ?? 0); ?></h2>
        </div>
    </div>
    <div class="col">
        <div class="eg-card-two orange">
            <h5 class="title"><?php echo e(translate('Total Tax Collected')); ?></h5>
            <h2 class="number"><?php echo e($data['total_tax'] ? currency_symbol().number_format($data['total_tax'], 2) : '0'); ?></h2>
        </div>
    </div>
    <div class="col">
        <div class="eg-card-two pink">
            <h5 class="title"><?php echo e(translate('Total Customers')); ?></h5>
            <h2 class="number"><?php echo e($data['total_customers'] ?? 0); ?></h2>
        </div>
    </div>
    <div class="col">
        <div class="eg-card-two blue">
            <h5 class="title"><?php echo e(translate('Total Merchants')); ?></h5>
            <h2 class="number"><?php echo e($data['total_merchants'] ?? 0); ?></h2>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-md-6">
        <div class="eg-card-two">
            <h5 class="title"><?php echo e(translate('Sales by Product Type')); ?></h5>
            <ul class="list-group">
                <li class="list-group-item"><?php echo e(translate('Tours')); ?>: <strong><?php echo e(currency_symbol().number_format($data['tour_sales'], 2)); ?></strong></li>
                <li class="list-group-item"><?php echo e(translate('Hotels')); ?>: <strong><?php echo e(currency_symbol().number_format($data['hotel_sales'], 2)); ?></strong></li>
                <li class="list-group-item"><?php echo e(translate('Activities')); ?>: <strong><?php echo e(currency_symbol().number_format($data['activities_sales'], 2)); ?></strong></li>
                <li class="list-group-item"><?php echo e(translate('Transport')); ?>: <strong><?php echo e(currency_symbol().number_format($data['transport_sales'], 2)); ?></strong></li>
            </ul>
        </div>
    </div>
    <div class="col-md-6">
        <div class="eg-card-two">
            <h5 class="title"><?php echo e(translate('Order Status Breakdown')); ?></h5>
            <ul class="list-group">
                <li class="list-group-item"><?php echo e(translate('Pending')); ?>: <strong><?php echo e($data['orders_pending']); ?></strong></li>
                <li class="list-group-item"><?php echo e(translate('Processing')); ?>: <strong><?php echo e($data['orders_processing']); ?></strong></li>
                <li class="list-group-item"><?php echo e(translate('Approved')); ?>: <strong><?php echo e($data['orders_approved']); ?></strong></li>
                <li class="list-group-item"><?php echo e(translate('Cancelled')); ?>: <strong><?php echo e($data['orders_cancelled']); ?></strong></li>
            </ul>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-12">
        <div class="table-wrapper">
            <h5><?php echo e(translate('Latest Bookings')); ?></h5>
            <table class="eg-table table">
                <thead>
                    <tr>
                        <th><?php echo e(translate('Booking Number')); ?></th>
                        <th><?php echo e(translate('Product')); ?></th>
                        <th><?php echo e(translate('Type')); ?></th>
                        <th><?php echo e(translate('Customer Name')); ?></th>
                        <th><?php echo e(translate('Email / Phone')); ?></th>
                        <th><?php echo e(translate('Quantity')); ?></th>
                        <th><?php echo e(translate('Amount')); ?></th>
                        <th><?php echo e(translate('Date')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($data['recent_orders']->count() > 0): ?>
                        <?php $__currentLoopData = $data['recent_orders']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($order->order_number); ?></td>
                                <td>
                                    <?php if($order->product_type == 'tour'): ?>
                                        <?php echo e($order->tours?->title); ?>

                                    <?php elseif($order->product_type == 'hotel'): ?>
                                        <?php echo e($order->hotels?->title); ?>

                                    <?php elseif($order->product_type == 'activities'): ?>
                                        <?php echo e($order->activities?->title); ?>

                                    <?php elseif($order->product_type == 'transport'): ?>
                                        <?php echo e($order->transports?->title); ?>

                                    <?php endif; ?>
                                </td>
                                <td><?php echo e(ucfirst($order->product_type)); ?></td>
                                <td>
                                    <a href="<?php echo e(route('customer.view', $order->user_id)); ?>" target="_blank">
                                        <?php echo e($order->users?->fname ? $order->users?->fname . ' ' . $order->users?->lname : ''); ?>

                                    </a>
                                </td>
                                <td>
                                    <a href="mailto:<?php echo e($order->users->email); ?>"><?php echo e($order->users->email); ?></a><br>
                                    <a href="tel:<?php echo e($order->users->phone); ?>"><?php echo e($order->users->phone); ?></a>
                                </td>
                                <td><?php echo e($order->adult_qty + $order->child_qty); ?></td>
                                <td><?php echo e(currency_symbol().number_format($order->total_with_tax, 2)); ?></td>
                                <td><?php echo e($order->created_at->format('Y-m-d')); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr><td colspan="8"><?php echo e(translate('No bookings found.')); ?></td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /mnt/c/Users/jstnh/airbnb-booking-site/resources/views/backend/dashboard/index.blade.php ENDPATH**/ ?>