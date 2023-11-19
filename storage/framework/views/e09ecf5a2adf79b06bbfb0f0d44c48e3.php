<!DOCTYPE html>

<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>
        if (localStorage.theme) document.documentElement.setAttribute("data-theme", localStorage.theme);
    </script>

    <?php echo app('Illuminate\Foundation\Vite')([
        'resources/css/app.css',
        'resources/js/app.js'
    ]); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/theme.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/feather.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/bootstrap-select.min.css')); ?>">
    <script src="<?php echo e(asset('assets/bootstrap-select.js')); ?>" type="module"></script>
    <script src="<?php echo e(asset('assets/bootstrap-notify.js')); ?>" type="module"></script>
    <title>Dashboard | Geeks</title>

    <?php echo $__env->yieldContent('extraHeadResources'); ?>
</head>

<body>
    <?php echo $__env->yieldContent('modals'); ?>
    <?php echo $__env->yieldContent('content'); ?>

    <script src="<?php echo e(asset('assets/theme.js')); ?>" type="module"></script>
    <?php echo $__env->yieldContent('extraScripts'); ?>

    <?php if(Session::has('message')): ?>
        <script type="module">
            notify("<?php echo e(Session::get('message')); ?>", "primary");
        </script>
    <?php endif; ?>

    <script>
        function notify(message, type) {
            $.notify({
                message: message
            },{
                type: type
            });
        }
    </script>
</body>

</html>
<?php /**PATH /var/www/html/resources/views/layouts/active.blade.php ENDPATH**/ ?>