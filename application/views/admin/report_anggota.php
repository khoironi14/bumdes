<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				
				<div class="card-header bg-info">
					<div class="row">
					<div class="col-md-6"><h2>Laporan Data Anggota</h2></div>
					<div class="col-md-6"><a href="<?=base_url('report/print_anggota')?>" class="btn btn-danger btn-sm float-right" target="blank">Print</a>	</div>	
					</div>
				</div>
				<div class="card-body">
					<div class="table table-responsive">
					<table class="table table-bordered" >
						<thead>
							<tr>
								<th>No</th>
								<th>NIK</th>
								<th>Nama</th>
								<th>Alamat</th>
								<th>telpon</th>
								<th>Jumlah Pinjaman</th>
								
								
								
							</tr>
						</thead>
						<tbody>
							<?php $no=1; foreach ($anggota as $tampil) {
							 ?>
							<tr>
								<td><?=$no++?></td>
								<td><?=$tampil->nik?></td>
								<td><?=$tampil->nama?></td>
								<td><?=$tampil->alamat?></td>
								<td><?=$tampil->telpon?></td>
								<td>Rp. <?=number_format($tampil->jumlah_pinjaman,2,',','.')?></td>
								
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

