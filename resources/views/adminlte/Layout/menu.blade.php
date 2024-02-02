<aside class="main-sidebar sidebar-secondary-light  elevation-4">
    <!-- Brand Logo -->
    <div class="mt-3 ml-3">
        <a href="{{ asset('adminlte/index3.html') }}">
            <img src="{{ asset('adminlte/dist/img/logo1.png') }}">
        </a>
    </div>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- SidebarSearch Form -->
        <div class="form-inline mt-5">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
            <div class="sidebar-search-results">
                <div class="list-group"><a href="#" class="list-group-item">
                        <div class="search-title"><strong class="text-light"></strong>N<strong
                                class="text-light"></strong>o<strong class="text-light"></strong> <strong
                                class="text-light"></strong>e<strong class="text-light"></strong>l<strong
                                class="text-light"></strong>e<strong class="text-light"></strong>m<strong
                                class="text-light"></strong>e<strong class="text-light"></strong>n<strong
                                class="text-light"></strong>t<strong class="text-light"></strong> <strong
                                class="text-light"></strong>f<strong class="text-light"></strong>o<strong
                                class="text-light"></strong>u<strong class="text-light"></strong>n<strong
                                class="text-light"></strong>d<strong class="text-light"></strong>!<strong
                                class="text-light"></strong></div>
                        <div class="search-path"></div>
                    </a></div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Tuyển dụng
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('nhansu.danhSachUngVien') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ứng viên</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('nhansu.nhan-vien.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Nhân viên</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fa fa-cogs"></i>
                        <p>
                            Cấu hình danh mục
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('nhansu.chi-nhanh.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Chi nhánh</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('nhansu.khoa-phong-ban.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Phòng ban</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('nhansu.loai-nhan-vien.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Loại nhân viên</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('nhansu.loai-thong-bao.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Loại thông báo</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
