<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header bg-primary">
					<div class="row">
						<div class="col-md-3">
							<p>Form Pengajuan Pembayaran</p>
						</div>
					</div>
				</div>
				<?php
				$nik=$this->session->userdata('nik');
					$sekarang=date('d-m-Y');
				if ($cp>0) {
					# code...
				
				  $tempo=date('d-m-Y',strtotime('+30 days',strtotime($denda['tanggal_pembayaran'])));
				}else{
					 $tempo=date('d-m-Y',strtotime('+30 days',strtotime($tgpi['tanggal'])));

				}
 $selisih=strtotime($sekarang)-strtotime($tempo);
 $hari = $selisih/(60*60*24);
 
 $bulan= floor($hari/30);
 
 $cek1=$this->db->get_where("tb_peminjaman",["nik"=>$nik,"lunas"=>0,"status"=>1])->num_rows();
				   ?>
				<div class="card-body">
					<?php if ($cek1 >0) {
						# code...
					 ?>
					<form action="<?=base_url('Pengajuan/pengajuan_pembayaran')?>" method="post" enctype="multipart/form-data" >
						<input type="hidden" name="id_peminjaman" value="<?=$cek['id_peminjaman']?>">
						<input type="hidden" name="no_pembayaran" value="<?=date('his')?>">
						<div class="form-group">
							<label>NIK</label>
							<input type="text" name="nik" class="form-control" value="<?=$this->session->userdata('nik')?>" readonly>
						</div>
						<div class="form-group">
								<label>	ANGSURAN KE</label>
								<input type="text" name="angsuran_ke" class="form-control" value="<?php if($count['jumlah']==0){

									echo 1;
								}else{
										echo $count['jumlah']+1;

								} ?>" readonly>
							</div>
						<div class="form-group">

								<label>Angsuran</label>
								<input type="text" name="" value="<?=$cek['besar_angsuran']?>" class="form-control" readonly>
							</div>
							<div class="form-group">
									<label>	Denda</label>
									<input type="text" name="denda" class="form-control" value="<?php  $denda=floor( 1*($cek['besar_angsuran']+$cek['bunga'])/100*$bulan); if($denda <0){ echo $denda= 0;}else{ echo $denda	;} ?>" readonly	>
								</div>
								<div class="form-group">
										<label>	Total Angsuran</label>
										<input type="text" name="total" class="form-control" value="<?php $bb=0; echo $bb=$cek['besar_angsuran']+$denda ?>" readonly>
									</div>
						<div class="form-group">
							<label>Nominal Pembayaran</label>
							<input type="text" name="nominal" id="" value="<?php echo $bb ?>" class="form-control" readonly>
						</div>

						<div class="form-group">
							<label>Upload Bukti</label>
							<input type="file" name="foto" class="form-control" required="">
						</div>
						<div class="form-group">
								<button class="btn btn-success" name="simpan">	Simpan</button>
							</div>
					</form>
						<?php }else{
								echo "Tidak Punya Pinjaman";

						}?>


				</div>
			</div>
		</div>
	</div>
</div>
