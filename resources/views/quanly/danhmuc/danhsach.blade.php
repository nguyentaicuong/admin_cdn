@extends('quanly.layout.index')
@section('content')
<!-- Page Content -->
<div class="panel panel-default">
    <div class="panel-heading">
        Danh Mục
    </div>
    <table class="table table-bordered table-hover" id="dataTables-example">
        <thead >
            <tr align="center">
                <th>ID</th>
                <th>Tên Danh Mục</th>
                <th>Hình Danh Mục</th>
                <th>Sửa Danh Mục</th>
                <th>Xóa Danh Mục</th>
            </tr>       
        </thead>
        <tbody>
            @foreach($danhmuc as $dm)
            <tr class="odd gradeX" align="center">
                <td>{{$dm->id}}</td>
                <td>{{$dm->tendanhmuc}}</td>
                <td><img width="100px" src="{{$dm->hinh}}"></td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="quanly/danhmuc/sua/{{$dm->id}}">Sửa</a></td>
                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="quanly/danhmuc/xoa/{{$dm->id}}"> Xóa</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row" style="text-align: center;">{{$danhmuc->links()}}</div>
</div>
</div>
@endsection
