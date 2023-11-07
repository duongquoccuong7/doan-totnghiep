<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.layout.head')
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
  @include('admin.layout.sidebar')
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="" class="nav-link">Home</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
    <div class="content-wrapper">
      <section class="content">
        <div class="container-fluid">
        @include('admin.layout.alert')
          <div class="row">
            <div class="col-md-12">
              <div class="card card-primary mt-3">    
                <div class="card-header">
                  <h3 class="card-title">{{$title}}</h3>
                </div>
                @yield('content')
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
  @include('admin.layout.foot')
  <meta name="csrf-token" content="{{ csrf_token() }}">
</body>
</html>
