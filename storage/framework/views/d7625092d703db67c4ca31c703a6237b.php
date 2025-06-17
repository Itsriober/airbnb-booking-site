<?php $__env->startSection('content'); ?>
    <div class="row mb-35">
        <div class="page-title d-flex justify-content-between align-items-center">
            <h4><?php echo e($page_title ?? ''); ?></h4>
            <button type="button" class="eg-btn btn--primary back-btn" data-bs-toggle="modal" data-bs-target="#createPage"><img
                    src="<?php echo e(asset('backend/images/icons/add-icon.svg')); ?>" alt="<?php echo e(translate('Add New')); ?>">
                <?php echo e(translate('Add New')); ?></button>
        </div>
    </div>
    <?php
        $locale = get_setting('DEFAULT_LANGUAGE', 'en');
    ?>
    <div class="row">
        <div class="col-12">
            <div class="table-wrapper">
                <table class="eg-table table category-table">
                    <thead>
                        <tr>
                            <th><?php echo e(translate('S.N')); ?></th>
                            <th><?php echo e(translate('Name')); ?></th>
                            <th><?php echo e(translate('Status')); ?></th>
                            <th><?php echo e(translate('Published')); ?></th>
                            <th><?php echo e(translate('Created')); ?></th>
                            <th>
                                <?php $__currentLoopData = \App\Models\Language::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <img src="<?php echo e(asset('assets/img/flags/' . $language->code . '.png')); ?>" class="mr-2">
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </th>
                            <th><?php echo e(translate('Option')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td data-label="S.N"><?php echo e(($pages->currentpage() - 1) * $pages->perpage() + $key + 1); ?></td>
                                <td data-label="Name"><?php echo e($page->getTranslation('page_name')); ?></td>
                                <td data-label="Status">
                                    <span id="statusBlock<?php echo e($page->id); ?>">
                                        <?php if($page->status == 1): ?>
                                            <button class="eg-btn green-light--btn"><?php echo e(translate('Active')); ?></button>
                                        <?php else: ?>
                                            <button class="eg-btn red-light--btn"><?php echo e(translate('Inactive')); ?></button>
                                        <?php endif; ?>
                                    </span>
                                </td>
                                <td data-label="Published">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input flexSwitchCheckStatus" type="checkbox"
                                            data-activations-status="<?php echo e($page->status); ?>"
                                            data-id="<?php echo e($page->id); ?>" data-type="pages" id="flexSwitchCheckStatus<?php echo e($page->id); ?>"
                                            <?php echo e($page->status == 1 ? 'checked' : ''); ?>>
                                    </div>
                                </td>
                                <td data-label="Created"><?php echo e(dateFormat($page->created_at)); ?></td>
                                <td data-label="Language">
                                    <?php $__currentLoopData = \App\Models\Language::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($locale == $language->code): ?>
                                            <i class="text-success bi bi-check-lg"></i>
                                        <?php else: ?>
                                            <a
                                                href="<?php echo e(route('page.edit', ['id' => $page->id, 'lang' => $language->code])); ?>"><i
                                                    class="text--primary bi bi-pencil-square"></i></a>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td data-label="Option">
                                    <div
                                        class="d-flex flex-row justify-content-md-center justify-content-end align-items-center gap-2">
                                      
                                        <a target="_blank" class="eg-btn account--btn"
                                            href="<?php echo e($page->page_slug == 'home' ? url('/') : url($page->page_slug)); ?>"><i
                                                class="bi bi-box-arrow-up-right"></i></a>
                                        <a class="eg-btn add--btn" href="<?php echo e(route('page.edit', $page->id)); ?>"><i
                                                class="bi bi-pencil-square"></i></a>
                                        <form method="POST" action="<?php echo e(route('page.delete', $page->id)); ?>">
                                            <?php echo csrf_field(); ?>
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="eg-btn delete--btn show_confirm"
                                                data-toggle="tooltip" title='Delete'><i class="bi bi-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php echo $__env->make('backend.pages.modal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php $__env->startPush('footer'); ?>
        <div class="d-flex justify-content-center custom-pagination">
            <?php echo $pages->links(); ?>

        </div>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /mnt/c/Users/jstnh/airbnb-booking-site/resources/views/backend/pages/index.blade.php ENDPATH**/ ?>