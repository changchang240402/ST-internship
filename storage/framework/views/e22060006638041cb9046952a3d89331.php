<?php $__env->startSection('content'); ?>
    <table>
        <tr>
            <td align="center">
                <div class="container">
                    <div class="content">
                        <table class="content-table">
                            <tr>
                                <td>
                                    <h1>Issued <strong><?php echo e($data['issue_key']); ?></strong> of Project
                                        <strong><?php echo e($data['project_key']); ?></strong> has not has not been completed.
                                    </h1>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="text">
                                    <div class="d-flex flex-start mt-4">
                                        <img class="rounded-circle shadow-1-strong"
                                            src="<?php echo e(getFullUrl($data['project_icon'])); ?>"
                                            alt="avatar" width="45" height="45" />
                                        <div class="flex-grow-1 flex-shrink-1">
                                            <div>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p class="mb-1">
                                                        <strong>Project :</strong><span><?php echo e($data['project_name']); ?></span>
                                                    </p>
                                                    <p class="mb-1">
                                                        <strong>Issue :</strong><span><?php echo e($data['issue_key']); ?> - <?php echo e($data['issue_name']); ?></span>
                                                    </p>
                                                    <p class="mb-1">
                                                        <strong>Please complete it as soon as possible!!</strong>
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

<?php echo $__env->make('mails.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/mails/issue-late.blade.php ENDPATH**/ ?>