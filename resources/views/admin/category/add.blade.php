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
                                <li class="breadcrumb-item active">Thêm Danh Mục</li>
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
                                            <label>Tên Danh Mục</label>
                                            <input type="text" name="name" class="form-control" placeholder="Nhập Tên Danh Mục">
                                        </div>
                                        <div class="form-group">
                                            <label>Danh Mục Cha</label>
                                            <select class="form-control" name="parent_id">
                                                <option value="0">Danh Mục Cha</option>
                                                @foreach($category as $cate)
                                                <option value="{{$cate->id}}">{{$cate->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Thêm Danh Mục</button>
                                    </div>
                                    @csrf
                                </form>
                            </div>
            </section>
</body>
@include('admin.layout.foot')