@extends('layouts.app')
@section('css')
         <!-- DataTables -->
         <link href="{{url('assets')}}/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
         <link href="{{url('assets')}}/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
 
         <!-- Responsive datatable examples -->
         <link href="{{url('assets')}}/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />     
 
@endsection
@section('js')

        
        <!-- Required datatable js -->
        <script src="{{url('assets')}}/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="{{url('assets')}}/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="{{url('assets')}}/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="{{url('assets')}}/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="{{url('assets')}}/libs/jszip/jszip.min.js"></script>
        <script src="{{url('assets')}}/libs/pdfmake/build/pdfmake.min.js"></script>
        <script src="{{url('assets')}}/libs/pdfmake/build/vfs_fonts.js"></script>
        <script src="{{url('assets')}}/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="{{url('assets')}}/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="{{url('assets')}}/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
        
        <!-- Responsive examples -->
        <script src="{{url('assets')}}/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="{{url('assets')}}/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="{{url('assets')}}/js/pages/datatables.init.js"></script>    

        {{-- <script src="{{url('assets')}}/js/app.js"></script> --}}
@endsection
@section('content')
 <!-- start page title -->
 <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Report Transaksi Detail</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Report</a></li>
                    <li class="breadcrumb-item active">Report Transaksi Detail </li>
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
                <h4 class="card-title">Filter</h4>
                <form action="{{ url('report/all') }}" method="GET">
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Dari Tanggal</label>
                        <div class="col-md-10">
                            <input class="form-control" type="date" name="start_date" value="{{ $startDate }}" id="example-text-input"> 
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-search-input" class="col-md-2 col-form-label">Sampai Tanggal</label>
                        <div class="col-md-10">
                            <input class="form-control" type="date" name="end_date" value="{{ $endDate }}" id="example-text-input"> 
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <a href="{{ url('report/all') }}" class="btn btn-secondary">Reset</a>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

<div class="row">
  
    <div class="col-xl-12">
        <div class="row">
            <div class="col-md-4">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">Total</p>
                                <h4 class="mb-0">Rp {{ number_format($total, 0,',','.') }}</h4>
                            </div>

                            <div class="flex-shrink-0 align-self-center">
                                <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                    <span class="avatar-title">
                                        <i class="bx bx-copy-alt font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">Pemasukan</p>
                                <h4 class="mb-0">Rp {{ number_format($income, 0,',','.') }}</h4>
                            </div>

                            <div class="flex-shrink-0 align-self-center ">
                                <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                    <span class="avatar-title rounded-circle bg-primary">
                                        <i class="bx bx-archive-in font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">Pengeluaran </p>
                                <h4 class="mb-0">Rp {{ number_format($expense, 0,',','.') }}</h4>

                            </div>

                            <div class="flex-shrink-0 align-self-center">
                                <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                    <span class="avatar-title rounded-circle bg-primary">
                                        <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Report Transaksi All</h4>
         
                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                       
                        <th>Tanggal Transaksi</th>
                        <th>Trx ID</th>
                        <th>Dibuat Oleh</th>
                        <th>Kategori</th>
                        <th>Total</th>
                        <th>Catatan</th>
                    </tr>
                    </thead>


                    <tbody>
                        @foreach ($transactions as $t)
                        <tr>
                            <td>{{date('d-M-Y', strtotime($t->transaction->transaction_date))}}</td>
                            <td>{{ $t->transaction->invoice }}</td>
                            <td>{{ $t->transaction->user->name }}</td>
                            <td>{{ $t->category->title }}</td>
                            <td>{{ number_format($t->amount, 0, ',','.')}}</td>
                            <td>{{ $t->notes }}</td>

                        </tr>
                        
                        @endforeach
                 
                 
                    </tbody>
                </table>
            
                
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->


@endsection