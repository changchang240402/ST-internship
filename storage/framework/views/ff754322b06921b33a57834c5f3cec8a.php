<?php if(isset($comments)): ?>
    <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="flex-start comment-row p-3">
            <div class="d-flex flex-row">
                <div class="p-2 me-3">
                    <img class="rounded-circle shadow-1-strong me-1" src="<?php echo e(getS3URL($comment->user->photo_path)); ?>" alt="avatar"
                        width="45" height="45" />
                </div>
                <div class="flex-grow-1 flex-shrink-1">
                    <div>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-0">
                                <span class="fw-bold"><?php echo e($comment->user->display_name); ?></span>
                    
                                <span class="small"> - <?php echo e($comment->updated_at->format('F j, Y')); ?></span>
                            </p>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu" data-comment-id=<?php echo e($comment->id); ?>>
                                    <?php if(!$comment->parent_id): ?>
                                    <a class="dropdown-item btn-reply" data-bs-toggle="collapse">
                                        <i class="bi bi-reply-all-fill"></i> Reply
                                    </a>
                                    <?php endif; ?>
                                    <?php if(auth()->check() && $comment->created_by === auth()->user()->id): ?>
                                        <a class="dropdown-item btn-edit">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteCommentModal">
                                            <i class="bi bi-trash-fill"></i> Delete</a>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <form
                            action="<?php echo e(route('comments.update', ['key' => request()->key, 'issue_key' => $issue->issue_key, 'comment' => $comment->id])); ?>"
                            method="POST"
                            class="comment-section post-form-edit"
                        >
                            <?php echo method_field('PUT'); ?>
                            <?php echo csrf_field(); ?>

                            <div class="comment-content quill">
                                <?php echo $comment->content; ?>

                            </div>
                            <textarea name="content" hidden></textarea>
                            <div class="comment-action-buttons mt-3">
                                <a type="button" class="btn rounded-pill btn-outline-warning btn-cancel">Cancel</a>
                                <button type="submit" class="btn rounded-pill btn-outline-success" id="save-comment">Edit</button>
                            </div>

                        </form>


                        <?php if($comment->comments_count > 0): ?>
                            <a
                                class="fas fa-reply fa-xs"
                                data-bs-toggle="collapse"
                                href="#subCommentDisplay<?php echo e($comment->id); ?>"
                            >
                            See <?php echo e($comment->comments_count); ?> reply </a>
                        <?php endif; ?>

                        <div class="collapse <?php if($comment->comments_count == 0): ?> show <?php endif; ?>" id="subCommentDisplay<?php echo e($comment->id); ?>">
                            <div class="card sub-comments-wrapper">
                                <?php $__currentLoopData = $comment->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subComment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="flex-start comment-row p-3" id="show-comment<?php echo e($subComment->id); ?>">
                                        <div class="d-flex flex-row">
                                            <a class="p-2 me-3">
                                                <img
                                                    class="rounded-circle shadow-1-strong me-1"
                                                    src="<?php echo e(getS3URL($subComment->user->photo_path)); ?>" alt="avatar"
                                                    width="45"
                                                    height="45"
                                                />
                                            </a>
                                            <div class="flex-grow-1 flex-shrink-1">
                                                <div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p class="mb-1">
                                                            <span class="fw-bold"><?php echo e($subComment->user->display_name); ?></span>
                                                            <span class="small"> - <?php echo e($subComment->updated_at->format('F j, Y')); ?></span>
                                                        </p>
                                                        <?php if(auth()->check() && $subComment->created_by === auth()->user()->id): ?>
                                                            <div class="dropdown">
                                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                                </button>
                                                                <div class="dropdown-menu" data-comment-id=<?php echo e($subComment->id); ?>>
                                                                    <a class="dropdown-item btn-edit">
                                                                        <i class="bi bi-pencil-square"></i>
                                                                        Edit
                                                                    </a>
                                                                    <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteCommentModal">
                                                                        <i class="bi bi-trash-fill"></i>
                                                                        Delete
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>

                                                    <form
                                                        action="<?php echo e(route('comments.update', ['key' => request()->key, 'issue_key' => $issue->issue_key, 'comment' => $subComment->id])); ?>"
                                                        method="POST"
                                                        class="comment-section post-form-edit"
                                                    >
                                                        <?php echo method_field('PUT'); ?>
                                                        <?php echo csrf_field(); ?>

                                                        <div class="comment-content quill">
                                                            <?php echo $subComment->content; ?>

                                                        </div>
                                                        <textarea name="content" hidden></textarea>
                                                        <div class="comment-action-buttons mt-3">
                                                            <a type="button" class="btn rounded-pill btn-outline-warning btn-cancel">Cancel</a>
                                                            <button type="submit" class="btn rounded-pill btn-outline-success" id="save-comment">Edit</button>
                                                        </div>
                                                    </form>

                                                    <textarea name="content" hidden></textarea>
                                                    <div class="comment-action-buttons mt-3">
                                                        <a type="button" class="btn rounded-pill btn-outline-warning btn-cancel">Cancel</a>
                                                        <button type="submit" class="btn rounded-pill btn-outline-success" id="save-comment">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <form method="POST" class="reply-section reply-form" action="<?php echo e(route('comments.store', ['key'=> request()->key, 'issue_key' => $issue->issue_key])); ?>">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" id="issue_id" name="issue_id" value="<?php echo e($issue->id); ?>">
                                <input type="hidden" id="parent_id" name="parent_id" value="<?php echo e($comment['id'] ?? ''); ?>">
                        
                                <div class="comment-content quill">

                                </div>
                                <textarea name="content" hidden></textarea>
                                <div class="comment-action-buttons mt-3">
                                    <a type="button" class="btn rounded-pill btn-outline-warning btn-cancel">Cancel</a>
                                    <button type="submit" class="btn rounded-pill btn-outline-success" id="save-comment">Reply</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH /var/www/html/resources/views/comments/data.blade.php ENDPATH**/ ?>