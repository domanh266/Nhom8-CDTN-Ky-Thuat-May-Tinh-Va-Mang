<?php

namespace App\Http\Controllers;

use App\ThanhVien;
use App\DonHang;
use App\DonHangChiTiet;
use Illuminate\Http\Request;

class ThanhVienController extends Controller
{

    //KHACH HANG

    public function getDangKy()
    {
        return view('dang-ky');
    }

    public function postDangKy(Request $request)
    {
        $this->validate($request, 
            [
                'email' => 'required|unique:thanh_vien,email|email',
                'mat_khau' => 'required|min:6|max:100'
            ], 
            [
                'email.required' => 'Chưa nhập email!',
                'email.unique' => 'Email đã tồn tại!',
                'email.email' => 'Email không hợp lệ!',
                'mat_khau.required' => 'Chưa nhập mật khẩu!',
                'mat_khau.min' => 'Mật khẩu phải từ 6 đến 100 ký tự!',
                'mat_khau.max' => 'Mật khẩu phải từ 6 đến 100 ký tự!'
            ]
        );

        $email = $request->email;
        $xac_nhan_email = $request->xac_nhan_email;
        $mat_khau = $request->mat_khau;
        $xac_nhan_mat_khau = $request->xac_nhan_mat_khau;

        $loi = array();
        if($email != $xac_nhan_email)
            array_push($loi,"Xác nhận email không đúng!");
        if($mat_khau != $xac_nhan_mat_khau)
            array_push($loi,"Xác nhận mật khẩu không đúng!");
        if(count($loi) == 0) {
            $thanh_vien = new ThanhVien;
            $thanh_vien->kieu_thanh_vien = 3;
            $thanh_vien->email = $email;
            $thanh_vien->mat_khau = md5($mat_khau);
            $thanh_vien->save();
            return redirect('dang-ky')->with('thongbao', 'Đăng ký thành công!');
        }
        else {
            return view('dang-ky', ['loi' => $loi, 'email' => $email, 'xac_nhan_email' => $xac_nhan_email, 'mat_khau' => $mat_khau, 'xac_nhan_mat_khau' => $xac_nhan_mat_khau]);
        }    
    }

    public function getDangNhap(Request $request)
    {
        if ($request->session()->has('email')) {
            return redirect('thong-tin-ca-nhan');
        }
        return view('dang-nhap');
    }

    public function postDangNhap(Request $request)
    {
        $this->validate($request, 
            [
                'email' => 'required|email',
                'mat_khau' => 'required'
            ], 
            [
                'email.required' => 'Chưa nhập email!',
                'email.email' => 'Email không hợp lệ!',
                'mat_khau.required' => 'Chưa nhập mật khẩu!'
            ]
        );

        $email = $request->email;
        $mat_khau = md5($request->mat_khau);

        $kiem_tra = ThanhVien::kiemTraDangNhap($email, $mat_khau);
        if($kiem_tra == 1) {
            session(['email' => $email]);
            $thanh_vien = ThanhVien::where('email', '=', "$email")->first();
            session(['id_thanh_vien' => $thanh_vien->id]);
            session(['kieu_thanh_vien' => $thanh_vien->kieu_thanh_vien]);
            session(['anh_dai_dien' => $thanh_vien->anh_dai_dien]);
            return redirect('thong-tin-ca-nhan');
        }
        else {
            return redirect('dang-nhap')->with('thongbao', 'Thông tin đăng nhập không chính xác!');
        }    
    }

    public function getDangXuat(Request $request)
    {
        //$request->session()->forget('email');
        $request->session()->flush(); //xoa tat ca session
        return redirect('dang-nhap');
    }

    public function getThongTinCaNhan(Request $request)
    {
        if ($request->session()->has('email')) {
            $email = session('email');
            $thanh_vien = ThanhVien::where('email', '=', "$email")->first();
            return view('thong-tin-ca-nhan', ['thanh_vien' => $thanh_vien]);
        }
        else {
            return redirect('dang-nhap');
        }
    }

    public function postThongTinCaNhan(Request $request)
    {
        $email = session('email');
        $thanh_vien = ThanhVien::where('email', '=', "$email")->first();
        $this->validate($request, 
            [
                'email' => 'required|email'
            ], 
            [
                'email.required'=>'Chưa nhập email!',
                'email.email' => 'Email không hợp lệ!'
            ]
        );
        $thanh_vien->email = $request->email;
        $thanh_vien->ho_ten = $request->ho_ten;
        $thanh_vien->gioi_tinh = $request->gioi_tinh;
        $thanh_vien->nam_sinh = $request->nam_sinh;
        $thanh_vien->so_dien_thoai = $request->so_dien_thoai;
        $thanh_vien->dia_chi = $request->dia_chi;
        if ($request->hasFile('anh_dai_dien')) {
            $file = $request->file('anh_dai_dien');
            $file_name = $file->getClientOriginalName('anh_dai_dien');
            $file->move('anh/anh-thanh-vien', $file_name);
            $thanh_vien->anh_dai_dien = $file_name;
        }
        $thanh_vien->facebook = $request->facebook;
        $thanh_vien->save();
        return redirect('thong-tin-ca-nhan')->with('thongbao', 'Sửa thành công!');
    }

    public function getLichSuMuaHang(Request $request)
    {
        if ($request->session()->has('email')) {
            $id_khach_hang = session('id_thanh_vien');
            $don_hang = DonHang::where('id_khach_hang', '=', $id_khach_hang)->get();
            $don_hang_chi_tiet = array();
            foreach($don_hang as $dh)
                $don_hang_chi_tiet[$dh->id] = DonHangChiTiet::layDonHangChiTiet($dh->id);
            return view('lich-su-mua-hang', ['don_hang' => $don_hang, 'don_hang_chi_tiet' => $don_hang_chi_tiet]);
        }
        else {
            return redirect('dang-nhap');
        }
    }

    public function getDoiMatKhau(Request $request)
    {
        if ($request->session()->has('email')) {
            return view('doi-mat-khau');
        } else {
            return redirect('dang-nhap');
        }     
    }

    public function postDoiMatKhau(Request $request)
    {
        if ($request->session()->has('email')) {
            $this->validate($request, 
                [
                    'mat_khau_moi' => 'required|min:6|max:100'
                ], 
                [
                    'mat_khau_moi.required' => 'Chưa nhập mật khẩu!',
                    'mat_khau.min' => 'Mật khẩu phải từ 6 đến 100 ký tự!',
                    'mat_khau.max' => 'Mật khẩu phải từ 6 đến 100 ký tự!'
                ]
            );

            $id_thanh_vien = session('id_thanh_vien');
            $thanh_vien = ThanhVien::find($id_thanh_vien);

            $mat_khau_hien_tai = $request->mat_khau_hien_tai;
            $mat_khau_moi = $request->mat_khau_moi;
            $xac_nhan_mat_khau_moi = $request->xac_nhan_mat_khau_moi;

            $loi = array();
            if($thanh_vien->mat_khau != md5($mat_khau_hien_tai))
                array_push($loi,"Mật khẩu hiện tại không đúng!");
            if($mat_khau_moi != $xac_nhan_mat_khau_moi)
                array_push($loi,"Xác nhận mật khẩu mới không đúng!");
            if(count($loi) == 0) {
                $thanh_vien->mat_khau = md5($mat_khau_moi); 
                $thanh_vien->save();
                return redirect('doi-mat-khau')->with('thongbao', 'Đổi mật khẩu thành công!');
            }
            else {
                return view('doi-mat-khau', ['loi' => $loi]);
            }
        } else {
            return redirect('dang-nhap');
        }     
    }

    //ADMIN

    public function getThemThanhVien()
    {
        if(session('kieu_thanh_vien') != 1)
            return abort(404);

        return view('admin/thanh-vien/them-thanh-vien');
    }
    
    public function postThemThanhVien(Request $request) 
    {
    	$this->validate($request, 
            [
                'kieu_thanh_vien' => 'required',
                'email' => 'required|unique:thanh_vien,email|email',
                'mat_khau' => 'required'
            ], 
            [
                'kieu_thanh_vien.required'=>'Chưa chọn kiểu thành viên!',
                'email.required'=>'Chưa nhập email!',
                'email.unique'=>'Email đã tồn tại!',
                'email.email' => 'Email không hợp lệ!',
                'mat_khau.required'=>'Chưa nhập mật khẩu!'
            ]
        );
    	$thanh_vien = new ThanhVien;
    	$thanh_vien->kieu_thanh_vien = $request->kieu_thanh_vien;
        $thanh_vien->email = $request->email;
        $thanh_vien->mat_khau = md5($request->mat_khau);
        $thanh_vien->ho_ten = $request->ho_ten;
        $thanh_vien->gioi_tinh = $request->gioi_tinh;
        $thanh_vien->nam_sinh = $request->nam_sinh;
        $thanh_vien->so_dien_thoai = $request->so_dien_thoai;
        $thanh_vien->dia_chi = $request->dia_chi;
        $thanh_vien->anh_dai_dien = '';
        if ($request->hasFile('anh_dai_dien')) {
            $file = $request->file('anh_dai_dien');
            $file_name = $file->getClientOriginalName('anh_dai_dien');
            $file->move('anh/anh-thanh-vien', $file_name);
            $thanh_vien->anh_dai_dien = $file_name;
        }
        $thanh_vien->facebook = $request->facebook;
    	$thanh_vien->save();
    	return redirect('admin/thanh-vien/them-thanh-vien')->with('thongbao', 'Thêm thành công!');
    }

    public function getDanhSachThanhVien()
    {
        if(session('kieu_thanh_vien') != 1)
            return abort(404);

        $thanh_vien = ThanhVien::paginate(10);
        return view('admin.thanh-vien.danh-sach-thanh-vien', ['thanh_vien' => $thanh_vien]);
    }


    public function postTimThanhVien(Request $request)
    {
        $email = $request->email;
        $thanh_vien = ThanhVien::where('email', 'like', "%$email%")->paginate(10);
        return view('admin.thanh-vien.danh-sach-thanh-vien', ['thanh_vien' => $thanh_vien]);
    }

    public function getSuaThanhVien($id)
    {
        if(session('kieu_thanh_vien') != 1)
            return abort(404);

        $thanh_vien = ThanhVien::find($id);
        return view('admin.thanh-vien.sua-thanh-vien', ['thanh_vien' => $thanh_vien]);
    }

    public function postSuaThanhVien(Request $request, $id)
    {
        $thanh_vien = ThanhVien::find($id);
        $this->validate($request, 
            [
                'kieu_thanh_vien' => 'required',
                'email' => 'required|email'
            ], 
            [
                'kieu_thanh_vien.required'=>'Chưa chọn kiểu thành viên!',
                'email.required'=>'Chưa nhập email!',
                'email.email' => 'Email không hợp lệ!'
            ]
        );
        $thanh_vien->kieu_thanh_vien = $request->kieu_thanh_vien;
        $thanh_vien->email = $request->email;
        if($request->mat_khau != '') {
            $thanh_vien->mat_khau = md5($request->mat_khau);
        }
        $thanh_vien->ho_ten = $request->ho_ten;
        $thanh_vien->gioi_tinh = $request->gioi_tinh;
        $thanh_vien->nam_sinh = $request->nam_sinh;
        $thanh_vien->so_dien_thoai = $request->so_dien_thoai;
        $thanh_vien->dia_chi = $request->dia_chi;
        if ($request->hasFile('anh_dai_dien')) {
            $file = $request->file('anh_dai_dien');
            $file_name = $file->getClientOriginalName('anh_dai_dien');
            $file->move('anh/anh-thanh-vien', $file_name);
            $thanh_vien->anh_dai_dien = $file_name;
        }
        $thanh_vien->facebook = $request->facebook;
        $thanh_vien->save();
        return redirect('admin/thanh-vien/sua-thanh-vien/'.$thanh_vien->id)->with('thongbao', 'Sửa thành công!');
    }

    public function getXoaThanhVien($id)
    {
        if(session('kieu_thanh_vien') != 1)
            return abort(404);

        $thanh_vien = ThanhVien::find($id);
        $thanh_vien->delete();
        return redirect('admin/thanh-vien/danh-sach-thanh-vien/')->with('thongbao', 'Xóa thành công!');
    }

}
