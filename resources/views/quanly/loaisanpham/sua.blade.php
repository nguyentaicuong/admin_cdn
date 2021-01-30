@extends('quanly.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">Loại Sản Phẩm: {{$loaisanpham->tenloaisanpham}}</h3>
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

                        <form action="quanly/loaisanpham/sua/{{$loaisanpham->id}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                            <div class="form-group">
                                <label>Tên Loại Sản Phẩm</label>
                                <input name="ten" class="form-control" value="{{$loaisanpham->tenloaisanpham}}"/>
                            </div>

                            <div class="form-group">
                                <label>Hình</label>
                                <p><img width="400px" src="{{$loaisanpham->hinhanh}}"></p>
                                <input type="file" name="hinh">
                            </div>

                            <div class="form-group">
                                <label>Danh Mục</label>
                                <select class="form-control" name="DanhMuc" id="DanhMuc">
                                    @foreach($danhmuc as $dm)
                                        <option 

                                            @if($loaisanpham->danhmuc->id == $dm->id)
                                                {{"selected"}}
                                            @endif

                                            value="{{$dm->id}}">{{$dm->tendanhmuc}}
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

