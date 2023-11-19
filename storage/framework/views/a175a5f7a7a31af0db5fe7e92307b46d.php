<?php $__env->startSection('content'); ?>
    <div class="col-xl">
        <div class="d-flex justify-content-center mt-2">
        </div>
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Comment</h5>
            </div>
            <div class="card-body" id="textComment">
                <div class="d-flex flex-row comment-row">
                    <div class="p-2 me-3"><img src="<?php echo e(auth()->user()->photo_path); ?>" alt="user" width="45"
                            class="rounded-circle"></div>
                    <div class="comment-text active w-100">
                        <div class="d-flex flex-row comment-row m-t-0">
                        </div>
                        <div class="mb-3 col-12">
                            <input type="text" class="form-control mr-2" placeholder="Add comment ..."
                                id="comment-input">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body" id="create-comment">
                <form action="<?php echo e(route('comments.store', ['key' => $project->key, 'issue_key' => $issue->issue_key])); ?>"
                    method="POST" id="post-form">
                    <?php echo csrf_field(); ?>
                    <div class="d-flex flex-row comment-row">
                        <div class="p-2 me-3"><img src="<?php echo e(auth()->user()->photo_path); ?>" alt="user" width="45"
                                class="rounded-circle"></div>
                        <div class="comment-text active w-100">
                            <div class="d-flex flex-row comment-row m-t-0">
                            </div>
                            <div class="mb-3 col-12">
                                <div id="editor"></div>
                                <textarea name="content" style="display:none" id="hiddenArea"></textarea>
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
                            </div>
                            <input type="hidden" name="issue_id" value="<?php echo e($issue->id); ?>">
                            <?php if(!empty($comment['id'])): ?>
                                <input type="hidden" name="parent_id" value="<?php echo e($comment['id'] ?? ''); ?>">
                            <?php endif; ?>
                            <a type="button" class="btn rounded-pill btn-outline-warning btn-cancel">Cancel</a>
                            <button type="submit" class="btn rounded-pill btn-outline-success"
                                id="save-comment">Save</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Show List Comment</h5>
            </div>
            <div class="card-body d-flex">
                <div class="col mb-4 pb-2">
                    <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex-start my-sm-6 " id="show-comment<?php echo e($comment->id); ?>">
                            <div class="d-flex flex-row comment-row">
                                <div class="p-2 me-3">
                                    <img class="rounded-circle shadow-1-strong me-3" src="<?php echo e($comment->user->photo_path); ?>"
                                        alt="avatar" width="45" height="45" />
                                </div>
                                <div class="flex-grow-1 flex-shrink-1">
                                    <div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="mb-2">
                                                <?php echo e($comment->user->display_name); ?> <span class="small"> -
                                                    <?php echo e($comment->updated_at->format('F j, Y')); ?></span>
                                            </p>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
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
                                                    href="#collapseExample<?php echo e($comment->id); ?>" role="button"
                                                    aria-expanded="false" aria-controls="collapseExample">
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
                                                                    src="<?php echo e($subComment->user->photo_path); ?>"
                                                                    alt="avatar" width="45" height="45" />
                                                            </a>
                                                            <div class="flex-grow-1 flex-shrink-1">
                                                                <div>
                                                                    <div
                                                                        class="d-flex justify-content-between align-items-center">
                                                                        <p class="mb-1">
                                                                            <?php echo e($subComment->user->display_name); ?><span
                                                                                class="small"> -
                                                                                <?php echo e($subComment->updated_at->format('F j, Y')); ?></span>
                                                                        </p>
                                                                        <?php if(auth()->check() && $subComment->created_by === auth()->user()->id): ?>
                                                                            <div class="dropdown">
                                                                                <button type="button"
                                                                                    class="btn p-0 dropdown-toggle hide-arrow"
                                                                                    data-bs-toggle="dropdown">
                                                                                    <i
                                                                                        class="bx bx-dots-vertical-rounded"></i>
                                                                                </button>
                                                                                <div class="dropdown-menu">
                                                                                    <a class="dropdown-item btn-edit"
                                                                                        href="#" role="button"
                                                                                        data-comment-edit="<?php echo e($subComment->id); ?>"
                                                                                        aria-expanded="false"
                                                                                        aria-controls="collapseExample">
                                                                                        <i
                                                                                            class="bi bi-pencil-square"></i></i>
                                                                                        Edit
                                                                                    </a>
                                                                                    <a class="dropdown-item"
                                                                                        data-bs-toggle="modal"
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
                                                    <div class="flex-start my-sm-6 update-comment"
                                                        id="update-comment<?php echo e($subComment->id); ?>">
                                                        <form
                                                            action="<?php echo e(route('comments.update', ['key' => $project->key, 'issue_key' => $issue->issue_key, 'comment' => $subComment->id])); ?>"
                                                            method="POST" id="post-form">
                                                            <?php echo method_field('PUT'); ?>
                                                            <?php echo csrf_field(); ?>
                                                            <div class="d-flex flex-row comment-row">
                                                                <div class="p-2 me-3"><img
                                                                        src="<?php echo e(auth()->user()->photo_path); ?>"
                                                                        alt="user" width="45"
                                                                        class="rounded-circle"></div>
                                                                <div class="comment-text active w-100">
                                                                    <div class="d-flex flex-row comment-row m-t-0">
                                                                    </div>
                                                                    <div class="mb-3 col-12">
                                                                        <div class="edit"
                                                                            id="edit<?php echo e($subComment->id); ?>">
                                                                            <?php echo old('content', $subComment->content); ?>

                                                                        </div>
                                                                        <textarea name="content" style="display:none" id="hiddenArea"></textarea>
                                                                        <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                            <span
                                                                                class="text-danger"><?php echo e($message); ?></span>
                                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                    </div>
                                                                    <a type="button"
                                                                        class="btn rounded-pill btn-outline-warning btn-cancel">Cancel</a>
                                                                    <button type="submit"
                                                                        class="btn rounded-pill btn-outline-success"
                                                                        id="saveButton">Edit</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="mt-3">
                                                        <!-- Modal for subComment -->
                                                        <div class="modal fade" id="modalCenter<?php echo e($subComment->id); ?>"
                                                            tabindex="-1" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel1">
                                                                            Delete
                                                                            Comment</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <span id="basic-icon-default-categoryid2">
                                                                            Are you sure you want to delete this comment?
                                                                        </span>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-outline-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <form
                                                                            action="<?php echo e(route('comments.destroy', ['key' => $project->key, 'issue_key' => $issue->issue_key, 'comment' => $subComment->id])); ?>"
                                                                            method="post">
                                                                            <?php echo csrf_field(); ?>
                                                                            <?php echo method_field('DELETE'); ?>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Save
                                                                                changes</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                        <div class="collapse" id="create-subcomment<?php echo e($comment->id); ?>">
                                            <div class="card card-body">
                                                <form
                                                    action="<?php echo e(route('comments.store', ['key' => $project->key, 'issue_key' => $issue->issue_key])); ?>"
                                                    method="POST" id="post-form-sub"
                                                    data-comment-id = "<?php echo e($comment->id); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <div class="d-flex flex-row comment-row">
                                                        <div class="p-2 me-3"><img src="<?php echo e(auth()->user()->photo_path); ?>"
                                                                alt="user" width="45" class="rounded-circle">
                                                        </div>
                                                        <div class="comment-text active w-100">
                                                            <div class="d-flex flex-row comment-row m-t-0">
                                                            </div>
                                                            <div class="mb-3 col-12">
                                                                <div class="created" id="created<?php echo e($comment->id); ?>">
                                                                </div>
                                                                <textarea name="content" style="display:none" id="hiddenAreaSub"></textarea>
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
                                                            <input type="hidden" name="issue_id"
                                                                value="<?php echo e($issue->id); ?>">
                                                            <?php if(!empty($comment['id'])): ?>
                                                                <input type="hidden" name="parent_id"
                                                                    value="<?php echo e($comment['id'] ?? ''); ?>">
                                                            <?php endif; ?>
                                                            <a type="button"
                                                                class="btn rounded-pill btn-outline-warning btn-cancel">Cancel</a>
                                                            <button type="submit"
                                                                class="btn rounded-pill btn-outline-success"
                                                                id="saveButton">Save</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex-start my-sm-6 update-comment" id="update-comment<?php echo e($comment->id); ?>">
                            <form
                                action="<?php echo e(route('comments.update', ['key' => $project->key, 'issue_key' => $issue->issue_key, 'comment' => $comment->id])); ?>"
                                method="POST" id="post-form">
                                <?php echo method_field('PUT'); ?>
                                <?php echo csrf_field(); ?>
                                <div class="d-flex flex-row comment-row">
                                    <div class="p-2 me-3"><img src="<?php echo e(auth()->user()->photo_path); ?>" alt="user"
                                            width="45" class="rounded-circle"></div>
                                    <div class="comment-text active w-100">
                                        <div class="d-flex flex-row comment-row m-t-0">
                                        </div>
                                        <div class="mb-3 col-12">
                                            <div class="edit" id="edit<?php echo e($comment->id); ?>"><?php echo old('content', $comment->content); ?>

                                            </div>
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
                                        <a type="button"
                                            class="btn rounded-pill btn-outline-warning btn-cancel">Cancel</a>
                                        <button type="submit" class="btn rounded-pill btn-outline-success"
                                            id="saveButton">Edit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="mt-3">
                            <!-- Modal -->
                            <div class="modal fade" id="modalCenter<?php echo e($comment->id); ?>" tabindex="-1"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel1">Delete database
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <span id="basic-icon-default-categoryid2">
                                                Will you definitely delete this comment?
                                            </span>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary"
                                                data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <form
                                                action="<?php echo e(route('comments.destroy', ['key' => $project->key, 'issue_key' => $issue->issue_key, 'comment' => $comment->id])); ?>"
                                                method="post">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-primary">Save
                                                    changes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="card-footer p-4">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center mb-0">
                                <?php echo e($comments->links()); ?>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="my-dropzone"></div>
    <script type="module">
        var toolbar = [
            ['bold', 'italic', 'underline', 'strike'], // toggled buttons
            ['blockquote', 'code-block'],
            [{
                'header': 1
            }, {
                'header': 2
            }], // custom button values
            [{
                'list': 'ordered'
            }, {
                'list': 'bullet'
            }],
            [{
                'script': 'sub'
            }, {
                'script': 'super'
            }], // superscript/subscript
            [{
                'indent': '-1'
            }, {
                'indent': '+1'
            }], // outdent/indent
            [{
                'direction': 'rtl'
            }], // text direction
            ['link', 'blockquote', 'code-block', 'image'],
            [{
                'size': ['small', false, 'large', 'huge']
            }], // custom dropdown
            [{
                'header': [1, 2, 3, 4, 5, 6, false]
            }],
            [{
                'color': []
            }, {
                'background': []
            }], // dropdown with defaults from theme
            [{
                'font': []
            }],
            [{
                'align': []
            }],
            ['clean'] // remove formatting button
        ]
        // Customize the Quill editor as needed (optional).
        const quill = new Quill('#editor', {
            modules: {
                toolbar: toolbar
            },
            placeholder: 'Compose an epic...',
            theme: 'snow'
        });
        $(document).ready(function() {
            // Sự kiện khi input được focus
            $("#create-comment").hide();
            // $("#create-subcomment<?php echo e($comment->id); ?>").hide();

            $("#comment-input").focus(function() {
                $("#textComment").hide();
                $("#create-comment").show();
            });

            $(".btn-cancel").on("click", function() {
                $("#create-comment").hide();
                $("#textComment").show();
            })
            
            const subcommentQuill = {};
            // Sử dụng .on("click") để bắt sự kiện khi nút "Reply" được nhấn
            $(".btn-reply").on("click", function(e) {
                e.preventDefault(); // Ngăn chặn các liên kết mặc định

                const commentId = $(this).data("comment-id");

                // Xác định div "create-subcomment" dựa trên comment_id
                const subcommentDiv = $("#create-subcomment" + commentId);

                if (!subcommentQuill[commentId]) {
                    // Tạo trình soạn thảo Quill.js trong div tương ứng
                    subcommentQuill[commentId] = new Quill(subcommentDiv.find(".created")[0], {
                        modules: {
                            toolbar: toolbar
                        },
                        placeholder: 'Compose an epsic...',
                        theme: 'snow'
                    });
                }
                subcommentDiv.removeClass("collapse");
                subcommentDiv.find("#post-form-sub").on("submit", function(e) {
                    e.preventDefault();
                    const commentId = subcommentDiv.find("#post-form-sub").data("comment-id");
                    const subcommentQuillHtml = subcommentQuill.root.innerHTML;
                    const subComment = subcommentDiv.find("#hiddenAreaSub").val(
                        subcommentQuillHtml);
                });
                $(".btn-cancel").on("click", function(){
                    subcommentDiv.addClass("collapse");
                })
            });
            $(".update-comment").hide();
            $(".btn-edit").on("click", function(e) {
                e.preventDefault();

                const commentEdit = $(this).data("comment-edit");
                const editComment = $("#update-comment" + commentEdit);
                const showComment = $("#show-comment" + commentEdit);

                // Hiển thị phần chỉnh sửa và ẩn phần hiển thị
                editComment.show();
                showComment.hide();

                // Tạo trình soạn thảo Quill.js trong phần chỉnh sửa (nếu cần)
                const quillEdit = new Quill(editComment.find(".edit")[0], {
                    modules: {
                        toolbar: toolbar
                    },
                    placeholder: 'Compose an epic...',
                    theme: 'snow'
                });

                // Nạp nội dung hiện tại vào trình soạn thảo Quill (nếu cần)
                const currentContent = showComment.find(".content").html();
                quillEdit.clipboard.dangerouslyPasteHTML(currentContent);

                $(".btn-cancel").on("click", function(){
                    editComment.hide();
                    showComment.show();
                })
            });
        });
        $("#post-form").on("submit", function() {
            $("#hiddenArea").val($("#editor .ql-editor").html());
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/comments/show.blade.php ENDPATH**/ ?>