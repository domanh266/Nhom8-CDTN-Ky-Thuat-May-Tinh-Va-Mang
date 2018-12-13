<?php

namespace App\Http\Controllers;

use App\ThanhVien;
use App\DonHang;
use App\DonHangChiTiet;
use Illuminate\Http\Request;

class DonHangController extends Controller
{

    //KHACH HANG

    public function getThanhToan()
    {
        return view('thanh-toan');
    }

    public function postThanhToan(Request $request)
    {
        $this->validate($request, 
            [
                'httt' => 'required',
                'ho_ten' => 'required',
                'so_dien_thoai' => 'required',
                'tinh' => 'required',
                'huyen' => 'required',
                'xa' => 'required'
            ], 
            [
                'httt.required'=>'Chưa chọn hình thức thanh toán!',
                'ho_ten.required'=>'Chưa nhập họ tên!',
                'so_dien_thoai.required'=>'Chưa nhập số điện thoại!',
                'tinh.required'=>'Chưa nhập tỉnh / thành phố!',
                'huyen.required'=>'Chưa nhập quận / huyện!',
                'xa.required'=>'Chưa nhập phường / xã!'
            ]
        );
        $don_hang = new DonHang;
        $don_hang->ngay_mua = date("Y-m-d");
        if ($request->session()->has('email')) {
            $email = session('email');
            $thanh_vien = ThanhVien::where('email', '=', "$email")->first();
            $don_hang->id_khach_hang = $thanh_vien->id;
        } else {
            $don_hang->id_khach_hang = 0;
        }
        $don_hang->id_nhan_vien = 0;
        $gio_hang = session()->get('gio_hang');
        $gtdh = 0;
        foreach($gio_hang as $gh) {
            $gtdh += $gh['gia'] * $gh['so_luong'];
        }
        $don_hang->gia_tri_don_hang = $gtdh;
        $don_hang->hinh_thuc_thanh_toan = $request->httt;
        $don_hang->trang_thai = 0;
        $don_hang->ho_ten_khach_hang = $request->ho_ten;
        $don_hang->so_dien_thoai_khach_hang = $request->so_dien_thoai;
        $dia_chi = $request->xa . ' ' . $request->huyen . ' ' . $request->tinh;
        $don_hang->dia_chi_khach_hang = $dia_chi;
        $don_hang->email_khach_hang = $request->email;
        $don_hang->save();
        $id_don_hang = $don_hang->id;
        foreach($gio_hang as $gh) {
            $don_hang_chi_tiet = new DonHangChiTiet;
            $don_hang_chi_tiet->id_don_hang = $id_don_hang;
            $don_hang_chi_tiet->id_san_pham = $gh['id'];
            $don_hang_chi_tiet->so_luong = $gh['so_luong'];
            $don_hang_chi_tiet->save();
        }
        $request->session()->forget('gio_hang');
        return redirect('cam-on');
    }

    public function getCamOn()
    {
        return view('cam-on');
    }

    //ADMIN 

    public function getDonHangChuaDuyet()
    {

        if(session('kieu_thanh_vien') != 1)
            return abort(404);

        $don_hang = DonHang::layDonHangChuaDuyet();
        return view('admin.don-hang.don-hang-chua-duyet', ['don_hang' => $don_hang]);
    }

    public function getDonHangChiTiet($id_don_hang)
    {
        if(session('kieu_thanh_vien') != 1 && session('kieu_thanh_vien') != 2)
            return abort(404);

        $don_hang = DonHang::find($id_don_hang);
        $don_hang_chi_tiet = DonHangChiTiet::layDonHangChiTiet($id_don_hang);
        $nhan_vien = ThanhVien::where('kieu_thanh_vien', '=', 2)->get();
        return view('admin.don-hang.don-hang-chi-tiet', ['don_hang' => $don_hang, 'don_hang_chi_tiet' => $don_hang_chi_tiet, 'nhan_vien' => $nhan_vien]);
    }

    public function postDonHangChiTiet(Request $request, $id_don_hang)
    {
        $this->validate($request, 
            [
                'nhan_vien' => 'required'
            ], 
            [
                'nhan_vien.required'=>'Chưa chọn nhân viên!'
            ]    
        );
        $don_hang = DonHang::find($id_don_hang);
        $don_hang->id_nhan_vien = $request->nhan_vien;
        $don_hang->trang_thai = 1;
        $don_hang->save();
        return redirect('admin/don-hang/don-hang-chi-tiet/'.$id_don_hang)->with('thongbao', 'Duyệt thành công!');
    }

    public function getDonHangDaDuyet()
    {
        if(session('kieu_thanh_vien') != 1)
            return abort(404);

        $don_hang = DonHang::layDonHangDaDuyet();
        return view('admin.don-hang.don-hang-da-duyet', ['don_hang' => $don_hang]);
    }

    public function getDonHangChuaGui()
    {
        if(session('kieu_thanh_vien') != 2)
            return abort(404);

        $id_nhan_vien = session('id_thanh_vien');
        $don_hang = DonHang::layDonHangChuaGui($id_nhan_vien);
        return view('admin.don-hang.don-hang-chua-gui', ['don_hang' => $don_hang]);
    }

    public function getBaoGui($id_don_hang)
    {
        if(session('kieu_thanh_vien') != 2)
            return abort(404);

        $don_hang = DonHang::find($id_don_hang);
        $don_hang->trang_thai = 2;
        $don_hang->save();
        return redirect('admin/don-hang/don-hang-chua-gui')->with('thongbao', 'Báo gửi thành công!');
    }

    public function getDonHangDaGui()
    {
        if(session('kieu_thanh_vien') != 1)
            return abort(404);

        $don_hang = DonHang::layDonHangDaGui();
        return view('admin.don-hang.don-hang-da-gui', ['don_hang' => $don_hang]);
    }

   public function getXacNhanDonHangThanhCong($id_don_hang)
    {
        if(session('kieu_thanh_vien') != 1)
            return abort(404);

        $don_hang = DonHang::find($id_don_hang);
        $don_hang->trang_thai = 3;
        $don_hang->save();
        return redirect('admin/don-hang/don-hang-da-gui/')->with('thongbao', 'Xác nhận đơn hàng thành công! Đơn hàng này thành công!');
    }

    public function getXacNhanDonHangThatBai($id_don_hang)
    {
        if(session('kieu_thanh_vien') != 1)
            return abort(404);

        $don_hang = DonHang::find($id_don_hang);
        $don_hang->trang_thai = 4;
        $don_hang->save();
        return redirect('admin/don-hang/don-hang-da-gui/')->with('thongbao', 'Xác nhận đơn hàng thành công! Đơn hàng này thất bại!');
    }

    public function getDonHangThanhCong()
    {
        if(session('kieu_thanh_vien') != 1)
            return abort(404);

        $don_hang = DonHang::layDonHangThanhCong();
        return view('admin.don-hang.don-hang-thanh-cong', ['don_hang' => $don_hang]);
    }

    public function getDonHangThatBai()
    {
        if(session('kieu_thanh_vien') != 1)
            return abort(404);

        $don_hang = DonHang::layDonHangThatBai();
        return view('admin.don-hang.don-hang-that-bai', ['don_hang' => $don_hang]);
    }
}
