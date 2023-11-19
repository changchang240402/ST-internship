<?php $__env->startSection('content'); ?>
<table>
    <tr>
        <td align="center">
            <div class="container">
                <div class="content">
                    <table class="content-table">
                        <tr>
                            <td>
                                <h1><?php echo e($data["display_name"]); ?> invited you to join them in <?php echo e(config('constants.APP_NAME')); ?></h1>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="text">
                                    You have been invited to participate in the "<?php echo e($data["project_name"]); ?>" collaboration project within <?php echo e(config('constants.APP_NAME')); ?>.
                                </p>
                                <p class="text">
                                    Start planning and tracking work with <?php echo e($data["display_name"]); ?> and your team.
                                    Please accept the invitation and proceed to create an account to join.
                                </p>
                                <p class="text">
                                    Note: If you do not accept this invitation, the invitation to join this project will expire in <?php echo e(config('constants.EXPIRED_MEMBER_STATUS')['BY_DAYS']); ?> days.
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>
                                    <a href="<?php echo e($data["accept_url"]); ?>" class="button">Accept</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="text">
                                    <strong>What is <?php echo e(config('constants.APP_NAME')); ?>?</strong> Project and issue tracking
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

<?php echo $__env->make('mails.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/mails/invite_new_user.blade.php ENDPATH**/ ?>