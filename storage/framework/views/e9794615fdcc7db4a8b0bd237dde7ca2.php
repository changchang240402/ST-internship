<?php $__env->startSection('content'); ?>
<div class="card">
    <h5 class="card-header">List Categories</h5>
    <div class="col-12 text-end">
        <a class="btn bg-gradient-dark mb-0" href="<?php echo e(route('comments.create', ['key'=>$project->key, 'issue_key'=>$issue->key])); ?>"><i
                class="btn rounded-pill btn-outline-info">&nbsp;&nbsp;Add New</i></a>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/projects/index.blade.php ENDPATH**/ ?>