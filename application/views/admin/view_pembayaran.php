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

					<table class="table table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>NIK</th>
								<th>Nama</th>
								<th>Jumlah Pinjaman</th>
								<th>Bunga</th>
								<th>Jatuh Tempo</th>
								<th>Sisa Pinjaman</th>
								<th>Action</th>

							</tr>
						</thead>
							<tbody>
								<?php $no=1; foreach ($pembayaran as $tampil) {
									$nik=$tampil->nik;
									$idp=$tampil->id_peminjaman;
								 ?>
								<tr>
								<td><?=$no++?></td>	
								<td><?=$tampil->nik?></td>
								<td><?=$tampil->nama?></td>
								<td>Rp.<?=number_format($tampil->jumlah_pinjaman,2,',','.')?></td>
								<td>Rp.<?=number_format($tampil->bunga,2,',','.')?></td>
								<td> <?php $query=$this->db
								->order_by('id_pembayaran','desc')
								->get_where('tb_pembayaran',['nik'=>$nik,'id_pinjaman'=>$idp]);
								if ($query->num_rows() >0) {
									$data=$query->row_array();
									echo date('d-m-Y',strtotime('+30 days',strtotime($data['tanggal_pembayaran'])));
								}else{

									echo date('d-m-Y',strtotime('+30 days',strtotime($tampil->tanggal)));

									
								}

								 ?></td>
								 <td><?php $query=$this->db
								 ->select('sum(jumlah_pembayaran) as jumlah')
								->group_by('nik','id_pinjaman')
								->get_where('tb_pembayaran',['nik'=>$nik,'id_pinjaman'=>$idp]);
								if ($query->num_rows() >0) {
									$data=$query->row_array();
									 $hasil=$tampil->jumlah_pinjaman-$data['jumlah']+$tampil->bunga;
									 echo "Rp.". number_format($hasil,2,',','.');
								}else{

									$hasil= $tampil->jumlah_pinjaman+$tampil->bunga;

									 echo "Rp.". number_format($hasil,2,',','.');
								}

								 ?></td>
								<td><?php if ($tampil->lunas==0) {
									# code...
								 ?><a href="#" onclick="bayar(<?=$tampil->id_peminjaman?>)" class="btn btn-success btn-sm">Bayar</a><?php }?><a href="<?=base_url('pembayaran/detail_pembayaran/'.$tampil->nik.'/'.$tampil->id_peminjaman.'')?>" class="btn btn-danger btn-sm">Detail</a></td>
								</tr>
							<?php }?>
							</tbody>
						</table>
</div>
</div>
</div>
</div>
</div>
<!--modall-->
<!-- Modal -->
<div class="modal fade" id="modal-pembayaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title" id="exampleModalLabel">Form Pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="<?=base_url('pembayaran/simpan_pembayaran')?>" method="post">
       	<input type="hidden" name="no_pembayaran" value="<?=date('dhism')?>">
       	<input type="hidden" name="id_peminjaman" id="id_peminjaman">
       	<input type="hidden" name="nik" id="nik">
       	<div class="form-group">
       		<label>Angsuran Ke</label>
       		<input type="text" name="angsuran_ke" id="angsuran_ke" class="form-control" readonly="">
       	</div>
       	<div class="form-group">
       		<label>Nama</label>
       		<input type="text" name="nama" class="form-control" id="nama" readonly="true">
       	</div>
       		<div class="form-group">
       		<label>Jumlah Pinjaman+Bunga</label>
       		<input type="text" name="pinjaman" class="form-control" id="pinjaman" readonly="true">
       	</div>
       		<div class="form-group">
       		<label>Besar Angsuran</label>
       		<input type="text" name="angsuran" class="form-control" id="angsuran" readonly="true">
       	</div>
       	<div class="form-group">
       			<label>Denda</label>
       			<input type="text" name="denda" class="form-control" id="denda" readonly="">

       		</div>
       		<div class="form-group"><label>Total Angsuran</label><input type="text" name="total" id="totalk" class="form-control" readonly="">	</div>
       		<div class="form-group">
       		<label>Bayar</label>
       		<input type="text" name="bayar" class="form-control" id="bayar" readonly="">
       	</div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
       </form>
    </div>
  </div>
</div>


						<script type="text/javascript">
							function bayar(id){
								var total=0;
								var ag=0;
								var jumlah=0
								
								//alert(nik);
								$.ajax({

									url:"<?=base_url('pembayaran/cek_tagihan/')?>"+id,
									type:"get",
									dataType:"JSON",
									success:function(data){
										var b=parseInt(data['p'].besar_angsuran);
									var d=parseInt(data.denda);
								jumlah= b+d;
										var a=parseInt(data['count'].jumlah);
										ag=a+1;
										document.getElementById('angsuran_ke').value=ag;
										var bunga=parseInt(data['p'].bunga);
										var pinjaman=parseInt(data['p'].jumlah_pinjaman);
										total=bunga+pinjaman;
										document.getElementById('nama').value=data['p'].nama;
										document.getElementById('pinjaman').value=total;
										document.getElementById('angsuran').value=data['p'].besar_angsuran;
										document.getElementById('nik').value=data['p'].nik;
										document.getElementById('id_peminjaman').value=data['p'].id_peminjaman;
										document.getElementById('denda').value=data.denda;
										document.getElementById('totalk').value=jumlah;
										document.getElementById('bayar').value=jumlah;	
										$('#modal-pembayaran').modal();

									}

								});
							}
						</script>
