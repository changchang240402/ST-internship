<nav class="navbar-vertical navbar">
    <div class="vh-100 simplebar-scrollable-y simplebar-mouse-entered" data-simplebar="init">
        <div class="simplebar-wrapper" style="margin: 0px;">
            <div class="simplebar-height-auto-observer-wrapper">
                <div class="simplebar-height-auto-observer"></div>
            </div>
            <div class="simplebar-mask">
                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                    <div class="simplebar-content-wrapper" tabindex="0" role="region"
                        aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;">
                        <div class="simplebar-content" style="padding: 0px;">
                            <!-- Brand logo -->
                            <a class="navbar-brand" href="../../index.html">
                                <img src="<?php echo e(asset('assets/logo-inverse.svg')); ?>" alt="">
                            </a>
                            <!-- Navbar nav -->
                            <ul class="navbar-nav flex-column" id="sideNavbar">
                                <li class="nav-item">
                                    <div class="navbar-heading">PROJECT</div>
                                </li>

                                <?php if(session('project')): ?>
                                <li class="nav-item">
                                    <div class="nav-link d-flex justify-content-between align-items-center">
                                        <!-- media -->
                                        <div class="d-flex">
                                            <div class="avatar avatar-md avatar-indicators avatar-online">
                                                <img src="<?php echo e(getS3URL(session('project')->icon_path)); ?>" alt="" style="height: 40px; width: 40px" class="rounded-circle">
                                            </div>
                                            <!-- media body -->
                                            <div class=" ms-2">
                                                <h5 class="mb-0 project-nav-name"><?php echo e(session('project')->name); ?></h5>
                                                <small class="mb-0">
                                                    <?php echo e(session('project')->description); ?>

                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php endif; ?>

                                <!-- Nav item -->
                                <li class="nav-item mb-3">
                                    <a class="nav-link <?php echo e(Route::is('projects.*') ? 'active' : ''); ?> " href="<?php echo e(route('projects.index')); ?>">
                                        <i class="nav-icon fe fe-file me-2"></i> Projects
                                    </a>
                                </li>
                                <?php if(session('project')): ?>
                                <li class="nav-item">
                                    <div class="navbar-heading">PLANNING</div>
                                </li>
                                <!-- Nav item -->
                                <li class="nav-item">
                                    <a class="nav-link <?php echo e(Route::is('kanban.*') ? 'active' : ''); ?> " href="<?php echo e(route('kanban.index', ['key' => session('project')->key])); ?>">
                                        <i class="nav-icon mdi mdi-trello me-2"></i>
                                        Kanban
                                    </a>
                                </li>
                                <!-- Nav item -->
                                <li class="nav-item">
                                    <a class="nav-link <?php echo e(Route::is('members.*') ? 'active' : ''); ?> " href="<?php echo e(route('members.index', ['key' => session('project')->key])); ?>">
                                        <i class="nav-icon fe fe-user me-2"></i>
                                        Members
                                    </a>
                                </li>
                                <!-- Nav item -->
                                <li class="nav-item">
                                    <a class="nav-link <?php echo e(Route::is('issues.*') ? 'active' : ''); ?> " href="<?php echo e(route('issues.index', ['key' => session('project')->key])); ?>">
                                        <i class="nav-icon fe fe-book me-2"></i>
                                        Issues
                                    </a>
                                </li>
                                <!-- Nav item -->
                                <li class="nav-item">
                                    <a class="nav-link <?php echo e(Route::is('chart.burndown') ? 'active' : ''); ?> " href="<?php echo e(route('chart.burndown', ['key' => session('project')->key, 'milestone' => 0])); ?>">
                                        <i class="nav-icon fe fe-bar-chart me-2"></i>
                                        Burndown Chart
                                    </a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="simplebar-placeholder" style="width: 250px; height: 1482px;"></div>
        </div>
        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
            <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
        </div>
        <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
            <div class="simplebar-scrollbar"
                style="height: 175px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
        </div>
    </div>
</nav>
<?php /**PATH /var/www/html/resources/views/partials/sidebar.blade.php ENDPATH**/ ?>