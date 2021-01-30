<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ThuongHieu;
use App\LoaiSanPham;
use App\SanPham;

use Cloudder;

class SanPhamController extends Controller
{
    public function getDanhSach()
    {
    	$sanpham = SanPham::orderBy('id','DESC')->paginate(4);
        return view('quanly.sanpham.danhsach',['sanpham'=>$sanpham]);
    }

    public function getThem()
    {
        $thuonghieu  = ThuongHieu::all();
        $loaisanpham = LoaiSanPham::all();
    	return view('quanly.sanpham.them',['thuonghieu'=>$thuonghieu,'loaisanpham'=>$loaisanpham]);
    }


    public function postThem(Request $request)
    {
          $this->validate($request,
            [
                'ten'=>'required|unique:SanPham,tensanpham|min:5|max:200',
                'gia'=>'required',
                'mota'=>'required',
            ],
            [
                'ten.required'=>'bạn chưa nhập tên sản phẩm',
                'ten.unique'=>'tên sản phẩm đã tồn tại',
                'ten.min'=>'tên  sản phẩm phải dài hơn 5 ký tự',
                'ten.max'=>'tên  sản phẩm phải ngắn hơn 200 ký tự',
                'gia.required'=>'bạn chưa nhập giá sản phẩm',
                'mota.required'=>'bạn chưa nhập mô tả',
                'hinh.required'=>'bạn chưa chọn hình'
            ]);

            $sanpham = new SanPham;
            $sanpham -> tensanpham = $request->ten;
            $sanpham -> gia = $request->gia;

	        if($request->hasFile('hinh'))
	            {
                    $file = $request ->file('hinh'); //lưu hình vào trong biến file
                    $duoi = $file ->getClientOriginalExtension();
                    if($duoi !='jpg' && $duoi !='png' && $duoi !='PNG')
                    {
                        return redirect('quanly/sanpham/them')->with('thongbao','mời bạn chọn ảnh đuôi png hoặc jpg');
                    }

                    $name = $file->getClientOriginalName();//lấy tên cái hình ra
                    Cloudder::upload($file, 'sanpham/'. $name);
      
                    $sanpham-> hinhanh = 'https://res.cloudinary.com/banhang/image/upload/v1593865252/sanpham/'.$name.'.' .$duoi;
	              }

 			$sanpham -> mota = $request->mota;
	        $sanpham -> idthuonghieu =$request->ThuongHieu;
            $sanpham -> idloaisanpham =$request->LoaiSanPham;
	        $sanpham ->save();
	          return redirect('quanly/sanpham/them')->with('thongbao','bạn đã thêm thành công');
	}

	public function getSua($id)
    {
        $sanpham  = SanPham::find($id);
        $thuonghieu  = ThuongHieu::all();
        $loaisanpham = LoaiSanPham::all();
        return view('quanly.sanpham.sua',['sanpham'=>$sanpham,'thuonghieu'=>$thuonghieu,'loaisanpham'=>$loaisanpham]);
    }


    public function postSua(Request $request,$id)
    {
        $this->validate($request,
        [
            'ten'=>'required|min:5|max:50',
        ],
        [
            'ten.required'=>'bạn chưa nhập tên sản phẩm',
            'ten.unique'=>'tên sản phẩm đã tồn tại',
            'ten.min'=>'tên sản phẩm phải dài hơn 5 ký tự',
            'ten.max'=>'tên sản phẩm phải ngắn hơn 50 ký tự',
        ]);
        $sanpham = SanPham::find($id);
        $sanpham -> tensanpham = $request->ten;
        $sanpham -> gia = $request->gia;

        if($request->hasFile('hinh'))
            {
                $file = $request ->file('hinh'); //lưu hình vào trong biến file
                $duoi = $file ->getClientOriginalExtension();
                if($duoi !='jpg' && $duoi !='png' && $duoi !='PNG')
                {
                    return redirect('quanly/sanpham/them')->with('thongbao','mời bạn chọn ảnh đuôi png hoặc jpg');
                }

                $name = $file->getClientOriginalName();//lấy tên cái hình ra
                Cloudder::upload($file, 'sanpham/'. $name);
  
                $sanpham-> hinhanh = 'https://res.cloudinary.com/banhang/image/upload/v1593865252/sanpham/'.$name.'.' .$duoi;
              }

		$sanpham -> mota = $request->mota;
        $sanpham -> idthuonghieu =$request->ThuongHieu;
        $sanpham -> idloaisanpham =$request->LoaiSanPham;
        $sanpham ->save();
        return redirect('quanly/sanpham/danhsach')->with('thongbao','bạn đã sửa thành công');
    }

	public function getXoa($id)
    {
        $sanpham = SanPham::find($id);
        $sanpham -> delete();
        return redirect('quanly/sanpham/danhsach')->with('thongbao','xóa thành công');
    }
}
