<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DonHang;
use App\ChiTietDonHang;


class DonHangController extends Controller
{
     public function getDanhSach()
    {
    	$donhang = DonHang::orderBy('id','DESC')->paginate(20);
    	return view('quanly.donhang.danhsach',['donhang'=>$donhang]);
    }


    public function view(Request $request, $id)
    {
    	if($request->ajax())
    	{
    		$chitiet = DonHang::where('madonhang',$id)->get();
            $tt =ChiTietDonHang::find($id);
    		$html = view('quanly.donhang.chitiet',compact('chitiet'))->render();
    		return \response()->json($html);
    	}
    }

    public function trangthaidonhang($id)
    {
        $donhang = DonHang::find($id);
        $chitietdonhang =ChiTietDonHang::where('madonhang',$id)->get();
        $donhang-> status = DonHang::STATUS_DONE;
        $donhang->save();
        return redirect()->back()->with('thongbao','xử lý đơn hàng thành công');
    }
}
