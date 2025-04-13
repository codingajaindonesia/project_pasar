@extends('layouts/app')
@section('content')


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Profile User</h4>
          
                @if (isset($user))
                    <form id="updateForm" method="POST" enctype="multipart/form-data" action="{{ url('profile/'.$user->id) }}" name="updateForm" data-note="Apakah anda yakin akan merubah data {{ $user->title }} ini ?">
                        @method('PUT')
                @else
                    <form id="submitForm" method="POST" action="{{ url('users') }}" name="submitForm" enctype="multipart/form-data">
                    
                @endif
                    @csrf
                    
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Profile Picture</label>
                        <div class="col-md-4">
                            @if(isset($user))
                                <img src="{{ asset('storage/'.$user->avatar) }}" alt="" width="100px" height="100px">
                            @endif
                            <input  class="form-control mt-2" type="file" placeholder="Masukkan nama user ...." name="avatar" 
                            id="example-text-input"> 
                        </div>
                      
                    </div>
                
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Nama</label>
                        <div class="col-md-10">
                            <input required class="form-control" type="text" placeholder="Masukkan nama user ...." name="name" value="@if(isset($user)){{$user->name}}@endif"
                                id="example-text-input"> 
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Username</label>
                        <div class="col-md-10">
                            <input required class="form-control" type="text" placeholder="Masukkan username user ...." name="username" value="@if(isset($user)){{$user->username}}@endif"
                                id="example-text-input"> 
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Email</label>
                        <div class="col-md-10">
                            <input required class="form-control" type="email" placeholder="Masukkan email user ...." name="email" value="@if(isset($user)){{$user->email}}@endif"
                                id="example-text-input"> 
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">No. Telepon</label>
                        <div class="col-md-10">
                            <input required class="form-control" type="text" placeholder="Masukkan no. telepon user ...." name="phone" value="@if(isset($user)){{$user->phone}}@endif"
                                id="example-text-input"> 
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Alamat</label>
                        <div class="col-md-10">
                            <textarea required class="form-control" type="text" placeholder="Masukkan alamat user ...." name="address">@if(isset($user)){{$user->address}}@endif</textarea>
                        </div>
                    </div>
                  

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Password</label>
                        <div class="col-md-10">
                            <input @if(!isset($user)) required  @endif class="form-control" type="password" placeholder="Masukkan password user ...." name="password" value=""
                                id="example-text-input"> 
                               @if(isset($user))  <p class="text-muted">* Kosongkan jika tidak ingin mengubah password</p> @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Konfirmasi Password</label>
                        <div class="col-md-10">
                            <input @if(!isset($user)) required  @endif class="form-control" type="password" placeholder="Masukkan konfirmasi password user ...." name="password_confirmation" value=""
                                id="example-text-input"> 
                                @if(isset($user))  <p class="text-muted">* Kosongkan jika tidak ingin mengubah password</p> @endif
                        </div>
                    </div>
                    
                    
                    <div class="mb-3 ">
                        <hr>
                        <a class="btn btn-warning w-md" href="#" onclick="window.history.back()">Kembali</a>
                        <button type="submit" class="btn btn-primary w-md"> Update Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->


@endsection