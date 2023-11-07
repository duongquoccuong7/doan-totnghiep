<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.head')
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="{{Route('index')}}" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">Sách</span>Online</h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Tìm kiếm sản phẩm">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <a href="" class="btn border">
                    <i class="fas fa-heart text-primary"></i>
                    <span class="badge">0</span>
                </a>
                <a href="" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge">0</span>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Danh Mục</a>

                                <div class="dropdown-menu rounded-0 m-0">
                                    @foreach($category as $cate)
                                    <a href="cart.html" class="dropdown-item">{{$cate->name}}</a>
                                    @endforeach
                                </div>

                            </div>
                            <a href="" class="nav-item nav-link">Giới Thiệu</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                            @if(Auth::check())
                            <a href="" class="nav-item nav-link">Hồ Sơ</a>
                            <a href="" class="nav-item nav-link">Đăng Xuất</a>
                            @else
                            {
                            <a href="{{Route('login')}}" class="nav-item nav-link">Đăng Nhập</a>
                            <a href="{{Route('register')}}" class="nav-item nav-link">Đăng Ký</a>
                            }
                            @endif
                        </div>
                    </div>

                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->
<hr>
    <!-- Navbar start -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" style="margin-left: 60px;"><a href="#">Trang Chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
            <li class="breadcrumb-item active" aria-current="page">{{$user->name}}</li>
        </ol>
    </nav>
    <!-- Navbar End -->
    <!-- Footer Start -->
    @include('home.foot')
</body>

</html>