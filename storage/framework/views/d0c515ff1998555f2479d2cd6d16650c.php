<?php $__env->startSection('content'); ?>
<div class="col-xl">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Commet</h5>
        </div>
        <div class="card-body">
                <div class="form-outline w-100" >
                    <a  href="<?php echo e(route('comments.create')); ?>><textarea class="form-control" id="textAreaExample" rows="2"
                      style="background: #fff;">message</textarea>
                    </a>
                </div>
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
    $("#post-form").on("submit", function() {
            $("#hiddenArea").val($("#content .ql-editor").html());
        })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/comments/create1.blade.php ENDPATH**/ ?>