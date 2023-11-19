<!DOCTYPE html>

<html lang="en">

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
    <title>Dashboard | Geeks</title>

    <?php echo $__env->yieldContent('extraHeadResources'); ?>
</head>

<body class="bg-white">
    <!-- Page Content -->
    <main>
        <section class="container d-flex flex-column vh-100">
            <div class="row">
                <div class="offset-xl-1 col-xl-10 col-md-12 col-12">
                    <div class="mt-4 d-flex justify-content-between align-items-center">
                        <a href="../index.html"><img src="../assets/images/brand/logo/logo.svg" alt="logo"
                                class="logo-inverse" /></a>
                        <div class="">
                            <div class="dropdown">
                                <button class="btn btn-light btn-icon rounded-circle d-flex align-items-center"
                                    type="button" aria-expanded="false" data-bs-toggle="dropdown"
                                    aria-label="Toggle theme (auto)">
                                    <i class="bi theme-icon-active"></i>
                                    <span class="visually-hidden bs-theme-text">Toggle theme</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bs-theme-text">
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center"
                                            data-bs-theme-value="light" aria-pressed="false">
                                            <i class="bi theme-icon bi-sun-fill"></i>
                                            <span class="ms-2">Light</span>
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center"
                                            data-bs-theme-value="dark" aria-pressed="false">
                                            <i class="bi theme-icon bi-moon-stars-fill"></i>
                                            <span class="ms-2">Dark</span>
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center active"
                                            data-bs-theme-value="auto" aria-pressed="true">
                                            <i class="bi theme-icon bi-circle-half"></i>
                                            <span class="ms-2">Auto</span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-center g-0 h-lg-100 py-10">
                <!-- Docs -->
                <div class="offset-xl-1 col-xl-4 col-lg-6 col-md-12 col-12 text-center text-lg-start">
                    <h1 class="display-1 mb-3">404</h1>

                    <p class="mb-5 lead px-4 px-md-0">
                        Oops! Sorry, we couldn’t find the page you were looking for. If you think this is a problem with
                        us, please
                        <a href="#" class="btn-link">Contact us</a>
                    </p>
                    <a href="<?php echo e(route('projects.index')); ?>" class="btn btn-primary me-2">Back to Safety</a>
                </div>
                <!-- img -->
                <div class="offset-xl-1 col-xl-6 col-lg-6 col-md-12 col-12 mt-8 mt-lg-0">
                    <img src="https://geeksui.codescandy.com/geeks/assets/images/error/404-error-img.svg" alt="error" class="w-100" />
                </div>
            </div>
            <div class="row">
                <div class="offset-xl-1 col-xl-10 col-lg-12 col-md-12 col-12">
                    <div class="row align-items-center my-6">
                        <div class="col-md-6 col-8">
                            <p class="mb-0">© Geeks. 2021 Codescandy.</p>
                        </div>
                        <div class="col-md-6 col-4 d-flex justify-content-end">
                            <a href="#" class="text-primary-hover me-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                </svg>
                            </a>
                            <a href="#" class="text-primary-hover me-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                    <path
                                        d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                                </svg>
                            </a>
                            <a href="#" class="text-primary-hover">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                                    <path
                                        d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

</body>
<script src="<?php echo e(asset('assets/theme.js')); ?>" type="module"></script>
<?php echo $__env->yieldContent('extraScripts'); ?>
</body>

</html>
<?php /**PATH /var/www/html/resources/views/errors/404.blade.php ENDPATH**/ ?>