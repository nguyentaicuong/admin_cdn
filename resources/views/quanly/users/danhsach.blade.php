@extends('quanly.layout.index')
@section('content')
<!-- Page Content -->
<div class="panel panel-default">
    <div class="panel-heading">
    Users
    </div>
    <table class="table table-bordered table-hover" id="dataTables-example">
        <thead >
            <tr align="center">
                <th>ID</th>
                <th>Họ Tên</th>
                <th>Email</th>
                <th>Mật Khẩu</th>
                <th>SĐT</th>
                <th>Địa Chỉ</th>
                <th>Quyền</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>       
        </thead>
        <tbody>
            @foreach($users as $u)
            <tr class="odd gradeX" align="center">
                <td>{{$u->id}}</td>
                <td>{{$u->full_name}}</td>
                <td>{{$u->email}}</td>
                <td>{{$u->password}}</td>
                <td>{{$u->phone}}</td>
                <td>{{$u->address}}</td>
                <td>{{$u->quyen}}</td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="quanly/users/sua/{{$u->id}}">Sửa</a></td>
                <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="quanly/users/xoa/{{$u->id}}"> Xóa</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row" style="text-align: center;">{{$users->links()}}</div>
</div>
@endsection
