<?php $__env->startSection('content'); ?>
    
    <style>
        .issue-action-buttons {
            display: none;
        }

        #post-edit-title .ql-editor p {
            font-size: 24px;
            color: var(--geeks-headings-color);
            font-weight: 600;
        }

        .quill:hover {
            background: #f1f2f4;
        }
    </style>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" style="width: 600px;">
        <div class="offcanvas-body">
            <div class="offcanvas-header px-2 pt-0">
                <h3 class="offcanvas-title" id="offcanvasExampleLabel">Create New Child Issue</h3>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <!-- card body -->
            <div id="offcanvas-content">
            </div>
        </div>
    </div>
    

    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div class="border-bottom pb-3 mb-3 d-flex align-items-center justify-content-between">
                <div class="">
                    <h1 class="mb-1 h2 fw-bold"><?php echo e($title ?? ''); ?></h1>
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Project</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Issues</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Overview
                            </li>
                        </ol>
                    </nav>
                </div>
                <div>
                    <?php if(is_null($issue->parent_id)): ?>
                        <a class="btn btn-primary create-issue"
                            data-action="<?php echo e(route('issues.create', ['key' => $key, 'issue_key' => $issue->issue_key])); ?>"
                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight">Create child issue</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col-xl-9 col-lg-8 col-12">
            <!-- card -->
            <div class="card detail-section">
                <!-- card header -->
                <div class="card-header border-bottom-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <form
                                method="POST"
                                class="post-edit-form"
                                id="post-edit-title"
                            >
                                <?php echo method_field('PUT'); ?>
                                <?php echo csrf_field(); ?>

                                <span class="badge bg-primary" style="font-size: 24px"><?php echo e($issue->issue_key); ?></span>
                                <h2 class="quill" id="issue-title">
                                    <?php echo e($issue->title); ?>

                                </h2>
                                <input hidden name="issue_key" value="<?php echo e($issue->issue_key); ?>" />
                                <input hidden name="field_name" value="title" />
                                <textarea name="field_value" hidden></textarea>
                                <div class="issue-action-buttons mt-3">
                                    <a type="button" class="btn rounded-pill btn-outline-warning btn-cancel-detail-editing">Cancel</a>
                                    <button type="submit" class="btn rounded-pill btn-outline-success">Update Issue Title</button>
                                </div>
                            </form>

                        </div>
                        <div>
                            <select class="selectpicker" data-width="100%" aria-label="None" name="type">
                                <option
                                    data-content='
                                        <span class="btn btn-success">Story</span>
                                    '
                                    value="<?php echo e(config('constants.ISSUE_TYPE.STORY')); ?>"
                                >
                                </option>

                                <option
                                    data-content='
                                        <span class="btn btn-secondary">Task</span>
                                    '
                                    value="<?php echo e(config('constants.ISSUE_TYPE.TASK')); ?>"
                                >
                                </option>

                                <option
                                    data-content='
                                        <span class="btn btn-warning">Bug</span>
                                    '
                                    value="<?php echo e(config('constants.ISSUE_TYPE.BUG')); ?>"
                                >
                                </option>

                            </select>
                        </div>
                    </div>
                </div>
                <!-- card body -->
                <div class="card-body">
                    <div class="mb-5">
                        <div>
                            <!-- text -->
                            <h4 class="mb-3 mb-md-0">Description</h4>
                        </div>
                        <div class="ql-container ql-snow" id="editor">
                            <div style="white-space: normal" class="ql-editor ql-blank" data-gramm="false">

                                <?php if(!is_null($issue->description)): ?>
                                <form
                                    method="POST"
                                    class="post-edit-form"
                                    id="post-edit-description"

                                >
                                    <?php echo method_field('PUT'); ?>
                                    <?php echo csrf_field(); ?>

                                    <div class="quill" id="description-placeholder">
                                        <?php echo $issue->description; ?>

                                    </div>
                                    <input hidden name="issue_key" value="<?php echo e($issue->issue_key); ?>" />
                                    <input hidden name="field_name" value="description" />
                                    <textarea name="field_value" hidden></textarea>
                                    <div class="issue-action-buttons mt-3">
                                        <a type="button" class="btn rounded-pill btn-outline-warning btn-cancel-detail-editing">Cancel</a>
                                        <button type="submit" class="btn rounded-pill btn-outline-success">Update Description</button>
                                    </div>
                                </form>

                                <?php else: ?>
                                    <p>There is no description for this issue.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <?php echo $__env->make('attachment.fetch-attachment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div>
                        <!-- text -->
                        <h4 class="mb-3 mb-md-0">Child issues</h4>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-hover text-nowrap mb-0 table-centered">
                            <?php if(is_null($issue->issues)): ?>
                                <p>There is no child issues for this issue.</p>
                            <?php else: ?>
                                <thead class="table-light">
                                    <tr>
                                        <th>Issue Type</th>
                                        <th>Issue Key</th>
                                        <th>Title</th>
                                        <th>Priority</th>
                                        <th>Status</th>
                                        <th>Assignee</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $issue->issues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childIssue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <?php switch($childIssue->type):
                                                    case (config('constants.ISSUE_TYPE.STORY')): ?>
                                                        <button class="btn btn-sm btn-success">Story</button>
                                                    <?php break; ?>

                                                    <?php case (config('constants.ISSUE_TYPE.TASK')): ?>
                                                        <button class="btn btn-sm btn-secondary">Task</button>
                                                    <?php break; ?>

                                                    <?php case (config('constants.ISSUE_TYPE.BUG')): ?>
                                                        <button class="btn btn-sm btn-warning">Bug</button>
                                                    <?php break; ?>

                                                    <?php default: ?>
                                                <?php endswitch; ?>
                                            </td>
                                            <td>
                                                <h5 class="mb-1">
                                                    <a
                                                        href="<?php echo e(route('issues.show', ['key' => $key, 'issue' => $childIssue->issue_key])); ?>"><?php echo e($childIssue->issue_key); ?></a>
                                                </h5>
                                            </td>
                                            <td class="text-truncate"><?php echo e($childIssue->title); ?></td>
                                            <td class="align-self-sm-center">


                                                <?php switch($childIssue->priority):
                                                    case (config('constants.ISSUE_PRIORITY.HIGH')): ?>
                                                        <i class="bi bi-arrow-up-circle"></i>
                                                    <?php break; ?>

                                                    <?php case (config('constants.ISSUE_PRIORITY.MEDIUM')): ?>
                                                        <i class="bi bi-arrow-right-circle"></i>
                                                    <?php break; ?>

                                                    <?php case (config('constants.ISSUE_PRIORITY.LOW')): ?>
                                                        <i class="bi bi-arrow-down-right-circle"></i>
                                                    <?php break; ?>

                                                    <?php case (config('constants.ISSUE_PRIORITY.OPTIONAL')): ?>
                                                        <i class="bi bi-arrow-down-circle"></i>
                                                    <?php break; ?>

                                                    <?php default: ?>
                                                        <i class="bi bi-slash-circle"></i>
                                                <?php endswitch; ?>
                                            </td>

                                            <td>
                                                <?php switch($childIssue->status):
                                                    case (config('constants.ISSUE_STATUS.TODO')): ?>
                                                        <span class="badge bg-secondary">To Do</span>
                                                    <?php break; ?>

                                                    <?php case (config('constants.ISSUE_STATUS.IN_PROGRESS')): ?>
                                                        <span class="badge bg-primary">In Progress</span>
                                                    <?php break; ?>

                                                    <?php case (config('constants.ISSUE_STATUS.REVIEW')): ?>
                                                        <span class="badge bg-info">In Review</span>
                                                    <?php break; ?>

                                                    <?php case (config('constants.ISSUE_STATUS.TESTING')): ?>
                                                        <span class="badge bg-info">Testing</span>
                                                    <?php break; ?>

                                                    <?php case (config('constants.ISSUE_STATUS.DONE')): ?>
                                                        <span class="badge bg-success">Done</span>
                                                    <?php break; ?>

                                                    <?php default: ?>
                                                <?php endswitch; ?>
                                            </td>
                                            <td> <!-- WAITING FOR REAL PHOTO_PATH -->
                                                <div class="avatar-group">
                                                    <span class="avatar avatar-sm">
                                                        <img alt="avatar"
                                                            src="<?php echo e(getS3URL($childIssue->assignee?->photo_path)); ?>"
                                                            class="rounded-circle">
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <form id="post-form" method="POST"
                                                    action="<?php echo e(route('issues.destroy', ['key' => $key, 'issue' => $childIssue->id, 'parent_key' => $issue->issue_key])); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <input type="hidden" id="id" name="id"
                                                        value="<?php echo e($childIssue->id); ?>">
                                                    <button type="submit" id="completed-task"
                                                        class="delete-issue fabutton">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            <?php endif; ?>
                        </table>
                    </div>
                </div>
            </div>
            <br />
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-comment-tab" data-bs-toggle="tab" data-bs-target="#nav-comment"
                        type="button" role="tab" aria-controls="nav-comment" aria-selected="true">Comments</button>
                    <button class="nav-link" id="nav-history-tab" data-bs-toggle="tab" data-bs-target="#nav-history"
                        type="button" role="tab" aria-controls="nav-history" aria-selected="true">History</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <?php echo $__env->make('comments.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('history.fetch-history', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4  col-12">

            <!-- card -->
            <div class="card mb-4 mt-4 mt-lg-0">
                <!-- card body -->
                <div class="card-body">
                    <div class="mb-3">
                        <h4 class="mb-0">Milestone</h4>
                    </div>
                    <!-- text -->
                    <div class="d-flex align-items-center justify-content-between">
                        <span>Milestone Name:
                        </span>
                        <span class="text-dark fw-bold"><?php echo e('Sprint' . ' ' . $issue->milestone); ?></span>
                    </div>
                </div>
            </div>

            <!-- card -->
            <div class="card mb-4 mt-4 mt-lg-0 detail-section">
                <!-- card body -->
                <div class="card-body border-top">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <h4 class="mb-0">Status</h4>
                    </div>
                    <div>
                        <!-- Status Selection -->
                        <p class="mb-0">
                            <select class="selectpicker" data-width="100%" aria-label="None" tabindex="null" name="status">
                                <option data-content='
                                    <span class="badge bg-secondary">To Do</span>
                                '
                                value = <?php echo e(config('constants.ISSUE_STATUS.TODO')); ?>

                                <?php if(!in_array(config('constants.ISSUE_STATUS.TODO'), config('constants.ALLOW_ISSUE_STATUS'))): ?>
                                    disabled
                                <?php endif; ?>
                                >
                                </option>
                                <option data-content='
                                    <span class="badge bg-primary">In Progress</span>
                                '
                                value = <?php echo e(config('constants.ISSUE_STATUS.IN_PROGRESS')); ?>

                                <?php if(!in_array(config('constants.ISSUE_STATUS.IN_PROGRESS'), config('constants.ALLOW_ISSUE_STATUS'))): ?>
                                    disabled
                                <?php endif; ?>
                                >
                                </option>
                                <option data-content='
                                    <span class="badge bg-info">In Review</span>
                                '
                                value = <?php echo e(config('constants.ISSUE_STATUS.REVIEW')); ?>

                                <?php if(!in_array(config('constants.ISSUE_STATUS.REVIEW'), config('constants.ALLOW_ISSUE_STATUS'))): ?>
                                    disabled
                                <?php endif; ?>
                                >
                                </option>
                                <option data-content='
                                    <span class="badge bg-info">Testing</span>
                                '
                                value = <?php echo e(config('constants.ISSUE_STATUS.TESTING')); ?>

                                <?php if(!in_array(config('constants.ISSUE_STATUS.TESTING'), config('constants.ALLOW_ISSUE_STATUS'))): ?>
                                    disabled
                                <?php endif; ?>
                                >
                                </option>
                                <option data-content='
                                    <span class="badge bg-success">Done</span>
                                '
                                value = <?php echo e(config('constants.ISSUE_STATUS.DONE')); ?>

                                <?php if(!in_array(config('constants.ISSUE_STATUS.DONE'), config('constants.ALLOW_ISSUE_STATUS'))): ?>
                                    disabled
                                <?php endif; ?>
                                >
                                </option>
                            </select>
                        </p>
                    </div>
                </div>
                <!-- card body -->
                <div class="card-body border-top">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <h4 class="mb-0">Priority</h4>
                    </div>
                    <div>
                        <!-- Priority Selection -->

                        <p class="mb-0">

                            <select class="selectpicker" data-width="100%" aria-label="None" name="priority">
                                <option data-content='
                                    <i class="bi bi-arrow-up-circle"> High</i>
                                '
                                value="<?php echo e(config('constants.ISSUE_PRIORITY.HIGH')); ?>"
                                >
                                </option>
                                <option data-content='
                                    <i class="bi bi-arrow-right-circle"> Medium</i>
                                '
                                value="<?php echo e(config('constants.ISSUE_PRIORITY.MEDIUM')); ?>"
                                >
                                </option>
                                <option data-content='
                                    <i class="bi bi-arrow-down-right-circle"> Low</i>
                                '
                                value="<?php echo e(config('constants.ISSUE_PRIORITY.LOW')); ?>"
                                >
                                </option>
                                <option data-content='
                                    <i class="bi bi-arrow-down-circle"> Optional</i>
                                '
                                value="<?php echo e(config('constants.ISSUE_PRIORITY.OPTIONAL')); ?>"
                                >
                            </select>

                        </p>
                    </div>
                </div>
                <!-- card body -->
                <div class="card-body">
                    <!-- Assignee Selection -->
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h4 class="mb-0">Assignee</h4>
                    </div>
                    <div class="d-flex align-items-center">
                        <select class="selectpicker" data-live-search="true" data-width="100%" aria-label="None" name="assignee_id">
                            <?php $__currentLoopData = session('project')->projectMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                    </div>
                </div>
                <!-- card body -->
                <div class="card-body border-top">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h4 class="mb-0">Reporter</h4>
                    </div>
                    <div class="d-flex align-items-center">
                        <!-- Reporter Selection -->
                        <select class="selectpicker" data-live-search="true" data-width="100%" aria-label="None" name="reporter_id">
                            <?php $__currentLoopData = session('project')->projectMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                    </div>
                </div>
                <!-- card body -->
                <div class="card-body border-top">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <h4 class="mb-0">Start Date</h4>
                    </div>
                    <div>
                        <!-- Start Date Selection -->
                        <input value="<?php echo e($issue->start_date); ?>" class="flatpickr selectpicker" name="start_date">
                    </div>
                </div>
                <div class="card-body border-top">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <h4 class="mb-0">Due Date</h4>
                    </div>
                    <div>
                        <!-- Due Date Selection -->
                        <input value="<?php echo e($issue->due_date); ?>" class="flatpickr selectpicker" name="due_date">
                    </div>
                </div>
                <!-- card body -->
                <div class="card-body border-top">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <h4 class="mb-0">Estimated hours</h4>
                    </div>
                    <div>
                        <!-- address -->
                        <p class="mb-0">
                            <?php if(is_null($issue->estimated_hours)): ?>
                                Not set
                            <?php else: ?>
                            <!-- Estimate hours selection -->
                            <select class="selectpicker" data-width="100%" aria-label="None" name="estimated_hours">
                                <?php for($i = 1; $i <= 8; $i++): ?>
                                    <option value=<?php echo e($i); ?>>
                                        <?php echo e($i); ?> hour<?php echo e(($i === 1 ? '' : 's')); ?>

                                    </option>
                                <?php endfor; ?>
                            </select>
                        </p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card-body border-top">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <h4 class="mb-0">Actual hours</h4>
                    </div>
                    <div>
                        <!-- address -->
                        <?php if(is_null($issue->estimated_hours)): ?>
                            Not set
                        <?php else: ?>
                            <p class="mb-0">
                                <!-- Actual hours selection -->
                                <select class="selectpicker" data-width="100%" aria-label="None" name="actual_hours">
                                    <?php for($i = 1; $i <= 8; $i++): ?>
                                        <option value=<?php echo e($i); ?>>
                                            <?php echo e($i); ?> hour<?php echo e(($i === 1 ? '' : 's')); ?>

                                        </option>
                                    <?php endfor; ?>
                                </select>
                            </p>
                        <?php endif; ?>

                    </div>
                </div>
            </div>

        </div>
    </div>
    </section>

    <script type="module">
        let currentAttachmentId;
        let currentAttachmentElement;

        let editTitleElem;
        let editTitleQuillElem;
        function destroyQuillDetail() {
            $('#comment-input').val("");
            $('.quill').next('.ql-toolbar').remove();
            $('.quill').next('.ql-container').remove();
            $('.quill').show();
            $('.issue-action-buttons').hide();
        }

        $(document).ready(function() {
            loadHistoryData(1);
            loadAttachment();

            $('.post-edit-form').on("submit", function (e) {
                Pace.restart();
                e.preventDefault();
                let data = $(this).serialize();
                $.ajax({
                    type: "PUT",
                    url: '<?php echo e(route("issues.partials.update",  ["key" => request()->key])); ?>',
                    data: data,
                    success: function (response) {
                        notify("Update successfully", "success");
                        editTitleElem.html(editTitleQuillElem.root.innerHTML);
                        destroyQuillDetail();
                    },
                    error: function (error) {
                        let errorsObject = error.responseJSON.errors;
                        if (errorsObject != null) {
                            let firstKey = Object.keys(errorsObject)[0];
                            console.log(errorsObject[firstKey]);
                            notify(errorsObject[firstKey], "danger");
                        }
                        else {
                            notify(error.responseJSON.error, "danger");
                        }
                    }
                });
            });


            $('.btn-cancel-detail-editing').off('click').on('click', function() {
                destroyQuillDetail();
            });

            $('.delete-issue').click(function(e) {
                e.preventDefault() // Don't post the form, unless confirmed
                if (confirm('Are you sure?')) {
                    // Post the form
                    $(e.target).closest('form').submit() // Post the surrounding form
                }
            });
            $($("[name='type']")[0]).selectpicker('val', '<?php echo e($issue->type); ?>');
            $($("[name='status']")[0]).selectpicker('val', '<?php echo e($issue->status); ?>');
            $($("[name='priority']")[0]).selectpicker('val', '<?php echo e($issue->priority); ?>');
            $($("[name='assignee_id']")[0]).selectpicker('val', '<?php echo e($issue->assignee_id); ?>');
            $($("[name='reporter_id']")[0]).selectpicker('val', '<?php echo e($issue->reporter_id); ?>');
            $($("[name='estimated_hours']")[0]).selectpicker('val', '<?php echo e($issue->estimated_hours); ?>');
            $($("[name='actual_hours']")[0]).selectpicker('val', '<?php echo e($issue->actual_hours); ?>');

            $('.create-issue').click(function(e) {
                $("#offcanvas-content").html("");
                $.get($(this).data('action'), function(data) {
                    $("#offcanvas-content").html(data);
                    $('.selectpicker').selectpicker('refresh');
                });
            });

            $('#description-placeholder').click(function(e) {
                editTitleElem = $(this);
                let issue_action_buttons = $(this).parent().find('.issue-action-buttons').eq(0);
                let content = $(this).parent().find('textarea');
                var editorContainer = $('<div>');
                $(this).after(editorContainer);
                var quill = new Quill(editorContainer[0], {
                    theme: 'snow',
                });
                quill.on('text-change', function(delta, oldDelta, source) {
                    if (source === 'user') {
                        content.val(quill.root.innerHTML);
                    }
                });

                editTitleQuillElem = quill;
                quill.root.innerHTML = $(this).html().trim();
                $(this).hide();
                issue_action_buttons.show();
            });


            $('#issue-title').click(function(e) {
                editTitleElem = $(this);
                let content = $(this).parent().find('textarea');
                let issue_action_buttons = $(this).parent().find('.issue-action-buttons').eq(0);
                var editorContainer = $('<div>');
                $(this).after(editorContainer);
                var quill = new Quill(editorContainer[0], {
                    theme: 'snow',
                    formats: [],
                    "modules": {
                        "toolbar": false,
                        clipboard: {
                            matchVisual: false
                        }
                    }
                });
                quill.on('text-change', function(delta, oldDelta, source) {
                    if (source === 'user') {
                        content.val(quill.root.textContent);
                    }
                });

                editTitleQuillElem = quill;
                quill.root.innerHTML = $(this).html().trim();
                $(this).hide();
                issue_action_buttons.show();
            });
        })

        // Get a reference to the file input element
        const inputElement = document.querySelector('input[type="file"]');
        // Create a FilePond instance
        const pond = FilePond.create(inputElement);

        function loadAttachment() {
            $.ajax({
                    url: "<?php echo e(route('attachments.fetch', ['key' => $key, 'issue_key' => $issue->issue_key])); ?>",
                    data: {
                        _token: "<?php echo e(csrf_token()); ?>",
                        issue_id: "<?php echo e($issue->id); ?>",
                        target_type: 1
                    },
                    type: "get"
                })
                .done(function(data) {
                    if (data.html !== "") {
                        $("#attachment-data").append(data.html);
                    }

                    $('.view-attachment').click(function(e) {
                        // Change href attribute and open new tab
                        e.preventDefault();
                        let id = $(this).data('id');
                        $.ajax({
                                url: "<?php echo e(route('attachments.show', ['key' => $key, 'issue_key' => $issue->issue_key, 'id' => 'ATTACHMENT_ID'])); ?>"
                                    .replace('ATTACHMENT_ID', id),
                                data: {
                                    _token: "<?php echo e(csrf_token()); ?>",
                                    issue_id: "<?php echo e($issue->id); ?>",
                                },
                                type: "GET"
                            })
                            .done(function(data) {
                                notify(data.message, 'success');
                                window.open(data.url, '_blank');
                            })
                            .fail(function(jqXHR, ajaxOptions, thrownError) {
                                notify('View attachment failed.');
                            });
                    })

                    $('.download-attachment').click(function() {
                        let id = $(this).data('id');
                        window.open(
                            "<?php echo e(route('attachments.download', ['key' => $key, 'issue_key' => $issue->issue_key, 'id' => 'ATTACHMENT_ID'])); ?>"
                            .replace('ATTACHMENT_ID', id), '_blank');
                    })

                    $('.delete-attachment').click(function() {
                        currentAttachmentId = $(this).data('id');
                        currentAttachmentElement = $(this).closest('.attachment-row');
                    })

                    $('#deleteAttachmentForm').on('submit', function(e) {
                        e.preventDefault();
                        let form = $(this);
                        $.ajax({
                            url: form.attr('action').replace('ATTACHMENT_ID', currentAttachmentId),
                            method: 'POST',
                            data: form.serialize(),
                            success: function(response) {
                                currentAttachmentElement.remove();
                                notify(response.message, 'success');
                            },
                            error: function(response) {
                                notify(response.message, 'danger');
                            }
                        })
                    })
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    alert('Load attachment failed.');
                });
        }

        pond.on('addfile', (error, file) => {
            let form = new FormData();
            form.append('file', file.file);
            form.append('_token', "<?php echo e(csrf_token()); ?>");
            form.append('name', file.file.name);
            form.append('target_type', 1);
            form.append('target_id', "<?php echo e($issue->id); ?>");
            $.ajax({
                    url: "<?php echo e(route('attachments.upload', ['key' => $key, 'issue_key' => $issue->issue_key])); ?>",
                    type: "POST",
                    data: form,
                    processData: false,
                    contentType: false
                })
                .done(function(data) {
                    if (data.html !== "") {
                        $("#attachment-data").append(data.html);
                        notify(data.message, 'success');
                    }
                    pond.removeFile(file.id);
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    notify('Upload attachment failed.', 'danger');
                });
        });

        var page = 1;
        $(window).scroll(function() {
            if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
                page++;
                loadHistoryData(page);
            }
        });
        let url = window.location.href;

        function loadHistoryData(page) {
            $.ajax({
                    url: "<?php echo e(route('histories.fetch', ['key' => $key, 'issue_key' => $issue->issue_key])); ?>" +
                        '?page=' + page,
                    data: {
                        _token: "<?php echo e(csrf_token()); ?>",
                        issue_id: "<?php echo e($issue->id); ?>",
                    },
                    type: "get",
                    beforeSend: function() {
                        $('.ajax-load').show();
                    }
                })
                .done(function(data) {
                    if (data.html == "") {
                        $('.ajax-load').html("No more records found");
                        return;
                    }
                    $('.ajax-load').hide();
                    $("#history-data").append(data.html);
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    alert('server not responding...');
                });
        }

        $(".flatpickr").flatpickr({
            altInput: true,

            enableTime: true,
            dateFormat: "Y-m-d H:i:S",
            onChange: function(rawdate, altdate, FPOBJ) {
                FPOBJ.close();
            }
        });

        // Get all select field in status section
        $(".detail-section .selectpicker").on('change', function(e) {
            Pace.restart();
            let issue_key = "<?php echo e($issue->issue_key); ?>";
            let field_name = $(this).attr('name');
            let field_value = this.value;
            $.ajax({
                type: "PUT",
                url: '<?php echo e(route("issues.partials.update",  ["key" => request()->key])); ?>',
                data: {
                    issue_key: issue_key,
                    field_name: field_name,
                    field_value: field_value,
                    "_token": "<?php echo e(csrf_token()); ?>"
                },
                success: function (response) {
                    notify("Update successfully", "success");
                },
                error: function (error) {
                    notify(error.responseJSON.message, "danger");
                }
            });

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/issue/show.blade.php ENDPATH**/ ?>