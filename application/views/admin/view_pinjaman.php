<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header bg-primary">
					<div class="row">
						<div class="col-md-3">
							<p>Peminjaman</p>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="table table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Jumlah Pinjaman</th>
								<th>Bunga</th>
								<th>Lama Peminjaman</th>
								<th>Tanggal Pengajuan</th>
								<th>Angsuran</th>
								<th>Lunas</th>
								
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
							<?php $no=1; foreach ($pinjam as $tampil) {
								
							 ?>
							<tr>
								<td><?=$no++?></td>
								<td><?=$tampil->nama?></td>
								<td><?=number_format($tampil->jumlah_pinjaman,2,',','.');?></td>
								<td><?=number_format($tampil->bunga,2,',','.');?></td>
								<td><?=$tampil->lama_pinjaman?> Bulan</td>
								<td><?=date('d-m-Y',strtotime($tampil->tanggal))?></td>
								<td>Rp.<?=$tampil->besar_angsuran?>/ Bulan</td>
								<td><?php if ($tampil->lunas==0) {
									echo "Belum Lunas";
								}else{ echo "Lunas"; } ?></td>
								
								<td></td>
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
