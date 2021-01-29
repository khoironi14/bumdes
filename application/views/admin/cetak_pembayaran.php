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
	<h2 align="center">Laporan Pembayaran</h2>
<table width="100%">

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

</body>
</html>