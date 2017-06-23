<?php

// load query database
// $ency = $_GET['id'];
$email = $_GET['email'];
$new_pass = $_GET['new_pass'];
// $id = base64_decode($ency);

$querymember  = mysql_query("SELECT member_useremail,member_password from tbl_member where member_useremail='".$email."'");
$row  = mysql_fetch_array($querymember);
$emails = $row['member_useremail'];

 ?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
	<h3><center>Reset Password Member : <?php echo $row['member_useremail']; ?></center></h3>
	<h4><center>Password Baru Anda : <?php echo $new_pass; ?></center></h4>
</body>
</html>