@extends('template.master')

@section('title', 'Santri Page')

@section('user', 'Nama User')

@section('titlepage', 'Halaman Santri')

@section('content')
           <!-- Circle Buttons -->
           <div class="col-md-12">
           <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Data Santri</h6>
                </div>



                <div class="card-body">
                  @if(session('status'))
                    <div class="alert alert-success">
                      {{ session('status') }}
                    </div>
                  @endif
                 
                    <!-- link create -->
                    <a href="/santri/create" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-flag"></i>
                    </span>
                    <span class="text">Tambah Data Santri</span>
                    </a>
                    


                  <!-- Table -->
                  <table class="table table-striped mt-4">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">NIS</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Telp Ortu</th>
                        <th scope="col">alamat</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Kamar</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($santri as $s)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ strtoupper($s->nis) }}</td>
                            <td>{{ $s->nama }}</td>
                            <td>{{ $s->jns_kelamin }}</td>
                            <td>{{ $s->telp_ortu }}</td>
                            <td>{{ $s->alamat }}</td>
                            <td>{{ $s->id_kelas }}</td>
                            <td>{{ $s->id_kamar }}</td>
                            @if( $s->status == "aktif" )
                                <td><span class="badge badge-success">{{ $s->status }}</span></td>
                            @else
                                <td><span class="badge badge-danger">{{ $s->status }}</span></td>
                            @endif
                            <td>
                            <!-- link ubah -->
                            <a href="/santri/{{ $s->id_santri }}/edit" class="btn btn-primary btn-sm">Ubah</a>
                            <!-- link delete -->
                            <form action="/santri/{{ $s->id_santri }}" method="post" class="d-inline">

                              @method('delete')
                              @csrf

                              <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </form>

                            <!-- link info -->
                            <a href="/santri/info/{{ $s->id_santri }}" class="btn btn-info btn-sm"><i class="fas fa-info"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                  
                </div>
              </div>
              </div>

@endsection