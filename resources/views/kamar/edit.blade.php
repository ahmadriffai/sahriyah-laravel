@extends('template.master')

@section('title', 'kamar Page')

@section('user', 'Nama User')

@section('titlepage', 'Data Master')

@section('content')



<!-- Second Column -->
<div class="col-lg-6">

<!-- Tambah Data -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Edit Data Kamar</h6>
  </div>
  <div class="card-body">
    <!-- form -->
    <form method="post" action="/kamar/{{ $kamar->id_kamar }}">
    @method('put')
    @csrf

    <div class="form-group">
        <label for="nama_kamar">Nama kamar</label>
        <input type="text" name="nama_kamar" class="form-control @error('nama_kamar') is-invalid @enderror" id="nama_kamar" value="{{ $kamar->nama_kamar }}">

        @error('nama_kamar')
            <div class="invalid-feedback"> {{ $message }} </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="bapak_kamar">Bapak Kamar</label>
        <input type="text" name="bapak_kamar" class="form-control @error('bapak_kamar') is-invalid @enderror" id="bapak_kamar" value="{{ $kamar->bapak_kamar }}">

        @error('bapak_kamar')
            <div class="invalid-feedback"> {{ $message }} </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="kuota">Kuota</label>
        <input type="number" name="kuota" class="form-control @error('kuota') is-invalid @enderror" id="kuota" value="{{ $kamar->kuota }}">

        @error('kuota')
            <div class="invalid-feedback"> {{ $message }} </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-success">Tambah</button>
    </form>  
  </div>
</div>

</div>


@endsection