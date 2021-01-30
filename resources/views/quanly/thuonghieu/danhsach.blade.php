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
                <th>Hình Thương Hiệu</th>
                <th>Hình Bìa Thương Hiệu</th>
                <th>Danh Mục</th>
                <th>Sửa </th>
                <th>Xóa </th>
            </tr>       
        </thead>
        <tbody>
            @foreach($thuonghieu as $th)
            <tr class="odd gradeX" align="center">
                <td>{{$th->id}}</td>
                <td>{{$th->tenthuonghieu}}</td>
                <td><img width="100px" src="{{$th->hinhthuonghieu}}"></td>
                <td><img width="100px" src="{{$th->hinhbia}}"></td>
                <td>{{$th->danhmuc->tendanhmuc}}</td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="quanly/thuonghieu/sua/{{$th->id}}">Sửa</a></td>
                <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="quanly/thuonghieu/xoa/{{$th->id}}"> Xóa</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row" style="text-align: center;">{{$thuonghieu->links()}}</div>
</div>
@endsection
