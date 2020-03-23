@extends('template.master')

@section('title', 'Pembayaran Page')

@section('user', 'Nama User')

@section('titlepage', 'Halaman Pembayaran')

@section('content')
           <!-- pencarian -->
           <div class="col-md-12">
             
           <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Pembayaran Tagihan</h6>
                </div>



                <div class="card-body">
                
                <p>Note : Masukan <b>No Identitas</b> atau <b>Nama</b> Santri Untuk Melakukan Pembayaran</p>

                <form method="get" action="/pembayaran/cari" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    
                    <div class="input-group">
                    <input type="text" name='cari' class="form-control bg-light border-0 small" placeholder="Cari Nis Santri.." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" value="CARI">
                        <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                    </div>
                </form>
                         
                  
                </div>
              </div>
              </div>
           <!-- pencarian -->
           @if(isset($_GET['cari']))
           <div class="col-md-12">
             
           <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Tagihan Santri</h6>
                </div>



                <div class="card-body">
                
                  <!-- Table -->
                  <table class="table table-striped mt-4">
                    <thead">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tagihan</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tagihan as $s)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $s->tagihan }}</td>
                            <td>{{ $s->biaya }}/bulan</td>
                            <td></td>
                            <td>
                            <!-- link ubah -->
                            <a href="/pembayaran/{{ $id_santri }}/{{ $s->id_tagihan }}/bayar" class="btn btn-primary btn-sm">Bayar</a>
                           
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
        @endif

@endsection