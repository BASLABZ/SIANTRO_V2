<?php

// load query database
$id = $_GET['id'];
$email = $_GET['email'];
		$query = mysql_query("SELECT * FROM  trx_confirmation_ofpayment t  join tbl_trainee tn on t.trainee_id_fk = tn.trainee_id where t.confirmation_id = '".$id."'");
		$detail = mysql_fetch_array($query);
        $idmember = $detail['member_id_fk'];
        $querymember = mysql_query("SELECT * from tbl_member where member_id = '".$idmember."'");
        $runmember = mysql_fetch_array($querymember);
        $email = $runmember['member_useremail'];
 ?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

	<center><h3>KURSUS ANTROPOLOGI
			</h3>
	</center>
	<h1>PEMBAYARAN ANDA TELAH DI VERIFIKASI & <?php echo $detail['payment_valid']; ?></h1>
	<table border="1">
		<thead>
			<th>TANGGAL KONFIRMASI ADMIN</th>
			<th>NAMA BANK</th>
			<th>NOMOR REKENING</th>
			<th>KATEGORI PEMBAYARAN</th>
			<th>TOTAL TAGIHAN</th>
			<th>JUMLAH YANG DIBAYAR</th>
			<th>VERIFIKASI</th>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $detail['payment_date_valid']; ?></td>
				<td><?php echo $detail['namebank']; ?></td>
				<td><?php echo $detail['confirmation_accountnumber']; ?></td>
				<td><?php echo $detail['confirmation_category']; ?></td>
				<td><?php echo $detail['total_tagihan']; ?></td>
				<td><?php echo $detail['amount_transfer']; ?></td>
				<td><?php echo $detail['payment_valid']; ?></td>
			</tr>
		</tbody>
	</table>
	<p>Terima Kasih Telah Bergabung Dengan Kami </p>
	
</body>
</html>