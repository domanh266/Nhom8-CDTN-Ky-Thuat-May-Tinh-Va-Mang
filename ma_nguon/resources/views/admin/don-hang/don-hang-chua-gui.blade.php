@extends('layouts.admin')
@section('title', 'ĐƠN HÀNG CHƯA GỬI')
@section('noidung')
  @include('partials.admin-nav1')
  <div class="container-fluid">
    <div class="row content">
      @include('partials.admin-nav2')
      <br>
      
      <div class="col-sm-9">
        <h3>ĐƠN HÀNG CHƯA GỬI</h3>
        @if(session('thongbao'))
          <div class="alert alert-success">
            {{ session('thongbao') }}
          </div>
        @endif
        <hr>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>ID</th>
              <th>Ngày đặt hàng</th>
              <th>Khách hàng</th>
              <th>Giá trị đơn hàng</th>
              <th>Xem chi tiết</th>
              <th>Báo gửi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($don_hang as $dh)
            <tr>
              <td>{{ $dh->id }}</td>
              <td>{{ $dh->ngay_mua }}</td>
              <td><a href="#">{{ $dh->ho_ten_khach_hang }}</a></td>
              <td>{{ $dh->gia_tri_don_hang }} VNĐ</td>
              <td><i class="fa fa-eye"></i> <a href="{{ route('admin.don-hang.don-hang-chi-tiet', ['id_don_hang' => $dh->id]) }}">Xem chi tiết</a></td>
              <td><a href="{{ route('admin.don-hang.bao-gui', ['id_don_hang' => $dh->id]) }}" class="btn btn-success">Báo gửi</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection