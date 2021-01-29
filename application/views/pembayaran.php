<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash') ?>"></div>
				<div class="card-header bg-primary">
					<div class="row">
						<div class="col-md-3">
							<p>Pembayaran</p>
						</div>
					</div>
				</div>
				<div class="card-body">
<div class="row">
	<div class="col-md-8"><table class="table table-konseded">
	<tr>
		<td>Jumlah Pinjaman</td><td>:</td><td>Rp. <?=number_format($pinjam['jumlah_pinjaman']+$pinjam['bunga'],2,',','.')?></td><td>Sisa Pinjaman</td><td>:</td><td><?php if ($p['bayar']=="") {
			# code...
		} $total=0; $total=$pinjam['jumlah_pinjaman']+$pinjam['bunga']-$p['bayar']; if ($total <0) {
			echo 0;
		}else{
		 echo "Rp.". number_format($total,2,',','.'); } ?></td>
		
	</tr>
	<tr>
		<td>Jumlah Angsuran</td><td>:</td><td>Rp. <?=number_format($pinjam['besar_angsuran'],2,',','.')?></td><td>Sisa Angsuran</td><td>:</td><td><?php $tp=0;  $tp=$pinjam['lama_pinjaman']-$p['jml']; if ($tp <0) {
			echo 0;
		}else{

			echo $tp;
		} ?></td>
	</tr>
</table></div>
</div>

<table class="table table-bordered">
	<thead>
		
		<tr>
			<th>No</th>
			<th>No Pengajuan</th>
			<th>Tanggal</th>
			<th>Pembayaran</th>
			<th>Angsuran Ke</th>
		</tr>
	</thead>
	<tbody>

		<?php $no=1; foreach ($pembayaran as $tampil) {
			# code...
		 ?>
		<tr>
			<td><?=$no++?></td>
			<td><?=$tampil->no_pembayaran?></td>
			<td><?php echo date('d-m-Y',strtotime($tampil->tanggal_pembayaran)) ?></td>
			<td>Rp. <?=number_format($tampil->jumlah_pembayaran,2,',','.')?></td>
			<td><?=$tampil->angsuranke?></td>
		</tr>


	<?php }?>
	</tbody>
</table>









				</div>
			</div>
		</div>
	</div>
</div>
