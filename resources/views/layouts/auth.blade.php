<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Login </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Login Pasar" name="description" />
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
        @yield('content')
        <!-- end account-pages -->

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
