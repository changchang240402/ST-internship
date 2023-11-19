<!DOCTYPE html>
<html>

<head>
    <?php echo $__env->make('mails/layouts/components/css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<?php echo $__env->yieldContent('content'); ?>

</html>
<?php /**PATH /var/www/html/resources/views/mails/layouts/main.blade.php ENDPATH**/ ?>