<?php $__env->startSection('content'); ?>
<div class="py-6">
    <!-- row -->
    <div class="row">
        <div class="offset-xl-3 col-xl-6 col-md-12 col-12">
            <!-- card -->
            <div class="card">
                <!-- card body -->
                <div class="card-body p-lg-6">
                    <!-- form -->
                    <form enctype="multipart/form-data" action="<?php echo e(route('projects.update', ['key' => request()->key])); ?>" method="POST" >
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="row gx-3">
                            <!-- form group -->
                            <div class="mb-3 col-12">
                                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo e(old('id', $project['id'])); ?>"
                                placeholder="Enter project title" required>
                                <label class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo e(old('name', $project['name'])); ?>"
                                    placeholder="Enter project title" required>
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
                                <input type="text" class="form-control" id="key" name="key" value="<?php echo e(old('key', $project['key'])); ?>"
                                    placeholder="Enter project key" readonly>
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
                                    rows="3" ><?php echo e(old('description', $project['description'])); ?></textarea>
                            </div>

                            <div class="col-md-3 col-12 mb-4">
                                <div >
                                    <!-- logo -->
                                    <h5 class="mb-3">Project Logo</h5>
                                    
                                    <div class="icon-shape icon-xxl border rounded position-relative" >
                                        <img  src="<?php echo e(getFullUrl($project['icon_path'])); ?>" id="image-preview"
                                        class="avatar-xl rounded-circle" alt="avatar">
                                        <input class="form-control border-0 opacity-0" type="file" id="icon"
                                                name="icon" onchange="previewImage()"
                                                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0; cursor: pointer;">
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/project/edit.blade.php ENDPATH**/ ?>