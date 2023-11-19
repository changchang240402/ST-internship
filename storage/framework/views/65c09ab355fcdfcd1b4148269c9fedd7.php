<?php $__env->startSection('content'); ?>
<table>
    <tr>
        <td align="center">
            <div class="container">
                <div class="content">
                    <table class="content-table">
                        <tr>
                            <td>
                                <h1>Hello!</h1>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="text">
                                    You are receiving this email because we received a password reset request for your account.
                                </p>
                                <p class="text">
                                    This password reset link will expire in 60 minutes.
                                </p>
                                <p class="text">
                                    If you did not request a password reset, no further action is required.
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>
                                    <a href="<?php echo e(route('password.reset', ['token' => $token, 'email' => $email])); ?>" class="button">Reset Password</a>
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

<?php echo $__env->make('mails.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/mails/reset_password.blade.php ENDPATH**/ ?>