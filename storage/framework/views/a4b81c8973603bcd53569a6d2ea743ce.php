<?php $__env->startSection('content'); ?>
    <div class="col-xl">
        <div class="d-flex justify-content-center mt-2">
            <?php if(session('error')): ?>
                <div class="alert alert-danger" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <i class="bx bx-bell me-2"></i>
                        <div class="me-auto fw-semibold">Notify</div>
                        <small>Now</small>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        <?php echo e(session('error')); ?>

                    </div>
                </div>
            <?php endif; ?>
            <?php if(session('message')): ?>
                <div class="alert alert-success" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <i class="bx bx-bell me-2"></i>
                        <div class="me-auto fw-semibold">Notify</div>
                        <small>Now</small>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        <?php echo e(session('message')); ?>

                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Comment</h5>
            </div>
            <div class="card-body">
                <form
                    action="<?php echo e(route('comments.update', ['key' => $project->key, 'issue_key' => $issue->issue_key, 'comment' => $comment->id])); ?>"
                    method="POST" id="post-form">
                    <?php echo method_field('PUT'); ?>
                    <?php echo csrf_field(); ?>
                    <div class="d-flex flex-row comment-row">
                        <div class="p-2"><img src="<?php echo e(auth()->user()->photo_path); ?>" alt="user" width="50"
                                class="rounded-circle"></div>
                        <div class="comment-text active w-100">
                            <div class="d-flex flex-row comment-row m-t-0">
                            </div>
                            <div class="mb-3 col-12">
                                <div id="editor"><?php echo old('content', $comment->content); ?></div>
                                <textarea name="content" style="display:none" id="hiddenArea"></textarea>
                                <?php $__errorArgs = ['content'];
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
                            <a href="" type="button" class="btn rounded-pill btn-outline-warning">Cancel</a>
                            <button type="submit" class="btn rounded-pill btn-outline-success"
                                id="saveButton">Edit</button>
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
        $("#post-form").on("submit", function() {
            $("#hiddenArea").val($("#editor .ql-editor").html());
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/comments/edit.blade.php ENDPATH**/ ?>