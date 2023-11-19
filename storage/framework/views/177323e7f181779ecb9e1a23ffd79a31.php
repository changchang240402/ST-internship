<style type="text/css">
    .ajax-load {
        background: #e1e1e1;
        padding: 10px 0px;
        width: 100%;
    }
</style>

<div class="tab-pane fade" id="nav-history" role="tabpanel" aria-labelledby="nav-history-tab">
    <div class="card mt-4">
        <div id="history-data" class="vertical-timeline">
            <?php echo $__env->make('history.data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="ajax-load text-center" style="display:none">
            <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading more history</p>
        </div>
    </div>
</div>
<?php /**PATH /var/www/html/resources/views/history/fetch-history.blade.php ENDPATH**/ ?>