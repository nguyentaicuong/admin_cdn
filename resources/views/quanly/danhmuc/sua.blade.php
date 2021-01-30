@extends('quanly.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">Món: {{$danhmuc->tendanhmuc}}</h3>
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

                        <form action="quanly/danhmuc/sua/{{$danhmuc->id}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                            <div class="form-group">
                                <label>Tên Danh Muc</label>
                                <input name="tendm" class="form-control" value="{{$danhmuc->tendanhmuc}}"/>
                            </div>

                            <div class="form-group">
                                <label>Hình</label>
                                <p><img width="400px" src="{{$danhmuc->hinh}}"></p>
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