<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>
        if (localStorage.theme) document.documentElement.setAttribute("data-theme", localStorage.theme);
    </script>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/theme.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/feather.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/bootstrap-select.min.css')); ?>">
    <script src="<?php echo e(asset('assets/bootstrap-select.js')); ?>" type="module"></script>
    <script src="<?php echo e(asset('assets/bootstrap-notify.js')); ?>" type="module"></script>
    <title>Dashboard | Geeks</title>

    <?php echo $__env->yieldContent('extraHeadResources'); ?>
</head>
<section class="pt-5 pb-5">
    <div class="container">
        <!-- User info -->
        <div class="row align-items-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                <!-- Bg -->
                <div class="pt-16 rounded-top"
                    style="
                            background: url(<?php echo e(asset('assets/images/background/profile-bg.jpg')); ?>) no-repeat;
                            background-size: cover;
                        ">
                </div>
                <div class="card px-4 pt-2 pb-4 shadow-sm rounded-top-0 rounded-bottom-0 rounded-bottom-md-2 ">
                    <div class="d-flex align-items-end justify-content-between  ">
                        <div class="d-flex align-items-center">
                            <div class="me-2 position-relative d-flex justify-content-end align-items-end mt-n5">
                                <img src="<?php echo e(getFullUrl(auth()->user()->photo_path)); ?>"
                                    class="avatar-xl rounded-circle border border-4 border-white" alt="avatar">
                            </div>
                            <div class="lh-1">
                                <h2 class="mb-0"> <?php echo e(auth()->user()->display_name); ?>

                                    <a href="#" class="text-decoration-none" data-bs-toggle="tooltip"
                                        data-placement="top" aria-label="Beginner" data-bs-original-title="Beginner">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect x="3" y="8" width="2" height="6" rx="1"
                                                fill="#754FFE"></rect>
                                            <rect x="7" y="5" width="2" height="9" rx="1"
                                                fill="#DBD8E9"></rect>
                                            <rect x="11" y="2" width="2" height="12" rx="1"
                                                fill="#DBD8E9"></rect>
                                        </svg>
                                    </a>
                                </h2>
                                <p class=" mb-0 d-block"><?php echo e('@' . auth()->user()->display_name); ?></p>
                            </div>
                        </div>
                        <div>
                            <a href="#" class="btn btn-primary btn-sm d-none d-md-block">Account
                                Setting</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content -->
        <div class="row mt-0 mt-md-4">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                <!-- Card -->
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">Profile Details</h3>
                        <p class="mb-0">
                            You have full control to manage your own account setting.
                        </p>
                    </div>
                    <!-- Card body -->
                    <?php $__errorArgs = ['display_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <?php $__errorArgs = ['photo_path'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <div class="card-body">
                        <!-- Form -->
                        <form id="post-form" enctype="multipart/form-data" method="POST"
                            action="<?php echo e(route('users.update', ['user' => auth()->user()->id])); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="d-lg-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center mb-4 mb-lg-0">
                                    <img src="<?php echo e(getFullUrl(auth()->user()->photo_path)); ?>" id="image-preview"
                                        class="avatar-xl rounded-circle" alt="avatar">
                                    <div class="ms-3">
                                        <h4 class="mb-0">Your avatar</h4>
                                        <p class="mb-0">
                                            PNG or JPG no bigger than 800px wide and tall.
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <div class="btn btn-outline-secondary btn-sm" style="position: relative;">
                                        Update
                                        <input class="form-control border-0 opacity-0" type="file" id="photo_path"
                                            name="photo_path" onchange="previewImage()"
                                            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0; cursor: pointer;">
                                    </div>
                                </div>
                            </div>
                            <hr class="my-5">
                            <div>
                                <h4 class="mb-0">Personal Details</h4>
                                <p class="mb-4">
                                    Edit your personal information and address.
                                </p>
                                <!-- Display name -->
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="display_name">Display Name</label>
                                    <input type="text" id="display_name" name="display_name" class="form-control"
                                        placeholder="Display Name" required=""
                                        value="<?php echo e(auth()->user()->display_name); ?>">
                                </div>
                                <!-- Last name -->
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="text" id="email" name="email" class="form-control" placeholder="Email"
                                        required="" value="<?php echo e(auth()->user()->email); ?>">
                                </div>
                                <input type="hidden" name="id" value="<?php echo e(auth()->user()->id); ?>">
                                <div class="col-12">
                                    <!-- Button -->
                                    <button class="btn btn-primary" type="submit">
                                        Update Profile
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if(Session::has('success')): ?>
        <script type="module">
            notify( '<?php echo e(Session::get("success")); ?>','primary')
        </script>
    <?php endif; ?>
    <?php if(Session::has('error')): ?>
        <script type="module">
            notify( '<?php echo e(Session::get("error")); ?>','danger')
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
    <script>
        function previewImage() {
            const input = document.getElementById('photo_path');
            const imagePreview = document.getElementById('image-preview');
            const file = input.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(event) {
                    imagePreview.src = event.target.result;
                };

                reader.readAsDataURL(file);
            } else {
                // Clear the image preview if no file is selected
                imagePreview.src = '';
            }
        }
    </script>
</section>
<?php /**PATH /var/www/html/resources/views/user/profile.blade.php ENDPATH**/ ?>