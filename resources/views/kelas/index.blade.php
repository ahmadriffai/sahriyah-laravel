@extends('template.master')

@section('title', 'Kelas Page')

@section('user', 'Nama User')

@section('titlepage', 'Data Master')

@section('content')

<!-- First Column -->

<div class="col-lg-6">
    
    <!-- Custom Text Color Utilities -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Custom Text Color Utilities</h6>
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
            <th scope="col">Nama Kelas</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($kelas as $k)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $k->nama_kelas }}</td>
            <td>
                <!-- link ubah -->
                <a href="/kelas/{{ $k->id_kelas }}/edit" class="btn btn-primary btn-sm">Ubah</a>
                <!-- link delete -->
                <form action="/kelas/{{ $k->id_kelas }}" method="post" class="d-inline">
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
<div class="col-lg-6">

<!-- Tambah Data -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Tambah Data Kelas</h6>
  </div>
  <div class="card-body">
    <!-- form -->
    <form method="post" action="/kelas">

    @csrf

    <div class="form-group">
        <label for="nama_kelas">kelas Kelas</label>
        <input type="text" name="nama_kelas" class="form-control @error('nama_kelas') is-invalid @enderror" id="nama_kelas" value="{{ old('nama_kelas') }}">

        @error('nama_kelas')
            <div class="invalid-feedback"> {{ $message }} </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-success">Tambah</button>
    </form>  
  </div>
</div>

</div>

<!-- Modal Edit -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>


@endsection