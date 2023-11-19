<?php $__env->startSection('content'); ?>
    
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" style="width: 600px;">
        <div class="offcanvas-body">
            <div class="offcanvas-header px-2 pt-0">
                <h3 class="offcanvas-title" id="offcanvasExampleLabel">Create New Issue</h3>
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
                    <button
                        data-action="<?php echo e(route('issues.create', ['key' => $key])); ?>"
                        class="btn btn-primary create-issue"
                        data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                    >
                        New issues
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-3">
        <div class="row">
            
            <div class="btn-group col">
                <div class="input-group mb-3">
                    <input type="text" class="form-control common_input title-input"
                        placeholder="Issue title" aria-label="Issue title" aria-describedby="basic-addon2">
                    <span class="input-group-text" id="basic-addon2">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </span>
                </div>
            </div>
            
            <div class="btn-group col">
                <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Assignee
                </button>
                <ul class="dropdown-menu dropdown-menu-xs">
                    <li>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control common_input assignee-input"
                                placeholder="Assignee name" aria-label="Assignee name" aria-describedby="basic-addon2">
                            <span class="input-group-text" id="basic-addon2">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </span>
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input common_selector assignee" type="checkbox" value="unassign">
                            <label class="form-check-label" for="flexCheckDefault1">
                                Unassigned
                            </label>
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input common_selector assignee" type="checkbox" value="your_self">
                            <label class="form-check-label" for="flexCheckDefault2">
                                Current user
                            </label>
                        </div>
                    </li>
                </ul>
            </div>
            
            <div class="btn-group col">
                <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Reporter
                </button>
                <ul class="dropdown-menu dropdown-menu-xs">
                    <li>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control common_input reporter-input"
                                placeholder="Reporter name" aria-label="Reporter name" aria-describedby="basic-addon2">
                            <span class="input-group-text" id="basic-addon2">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </span>
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input common_selector reporter" type="checkbox" value="non_reporter"
                                id="flexCheckDefault1">
                            <label class="form-check-label" for="flexCheckDefault1">
                                Non Reporter
                            </label>
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input common_selector reporter" type="checkbox" value="your_self"
                                id="flexCheckDefault2">
                            <label class="form-check-label" for="flexCheckDefault2">
                                Current user
                            </label>
                        </div>
                    </li>
                </ul>
            </div>
            
            <div class="btn-group col">
                <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Status
                </button>
                <ul class="dropdown-menu dropdown-menu-xl">
                    <li>
                        <div class="form-check">
                            <input class="form-check-input common_selector status" type="checkbox" value="TODO"
                                id="flexCheckDefault1">
                            <label class="form-check-label" for="flexCheckDefault1">
                                To do
                            </label>
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input common_selector status" type="checkbox" value="IN_PROGRESS"
                                id="flexCheckDefault1">
                            <label class="form-check-label" for="flexCheckDefault1">
                                In progress
                            </label>
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input common_selector status" type="checkbox" value="REVIEW"
                                id="flexCheckDefault2">
                            <label class="form-check-label" for="flexCheckDefault2">
                                Review
                            </label>
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input common_selector status" type="checkbox" value="TESTING"
                                id="flexCheckDefault2">
                            <label class="form-check-label" for="flexCheckDefault2">
                                Testing
                            </label>
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input common_selector status" type="checkbox" value="DONE"
                                id="flexCheckDefault2">
                            <label class="form-check-label" for="flexCheckDefault2">
                                Done
                            </label>
                        </div>
                    </li>
                </ul>
            </div>
            
            <div class="btn-group col">
                <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Type
                </button>
                <ul class="dropdown-menu dropdown-menu-xl">
                    <li>
                        <div class="form-check">
                            <input class="form-check-input common_selector type" type="checkbox" value="STORY"
                                id="flexCheckDefault1">
                            <label class="form-check-label" for="flexCheckDefault1">
                                Story
                            </label>
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input common_selector type" type="checkbox" value="TASK"
                                id="flexCheckDefault1">
                            <label class="form-check-label" for="flexCheckDefault1">
                                Task
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input common_selector type" type="checkbox" value="BUG"
                                id="flexCheckDefault2">
                            <label class="form-check-label" for="flexCheckDefault2">
                                Bug
                            </label>
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input common_selector type" type="checkbox" value="SUB_TASK"
                                id="flexCheckDefault2">
                            <label class="form-check-label" for="flexCheckDefault2">
                                Sub task
                            </label>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-xl col mb-5">
        <div class="card">
            <!-- card header  -->
            <div class="card-header">
                <h4 class="mb-1">Project issues</h4>
            </div>

            <div class="table-responsive">
                <table class="table table-hover text-nowrap mb-0 table-centered">
                    <?php if(is_null($issues)): ?>
                        There is no issues for this project.
                    <?php else: ?>
                        <thead>
                            <tr>
                                <th>Issue Type</th>
                                <th>Issue Key</th>
                                <th>Title</th>
                                <th>Priority</th>
                                <th>Status</th>
                                <th>Assignee</th>
                                <th>Actions</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="filter_data">
                            <?php $__currentLoopData = $issues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $issue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <?php switch($issue->type):
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
                                                href="<?php echo e(route('issues.show', ['key' => $key, 'issue' => $issue->issue_key])); ?>"><?php echo e($issue->issue_key); ?></a>
                                        </h5>
                                    </td>
                                    <td class="text-truncate"><?php echo e($issue->title); ?></td>
                                    <td class="align-self-sm-center">
                                        <?php switch($issue->priority):
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
                                        <?php endswitch; ?>
                                    </td>

                                    <td>
                                        <?php switch($issue->status):
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
                                    <td>
                                        <div class="avatar-group">
                                            <span class="avatar avatar-sm">
                                                <img alt="avatar" src=" <?php echo e(getS3URL($issue->assignee?->photo_path)); ?>"
                                                    class="rounded-circle">
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="dropdown ">
                                            <a class="text-muted text-primary-hover" href="#" role="button"
                                                id="dropdownThirtyOne" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="fe fe-more-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownThirtyOne">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else
                                                    here</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <form id="post-form" method="POST"
                                            action="<?php echo e(route('issues.destroy', ['key' => $key, 'issue' => $issue->id])); ?>">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <input type="hidden" name="id" value="<?php echo e($issue->id); ?>">
                                            <button type="submit" id="completed-task" class="delete-issue fabutton">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    <?php endif; ?>
                </table>
                <div class="d-flex justify-content-center mt-2">
                    <?php echo e($issues->links()); ?>

                </div>
            </div>
        </div>
    </div>

    <script type="module">
        function createTableRow(issue, key) {
            const row = document.createElement('tr');

            // Issue Type Cell
            const issueTypeCell = document.createElement('td');
            const typeButton = document.createElement('button');
            typeButton.className = 'btn btn-sm ';
            switch (issue.type) {
                case <?php echo e(config('constants.ISSUE_TYPE.STORY')); ?>:
                    typeButton.className += ' btn-success';
                    typeButton.textContent = 'Story';
                    break;

                case <?php echo e(config('constants.ISSUE_TYPE.TASK')); ?>:
                    typeButton.className += ' btn-secondary';
                    typeButton.textContent = 'Task';
                    break;

                case <?php echo e(config('constants.ISSUE_TYPE.BUG')); ?>:
                    typeButton.className += ' btn-warning';
                    typeButton.textContent = 'Bug';
                    break;

                default:
                    break;
            }
            issueTypeCell.appendChild(typeButton);

            // Issue Key Cell
            const issueKeyCell = document.createElement('td');
            const keyLink = document.createElement('a');
            keyLink.href = `<?php echo e(route('issues.show', ['key' => ':key', 'issue' => ':issue_key'])); ?>`
                .replace(':key', key)
                .replace(':issue_key', issue.issue_key);
            keyLink.textContent = issue.issue_key;
            issueKeyCell.appendChild(keyLink);

            // Title Cell
            const titleCell = document.createElement('td');
            titleCell.className = 'text-truncate';
            titleCell.textContent = issue.title;

            // Priority Cell
            const priorityCell = document.createElement('td');
            const priorityIcon = document.createElement('i');
            priorityIcon.className = 'bi ' + (
                issue.priority === <?php echo e(config('constants.ISSUE_PRIORITY.HIGH')); ?> ? 'bi-arrow-up-circle' :
                issue.priority === <?php echo e(config('constants.ISSUE_PRIORITY.MEDIUM')); ?> ? 'bi-arrow-right-circle' :
                issue.priority === <?php echo e(config('constants.ISSUE_PRIORITY.LOW')); ?> ? 'bi-arrow-down-right-circle' :
                issue.priority === <?php echo e(config('constants.ISSUE_PRIORITY.OPTIONAL')); ?> ? 'bi-arrow-down-circle' : ''
            );
            priorityCell.appendChild(priorityIcon);

            // Status Cell
            const statusCell = document.createElement('td');
            const statusBadge = document.createElement('span');

            statusBadge.className = 'badge bg-'
            switch (issue.status) {
                case <?php echo e(config('constants.ISSUE_STATUS.TODO')); ?>:
                    statusBadge.className += 'secondary';
                    statusBadge.textContent = 'To do';
                    break;

                case <?php echo e(config('constants.ISSUE_STATUS.IN_PROGRESS')); ?>:
                    statusBadge.className += 'primary';
                    statusBadge.textContent = 'In progress';
                    break;

                case <?php echo e(config('constants.ISSUE_STATUS.REVIEW')); ?>:
                    statusBadge.className += 'info';
                    statusBadge.textContent = 'Review';
                    break;

                case <?php echo e(config('constants.ISSUE_STATUS.TESTING')); ?>:
                    statusBadge.className += 'info';
                    statusBadge.textContent = 'Testing';
                    break;

                case <?php echo e(config('constants.ISSUE_STATUS.DONE')); ?>:
                    statusBadge.className += 'success';
                    statusBadge.textContent = 'Done';
                    break;

                default:
                    break;
            }
            statusCell.appendChild(statusBadge);

            // Assignee Cell
            const assigneeCell = document.createElement('td');
            const avatarGroup = document.createElement('div');
            avatarGroup.className = 'avatar-group';
            const avatar = document.createElement('span');
            avatar.className = 'avatar avatar-sm';
            const avatarImage = document.createElement('img');
            avatarImage.alt = 'avatar';
            avatarImage.src = issue.assignee ? issue.assignee.photo_path : '';
            avatarImage.className = 'rounded-circle';
            avatar.appendChild(avatarImage);
            avatarGroup.appendChild(avatar);
            assigneeCell.appendChild(avatarGroup);

            // Actions Cell
            const actionsCell = document.createElement('td');
            const dropdown = document.createElement('div');
            dropdown.className = 'dropdown';
            const actionLink = document.createElement('a');
            actionLink.className = 'text-muted text-primary-hover';
            actionLink.href = '#';
            actionLink.role = 'button';
            actionLink.id = 'dropdownThirtyOne';
            actionLink.setAttribute('data-bs-toggle', 'dropdown');
            actionLink.setAttribute('aria-haspopup', 'true');
            actionLink.setAttribute('aria-expanded', 'false');
            const actionIcon = document.createElement('i');
            actionIcon.className = 'fe fe-more-vertical';
            actionLink.appendChild(actionIcon);
            dropdown.appendChild(actionLink);

            const dropdownMenu = document.createElement('div');
            dropdownMenu.className = 'dropdown-menu';
            dropdownMenu.setAttribute('aria-labelledby', 'dropdownThirtyOne');
            const dropdownItems = [
                'Action', 'Another action', 'Something else here'
            ];
            dropdownItems.forEach(itemText => {
                const dropdownItem = document.createElement('a');
                dropdownItem.className = 'dropdown-item';
                dropdownItem.href = '#';
                dropdownItem.textContent = itemText;
                dropdownMenu.appendChild(dropdownItem);
            });
            dropdown.appendChild(dropdownMenu);

            actionsCell.appendChild(dropdown);

            // Delete Cell
            const deleteCell = document.createElement('td');
            const deleteForm = document.createElement('form');
            deleteForm.id = 'post-form';
            deleteForm.method = 'POST';
            deleteForm.action = `<?php echo e(route('issues.destroy', ['key' => ':key', 'issue' => ':issue'])); ?>`
                .replace(':key', key)
                .replace(':issue', issue.id);
            const csrfInput = document.createElement('input');
            csrfInput.type = 'hidden';
            csrfInput.name = '_token';
            csrfInput.value = "<?php echo e(csrf_token()); ?>";
            const methodInput = document.createElement('input');
            methodInput.type = 'hidden';
            methodInput.name = '_method';
            methodInput.value = 'DELETE';
            const idInput = document.createElement('input');
            idInput.type = 'hidden';
            idInput.name = 'id';
            idInput.value = issue.id;
            const deleteButton = document.createElement('button');
            deleteButton.type = 'submit';
            deleteButton.id = 'completed-task';
            deleteButton.className = 'delete-issue fabutton';
            const deleteIcon = document.createElement('i');
            deleteIcon.className = 'bi bi-trash';
            deleteButton.appendChild(deleteIcon);
            deleteForm.appendChild(csrfInput);
            deleteForm.appendChild(methodInput);
            deleteForm.appendChild(idInput);
            deleteForm.appendChild(deleteButton);
            deleteCell.appendChild(deleteForm);

            // Append all cells to the row
            row.appendChild(issueTypeCell);
            row.appendChild(issueKeyCell);
            row.appendChild(titleCell);
            row.appendChild(priorityCell);
            row.appendChild(statusCell);
            row.appendChild(assigneeCell);
            row.appendChild(actionsCell);
            row.appendChild(deleteCell);

            return row;
        }

        $(document).ready(function() {
            $('.delete-issue').click(function(e) {
                e.preventDefault() // Don't post the form, unless confirmed
                if (confirm('Are you sure?')) {
                    // Post the form
                    $(e.target).closest('form').submit() // Post the surrounding form
                }
            });

            function filter_data() {
                $('.filter_data').html('<div id="loading" style="" ></div>');
                var title = get_filter('title');
                var assignee = get_filter('assignee');
                var reporter = get_filter('reporter');
                var status = get_filter('status');
                var type = get_filter('type');
                $.ajax({
                    url: '<?php echo e(route('issues.filter', ['key' => $key])); ?>',
                    method: "POST",
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        title: title,
                        assignee: assignee,
                        reporter: reporter,
                        status: status,
                        type: type
                    },
                    success: function(response) {
                        console.log('respone:', response.issues);

                        const tbody = document.querySelector('.filter_data');
                        response.issues.forEach(item => {
                            const row = createTableRow(item, response.key);
                            tbody.appendChild(row);
                        });
                    },
                    error: function(error) {
                        console.log('Something went wrong');
                    }
                });
            }

            function get_filter(class_name) {
                var filter = [];
                var input_value = $('.' + class_name + '-input');
                if (input_value.length > 0) {
                    filter.push(input_value.val());
                }
                $('.' + class_name + ':checked').each(function() {
                    filter.push($(this).val());
                });

                return filter.filter(element => (element !== '' && element !== null));;
            }

            $('.common_selector').click(function() {
                filter_data();
            });

            $('.common_input').on('input',function() {
                filter_data();
            });

            $('.create-issue').click(function(e) {
                $("#offcanvas-content").html("");
                console.log($(this).data('action'));
                $.get($(this).data('action'), function (data) {
                    $("#offcanvas-content").html(data);
                    $('.selectpicker').selectpicker('refresh');
                });
            });
        })
    </script>
    <style>
        /* Style the button and dropdown menu */
        .btn-danger {
            background-color: #dc3545;
            color: #fff;
        }

        .dropdown-menu {
            background-color: #fff;
        }

        /* Style the text input and labels inside the dropdown menu */
        .form-control {
            border: 1px solid #ccc;
        }

        .input-group-text {
            background-color: #f8f9fa;
        }

        /* Style the checkboxes and labels inside the dropdown menu */
        .form-check-input {
            margin-right: 5px;
        }

        .form-check-label {
            font-weight: normal;
            margin-left: 5px;
        }

        /* Optional: Add some spacing between list items */
        .dropdown-menu>li {
            padding: 5px 15px;
        }

        /* Optional: Add some spacing between the button and the dropdown menu */
        .btn-group {
            margin-right: 10px;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/issue/index.blade.php ENDPATH**/ ?>