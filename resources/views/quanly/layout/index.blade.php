<!DOCTYPE html>
<head>
<title>Admin</title>
<base href="{{asset('')}}">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="admin_public/css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="admin_public/css/style.css" rel='stylesheet' type='text/css' />
<link href="admin_public/css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="admin_public/css/font.css" type="text/css"/>
<link href="admin_public/css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="admin_public/css/morris.css" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="admin_public/css/monthly.css">
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="admin_public/js/jquery2.0.3.min.js"></script>
<script src="admin_public/js/raphael-min.js"></script>
<!-- <script src="admin_public/js/morris.js"></script> -->

{{-- trình soạn thảo --}}
    <script type="text/javascript" language="javascript" src="admin_public/ckeditor/ckeditor.js" ></script>
</head>
<body>

<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="index.html" class="logo">
        Admin
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<!-- THÔNG BÁO -->
<div class="nav notify-row" id="top_menu">
    <ul class="nav top-menu">
        <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                <i class="fa fa-bell-o"></i>
                <span class="badge bg-warning">3</span>
            </a>
            <ul class="dropdown-menu extended notification">
                <li>
                    <p>Notifications</p>
                </li>
                <li>
                    <div class="alert alert-info clearfix">
                        <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                        <div class="noti-info">
                            <a href="#"> Server #1 overloaded.</a>
                        </div>
                    </div>
                </li>
            </ul>
        </li>
    </ul>
</div>


<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            @if(Auth::check())
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="https://res.cloudinary.com/banhang/image/upload/v1595322897/baiviet/bv2_e5ue1s.png">
                <span class="username">{{Auth::user()->full_name}}</span>
                <b class="caret"></b>
            </a>
        
            <ul class="dropdown-menu extended logout">
                <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="quanly/users/sua/ {{Auth::user()->id}}"><i class="fa fa-cog"></i>Cài đặt</a></li>
                <li><a href="quanly/dangxuat"><i class="fa fa-key"></i>Đăng xuất</a></li>
            </ul>
            @endif
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">

                <li class="sub-menu">
                    <a href="quanly/donhang/danhsach">
                        <i class="fa fa-th"></i>
                        <span>Đơn Hàng</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-th"></i>
                        <span>Sản Phẩm</span>
                    </a>
                    <ul class="sub">
                        <li><a href="quanly/sanpham/danhsach">Danh Sách Sản Phẩm</a></li>
                        <li><a href="quanly/sanpham/them">Thêm Sản Phẩm</a></li>
                    </ul>
                </li>
            
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-th"></i>
                        <span>Danh Mục</span>
                    </a>
                    <ul class="sub">
                        <li><a href="quanly/danhmuc/danhsach">Danh Sách Danh Mục</a></li>
                        <li><a href="quanly/danhmuc/them">Thêm Danh Mục</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-th"></i>
                        <span>Loại Sản Phẩm</span>
                    </a>
                    <ul class="sub">
                        <li><a href="quanly/loaisanpham/danhsach">Danh Sách Loại Sản Phẩm</a></li>
                        <li><a href="quanly/loaisanpham/them">Thêm Loại Sản Phẩm</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-th"></i>
                        <span>Thương Hiệu</span>
                    </a>
                    <ul class="sub">
                        <li><a href="quanly/thuonghieu/danhsach">Danh Sách Thương Hiệu</a></li>
                        <li><a href="quanly/thuonghieu/them">Thêm Thương Hiệu</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-th"></i>
                        <span>Quảng Cáo</span>
                    </a>
                    <ul class="sub">
                        <li><a href="quanly/quangcao/danhsach">Danh Sách Quảng Cáo</a></li>
                        <li><a href="quanly/quangcao/them">Thêm Quảng Cáo</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-th"></i>
                        <span>Bài Viết Thương Hiệu</span>
                    </a>
                    <ul class="sub">
                        <li><a href="quanly/baiviet/danhsach">Danh Sách Bài Viết</a></li>
                        <li><a href="quanly/baiviet/them">Thêm Bài Viết</a></li>
                    </ul>
                </li>


                <li class="sub-menu">
                    <a href="quanly/comment/danhsach">
                        <i class="fa fa-th"></i>
                        <span>Bình Luận</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-th"></i>
                        <span>Users</span>
                    </a>
                    <ul class="sub">
                        <li><a href="quanly/users/danhsach">Danh Sách Users</a></li>
                        <li><a href="quanly/users/them">Thêm Users</a></li>
                    </ul>
                </li>

            </ul>        
        </div>
    </div>
</aside>


<section id="main-content">
    <section class="wrapper">
        @yield('content')
    </section>
</section>

<script src="admin_public/js/bootstrap.js"></script>
<script src="admin_public/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="admin_public/js/scripts.js"></script>
<script src="admin_public/js/jquery.slimscroll.js"></script>
<script src="admin_public/js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="admin_public/js/jquery.scrollTo.js"></script>

    <!-- calendar -->
    <script type="text/javascript" src="admin_public/js/monthly.js"></script>
    <script type="text/javascript">
        $(window).load( function() {

            $('#mycalendar').monthly({
                mode: 'event',
                
            });

            $('#mycalendar2').monthly({
                mode: 'picker',
                target: '#mytarget',
                setWidth: '250px',
                startHidden: true,
                showTrigger: '#mytarget',
                stylePast: true,
                disablePast: true
            });

        switch(window.location.protocol) {
        case 'http:':
        case 'https:':
        // running on a server, should be good.
        break;
        case 'file:':
        alert('Just a heads-up, events will not work when run locally.');
        }

        });
    </script>
    <!-- //calendar -->
    @yield('script')
</body>
</html>
