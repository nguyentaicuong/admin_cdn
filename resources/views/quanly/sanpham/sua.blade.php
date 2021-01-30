@extends('quanly.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">Sản Phẩm: {{$sanpham->tensanpham}}</h3>
                    </div>
                    <!-- /.col-lg-12 -->

                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors) >0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>  
                        @endif

                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif

                        <form action="quanly/sanpham/sua/{{$sanpham->id}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                            <div class="form-group">
                                <label>Tên Sản Phẩm</label>
                                <input name="ten" class="form-control" value="{{$sanpham->tensanpham}}"/>
                            </div>

                            <div class="form-group">
                                <label>Gía Sản Phẩm</label>
                                <input name="gia" class="form-control" value="{{$sanpham->gia}}"/>
                            </div>

                            <div class="form-group">
                                <label>Hình</label>
                                <p><img width="400px" src="{{$sanpham->hinhanh}}"></p>
                                <input type="file" name="hinh">
                            </div>

                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea name="mota" id="demo" class="form-control ckeditor" rows="5">{{$sanpham->mota}}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Loại Sản Phẩm</label>
                                <select class="form-control" name="LoaiSanPham" id="LoaiSanPham">
                                    @foreach($loaisanpham as $lsp)
                                        <option 

                                            @if($sanpham->loaisanpham->id == $lsp->id)
                                                {{"selected"}}
                                            @endif

                                            value="{{$lsp->id}}">{{$lsp->tenloaisanpham}}
                                        </option>
                                    @endforeach    
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Thương Hiệu</label>
                                <select class="form-control" name="ThuongHieu" id="ThuongHieu">
                                    @foreach($thuonghieu as $th)
                                        <option 

                                            @if($sanpham->thuonghieu->id == $th->id)
                                                {{"selected"}}
                                            @endif

                                            value="{{$th->id}}">{{$th->tenthuonghieu}}
                                        </option>
                                    @endforeach    
                                </select>
                            </div>

                    
                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection

