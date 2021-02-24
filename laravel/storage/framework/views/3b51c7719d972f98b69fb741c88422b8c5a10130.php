
<?php $__env->startSection('title'); ?>
    Profil
<?php $__env->stopSection(); ?>
<?php $__env->startSection('namehalaman'); ?>
<div class="flex flex-row">
    <i data-feather="search"></i>
    <h2 class="text-lg font-medium mr-auto ml-3"> PROFIL </h2>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="px-2">
  <div class="flex -mx-2">
    <div class="w-1/6 px-2">
    <img src="<?php echo e(asset('dist/images/logo1_profil.png')); ?>">
    </div>
    <div class="w-3/4 px-2">
    <p>Portal e-ppid ini merupakan bagian dari layanan informasi publik yang dilaksanakan oleh PT Pelabuhan Indonesia III (Persero) sesuai dengan Undang-undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik. 
    PT Pelabuhan Indonesia III (Persero) memberikan kesempatan kepada masyarakat untuk mengetahui tentang perusahaan melalui informasi yang kami sediakan maupun melalui permintaan informasi. 

    </p>
    </div>
  </div>
</div>

<div class="px-2 mt-2">
  <div class="flex -mx-2">
    <div class="w-1/6 px-2">
    <img src="<?php echo e(asset('dist/images/logo2_profil.png')); ?>">
    </div>
    <div class="w-3/4 px-2">
    <p class="mt-2">Dukungan masyarakat sangat kami perlukan dalam pelaksanaan Keterbukaan Informasi Publik di lingkungan PT Pelabuhan Indonesia III (Persero). 
    Segala bentuk berkaitan dengan peningkatan layanan berkaitan dengan Keterbukaan Informasi Publik dapat disampaikan kepada PPID Korporat PT Pelabuhan Indonesia III (Persero) melalui saluran berikut:
    </p>
    <p class="mt-2">
    PPID PT Pelabuhan Indonesia III (Persero)
    </p>
    <p class="mt-2">
        Jl. Perak Timur No. 610 
        <br>
        Surabaya 60165 - Indonesia 
        <br>
        Telpon   : +62 31 3298631-37 
        <br>
        Fax       : +62 31 3295207 
        <br>
        Email    : info@pelindo.co.id
    </p>
    </div>
  </div>
</div>







       
   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\plid\laravel\resources\views/profil.blade.php ENDPATH**/ ?>