<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
        <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash') ?>"></div>
				<div class="card-header bg-primary">
					<div class="row">
						<div class="col-md-3"><p>Profil</p></div>
					</div>

				</div>
				<div  class="card-body">
					
				<div class="row">
					<div class="col-md-3"> <img src="<?php echo base_url('assets/gambar/'.$profil['foto'].'') ?>" class="card-img-top" alt="..."></div>
					<div class="col-md-6">
						<table class="table table-konseded">
							<tr>
								<td>NIK</td><td>:</td><td><?=$profil['nik']?></td>

							</tr>
							<tr>
								<td>Nama</td><td>:</td><td><?=$profil['nama']?></td>

							</tr>
							<tr>
								<td>Alamat</td><td>:</td><td><?=$profil['alamat']?></td>
							</tr>
							<tr>
								<td>Tempat Lahir</td><td>:</td><td><?=$profil['tempat_lahir']?></td>
							</tr>
							<tr>
								<td>Tanggal Lahir</td><td>:</td><td><?=date('d-m-Y',strtotime($profil['tanggal_lahir']))?></td>
							</tr>
              <tr>
                <td>Telpon</td><td>:</td><td><?=$profil['telpon']?></td>
              </tr>
						</table>
						<button class="btn btn-info btn-sm" onclick="edit(<?=$profil['id_anggota']?>)">Edit Profil</button> <a href="#" onclick="ganti_password()" class="btn btn-danger btn-sm">Ganti Password</a>
					</div>
				</div>	
				</div>
			</div>
		</div>
	</div>
</div>



<!-- Modal -->
<div class="modal fade" id="modal-profil" tabindex="-1" role="dialog" aria-labelledby="modal-profil" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title" id="modal-profil">Edit Profil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('welcome/edit_profil')?>" method="post" enctype="multipart/form-data" >
        <input type="hidden" name="id_anggota" id="id_anggota">
         <input type="hidden" name="nik1" id="nik1" class="form-control" required="">
                 <div class="form-group">
                  <label>NIK</label>
                  <input type="text" name="nik" id="nik" class="form-control" readonly="">
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama" id="nama" class="form-control" required="">
                </div>
                 <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" name="alamat" id="alamat" class="form-control" >
                </div>
                 <div class="form-group">
                  <label>Telpon</label>
                  <input type="text" name="telpon" id="telpon" class="form-control" >
                </div>
                 <div class="form-group">
                  <label>Tempat Lahir</label>
                  <input type="text" name="tempat" id="tempat" class="form-control">
                </div>
                  <div class="form-group">
                  <label>Tanggal Lahir</label>
                  <input type="date" name="tanggal" id="tanggal" class="form-control">
                </div>
                 <div class="form-group">
                  <label>Jenis Kelamin</label>
                 <select name="jenis" id="jenis"  class="form-control">
                   <option value="1">Laki-Laki</option>
                    <option value="2">Perempuan</option>
                 </select>
                </div>
                 
        	<div class="form-group">
        		<label>Foto</label>
        		<input type="file" name="foto" class="form-control">
            <input type="hidden" name="file_foto" id="file_foto">
        	</div>
          <div class="form-group">
            <label>KTP</label>
            <input type="file" name="ktp" class="form-control">
             <input type="hidden" name="file_ktp" id="file_ktp">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

      </div>
    </div>
  </div>
</div>

<!--Modal Ganti Password-->
<!-- Modal -->
<div class="modal fade" id="modal-password"  role="dialog" aria-labelledby="modal-password" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title" id="modal-password">Form Ganti Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="keterangan"></div>
      
        	 <div class="form-group">
            <label>Password Lama</label>
            <input type="password" name="password_lama" id="password_lama" class="form-control" required="">
          </div>
          <div class="form-group">
            <label>Password Baru</label>
            <input type="password" name="password_baru" id="password_baru" class="form-control" required="">
          </div>
          <div class="form-group">
            <label>KonfirmasiPassword </label>
            <input type="password" name="konfirmasi" id="konfirmasi" class="form-control" required="">
          </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="simpan" class="btn btn-primary">Simpan</button>
         
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">

  function ganti_password(){
$('#modal-password').modal('show'); 
$('#modal-profil').modal('hide');

  }
  function edit(id){
 $('#modal-password').modal('hide');  
    $.ajax({

      url:"<?=base_url('welcome/show/')?>"+id,
      type:"get",
      dataType:"JSON",
      success:function(data){
         document.getElementById('nik1').value=data.nik;
        document.getElementById('nik').value=data.nik;
        document.getElementById('nama').value=data.nama;
        document.getElementById('alamat').value=data.alamat;
        document.getElementById('telpon').value=data.telpon;
        document.getElementById('tempat').value=data.tempat_lahir;
        document.getElementById('tanggal').value=data.tanggal_lahir;
        document.getElementById('jenis').value=data.jk;
        document.getElementById('id_anggota').value=data.id_anggota;
        document.getElementById('file_foto').value=data.foto;
        document.getElementById('file_ktp').value=data.ktp;
        $('#modal-profil').modal();
      }

    })
    
  }
</script>

<script type="text/javascript">
  $(document).ready(function(){
$('#simpan').click(function(){
var lama=$('#password_lama').val();
var baru=$('#password_baru').val();
var konfirmasi=$('#konfirmasi').val();
//alert(lama);
if (lama && baru !="") {
$.ajax({
url:"<?=base_url('welcome/ganti_password')?>",
type:"POST",
data:{lama:lama,baru:baru,konfirmasi:konfirmasi},
dataType:"JSON",
success:function(data){
  //alert(data.keterangan);
$('#keterangan').html(data.keterangan);

}


});
}else{
  alert("Kosong");
}
});

  });
</script>