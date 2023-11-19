<?php if(isset($histories)): ?>
    <?php $__currentLoopData = $histories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="timeline-item">
            <div class="row">
                <div class="col-1 line-wrapper">
                    <div class="line"></div>
                </div>
                <div class="col-1 icon-wrapper timeline-content">
                    <div class="icon-container">
                        <?php if(
                            $history->action == config('constants.HISTORY_ACTION.CREATED') ||
                                $history->action == config('constants.HISTORY_ACTION.ADDED')): ?>
                            <i class="fa-solid fa-square-plus"></i>
                        <?php endif; ?>
                        <?php if(
                            $history->action == config('constants.HISTORY_ACTION.DELETED') ||
                                $history->action == config('constants.HISTORY_ACTION.REMOVED')): ?>
                            <i class="fa-solid fa-trash"></i>
                        <?php endif; ?>
                        <?php if($history->action == config('constants.HISTORY_ACTION.CHANGED')): ?>
                            <i class="fa-solid fa-file-pen"></i>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-10 timeline-content">
                    <time><?php echo e($history->created_at); ?></time>
                    <div class="title">
                        <?php if(json_decode($history->target)): ?>
                            <a class="fw-bold" href='<?php echo e('#' . 'collapse' . $history->id); ?>' data-bs-toggle="collapse"
                                role="button" aria-expanded="false"
                                aria-controls="<?php echo e('collapse' . $history->id); ?>"><?php echo e($history->user->display_name); ?></a>
                            has made <strong><?php echo e($history->action); ?></strong> action on the issue <?php echo e($issue_key); ?>

                            <div class="collapse <?php echo e($history->action === config('constants.HISTORY_ACTION.ADDED') || $history->action === config('constants.HISTORY_ACTION.REMOVED') ? 'show' : ''); ?>"
                                id="<?php echo e('collapse' . $history->id); ?>">
                                <?php $__currentLoopData = json_decode($history->target); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $target_key => $target): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(is_string($target_key)): ?>
                                        <?php if(
                                            $history->action == config('constants.HISTORY_ACTION.CREATED') ||
                                                $history->action == config('constants.HISTORY_ACTION.ADDED')): ?>
                                            <i class="fa-solid fa-square-plus"></i>
                                            <?php echo e(config('constants.ISSUE_FIELD.' . $target_key)); ?>

                                            <span class="fw"
                                                style="background-color: #9cffc2"><?php echo e($target); ?></span>
                                        <?php else: ?>
                                            <i class="fa-solid fa-trash"></i>
                                            <?php echo e(config('constants.ISSUE_FIELD.' . $target_key)); ?>

                                            <span class="fw"
                                                style="background-color: #ff9a9a"><?php echo e($target); ?></span>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <div style="margin-left: 15px">
                                            <?php if($history->action == config('constants.HISTORY_ACTION.CREATED')): ?>
                                                <i class="fa-solid fa-square-plus"></i>
                                                <span class="fw"
                                                    style="background-color: #9cffc2"><?php echo e(config('constants.ISSUE_FIELD.' . $target)); ?></span>
                                            <?php elseif($history->action == config('constants.HISTORY_ACTION.CHANGED')): ?>
                                                <i class="fa-solid fa-file-pen"></i>
                                                <span class="fw"
                                                    style="background-color: #f5ff9a"><?php echo e(config('constants.ISSUE_FIELD.' . $target)); ?></span>
                                            <?php else: ?>
                                                <i class="fa-solid fa-trash"></i>
                                                <span class="fw"
                                                    style="background-color: #ff9a9a"><?php echo e(config('constants.ISSUE_FIELD.' . $target)); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php else: ?>
                            <span class="fw-bold"><?php echo e($history->user->display_name); ?></span>
                            <?php echo e($history->action); ?> the <?php echo e(json_decode($history->target)); ?> in
                            <?php echo e($issue_key); ?>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH /var/www/html/resources/views/history/data.blade.php ENDPATH**/ ?>