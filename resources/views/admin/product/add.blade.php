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
                                <li class="breadcrumb-item active">Thêm Sách</li>
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
                                <form action="{{Route('postthemsanpham')}}" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                    <div class="card-body">
                                        
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <label>Tên Sách</label>
                                                    <input type="text" name="name" class="form-control" placeholder="Nhập Tên Sách">
                                                </div>
                                                <div class="form-group">
                                                    <label>Mô Tả</label>
                                                    <textarea name="description" class="form-control" ></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Hình Ảnh</label>
                                                    <input type="file" class="form-control-file" name="image" id="upload">
                                                </div>                            
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Danh Mục</label>                                    
                                                    <select class="form-control" name="category_id">
                                                    @foreach($category as $cate)
                                                        <option value="{{$cate->id}}">{{$cate->name}}</option>
                                                        @endforeach
                                                        <option value=""></option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Nhà Xuất Bản</label>
                                                    <input type="text" name="producer" class="form-control" placeholder="Nhà Xuất Bản">
                                                </div>
                                                <div class="form-group">
                                                    <label>Tên Tác Giả</label>
                                                    <input type="text" name="author" class="form-control" placeholder="Nhập Tên Tác Giả">
                                                </div>
                                                <div class="form-group">
                                                    <label>Số Lượng Tồn</label>
                                                    <input type="text" name="quantity" class="form-control" placeholder="Nhập Số Lượng">
                                                </div>
                                                <div class="form-group">
                                                    <label>Giá Bán </label>
                                                    <input type="text" name="price" class="form-control" placeholder="Giá Bán">
                                                </div>
                                                <div class="form-group">
                                                    <label>Giá Khuyến Mãi</label>
                                                    <input type="text" name="price_sale" class="form-control" placeholder="Giá Khuyến Mãi">
                                                </div>
                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary">Thêm Danh Mục</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @csrf
                                </form>
                            </div>
            </section>
</body>
@include('admin.layout.foot')