@extends('quanly.layout.index')
@section('content')
<!-- Page Content -->
<div class="panel panel-default">
    <div class="panel-heading">
        Loại Sản Phẩm
    </div>
    <table class="table table-bordered table-hover" id="dataTables-example">
        <thead >
            <tr align="center">
                <th>ID</th>
                <th>Tên Thương Hiệu</th>
                <th>Nội Dung</th>
                <th>Hình ẢNH</th>
                <th>Sửa Loại Sản Phẩm</th>
                <th>Xóa Loại</th>
            </tr>       
        </thead>
        <tbody>
            @foreach($baiviet as $bv)
            <tr class="odd gradeX" align="center">
                <td>{{$bv->id}}</td>
                <td>{{$bv->thuonghieu->tenthuonghieu}}</td>
                <td>{{$bv->noidung}}</td>
                <td><img width="100px" src="{{$bv->hinhanh}}"></td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="quanly/baiviet/sua/{{$bv->id}}">Sửa</a></td>
                <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="quanly/baiviet/xoa/{{$bv->id}}">Xóa</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
