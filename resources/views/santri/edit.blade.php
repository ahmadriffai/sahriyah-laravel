@extends('template.master')

@section('title', 'Santri Page')

@section('user', 'Nama User')

@section('titlepage', 'Halaman Santri')

@section('content')
    <!-- card -->
    <div class="col-md-8">
           <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Edit Data Santri</h6>
                </div>
                <div class="card-body">
                  <p>
                  <a href="/santri" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-flag"></i>
                    </span>
                    <span class="text">Kembali</span>
                </a>
                </p>
                <hr>
                 
                    <!-- link create -->
                    
                    <!-- form -->
                    <form method="post" action="/santri/{{ $santri->id_santri }}">

                        @method('put')
                        @csrf

                        <div class="form-group">
                            <label for="nama">Nama Santri</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" value="{{ $santri->nama }}">

                            @error('nama')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="nis">Nomor Induk Santri</label>
                            <input type="text" name="nis" class="form-control  @error('nis') is-invalid @enderror" id="nis" value="{{ $santri->nis }}">
                            @error('nis')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                    
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control  @error('alamat') is-invalid @enderror" id="alamat" value="{{ $santri->alamat }}">
                            @error('alamat')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                    
                        <div class="form-group">
                            <label for="jns_kelamin">Jenis Kelamin</label>
                            <select class="form-control  @error('jns_kelamin') is-invalid @enderror" id="jns_kelamin" name="jns_kelamin">
                            
                            <option value="L">Laki-laki</option>
                            <option Value="P">Perempuan</option>
                            </select>
                            @error('jns_kelamin')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                    
                        <div class="form-group">
                            <label for="id_kelas">Kelas</label>
                            <select class="form-control  @error('id_kelas') is-invalid @enderror" id="id_kelas" name="id_kelas">
                            
                            @foreach($kelas as $k)
                                <option value="{{ $k->id_kelas }}">{{ $k->nama_kelas }}</option>
                            @endforeach
                            </select>
                            @error('id_kelas')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                    
                        <div class="form-group">
                            <label for="id_kamar">Kamar</label>
                            <select class="form-control  @error('id_kamar') is-invalid @enderror" id="id_kamar" name="id_kamar">
                            
                            @foreach($kamar as $km)
                                <option value="{{ $km->id_kamar }}">{{ $km->nama_kamar }}</option>
                            @endforeach
                            </select>
                            @error('id_kamar')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                    
                        <div class="form-group">
                            <label for="telp_ortu">No Telp Wali</label>
                            <input type="text" class="form-control  @error('telp_ortu') is-invalid @enderror" id="telp_ortu" name="telp_ortu" value="{{ $santri->telp_ortu }}">
                            @error('telp_ortu')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>

                        <input type="hidden" name='status' value='aktif'>
                        
                        
                        <button type="submit" class="btn btn-success">Ubah Data</button>
                        </form>  



                </div>
              </div>
              </div>

@endsection