<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash') ?>"></div>
				<div class="card-header bg-info">
					<div class="row">
						<div class="col-md-9">Setting Presentase Bunga</div>
						<div class="col-md-3">
							<?php $akses=$this->session->userdata('akses');
          if ($akses==1 ) {
           
          

           ?>
							<a href="#" onclick="tambah()" class="btn btn-primary btn-sm float-right">Tambah</a> <?php }?>
						</div>
					</div>
				</div>
				<div class="card-body">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Durasi Pinjaman</th>
								<th>Bunga %</th>
								<?php 
          if ($akses==1 ) {
           
          

           ?>
								<th>Action</th>
							<?php }?>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; foreach ($bunga as $tampil) {
								# code...
							 ?>
							<tr>
								<td><?=$no++?></td>
								<td><?=$tampil->lama_pinjaman?></td>
								<td><?=$tampil->presentase_bunga?></td>
							<?php 
          if ($akses==1 ) {
           
          

           ?>
								<td><a href="#" onclick="edit(<?=$tampil->id_durasi?>)" class="btn btn-primary btn-sm">Edit</a> <a href="<?=base_url('bunga/hapus/'.$tampil->id_durasi.'')?>" class="btn btn-danger btn-sm">Hapus</a></td><?php }?>
							</tr>
						<?php }?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<!--Modal-->
<!-- Modal -->
<div class="modal fade" id="modal-bunga" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLabel">Form Setting Bunga</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="<?=base_url('bunga/add_bunga')?>" method="post">
       	<input type="hidden" name="id_durasi" id="id_durasi">
       	<div class="form-group">
       		<label>Durasi Pinjaman</label>
       		<input type="text" name="durasi" id="durasi" class="form-control">
       	</div>
       		<div class="form-group">
       		<label>Bunga %</label>
       		<input type="text" name="bunga" id="bunga" class="form-control">
       	</div>
      

      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>

       </form>
    </div>
  </div>
</div>
<script type="text/javascript">
	function tambah(){
		document.getElementById('id_durasi').value="";
				document.getElementById('durasi').value="";
				document.getElementById('bunga').value="";
				//document.getElementById('angsuran').value="";
$('#modal-bunga').modal();

	}

	function edit(id){
		$.ajax({
			url:"<?=base_url('bunga/edit/')?>"+id,
			type:"get",
			dataType:"JSON",
			success:function(data){
				document.getElementById('id_durasi').value=data.id_durasi;
				document.getElementById('durasi').value=data.lama_pinjaman;
				document.getElementById('bunga').value=data.bunga;
				//document.getElementById('angsuran').value=data.angsuran;
				$('#modal-bunga').modal();
			}


		});
	}
</script>