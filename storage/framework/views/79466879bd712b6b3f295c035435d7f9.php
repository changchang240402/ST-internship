<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12 col-xl-8 col-12">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h4 class="mb-0"><?php echo e($project['name']); ?></h4>
                                </div>
                                <!-- dropdown  -->
                                <div>
                                    <span class="dropdown dropstart">
                                        <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button"
                                            id="DropdownTen" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="fe fe-more-vertical"></i>
                                        </a>
                                        <span class="dropdown-menu" aria-labelledby="DropdownTen">
                                            <span class="dropdown-header">Settings</span>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another
                                                action</a>
                                            <a class="dropdown-item" href="#">Something
                                                else
                                                here</a>
                                        </span>
                                    </span>
                                </div>
                            </div>


                        </div>
                        <div class="card-body">
                            <p><?php echo e($project['description']); ?></p>

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item px-0">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-alphabet-uppercase text-primary"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M1.226 10.88H0l2.056-6.26h1.42l2.047 6.26h-1.29l-.48-1.61H1.707l-.48 1.61ZM2.76 5.818h-.054l-.75 2.532H3.51l-.75-2.532Zm3.217 5.062V4.62h2.56c1.09 0 1.808.582 1.808 1.54 0 .762-.444 1.22-1.05 1.372v.055c.736.074 1.365.587 1.365 1.528 0 1.119-.89 1.766-2.133 1.766h-2.55ZM7.18 5.55v1.675h.8c.812 0 1.171-.308 1.171-.853 0-.51-.328-.822-.898-.822H7.18Zm0 2.537V9.95h.903c.951 0 1.342-.312 1.342-.909 0-.591-.382-.954-1.095-.954H7.18Zm5.089-.711v.775c0 1.156.49 1.803 1.347 1.803.705 0 1.163-.454 1.212-1.096H16v.12C15.942 10.173 14.95 11 13.607 11c-1.648 0-2.573-1.073-2.573-2.849v-.78c0-1.775.934-2.871 2.573-2.871 1.347 0 2.34.849 2.393 2.087v.115h-1.172c-.05-.665-.516-1.156-1.212-1.156-.849 0-1.347.67-1.347 1.83Z" />
                                            </svg>
                                            <div class="ms-2">
                                                <h5 class="mb-0 text-body">Key</h5>
                                            </div>
                                        </div>
                                        <div>
                                            <div>
                                                <p class="text-dark mb-0 fw-semibold"><?php echo e($project['key']); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item px-0">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor"
                                                class="bi bi-calendar4  text-primary"
                                                viewBox="0 0 16 16">
                                                <path d="M3.5 0a.5.5 0 0 1.5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1.5-.5zM2 2a1 1 0 0 0-1 1v1h14V3a1 1 0 0 0-1-1H2zm13 3H1v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V5z"></path>
                                            </svg>
                                            <div class="ms-2">
                                                
                                                <h5 class="mb-0 text-body">Start date</h5>
                                            </div>
                                        </div>
                                        <div>
                                            <div>
                                                <p class="text-dark mb-0 fw-semibold"><?php echo e($project['created_at']); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item  px-0">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                fill="currentColor" class="bi bi-images text-primary"
                                                viewBox="0 0 16 16">
                                                <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                                                <path
                                                    d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z" />
                                            </svg>
                                            <div class="ms-2">
                                                <h5 class="mb-0 text-body">Logo</h5>
                                            </div>
                                        </div>
                                        <div>
                                            <div>
                                                <p class="text-dark mb-0 fw-semibold"><?php echo e($project['icon_path']); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-4">
                    <!-- card -->
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header card-header-height d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="mb-0">Recent Activity
                                </h4>
                            </div>
                            <div><a href="#">View All</a></div>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <!-- List group -->
                            
                            <ul class="list-group list-group-flush list-timeline-activity">
                                <li class="list-group-item px-0 pt-0 border-0 pb-6">
                                    <div class="row position-relative">
                                        <div class="col-auto">
                                            <div class="icon-shape icon-md bg-light-primary text-primary rounded-circle">
                                                <i class="fe fe-check"></i>
                                            </div>
                                        </div>
                                        <div class="col ms-n3">
                                            <h4 class="mb-0 h5">Task Finished</h4>
                                            <p class="mb-0 text-body">Paula finished figma task</p>

                                        </div>
                                        <div class="col-auto">
                                            <span class="text-muted fs-6">2 mins ago</span>

                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item px-0 pt-0 border-0 pb-6">
                                    <div class="row position-relative">
                                        <div class="col-auto">
                                            <div class="icon-shape icon-md bg-light-primary text-primary rounded-circle">
                                                <i class="fe fe-message-square"></i>
                                            </div>
                                        </div>
                                        <div class="col ms-n3">
                                            <h4 class="mb-0 h5">New Comment</h4>
                                            <p class="mb-0 text-body">Georg commented on task.</p>
                                        </div>
                                        <div class="col-auto">
                                            <span class="text-muted fs-6">1 hour ago</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item px-0 pt-0 border-0 pb-6">
                                    <div class="row position-relative">
                                        <div class="col-auto">
                                            <div class="icon-shape icon-md bg-light-primary text-primary rounded-circle">
                                                <i class="fe fe-alert-triangle"></i>
                                            </div>
                                        </div>
                                        <div class="col ms-n3">
                                            <h4 class="mb-0 h5">Task Overdue</h4>
                                            <p class="mb-0 text-body">Task <a href="#"><u>status updatd for board</u></a>
                                                is overdue.</p>

                                        </div>
                                        <div class="col-auto">
                                            <span class="text-muted fs-6">1 day</span>

                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item px-0 pt-0 border-0">
                                    <div class="row position-relative">
                                        <div class="col-auto">
                                            <div class="icon-shape icon-md bg-light-primary text-primary rounded-circle">
                                                <i class="fe fe-mail"></i>
                                            </div>
                                        </div>
                                        <div class="col ms-n3">
                                            <h4 class="mb-0 h5">Update Send to Client</h4>
                                            <p class="mb-0 text-body">Jitu send email to update design
                                                for client Geeks UI.</p>

                                        </div>
                                        <div class="col-auto">
                                            <span class="text-muted fs-6">1 day</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-12 col-xl-4 col-12">
            <!-- card  -->
            <div class="card mb-4 bg-primary border-primary">
                <!-- card body  -->
                <div class="card-body">
                    <h4 class="card-title text-white">Days passed </h4>
                    <!-- dropdown  -->
                    <div class="d-flex justify-content-between align-items-center mt-8">
                        <div>
                            <h1 class="display-4 text-white mb-1" id="days-passed"></h1>
                            <p class="mb-0 text-white" id="current-date"></p>
                        </div>
                        <div>
                            <i class="fe fe-flag fs-1 text-light-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // JavaScript to get and display the current date
        const currentDateElement = document.getElementById("current-date");
        const daysPassed = document.getElementById("days-passed");
        const currentDate = new Date();
        currentDateElement.textContent = currentDate.toDateString();

        const startDate = new Date(Date.parse('<?php echo e($project['created_at']); ?>'));
        const timeDifference = currentDate - startDate;
        var daysDifference = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
        switch (true) {
            case isNaN(daysDifference):
                daysDifference = '-';
                break;
            case daysDifference > 1:
                daysDifference += " days";
                break;
            default:
                daysDifference += " day";
        }
        daysPassed.textContent = daysDifference;
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/project/detail.blade.php ENDPATH**/ ?>