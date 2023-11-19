<?php if(isset($attachments)): ?>
    <?php $__currentLoopData = $attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attachment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="attachment-row">
            <td><a class="view-attachment" href="VIEW_URL" data-id="<?php echo e($attachment['id']); ?>"><?php echo e($attachment['name']); ?></a></td>
            <td><?php echo e($attachment['created_at']); ?></td>
            <td>
                <i class="bi bi-eye-fill"></i>
                <i class="bi bi-cloud-arrow-down-fill download-attachment" data-id="<?php echo e($attachment['id']); ?>"></i>
                <i id="confirm-delete" class="bi bi-trash-fill delete-attachment"
                    data-bs-toggle="modal"
                    data-bs-target="#deleteAttachmentModal"
                    data-id="<?php echo e($attachment['id']); ?>"></i>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH /var/www/html/resources/views/attachment/data.blade.php ENDPATH**/ ?>