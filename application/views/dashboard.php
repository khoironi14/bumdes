<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BUMDES</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/fontawesome-free/css/all.min.css')?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')?>">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/jqvmap/jqvmap.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/adminlte.min.css')?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.css')?>">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/fullcalendar/fullcalendar.css'; ?>">
  <!--  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css'; ?>">-->
  <!-- summernote -->
   <link rel="stylesheet" href="<?php echo base_url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')?>">
     <link rel="stylesheet" href="<?php echo base_url('assets/plugins/select2/css/select2.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')?>">
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  <!-- jQuery -->
<script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js')?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/plugins/jquery-ui/jquery-ui.min.js')?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- ChartJS -->
<script src="<?php echo base_url('assets/plugins/chart.js/Chart.min.js')?>"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/plugins/sparklines/sparkline.js')?>"></script>
<!-- JQVMap -->
<script src="<?php echo base_url('assets/plugins/jqvmap/jquery.vmap.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/plugins/jquery-knob/jquery.knob.min.js')?>"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/plugins/moment/moment.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.js')?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')?>"></script>
<!-- Summernote -->
<script src="<?php echo base_url('assets/plugins/summernote/summernote-bs4.min.js')?>"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/select2/js/select2.full.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js')?>"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
 <!-- SweetAlert2 -->
   
    <script type="text/javascript" src="<?=base_url('assets/js/jquery.PrintArea.js')?>"></script>
    
    <script>
        $('.tombol-logout').on('click', function(e) {

            e.preventDefault();
            const href = $(this).attr('href');

            Swal.fire({
                title: 'Konfirmasi Logout',
                text: 'Klik keluar untuk mengakhiri session',
                type: 'danger',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Keluar'
            }).then((result) => {
                if (result.value) {
                    document.location.href = href;
                }
            })
        });
    </script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
   

  
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
        <?=$this->session->userdata('username');?>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
         
          <div class="dropdown-divider"></div>
           <?php $akses=$this->session->userdata('akses');
          if ($akses==2) {
           
          

           ?>
           <a href="<?php echo base_url('Welcome/profil') ?>" class="dropdown-item "><i class="fas fa-user-circle"></i>
           Profil
          </a>
        <?php }else{
         ?>
  <a href="<?php echo base_url('admin/profil') ?>" class="dropdown-item "><i class="fas fa-user-circle"></i>
           Profil
          </a>

       <?php }?>
          <a href="<?php echo base_url('Welcome/log_out') ?>" class="dropdown-item tombol-logout"><i class="fas fa-sign-out-alt"></i>
           Log out
          </a>
          
         
      </li>
     
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
   

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
         <?php $akses=$this->session->userdata('akses');  if ($akses==1 || $akses==3) {
           $n=$this->session->userdata('nik');
           $fotoku=$this->db->get_where('tb_admin',['nik'=>$n])->row_array();
          ?>
          <img src="<?php  echo base_url('assets/gambar/'.$fotoku['foto'].'') ?>" class="img-circle elevation-2" alt="User Image">
        <?php }?>
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$this->session->userdata('username')?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
            <a href="<?php echo base_url('welcome/home') ?>" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          
          </li>
          <?php 


          if ( $akses==1) { ?>
 <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Master Data
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('admin/index') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('bunga/index') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bunga</p>
                </a>
              </li>
              
             
            </ul>
          </li>


            <?php
          }
          if ($akses==1 || $akses==3) {
           
          

           ?>
         
           <li class="nav-item">
                <a href="<?php echo base_url('anggota/index') ?>" class="nav-link">
                 <i class="fas fa-user-tie"></i>
                  <p> Anggota</p>
                </a>
              </li>
           

               <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
             <i class="fab fa-leanpub"></i>
              <p>
                Pinjaman
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

               <li class="nav-item">
                <a href="<?php echo base_url('Tinjau/index') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengajuan</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="<?php echo base_url('pinjaman/index') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pinjaman</p>
                </a>
              </li>
            </ul>
          </li>
          
        <?php } if($akses==1){?>
          <li class="nav-item">
                <a href="<?php echo base_url('pembayaran/index') ?>" class="nav-link">
                <i class="far fa-money-bill-alt"></i>
                  <p>Pembayaran</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="<?php echo base_url('pembayaran/pengajuan_pembayaran') ?>" class="nav-link">
                <i class="far fa-money-bill-alt"></i>
                  <p>Pengajuan Pembayaran</p>
                </a>
              </li>
            <?php }?>
              
        <?php $akses=$this->session->userdata('akses');
          if ($akses==2) {
           
            $idnik=$this->session->userdata('nik');
            $sql=$this->db->get_where('tb_anggota',['nik'=>$idnik])->row_array();
            if ($sql['ktp'] !="") {
              # code...
           

           ?>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Pengajuan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="<?php echo base_url('pengajuan/index') ?>" class="nav-link">
                  <i class="fas fa-project-diagram nav-icon"></i>
                  <p>Pengajuan Pinjaman</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="<?php echo base_url('pengajuan/cek_status') ?>" class="nav-link">
                  <i class="fas fa-project-diagram nav-icon"></i>
                  <p>Status Pengajuan Pinjaman</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="<?php echo base_url('pengajuan/pengajuan_pembayaran') ?>" class="nav-link">
                  <i class="fas fa-project-diagram nav-icon"></i>
                  <p>Pengajuan Pembayaran</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="<?php echo base_url('pengajuan/view_pembayaranp') ?>" class="nav-link">
                  <i class="fas fa-project-diagram nav-icon"></i>
                  <p>Status Pengajuan Pembayaran</p>
                </a>
              </li>
             
              
             
            </ul>
          </li>
        <?php }?>
            <li class="nav-item">
                <a href="<?php echo base_url('cek_pembayaran') ?>" class="nav-link">
                  <i class="fas fa-project-diagram nav-icon"></i>
                  <p>Pembayaran</p>
                </a>
              </li>


         <?php } if ($akses==1 OR $akses==3) {
            
         ?>


               <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
             <i class="fab fa-leanpub"></i>
              <p>
               Report
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

               <li class="nav-item">
                <a href="<?php echo base_url('report/report_anggota') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Anggota</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="<?php echo base_url('report/report_pembayaran') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pembayaran</p>
                </a>
              </li>
            <?php }?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
       
        <!-- Main row -->
      
       <?php   $this->load->view($content); ?> 
          <!-- right col -->
       
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="#">SOFT KOMP NET</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->



</body>
</html>
 <script src="<?= base_url('assets/swal/'); ?>sweetalert2.all.min.js"></script>
    <script src="<?= base_url('assets/swal/'); ?>myscript.js"></script>
     <script>
        $('.tombol-hapus').on('click', function(e) {

            e.preventDefault();
            const href = $(this).attr('href');

            Swal.fire({
                title: 'Konfirmasi Hapus',
                text: 'Data akan dihapus permanen',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus'
            }).then((result) => {
                if (result.value) {
                    document.location.href = href;
                }
            })
        });
    </script>
