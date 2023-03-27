<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ToHoney Admin | Dashboard</title>
        <link rel="icon" type="image/x-icon" href="https://www.zillurweb.com/wp-content/uploads/2022/10/cropped-z-web-fev-icon-32x32.png">

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{ asset('assets/https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
        {{-- ukit  --}}
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/uikit@3.15.10/dist/css/uikit.min.css" />
        <!-- iCheck -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
        <!-- JQVMap -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/jqvmap/jqvmap.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
        <!-- summernote -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css') }}">

        <!-- toster -->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

        <link rel="stylesheet" href="{{ asset('assets/richtexteditor/rte_theme_default.css') }}" />

        <style>
            nav .nav-sidebar .nav-item.manu_item a.nav-link.active {
                background-color: rgba(255,255,255,.1) !important;
                color: #fff;
            }

            nav .nav-sidebar .nav-item.manu_item a.nav-link.active:hover {
                background-color: rgba(255,255,255,.1) !important;
                color: #fff;
            }

            .nav-sidebar .nav-item.manu_item a.nav-link.active i.right{
                -webkit-transform: rotate(-90deg);
                transform: rotate(-90deg);
            }
            input[type="file" i] {
                padding: 4px;
            }
            .uk-lightbox{
                z-index: 2000 !important;
            }
        </style>
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper" >

            <!-- Preloader -->
            <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__shake" src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
            </div>

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="{{ url('dashboard') }}" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="#" class="nav-link">Contact</a>
                    </li>
                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <!-- Navbar Search -->
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

                    <!-- Messages Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                            <img src="{{ asset('assets/dist/img/user1-128x128.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                Brad Diesel
                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">Call me whenever you can...</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                            <img src="{{ asset('assets/dist/img/user8-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                John Pierce
                                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">I got your message bro</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                            <img src="{{ asset('assets/dist/img/user3-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                Nora Silvester
                                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">The subject goes here</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                        </div>
                    </li>
                    <!-- Notifications Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-envelope mr-2"></i> 4 new messages
                                <span class="float-right text-muted text-sm">3 mins</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-users mr-2"></i> 8 friend requests
                                <span class="float-right text-muted text-sm">12 hours</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-file mr-2"></i> 3 new reports
                                <span class="float-right text-muted text-sm">2 days</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                        </div>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                            <i class="fas fa-expand-arrows-alt"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
                            <i class="fas fa-th-large"></i>
                        </a>
                    </li> --}}
                    <!-- Logout Dropdown Menu -->

                    <li class="nav-item dropdown">
                        @php
                            $profile_image_menu = '';
                        @endphp
                        @foreach (sessionUser()->adminDetails as $details)
                            @php
                                $profile_image_menu = $details->img;
                            @endphp
                        @endforeach
                        <a class="nav-link" data-toggle="dropdown" href="#" style="padding: 2px;">
                            <img src="@if ($profile_image_menu != '') {{ asset('image/admin-profile/'.$profile_image_menu) }} @else {{ asset('default-image/default-user.png') }}  @endif" class="img-circle elevation-2" alt="User Image" style="height: 2.4rem; width: 2.4rem; border: 1px solid #ddd;">
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <div class="dropdown-divider"></div>
                            <div class="user-panel mt-3 mb-3 pb-0 pl-3 d-flex">
                                <div class="image pl-0">
                                    <img src="@if ($profile_image_menu != '') {{ asset('image/admin-profile/'.$profile_image_menu) }} @else {{ asset('default-image/default-user.png') }}  @endif" class="img-circle elevation-2" alt="User Image" style="height: 3.1rem; width: 3.1rem; border: 1px solid #ddd;">
                                </div>
                                <div class="info">
                                    <a href="" class="text-dark d-block">{{ sessionUser()->name }}</a>
                                    @foreach (sessionUser()->roles as $role)
                                        @php
                                            $role_name = $role->name;
                                            $role_id = $role->id;
                                        @endphp
                                    @endforeach
                                    <a href="{{ route('role.show', $role_id) }}" class="text-dark d-block" style="line-height: 14px; font-size: 14px; color: #6c757d !important;">
                                        {{ $role_name }}
                                    </a>
                                </div>

                            </div>
                            {{-- <div class="user-panel pb-3 mb-3 pl-3">

                            </div> --}}
                            <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('user.profile', sessionUser()->id) }}"> <i class="fas fa-user-alt"></i> Profile </a>
                            <div class="dropdown-divider"></div>
                                <a class="dropdown-item" data-widget="fullscreen" href="#" role="button"> <i class="fas fa-expand-arrows-alt"></i> Full Screen</a>
                            <div class="dropdown-divider"></div>
                                <a class="dropdown-item" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button"> <i class="fas fa-th-large"></i> Theme Settings </a>
                            <div class="dropdown-divider"></div>
                                {{-- <a class="dropdown-item" href="{{ route('password.request') }}"> <i class="fas fa-key"></i> Change Password</a>
                            <div class="dropdown-divider"></div> --}}
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"> <i class="fas fa-sign-out-alt"></i> {{ __('Log Out') }} </a>
                                </form>
                            <div class="dropdown-divider"></div>
                        </div>
                    </li>

                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="{{ route('dashboard') }}" class="brand-link">
                    <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">ToHoney Admin</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    {{-- <div class="user-panel mt-3 pb-1 mb-1 d-flex">
                        <div class="image">
                            <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="" class="d-block">{{ sessionUser()->name }}</a>
                        </div>
                    </div>
                    <div class="user-panel pb-3 mb-3 pl-3">
                        <a href="">Role :
                            @foreach (sessionUser()->roles as $role)
                                {{ $role->name }}
                            @endforeach
                        </a>
                    </div> --}}

                    <!-- SidebarSearch Form -->
                    <div class="form-inline mt-3">
                        <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
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

                            @can('Category View')
                                {{-- Categories menus  --}}
                                <li class="nav-item manu_item">
                                    <a href="#" class="nav-link @yield('category_active')">
                                        <i class="nav-icon fas fa-th-large"></i>
                                        <p>
                                            Categories
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview" style="@yield('category_treeview_active')">
                                        @can('Category Add')
                                            <li class="nav-item">
                                                <a href="{{ route('add_category') }}" class="nav-link @yield('category_add_active')">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Add Category</p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('Category View')
                                            <li class="nav-item">
                                                <a href="{{ url('categories') }}" class="nav-link @yield('category_view_active')">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>View Categories</p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('Category Trush View')
                                            <li class="nav-item">
                                                <a href="{{ url('categories/trush') }}" class="nav-link @yield('category_trush_active')">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Trushed Categories</p>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcan

                            @can('Sub Category View')
                                {{-- Sub Categories menus  --}}
                                <li class="nav-item manu_item">
                                    <a href="#" class="nav-link @yield('subcategory_active')">
                                        <i class="nav-icon fas fa-th"></i>
                                        <p>
                                            Sub Categories
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview" style="@yield('subcategory_treeview_active')">
                                        @can('Sub Category Add')
                                            <li class="nav-item">
                                                <a href="{{ route('subcategories_add') }}" class="nav-link @yield('subcategory_add_active')">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Add Sub Category</p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('Sub Category View')
                                            <li class="nav-item">
                                                <a href="{{ url('subcategoies') }}" class="nav-link @yield('subcategory_view_active')">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>View Sub Categories</p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('Sub Category Trush View')
                                            <li class="nav-item">
                                                <a href="{{ url('subcategoies/trush') }}" class="nav-link @yield('subcategory_trush_active')">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Trushed Sub Categories</p>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcan

                            @can('Color View')
                                {{-- Colors menus  --}}
                                <li class="nav-item manu_item">
                                    <a href="#" class="nav-link @yield('colors_active')">
                                        <i class="nav-icon fas fa-palette"></i>
                                        <p>
                                            Colors
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview" style="@yield('colors_treeview_active')">
                                        @can('Color Add')
                                            <li class="nav-item">
                                                <a href="{{ route('color_add') }}" class="nav-link @yield('colors_add_active')">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Add Color</p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('Color View')
                                            <li class="nav-item">
                                                <a href="{{ route('colors_view') }}" class="nav-link @yield('colors_view_active')">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>View Colors</p>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcan

                            @can('Size View')
                                {{-- Size menus  --}}
                                <li class="nav-item manu_item">
                                    <a href="#" class="nav-link @yield('sizes_active')">
                                        <i class="nav-icon fas fa-ruler-combined"></i>
                                        <p>
                                            Sizes
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview" style="@yield('sizes_treeview_active')">
                                        @can('Size Add')
                                            <li class="nav-item">
                                                <a href="{{ route('size_add') }}" class="nav-link @yield('sizes_add_active')">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Add Size</p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('Size View')
                                            <li class="nav-item">
                                                <a href="{{ route('sizes_view') }}" class="nav-link @yield('sizes_view_active')">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>View Sizes</p>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcan

                            @can('Product View')
                                {{-- Product menus  --}}
                                <li class="nav-item manu_item">
                                    <a href="#" class="nav-link @yield('product_active')">
                                        <i class="nav-icon fab fa-product-hunt"></i>
                                        <p>
                                            Products
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview" style="@yield('product_treeview_active')">
                                        @can('Product Add')
                                            <li class="nav-item">
                                                <a href="{{ route('add_product') }}" class="nav-link @yield('product_add_active')">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Add Products</p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('Product View')
                                            <li class="nav-item">
                                                <a href="{{ route('products') }}" class="nav-link @yield('product_view_active')">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>View Products</p>
                                                </a>
                                            </li>
                                        @endcan

                                        @can('Product Trash View')
                                            <li class="nav-item">
                                                <a href="{{ route('product_trush') }}" class="nav-link @yield('product_trush_view_active')">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Trush Products</p>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcan

                            @can('Coupon View')
                                {{-- Coupon Code Manu --}}
                                <li class="nav-item">
                                    <a href="#" class="nav-link @yield('coupon_active')">
                                        <i class="nav-icon fas fa-tags"></i>
                                        <p>
                                            Coupon
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview" style="@yield('coupon_treeview_active')">
                                        @can('Coupon Add')
                                            <li class="nav-item">
                                                <a href="{{ route('coupon.create') }}" class="nav-link  @yield('coupon_add_active')">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Add Coupon</p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('Coupon View')
                                            <li class="nav-item">
                                                <a href="{{ route('coupon.index') }}" class="nav-link  @yield('coupon_view_active')">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>View Coupon</p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('Coupon Trushed View')
                                            <li class="nav-item">
                                                <a href="{{ route('coupon.trashed') }}" class="nav-link  @yield('coupon_trush_active')">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Trashed Coupon</p>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcan

                            @can('Role View')
                                {{-- Role Management menus  --}}
                                <li class="nav-item manu_item">
                                    <a href="#" class="nav-link @yield('role_active')">
                                        <i class="nav-icon fab fa-critical-role"></i>
                                        <p>
                                            Role Management
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview" style="@yield('role_treeview_active')">
                                        <li class="nav-item">
                                            <a href="{{ route('role.index') }}" class="nav-link @yield('role_view_active')">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>View Role</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('role.admin.add') }}" class="nav-link @yield('assign_add_new_role_active')">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Add New Admin</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('role.assign.user') }}" class="nav-link @yield('assign_user_view_active')">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Assign Admin</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endcan

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-copy"></i>
                                    <p>
                                        Blank
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="pages/layout/top-nav.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Top Navigation</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Top Navigation + Sidebar</p>
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

            <!-- Content Wrapper. Contains page content -->

            @yield('content');

            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <strong>Copyright &copy; {{ date('Y') }} <a href="#">ToHoney Admin</a>.</strong>
                All rights reserved.
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
        <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
        $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- ChartJS -->
        <script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>
        <!-- Sparkline -->
        <script src="{{ asset('assets/plugins/sparklines/sparkline.js') }}"></script>
        <!-- JQVMap -->
        <script src="{{ asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
        <!-- jQuery Knob Chart -->
        <script src="{{ asset('assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
        <!-- daterangepicker -->
        <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
        <!-- Summernote -->
        <script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
        <!-- UIkit JS -->
        <script src="//cdn.jsdelivr.net/npm/uikit@3.15.10/dist/js/uikit.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/uikit@3.15.10/dist/js/uikit-icons.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('assets/dist/js/adminlte.js') }}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('assets/dist/js/demo.js') }}"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{ asset('assets/dist/js/pages/dashboard.js') }}"></script>

        {{-- toster js  --}}
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        {{-- ckbox js --}}
        <script src="{{ asset('assets/richtexteditor/rte.js') }}"></script>
        <script src="{{ asset('assets/richtexteditor/plugins/all_plugins.js') }}"></script>


        <script>
            @if (session('success'))
                Command: toastr["success"]("{{ session('success') }}")

                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
            @endif
            @if (session('warning'))
                Command: toastr["warning"]("{{ session('warning') }}")

                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
            @endif
            @if (session('error'))
                Command: toastr["error"]("{{ session('error') }}")

                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
            @endif
            @if (session('info'))
                Command: toastr["info"]("{{ session('info') }}")

                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
            @endif
        </script>


        @yield('footer_js');


    </body>
</html>
