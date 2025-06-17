<!-- Modal -->
<div class="modal fade" id="createPage" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="createPageLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form id="pagesCreateForm" action="<?php echo e(route('page.store')); ?>"  method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="modal-header">
                                    <h5 class="modal-title" id="createPageLabel"><?php echo e(translate('Create New Page')); ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-inner mb-35">
                                        <label><?php echo e(translate('Page Name')); ?> *</label>
                                        <input type="text" class="username-input" placeholder="<?php echo e(translate('Enter Page Name')); ?>" name="page_name" id="page_name">
                                        <?php $__errorArgs = ['page_name'];
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
                                <div class="modal-footer border-white">
                                    <button type="button" class="eg-btn btn--red py-1 px-3 rounded" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="eg-btn btn--primary py-1 px-3 rounded">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><?php /**PATH /mnt/c/Users/jstnh/airbnb-booking-site/resources/views/backend/pages/modal.blade.php ENDPATH**/ ?>