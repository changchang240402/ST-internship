<?php if(isset($comments)): ?>
<?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="flex-start my-sm-6 " id="show-comment<?php echo e($comment->id); ?>" data-processed="false">
        <div class="d-flex flex-row comment-row">
            <div class="p-2 me-3">
                <img class="rounded-circle shadow-1-strong me-3" src="<?php echo e($comment->user->photo_path); ?>" alt="avatar"
                    width="45" height="45" />
            </div>
            <div class="flex-grow-1 flex-shrink-1">
                <div>
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="mb-2">
                            <?php echo e($comment->user->display_name); ?> <span class="small"> -
                                <?php echo e($comment->updated_at->format('F j, Y')); ?></span>
                        </p>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item btn-reply" href="#" role="button"
                                    data-bs-toggle="collapse" data-comment-id="<?php echo e($comment->id); ?>"
                                    aria-expanded="false" aria-controls="collapseExample">
                                    <i class="bi bi-reply-all-fill"></i> Reply </a>
                                <?php if(auth()->check() && $comment->created_by === auth()->user()->id): ?>
                                    <a class="dropdown-item btn-edit" href="#" role="button"
                                        data-comment-edit="<?php echo e($comment->id); ?>" aria-expanded="false"
                                        aria-controls="collapseExample">
                                        <i class="bi bi-pencil-square"></i></i> Edit
                                    </a>
                                    <a class="dropdown-item" data-bs-toggle="modal"
                                        data-bs-target="#modalCenter<?php echo e($comment->id); ?>">
                                        <i class="bi bi-trash-fill"></i> Delete</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <p class="mb-1">
                        <?php echo $comment->content; ?>

                    </p>
                    <a>
                        <?php if($comment->comments_count > 0): ?>
                            <a class="fas fa-reply fa-xs" data-bs-toggle="collapse"
                                href="#collapseExample<?php echo e($comment->id); ?>" role="button" aria-expanded="false"
                                aria-controls="collapseExample">
                                See <?php echo e($comment->comments_count); ?> reply </a>
                        <?php endif; ?>
                    </a>
                    <div class="collapse" id="collapseExample<?php echo e($comment->id); ?>">
                        <div class="card card-body">
                            <?php $__currentLoopData = $comment->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subComment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class=" flex-start mt-4" id="show-comment<?php echo e($subComment->id); ?>">
                                    <div class="d-flex flex-row comment-row">
                                        <a class="p-2 me-3">
                                            <img class="rounded-circle shadow-1-strong"
                                                src="<?php echo e($subComment->user->photo_path); ?>" alt="avatar" width="45"
                                                height="45" />
                                        </a>
                                        <div class="flex-grow-1 flex-shrink-1">
                                            <div>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p class="mb-1">
                                                        <?php echo e($subComment->user->display_name); ?><span class="small"> -
                                                            <?php echo e($subComment->updated_at->format('F j, Y')); ?></span>
                                                    </p>
                                                    <?php if(auth()->check() && $subComment->created_by === auth()->user()->id): ?>
                                                        <div class="dropdown">
                                                            <button type="button"
                                                                class="btn p-0 dropdown-toggle hide-arrow"
                                                                data-bs-toggle="dropdown">
                                                                <i class="bx bx-dots-vertical-rounded"></i>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item btn-edit" href="#"
                                                                    role="button"
                                                                    data-comment-edit="<?php echo e($subComment->id); ?>"
                                                                    aria-expanded="false"
                                                                    aria-controls="collapseExample">
                                                                    <i class="bi bi-pencil-square"></i></i>
                                                                    Edit
                                                                </a>
                                                                <a class="dropdown-item" data-bs-toggle="modal"
                                                                    data-bs-target="#modalCenter<?php echo e($subComment->id); ?>">
                                                                    <i class="bi bi-trash-fill"></i>
                                                                    Delete</a>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                <p class="small mb-0">
                                                    <?php echo $subComment->content; ?>

                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script type="module" src="<?php echo e(asset('assets/comment/comment.js')); ?>"></script>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?><?php /**PATH /var/www/html/resources/views/comments/data-show.blade.php ENDPATH**/ ?>