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
                <th>Sản Phẩm</th>
                <th>Id Người Dùng</th>
                <th>Nội Dung</th>
                <th>Sao</th>
                <th>Xóa Comment</th>
            </tr>       
        </thead>
        <tbody>
            @foreach($comment as $cm)
            <tr class="odd gradeX" align="center">
                <td>{{$cm->id}}</td>
                <td>{{$cm->sanpham->tensanpham}}</td>
                <td>{{$cm->idusers}}</td>
                <td>{{$cm->noidung}}</td>
                <td>{{$cm->sao}}</td>
                <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="quanly/comment/xoa/{{$cm->id}}"> Xóa</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
