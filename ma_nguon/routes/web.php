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

/* --- TEST --- */

Route::get('test', function () {
	$gio_hang = session()->get('gio_hang');
	$gio_hang[0] = 0;
	session()->put('gio_hang', $gio_hang);
	echo count(session('gio_hang'));
	session()->flush();
});

/*--- END TEST ---*/


/* --- KHACH HANG --- */

//TRANG CHU
Route::get('/', 'SanPhamController@getTrangChu')->name('trang-chu');
Route::get('trang-chu', 'SanPhamController@getTrangChu')->name('trang-chu');

//DANG KY
Route::get('dang-ky', 'ThanhVienController@getDangKy')->name('dang-ky');

Route::post('dang-ky', 'ThanhVienController@postDangKy')->name('dang-ky');

//DANG NHAP
Route::get('dang-nhap', 'ThanhVienController@getDangNhap')->name('dang-nhap');

Route::post('dang-nhap', 'ThanhVienController@postDangNhap')->name('dang-nhap');

//DANG XUAT
Route::get('dang-xuat', 'ThanhVienController@getDangXuat')->name('dang-xuat');

//THONG TIN CA NHAN
Route::get('thong-tin-ca-nhan', 'ThanhVienController@getThongTinCaNhan')->name('thong-tin-ca-nhan');

Route::post('thong-tin-ca-nhan', 'ThanhVienController@postThongTinCaNhan')->name('thong-tin-ca-nhan');

//LICH SU MUA HANG
Route::get('lich-su-mua-hang', 'ThanhVienController@getLichSuMuaHang')->name('lich-su-mua-hang');

//DOI MAT KHAU
Route::get('doi-mat-khau', 'ThanhVienController@getDoiMatKhau')->name('doi-mat-khau');

Route::post('doi-mat-khau', 'ThanhVienController@postDoiMatKhau')->name('doi-mat-khau');

//SAN PHAM
Route::get('san-pham/{id_loai_san_pham}/{id_kieu_san_pham?}', 'SanPhamController@getSanPham')->name('san-pham');

//SAN PHAM
Route::get('chi-tiet-san-pham/{id}', 'SanPhamController@getChiTietSanPham')->name('chi-tiet-san-pham');

//THEM SAN PHAM VAO GIO HANG
Route::get('them-san-pham-vao-gio-hang/{id}', 'SanPhamController@getThemSanPhamVaoGioHang')->name('them-san-pham-vao-gio-hang');

Route::post('them-san-pham-vao-gio-hang/{id}', 'SanPhamController@postThemSanPhamVaoGioHang')->name('them-san-pham-vao-gio-hang');

//XOA SAN PHAM KHOI GIO HANG
Route::get('xoa-san-pham-khoi-gio-hang/{id}', 'SanPhamController@getXoaSanPhamKhoiGioHang')->name('xoa-san-pham-khoi-gio-hang');

//CAP NHAT GIO HANG
Route::post('cap-nhat-gio-hang', 'SanPhamController@postCapNhatGioHang')->name('cap-nhat-gio-hang');

//GIO HANG
Route::get('gio-hang', 'SanPhamController@getGioHang')->name('gio-hang');

//THANH TOÁN
Route::get('thanh-toan', 'DonHangController@getThanhToan')->name('thanh-toan');

Route::post('thanh-toan', 'DonHangController@postThanhToan')->name('thanh-toan');

//CAM ON
Route::get('cam-on', 'DonHangController@getCamOn')->name('cam-on');

//TIM KIEM
Route::get('tim-kiem', 'SanPhamController@getTimKiem')->name('tim-kiem');

/* --- KET THUC KHACH HANG --- */

/* --- ADMIN --- */
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

	//LOAI SAN PHAM
	Route::group(['prefix' => 'loai-san-pham'], function() {

		Route::get('danh-sach-loai-san-pham', 'LoaiSanPhamController@getDanhSachLoaiSanPham')->name('admin.loai-san-pham.danh-sach-loai-san-pham');

		Route::post('danh-sach-loai-san-pham', 'LoaiSanPhamController@postTimLoaiSanPham')->name('admin.loai-san-pham.danh-sach-loai-san-pham');

		Route::get('them-loai-san-pham', 'LoaiSanPhamController@getThemLoaiSanPham')->name('admin.loai-san-pham.them-loai-san-pham');

		Route::post('them-loai-san-pham', 'LoaiSanPhamController@postThemLoaiSanPham')->name('admin.loai-san-pham.them-loai-san-pham');

		Route::get('sua-loai-san-pham/{id}', 'LoaiSanPhamController@getSuaLoaiSanPham')->name('admin.loai-san-pham.sua-loai-san-pham');

		Route::post('sua-loai-san-pham/{id}', 'LoaiSanPhamController@postSuaLoaiSanPham')->name('admin.loai-san-pham.sua-loai-san-pham');

		Route::get('xoa-loai-san-pham/{id}', 'LoaiSanPhamController@getXoaLoaiSanPham')->name('admin.loai-san-pham.xoa-loai-san-pham');

	});

	//KIEU SAN PHAM
	Route::group(['prefix' => 'kieu-san-pham'], function() {

		Route::get('danh-sach-kieu-san-pham', 'KieuSanPhamController@getDanhSachKieuSanPham')->name('admin.kieu-san-pham.danh-sach-kieu-san-pham');

		Route::post('danh-sach-kieu-san-pham', 'KieuSanPhamController@postTimKieuSanPham')->name('admin.kieu-san-pham.danh-sach-kieu-san-pham');

		Route::get('them-kieu-san-pham', 'KieuSanPhamController@getThemKieuSanPham')->name('admin.kieu-san-pham.them-kieu-san-pham');

		Route::post('them-kieu-san-pham', 'KieuSanPhamController@postThemKieuSanPham')->name('admin.kieu-san-pham.them-kieu-san-pham');

		Route::get('sua-kieu-san-pham/{id}', 'KieuSanPhamController@getSuaKieuSanPham')->name('admin.kieu-san-pham.sua-kieu-san-pham');

		Route::post('sua-kieu-san-pham/{id}', 'KieuSanPhamController@postSuaKieuSanPham')->name('admin.kieu-san-pham.sua-kieu-san-pham');

		Route::get('xoa-kieu-san-pham/{id}', 'KieuSanPhamController@getXoaKieuSanPham')->name('admin.kieu-san-pham.xoa-kieu-san-pham');

	});

	//SAN PHAM
	Route::group(['prefix' => 'san-pham'], function() {

		Route::get('danh-sach-san-pham', 'SanPhamController@getDanhSachSanPham')->name('admin.san-pham.danh-sach-san-pham');

		Route::post('danh-sach-san-pham', 'SanPhamController@postTimSanPham')->name('admin.san-pham.danh-sach-san-pham');

		Route::get('them-san-pham', 'SanPhamController@getThemSanPham')->name('admin.san-pham.them-san-pham');

		Route::post('them-san-pham', 'SanPhamController@postThemSanPham')->name('admin.san-pham.them-san-pham');

		Route::get('sua-san-pham/{id}', 'SanPhamController@getSuaSanPham')->name('admin.san-pham.sua-san-pham');

		Route::post('sua-san-pham/{id}', 'SanPhamController@postSuaSanPham')->name('admin.san-pham.sua-san-pham');

		Route::get('xoa-san-pham/{id}', 'SanPhamController@getXoaSanPham')->name('admin.san-pham.xoa-san-pham');

	});

	//THANH VIEN
	Route::group(['prefix' => 'thanh-vien'], function() {

		Route::get('danh-sach-thanh-vien', 'ThanhVienController@getDanhSachThanhVien')->name('admin.thanh-vien.danh-sach-thanh-vien');

		Route::post('danh-sach-thanh-vien', 'ThanhVienController@postTimThanhVien')->name('admin.thanh-vien.danh-sach-thanh-vien');

		Route::get('them-thanh-vien', 'ThanhVienController@getThemThanhVien')->name('admin.thanh-vien.them-thanh-vien');

		Route::post('them-thanh-vien', 'ThanhVienController@postThemThanhVien')->name('admin.thanh-vien.them-thanh-vien');

		Route::get('sua-thanh-vien/{id}', 'ThanhVienController@getSuaThanhVien')->name('admin.thanh-vien.sua-thanh-vien');

		Route::post('sua-thanh-vien/{id}', 'ThanhVienController@postSuaThanhVien')->name('admin.thanh-vien.sua-thanh-vien');

		Route::get('xoa-thanh-vien/{id}', 'ThanhVienController@getXoaThanhVien')->name('admin.thanh-vien.xoa-thanh-vien');

	});

	//DON HANG
	Route::group(['prefix' => 'don-hang'], function() {

		Route::get('don-hang-chua-duyet', 'DonHangController@getDonHangChuaDuyet')->name('admin.don-hang.don-hang-chua-duyet');
		
		Route::get('don-hang-chi-tiet/{id_don_hang}', 'DonHangController@getDonHangChiTiet')->name('admin.don-hang.don-hang-chi-tiet');

		Route::post('don-hang-chi-tiet/{id_don_hang}', 'DonHangController@postDonHangChiTiet')->name('admin.don-hang.don-hang-chi-tiet');

		Route::get('don-hang-da-duyet', 'DonHangController@getDonHangDaDuyet')->name('admin.don-hang.don-hang-da-duyet');

		Route::get('don-hang-da-duyet', 'DonHangController@getDonHangDaDuyet')->name('admin.don-hang.don-hang-da-duyet');

		Route::get('don-hang-chua-gui', 'DonHangController@getDonHangChuaGui')->name('admin.don-hang.don-hang-chua-gui');

		Route::get('bao-gui/{id_don_hang}', 'DonHangController@getBaoGui')->name('admin.don-hang.bao-gui');

		Route::get('don-hang-da-gui', 'DonHangController@getDonHangDaGui')->name('admin.don-hang.don-hang-da-gui');

		Route::get('xac-nhan-don-hang-thanh-cong/{id_don_hang}', 'DonHangController@getXacNhanDonHangThanhCong')->name('admin.don-hang.xac-nhan-don-hang-thanh-cong');

		Route::get('xac-nhan-don-hang-that-bai/{id_don_hang}', 'DonHangController@getXacNhanDonHangThatBai')->name('admin.don-hang.xac-nhan-don-hang-that-bai');

		Route::get('don-hang-thanh-cong', 'DonHangController@getDonHangThanhCong')->name('admin.don-hang.don-hang-thanh-cong');

		Route::get('don-hang-that-bai', 'DonHangController@getDonHangThatBai')->name('admin.don-hang.don-hang-that-bai');
	});

});

/* --- KET THUC ADMIN --- */
