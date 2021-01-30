<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaiViet extends Model
{
    protected $table ="baiviet";

    public function thuonghieu()
    {
    	return $this-> belongsTo('App\ThuongHieu','idthuonghieu','id');  
    }
}
