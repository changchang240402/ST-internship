<?php $__currentLoopData = config('constants.ISSUE_STATUS'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status => $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="card me-3" data-status="<?php echo e($key); ?>">
        <!-- Issues List Header -->
        <div class="p-2 border position-relative issues-list-header">
            <span class="text-uppercase column-title"><?php echo e($status); ?></span>
        </div>
        <div class="dropdown btn-ellipsis mt-2">
            <button class="btn btn-light btn-sm" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-ellipsis"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </div>
        <div class="card-body <?php if(in_array($key, config('constants.ALLOW_ISSUE_STATUS'))): ?> sortable connectedSortable <?php endif; ?>">
            <?php $__currentLoopData = $issues[$key]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $issue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="issue-wrapper shadow-sm border" data-issuekey="<?php echo e($issue->issue_key); ?>">
                    <div class="dropdown btn-ellipsis">
                        <button class="btn btn-light btn-sm" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-ellipsis"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>

                    <textarea class="form-control issue-form-editing p-0 mb-1" disabled spellcheck="false"><?php echo e($issue->title); ?></textarea>

                    <img src="<?php echo e(asset('assets/task.svg')); ?>">
                    <small
                        <?php if($key == config('constants.ISSUE_STATUS')['DONE']): ?> style="text-decoration: line-through" <?php endif; ?>><?php echo e($issue->issue_key); ?></small>

                    <?php if($issue->assignee): ?>
                        <div class="img-issue-assign" data-bs-toggle="tooltip" data-bs-placement="bottom"
                            data-bs-title="<?php echo e('Assignee: ' . $issue->assignee->display_name); ?>">
                            <img src="<?php echo e($issue->assignee->photo_path); ?>" width="29">
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php if(session('role') != config('constants.ROLES')['MEMBER']): ?>
                <div class="position-absolute w-100 mt-2 undraggable">
                    <a class="btn btn-light btn-sm create-button create-issue" data-status="<?php echo e($key); ?>"
                        data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight">
                        <i class="fa-solid fa-plus"></i>
                        Create issues
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /var/www/html/resources/views/user/data.blade.php ENDPATH**/ ?>