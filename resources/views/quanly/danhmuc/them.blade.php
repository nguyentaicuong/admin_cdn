@extends('quanly.layout.index')
@section('content')
<div class="col-lg-7" style="padding-bottom:120px">
    @if(count($errors) >0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
                {{$err}}<br>
            @endforeach
        </div>  
    @endif


    <form action="quanly/danhmuc/them" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>

        <div class="form-group">
            <label>Tên danh mục</label>
            <input class="form-control" name="tendm" placeholder="Nhập tên danh mục" />
        </div>

        <div class="form-group">
            <label>Hình danh mục</label>
            <input type="file" name="hinh">
        </div>

        <button type="submit" class="btn btn-default">Thêm</button>
        <button type="reset" class="btn btn-default">Làm mới</button>
    </form>
</div>
@endsection