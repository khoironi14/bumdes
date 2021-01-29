<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash') ?>"></div>
				<div class="card-header bg-info">
					<div class="row">
					<div class="col-md-3"><h2>Data Anggota</h2></div>	
					</div>
				</div>
				<div class="card-body">
					<div class="table table-responsive">
					<table class="table table-bordered" id="tb-anggota">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Alamat</th>
								<th>telpon</th>
								<th>Tempat Lahir</th>
								<th>Tanggal Lahir</th>
								<th>Jenis Kelamin</th>
								<th>NIK</th>
								<!--<th>Status</th>-->
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; foreach ($anggota as $tampil) {
								# code...
							 ?>
							<tr>
								<td><?=$no++?></td>
								<td><?=$tampil->nama?></td>
								<td><?=$tampil->alamat?></td>
								<td><?=$tampil->telpon?></td>
								<td><?=$tampil->tempat_lahir?></td>
								<td><?=$tampil->tanggal_lahir?></td>
								<td><?php if ($tampil->jk==1) {
									echo "Laki-Laki";
								}else{

									echo "Perempuan";
								} ?></td>
								<td><?=$tampil->nik?></td>
								<!--<td><?php if ($tampil->aktif==1) {
									echo "diterima";
								}else if($tampil->aktif==2){

									echo "ditolak";
								}else{

									echo "Menunggu Persetujuan";
								} ?></td>-->
								<td width="13%"> <?php $akses=$this->session->userdata('akses');
          if ($akses==1 ) {
           
          

           ?><div class="btn-group" role="group" aria-label="Basic example"><a href="#" onclick="edit(<?=$tampil->id_anggota?>)" class="btn btn-info btn-sm">Edit</a><a href="<?=base_url('anggota/hapus/'.$tampil->id_anggota.'')?>" class="btn btn-danger btn-sm tombol-hapus">Hapus</a> 
									
								<!--	<a href="<?=base_url('anggota/status/'.$tampil->id_anggota.'/1')?>" class="btn btn-primary btn-sm terima ">Terima</a><a href="<?=base_url('anggota/status/'.$tampil->id_anggota.'/2')?>" class="btn btn-warning btn-sm ">Tolak</a>--></div><?php }?></td>
							</tr>
						<?php }?>
						</tbody>
					</table>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title" id="exampleModalLabel" style="color:white;">Form Edit Anggota</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <form action="<?=base_url('anggota/edit')?>" method="post">
              	<input type="hidden" name="id_anggota" id="id_anggota">
                 <div class="form-group">
                  <label>NIK</label>
                  <input type="text" name="nik" id="nik" class="form-control" required="" readonly="" >
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama" id="nama" class="form-control" required="">
                </div>
                 <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" name="alamat" id="alamat" class="form-control" >
                </div>
                 <div class="form-group">
                  <label>Telpon</label>
                  <input type="text" name="telpon" id="telpon" class="form-control" >
                </div>
                 <div class="form-group">
                  <label>Tempat Lahir</label>
                  <input type="text" name="tempat" id="tempat" class="form-control">
                </div>
                  <div class="form-group">
                  <label>Tanggal Lahir</label>
                  <input type="date" name="tanggal" id="tanggal" class="form-control">
                </div>
                 <div class="form-group">
                  <label>Jenis Kelamin</label>
                 <select name="jenis" id="jenis"  class="form-control">
                   <option value="1">Laki-Laki</option>
                    <option value="2">Perempuan</option>
                 </select>
                </div>
                  <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" id="email" class="form-control">
                </div>
                 <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" id="username" class="form-control">
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
<script type="text/javascript">
	function edit(id){

		$.ajax({

			url:"<?=base_url('anggota/show/')?>"+id,
			type:"get",
			dataType:"JSON",
			success:function(data){
				document.getElementById('nik').value=data.nik;
				document.getElementById('nama').value=data.nama;
				document.getElementById('alamat').value=data.alamat;
				document.getElementById('telpon').value=data.telpon;
				document.getElementById('tempat').value=data.tempat_lahir;
				document.getElementById('tanggal').value=data.tanggal_lahir;
				document.getElementById('jenis').value=data.jk;
				document.getElementById('id_anggota').value=data.id_anggota;
				document.getElementById('email').value=data.email;
				document.getElementById('username').value=data.username;
				$('#modal-edit').modal();
			}

		})
		
	}
</script>

<script type="text/javascript">
	$(document).ready(function(){

		$('#tb-anggota').DataTable();
	})
</script>
<script>
        $('.terima').on('click', function(e) {

            e.preventDefault();
            const href = $(this).attr('href');

            Swal.fire({
                title: 'Konfirmasi Penerimaan',
                text: 'Apakah Anda Yakin akan Menerima Sebagai Anggota?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yakin'
            }).then((result) => {
                if (result.value) {
                    document.location.href = href;
                }
            })
        });
    </script>
