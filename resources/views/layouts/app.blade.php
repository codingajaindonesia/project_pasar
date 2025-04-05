<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Finance Managemen</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{url('assets')}}/images/favicon.ico">
        <!-- Sweet Alert-->
        <link href="{{url('assets')}}/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
        <!-- Bootstrap Css -->
        <link href="{{url('assets')}}/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{url('assets')}}/css/icons.min.css" rel="stylesheet" type="text/css" />

    <link href="{{ url('assets') }}/libs/toastr/build/toastr.min.css" rel="stylesheet">
        <!-- App Css-->
        <link href="{{url('assets')}}/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        @yield('css')
    </head>

    <body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{url('assets')}}/images/logo.svg" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{url('assets')}}/images/logo-dark.png" alt="" height="17">
                                </span>
                            </a>

                            <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{url('assets')}}/images/logo-light.svg" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{url('assets')}}/images/logo-light.png" alt="" height="19">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                   

                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-inline-block d-lg-none ms-2">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-magnify"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-search-dropdown">
        
                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>



                        <div class="dropdown d-none d-lg-inline-block ms-1">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                                <i class="bx bx-fullscreen"></i>
                            </button>
                        </div>


                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="{{url('assets')}}/images/users/avatar-1.jpg"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{ auth()->user()->name }}</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item" href="#"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">Profile</span></a>
                                <a class="dropdown-item" href="#"><i class="bx bx-lock-open font-size-16 align-middle me-1"></i> <span key="t-lock-screen">Lock screen</span></a>
                                <div class="dropdown-divider"></div>
                                <form action="{{ url('auth/logout') }}" method="POST">
                                    @csrf
                                <button class="dropdown-item text-danger" type="submit"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Logout</span></button>
                            </form>
                            </div>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                                <i class="bx bx-cog bx-spin"></i>
                            </button>
                        </div>

                    </div>
                </div>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li>
                                <a href="{{ url('/') }}" class="waves-effect">
                                    <i class="bx bx-home-circle"></i>
                                    <span key="t-dashboards">Dashboards</span>
                                </a>
                             
                            </li>
                            @if (auth()->user()->role == 'admin')
                                
                            <li class="menu-title" key="t-menu">Data Master</li>

                            <li>
                                <a href="{{ url('locations') }}" class="waves-effect">
                                    <i class="bx bx-store-alt "></i>
                                    <span key="t-categories">Lokasi</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ url('tenants') }}" class="waves-effect">
                                    <i class="bx bxs-user-detail"></i>
                                    <span key="t-categories">Penyewa</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('users') }}" class="waves-effect">
                                    <i class="bx bx-user-circle"></i>
                                    <span key="t-users">Users</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('category') }}" class="waves-effect">
                                    <i class="bx bx-task"></i>
                                    <span key="t-categories">Kategori</span>
                                </a>
                            </li>
                            
                            @endif

                           

                            <li class="menu-title" key="t-apps">Main Menu</li>

                
                            @if (auth()->user()->role == 'admin' || auth()->user()->role == 'staff')
                            <li>
                           
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-briefcase-alt-2"></i>
                                    <span key="t-transaction">Transaksi</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ url('transactions-income') }}" key="t-tui-calendar">Pemasukan</a></li>
                                    <li><a href="{{ url('transactions-expense') }}" key="t-full-calendar">Pengeluaran</a></li>
                                </ul>
                            </li>

                            <li>
                           
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-chat"></i>
                                    <span key="t-report">Report</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ url('report/income') }}" key="t-tui-calendar">Pemasukan</a></li>
                                    <li><a href="{{ url('report/expense') }}" key="t-full-calendar">Pengeluaran</a></li>
                                    <li><a href="{{ url('report/all') }}" key="t-full-calendar">Semua Transaksi</a></li>
                                </ul>
                            </li>
                            @endif

                            

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
                        @yield('content')
                      </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <!-- Transaction Modal -->
                <div class="modal fade transaction-detailModal" tabindex="-1" role="dialog" aria-labelledby="transaction-detailModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="transaction-detailModalLabel">Order Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="mb-2">Product id: <span class="text-primary">#SK2540</span></p>
                                <p class="mb-4">Billing Name: <span class="text-primary">Neal Matthews</span></p>

                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap">
                                        <thead>
                                            <tr>
                                                <th scope="col">Product</th>
                                                <th scope="col">Product Name</th>
                                                <th scope="col">Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">
                                                    <div>
                                                        <img src="{{url('assets')}}/images/product/img-7.png" alt="" class="avatar-sm">
                                                    </div>
                                                </th>
                                                <td>
                                                    <div>
                                                        <h5 class="text-truncate font-size-14">Wireless Headphone (Black)</h5>
                                                        <p class="text-muted mb-0">$ 225 x 1</p>
                                                    </div>
                                                </td>
                                                <td>$ 255</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <div>
                                                        <img src="{{url('assets')}}/images/product/img-4.png" alt="" class="avatar-sm">
                                                    </div>
                                                </th>
                                                <td>
                                                    <div>
                                                        <h5 class="text-truncate font-size-14">Phone patterned cases</h5>
                                                        <p class="text-muted mb-0">$ 145 x 1</p>
                                                    </div>
                                                </td>
                                                <td>$ 145</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <h6 class="m-0 text-right">Sub Total:</h6>
                                                </td>
                                                <td>
                                                    $ 400
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <h6 class="m-0 text-right">Shipping:</h6>
                                                </td>
                                                <td>
                                                    Free
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <h6 class="m-0 text-right">Total:</h6>
                                                </td>
                                                <td>
                                                    $ 400
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end modal -->

               
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Skote.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Design & Develop by Themesbrand
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title d-flex align-items-center px-3 py-4">
            
                    <h5 class="m-0 me-2">Settings</h5>

                    <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                </div>

                <!-- Settings -->
                <hr class="mt-0" />
                <h6 class="text-center mb-0">Choose Layouts</h6>

                <div class="p-4">
                    <div class="mb-2">
                        <img src="{{url('assets')}}/images/layouts/layout-1.jpg" class="img-thumbnail" alt="layout images">
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked>
                        <label class="form-check-label" for="light-mode-switch">Light Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="{{url('assets')}}/images/layouts/layout-2.jpg" class="img-thumbnail" alt="layout images">
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch">
                        <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="{{url('assets')}}/images/layouts/layout-3.jpg" class="img-thumbnail" alt="layout images">
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="rtl-mode-switch">
                        <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="{{url('assets')}}/images/layouts/layout-4.jpg" class="img-thumbnail" alt="layout images">
                    </div>
                    <div class="form-check form-switch mb-5">
                        <input class="form-check-input theme-choice" type="checkbox" id="dark-rtl-mode-switch">
                        <label class="form-check-label" for="dark-rtl-mode-switch">Dark RTL Mode</label>
                    </div>

            
                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="{{url('assets')}}/libs/jquery/jquery.min.js"></script>
        <script src="{{url('assets')}}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="{{url('assets')}}/libs/metismenu/metisMenu.min.js"></script>
        <script src="{{url('assets')}}/libs/simplebar/simplebar.min.js"></script>
        <script src="{{url('assets')}}/libs/node-waves/waves.min.js"></script>
        <!-- Sweet Alerts js -->
        <script src="{{url('assets')}}/libs/sweetalert2/sweetalert2.min.js"></script>
        
        <script src="{{ url('assets') }}/libs/toastr/build/toastr.min.js"></script>
        <script src="{{url('assets')}}/js/app.js"></script>
        <script src="{{url('assets')}}/js/additional.js"></script>
        <script>
        @if (Session::has('status'))
            toastr.success("{{ Session::get('status') }}", "Success", {
                "progressBar": true
            });
        @endif

        @if (Session::has('error'))
            toastr.error("{{ Session::get('error') }}", "Error", {
                "progressBar": true
            });
        @endif
            </script>
        @yield('js')
       

        <!-- App js -->
    </body>

</html>