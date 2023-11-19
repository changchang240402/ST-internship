<?php $__env->startSection('content'); ?>
    <div class="row">
        <!-- col -->
        <div class="col-12">
            <!-- card -->
            <div class="card">
                <!-- table -->
                <div class="table-responsive overflow-y-hidden">
                    <table class="table mb-0 text-nowrap table-hover table-centered">
                        <thead>
                            <tr>
                                <th scope="col">Project Name</th>
                                <th scope="col">Key</th>
                                <th scope="col">Description</th>
                                <th scope="col">Dates</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="icon-shape icon-xxl border rounded position-relative">
                                                <img id="image"
                                                    src="<?php echo e(getS3URL($project['icon_path'])); ?>"
                                                    alt=""
                                                    style="max-width: 100%; max-height: 100%; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                            </div>
                                            <div class="ms-3">
                                                <h4 class="mb-0"><a href="<?php echo e(route('kanban.index', ['key'=> $project['key']])); ?>"
                                                        class="text-inherit"><?php echo e($project['name']); ?></a></h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <?php echo e($project['key']); ?>

                                    </td>
                                    <td>
                                        <div class="text-truncate" style="width: 6rem"><?php echo e($project['description']); ?></div>
                                    </td>
                                    <td>
                                        <?php echo e($project['created_at']); ?>

                                    </td>

                                    <td>
                                        <div class="dropdown dropstart">
                                            <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#"
                                                role="button" id="Dropdown1" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="fe fe-more-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="Dropdown1">
                                                <span class="dropdown-header">Settings</span>
                                                <a class="dropdown-item"
                                                    href="<?php echo e(route('projects.show', ['project' => $project['id']])); ?>">
                                                    <i class="fe fe-edit dropdown-item-icon"></i>View Details
                                                </a>
                                                <?php if($project['created_by'] === auth()->id()): ?>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="<?php echo e(route('projects.edit', ['key'=> $project['key']])); ?>">
                                                        <i class="fe fe-edit dropdown-item-icon"></i>Edit Details
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <button class="btn dropdown-item btn-delete" data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal<?php echo e($project['id']); ?>">
                                                        <i class="fe fe-trash dropdown-item-icon"></i>Delete Project
                                                    </button>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td colspan="7">
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="text-muted border border-2 rounded-3 card-dashed-hover"
                                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight">
                                            <div class="icon-shape icon-lg ">
                                                +
                                            </div>
                                        </a>
                                        <div class="ms-3">
                                            <h4 class="mb-0"><a href="#" class="text-inherit">New Project</a></h4>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    
    <div class="offcanvas offcanvas-end <?php if(Session::has('errors')): ?> show <?php endif; ?>" tabindex="-1" id="offcanvasRight" style="width: 600px;">
        <div class="offcanvas-body" data-simplebar>
            <div class="offcanvas-header px-2 pt-0">
                <h3 class="offcanvas-title" id="offcanvasExampleLabel">Create Project</h3>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <!-- card body -->
            <div class="container">
                <!-- form -->
                <form enctype="multipart/form-data" method="POST" action="<?php echo e(route('projects.store')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="row gx-3">
                        <!-- form group -->
                        <div class="mb-3 col-12">
                            <label class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="<?php echo e(old('name')); ?>" placeholder="Enter project title" required>
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <!-- form group -->
                        <div class="mb-3 col-12">
                            <label class="form-label">Key <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="key" name="key"
                                value="<?php echo e(old('key')); ?>" placeholder="Enter project key" required>
                            <?php $__errorArgs = ['key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <!-- form group -->
                        <div class="mb-3 col-12">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" placeholder="Enter brief about project..."
                                rows="3"><?php echo e(old('description')); ?></textarea>
                        </div>

                        <div class="col-md-3 col-12 mb-4">
                            <div>
                                <!-- logo -->
                                <h5 class="mb-3">Project Logo</h5>
                                <div class="icon-shape icon-xxl border rounded position-relative">
                                    <span class="position-absolute"><i class="bi bi-image fs-3 text-muted"></i></span>
                                    <input class="form-control border-0 opacity-0" type="file" id="icon"
                                        name="icon" style="width: 100%; height: 100%;" onchange="previewImage()">
                                    <img id="image-preview" src="" alt=""
                                        style="max-width: 100%; max-height: 100%; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                </div>
                            </div>
                            <?php $__errorArgs = ['icon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <!-- button -->
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script>
        function previewImage() {
            const input = document.getElementById('icon');
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

    <!-- Modal delete project -->
    <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($project['created_by'] === auth()->id()): ?>
            <div class="modal fade" id="deleteModal<?php echo e($project['id']); ?>" tabindex="-1"
                aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="display: flex; align-items: center;">
                            <p style="margin: 5px;">Are you sure you want to delete <?php echo e($project['name']); ?></p>
                            <h4 id="modalProjectName" style="margin: 0;"></h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <form action="<?php echo e(route('projects.destroy', ['project' => $project['id']])); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger" id="confirmDelete">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/project/index.blade.php ENDPATH**/ ?>