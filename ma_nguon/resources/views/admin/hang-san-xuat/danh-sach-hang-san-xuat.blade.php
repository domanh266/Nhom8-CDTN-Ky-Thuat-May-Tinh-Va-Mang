@extends('layouts.admin')
@section('title', 'DANH SÁCH HÃNG SẢN XUẤT')
@section('noidung')
  @include('partials.admin-nav1')
  <div class="container-fluid">
    <div class="row content">
      @include('partials.admin-nav2')
      <br>
      
      <div class="col-sm-9">
        <h3>DANH SÁCH HÃNG SẢN XUẤT</h3>
        <hr>
        <form class="form-inline" action="{{ route('admin.hang-san-xuat.danh-sach-hang-san-xuat') }}" method="post" role="search">
          <div class="form-group">
            <label for="ten">Tên:</label>
            <input type="text" class="form-control" name="ten" id="ten" placeholder="Tên">
          </div>
          {{ csrf_field() }}
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
            @foreach($hang_san_xuat as $hsx)
            <tr>
              <td>{{ $hsx->id }}</td>
              <td>{{ $hsx->ten }}</td>
              <td><a href="{{ route('admin.hang-san-xuat.sua-hang-san-xuat', ['id' => $hsx->id]) }}" class="btn btn-default"><i class='fas fa-pencil-alt'></i> Sửa</a></td>
              <td><a href="{{ route('admin.hang-san-xuat.xoa-hang-san-xuat', ['id' => $hsx->id]) }}" class="btn btn-default"><i class="fa fa-trash"></i> Xóa</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection