@extends('quanly.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">Người Dùng: {{$users->full_name}}</h3>
                    </div>
                    <!-- /.col-lg-12 -->

                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors) >0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>  
                        @endif

                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif

                        <form action="quanly/users/sua/{{$users->id}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                            <div class="form-group">
                                <label>Họ Tên</label>
                                <input name="name" class="form-control" value="{{$users->full_name}}"/>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Nhập địa chỉ email" value="{{$users->email}}" readonly="" /> {{--readonly: chỉ xem được không sửa được--}}
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="changePassword" id="changePassword">

                                <label>Đổi mật khẩu</label>
                                <input type="password" class="form-control password" name="password" placeholder="Nhập mật khẩu" value="" disabled=""  />
                            </div>
                            <div class="form-group">
                                <label>Nhập lại Password</label>
                                <input type="password" name="passwordAgain" class="form-control password"  placeholder="Nhập lại mật khẩu" disabled=""/>
                            </div>

                             <div class="form-group">
                                <label>Số Điện Thoại</label>
                                <input name="sdt" class="form-control" value="{{$users->phone}}"/>
                            </div>

                             <div class="form-group">
                                <label>Địa Chỉ</label>
                                <input name="diachi" class="form-control" value="{{$users->address}}"/>
                            </div>
                            
                            <div class="form-group">
                                <label>Quyền</label>
                                <label class="radio-inline">
                                    <input name="quyen"
                                        @if($users->quyen == 0)
                                            {{"checked"}}
                                        @endif
                                     value="0" type="radio" checked="">Thường
                                </label>

                                <label class="radio-inline">
                                    <input name="quyen" 
                                    @if($users->quyen == 1)
                                        {{"checked"}}
                                    @endif
                                    value="1"  type="radio">Admin
                                </label>
                            </div>


                    
                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection


@section('script')
    <script>
        $(document).ready(function(){
            $("#changePassword").change(function(){ 
                if($(this).is(":checked"))
                {
                    $(".password").removeAttr('disabled');
                }
                else
                {
                    $(".password").attr('disabled','');
                }
            });
        });
    </script>
@endsection

