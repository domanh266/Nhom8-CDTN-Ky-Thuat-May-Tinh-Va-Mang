<div class="col-sm-3 sidenav hidden-xs">
  <br><a href="#"><img class="img-responsive" src="<?php echo e(URL::to('/anh/anh-website/logo.png')); ?>" alt="Logo" style="margin: auto;"></a><br>
  <div class="text-center">
    <img src="<?php echo e(URL::to('/anh/anh-thanh-vien/img_avatar1.png')); ?>" class="img-responsive img-circle" alt="anh dai dien" style="width:40%; margin:auto;"><br>
    <i class="fa fa-user"></i> Hi, <a href="#" style="color:#000000;">domanh266 <i class="fa fa-cog"></i></a>
  </div>
  <br>
  <ul class="nav nav-pills nav-stacked">
    <li><a href="#"><i class='fas fa-chart-line'></i> Bảng điều khiển</a></li>
    <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-book"></i> Đơn hàng
      <span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="#">Đơn hàng chưa duyệt</a></li>
        <li><a href="#">Đơn hàng đã duyệt</a></li>
        <li><a href="#">Đơn hàng thành công</a></li>
        <li><a href="#">Đơn hàng thất bại</a></li>
      </ul>
    </li>
    <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-lightbulb-o"></i></i> Hãng sản xuất
      <span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="<?php echo e(route('admin.hang-san-xuat.danh-sach-hang-san-xuat')); ?>">Danh sách hãng sản xuất</a></li>
        <li><a href="<?php echo e(route('admin.hang-san-xuat.them-hang-san-xuat')); ?>">Thêm hãng sản xuất</a></li>
      </ul>
    </li>
    <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-th"></i> Loại sản phẩm
      <span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="#">Danh sách loại sản phẩm</a></li>
        <li><a href="#">Thêm Loại sản phẩm</a></li>
      </ul>
    </li>
    <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class='fas fa-code-branch'></i> Kiểu sản phẩm
      <span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="#">Danh sách kiểu sản phẩm</a></li>
        <li><a href="#">Thêm kiểu sản phẩm</a></li>
      </ul>
    </li>
    <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class='fab fa-dropbox'></i> Sản phẩm
      <span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="#">Danh sách sản phẩm</a></li>
        <li><a href="#">Thêm sản phẩm</a></li>
      </ul>
    </li>
    <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user"></i> Thành viên
      <span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="#">Danh sách thành viên</a></li>
        <li><a href="#">Thêm thành viên</a></li>
      </ul>
    </li>
  </ul><br>
</div>