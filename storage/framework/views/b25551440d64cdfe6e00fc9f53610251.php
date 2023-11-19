<div class="row">
    <div class="col-lg-12 col-md-12 col-12">
        <!-- Page header -->
        <div class="border-bottom pb-3 mb-3 d-flex align-items-center justify-content-between">
            <div class="">
                <h1 class="mb-1 h2 fw-bold"><?php echo e($title ?? ''); ?></h1>
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="admin-dashboard.html">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">CMS</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Overview
                        </li>
                    </ol>
                </nav>
            </div>
            <div>
                <a href="admin-cms-post-new.html" class="btn btn-primary">New Post</a>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /var/www/html/resources/views/partials/breadcrumb.blade.php ENDPATH**/ ?>