<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//ADMIN
Route::group(['prefix' => 'admin'], function() {

	//BANG DIEU KHIEN	
	Route::get('', function () {
	    return view('admin.bang-dieu-khien');
	})->name('admin.bang-dieu-khien');

	//HANG SAN XUAT
	Route::group(['prefix' => 'hang-san-xuat'], function() {

		Route::get('danh-sach-hang-san-xuat', 'HangSanXuatController@getDanhSachHangSanXuat')->name('admin.hang-san-xuat.danh-sach-hang-san-xuat');

		Route::post('danh-sach-hang-san-xuat', 'HangSanXuatController@postTimHangSanXuat')->name('admin.hang-san-xuat.danh-sach-hang-san-xuat');

		Route::get('them-hang-san-xuat', 'HangSanXuatController@getThemHangSanXuat')->name('admin.hang-san-xuat.them-hang-san-xuat');

		Route::post('them-hang-san-xuat', 'HangSanXuatController@postThemHangSanXuat')->name('admin.hang-san-xuat.them-hang-san-xuat');

		Route::get('sua-hang-san-xuat/{id}', 'HangSanXuatController@getSuaHangSanXuat')->name('admin.hang-san-xuat.sua-hang-san-xuat');

		Route::post('sua-hang-san-xuat/{id}', 'HangSanXuatController@postSuaHangSanXuat')->name('admin.hang-san-xuat.sua-hang-san-xuat');

		Route::get('xoa-hang-san-xuat/{id}', 'HangSanXuatController@getXoaHangSanXuat')->name('admin.hang-san-xuat.xoa-hang-san-xuat');

	});


});
