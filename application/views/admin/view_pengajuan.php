<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header bg-primary">
					<div class="row">
						<div class="col-md-3">
							<p>Status Pengajuan</p>
						</div>
					</div>
				</div>
				<div class="card-body">


					<table class="table table-bordered" id="tb-pengajuan">
						<thead>
							<tr>
								<th>No</th>
								<th>NIK</th>
								<th>Nama</th>
								<th>Jumlah Pinjaman</th>
								<th>Tanggal</th>
								<th>Status</th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
							<?php $no=1; foreach ($pinjaman as $tampil) {
								
							 ?>
							<tr>
								<td><?=$no++?></td>
								<td><?=$tampil->nik?></td>
								<td><?=$tampil->nama?></td>
								<td><?=number_format($tampil->jumlah_pinjaman,2,',','.')?></td>
								<td><?=date('d-m-Y',strtotime($tampil->tanggal))?></td>
								<td><?php if ($tampil->status==0) {
									echo "<span class='badge badge-warning'>Menunggu Persetujuan</span>";
								}else if($tampil->status==1){

									echo "<span class='badge badge-success'>Di Setujui</span>";
								}else{

									echo "<span class='badge badge-danger'>ditolak</span>";
								} ?></td>
								<td> <?php if ($tampil->status==0) {
									# code...
								?><a href="<?=base_url('tinjau/status/'.$tampil->id_peminjaman.'/1')?>" class="btn btn-success btn-sm  setujui">Setujui</a> <a href="<?=base_url('tinjau/status/'.$tampil->id_peminjaman.'/2')?>" class="btn btn-warning btn-sm">Tolak</a><?php }?> <a href="<?=base_url('tinjau/hapus/'.$tampil->id_peminjaman.'')?>" class="btn btn-danger btn-sm tombol-hapus">Hapus</a></td>
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

$('#tb-pengajuan').DataTable();
	});
</script>
<script>
        $('.setujui').on('click', function(e) {

            e.preventDefault();
            const href = $(this).attr('href');

            Swal.fire({
                title: 'Konfirmasi Persetujuan',
                text: 'Apakah Anda Yakin akan Menyetujuinya?',
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
