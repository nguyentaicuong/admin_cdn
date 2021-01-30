@extends('quanly.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">Loại Sản Phẩm: {{$baiviet->id}}</h3>
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

                        <form action="quanly/baiviet/sua/{{$baiviet->id}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                            <div class="form-group">
                                <label>Tên Thương Hiệuc</label>
                                <select class="form-control" name="ThuongHieu" id="ThuongHieu">
                                    @foreach($thuonghieu as $th)
                                        <option 

                                            @if($baiviet->thuonghieu->id == $th->id)
                                                {{"selected"}}
                                            @endif

                                            value="{{$th->id}}">{{$th->tenthuonghieu}}
                                        </option>
                                    @endforeach    
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Nội Dung Bài Viết</label>
                                <textarea name="noidung" id="demo" class="form-control ckeditor" rows="5">{{$baiviet->noidung}}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Hình</label>
                                <p><img width="400px" src="{{$baiviet->hinhanh}}"></p>
                                <input type="file" name="hinh">
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

