

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
                          <center> <img src="{{url('/')}}/assets/images/header.png" style="width: 70%" alt="" class="img-fluid"></center>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0"> 
             
                        <div class="p-2">
                            <form class="form-horizontal" method="POST" action="{{ url('auth/reset-password') }}">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <input type="hidden" name="email" value="{{ $email }}">

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password ...">
                                   
                                </div>
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Masukkan ulang password ...">
                                   
                                </div>
                                

                             
                                <div class="mt-3 d-grid">
                                
                                    @if (session()->has('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session()->get('error') }}
                                    </div>
                                @endif
                                @if (session()->has('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session()->get('status') }}
                                </div>
                                @endif
                                    @if (session()->has('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif
                                    @if (session()->has('errors'))
                                    <div class="alert alert-danger" role="alert">
                                       
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </div>
                                @endif
                                 
                                    <button class="btn btn-primary waves-effect waves-light" type="submit">  {{ __('Reset Password') }}</button>
                               
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
                        {{-- <p>© <script>document.write(new Date().getFullYear())</script> Skote. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p> --}}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
