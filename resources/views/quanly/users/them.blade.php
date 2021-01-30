@extends('quanly.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thêm User
                        </h1>
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

                        <form action="quanly/users/them" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                            <div class="form-group">
                                <label>Họ Tên</label>
                                <input name="name" class="form-control"  placeholder="Nhập họ tên" />
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" class="form-control"  placeholder="Nhập Email" />
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu" />
                            </div>
                            <div class="form-group">
                                <label>Nhập lại Password</label>
                                <input type="password" name="passwordAgain" class="form-control"  placeholder="Nhập lại mật khẩu" />
                            </div>

                            <div class="form-group">
                                <label>Số Điện Thoại</label>
                                <input name="sdt" class="form-control"  placeholder="Nhập Số điện thoại" />
                            </div>

                            <div class="form-group">
                                <label>Địa Chỉ</label>
                                <input name="diachi" class="form-control"  placeholder="Nhập Địa Chỉ" />
                            </div>

                            <div class="form-group">
                                <label>Quyền</label
                                    >
                                <label class="radio-inline">
                                    <input name="quyen" value="0" type="radio" checked="">Thường
                                </label>

                                <label class="radio-inline">
                                    <input name="quyen" value="1"  type="radio">Admin
                                </label>
                            </div>
                            
                            <button type="submit" class="btn btn-default">Thêm</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
</div>
@endsection