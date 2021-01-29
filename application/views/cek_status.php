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

					<table class="table table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Jumlah Pinjaman</th>
								<th>Tanggal</th>
								<th>Status</th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
							<?php $no=1; foreach ($status as $tampil) {
								# code...
							} ?>
							<tr>
								<td><?=$no++?></td>
								<td><?=$tampil->nama?></td>
								<td><?=$tampil->jumlah_pinjaman?></td>
								<td><?=date('d-m-Y',strtotime($tampil->tanggal))?></td>
								<td><?php if ($tampil->status==0) {
									echo "<span class='badge badge-warning'>Menunggu Persetujuan</span>";
								}else if($tampil->status==1){

									echo "<span class='badge badge-danger'>Di Setujui</span>";
								}else{
									echo "<span class='badge badge-danger'>Di Tolak</span>";

								} ?></td>
								<td> <?php if ($tampil->status==1) {
									# code...
								 ?><a href="<?=base_url('pengajuan/cetak_surat')?>" class="btn btn-success btn-sm">Cetak Surat Perjanjian</a><?php }?></td>
							</tr>
						</tbody>
					</table>


				</div>
			</div>
		</div>
	</div>
</div>
