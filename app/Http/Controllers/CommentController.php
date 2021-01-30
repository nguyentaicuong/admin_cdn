<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\SanPham;
use App\Users;

use Cloudder;

class CommentController extends Controller
{
    public function getDanhSach()
    {
    	$comment = Comment::orderBy('id','DESC')->paginate(5);
        return view('quanly.comment.danhsach',['comment'=>$comment]);
    }

    public function getXoa($id)
    {
        $comment = Comment::find($id);
        $comment -> delete();
        return redirect('quanly/comment/danhsach')->with('thongbao','xóa thành công');
    }
}
