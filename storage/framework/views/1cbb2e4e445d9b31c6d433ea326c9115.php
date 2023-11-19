<div class="tab-pane fade show active" id="nav-comment" role="tabpanel" aria-labelledby="nav-comment-tab">
    <div class="col-xl">
        <div class="d-flex justify-content-center mt-2">
        </div>
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Comment</h5>
            </div>
            <div class="card-body" id="textComment">
                <div class="d-flex flex-row comment-row">
                    <div class="p-2 me-3"><img src="<?php echo e(getS3URL(auth()->user()->photo_path)); ?>" alt="user" width="45"
                            class="rounded-circle"></div>
                    <div class="comment-text active w-100">
                        <div class="mb-3 col-12">
                            <form method="POST" id="comment-form"
                                action="<?php echo e(route('comments.store', ['key' => request()->key, 'issue_key' => $issue->issue_key])); ?>">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" id="issue_id" name="issue_id" value="<?php echo e($issue->id); ?>">

                                <?php if(!empty($comment['id'])): ?>
                                    <input type="hidden" id="parent_id" name="parent_id"
                                        value="<?php echo e($comment['id'] ?? ''); ?>">
                                <?php endif; ?>

                                <input type="text" class="form-control mr-2 quill" placeholder="Add comment ..."
                                    id="comment-input" name="content">

                                <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger" id="error-message"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                <div class="comment-action-buttons mt-3">
                                    <a type="button" class="btn rounded-pill btn-outline-warning btn-cancel">Cancel</a>
                                    <button type="submit" class="btn rounded-pill btn-outline-success"
                                        id="save-comment">Save</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Show List Comment</h5>
            </div>
            <div class="card-body d-flex">
                <div class="col mb-4 pb-2" id="post-data">
                    <?php echo $__env->make('comments.data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
            <div class="ajax-load text-center" style="display:none">
                <p>
                    <i class="fas fa-spinner fa-spin"></i> Loading...
                </p>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    .ajax-load {
        background: #e1e1e1;
        padding: 10px 0px;
        width: 100%;
    }

    .comment-action-buttons {
        display: none;
    }
</style>

<?php $__env->startSection('modals'); ?>
    <!-- Delete Comment Modal -->
    <div class="modal fade" id="deleteCommentModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete database</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Will you definitely delete this comment?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <form id="deleteCommentForm"
                        action="<?php echo e(route('comments.destroy', ['key' => request()->key, 'issue_key' => $issue->issue_key, 'comment' => 'COMMENT_ID'])); ?>"
                        method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" data-bs-dismiss="modal" class="btn btn-primary">Remove</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extraScripts'); ?>
    
    <script type="module">
        import { loadCommentFields } from "<?php echo e(Vite::asset('resources/js/comments/index.js')); ?>" 
        loadCommentFields("<?php echo e(csrf_token()); ?>", "<?php echo e($issue->id); ?>", "<?php echo e(route('attachments.upload', ['key' => $project->key, 'issue_key' => $issue->issue_key])); ?>", "<?php echo e(route('comemnts.draft.create', ['key' => $project->key, 'issue_key' => $issue->issue_key])); ?>")
    </script>


<?php $__env->stopSection(); ?>
<?php /**PATH /var/www/html/resources/views/comments/index.blade.php ENDPATH**/ ?>