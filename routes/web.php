<?php

use Illuminate\Support\Facades\Route;
use App\DanhMuc;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    $danhmuc =  DanhMuc::find(2);
    foreach ($danhmuc->loaisanpham as $lsp) {
    	echo $lsp->tenloaisanpham."<br>";
    }
});

Route::get('quanly/dangnhap','UsersController@getDangnhapAdmin');
Route::post('quanly/dangnhap','UsersController@postDangnhapAdmin');
Route::get('quanly/dangxuat','UsersController@getDangXuatAdmin');

Route::group(['prefix'=>'quanly','middleware'=>'adminLogin'],function(){
	Route::group(['prefix'=>'danhmuc'],function(){
			Route::get('danhsach','DanhMucController@getDanhSach');

			Route::get('them','DanhMucController@getThem');
			Route::post('them','DanhMucController@postThem');

			Route::get('sua/{id}','DanhMucController@getSua');
			Route::post('sua/{id}','DanhMucController@postSua');

			Route::get('xoa/{id}','DanhMucController@getXoa');
		});

	Route::group(['prefix'=>'loaisanpham'],function(){
			Route::get('danhsach','LoaiSanPhamController@getDanhSach');

			Route::get('them','LoaiSanPhamController@getThem');
			Route::post('them','LoaiSanPhamController@postThem');

			Route::get('sua/{id}','LoaiSanPhamController@getSua');
			Route::post('sua/{id}','LoaiSanPhamController@postSua');

			Route::get('xoa/{id}','LoaiSanPhamController@getXoa');
		});

	Route::group(['prefix'=>'thuonghieu'],function(){
			Route::get('danhsach','ThuongHieuController@getDanhSach');

			Route::get('them','ThuongHieuController@getThem');
			Route::post('them','ThuongHieuController@postThem');

			Route::get('sua/{id}','ThuongHieuController@getSua');
			Route::post('sua/{id}','ThuongHieuController@postSua');

			Route::get('xoa/{id}','ThuongHieuController@getXoa');
		});

	Route::group(['prefix'=>'quangcao'],function(){
			Route::get('danhsach','QuangCaoController@getDanhSach');

			Route::get('them','QuangCaoController@getThem');
			Route::post('them','QuangCaoController@postThem');

			Route::get('sua/{id}','QuangCaoController@getSua');
			Route::post('sua/{id}','QuangCaoController@postSua');

			Route::get('xoa/{id}','QuangCaoController@getXoa');
		});

	Route::group(['prefix'=>'sanpham'],function(){
			Route::get('danhsach','SanPhamController@getDanhSach');

			Route::get('them','SanPhamController@getThem');
			Route::post('them','SanPhamController@postThem');

			Route::get('sua/{id}','SanPhamController@getSua');
			Route::post('sua/{id}','SanPhamController@postSua');

			Route::get('xoa/{id}','SanPhamController@getXoa');
		});

	// Route::group(['prefix'=>'ajax'],function(){
	// 	Route::get('thuonghieu/{idloaisanpham}','AjaxController@getThuongHieu');
	// });
	
	Route::group(['prefix'=>'baiviet'],function(){
			Route::get('danhsach','BaiVietController@getDanhSach');

			Route::get('them','BaiVietController@getThem');
			Route::post('them','BaiVietController@postThem');

			Route::get('sua/{id}','BaiVietController@getSua');
			Route::post('sua/{id}','BaiVietController@postSua');

			Route::get('xoa/{id}','BaiVietController@getXoa');
		});

	Route::group(['prefix'=>'comment'],function(){
			Route::get('danhsach','CommentController@getDanhSach');

			Route::get('xoa/{id}','CommentController@getXoa');
		});

	Route::group(['prefix'=>'users'],function(){
			Route::get('danhsach','UsersController@getDanhSach');

			Route::get('them','UsersController@getThem');
			Route::post('them','UsersController@postThem');

			Route::get('sua/{id}','UsersController@getSua');
			Route::post('sua/{id}','UsersController@postSua');

			Route::get('xoa/{id}','UsersController@getXoa');
		});

	Route::group(['prefix'=>'donhang'],function(){
		Route::get('danhsach','DonHangController@getDanhSach');
		Route::get('xoa/{id}','DonHangController@getXoa');
		Route::get('view/{id}','DonHangController@view');//XEM ĐƠN HÀNG
		Route::get('active/{id}','DonHangController@trangthaidonhang');
	});
});
