<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header bg-primary">
					<div class="row">
						<div class="col-md-3">
							<p>Form Pengajuan Pinjaman</p>
						</div>
					</div>
				</div>
				<div class="card-body">
<?php if ($cek->num_rows() >0) {
echo "<p>Lunasi Dulu Kredit Sebelumnya</p>";
}else{ ?>
					<form action="<?=base_url('pengajuan/simpan_pengajuan')?>" method="post">
						<div class="form-group">
						<label>NIK</label>
						<input type="text" name="nik" class="form-control" value="<?=$this->session->userdata('nik')?>" readonly></div>
						<div class="form-group">
						<label>Nama</label>
						<input type="text" name="nama" class="form-control" value="<?=$this->session->userdata('nama')?>" readonly></div>
						<div class="form-group">
							<label>Jumlah Pinjaman</label>
							<input type="text" name="jumlah_pinjaman" id="jumlah_pinjaman" class="form-control">
						</div>
						<div class="form-group">
							<label>Durasi Pinjaman</label>
							<select  name="durasi" id="durasi" class="form-control">
								<option>--Pilih--</option>
								<?php foreach ($durasi as $tampil) {
									# code...
								 ?>
								<option value="<?=$tampil->id_durasi?>"><?=$tampil->lama_pinjaman?> Bulan</option>
							<?php }?>
							</select>
						</div>
						<div class="form-group">
							<label>Bunga Rp</label>
							<input type="text" name="bunga" id="bunga" class="form-control" readonly="">
						</div>
						<div class="form-group">
							<label>Angsuran</label>
							<input type="text" name="angsuran" id="angsuran" class="form-control" readonly="">
						</div>
						<div class="form-group">
							<button class="btn btn-info btn-sm" name="simpan">Simpan</button>
						</div>
					</form>
<?php }?>

				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		var  hasil=0;
		var angsuran=0;
		var bagi=0;
		var total=0;
$('#durasi').change(function(){
var durasi=$('#durasi').val();
var jumlah_pinjaman=parseInt($('#jumlah_pinjaman').val());

$.ajax({

	url:"<?=base_url('pengajuan/cek_bunga/')?>"+durasi,
	type:"get",
	dataType:"JSON",
	success:function(data){
		var lama=data.lama_pinjaman;
var bunga=parseInt(data.presentase_bunga);
hasil=jumlah_pinjaman*bunga/100;
$('#bunga').val(hasil);
var bagi=parseInt(hasil)/lama;

var angsuran=parseInt(jumlah_pinjaman)/lama;
alert(angsuran);
var total=parseInt(bagi)+parseInt(angsuran);
$('#angsuran').val(total);

	}
})

});

	})
</script>
