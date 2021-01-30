@extends('quanly.layout.index')
@section('content')
<!-- Page Content -->
<div class="panel panel-default">
    <div class="panel-heading">
        Danh Sách Sản Phẩm
    </div>
    <table class="table table-bordered table-hover" id="dataTables-example">
        <thead >
            <tr align="center">
                <th>ID</th>
                <th>Sản Phẩm</th>
                <th>Giá</th>
                <th>Hình Ảnh</th>
                <th>Mô Tả</th>
                <th>Thương Hiệu</th>
                <th>Loại Sản Phẩm</th>
                <th>Sửa </th>
                <th>Xóa </th>
            </tr>       
        </thead>
        <tbody>
            @foreach($sanpham as $sp)
            <tr class="odd gradeX" align="center">
                <td>{{$sp->id}}</td>
                <td>{{$sp->tensanpham}}</td>
                <td>{{$sp->gia}}</td>
                <td><img width="100px" src="{{$sp->hinhanh}}"></td>
                <td>{{$sp->mota}}</td>
                <td>{{$sp->thuonghieu->tenthuonghieu}}</td>
                <td>{{$sp->loaisanpham->tenloaisanpham}}</td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="quanly/sanpham/sua/{{$sp->id}}">Sửa</a></td>
                <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="quanly/sanpham/xoa/{{$sp->id}}"> Xóa</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row" style="text-align: center;">{{$sanpham->links()}}</div>
</div>
@endsection
