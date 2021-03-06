@extends('quanly.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Loại Sản Phẩm
                            <small>Thêm</small>
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

                        <form action="quanly/loaisanpham/them" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                            <div class="form-group">
                                <label>Tên Loại Sản Phẩm</label>
                                <input name="ten" class="form-control"  placeholder="Nhập tên loại sản phẩm" />
                            </div>

                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <input type="file" name="hinh">
                            </div>

                            <div class="form-group">
                                <label>Danh Mục</label>
                                <select class="form-control" name="DanhMuc" id="DanhMuc">
                                    @foreach($danhmuc as $dm)
                                        <option value="{{$dm->id}}">{{$dm->tendanhmuc}}</option>
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