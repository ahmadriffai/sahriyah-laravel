@extends('template.master')

@section('title', 'kamar Page')

@section('user', 'Nama User')

@section('titlepage', 'Data Master')

@section('content')

<!-- First Column -->

<div class="col-lg-7">
    
    <!-- Custom Text Color Utilities -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Kamar</h6>
        </div>
        <div class="card-body">
            
            @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
                  <!-- Table -->
    <table class="table table-striped mt-4">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Kamar</th>
            <th scope="col">Bapak Kamar</th>
            <th scope="col">Kuota</th>
            <th scope="col">Sisa Kamar</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($kamar as $k)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $k->nama_kamar }}</td>
            <td>{{ $k->bapak_kamar }}</td>
            <td>{{ $k->kuota }}</td>
            <td>-</td>
            <td>
                <!-- link ubah -->
                <a href="/kamar/{{ $k->id_kamar }}/edit" class="btn btn-primary btn-sm">Ubah</a>
                <!-- link delete -->
                <form action="/kamar/{{ $k->id_kamar }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf

                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
  </div>
</div>



</div>

<!-- Second Column -->
<div class="col-lg-5">

<!-- Tambah Data -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Tambah Data Kamar</h6>
  </div>
  <div class="card-body">
    <!-- form -->
    <form method="post" action="/kamar">

    @csrf

    <div class="form-group">
        <label for="nama_kamar">Nama Kamar</label>
        <input type="text" name="nama_kamar" class="form-control @error('nama_kamar') is-invalid @enderror" id="nama_kamar" value="{{ old('nama_kamar') }}">

        @error('nama_kamar')
            <div class="invalid-feedback"> {{ $message }} </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="bapak_kamar">Bapak Kamar</label>
        <input type="text" name="bapak_kamar" class="form-control @error('bapak_kamar') is-invalid @enderror" id="bapak_kamar" value="{{ old('bapak_kamar') }}">

        @error('bapak_kamar')
            <div class="invalid-feedback"> {{ $message }} </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="kuota">Kuota</label>
        <input type="number" name="kuota" class="form-control @error('kuota') is-invalid @enderror" id="kuota" value="{{ old('kuota') }}">

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