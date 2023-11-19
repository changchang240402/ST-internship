<!-- Add Member Modal -->
<div class="modal fade" id="addMemberModal" tabindex="-1" aria-labelledby="addMemberModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-3" id="addMemberModalLabel">Add People to <?php echo e(session('project')->name); ?> Project</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addMemberForm" action="<?php echo e(route('members.store', ['key' => request()->key])); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <label>Email</label>
                    <input class="form-control mb-2" placeholder="e.g., Maria, maria@company.com" name="email"/>
                    <div class="invalid-feedback"></div>
                    <label>Role</label>
                    <select class="form-select" aria-label="Default select example" name="role_id">
                        <?php $__currentLoopData = config('constants.ROLES'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role => $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>" <?php echo e($key == 3 ? 'selected' : ''); ?>><?php echo e($role); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <div class="invalid-feedback"></div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" onclick="submitAddMemberForm()">Add</button>
            </div>
        </div>
    </div>
</div>

<script>
    function submitAddMemberForm() {
        var addMemberModal = bootstrap.Modal.getOrCreateInstance(document.getElementById('addMemberModal'));
        $('.is-invalid').removeClass('is-invalid');
        $('.invalid-feedback').text('');
        let form = $("#addMemberForm");
        $.ajax({
            type: "POST",
            url: form.attr("action"),
            data: form.serialize(),
            success: function (response) {
                notify(response.message, 'primary');
                addMemberModal.hide();
                $("input[name='email']").val("");
            },
            error: function(response)
            {
                for (const field in response.responseJSON.errors) {
                    let inputField = $('[name="' + field + '"]');
                    inputField.addClass('is-invalid');
                    inputField.next('.invalid-feedback').text(response.responseJSON.errors[field][0]);
                }
            }
        });
    }
</script>
<?php /**PATH /var/www/html/resources/views/partials/modals/add_member.blade.php ENDPATH**/ ?>