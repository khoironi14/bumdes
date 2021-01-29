<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				
				<div class="card-header bg-info">
					<div class="row">
					<div class="col-md-6"><h2>Laporan Data Pembayaran</h2></div>
					<div class="col-md-6"><a href="<?=base_url('report/print_pembayaran')?>" class="btn btn-danger btn-sm float-right" target="blank">Print</a>	</div>	
					</div>
				</div>
				<div class="card-body">
						<table class="table table-bordered">

								<thead>	
									<tr>	
										<th>No</th>
										<th>Nama</th>
										<th>No Pembayaran</th>
										<th>Pembayaran</th>
										<th>Denda</th>
										<th>Tanggal</th>

									</tr>

								</thead>
								<tbody>	

									<?php $no=1; foreach ($pembayaran as $tampil) {
										$nik=$tampil->nik;
									 ?>
										<tr>	
											<td><?=$no++?></td>
											<td><?=$tampil->nama?></td>
											<td><?php $query=$this->db->get_where('tb_pembayaran',['status_pembayaran'=>1,'nik'=>$nik])->result(); foreach ($query as $data) {
												echo "<p>".$data->no_pembayaran."</p>";
											} ?></td>
											<td><?php $query=$this->db->get_where('tb_pembayaran',['status_pembayaran'=>1,'nik'=>$nik])->result(); foreach ($query as $data) {
												echo "<p>Rp.". number_format($data->jumlah_pembayaran,2,',','.')."</p>";
											} ?></td>
											<td><?php $query=$this->db->get_where('tb_pembayaran',['status_pembayaran'=>1,'nik'=>$nik])->result(); foreach ($query as $data) {
												echo "<p>Rp.". number_format($data->denda,2,',','.')."</p>";
											} ?></td>
											<td><?php $query=$this->db->get_where('tb_pembayaran',['status_pembayaran'=>1,'nik'=>$nik])->result(); foreach ($query as $data) {
												echo "<p>". date('d-m-Y',strtotime( $data->tanggal_pembayaran))."</p>";
											} ?></td>
										</tr>
									<?php }?>
								</tbody>
						 	</table>





				</div>
			</div>
		</div>
	</div>
</div>
