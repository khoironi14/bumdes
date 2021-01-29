<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash') ?>"></div>
				<div class="card-header bg-primary">
					<div class="row">
						<div class="col-md-3">
							<p>DetailPembayaran</p>
						</div>
					</div>
				</div>
				<div class="card-body">

					<table class="table table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>No Pembayaran</th>
								<th>Angsuran</th>
								<th>Pembayaran</th>
								<th>Denda</th>
								<th>Tanggal Pembayaran</th>

							</tr>
						</thead>
						<tbody>
							<?php $no=1; foreach ($detail as $tampil) {
								# code...
							 ?>
							<tr>
								<td><?=$no++?></td>
								<td><?=$tampil->no_pembayaran?></td>
								<td><?= "Angsuran".$tampil->angsuranke?></td>
								<td>Rp. <?=number_format($tampil->jumlah_pembayaran,2,',','.')?></td>
								<td>Rp. <?=number_format($tampil->denda,2,',','.')?></td>
								<td><?=$tampil->tanggal_pembayaran?></td>
							</tr>
						<?php }?>
						</tbody>


					</table>
				</div>
			</div>
		</div>
	</div>
</div>
