<?php $__env->startSection('content'); ?>
<div class="container">
    <select class="selectpicker" data-width="100%" aria-label="None" id="milestone" name="milestone">
        <option value="">Select Milestone</option>
        <?php for($i = 1; $i <= 15; $i++): ?>
            <option value="<?php echo e($i); ?>"><?php echo e('Sprint ' . $i); ?></option>
        <?php endfor; ?>
    </select>

    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
</div>

<script type="module">
    $("#milestone").selectpicker('val', '<?php echo e(request()->milestone); ?>');
    $('#milestone').on('change', function() {
        let url = "<?php echo e(route('chart.burndown', ['key' => request()->key, 'milestone' => "MILESTONE"])); ?>";
        window.location.replace(url.replace("MILESTONE", $(this).val()));
    });

    var data = <?php echo json_encode($burnDownChartData->toArray(), 15, 512) ?>;
    console.log(data);
    $(function () {
        $('#container').highcharts({
            title: {
                text: 'Burndown Chart',
                x: -20 //center
            },
            colors: ['blue', 'red'],
            plotOptions: {
            line: {
                lineWidth: 3
            },
            tooltip: {
                hideDelay: 200
            }
            },
            subtitle: {
                text: 'Sprint <?php echo e(request()->milestone); ?>',
                x: -20
            },
            xAxis: {
                categories: data.map(a => a.completion_date)
            },
            yAxis: {
                title: {
                    text: 'Hours'
                },
                plotLines: [{
                    value: 0,
                    width: 1
                }]
            },
            tooltip: {
                valueSuffix: ' hrs',
                crosshairs: true,
                shared: true
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: 'Ideal Burn',
                color: 'rgba(255,0,0,0.25)',
                lineWidth: 2,
                data: data.map(a => parseInt(a.ideal_remaining_hours))
            }, {
                name: 'Remaining Burn',
                color: 'rgba(0,120,200,0.75)',
                marker: {
                    radius: 6
                },
                data: data.map(a => parseInt(a.remaining_estimated_hours))
            }]
        });
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/charts/burndown.blade.php ENDPATH**/ ?>