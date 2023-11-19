<div class="mb-5">
    <div>
        <!-- text -->
        <h4 class="mb-3 mb-md-0">Attachments</h4>
    </div>
    <div class="table-responsive">
        <table class="table mb-0 text-nowrap table-centered table-hover">
            <thead class="table-light">
                <tr>
                    <th>Filename</th>
                    <th>Date added</th>
                    <th>Action</th>
                </tr>
            </thead>
            <!-- tbody -->
            <tbody id="attachment-data">
                <?php echo $__env->make('attachment.data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <tr>
                    <td colspan="3">
                        <input type="file" name="file" id="file" class="filepond">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="deleteAttachmentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete database</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Will you definitely delete this attachment?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <form id="deleteAttachmentForm"
                    action="<?php echo e(route('attachments.delete', ['key' => request()->key, 'issue_key' => $issue->issue_key, 'id' => 'ATTACHMENT_ID'])); ?>"
                    method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" data-bs-dismiss="modal" class="btn btn-primary">Remove</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="module">
</script>
<?php /**PATH /var/www/html/resources/views/attachment/fetch-attachment.blade.php ENDPATH**/ ?>