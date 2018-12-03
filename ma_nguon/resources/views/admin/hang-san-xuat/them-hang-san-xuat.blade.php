@extends('layouts.admin')
@section('title', 'THÊM HÃNG SẢN XUẤT')
@section('noidung')
  @include('partials.admin-nav1')
  <div class="container-fluid">
    <div class="row content">
      @include('partials.admin-nav2')
      <br>
      <div class="col-sm-9">
        <h3>THÊM HÃNG SẢN XUẤT</h3>
        <hr>
        @if(count($errors) > 0)
          <div class="alert alert-warning">
            @foreach($errors->all() as $err)
              {{ $err }} <br>
            @endforeach
          </div>
        @endif
        @if(session('thongbao'))
          <div class="alert alert-success">
            {{ session('thongbao') }}
          </div>
        @endif
        <form action="{{ route('admin.hang-san-xuat.them-hang-san-xuat') }}" method="post">
          <div class="form-group">
            <label for="tenhangsanxuat">Tên hãng sản xuất:</label>
            <input type="text" class="form-control" id="tenhangsanxuat" placeholder="Tên hãng sản xuất" name="ten">
          </div>
          <div class="form-group">
            <label for="gioithieu">Giới thiệu:</label>
            <textarea class="form-control" rows="5" id="mieuta" placeholder="Giới thiệu" name="gioi_thieu"></textarea>
          </div>
          {{ csrf_field() }}
          <button type="submit" class="btn btn-success" name="them">Thêm hãng sản xuất</button>
        </form>
      </div>
    </div>
  </div>
@endsection