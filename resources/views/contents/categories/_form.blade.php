@extends('layouts/app')
@section('content')
 <!-- start page title -->
 <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Form Data</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Kategori</a></li>
                    <li class="breadcrumb-item active">Form Data</li>
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
          
                @if (isset($category))
                    <form id="updateForm" method="POST" action="{{ url('category/'.$category->id) }}" name="updateForm" data-note="Apakah anda yakin akan merubah data {{ $category->title }} ini ?">
                        @method('PUT')
                @else
                    <form id="submitForm" method="POST" action="{{ url('category') }}" name="submitForm">
                    
                @endif
                    @csrf
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Judul</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" placeholder="Masukkan judul kategori ...." name="title" value="@if(isset($category)){{$category->title}}@endif"
                                id="example-text-input"> 
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-search-input" class="col-md-2 col-form-label">Keterangan</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="description" >@if(isset($category)){{$category->description}}@endif</textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-email-input" class="col-md-2 col-form-label">Tipe</label>
                        <div class="col-md-10">
                            <select class="form-control" name="types">
                                <option value="in" @if (isset($category) && $category->types == "in") selected @endif>Pemasukan</option>
                                <option value="out" @if (isset($category) && $category->types == "out") selected @endif>Pengeluaran</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mb-3 ">
                        <hr>
                        <a class="btn btn-warning w-md" href="#" onclick="window.history.back()">Kembali</a>
                        <button type="submit" class="btn btn-primary w-md"> @if (isset($category)) Ubah @else Simpan @endif</button>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->


@endsection