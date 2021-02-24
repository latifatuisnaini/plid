
<?php $__env->startSection('namehalaman'); ?>
    <h2 class="text-lg font-medium mr-auto">
        Agenda
    </h2>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('dist/calendar/lib/main.css')); ?>" rel='stylesheet' />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="overflow-x-auto">

        <div id='calendar'></div>
  
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('dist/calendar/lib/main.js')); ?>"></script>
<script>
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth'
    });
    calendar.render();
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth'
        });
        calendar.render();
    });

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\plid\laravel\resources\views/agenda.blade.php ENDPATH**/ ?>