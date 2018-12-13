<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SanPham extends Model
{
    protected $table = 'san_pham';
    public $timestamps = false;

    //KHACH HANG
    public static function laySanPhamTheoLoai($id_loai_san_pham) {
      $sptl = DB::table('san_pham')
             ->join('hang_san_xuat', 'san_pham.id_hang_san_xuat', '=', 'hang_san_xuat.id')
             ->join('kieu_san_pham', 'san_pham.id_kieu_san_pham', '=', 'kieu_san_pham.id')
             ->join('loai_san_pham', 'kieu_san_pham.id_loai_san_pham', '=', 'loai_san_pham.id')
             ->select('san_pham.id', 'san_pham.ten as ten_san_pham', 'hang_san_xuat.ten as ten_hang_san_xuat', 'anh', 'gia')
             ->where('loai_san_pham.id', '=', $id_loai_san_pham)
             ->paginate(12);
      return $sptl;       
    }

    public static function laySanPhamTheoKieu($id_kieu_san_pham) {
      $sptk = DB::table('san_pham')
             ->join('hang_san_xuat', 'san_pham.id_hang_san_xuat', '=', 'hang_san_xuat.id')
             ->join('kieu_san_pham', 'san_pham.id_kieu_san_pham', '=', 'kieu_san_pham.id')
             ->select('san_pham.id', 'san_pham.ten as ten_san_pham', 'hang_san_xuat.ten as ten_hang_san_xuat', 'anh', 'gia')
             ->where('kieu_san_pham.id', '=', $id_kieu_san_pham)
             ->paginate(12);
      return $sptk;    
    }

    public static function layChiTietSanPham($id) {
      $sp = DB::table('san_pham')
             ->join('hang_san_xuat', 'san_pham.id_hang_san_xuat', '=', 'hang_san_xuat.id')
             ->join('kieu_san_pham', 'san_pham.id_kieu_san_pham', '=', 'kieu_san_pham.id')
             ->join('loai_san_pham', 'kieu_san_pham.id_loai_san_pham', '=', 'loai_san_pham.id')
             ->select('san_pham.id as id_san_pham', 'san_pham.ten as ten_san_pham', 'kieu_san_pham.id as id_kieu_san_pham', 'kieu_san_pham.ten as ten_kieu_san_pham', 'loai_san_pham.id as id_loai_san_pham', 'loai_san_pham.ten as ten_loai_san_pham', 'hang_san_xuat.ten as ten_hang_san_xuat', 'gioi_thieu', 'can_nang', 'mieu_ta', 'thanh_phan', 'video_huong_dan', 'anh', 'gia')
             ->where('san_pham.id', '=', $id)
             ->first();
      return $sp;    
    }

    public static function timKiemSanPham($tu_khoa) {
      $dssp = DB::table('san_pham')
             ->join('hang_san_xuat', 'san_pham.id_hang_san_xuat', '=', 'hang_san_xuat.id')
             ->join('kieu_san_pham', 'san_pham.id_kieu_san_pham', '=', 'kieu_san_pham.id')
             ->join('loai_san_pham', 'kieu_san_pham.id_loai_san_pham', '=', 'loai_san_pham.id')
             ->select('san_pham.id as id', 'san_pham.ten as ten_san_pham', 'hang_san_xuat.ten as ten_hang_san_xuat', 'anh', 'gia')
             ->where('san_pham.ten', 'like', "%$tu_khoa%")
             ->orWhere('hang_san_xuat.ten', 'like', "%$tu_khoa%")
             ->orWhere('kieu_san_pham.ten', 'like', "%$tu_khoa%")
             ->orWhere('loai_san_pham.ten', 'like', "%$tu_khoa%")
             ->distinct()
             ->paginate(12);
      return $dssp;    
    }

    //ADMIN
    public static function layDanhSachSanPham() {
    	$sp = DB::table('san_pham')
            ->join('kieu_san_pham', 'san_pham.id_kieu_san_pham', '=', 'kieu_san_pham.id')
            ->join('hang_san_xuat', 'san_pham.id_hang_san_xuat', '=', 'hang_san_xuat.id')
            ->select('san_pham.id', 'san_pham.ten as ten_san_pham', 'kieu_san_pham.ten as ten_kieu_san_pham', 'hang_san_xuat.ten as ten_hang_san_xuat', 'anh', 'gia', 'so_luong')
            ->orderBy('ten_kieu_san_pham', 'asc')
            ->paginate(12);
        return $sp;    
    }

    public static function timSanPham($ten) {
    	$sp = DB::table('san_pham')
            ->join('kieu_san_pham', 'san_pham.id_kieu_san_pham', '=', 'kieu_san_pham.id')
            ->join('hang_san_xuat', 'san_pham.id_hang_san_xuat', '=', 'hang_san_xuat.id')
            ->select('san_pham.id', 'san_pham.ten as ten_san_pham', 'kieu_san_pham.ten as ten_kieu_san_pham', 'hang_san_xuat.ten as ten_hang_san_xuat', 'anh', 'gia', 'so_luong')
            ->where('san_pham.ten', 'like', "%$ten%")
            ->orderBy('ten_kieu_san_pham', 'asc')
            ->paginate(12);
        return $sp;    
    }
}
