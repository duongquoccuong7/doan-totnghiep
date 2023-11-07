@include('admin.layout.head')
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('admin.layout.sidebar')
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <!-- <h1>Danh Mục</h1> -->
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="">Quản Trị Admin</a></li>
                                <li class="breadcrumb-item active">Thêm Cuppon</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="container-fluid">
                    @include('admin.layout.alert')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">{{$title}}</h3>
                                </div>
                                <form action="" method="POST">
                                    <div class="card-body">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                        <div class="form-group">
                                            <label>Tên Cuppon</label>
                                            <input type="text" name="title" class="form-control" placeholder="Nhập Tên Cuppon">
                                        </div>
                                        <div class="form-group">
                                            <label>Mô Tả</label>
                                            <input type="text" name="description" class="form-control" placeholder="Nhập Mô Tả">
                                        </div>
                                        <div class="form-group">
                                            <label>Gía Khuyến Mãi</label>
                                            <input type="text" name="price_cuppon" class="form-control" placeholder=" Nhập Giá Khuyến Mãi">
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Thêm Cuppon</button>
                                    </div>
                                    @csrf
                                </form>
                            </div>
            </section>
</body>
@include('admin.layout.foot')