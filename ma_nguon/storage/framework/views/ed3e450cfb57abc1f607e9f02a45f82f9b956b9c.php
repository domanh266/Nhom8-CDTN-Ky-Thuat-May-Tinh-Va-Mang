<?php $__env->startSection('title', 'THÊM HÃNG SẢN XUẤT'); ?>
<?php $__env->startSection('noidung'); ?>
  <?php echo $__env->make('partials.admin-nav1', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <div class="container-fluid">
    <div class="row content">
      <?php echo $__env->make('partials.admin-nav2', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <br>
      <div class="col-sm-9">
        <h3>THÊM HÃNG SẢN XUẤT</h3>
        <hr>
        <?php if(count($errors) > 0): ?>
          <div class="alert alert-warning">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php echo e($err); ?> <br>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        <?php endif; ?>
        <?php if(session('thongbao')): ?>
          <div class="alert alert-success">
            <?php echo e(session('thongbao')); ?>

          </div>
        <?php endif; ?>
        <form action="<?php echo e(route('admin.hang-san-xuat.them-hang-san-xuat')); ?>" method="post">
          <div class="form-group">
            <label for="tenhangsanxuat">Tên hãng sản xuất:</label>
            <input type="text" class="form-control" id="tenhangsanxuat" placeholder="Tên hãng sản xuất" name="ten">
          </div>
          <div class="form-group">
            <label for="gioithieu">Giới thiệu:</label>
            <textarea class="form-control" rows="5" id="mieuta" placeholder="Giới thiệu" name="gioi_thieu"></textarea>
          </div>
          <?php echo e(csrf_field()); ?>

          <button type="submit" class="btn btn-success" name="them">Thêm hãng sản xuất</button>
        </form>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>