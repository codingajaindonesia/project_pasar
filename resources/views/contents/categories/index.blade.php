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
            <h4 class="mb-sm-0 font-size-18">Data Kategori</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Kategori</a></li>
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

                <h4 class="card-title">Kategori Transaksi</h4>
                <p class="card-title-desc">Berikan tanda kategori setiap transaksi yang berlangsung
                </p>

                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Tipe</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                      
                    </tr>
                    </thead>


                    <tbody>
                        @foreach ($categories as $c)
                        <tr>
                            <td>{{ $c->title }}</td>
                            <td>{{$c->types == "in" ? "Pemasukan" : "Pengeluaran"}}</td>
                            <td>{{$c->description}}</td>
                            <td>
                                <a href="{{ url('category/'.$c->id.'/edit') }}" class="btn btn-warning">Edit</a>
                                <form action="{{ url('category/'.$c->id) }}" id="deleteForm{{$c->id}}" name="deleteForm{{$c->id}}" data-note="Apakah anda yakin akan menghapus data {{ $c->title }} ?" method="POST" class="d-inline deleteForm">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">Hapus</button>
                                </form>
                          
                        </tr>
                        
                        @endforeach
                 
                 
                    </tbody>
                </table>
                <div class="mb-3 ">
                    <a href="{{ url('category/create') }}" class="btn btn-primary w-md">Tambah Data</a>
                </div>
                
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->


@endsection