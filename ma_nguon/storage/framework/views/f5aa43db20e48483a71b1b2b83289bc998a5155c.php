<?php $__env->startSection('title', 'DANH SÁCH HÃNG SẢN XUẤT'); ?>
<?php $__env->startSection('noidung'); ?>
  <?php echo $__env->make('partials.admin-nav1', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <div class="container-fluid">
    <div class="row content">
      <?php echo $__env->make('partials.admin-nav2', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <br>
      
      <div class="col-sm-9">
        <h3>DANH SÁCH HÃNG SẢN XUẤT</h3>
        <hr>
        <form class="form-inline" action="<?php echo e(route('admin.hang-san-xuat.danh-sach-hang-san-xuat')); ?>" method="post" role="search">
          <div class="form-group">
            <label for="ten">Tên:</label>
            <input type="text" class="form-control" name="ten" id="ten" placeholder="Tên">
          </div>
          <?php echo e(csrf_field()); ?>

          <button type="submit" class="btn btn-primary" name="tim_kiem">Tìm kiếm</button>
        </form>
        <br>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>ID</th>
              <th>Tên hãng sản xuất</th>
              <th>Sửa</th>
              <th>Xóa</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $hang_san_xuat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hsx): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($hsx->id); ?></td>
              <td><?php echo e($hsx->ten); ?></td>
              <td><a href="<?php echo e(route('admin.hang-san-xuat.sua-hang-san-xuat', ['id' => $hsx->id])); ?>" class="btn btn-default"><i class='fas fa-pencil-alt'></i> Sửa</a></td>
              <td><a href="<?php echo e(route('admin.hang-san-xuat.xoa-hang-san-xuat', ['id' => $hsx->id])); ?>" class="btn btn-default"><i class="fa fa-trash"></i> Xóa</a></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>