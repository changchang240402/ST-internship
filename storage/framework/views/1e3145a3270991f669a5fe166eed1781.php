<style>
    .list-group-item:hover {
        background-color: var(--geeks-list-group-bg);
    }
</style>

<div class="header">
    <!-- navbar -->
    <nav class="navbar-default navbar navbar-expand-lg">
        <a id="nav-toggle" href="#">
            <i class="fe fe-menu"></i>
        </a>

        <?php if(!Route::is('projects.*')): ?>
        <div class="ms-5 dropdown stopevent">
            <a class="btn btn-dark" href="#" role="button" id="dropdownNotification" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Project: <?php echo e(session('project')->name); ?>

            </a>
            <div class="dropdown-menu dropdown-menu-lg mt-5" aria-labelledby="dropdownNotification">
                <div>
                    <div class="border-bottom px-3 pb-3 d-flex justify-content-between align-items-center">
                        <span class="h4 mb-0">Projects</span>
                    </div>
                    <!-- List projects -->
                    <ul class="list-group list-group-flush simplebar-scrollable-y" data-simplebar="init" style="max-height: 200px;"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden scroll;"><div class="simplebar-content" style="padding: 0px;">
                        <?php $__currentLoopData = $VIEW_SHARE_PROJECTS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-group-item pb-0 border-bottom <?php if($project->id == session('project')->id): ?> bg-light <?php endif; ?>">
                                <div class="row">
                                    <div class="col">
                                        <a href="<?php echo e(route('kanban.index', ['key'=> $project['key']])); ?>" class="text-body">
                                            <div class="d-flex">
                                                <img src="<?php echo e(getS3URL($project->icon_path)); ?>" alt="" class="avatar-md rounded-circle">
                                                <div class="ms-3">
                                                    <h5 class="fw-bold mb-1"><?php echo e($project->name); ?></h5>
                                                    <ps>
                                                        <?php echo e($project->description); ?>

                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div></div></div></div><div class="simplebar-placeholder" style="width: 352px; height: 557px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 161px; transform: translate3d(0px, 0px, 0px); display: block;"></div></div></ul>
                    <div class="border-top px-3 pt-3 pb-0">
                        <a href="<?php echo e(route('projects.index')); ?>" class="text-link fw-semibold">
                            See all Projects
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <!--Navbar nav -->
        <div class="ms-auto d-flex">
            <a href="#" class="form-check form-switch theme-switch btn btn-light btn-icon rounded-circle ">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault"></label>
            </a>
            <ul class="navbar-nav navbar-right-wrap ms-2 d-flex nav-top-wrap">
                <!-- List -->
                <li class="dropdown ms-2">
                    <a class="rounded-circle" href="#" role="button" id="dropdownUser" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <div class="avatar avatar-md avatar-indicators avatar-online">
                            <img alt="avatar" src="<?php echo e(getS3URL(auth()->user()->photo_path)); ?>" class="rounded-circle">
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
                        <div class="dropdown-item">
                            <div class="d-flex">
                                <div class="avatar avatar-md avatar-indicators avatar-online">
                                    <img alt="avatar" src="<?php echo e(getS3URL(auth()->user()->photo_path)); ?>"
                                        class="rounded-circle">
                                </div>
                                <div class="ms-3 lh-1">
                                    <h5 class="mb-1"><?php echo e(auth()->user()->display_name); ?></h5>
                                    <p class="mb-0 text-muted"><?php echo e(auth()->user()->email); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <ul class="list-unstyled">
                            <li>
                                <a class="dropdown-item" href="<?php echo e(route('users.show', ['user' => auth()->user()->id ])); ?>">
                                    <i class="fe fe-user me-2"></i> Profile
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>">
                                    <i class="fe fe-power me-2"></i> Sign Out
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>
<?php /**PATH /var/www/html/resources/views/partials/navbar.blade.php ENDPATH**/ ?>