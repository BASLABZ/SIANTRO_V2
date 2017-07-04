<?php 
   
    include 'menejemen/config/inc-db.php';
     session_start();
    //error_reporting(0);
    
     if (isset($_GET['logout'])) {
      // ---------UPDATE STATUS LOGIN MEMBER-------//
         $queryupdate=mysql_query("UPDATE tbl_member set member_status_login='N' where member_id='".$_SESSION['member_id']."'");
        session_destroy();
        echo "<script> alert('Anda Berhasil Keluar Aplikasi'); location.href='index.php' </script>";exit;
        }

    // ----- PERINTAH AKTIVASI MEMBER ----- //
    // if ($_GET['id']!='') {
    //   //update status member
    //   $q_member = mysql_query("UPDATE tbl_member SET 
    //                   member_status_active='active' 
    //                   WHERE member_id='".$_GET['id']."' ");

    //   echo "<script> alert('Selamat, akun anda telah aktif. Segera login dan lengkapi data diri anda'); location.href='index.php' </script>";exit;
    // }
    // ----- Tutup PERINTAH AKTIVASI MEMBER ----- //
    
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Elearning Antropologi Forensik - Kursus antropologi forensik online">
    <meta name="keywords" content="antropologi, antropologi forensik, laboratorium antropologi forensik, antropologi learning">
    <meta name="author" content="@praditysaa">
    <title>Antropologi Forensik</title>
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:300,500" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/Pe-icon-7-stroke.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/style.min.css">
  
  </head>
  <body id="home">
  <?php 

      include 'menuatas-member.php';
      if(isset($_GET['hal']) && strlen($_GET['hal']) > 0){
              $hal=str_replace(".","/",$_GET['hal']).".php";
             }else {
              $hal="kontentengah-member.php";    
              }
              if(file_exists($hal)){
              include($hal);    
              }else{
              include("kontentengah-member.php");   
      }
   ?>
   <?php include 'footer.php'; ?>

    <script src="assets/plugins/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/parallax.min.js"></script>
    <script src="assets/js/navigation.js"></script>
    <script src="assets/plugins/jquery.easing.js"></script>
    <script src="assets/js/script.js"></script>
   
  </body>
</html>
  <script type="text/javascript">
    $(document).ready(function(){
        $('#detail_paket').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            $.ajax({
                type : 'post',
                url : 'detail_paket.php',
                data :  'id='+ rowid,
                success : function(data){
                $('.detail_paket-data').html(data);
                }
            });
         });
    });
</script>