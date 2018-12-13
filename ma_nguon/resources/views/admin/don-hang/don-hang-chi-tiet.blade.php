@extends('layouts.admin')
@section('title', 'ĐƠN HÀNG CHI TIẾT')
@section('noidung')
  @include('partials.admin-nav1')
  <div class="container-fluid">
    <div class="row content">
      @include('partials.admin-nav2')
      <br>
      <div class="col-sm-9">
        <h3>ĐƠN HÀNG CHI TIẾT</h3>
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
              <th>Sản phẩm</th>
              <th>Giá trị đơn hàng</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{ $don_hang->id }}</td>
              <td>{{ $don_hang->ngay_mua }}</td>
              <td><a href="#">{{ $don_hang->ho_ten_khach_hang }}</a></td>
              <td>
                <br>
                @foreach($don_hang_chi_tiet as $dhct)
                <img class="img-responsive" src="{{ URL::to('/anh/anh-san-pham/'.$dhct->anh) }}" alt="{{ $dhct->ten }}" style="width:15%;">
                <a href="#">{{ $dhct->ten }}</a><br>
                <span class="badge">{{ $dhct->so_luong }}</span>
                <span class="badge">{{ $dhct->gia }} VNĐ</span>
                <hr>
                @endforeach
              </td>
              <td>{{ $don_hang->gia_tri_don_hang }} VNĐ</td>
            </tr>
          </tbody>
        </table>
        @if($don_hang->trang_thai == 0)
        <h3>Duyệt đơn hàng</h3>
        @if(count($errors) > 0)
          <div class="alert alert-warning">
            @foreach($errors->all() as $err)
              {{ $err }} <br>
            @endforeach
          </div>
        @endif
        <hr>
        <form action="{{ route('admin.don-hang.don-hang-chi-tiet', ['id_don_hang' => $don_hang->id]) }}" method="post">
          <div class="form-group">
            <label for="nhanvien">Chọn nhân viên:</label>
            <select class="form-control" id="nhanvien" name="nhan_vien">
              <option value="">Chọn một nhân viên</option>
              @foreach($nhan_vien as $nv)
              <option value="{{ $nv->id }}">{{ $nv->ho_ten }}</option>
              @endforeach
            </select>
          </div>
          {{ csrf_field() }}
          <button type="submit" class="btn btn-success">Duyệt đơn hàng</button>
          <!-- <button type="submit" class="btn btn-danger">Hủy đơn hàng</button> -->
        </form>
        @endif
      </div>
    </div>
  </div>
@endsection