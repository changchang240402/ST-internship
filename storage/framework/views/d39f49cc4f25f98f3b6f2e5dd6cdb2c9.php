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
    <link rel="stylesheet" href="<?php echo e(asset('assets/page-theme.css')); ?>">
    <script src="<?php echo e(asset('assets/bootstrap-select.js')); ?>" type="module"></script>
    <script src="<?php echo e(asset('assets/bootstrap-notify.js')); ?>" type="module"></script>
    <title>Dashboard | Geeks</title>

    <?php echo $__env->yieldContent('extraHeadResources'); ?>
</head>

<body>
    <?php if(Session::has('message')): ?>
    <script type="module">
        notify('<?php echo e(session("message")); ?>', 'primary');
    </script>
    <?php endif; ?>
  
    <?php echo $__env->yieldContent('modals'); ?>
    <div id="db-wrapper">
        <?php echo $__env->make('partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <main id="page-content">
            <?php if(!auth()->user()->hasVerifiedEmail()): ?>
                <?php if(session('VERIFY_DIALOG') != config("constants.VERIFY_DIALOG.CLOSED")): ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Verify Your Email</strong> To access the full functionality of our application, please check your inbox and follow the verification link.
                        
                        <form method="POST" action="<?php echo e(route('verification.send')); ?>">
                            <?php echo csrf_field(); ?>
                            <button class="btn btn-sm btn-primary" type="submit">Resend verify email</button>
                        </form>
                        <button type="button" onclick="fetch('<?php echo e(route('verification.dialog.close')); ?>', { method: 'GET' });" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <!-- Page Header -->
            <?php echo $__env->make('partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <section class="container-fluid p-4">
                <?php echo $__env->yieldContent('content'); ?>
            </section>
        </main>
    </div>

    <script src="<?php echo e(asset('assets/theme.js')); ?>" type="module"></script>
    <?php echo $__env->yieldContent('extraScripts'); ?>

    <?php if(Session::has('message')): ?>
        <script type="module">
            notify("<?php echo e(Session::get('message')); ?>", "primary");
        </script>
    <?php endif; ?>

    <?php if(Session::has('success')): ?>
        <script type="module">
            notify("<?php echo e(Session::get('success')); ?>", "primary");
        </script>
    <?php endif; ?>

    <?php if(Session::has('error')): ?>
        <script type="module">
            notify("<?php echo e(Session::get('error')); ?>", "danger");
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
<?php /**PATH /var/www/html/resources/views/layouts/main.blade.php ENDPATH**/ ?>