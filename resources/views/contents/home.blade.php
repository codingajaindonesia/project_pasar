<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Pasar</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{url('assets')}}/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="{{url('assets')}}/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{url('assets')}}/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{url('assets')}}/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <style>
.bg-with-overlay {
    position: relative;
    background-image: url('{{ url('assets/images/background.png') }}');
    background-size: cover;
    background-position: center;
    min-height: 100vh;
}

.bg-with-overlay::before {
    content: "";
    position: absolute;
    inset: 0;
    background: rgba(255, 255, 255, 0.7); /* Putih transparan */
    z-index: 0;
}

/* Pastikan semua konten tetap terlihat di atas overlay */
.account-pages {
    position: relative;
    z-index: 1;
}
</style>


    </head>

    <body class="bg-with-overlay">
       
<div class="account-pages " >

    <div class="container ">
        <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">
                    <div class="bg-primary bg-soft">
                        <div class="row">
                            <div class="col-md-12  align-center">
                                {{-- <div class="text-primary p-4">
                                    <h5 class="text-primary">Selamat Datang</h5>
                                    <p>Perumda Pasar Sewakadarma Kota Denpasar</p>
                                </div> --}}
                          <center> <img src="assets/images/header.png" style="width: 70%" alt="" class="img-fluid"></center>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0"> 
                        <div class="auth-logo">
                        </div>
                        <div class="p-2">
                            <div class="d-flex align-items-center mt-2">
                                <div class="text-center me-3">
                                    <a href="{{ url('login') }}">
                                        <img src="{{ asset('assets/images/login.png') }}" alt="Login" class="img-fluid mb-2" style="max-width: 50px;">
                                    </a>
                                    <p class="mb-0">Login</p>
                                </div>
                                <div class="text-center me-3">
                                    <a href="{{ url('auth/forget-password') }}">
                                        <img src="{{ asset('assets/images/forgot-password.png') }}" alt="Lupa Password" class="img-fluid mb-2" style="max-width: 50px;">
                                    </a>
                                    <p class="mb-0">Lupa Password</p>
                                </div>
                            </div>
                        </div>
                        
    
                    </div>
                </div>
                <div class="mt-5 text-center">
                    
                    <div>
                        {{-- <p>© <script>document.write(new Date().getFullYear())</script> Skote. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p> --}}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
        <!-- JAVASCRIPT -->
        <script src="{{url('assets')}}/libs/jquery/jquery.min.js"></script>
        <script src="{{url('assets')}}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="{{url('assets')}}/libs/metismenu/metisMenu.min.js"></script>
        <script src="{{url('assets')}}/libs/simplebar/simplebar.min.js"></script>
        <script src="{{url('assets')}}/libs/node-waves/waves.min.js"></script>
        
        <!-- App js -->
        <script src="{{url('assets')}}/js/app.js"></script>
    </body>
</html>
