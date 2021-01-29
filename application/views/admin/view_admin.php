<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header bg-info">
					<div class="row">
						<div class="col-md-3">
							 <?php $akses=$this->session->userdata('akses');
          if ($akses==1 ) {
           
          

           ?>
							<a href="<?=base_url('admin/add_admin')?>" class="btn btn-success btn-sm">Tambah</a><?php }?>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash') ?>"></div>
					<table class="table table-bordered" id="tb-admin">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Alamat</th>
								<th>Jenis Kelamin</th>
								<th>Telpon</th>
								 <?php 
          if ($akses==1 ) {
           
          

           ?>
								<th>Action</th>
							<?php }?>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; foreach ($admin as $tampil) {
								# code...
							 ?>
							
							<tr>
								<td><?=$no++?></td>
								<td><?=$tampil->nama_lengkap?></td>
								<td><?=$tampil->alamat?></td>
								<td><?php if ($tampil->jk==1) {
									echo "Laki-Laki";
								}else{

									echo "Perempuan";
								} ?></td>
								<td><?=$tampil->telpon?></td>
								<?php 
          if ($akses==1 ) {
           
          

           ?><td> <a href="<?=base_url('admin/edit/'.$tampil->id_admin.'')?>" class="btn btn-info btn-sm">Edit</a> <a href="<?=base_url('admin/hapus/'.$tampil->id_admin.'')?>" class="btn btn-danger btn-sm tombol-hapus">Hapus</a></td><?php }?>
							</tr>

						<?php }?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
$("#tb-admin").DataTable();


	});
</script>