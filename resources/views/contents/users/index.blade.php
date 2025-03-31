@extends('layouts.app')
@section('css')
         <!-- DataTables -->
         <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
         <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
 
         <!-- Responsive datatable examples -->
         <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />     
 
@endsection
@section('js')

        
        <!-- Required datatable js -->
        <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="assets/libs/jszip/jszip.min.js"></script>
        <script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
        <script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
        
        <!-- Responsive examples -->
        <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="assets/js/pages/datatables.init.js"></script>    

        {{-- <script src="assets/js/app.js"></script> --}}
@endsection
@section('content')
 <!-- start page title -->
 <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Data Users</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Users</a></li>
                    <li class="breadcrumb-item active">Data </li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">User Data</h4>
                <p class="card-title-desc">Silahkan kelola data user sesuai dengan kebutuhan anda.
                </p>

                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                       
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>No. Telepon</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>


                    <tbody>
                        @foreach ($users as $u)
                        <tr>
                            <td>{{ $u->name }}</td>
                            <td>{{ $u->username }}</td>
                            <td>{{ $u->email }}</td>
                            <td>{{ $u->role }}</td>
                            <td>{{ $u->phone }}</td>
                            <td>{{ $u->address }}</td>
                            <td>
                                <a href="{{ url('users/'.$u->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ url('users/'.$u->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                          
                        </tr>
                        
                        @endforeach
                 
                 
                    </tbody>
                </table>
                <div class="mb-3 ">
                    <a href="{{ url('users/create') }}" class="btn btn-primary w-md">Tambah Data</a>
                </div>
                
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->


@endsection