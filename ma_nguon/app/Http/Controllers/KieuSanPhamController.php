<?php

namespace App\Http\Controllers;

use App\KieuSanPham;
use App\LoaiSanPham;
use Illuminate\Http\Request;

class KieuSanPhamController extends Controller
{
    public function getThemKieuSanPham()
    {
        if(session('kieu_thanh_vien') != 1)
            return abort(404);

        $loai_san_pham = LoaiSanPham::all();
        return view('admin/kieu-san-pham/them-kieu-san-pham', ['loai_san_pham' => $loai_san_pham]);
    }

    public function postThemKieuSanPham(Request $request) 
    {
    	$this->validate($request, 
            [
                'ten' => 'required|unique:kieu_san_pham,ten|min:2|max:100',
                'loai_san_pham' => 'required'
            ], 
            [
                'ten.required'=>'Chưa nhập tên kiểu sản phẩm!',
                'ten.unique'=>'Kiểu sản phẩm đã tồn tại!',
                'ten.min'=>'Tên kiểu sản phẩm phải từ 3 đến 100 ký tự!',
                'ten.max'=>'Tên kiểu sản phẩm phải từ 3 đến 100 ký tự!',
                'loai_san_pham.required'=>'Chưa chọn tên loại sản phẩm!'
            ]
        );
    	$kieu_san_pham = new KieuSanPham;
    	$kieu_san_pham->id_loai_san_pham = $request->loai_san_pham;
        $kieu_san_pham->ten = $request->ten;
    	$kieu_san_pham->save();

    	return redirect('admin/kieu-san-pham/them-kieu-san-pham')->with('thongbao', 'Thêm thành công!');
    }

    public function getDanhSachKieuSanPham()
    {
        if(session('kieu_thanh_vien') != 1)
            return abort(404);

        $kieu_san_pham = KieuSanPham::layDanhSachKieuSanPham();
        return view('admin.kieu-san-pham.danh-sach-kieu-san-pham', ['kieu_san_pham' => $kieu_san_pham]);
    }


    public function postTimKieuSanPham(Request $request)
    {
        $ten = $request->ten;

        $kieu_san_pham = KieuSanPham::timKieuSanPham($ten);

        return view('admin.kieu-san-pham.danh-sach-kieu-san-pham', ['kieu_san_pham' => $kieu_san_pham]);
    }

    public function getSuaKieuSanPham($id)
    {
        if(session('kieu_thanh_vien') != 1)
            return abort(404);

        $kieu_san_pham = KieuSanPham::find($id);
        $loai_san_pham = LoaiSanPham::all();
        return view('admin.kieu-san-pham.sua-kieu-san-pham', ['kieu_san_pham' => $kieu_san_pham], ['loai_san_pham' => $loai_san_pham]);
    }

    public function postSuaKieuSanPham(Request $request, $id)
    {
        $kieu_san_pham = KieuSanPham::find($id);
        $this->validate($request, 
            [
                'ten' => 'required|min:2|max:100',
                'loai_san_pham' => 'required'
            ], 
            [
                'ten.required'=>'Chưa nhập tên kiểu sản phẩm!',
                'ten.min'=>'Tên kiểu sản phẩm phải từ 3 đến 100 ký tự!',
                'ten.max'=>'Tên kiểu sản phẩm phải từ 3 đến 100 ký tự!',
                'loai_san_pham.required'=>'Chưa chọn tên loại sản phẩm!'
            ]
        );

        $kieu_san_pham->id_loai_san_pham = $request->loai_san_pham;
        $kieu_san_pham->ten = $request->ten;
        $kieu_san_pham->save();

        return redirect('admin/kieu-san-pham/sua-kieu-san-pham/'.$id)->with('thongbao', 'Sửa thành công!');
    }

    public function getXoaKieuSanPham($id)
    {
        if(session('kieu_thanh_vien') != 1)
            return abort(404);

        $kieu_san_pham = KieuSanPham::find($id);
        $kieu_san_pham->delete();
        return redirect('admin/kieu-san-pham/danh-sach-kieu-san-pham/')->with('thongbao', 'Xóa thành công!');
    }

}
