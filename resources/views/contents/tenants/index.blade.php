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
            <h4 class="mb-sm-0 font-size-18">Data Penyewa</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Penyewa</a></li>
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

                <h4 class="card-title">Data Penyewa</h4>
                <p class="card-title-desc">Berikan data penyewa yang sesuai dengan data yang ada di sistem.
                </p>

                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th>Pasar</th>
                        <th>Mulai Sewa</th>
                        <th>Berakhir Sewa</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>No. Telepon</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                      
                    </tr>
                    </thead>


                    <tbody>
                        @foreach ($tenants as $c)
                        
                        <tr>
                            <td>{{ $c->location->name }}</td>
                            <td>{{date('d M Y', strtotime($c->start_date)) }}</td>
                            <td>{{date('d M Y', strtotime($c->end_date)) }}</td>
                            <td>{{ $c->user->name }}</td>
                            <td>{{ $c->user->username }}</td>
                            <td>{{ $c->user->email }}</td>
                            <td>{{ $c->user->phone }}</td>
                            <td>{{ $c->user->address }}</td>
                            <td>
                                <a href="{{ url('tenants/'.$c->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ url('tenants/'.$c->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        
                        @endforeach
                 
                 
                    </tbody>
                </table>
                <div class="mb-3 ">
                    <a href="{{ url('tenants/create') }}" class="btn btn-primary w-md">Tambah Data</a>
                </div>
                
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->


@endsection