<?php $__env->startSection('extraScripts'); ?>
<script type="module">
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

    let currentMemberID;
    let currentMemberElem;
    const deleteConfirmModal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'), {})
    $(".delete-member-btn").click(function() {
        if ($(this).attr('disabled')) {
            // Prevent the currently logged-in user from deleting themselves from the project.
            return;
        }
        currentMemberElem = $(this).parent().parent()
        currentMemberID = $(this).data("id")
        deleteConfirmModal.show()
        $($(deleteConfirmModal._element).find(".modal-body")[0]).text("You are about to remove this member ( " + $(this).data("name") + " ) out of your project, are you sure you want to do that?");
    });

    $("#delete-member-submit-btn").click(function() {
        let url = "<?php echo e(route('members.destroy', ['key'=>request()->key , 'member'=>'MEMBER_ID'])); ?>";
        $.ajax({
            type: "POST",
            url: url.replace("MEMBER_ID", currentMemberID),
            data: {
                "id": currentMemberID,
                "_token": "<?php echo e(csrf_token()); ?>",
                "_method": 'DELETE'
            },
            success: function (response) {
                notify(response.message, 'primary');
                deleteConfirmModal.hide();
                currentMemberElem.remove();
            },
            error: function(response)
            {
                notify(response.responseJSON.message, 'danger');
                obj.attr('class', 'badge bg-danger resend-invitation');
                obj.html('<i class="fa-solid fa-triangle-exclamation"></i> Something went wrong');
            }
        });
    });

    $(".resend-invitation").click(function() {
        let obj = $(this);
        obj.html('<i class="fas fa-circle-notch fa-spin"></i> Sending... ');
        notify("Re-sending invitation...", 'primary');
        let user_id = $(this).data("userid");
        let member_id = $(this).data("memberid");
        $.ajax({
            type: "POST",
            url: "<?php echo e(route('members.resend.invitation', ['key'=>request()->key])); ?>",
            data: {
                "user_id": user_id,
                "member_id": member_id,
                "_token": "<?php echo e(csrf_token()); ?>"
            },
            success: function (response) {
                notify(response.message, 'success');
                obj.html('<i class="fa-solid fa-check"></i> Invitation sent ');
                obj.attr('class', 'badge bg-success resend-invitation');
            },
            error: function(response)
            {
                notify(response.responseJSON.message, 'danger');
                obj.attr('class', 'badge bg-danger resend-invitation');
                obj.html('<i class="fa-solid fa-triangle-exclamation"></i> Something went wrong');
            }
        });
    });
    $(".selectpicker").selectpicker({
        style: "btn-sm selectpicker-custom"
    });
    $('.selectpicker').on('changed.bs.select', function (e, clickedIndex, newValue, oldValue) {
        let selectObj = $(this);
        let id = $(this).data("id");
        let role_id = $(e.currentTarget).val();
        if (role_id == oldValue) {
            return
        }
        $.ajax({
            type: "PUT",
            url: "<?php echo e(route('members.update', ['key'=>request()->key])); ?>",
            data: {
                "role_id": role_id,
                "id": id,
                "_token": "<?php echo e(csrf_token()); ?>"
            },
            success: function (response) {
                notify(response.message, 'success');
            },
            error: function(response)
            {
                // Revert back since operation not successful
                selectObj.find('option[value="' + oldValue + '"]').prop('selected', true);
                var oldValueText = selectObj.find('option:selected').text();
                let button = selectObj.next('.btn');
                button.attr('title', selectObj.find(':selected').text(oldValueText));
                button.find('.filter-option-inner-inner').text(oldValueText);
                notify(response.responseJSON.message, 'danger');
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modals'); ?>
<!-- Delete Confirm Modal -->
<div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteConfirmModalLabel">Are you sure you want to remove this member</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <?php echo method_field('DELETE'); ?>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="delete-member-submit-btn">Delete</button>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style>
    .badge {
        user-select: none;
    }
    td {
        padding-top: 5px !important;
        padding-bottom: 5px !important;
    }
    .selectpicker-custom {
        font-weight: 700 !important;
        width: 150px !important;
    }
    .bootstrap-select {
        width: 150px !important;
    }
</style>

<div class="container">
    <div class="row">
        <!-- col -->
        <div class="col-12">
            <!-- card -->
            <div class="card">
                <!-- card header -->
                <div class="card-header">
                    <h4 class="mb-0">Members of <?php echo e(session('project')->name); ?> project</h4>
                </div>
                <!-- table -->
                <div class="table-responsive">
                    <table class="table mb-0 text-nowrap table-hover table-centered">
                        <thead class="table">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Created by</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm">
                                            <img src="<?php echo e(getFullUrl($member->user->photo_path)); ?>" alt="" class="rounded-circle">
                                        </div>
                                        <div class="ms-3">
                                            <h5 class="mb-0">
                                                <a href="#" class="text-inherit"><?php echo e($member->user->display_name); ?>

                                                </a>
                                            </h5>
                                        </div>
                                    </div>
                                </td>
                                <td><?php echo e($member->user->email); ?></td>
                                <td>
                                    <select class="selectpicker" data-id="<?php echo e($member->id); ?>" <?php echo e(changeRolesSelectDisabled($member->user_id) ? 'disabled' : ''); ?>>
                                        <?php $__currentLoopData = config('constants.ROLES'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role => $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($key); ?>" <?php echo e(in_array($key, config('constants.ALLOW_ADD_ROLES')) ? '' : 'disabled'); ?> <?php echo e($member->role_id == $key ? 'selected' : ''); ?>><?php echo e($role); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </td>
                                <td>
                                    <img src="<?php echo e(getFullUrl($member->createdBy->photo_path)); ?>" alt=""
                                        class="rounded-circle avatar avatar-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="<?php echo e($member->createdBy->display_name); ?>">
                                </td>
                                <td>
                                    <?php if($member->is_accept == config('constants.MEMBER_STATUS')['ACCEPT']): ?>
                                        <span class="badge bg-success">Accepted</span>
                                    <?php endif; ?>

                                    <?php if($member->is_accept == config('constants.MEMBER_STATUS')['PENDING']): ?>
                                        <span class="badge bg-primary">In Progress</span>

                                        <span class="badge bg-primary resend-invitation" data-userid=<?php echo e($member->user->id); ?> data-memberid=<?php echo e($member->id); ?>> <i class="fa-solid fa-arrows-rotate"></i> Resend Invite</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <i class="fe fe-trash delete-member-btn" data-id="<?php echo e($member->id); ?>" data-name="<?php echo e($member->user->display_name); ?>" <?php echo e($member->user_id == auth()->id() ? 'disabled' : ''); ?>></i>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center">
                    <?php echo e($members->links()); ?>

                </div>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/project/member/index.blade.php ENDPATH**/ ?>