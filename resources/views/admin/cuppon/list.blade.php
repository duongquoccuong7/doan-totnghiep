<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.layout.head')
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <div class="sidebar">
        @include('admin.layout.sidebar')
      </div>
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1></h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="">Quản Trị Admin</a></li>
                <li class="breadcrumb-item active">Danh Sách Cuppon</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <section class="content">
        <div class="container-fluid">
        @include('admin.layout.alert')
          <div class="row">
            <div class="col-12">
              <!-- Main content -->
              <div class="invoice p-3 mb-3">
                <!-- title row -->
                <div class="row">
                  <div class="col-12">
                    <h4>
                      <i class="nav-icon fas fa-book"></i> Danh Sách Cuppon
                    </h4>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- Table row -->
                <div class="row">
                  <div class="col-12 table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Tên Cuppon</th>
                          <th> Mô Tả</th>
                          <th>Giá Giảm</th>
                          <th>Ngày Tạo</th>
                          <th>#</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($cuppon as $cup)
                        <tr>
                          <td>{{$cup->id}}</td>
                          <td>{{$cup->title}}</td>
                          <td>{{$cup->description}}</td>
                          <td>{{$cup->price_cuppon}}</td>
                          <td>{{$cup->created_at}}</td>
                          <td>
                            <a class=" btn btn-primary btn-sm" href="{{Route('postcuppon',['id'=>$cup])}}"><i class="fas fa-edit"></i></a>
                            <a href="{{Route('xoacuppon',['id'=>$cup])}}" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có muồn xóa, mà không thể khôi phục ?.')"><i class="fas fa-trash"></i></a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <!-- /.col -->
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer no-print">
    @include('admin.layout.foot')
  </footer>
  </div>
  <!-- ./wrapper -->
</body>

</html>