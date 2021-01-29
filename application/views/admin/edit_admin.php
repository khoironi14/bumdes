<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col-md-3">
							<p>Form Admin</p>
						</div>
					</div>
				</div>
				<div class="card-body">
					<form action="<?=base_url('admin/edit')?>" method="post">
						<input type="hidden" name="id_admin" value="<?=$edit['id_admin']?>">
						<div class="form-group">
							<label>NIK</label>
							<input type="text" name="nik" value="<?=$edit['nik']?>" class="form-control" readonly >
						</div>
						<div class="form-group">
							<label>Nama</label>
							<input type="text" name="nama" value="<?=$edit['nama_lengkap']?>" class="form-control">
						</div>
						<div class="form-group">
							<label>Alamat</label>
							<input type="text" name="alamat" value="<?=$edit['alamat']?>" class="form-control">
						</div>
						<div class="form-group">
							<label>Jenis Kelamin</label>
							<select name="jenis" class="form-control">
								<option value="1">Laki-Laki</option>
								<option value="2">Perempuan</option>
							</select>
						</div>

						<div class="form-group">
							<label>Telpon</label>
							<input type="text" name="telpon" value="<?=$edit['telpon']?>" class="form-control">
						</div>
							
							<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" value="<?=$edit['email']?>" class="form-control">
						</div>
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="username" value="<?=$edit['username']?>" class="form-control">
						</div>
						<div class="form-group">
							<button name="simpan" class="btn btn-info btn-sm">Simpan</button><a href="<?=base_url('admin')?>" class="btn btn-danger btn-sm">Kembali</a>
						</div>
					</form>






					</div>
				</div>
			</div>
		</div>
	</div>
