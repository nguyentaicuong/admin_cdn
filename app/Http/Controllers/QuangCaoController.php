<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuangCao;
use App\ThuongHieu;
use App\DanhMuc;
use Cloudder;

class QuangCaoController extends Controller
{
    public function getDanhSach()
    {
    	$quangcao = QuangCao::orderBy('id','DESC')->paginate(4);
        return view('quanly.quangcao.danhsach',['quangcao'=>$quangcao]);
    }

    public function getThem()
    {
        $danhmuc = DanhMuc::all();
        $thuonghieu = ThuongHieu::all();
    	return view('quanly.quangcao.them',['danhmuc'=>$danhmuc,'thuonghieu'=>$thuonghieu]);
    }

    public function postThem(Request $request)
    {
            $quangcao = new QuangCao;

	        if($request->hasFile('hinh'))
	            {
                    $file = $request ->file('hinh'); //lưu hình vào trong biến file
                    $duoi = $file ->getClientOriginalExtension();
                    if($duoi !='jpg' && $duoi !='png' && $duoi !='PNG')
                    {
                        return redirect('quanly/quangcao/them')->with('thongbao','mời bạn chọn ảnh đuôi png hoặc jpg');
                    }

                    $name = $file->getClientOriginalName();//lấy tên cái hình ra
                    Cloudder::upload($file, 'quangcao/'. $name);
      
                    $quangcao-> hinhanh = 'https://res.cloudinary.com/banhang/image/upload/v1593865252/quangcao/'.$name.'.' .$duoi;
	            }
	          
	          $quangcao -> idthuonghieu =$request->ThuongHieu;
	          $quangcao -> iddanhmuc    =$request->DanhMuc;
	          $quangcao ->save();
	          return redirect('quanly/quangcao/them')->with('thongbao','bạn đã thêm thành công');
		    }


    public function getXoa($id)
    {
        $quangcao = QuangCao::find($id);
        $quangcao -> delete();
        return redirect('quanly/quangcao/danhsach')->with('thongbao','xóa thành công');
    }
}
