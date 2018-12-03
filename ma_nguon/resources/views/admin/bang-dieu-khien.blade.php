@extends('layouts.admin')
@section('title', 'BẢNG ĐIỀU KHIỂN')
@section('noidung')
  @include('partials.admin-nav1')
  <div class="container-fluid">
    <div class="row content">
      @include('partials.admin-nav2')
      <br>
      
      <div class="col-sm-9">
        <h3>BẢNG ĐIỂU KHIỂN</h3>
        <hr>
      </div>
    </div>
  </div>
@endsection