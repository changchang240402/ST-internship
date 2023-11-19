<?php $__env->startSection('extraHeadResources'); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/kanban.css']); ?>
    <script type="module">
        $(function() {
            $('.issue-wrapper').click(function() {
                if ($(this).hasClass("ui-sortable-helper")) {
                    return;
                }
                let issue_key = $(this).data("issuekey");
                let url = '<?php echo e(route('issues.show', ['key' => request()->key, 'issue' => 'ISSUE_KEY'])); ?>'
                window.location.href = url.replace('ISSUE_KEY', issue_key);
            })

            $(".sortable").sortable({
                revert: 100,
                cancel: ".undraggable",
                placeholder: "ui-state-highlight",
                connectWith: ".connectedSortable",
                receive: function(event, ui) {
                    $.ajax({
                        type: "PUT",
                        url: '<?php echo e(route('kanban.update', ['key' => $project->key])); ?>',
                        data: {
                            status: $(this).parent().data("status"),
                            issue_key: ui.item.data("issuekey"),
                            "_token": "<?php echo e(csrf_token()); ?>"
                        },
                        success: function(response) {
                            console.log(response);
                        },
                        error: function(error) {
                            alert('Something went wrong');
                        }
                    });
                },
                update: function(event, ui) {
                    let detachs = $(this).find(".undraggable").detach();
                    $(this).append(detachs);
                }
            }).disableSelection();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modals'); ?>
    <?php echo $__env->make('partials.modals.add_member', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Create new issue's modal -->
<div class="modal fade" id="createNewIssueModal" tabindex="-1" aria-labelledby="createNewIssueModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title h4">Create New Task</div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <div class="d-flex justify-content-end col-12">
                    <button type="button" class="me-2 btn btn-outline-secondary">Cancel</button>
                    <button type="submit" class="btn btn-primary">Create Task</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

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
            <!-- Page Header -->
            <div class="border-bottom pb-3 mb-3 d-md-flex align-items-center justify-content-between">
                <div class="mb-3 mb-md-0">
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="<?php echo e(route('projects.index')); ?>">Project</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <?php echo e($project->name); ?>

                            </li>
                        </ol>
                    </nav>
                    <h1 class="mb-1 h2 fw-bold"><?php echo e($project->name); ?></h1>
                </div>
            </div>
        </div>
    </div>
    <section class="kanban">
        <div class="">
            <div class="d-flex">
                <input class="form-control search-input me-3" placeholder="Search this board">
                <?php $__currentLoopData = $project->projectMembers->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <img src="<?php echo e(getS3URL($member->user->photo_path)); ?>" width="32" height="32" class="filter-user-active"
                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                        data-bs-title="<?php echo e($member->user->display_name); ?>">
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <button class="btn btn-light btn-sm ms-1 rounded-circle" data-bs-toggle="modal"
                    data-bs-target="#addMemberModal" <?php if(session('role') == config('constants.ROLES')['MEMBER']): ?> disabled <?php endif; ?>><i
                        class="fa-solid fa-user-plus"></i></button>

                <button class="btn btn-light btn-sm ms-2" style="color: #4c536e;"><i class="fa-solid fa-list"></i> Only my
                    issues</button>
                <select class="selectpicker" data-width="10%" aria-label="None" id="milestoneSelect" name="milestone">
                    <option value="all">Select Milestone</option>
                    <?php $__currentLoopData = $milestones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $milestone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($milestone); ?>">
                            <?php if($milestone == -1): ?>
                                Not Sprint
                            <?php else: ?>
                                Sprint <?php echo e($milestone); ?>

                            <?php endif; ?>
                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class=" mt-4 d-flex sortable-header connectedSortableHeader" id = "data-kanban">
                <?php echo $__env->make('user.data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extraScripts'); ?>
    <script type="module">
        const createNewIssueModal = new bootstrap.Modal(document.getElementById('createNewIssueModal'), {});
        $('.create-issue').click(function(e) {
            let status = $(this).data("status")
            $("#offcanvas-content").html("");
            $.get("<?php echo e(route('issues.create', ['key' => request()->key])); ?>" + "?status=" + status, function(data) {
                $("#offcanvas-content").html(data);
                $('.selectpicker').selectpicker('refresh');
            });
        });

        document.getElementById('milestoneSelect').addEventListener('change', function() {
            var selectedMilestoneId = this.value;
            if(selectedMilestoneId == "all"){
                selectedMilestoneId = null;
            }

            $.ajax({
                    url: "<?php echo e(route('kanban.index', ['key' => request()->key])); ?>",
                    data: {
                        _token: "<?php echo e(csrf_token()); ?>",
                        key: "<?php echo e(request()->key); ?>",
                        milestoneId: selectedMilestoneId 
                    },
                    type: "get"
                })
                .done(function(data) {
                    if (data.html !== "") {
                        $("#data-kanban").html(data.html);
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    alert('Load attachment failed.');
                });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', ['title' => $project->name], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/user/index.blade.php ENDPATH**/ ?>