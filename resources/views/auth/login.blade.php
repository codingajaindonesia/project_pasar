

@extends('layouts.auth')

@section('content')

<div class="account-pages ">
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
                        <div class="p-2">
                            <form class="form-horizontal" method="POST" action="{{ url('auth/login') }}">
                                @csrf

                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
                                   
                                </div>
        
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <div class="input-group auth-pass-inputgroup">
                                        <input type="password" name="password" class="form-control" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                                        <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                    </div>

                                     @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember-check">
                                    <label class="form-check-label" for="remember-check">
                                        Remember me
                                    </label>
                                </div>
                                
                                <div class="mt-3 d-grid">
                                
                                    @if (session()->has('error'))
                                        <div class="alert alert-danger" role="alert">
                                            {{ session()->get('error') }}
                                        </div>
                                        
                                    @endif
                                    @if (session()->has('success'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session()->get('success') }}
                                        </div>
                                        @endif
                                    @if (session()->has('warning'))
                                        <div class="alert alert-warning" role="alert">
                                            {{ session()->get('warning') }}
                                        </div>
                                        @endif
                                    @if (session()->has('info'))
                                        <div class="alert alert-info" role="alert">
                                            {{ session()->get('info') }}
                                        </div>
                                        @endif
                                    @if (session()->has('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session()->get('status') }}
                                        </div>
                                        @endif
                                        @if (session()->has('errors'))
                                        <div class="alert alert-danger" role="alert">
                                           
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </div>
                                    @endif
                                    <button class="btn btn-primary waves-effect waves-light" type="submit">  {{ __('Login') }}</button>
                               
                                </div>
    
                           

                                {{-- <div class="mt-4 text-center">
                                    <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock me-1"></i> Forgot your password?</a>
                                </div> --}}
                            </form>
                        </div>
    
                    </div>
                </div>
                <div class="mt-5 text-center">
                    
                    <div>
                        <p><a href="{{ url('auth/forget-password') }}" class="fw-medium text-primary"> Lupa Password </a> </p>
                        {{-- <p>© <script>document.write(new Date().getFullYear())</script> Skote. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p> --}}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
