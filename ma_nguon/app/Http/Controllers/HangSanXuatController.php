<?php

namespace App\Http\Controllers;

use App\HangSanXuat;
use Illuminate\Http\Request;

class HangSanXuatController extends Controller
{
    public function getThemHangSanXuat()
    {
        return view('admin/hang-san-xuat/them-hang-san-xuat');
    }

    public function postThemHangSanXuat(Request $request) 
    {
    	$this->validate($request, 
            [
                'ten' => 'required|unique:hang_san_xuat,ten|min:2|max:100'
            ], 
            [
                'ten.required'=>'Chưa nhập tên hãng sản xuất!',
                'ten.unique'=>'Hãng sản xuất đã tồn tại!',
                'ten.min'=>'Tên hãng sản xuất phải từ 3 đến 100 ký tự!',
                'ten.max'=>'Tên hãng sản xuất phải từ 3 đến 100 ký tự'
            ]
        );
    	$hang_san_xuat = new HangSanXuat;
    	$hang_san_xuat->ten = $request->ten;
        $hang_san_xuat->gioi_thieu = $request->gioi_thieu;
    	$hang_san_xuat->save();

    	return redirect('admin/hang-san-xuat/them-hang-san-xuat')->with('thongbao', 'Thêm thành công!');
    }


    public function getDanhSachHangSanXuat()
    {
        $hang_san_xuat = HangSanXuat::paginate(10);
        return view('admin.hang-san-xuat.danh-sach-hang-san-xuat', ['hang_san_xuat' => $hang_san_xuat]);
    }
    

    public function postTimHangSanXuat(Request $request)
    {
        $ten = $request->ten;

        $hang_san_xuat = HangSanXuat::where('ten', 'like', "%$ten%")->paginate(10);

        return view('admin.hang-san-xuat.danh-sach-hang-san-xuat', ['hang_san_xuat' => $hang_san_xuat]);
    }

    public function getSuaHangSanXuat($id)
    {
        $hang_san_xuat = HangSanXuat::find($id);
        return view('admin.hang-san-xuat.sua-hang-san-xuat', ['hang_san_xuat' => $hang_san_xuat]);
    }

    public function postSuaHangSanXuat(Request $request, $id)
    {
        $hang_san_xuat = HangSanXuat::find($id);
        $this->validate($request, 
            [
                'ten' => 'required|min:2|max:100'
            ], 
            [
                'ten.required'=>'Chưa nhập tên hãng sản xuất!',
                'ten.min'=>'Tên hãng sản xuất phải từ 3 đến 100 ký tự!',
                'ten.max'=>'Tên hãng sản xuất phải từ 3 đến 100 ký tự'
            ]
        );

        $hang_san_xuat->ten = $request->ten;
        $hang_san_xuat->gioi_thieu = $request->gioi_thieu;
        $hang_san_xuat->save();

        return redirect('admin/hang-san-xuat/sua-hang-san-xuat/'.$id)->with('thongbao', 'Sửa thành công!');
    }

    public function getXoaHangSanXuat($id)
    {
        $hang_san_xuat = HangSanXuat::find($id);
        $hang_san_xuat->delete();
        return redirect('admin/hang-san-xuat/danh-sach-hang-san-xuat/')->with('thongbao', 'Xóa thành công!');
    }
       
}
