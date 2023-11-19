<div class="">
    <!-- row -->
    <div class="row">
        <div class="">
            <!-- card -->
            <div class="card">
                <!-- card body -->
                <div class="card-body p-lg-6">
                    <!-- form -->
                    <form id="post-form" enctype="multipart/form-data" method="POST"
                        action="<?php echo e(route('issues.store', ['key' => request()->key, 'issue_key' => isset($parentIssue) ? $parentIssue->issue_key : ''])); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="row gx-3">
                            <!-- select form -->
                            <div class="mb-3 col-md-12">
                                <label class="form-label" for="type">Issue Type</label>
                                <select class="selectpicker" data-width="100%" aria-label="None" id="type"
                                    name="type" required="">
                                    <option value="<?php echo e(config('constants.ISSUE_TYPE.STORY')); ?>" selected>Story</option>
                                    <option value="<?php echo e(config('constants.ISSUE_TYPE.TASK')); ?>">Task</option>
                                    <option value="<?php echo e(config('constants.ISSUE_TYPE.BUG')); ?>">Bug</option>
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
                            <?php if(!empty($parentIssue)): ?>
                                <div class="mb-3 col-12" hidden>
                                    <input type="text" class="form-control" id="parent_id" name="parent_id"
                                        value="<?php echo e($parentIssue['id'] ?? ''); ?>" required>
                                </div>
                                <div class="mb-3 col-12">
                                    <label class="form-label">Parent issue <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="parent"
                                        value="<?php echo e($parentIssue['issue_key'] ?? ''); ?>" disabled>
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
                                <select class="selectpicker" data-width="100%" aria-label="None" id="milestone" name="milestone">
                                    <option value="">Select Milestone</option>
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
                                    value="<?php echo e(old('title')); ?>" placeholder="Enter issue title" required>
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
                                <div id="description"></div>
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
                                <select class="selectpicker" data-width="100%" aria-label="None" id="priority" name="priority">
                                    <option value="" selected>Select Priority</option>
                                    <option value="<?php echo e(config('constants.ISSUE_PRIORITY.HIGH')); ?>">High</option>
                                    <option value="<?php echo e(config('constants.ISSUE_PRIORITY.MEDIUM')); ?>">Medium</option>
                                    <option value="<?php echo e(config('constants.ISSUE_PRIORITY.LOW')); ?>">Low</option>
                                    <option value="<?php echo e(config('constants.ISSUE_PRIORITY.OPTIONAL')); ?>">Optional</option>
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

                                <select class="selectpicker" data-live-search="true" data-size="10" data-width="100%" aria-label="None" id="assignee_id" name="assignee_id">
                                    <option value="" selected>Assign a member</option>
                                    <?php $__currentLoopData = $projectMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option
                                            value="<?php echo e($member->user->id); ?>"
                                            data-content='
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-sm">
                                                    <img src="<?php echo e(getS3URL($member->user->photo_path)); ?>" alt="" class="rounded-circle">
                                                </div>
                                                <div class="ms-3">
                                                    <h5 class="mb-0">
                                                        <a href="#" class="text-inherit">
                                                            <?php echo e($member->user->display_name); ?>

                                                        </a>
                                                    </h5>
                                                </div>
                                            </div>
                                            '
                                        >
                                            <?php echo e($member->user->display_name); ?>

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

                                <select class="selectpicker" data-live-search="true" data-size="10" data-width="100%" aria-label="None" id="reporter_id" name="reporter_id">
                                    <option value="" selected>Assign a member</option>
                                    <?php $__currentLoopData = $projectMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option
                                            value="<?php echo e($member->user->id); ?>"
                                            data-content='
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-sm">
                                                    <img src="<?php echo e(getS3URL($member->user->photo_path)); ?>" alt="" class="rounded-circle">
                                                </div>
                                                <div class="ms-3">
                                                    <h5 class="mb-0">
                                                        <a href="#" class="text-inherit">
                                                            <?php echo e($member->user->display_name); ?>

                                                        </a>
                                                    </h5>
                                                </div>
                                            </div>
                                            '
                                        >
                                            <?php echo e($member->user->display_name); ?>

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
                                <select class="selectpicker" data-width="100%" aria-label="None" id="status" name="status">
                                    <option value="<?php echo e(config('constants.ISSUE_STATUS.TODO')); ?>" <?php if(request('status') == config('constants.ISSUE_STATUS.TODO') ): ?> selected <?php endif; ?>>To do
                                    </option>
                                    <option value="<?php echo e(config('constants.ISSUE_STATUS.IN_PROGRESS')); ?>" <?php if(request('status') == config('constants.ISSUE_STATUS.IN_PROGRESS')): ?> selected <?php endif; ?>>In progress
                                    </option>
                                    <option value="<?php echo e(config('constants.ISSUE_STATUS.REVIEW')); ?>" <?php if(request('status') == config('constants.ISSUE_STATUS.REVIEW')): ?> selected <?php endif; ?>>Ready for review
                                    </option>
                                    <option value="<?php echo e(config('constants.ISSUE_STATUS.TESTING')); ?>" <?php if(request('status') == config('constants.ISSUE_STATUS.TESTING')): ?> selected <?php endif; ?>>Testing</option>
                                    <option value="<?php echo e(config('constants.ISSUE_STATUS.DONE')); ?>" <?php if(request('status') == config('constants.ISSUE_STATUS.DONE')): ?> selected <?php endif; ?>>Done</option>
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
                                <input id="start_date" name="start_date" class="flatpickr form-control">
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
                                <input id="due_date" name="due_date" class="flatpickr form-control">
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
        dateFormat: "Y-m-d H:i:S",
        onChange: function(rawdate, altdate, FPOBJ) {
            FPOBJ.close();
        }
    });

    $("div#my-dropzone").dropzone({
        url: "/file/post"
    });

    // Customize the Quill editor as needed (optional).
    const quill = new Quill('#description', {
        theme: 'snow',
    });
</script>
<?php /**PATH /var/www/html/resources/views/issue/create.blade.php ENDPATH**/ ?>