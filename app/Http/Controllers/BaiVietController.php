<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BaiViet;
use App\ThuongHieu;
use Cloudder;
class BaiVietController extends Controller
{
    public function getDanhSach()
    {
    	$baiviet = BaiViet::orderBy('id','DESC')->paginate(5);
        return view('quanly.baiviet.danhsach',['baiviet'=>$baiviet]);
    }

	public function getThem()
    {
        $thuonghieu  = ThuongHieu::all();
    	return view('quanly.baiviet.them',['thuonghieu'=>$thuonghieu]);
    }


     public function postThem(Request $request)
    {
          $this->validate($request,
            [
                'noidung'=>'required|min:10|max:1000',
                'hinh'=>'required',
            ],
            [
                'noidung.required'=>'bạn chưa nhập nội dung bài viết',
                'ten.min'=>'nội dung phải dài hơn 10 ký tự',
                'ten.max'=>'nội dung phải ngắn hơn 1000 ký tự',
                'hinh.required'=>'bạn chưa chọn hình'
            ]);

            $baiviet = new BaiViet;
            $baiviet -> idthuonghieu =$request->ThuongHieu;
            $baiviet -> noidung = $request->noidung;

	        if($request->hasFile('hinh'))
	            {
                    $file = $request ->file('hinh'); //lưu hình vào trong biến file
                    $duoi = $file ->getClientOriginalExtension();
                    if($duoi !='jpg' && $duoi !='png' && $duoi !='PNG')
                    {
                        return redirect('quanly/baiviet/them')->with('thongbao','mời bạn chọn ảnh đuôi png hoặc jpg');
                    }

                    $name = $file->getClientOriginalName();//lấy tên cái hình ra
                    Cloudder::upload($file, 'baiviet/'. $name);
      
                    $baiviet-> hinhanh = 'https://res.cloudinary.com/banhang/image/upload/v1593865252/baiviet/'.$name.'.' .$duoi;
	              }
	       
	        $baiviet ->save();
	        return redirect('quanly/baiviet/them')->with('thongbao','bạn đã thêm thành công');
	}

	public function getSua($id)
    {
        $baiviet  = BaiViet::find($id);
        $thuonghieu  = ThuongHieu::all();
        return view('quanly.baiviet.sua',['baiviet'=>$baiviet,'thuonghieu'=>$thuonghieu]);
    }


    public function postSua(Request $request,$id)
    {
        $this->validate($request,
        [
            'noidung'=>'required|min:5|max:50',
        ],
        [
            'noidung.required'=>'bạn chưa nhập nội dung bài viết',
            'ten.min'=>'nội dung phải dài hơn 10 ký tự',
            'ten.max'=>'nội dung phải ngắn hơn 1000 ký tự',
        ]);
       
        $baiviet = BaiViet::find($id);
        $baiviet -> idthuonghieu =$request->ThuongHieu;
        $baiviet -> noidung = $request->noidung;

       	if($request->hasFile('hinh'))
            {
                $file = $request ->file('hinh'); //lưu hình vào trong biến file
                $duoi = $file ->getClientOriginalExtension();
                if($duoi !='jpg' && $duoi !='png' && $duoi !='PNG')
                {
                    return redirect('quanly/baiviet/them')->with('thongbao','mời bạn chọn ảnh đuôi png hoặc jpg');
                }

                $name = $file->getClientOriginalName();//lấy tên cái hình ra
                Cloudder::upload($file, 'baiviet/'. $name);
  
                $baiviet-> hinhanh = 'https://res.cloudinary.com/banhang/image/upload/v1593865252/baiviet/'.$name.'.' .$duoi;
              }

        $baiviet ->save();
        return redirect('quanly/baiviet/danhsach')->with('thongbao','bạn đã sửa thành công');
    }

    public function getXoa($id)
    {
        $baiviet = BaiViet::find($id);
        $baiviet -> delete();
        return redirect('quanly/baiviet/danhsach')->with('thongbao','xóa thành công');
    }
}
