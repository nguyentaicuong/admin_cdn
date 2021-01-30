<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuangCao extends Model
{
    protected $table ="quangcao";
    
    public function thuonghieu()
    {
    	return $this-> belongsTo('App\ThuongHieu','idthuonghieu','id');  //một loại sản phẩm quảng cáo cho 1 thương hiệu. Truyền 3 tham số: đường dẫn đến model thương hiệu, khóa ngoại của bảng quảng cáo, khóa chính của bảng quang cáo
    }

    public function danhmuc()
    {
    	return $this-> belongsTo('App\DanhMuc','iddanhmuc','id'); 
    }
}
