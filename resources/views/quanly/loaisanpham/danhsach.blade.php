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
                <th>Tên Loại Sản Phẩm</th>
                <th>Hình ẢNH</th>
                <th>Danh Mục</th>
                <th>Sửa Loại Sản Phẩm</th>
                <th>Xóa Loại</th>
            </tr>       
        </thead>
        <tbody>
            @foreach($loaisanpham as $lsp)
            <tr class="odd gradeX" align="center">
                <td>{{$lsp->id}}</td>
                <td>{{$lsp->tenloaisanpham}}</td>
                <td><img width="100px" src="{{$lsp->hinhanh}}"></td>
                <td>{{$lsp->danhmuc->tendanhmuc}}</td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="quanly/loaisanpham/sua/{{$lsp->id}}">Sửa</a></td>
                <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="quanly/loaisanpham/xoa/{{$lsp->id}}"> Xóa</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row" style="text-align: center;">{{$loaisanpham->links()}}</div>
</div>
@endsection
