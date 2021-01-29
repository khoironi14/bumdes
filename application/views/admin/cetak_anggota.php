<!DOCTYPE html>
<html>
<head>
	<title>	</title>
	<style>
th {
    padding: 3px 5px 3px 5px;
    border-right: 1px solid #666666;
    border-bottom: 1px solid #666666;
}

td {
    padding: 3px 5px 3px 5px;
    border-right: 1px solid #666666;
    border-bottom: 1px solid #666666;
}
 
.head th {
    font-weight: bold;
    font-size: 12px;
    background: #b7f0ff; 
}
 
table .main tbody tr th {
    font-size: 12px;
}
 
table, table .main {
    width: 100%;
    border-top: 1px solid #666;
    border-left: 1px solid #666;
    border-collapse: collapse;
    background: #fff;
}
 
h1 {
    font-size:20px;
}
</style>
</head>
<body>
	<h4 align="center">Data Anggota	</h4>
<table width="100%" >
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
</body>
</html>