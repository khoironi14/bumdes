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
					
					<?php

						$nik=$this->session->userdata('nik');

					 $cek1=$this->db->get_where("tb_peminjaman",["nik"=>$nik,"lunas"=>0,"status"=>1])->num_rows();
						if ($cek1 >0) {

					 ?>
						<table class="table table-bordered">
								<thead>	
										<tr>	
												<th>No</th>
												<th>No Pengajuan</th>
												<th>Jumlah Pembayaran</th>
												<th>Bukti</th>
												<th>Tanggal</th>
												<th>Status</th>

										</tr>

								</thead>
								<tbody>	
									<?php $no=1; foreach ($pembayaran as $tampil) {
										
											# code...
										
									 ?>
										<tr>	
												<td><?=$no++?>	</td>
												<td><?=$tampil->no_pembayaran?></td>
												<td>Rp.<?=$tampil->jumlah_pembayaran?></td>
												<td><img width="20%" class="" src="<?=base_url('assets/gambar/'.$tampil->foto.'')?>"></td>
												<td><?=$tampil->tanggal_pembayaran?></td>
												<td><?php if ($tampil->status_pembayaran==0) {
													echo "Menunggu Persetujuan";
												}else if ($tampil->status_pembayaran==1) {

														echo "Pembayaran Berhasil";
												}else if($tampil->status_pembayaran==2){
														echo "Pembayaran ditolak";

												} ?></td>

										</tr>

									<?php } ?>

								</tbody>


							</table>

				</div>
<?php }else{

echo "<p>Tidak ada pinjaman</p>";
}?>
			</div>
		</div>
	</div>
</div>
