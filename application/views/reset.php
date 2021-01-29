<!DOCTYPE html>
<html>
<head>
	<title>Reset Password</title>
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

   
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-12 mt-3">
			<div class="card">
				<div class="notif" data-flashdata="<?php echo $this->session->flashdata('notif') ?>"></div>
<div class="berhasil" data-flashdata="<?php echo $this->session->flashdata('berhasil') ?>"></div>
<div class="card-header bg-info"><h4>Reset Password</h4></div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-6"><form action="<?=base_url('welcome/reset')?>" method="post">
							<div class="form-group">
								<label>Token</label>
								<input type="text" name="token" class="form-control" required="">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" name="password" class="form-control" required="">
							</div>
							<div class="form-group">
								<label>Konfirmasi Password</label>
								<input type="password" name="konfirmasi" class="form-control" required="">
							</div>
							<div class="form-group">
								<button class="btn btn-success btn-sm" name="reset">Reset</button>

							</div>
						</form></div>
						<div class="col-md-3"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>