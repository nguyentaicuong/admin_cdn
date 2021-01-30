@extends('quanly.layout.index')
@section('content')
<!-- Page Content -->
<div class="panel panel-default">
    <div class="panel-heading">
        Đơn Hàng
    </div>
    @if(session('thongbao'))
        <div class="alert alert-success">
            {{session('thongbao')}}
        </div>
    @endif
    <table class="table table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>ID</th>
                <th>Ngày Đặt</th>
                <th>Tên Khách Hàng</th>
                <th>Số Điện Thoại</th>
                <th>Email</th>
                <th>Địa Chỉ</th>
                <th>Trạng thái</th>
                <th>Xóa</th>
                <th>Xem chi tiết</th>
            </tr>
        </thead>
        <tbody>
            @foreach($donhang as $dh)
            <tr class="odd gradeX" align="center">
                <td>{{$dh->id}}</td>
                <td>{{$dh->created_at}}</td>
                <td>{{$dh->tenkhachhang}}</td>
                <td>{{$dh->sodienthoai}}</td>
                <td>{{$dh->email}}</td>
                <td>{{$dh->diachi}}</td>

                <td>
                    @if($dh->status ==1)
                        <a class="label-success label">Đã xử lý</a>
                    @else 
                        <a href="quanly/donhang/active/{{$dh->id}}" class="label-default label">Chờ xử lý</a>
                    @endif
                </td>  

                <td class="center">
                    <i class="fa fa-trash-o  fa-fw"></i><a href="quanly/donhang/xoa/{{$dh->id}}"> Xóa</a>
                </td>
                <td class="center"><i class="fa fa-eye"></i> 
                    <a class="md" data-id="{{$dh->id}}" href="quanly/donhang/view/{{$dh->id}}">Chi tiết</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row" style="text-align: center;">{{$donhang->links()}}</div>
    
</div>


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Đơn Hàng Mã ID= <b class="id"></b></h4>
        </div>
        <div class="modal-body" id="md-content">
         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
        </div>
      </div>
      
    </div>
</div> 
@endsection

@section('script')
    <script type="text/javascript">
        $(function(){
            $(".md").click(function(event){
                event.preventDefault();
                let $this = $(this);
                let url = $this.attr('href');
               

                $(".id").text('').text($this.attr('data-id'));
                // console.log(url);

                $("#myModal").modal('show');
                
                $.ajax({
                    url: url,
                }).done(function(result){
                    // console.log(result);
                    if(result)
                    {
                        $("#md-content").html('').append(result);
                    }
                });
            });
        })
    </script>
@endsection
