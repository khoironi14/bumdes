<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('berhasil') ?>"></div>
				<div class="card-header bg-primary">
					<div class="row">
						<div class="col-md-3">
							<p>Status Pengajuan Pembayaran</p>
						</div>
					</div>
				</div>
				<div class="card-body">
						<table class="table table-bordered">
								<thead>	
										<tr>	
												<th>No</th>
												<th>No Pengajuan</th>
												<th>Nama</th>
												<th>Jumlah Pembayaran</th>
												<th>Bukti</th>
												<th>Tanggal</th>
												<th>Status</th>
												<th>Action</th>

										</tr>

								</thead>
								<tbody>	
									<?php $no=1; foreach ($pembayaran as $tampil) {
										if ($tampil->foto !="") {
											# code...
										
									 ?>
										<tr>	
												<td><?=$no++?>	</td>
												<td><?=$tampil->no_pembayaran?></td>
												<td><?=$tampil->nama?></td>
												<td>Rp.<?=$tampil->jumlah_pembayaran?></td>
												<td><img width="20%" class="" src="<?=base_url('assets/gambar/'.$tampil->foto.'')?>"></td>
												<td><?=$tampil->tanggal_pembayaran?></td>
												<td><?php if ($tampil->status_pembayaran==0) {
													echo "Menunggu Pembayaran";
												}else if ($tampil->status_pembayaran==1) {

														echo "Pembayaran Berhasil";
												}else{
														echo "Pembayaran ditolak";

												} ?></td>

												<td><div class="btn-group" role="group" aria-label="Button group with nested dropdown">
													<?php if ($tampil->status_pembayaran==0) {
														# code...
													 ?>
 <a href="<?php echo base_url('pembayaran/status/'.$tampil->id_pembayaran.'/1/'.$tampil->nik.'') ?>" class="btn btn-info btn-sm">Setujui</a>
<a href="<?php echo base_url('pembayaran/status/'.$tampil->id_pembayaran.'/2/'.$tampil->nik.'') ?>" class="btn btn-danger btn-sm">Tolak</a><?php }?></div></td>

										</tr>

									<?php } }?>

								</tbody>


							</table>

				</div>

			</div>
		</div>
	</div>
</div>
