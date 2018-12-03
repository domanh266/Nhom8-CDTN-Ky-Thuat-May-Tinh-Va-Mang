<?php $__env->startSection('title', 'BẢNG ĐIỀU KHIỂN'); ?>
<?php $__env->startSection('noidung'); ?>
  <?php echo $__env->make('partials.admin-nav1', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <div class="container-fluid">
    <div class="row content">
      <?php echo $__env->make('partials.admin-nav2', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <br>
      
      <div class="col-sm-9">
        <h3>BẢNG ĐIỂU KHIỂN</h3>
        <hr>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>