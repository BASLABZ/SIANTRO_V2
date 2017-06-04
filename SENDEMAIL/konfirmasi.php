<?php 
		include 'config/config.php';
		// $ency = $_GET['id'];
		$email = $_GET['email'];
		$queryaktivasi = mysql_query("UPDATE tbl_member set member_status_active='active' where member_useremail='".$email."'");
		if ($queryaktivasi) {
			 echo "<script> alert('Akun Anda Telah Aktif Silahkan Login Member'); location.href='../index.php' </script>";exit;
		}
 ?>
