<?php $__env->startSection('content'); ?>
<div class="col-xl">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Commet</h5>
        </div>
        <div class="card-body">
            <form>
                <div class="d-flex flex-row comment-row">
                    <div class="p-2"><img src="<?php echo e(auth()->user()->photo_path); ?>" alt="user" width="50" class="rounded-circle"></div>
                    <div class="comment-text active w-100">
                        <div class="d-flex flex-row comment-row m-t-0">
                        </div>
                        <div id="editor"> 
                        </div>
                        <a href="" type="button"
                        class="btn rounded-pill btn-outline-warning">Cancel</a>
                        <button type="submit" class="btn rounded-pill btn-outline-success">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<hr>
<div class="my-dropzone"></div>
<script type="module">
    // Customize the Quill editor as needed (optional).
    const quill = new Quill('#editor', {
        theme: 'snow',
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/comment/create.blade.php ENDPATH**/ ?>