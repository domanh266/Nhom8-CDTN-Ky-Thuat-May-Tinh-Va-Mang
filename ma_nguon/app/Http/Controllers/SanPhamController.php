<?php

namespace App\Http\Controllers;

use App\SanPham;
use App\KieuSanPham;
use App\LoaiSanPham;
use App\HangSanXuat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;

class SanPhamController extends Controller
{
    // KHACH HANG
    public function getTrangChu()
    {
        
        $loai_san_pham = LoaiSanPham::All();
        $san_pham_theo_loai = array();
        foreach($loai_san_pham as $lsp) 
            $san_pham_theo_loai[$lsp->id] = SanPham::laySanPhamTheoLoai($lsp->id);   
        return view('trang-chu', ['loai_san_pham' => $loai_san_pham ,'san_pham_theo_loai' => $san_pham_theo_loai]);
    }

    public function getSanPham($id_loai_san_pham, $id_kieu_san_pham=null)
    {
        if($id_kieu_san_pham != null) {
            $loai_san_pham = LoaiSanPham::find($id_loai_san_pham);
            $kieu_san_pham_theo_loai = KieuSanPham::where('id_loai_san_pham', '=', $id_loai_san_pham)->get();
            $kieu_san_pham = KieuSanPham::find($id_kieu_san_pham);
            $danh_sach_san_pham = SanPham::laySanPhamTheoKieu($id_kieu_san_pham); 
            return view('san-pham', ['loai_san_pham' => $loai_san_pham, 'kieu_san_pham_theo_loai' => $kieu_san_pham_theo_loai, 'kieu_san_pham' => $kieu_san_pham, 'danh_sach_san_pham' => $danh_sach_san_pham]);
        } else {
            $loai_san_pham = LoaiSanPham::find($id_loai_san_pham);
            $kieu_san_pham_theo_loai = KieuSanPham::where('id_loai_san_pham', '=', $id_loai_san_pham)->get();
            $danh_sach_san_pham = SanPham::laySanPhamTheoLoai($id_loai_san_pham); 
            return view('san-pham', ['loai_san_pham' => $loai_san_pham, 'kieu_san_pham_theo_loai' => $kieu_san_pham_theo_loai, 'danh_sach_san_pham' => $danh_sach_san_pham]);
        }
    }

    public function getChiTietSanPham($id)
    {

        $san_pham = SanPham::layChiTietSanPham($id);
        return view('chi-tiet-san-pham', ['san_pham' => $san_pham]);
    }

    public function getThemSanPhamVaoGioHang($id)
    {
        $san_pham = SanPham::find($id);
        $gio_hang = session()->get('gio_hang');
        $gio_hang[$san_pham->id] = array(
            "id" => $san_pham->id,
            "ten" => $san_pham->ten,
            "gia" => $san_pham->gia,
            "anh" => $san_pham->anh,
            "so_luong" => 1,
        );
        session()->put('gio_hang', $gio_hang);
        return redirect()->back();
    }

    public function postThemSanPhamVaoGioHang($id, Request $request)
    {
        $san_pham = SanPham::find($id);
        $gio_hang = session()->get('gio_hang');
        $gio_hang[$san_pham->id] = array(
            "id" => $san_pham->id,
            "ten" => $san_pham->ten,
            "gia" => $san_pham->gia,
            "anh" => $san_pham->anh,
            "so_luong" => $request->so_luong,
        );
        session()->put('gio_hang', $gio_hang);
        return redirect('gio-hang');
    }

    public function getXoaSanPhamKhoiGioHang($id)
    {
        $gio_hang = session()->get('gio_hang');
        unset($gio_hang[$id]);
        session()->put('gio_hang', $gio_hang);
        return redirect()->back();
    }

    public function postCapNhatGioHang(Request $request)
    {
        $gio_hang = session()->get('gio_hang');
        foreach($gio_hang as $gh) {
            $id = $gh['id'];
            $name = 'so_luong_'.$id;
            $gio_hang[$id]['so_luong'] = $request->$name;
        }
        session()->put('gio_hang', $gio_hang);
        return redirect()->back();
        //return view('gio-hang');
    }

    public function getGioHang()
    {
        return view('gio-hang');
    }

    public function getTimKiem(Request $request)
    {
        $tu_khoa = $request->tu_khoa;
        $danh_sach_san_pham = SanPham::timKiemSanPham($tu_khoa);
        return view('tim-kiem', ['danh_sach_san_pham' => $danh_sach_san_pham, 'tu_khoa' => $tu_khoa]);
    }

    // ADMIN
    public function getThemSanPham()
    {
        if(session('kieu_thanh_vien') != 1)
            return abort(404);

        $kieu_san_pham = KieuSanPham::all();
        $hang_san_xuat = HangSanXuat::layDanhSachHangSanXuat();
        return view('admin/san-pham/them-san-pham', ['kieu_san_pham' => $kieu_san_pham], ['hang_san_xuat' => $hang_san_xuat]);
    }
    
    public function postThemSanPham(Request $request) 
    {
    	$this->validate($request, 
            [
                'ten' => 'required|unique:kieu_san_pham,ten|min:2|max:100',
                'kieu_san_pham' => 'required',
                'hang_san_xuat' => 'required',
                'anh' => 'required',
                'gia' => 'required|numeric',
                'so_luong' => 'required|numeric',
            ], 
            [
                'ten.required'=>'Chưa nhập tên sản phẩm!',
                'ten.unique'=>'Kiểu sản phẩm đã tồn tại!',
                'ten.min'=>'Tên sản phẩm phải từ 3 đến 100 ký tự!',
                'ten.max'=>'Tên sản phẩm phải từ 3 đến 100 ký tự!',
                'kieu_san_pham.required'=>'Chưa chọn tên kiểu sản phẩm!',
                'hang_san_xuat.required'=>'Chưa chọn tên hãng sản xuất!',
                'anh.required'=>'Chưa chọn ảnh sản phẩm!',
                'gia.required'=>'Chưa nhập giá sản phẩm!',
                'gia.numeric'=>'Giá sản phẩm phải là số!',
                'so_luong.required'=>'Chưa nhập số lượng sản phẩm!',
                'so_luong.numeric'=>'Số lượng sản phẩm phải là số!',
            ]
        );
        $san_pham = new SanPham;
        $san_pham->id_kieu_san_pham = $request->kieu_san_pham;
        $san_pham->id_hang_san_xuat = $request->hang_san_xuat;
        $san_pham->ten = $request->ten;
        $file = $request->file('anh');
        $file_name = $file->getClientOriginalName('anh');
        $file->move('anh/anh-san-pham', $file_name);
        $san_pham->anh = $file_name;
        $san_pham->gia = $request->gia;
        $san_pham->so_luong = $request->so_luong;
        $san_pham->can_nang = $request->can_nang;
        $san_pham->thoi_gian_bao_hanh = $request->thoi_gian_bao_hanh;
        $san_pham->mieu_ta = $request->mieu_ta;
        $san_pham->thanh_phan = $request->thanh_phan;
        $san_pham->video_huong_dan = $request->video_huong_dan;
        $san_pham->save();
    	return redirect('admin/san-pham/them-san-pham')->with('thongbao', 'Thêm thành công!');
    }

    public function getDanhSachSanPham()
    {
        if(session('kieu_thanh_vien') != 1)
            return abort(404);

        $san_pham = SanPham::layDanhSachSanPham();
        return view('admin.san-pham.danh-sach-san-pham', ['san_pham' => $san_pham]);
    }
    
    public function postTimSanPham(Request $request)
    {
        $ten = $request->ten;
        $san_pham = SanPham::timSanPham($ten);
        return view('admin.san-pham.danh-sach-san-pham', ['san_pham' => $san_pham]);
    }
    
    public function getSuaSanPham($id)
    {
        if(session('kieu_thanh_vien') != 1)
            return abort(404);

        $san_pham = SanPham::find($id);
        $kieu_san_pham = KieuSanPham::all();
        $hang_san_xuat = HangSanXuat::all();
        return view('admin.san-pham.sua-san-pham', ['san_pham' => $san_pham, 'kieu_san_pham' => $kieu_san_pham, 'hang_san_xuat' => $hang_san_xuat]);
    }

    public function postSuaSanPham(Request $request, $id)
    {
        $this->validate($request, 
            [
                'ten' => 'required|min:2|max:100',
                'kieu_san_pham' => 'required',
                'hang_san_xuat' => 'required',
                'gia' => 'required|numeric',
                'so_luong' => 'required|numeric',
            ], 
            [
                'ten.required'=>'Chưa nhập tên sản phẩm!',
                'ten.min'=>'Tên sản phẩm phải từ 3 đến 100 ký tự!',
                'ten.max'=>'Tên sản phẩm phải từ 3 đến 100 ký tự!',
                'kieu_san_pham.required'=>'Chưa chọn tên kiểu sản phẩm!',
                'hang_san_xuat.required'=>'Chưa chọn tên hãng sản xuất!',
                'gia.required'=>'Chưa nhập giá sản phẩm!',
                'gia.numeric'=>'Giá sản phẩm phải là số!',
                'so_luong.required'=>'Chưa nhập số lượng sản phẩm!',
                'so_luong.numeric'=>'Số lượng sản phẩm phải là số!',
            ]
        );
        $san_pham = SanPham::find($id);
        $san_pham->id_kieu_san_pham = $request->kieu_san_pham;
        $san_pham->id_hang_san_xuat = $request->hang_san_xuat;
        $san_pham->ten = $request->ten;
        if ($request->hasFile('anh')) {
            $file = $request->file('anh');
            $file_name = $file->getClientOriginalName('anh');
            $file->move('anh/anh-san-pham', $file_name);
            $san_pham->anh = $file_name;
        }
        $san_pham->gia = $request->gia;
        $san_pham->so_luong = $request->so_luong;
        $san_pham->can_nang = $request->can_nang;
        $san_pham->thoi_gian_bao_hanh = $request->thoi_gian_bao_hanh;
        $san_pham->mieu_ta = $request->mieu_ta;
        $san_pham->thanh_phan = $request->thanh_phan;
        $san_pham->video_huong_dan = $request->video_huong_dan;
        $san_pham->save();
        return redirect('admin/san-pham/sua-san-pham/'.$id)->with('thongbao', 'Sửa thành công!');
    }

    public function getXoaSanPham($id)
    {
        if(session('kieu_thanh_vien') != 1)
            return abort(404);
        
        $san_pham = SanPham::find($id);
        $san_pham->delete();
        return redirect('admin/san-pham/danh-sach-san-pham')->with('thongbao', 'Xóa thành công!');
    }

}
