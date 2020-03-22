@extends('template.master')

@section('title', 'Tagihan Page')

@section('user', 'Nama User')

@section('titlepage', 'Data Master')

@section('content')

<!-- First Column -->

<div class="col-lg-7">
    
    <!-- Custom Text Color Utilities -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Tagihan</h6>
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
            <th scope="col">Tagihan</th>
            <th scope="col">Biaya</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tagihan as $t)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $t->tagihan }}</td>
            <td>Rp. {{ $t->biaya }}</td>
            <td>
                <!-- link ubah -->
                <a href="/tagihan/{{ $t->id_tagihan }}/edit" class="btn btn-primary btn-sm">Ubah</a>
                <!-- link delete -->
                <form action="/tagihan/{{ $t->id_tagihan }}" method="post" class="d-inline">
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
    <form method="post" action="/tagihan">

    @csrf

    <div class="form-group">
        <label for="tagihan">Tagihan</label>
        <input type="text" name="tagihan" class="form-control @error('tagihan') is-invalid @enderror" id="tagihan" value="{{ old('tagihan') }}">

        @error('tagihan')
            <div class="invalid-feedback"> {{ $message }} </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="biaya">biaya</label>
        <input type="number" name="biaya" class="form-control @error('biaya') is-invalid @enderror" id="biaya" value="{{ old('biaya') }}">

        @error('biaya')
            <div class="invalid-feedback"> {{ $message }} </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-success">Tambah</button>
    </form>  
  </div>
</div>

</div>



@endsection