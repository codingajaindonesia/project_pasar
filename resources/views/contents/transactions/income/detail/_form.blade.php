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
                    <li class="breadcrumb-item">Income</li>
                    <li class="breadcrumb-item active">Detail</li>
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
                    <form id="updateForm" method="POST" action="{{ url('transactions-income/'. $id.'/detail/'.$transaction->id) }}" name="updateForm" data-note="Apakah anda yakin akan merubah data {{ $transaction->noinvoice }} ini ?">
                        @method('PUT')
                @else
                    <form id="submitForm" method="POST" action="{{ url('transactions-income/'. $id.'/detail/') }}" name="submitForm">
                    
                @endif
                    @csrf
                        
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Kategori</label>
                        <div class="col-md-10">
                            <select class="form-control" name="category_id">
                                @foreach ($categories as $c)
                                    <option value="{{ $c->id }}" @if (isset($transaction) && $transaction->category_id == $c->id) selected @endif>{{ $c->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-search-input" class="col-md-2 col-form-label">Jumlah</label>
                        <div class="col-md-10">
                            <input class="form-control" type="number" placeholder="Masukkan jumlah pemasukan ...." name="amount" value="@if(isset($transaction)){{$transaction->amount}}@endif"
                                id="example-text-input"> 
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-email-input" class="col-md-2 col-form-label">Catatan</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="notes">@if(isset($transaction)){{$transaction->notes}}@endif</textarea>
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