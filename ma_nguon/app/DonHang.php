<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DonHang extends Model
{
    protected $table = 'don_hang';
    public $timestamps = false;

    //ADMIN
    public static function layDonHangChuaDuyet() {
    	$dh = DB::table('don_hang')
            ->select('id', 'ngay_mua', 'ho_ten_khach_hang', 'gia_tri_don_hang')
            ->where('trang_thai', '=', 0)
            ->orderBy('ngay_mua', 'asc')
            ->paginate(12);
        return $dh;   
    }

    public static function layDonHangDaDuyet() {
    	$dh = DB::table('don_hang')
    		->join('thanh_vien', 'don_hang.id_nhan_vien', '=', 'thanh_vien.id')
            ->select('don_hang.id as id', 'ngay_mua', 'ho_ten_khach_hang', 'gia_tri_don_hang', 'email', 'ho_ten')
            ->where('trang_thai', '=', 1)
            ->orderBy('ngay_mua', 'asc')
            ->paginate(12);
        return $dh;   
    }

    public static function layDonHangChuaGui($id_nhan_vien) {
    	$dh = DB::table('don_hang')
            ->select('don_hang.id as id', 'ngay_mua', 'ho_ten_khach_hang', 'gia_tri_don_hang')
            ->where('trang_thai', '=', 1)
            ->where('id_nhan_vien', '=', $id_nhan_vien)
            ->orderBy('ngay_mua', 'asc')
            ->paginate(12);
        return $dh;   
    }

    public static function layDonHangDaGui() {
    	$dh = DB::table('don_hang')
    		->join('thanh_vien', 'don_hang.id_nhan_vien', '=', 'thanh_vien.id')
            ->select('don_hang.id as id', 'ngay_mua', 'ho_ten_khach_hang', 'gia_tri_don_hang', 'email', 'ho_ten')
            ->where('trang_thai', '=', 2)
            ->orderBy('ngay_mua', 'asc')
            ->paginate(12);
        return $dh;   
    }

    public static function layDonHangThanhCong() {
        $dh = DB::table('don_hang')
            ->join('thanh_vien', 'don_hang.id_nhan_vien', '=', 'thanh_vien.id')
            ->select('don_hang.id as id', 'ngay_mua', 'ho_ten_khach_hang', 'gia_tri_don_hang', 'email', 'ho_ten')
            ->where('trang_thai', '=', 3)
            ->orderBy('ngay_mua', 'asc')
            ->paginate(12);
        return $dh;   
    }

    public static function layDonHangThatBai() {
        $dh = DB::table('don_hang')
            ->join('thanh_vien', 'don_hang.id_nhan_vien', '=', 'thanh_vien.id')
            ->select('don_hang.id as id', 'ngay_mua', 'ho_ten_khach_hang', 'gia_tri_don_hang', 'email', 'ho_ten')
            ->where('trang_thai', '=', 4)
            ->orderBy('ngay_mua', 'asc')
            ->paginate(12);
        return $dh;   
    }
}
