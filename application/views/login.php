<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login|BUMDES</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/fontawesome-free/css/all.min.css')?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/adminlte.min.css')?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Login</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
<div class="notif" data-flashdata="<?php echo $this->session->flashdata('notif') ?>"></div>
<div class="berhasil" data-flashdata="<?php echo $this->session->flashdata('berhasil') ?>"></div>

      <form action="<?php echo base_url('Welcome') ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username" required="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
           
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat" name="login">Sign In</button>
          </div>
          
          <!-- /.col -->
        </div>
      </form>

   
    </div>
      <p class="mb-1">
        <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-success btn-sm mr-5 ml-2">I forgot my password</a> <a href="#" class="btn btn-success btn-sm  mt-1 mr-1 float-right" data-toggle="modal" data-target="#modal-registrasi">Registrasi</a>
      </p>

    <!-- /.login-card-body -->
  </div>
</div>

<!--Modal-->
<!-- Modal -->
<div class="modal fade" id="modal-registrasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title" id="modal-registrasi" style="color:white;">Form Registrasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <form action="<?=base_url('welcome/simpan_registrasi')?>" method="post">
                 <div class="form-group">
                  <label>NIK</label>
                  <input type="text" name="nik" class="form-control" required="">
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama" class="form-control" required="">
                </div>
                 <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" name="alamat" class="form-control" >
                </div>
                 <div class="form-group">
                  <label>Telpon</label>
                  <input type="text" name="telpon" class="form-control" >
                </div>
                 <div class="form-group">
                  <label>Tempat Lahir</label>
                  <input type="text" name="tempat" class="form-control">
                </div>
                  <div class="form-group">
                  <label>Tanggal Lahir</label>
                  <input type="date" name="tanggal" class="form-control">
                </div>
                 <div class="form-group">
                  <label>Jenis Kelamin</label>
                 <select name="jenis" class="form-control">
                   <option value="1">Laki-Laki</option>
                    <option value="2">Perempuan</option>
                 </select>
                </div>

                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" class="form-control">
                </div>
                 <div class="form-group">
                  <label>username</label>
                  <input type="text" name="username" class="form-control">
                </div>
                 <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" class="form-control">
                </div>
              
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- /.login-box -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Forgot Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <form action="<?=base_url('welcome/forgot')?>" method="post">
            <label>Email</label><input type="email" name="email" id="email" class="form-control"></div>
        </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- jQuery -->
<script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js')?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.min.js')?>"></script>
<script src="<?= base_url('assets/swal/'); ?>sweetalert2.all.min.js"></script>
    <script src="<?= base_url('assets/swal/'); ?>myscript.js"></script>

</body>
</html>
