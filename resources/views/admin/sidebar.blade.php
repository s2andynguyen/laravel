<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="/my-assets/img/logo/logo.png" alt="TunLuxury Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text text-warning">Tun Luxury</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-center align-items-center">
            <div class="image__wrapper">
                <img src="/my-assets/img/avatar/admin-avt.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info sidebar-admin__info text-light">
                @php
                    use App\Lib\Helper;
                    $info = Helper::getUserInfo();
                @endphp
                @if ($info)
                    <p>{{ $info['username'] }}</p>
                @endif
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="/admin/main" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item menu-is-opening menu-open">
                    <a href="#" class="nav-link d-flex align-content-center">
                        <img src="/my-assets/img/icons/manage.png" alt="" class="align-self-center"
                            width="18px">
                        <p class="ms-2">
                            Quản lí sản phẩm
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: block;">
                        <li class="nav-item">
                            <a href="/admin/product/list" class="nav-link d-flex align-content-center">
                                <img src="/my-assets/img/icons/list.png" alt="" class="align-self-center me-2"
                                    width="18px">
                                <p>Danh sách sản phẩm</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/product/add" class="nav-link d-flex align-content-center">
                                <img src="/my-assets/img/icons/add.png" alt="" class="align-self-center me-2"
                                    width="18px">
                                <p>Thêm sản phẩm</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item menu-is-opening menu-open">

                    <a href="#" class="nav-link d-flex align-content-center">
                        <img src="/my-assets/img/icons/tags-category.png" alt="" class="align-self-center"
                            width="18px">
                        <p class="ms-2">
                            Quản lí danh mục
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: block;">
                        <li class="nav-item">
                            <a href="/admin/category/list" class="nav-link d-flex align-content-center">
                                <img src="/my-assets/img/icons/list.png" alt="" class="align-self-center me-2"
                                    width="18px">
                                <p>Danh sách danh mục</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/category/add" class="nav-link d-flex align-content-center">
                                <img src="/my-assets/img/icons/add.png" alt="" class="align-self-center me-2"
                                    width="18px">
                                <p>Thêm danh mục</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        <div class="mt-3">
            <a href="/admin/logout" class="btn btn-secondary w-50">Log out</a>
        </div>
    </div>
    <!-- /.sidebar -->
</aside>
