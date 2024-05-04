<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
        <img src="/template/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/template/admin/dist/img/anhdaidien.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
{{--                <a href="#" class="d-block">LUU HOANG LINH</a>--}}

                <a href="/admin/logout">
                    <div>{{auth()->user()->name}}</div>
                    <a href="/admin/logout"><i class="fas fa-user">&nbsp;</i>Logout</a>
                </a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Enter search..." aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/admin/main" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Home
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="fas fa-user"></i>
                        <p>
                            &nbsp; &nbsp;Customer Manager
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/customer/list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Customer List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Category
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/menus/add" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add new category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/menus/list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Category List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-store-alt"></i>
                        <p> Product
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/products/add" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add new product</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/products/list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Product List</p>
                            </a>
                        </li>

                    </ul>
                </li>


                        {{--SLIDER--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="#" class="nav-link">--}}
{{--                        <i class="nav-icon fas fa-images"></i>--}}
{{--                        <p> Slider--}}
{{--                            <i class="right fas fa-angle-left"></i>--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                    <ul class="nav nav-treeview">--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="/admin/sliders/add" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Add new slider</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="/admin/sliders/list" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Slider List</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}

{{--                    </ul>--}}
{{--                </li>--}}

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p> Order
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('order.index') }}?status=0" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>pending confirmation</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('order.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>confirmed</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('order.index') }}?status=2" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>delivered</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('order.index') }}?status=3" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>canceled order</p>
                            </a>
                        </li>

                    </ul>
                </li>

                {{--Promotion --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-user-tag"></i>
                        <p>
                            &nbsp; &nbsp;Promotion Manager
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/promotion/add" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Promotion Insert</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/promotion/list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Promotion List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{--STATISTICS--}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-chart-bar"></i>
                        <p>
                            &nbsp; &nbsp;Statistics
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('statistics.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Order statistics by sales</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('statistics.index2') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Order based statistics</p>
                            </a>
                        </li>
                    </ul>
                </li>

{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route('statistics.index') }}" class="nav-link">--}}
{{--                        <i class="nav-icon fas fa-chart-bar"></i>--}}
{{--                        <p> Thống Kê--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                </li>--}}

                {{--Comment--}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-comment"></i>
                        <p>
                            &nbsp; &nbsp;Comment Manager
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/comment/list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Comment List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{--Contact--}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-inbox"></i>
                        <p>
                            &nbsp; &nbsp;Contact Manager
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/contact/list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Contact List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{--THONG KE--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="/admin/thongke" class="nav-link">--}}
{{--                        <i class="fas fa-comment"></i>--}}
{{--                        <p>--}}
{{--                            &nbsp; &nbsp;Thống kê--}}
{{--                            <i class="right fas fa-angle-left"></i>--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                </li>--}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
