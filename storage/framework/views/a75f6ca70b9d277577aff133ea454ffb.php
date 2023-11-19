<?php $__env->startSection('content'); ?>
<table>
    <tr>
        <td align="center">
            <div class="container">
                <div class="content">
                    <table class="content-table">
                        <tr>
                            <td>
                                <h1><?php echo e($data['displayName']); ?> has reply your comment</h1>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                &nbsp; <!-- Transparent spacer image -->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4 style="display: inline; margin: 0;">Project: </h4>
                                <span class="text" style="display: inline;"><?php echo e($data['projectName']); ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                &nbsp; <!-- Transparent spacer image -->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4 style="display: inline; margin: 0;">Issue: </h4>
                                <span class="text" style="display: inline;"><?php echo e($data['issueTitle']); ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                &nbsp; <!-- Transparent spacer image -->
                            </td>
                        </tr>
                        <tr>
                            <td >
                                <div>
                                    <a class="button"href=<?php echo e(route("comments.index", ['key' => $data['projectKey'], 'issue_key' => $data['issueKey']])); ?>>View Issue</a>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </td>
    </tr>
</table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('mails.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/mails/reply_comment.blade.php ENDPATH**/ ?>