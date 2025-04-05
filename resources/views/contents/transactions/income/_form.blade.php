@extends('layouts/app')
@section('content')
 <!-- start page title -->
 <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Form Data</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Transaction</a></li>
                    <li class="breadcrumb-item active">Income</li>
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

                <h4 class="card-title">Form Data</h4>
          
                @if (isset($transaction))
                    <form id="updateForm" method="POST" action="{{ url('transactions-income/'.$transaction->id) }}" name="updateForm" data-note="Apakah anda yakin akan merubah data {{ $transaction->noinvoice }} ini ?">
                        @method('PUT')
                @else
                    <form id="submitForm" method="POST" action="{{ url('transactions-income/') }}" name="submitForm">
                    
                @endif
                    @csrf

                    @if (!isset($transaction))
                        
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Tanggal</label>
                        <div class="col-md-10">
                            <input required class="form-control" type="date" placeholder="Masukkan tanggal transaksi ...." name="transaction_date" value="@if(isset($transaction)){{$transaction->transaction_date}}@endif"
                                id="example-text-input"> 
                        </div>
                    </div>
                    @endif
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Penyewa</label>
                        <div class="col-md-10">
                            <select required class="form-control" name="tenant_id" id="example-text-input">
                                <option value="">Pilih Penyewa</option>
                                @foreach ($tenants as $t)
                                    <option value="{{ $t->id }}" @if(isset($transaction) && $transaction->tenant_id == $t->id) selected @endif>{{ $t->user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Keterangan</label>
                        <div class="col-md-10">
                            <textarea required class="form-control" type="text" placeholder="Masukkan keterangan transaksi ...." name="notes" value="@if(isset($transaction)){{$transaction->description}}@endif"
                                id="example-text-input"> @if(isset($transaction)){{$transaction->notes}}@endif</textarea>
                                 </div>
                    </div>

                    
                    <div class="mb-3 ">
                        <hr>
                        <a class="btn btn-warning w-md" href="#" onclick="window.history.back()">Kembali</a>
                        <button type="submit" class="btn btn-primary w-md"> @if (isset($transaction)) Ubah @else Simpan @endif</button>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->


@endsection