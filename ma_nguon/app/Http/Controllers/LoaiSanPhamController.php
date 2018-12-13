<?php

namespace App\Http\Controllers;

use App\LoaiSanPham;
use Illuminate\Http\Request;

class LoaiSanPhamController extends Controller
{
    public function getThemLoaiSanPham()
    {
        if(session('kieu_thanh_vien') != 1)
            return abort(404);

        return view('admin/loai-san-pham/them-loai-san-pham');
    }

    public function postThemLoaiSanPham(Request $request) 
    {
    	$this->validate($request, 
            [
                'ten' => 'required|unique:loai_san_pham,ten|min:2|max:100'
            ], 
            [
                'ten.required'=>'Chưa nhập tên loại sản phẩm!',
                'ten.unique'=>'Loại sản phẩm đã tồn tại!',
                'ten.min'=>'Tên loại sản phẩm phải từ 3 đến 100 ký tự!',
                'ten.max'=>'Tên loại sản phẩm phải từ 3 đến 100 ký tự'
            ]
        );
    	$loai_san_pham = new LoaiSanPham;
    	$loai_san_pham->ten = $request->ten;
    	$loai_san_pham->save();

    	return redirect('admin/loai-san-pham/them-loai-san-pham')->with('thongbao', 'Thêm thành công!');
    }

    public function getDanhSachLoaiSanPham()
    {
        if(session('kieu_thanh_vien') != 1)
            return abort(404);

        $loai_san_pham = LoaiSanPham::paginate(10);
        return view('admin.loai-san-pham.danh-sach-loai-san-pham', ['loai_san_pham' => $loai_san_pham]);
    }

    public function postTimLoaiSanPham(Request $request)
    {
        $ten = $request->ten;

        $loai_san_pham = LoaiSanPham::where('ten', 'like', "%$ten%")->paginate(10);

        return view('admin.loai-san-pham.danh-sach-loai-san-pham', ['loai_san_pham' => $loai_san_pham]);
    }

    public function getSuaLoaiSanPham($id)
    {
        if(session('kieu_thanh_vien') != 1)
            return abort(404);

        $loai_san_pham = LoaiSanPham::find($id);
        return view('admin.loai-san-pham.sua-loai-san-pham', ['loai_san_pham' => $loai_san_pham]);
    }

    public function postSuaLoaiSanPham(Request $request, $id)
    {
        $loai_san_pham = LoaiSanPham::find($id);
        $this->validate($request, 
            [
                'ten' => 'required|min:2|max:100'
            ], 
            [
                'ten.required'=>'Chưa nhập tên loại sản phẩm!',
                'ten.min'=>'Tên loại sản phẩm phải từ 3 đến 100 ký tự!',
                'ten.max'=>'Tên loại sản phẩm phải từ 3 đến 100 ký tự!'
            ]
        );

        $loai_san_pham->ten = $request->ten;
        $loai_san_pham->save();

        return redirect('admin/loai-san-pham/sua-loai-san-pham/'.$id)->with('thongbao', 'Sửa thành công!');
    }

    public function getXoaLoaiSanPham($id)
    {
        if(session('kieu_thanh_vien') != 1)
            return abort(404);
        
        $loai_san_pham = LoaiSanPham::find($id);
        $loai_san_pham->delete();
        return redirect('admin/loai-san-pham/danh-sach-loai-san-pham/')->with('thongbao', 'Xóa thành công!');
    }
       
}
