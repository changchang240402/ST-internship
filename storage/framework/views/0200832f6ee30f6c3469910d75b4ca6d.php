<?php $__env->startSection('content'); ?>
    <table>
        <tr>
            <td align="center">
                <div class="container">
                    <div class="content">
                        <table class="content-table">
                            <tr>
                                <td>
                                    <h1>Issued <strong><?php echo e($data['issue_key']); ?></strong> has been updated by
                                        <?php echo e($data['updated_by']['display_name']); ?></h1>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="text">

                                    <div class="d-flex flex-start mt-4">
                                        <img class="rounded-circle shadow-1-strong"
                                            src="<?php echo e(getFullUrl($data['updated_by']['photo_path'])); ?>"
                                            alt="avatar" width="45" height="45" />
                                        <div class="flex-grow-1 flex-shrink-1">
                                            <div>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p class="mb-1">
                                                        <strong><?php echo e($data['updated_by']['display_name'] ?? $data['updated_by']['email']); ?></strong><span
                                                            class="small"> -
                                                            <?php echo e($data['updated_at']); ?></span>
                                                    </p>
                                                </div>
                                                <p class="small mb-0">
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    </p>
                                </td>
                            </tr>
                            <?php $__currentLoopData = $data['new']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(in_array($key, config('constants.ISSUE_SPECIAL_FIELD'))): ?>
                                    <tr>
                                        <td>
                                            <strong><?php echo e(config('constants.ISSUE_FIELD.' . $key)); ?></strong>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                                            </svg>
                                            <span style="background-color: #b9fcc9"><?php echo issueSpecialFieldContent($key, $value); ?></span>
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <tr>
                                        <td>
                                            <strong><?php echo e(config('constants.ISSUE_FIELD.' . $key)); ?></strong>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                                            </svg>
                                            <span style="background-color: #b9fcc9"><?php echo $value; ?></span>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <div>
                                        <a href="<?php echo e($data['links']); ?>" class="button">View issue</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="text">
                                        <strong>What is Jari Software?</strong> Project and issue tracking
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </td>
        </tr>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('mails.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/mails/issue-updated.blade.php ENDPATH**/ ?>