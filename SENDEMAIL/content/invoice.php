<?php

// load query database
// $ency = $_GET['id'];
$email = $_GET['email'];
// $id = base64_decode($ency);

$querymember  = mysql_query("SELECT member_useremail from tbl_member where member_useremail='".$email."'");
$row  = mysql_fetch_array($querymember);
$emails = $row['member_useremail'];

 ?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
	<center><h3>SIANTRO UGM
			</h3>
	</center>
	<p>Terima Kasih Telah Bergabung Dengan Kami </p>
	<p>untuk <b>Aktifasi</b> Silahkan Klik Link Berikut <a href="http://localhost/SIANTRO_V2/SENDEMAIL/konfirmasi.php?email=<?php echo $emails; ?>">Aktifasi Akun</a> </p>
</body>
</html>