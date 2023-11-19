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
                        <form id="post-form" enctype="multipart/form-data" method="POST"
                            action="<?php echo e(route('issues.update', ['key' => $project->key, 'issue' => $issue->issue_key])); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <input type="hidden" name="id" value="<?php echo e($issue->id); ?>">
                            <div class="row gx-3">
                                <!-- select form -->
                                <div class="mb-3 col-md-12">
                                    <label class="form-label" for="type">Issue Type</label>
                                    <select class="form-select" aria-label="Default select example" id="type"
                                        name="type" required="">

                                        <option value="<?php echo e(old('type', $issue->type)); ?>" selected hidden>
                                            <?php switch(old('type', $issue->type)):
                                                case (config('constants.ISSUE_TYPE.STORY')): ?>
                                                    Story
                                                <?php break; ?>

                                                <?php case (config('constants.ISSUE_TYPE.TASK')): ?>
                                                    Task
                                                <?php break; ?>

                                                <?php case (config('constants.ISSUE_TYPE.BUG')): ?>
                                                    Bug
                                                <?php break; ?>

                                                <?php default: ?>
                                            <?php endswitch; ?>
                                        </option>
                                        <option value="1">Story</option>
                                        <option value="2">Task</option>
                                        <option value="3">Bug</option>
                                    </select>
                                    <?php $__errorArgs = ['type'];
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
                                <?php if(!empty($issue->parent)): ?>
                                    <div class="mb-3 col-12" hidden>
                                        <input type="text" class="form-control" id="parent_id" name="parent_id"
                                            value="<?php echo e($issue->parent['id'] ?? ''); ?>" required>
                                    </div>
                                    <div class="mb-3 col-12">
                                        <label class="form-label">Parent issue <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="parent"
                                            value="<?php echo e($issue->parent['issue_key'] ?? ''); ?>" disabled>
                                    </div>
                                <?php endif; ?>
                                <!-- form group -->
                                <div class="mb-3 col-12" hidden>
                                    <input type="text" class="form-control" id="project_id" name="project_id"
                                        value="<?php echo e($project['id'] ?? ''); ?>" required>
                                </div>
                                <!-- select form -->
                                <div class="mb-3 col-md-12">
                                    <label class="form-label" for="milestone">Milestone</label>
                                    <select class="form-select" aria-label="None" id="milestone" name="milestone">
                                        <?php if(!empty(old('milestone'))): ?>
                                            <option value="<?php echo e(old('milestone')); ?>" selected hidden>
                                                <?php echo e('Sprint ' . old('milestone')); ?></option>
                                        <?php elseif(!empty($issue->milestone)): ?>
                                            <option value="<?php echo e($issue->milestone); ?>" selected hidden>
                                                <?php echo e('Sprint ' . $issue->milestone); ?></option>
                                        <?php endif; ?>
                                        <?php for($i = 1; $i <= 15; $i++): ?>
                                            <option value="<?php echo e($i); ?>"><?php echo e('Sprint ' . $i); ?></option>
                                        <?php endfor; ?>
                                    </select>
                                    <?php $__errorArgs = ['milestone'];
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
                                    <label class="form-label">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="<?php echo e(old('title', $issue->title)); ?>" placeholder="Enter issue title" required>
                                    <?php $__errorArgs = ['title'];
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
                                    <label class="form-label" for="description">Description</label>
                                    <div id="description" class="ql-container ql-snow">
                                        <div class="ql-editor ql-blank" data-gramm="false" contenteditable="true">
                                            <p><?php echo old('description', $issue->description); ?></p>
                                        </div>
                                        <div class="ql-clipboard" contenteditable="true" tabindex="-1"></div>
                                        <div class="ql-tooltip ql-hidden"><a class="ql-preview" rel="noopener noreferrer"
                                                target="_blank" href="about:blank"></a><input type="text"
                                                data-formula="e=mc^2" data-link="https://quilljs.com"
                                                data-video="Embed URL"><a class="ql-action"></a><a class="ql-remove"></a>
                                        </div>
                                    </div>
                                    <textarea name="description" style="display:none" id="hiddenArea"></textarea>
                                </div>
                                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <!-- select form -->
                                <div class="mb-3 col-md-12">
                                    <label class="form-label" for="priority">Priority</label>
                                    <select class="form-select" aria-label="None" id="priority" name="priority">
                                        <option value="<?php echo e(old('priority', $issue->priority)); ?>" selected hidden>
                                            <?php switch(old('priority', $issue->priority)):
                                                case (config('constants.ISSUE_PRIORITY.HIGH')): ?>
                                                    High
                                                <?php break; ?>

                                                <?php case (config('constants.ISSUE_PRIORITY.MEDIUM')): ?>
                                                    Medium
                                                <?php break; ?>

                                                <?php case (config('constants.ISSUE_PRIORITY.LOW')): ?>
                                                    Low
                                                <?php break; ?>

                                                <?php case (config('constants.ISSUE_PRIORITY.OPTIONAL')): ?>
                                                    Optional
                                                <?php break; ?>

                                                <?php default: ?>
                                            <?php endswitch; ?>
                                        <option value="<?php echo e(config('constants.ISSUE_PRIORITY.HIGH')); ?>">High</option>
                                        <option value="<?php echo e(config('constants.ISSUE_PRIORITY.MEDIUM')); ?>">Medium</option>
                                        <option value="<?php echo e(config('constants.ISSUE_PRIORITY.LOW')); ?>">Low</option>
                                        <option value="<?php echo e(config('constants.ISSUE_PRIORITY.OPTIONAL')); ?>">Optional
                                        </option>
                                    </select>

                                    <?php $__errorArgs = ['priority'];
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

                                <!-- select form -->
                                <div class="mb-3 col-md-12">
                                    <label class="form-label" for="assignee_id">Assignee</label>
                                    <select class="form-select" aria-label="None" id="assignee_id" name="assignee_id">
                                        <?php if(!empty($issue->assignee)): ?>
                                            <option value="<?php echo e($issue->assignee->id); ?>" selected hidden>
                                                <?php echo e($issue->assignee->display_name); ?></option>
                                        <?php else: ?>
                                            <option value="" selected hidden>Select assignee</option>
                                        <?php endif; ?>
                                        <?php $__currentLoopData = $projectMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($member->user->id); ?>"><?php echo e($member->user->display_name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['assignee_id'];
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

                                <!-- select form -->
                                <div class="mb-3 col-md-12">
                                    <label class="form-label" for="reporter_id">Reporter</label>
                                    <select class="form-select" aria-label="None" id="reporter_id" name="reporter_id">
                                        <?php if(!empty($issue->reporter)): ?>
                                            <option value="<?php echo e($issue->reporter->id); ?>" selected hidden>
                                                <?php echo e($issue->reporter->display_name); ?></option>
                                        <?php else: ?>
                                            <option value="" selected hidden>Select reporter</option>
                                        <?php endif; ?>
                                        <?php $__currentLoopData = $projectMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($member->user->id); ?>"><?php echo e($member->user->display_name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['reporter_id'];
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

                                <!-- select form -->
                                <div class="mb-3 col-md-12">
                                    <label class="form-label" for="status">Status</label>
                                    <select class="form-select" aria-label="None" id="status" name="status">
                                        <option value="<?php echo e(old('status', $issue->status)); ?>" selected hidden>
                                            <?php switch(old('status', $issue->status)):
                                                case (config('constants.ISSUE_STATUS.TODO')): ?>
                                                    To do
                                                <?php break; ?>

                                                <?php case (config('constants.ISSUE_STATUS.IN_PROGRESS')): ?>
                                                    In progress
                                                <?php break; ?>

                                                <?php case (config('constants.ISSUE_STATUS.REVIEW')): ?>
                                                    Ready for review
                                                <?php break; ?>

                                                <?php case (config('constants.ISSUE_STATUS.TESTING')): ?>
                                                    Testing
                                                <?php break; ?>

                                                <?php case (config('constants.ISSUE_STATUS.DONE')): ?>
                                                    Done
                                                <?php break; ?>

                                                <?php default: ?>
                                            <?php endswitch; ?>
                                        <option value="<?php echo e(config('constants.ISSUE_STATUS.TODO')); ?>">To do</option>
                                        <option value="<?php echo e(config('constants.ISSUE_STATUS.IN_PROGRESS')); ?>">In progress
                                        </option>
                                        <option value="<?php echo e(config('constants.ISSUE_STATUS.REVIEW')); ?>">Ready for review
                                        </option>
                                        <option value="<?php echo e(config('constants.ISSUE_STATUS.TESTING')); ?>">Testing</option>
                                        <option value="<?php echo e(config('constants.ISSUE_STATUS.DONE')); ?>">Done</option>
                                    </select>
                                    <?php $__errorArgs = ['status'];
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

                                <!-- flatpickr -->
                                <div class="mb-3 col-md-12">
                                    <label for="start_date" class="form-label">Start Date</label>
                                    <input id="start_date" name="start_date" class="flatpickr form-control"
                                        value="<?php echo e(old('start_date', $issue->start_date)); ?>">
                                    <?php $__errorArgs = ['start_date'];
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
                                <!-- flatpickr -->
                                <div class="mb-3 col-md-12">
                                    <label for="due_date" class="form-label">Due Date</label>
                                    <input id="due_date" name="due_date" class="flatpickr form-control"
                                        value="<?php echo e(old('due_date', $issue->due_date)); ?>">
                                    <?php $__errorArgs = ['due_date'];
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
    <script type="module">
        $("#post-form").on("submit", function() {
            $("#hiddenArea").val($("#description .ql-editor").html());
        })


        $(".flatpickr").flatpickr({
            altInput: true,
            altFormat: "F j, Y",
            enableTime: true,
            dateFormat: "Y-m-d H:i:S"
        });

        $("div#my-dropzone").dropzone({
            url: "/file/post"
        });

        // Customize the Quill editor as needed (optional).
        const editor = new Quill('#description', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{
                        header: [1, 2, 3, 4, 5, 6, false]
                    }],
                    ["bold", "italic", "underline", "strike"], // toggled buttons
                    [{
                            list: "ordered"
                        },
                        {
                            list: "bullet"
                        },
                        {
                            indent: "-1"
                        },
                    ],
                    ["link", "image"]
                ]
            },
            placeholder: 'Write description here...',
        });

        /**
         * Step1. select local image
         *
         */
        function selectLocalImage() {
            const input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.click();
            // Listen upload local image and save to server
            input.onchange = () => {
                const file = input.files[0];
                // file type is only image.
                if (/^image\//.test(file.type)) {
                    saveToServer(file);
                } else {
                    console.warn('You could only upload images.');
                }
            };
        }

        /**
         * Step2. save to server
         *
         * @param {File} file
         */
        function saveToServer(file) {
            const fd = new FormData();
            fd.append('file', file);
            fd.append('name', file.name);
            fd.append('_token', "<?php echo e(csrf_token()); ?>");
            fd.append('target_type', 1);
            fd.append('target_id', "<?php echo e($issue->id); ?>");

            const xhr = new XMLHttpRequest();
            xhr.open('POST', "<?php echo e(route('attachments.upload', ['key' => $project->key, 'issue_key' => $issue->issue_key])); ?>", true);
            xhr.onload = () => {
                if (xhr.status === 200) {
                    // this is callback data: url
                    const url = JSON.parse(xhr.responseText).url;
                    insertToEditor(url);
                }
            };
            xhr.send(fd);
        }

        /**
         * Step3. insert image url to rich editor.
         *
         * @param {string} url
         */
        function insertToEditor(url) {
            // push image url to rich editor.
            const range = editor.getSelection();
            editor.insertEmbed(range.index, 'image', url);
        }

        // quill editor add image handler
        editor.getModule('toolbar').addHandler('image', () => {
            selectLocalImage();
        });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/issue/edit.blade.php ENDPATH**/ ?>