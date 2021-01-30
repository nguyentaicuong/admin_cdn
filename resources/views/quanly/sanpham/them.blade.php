@extends('quanly.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thêm Sản Phẩm
                          
                        </h1>
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

                        <form action="quanly/sanpham/them" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                            <div class="form-group">
                                <label>Tên Sản Phẩm</label>
                                <input name="ten" class="form-control"  placeholder="Nhập tên sản phẩm" />
                            </div>

                            <div class="form-group">
                                <label>Giá</label>
                                <input name="gia" class="form-control"  placeholder="Nhập giá sản phẩm" />
                            </div>

                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <input type="file" name="hinh">
                            </div>

                            <div class="form-group">
                                <label>Mô Tả</label>
                                <textarea name="mota" id="demo" class="form-control ckeditor" rows="5"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Loại Sản Phẩm</label>
                                <select class="form-control" name="LoaiSanPham" id="LoaiSanPham">
                                    @foreach($loaisanpham as $lsp)
                                        <option value="{{$lsp->id}}">{{$lsp->tenloaisanpham}}</option>
                                    @endforeach    
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Thương Hiệu</label>
                                <select class="form-control" name="ThuongHieu" id="ThuongHieu">
                                    @foreach($thuonghieu as $th)
                                        <option value="{{$th->id}}">{{$th->tenthuonghieu}}</option>
                                    @endforeach    
                                </select>
                            </div>
                            
                            <button type="submit" class="btn btn-default">Thêm</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
</div>
@endsection

{{-- @section('script')
    <script>
        $(document).ready(function(){
            $("#LoaiSanPham").change(function(){
                var idloaisanpham = $(this).val();
                $.get("ajax/thuonghieu/"+idloaisanpham,function(data){
                $("#ThuongHieu").html(data);
                   
                });
            });
        });
    </script>
@endsection --}}