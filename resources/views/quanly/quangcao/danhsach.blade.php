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
                <th>Hình ẢNH</th>
                <th>Thương Hiệu</th>
                <th>Danh Mục</th>
                <th>Sửa Loại Sản Phẩm</th>
                <th>Xóa Loại</th>
            </tr>       
        </thead>
        <tbody>
            @foreach($quangcao as $qc)
            <tr class="odd gradeX" align="center">
                <td>{{$qc->id}}</td>
                <td><img width="100px" src="{{$qc->hinhanh}}"></td>

                @if($qc->idthuonghieu == NULL){
                    <td>0</td>
                }@else{
                <td>{{$qc->thuonghieu->tenthuonghieu}}</td>
                }@endif

                @if($qc->iddanhmuc == NULL){
                    <td>0</td>
                }@else{
                <td>{{$qc->danhmuc->tendanhmuc}}</td>
                }@endif
                
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="quanly/quangcao/sua/{{$qc->id}}">Sửa</a></td>
                <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="quanly/quangcao/xoa/{{$qc->id}}"> Xóa</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row" style="text-align: center;">{{$quangcao->links()}}</div>
</div>
@endsection
