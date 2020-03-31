<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Dashboard</title>
  
  
  <!-- Custom fonts for this template-->
  <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="/css/sb-admin-2.min.css" rel="stylesheet">
  

 
</head>

<body id="page-top bg-white">

  <!-- Page Wrapper -->
  <div id="wrapper">

    
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4 shadow">
            <div class="container">
            <a class="navbar-brand" href="#"><img src="/img/almanshur.png" alt="" width="40px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-fw fa-home"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/almanshur/daftar"><i class="fas fa-fw fa-table"></i> Pendaftaran</a>
                </li>
                </ul>
            </div>
            </div>
        </nav>


        <!-- Begin Page Content -->
        <div class="container">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pendaftaran Santri</h1>
          </div>

          <!-- Content Row -->

          

          <!-- Content Row -->
          <div class="row">

            

            <div class="col-lg-8 mb-4">

              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">pendaftaran Santri Almanshur</h6>
                </div>
                <div class="card-body">
                  The styling for this basic card example is created by using default Bootstrap utility classes. By using utility classes, the style of the card component can be easily modified with no need for any custom CSS!
                    <hr>
                  <form method="post" action="/santri">

                        @csrf

                        <div class="form-group">
                            <label for="nama">Nama Santri</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" value="{{ old('nama') }}">

                            @error('nama')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                        
                    
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control  @error('alamat') is-invalid @enderror" id="alamat" value="{{ old('alamat') }}">
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
                            <label for="telp_wali">No Telephone Wali</label>
                            <input type="text" class="form-control  @error('telp_wali') is-invalid @enderror" id="telp_wali" name="telp_wali" value="{{ old('telp_wali') }}">
                            @error('telp_wali')
                            <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="no_telp">No Telephone Santri</label>
                            <input type="text" class="form-control  @error('no_telp') is-invalid @enderror" id="no_telp" name="no_telp" value="{{ old('no_telp') }}">
                            @error('no_telp')
                            <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                        
                        
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal lahir</label>
                            <input type="date" class="form-control  @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir" name="tgl_lahir" value="{{ old('tgl_lahir') }}">
                            @error('tgl_lahir')
                            <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control  @error('status') is-invalid @enderror" id="status" name="status">
                                
                                <option value="pelajar">Pelajar</option>
                                <option Value="pekerja">Pekerja</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                        </div>
                        
                        
                        <button type="submit" class="btn btn-success">Daftar</button>
                        </form>  


                </div>
              </div>

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
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

   <!-- Bootstrap core JavaScript-->
   <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="/js/sb-admin-2.min.js"></script>

  @include('sweetalert::alert')


</body>

</html>
