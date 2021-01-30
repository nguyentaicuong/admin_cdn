@extends('quanly.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thêm Bài Viết
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

                        <form action="quanly/baiviet/them" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                            <div class="form-group">
                                <label>Tên Thương Hiệu</label>
                                <select class="form-control" name="ThuongHieu" id="ThươngHieu">
                                    @foreach($thuonghieu as $th)
                                        <option value="{{$th->id}}">{{$th->tenthuonghieu}}</option>
                                    @endforeach    
                                </select>
                            </div> 

                            <div class="form-group">
                                <label>Nội Dung Bài Viết</label>
                                <textarea name="noidung" id="demo" class="form-control ckeditor" rows="5"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <input type="file" name="hinh">
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