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
                        <div class="p-2"><img src="<?php echo e(auth()->user()->photo_path); ?>" alt="user" width="50"
                                class="rounded-circle"></div>
                        <div class="comment-text active w-100">
                            <div class="d-flex flex-row comment-row m-t-0">
                            </div>
                            <div class="mb-3 col-12">
                                <input type="text" class="form-control mr-2" placeholder="Add comment ..." id="comment-input">
                            </div>
                        </div>
                    </div>
            </div>
                <div class="card-body" id="edit-comment">
                    <form action="<?php echo e(route('comments.store', ['key' => $project->key, 'issue_key' => $issue->issue_key])); ?>"
                        method="POST" id="post-form">
                        <?php echo csrf_field(); ?>
                        <div class="d-flex flex-row comment-row">
                            <div class="p-2"><img src="<?php echo e(auth()->user()->photo_path); ?>" alt="user" width="50"
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
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <input type="hidden" name="issue_id" value="<?php echo e($issue->id); ?>">
                                <?php if(!empty($comment['id'])): ?>
                                    <input type="hidden" name="parent_id" value="<?php echo e($comment['id'] ?? ''); ?>">
                                <?php endif; ?>
                                <a href="" type="button" class="btn rounded-pill btn-outline-warning">Cancel</a>
                                <button type="submit" class="btn rounded-pill btn-outline-success"
                                    id="saveButton">Save</button>
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
                modules: {
                    toolbar: [

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
                },
                placeholder: 'Compose an epic...',
                theme: 'snow'
            });
            $(document).ready(function () {
        // Sự kiện khi input được focus
                $("#edit-comment").hide();

                $("#comment-input").focus(function() {
                    $("#textComment").hide();
                    $("#edit-comment").show();
                });
            });
            $("#post-form").on("submit", function() {
            $("#hiddenArea").val($("#editor .ql-editor").html());
        });
        </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/comments/create.blade.php ENDPATH**/ ?>