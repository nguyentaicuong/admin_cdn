<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThuongHieu extends Model
{
    protected $table ="thuonghieu";

    public function danhmuc()
    {
    	return $this-> belongsTo('App\DanhMuc','iddanhmuc','id'); 
    }

    public function sanpham()
    {
    	return $this-> hasMany('App\SanPham','idthuonghieu','id');  
    }

    public function quangcao()
    {
    	return $this-> hasMany('App\QuangCao','idthuonghieu','id');  
    }

    public function baiviet()
    {
        return $this-> hasMany('App\BaiViet','idthuonghieu','id');  
    }
}
