@extends('template.master')

@section('title', 'Tagihan Page')

@section('user', 'Nama User')

@section('titlepage', 'Data Master')

@section('content')



<!-- Second Column -->
<div class="col-lg-6">

<!-- Tambah Data -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Edit Data Tagihan</h6>
  </div>
  <div class="card-body">
    <!-- form -->
    <form method="post" action="/tagihan/{{ $tagihan->id_tagihan }}">
    @method('put')
    @csrf

    <div class="form-group">
        <label for="tagihan">Tagihan</label>
        <input type="text" name="tagihan" class="form-control @error('tagihan') is-invalid @enderror" id="tagihan" value="{{ $tagihan->tagihan }}">

        @error('tagihan')
            <div class="invalid-feedback"> {{ $message }} </div>
        @enderror
    </div>


    <div class="form-group">
        <label for="biaya">Biaya</label>
        <input type="number" name="biaya" class="form-control @error('biaya') is-invalid @enderror" id="biaya" value="{{ $tagihan->biaya }}">

        @error('biaya')
            <div class="invalid-feedback"> {{ $message }} </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-success">Ubah</button>
    </form>  
  </div>
</div>

</div>


@endsection