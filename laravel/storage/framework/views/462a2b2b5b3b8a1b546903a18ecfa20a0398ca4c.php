
<?php $__env->startSection('namehalaman'); ?>
<div class="flex flex-row">
    <i data-feather="search"></i>
    <h2 class="text-lg font-medium mr-auto ml-3">
        MAKLUMAT
    </h2>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<h6 class="text-sm hidden sm:visible md:invisible lg:invisible xl:invisible 2xl:invisible text-red-500 font-bold">
    *Geser ke kanan untuk mengunduh atau melihat dokumen.
</h6>
<br>
<img href="#" src="<?php echo e(asset('dist/images/maklumat.png')); ?>">
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\plid\laravel\resources\views/maklumat.blade.php ENDPATH**/ ?>