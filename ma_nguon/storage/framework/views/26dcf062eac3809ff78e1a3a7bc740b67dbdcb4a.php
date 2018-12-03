<?php $__env->startSection('title', 'THÊM HÃNG SẢN XUẤT'); ?>
<?php $__env->startSection('noidung'); ?>
  <?php echo $__env->make('partials.admin-nav1', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <div class="container-fluid">
    <div class="row content">
      <?php echo $__env->make('partials.admin-nav2', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <br>
      
      <div class="col-sm-9">
        <h3>DANH SÁCH HÃNG SẢN XUẤT</h3>
        <hr>
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
            <tr>
              <td>1</td>
              <td>AVAJAR</td>
              <td><a href="#" class="btn btn-default"><i class='fas fa-pencil-alt'></i> Sửa</a></td>
              <td><a href="#" class="btn btn-default"><i class="fa fa-trash"></i> Xóa</a></td>
            </tr>
            <tr>
              <td>2</td>
              <td>BANILA CO</td>
              <td><a href="#" class="btn btn-default"><i class='fas fa-pencil-alt'></i> Sửa</a></td>
              <td><a href="#" class="btn btn-default"><i class="fa fa-trash"></i> Xóa</a></td>
            </tr>
            <tr>
              <td>3</td>
              <td>CAILYN</td>
              <td><a href="#" class="btn btn-default"><i class='fas fa-pencil-alt'></i> Sửa</a></td>
              <td><a href="#" class="btn btn-default"><i class="fa fa-trash"></i> Xóa</a></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>