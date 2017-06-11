<?php 
    include '../config/inc-db.php';
    session_start();
   if (isset($_GET['logout'])) {
        session_destroy();
        echo "<script> alert('Anda Berhasil Keluar Aplikasi'); location.href='index.php' </script>";exit;}
    if (isset($_SESSION['level_name']))
            { if ($_SESSION['level_name'] == "Dosen Pengajar")
               { 
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIANTRO UGM | Dashboard</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../assets/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../assets/plugins/iCheck/flat/blue.css">
  <link rel="stylesheet" href="../assets/plugins/morris/morris.css">
  <link rel="stylesheet" href="../assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <link rel="stylesheet" href="../assets/plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="../assets/plugins/daterangepicker/daterangepicker-bs3.css">
  <link rel="stylesheet" href="../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="../assets/plugins/datatables/dataTables.bootstrap.css">

</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">
  <?php include 'menuatas.php'; ?>
  <?php include 'menukiri.php'; ?>

  <div class="content-wrapper">
   <?php 
              if(empty( $_GET['hal']) ||  $_GET['hal'] ==""){
                $_GET['hal'] = "kontentengah.php";
              }
              if(file_exists( $_GET['hal'].".php")){
                include  $_GET['hal'].".php";
              }else {
                include"kontentengah.php";
              }   
        ?> 
  </div>
  <footer class="main-footer">
    <strong>Copyright &copy; <?php echo date('Y'); ?> SIANTRO UGM - Dita</strong> All rights
    reserved.
  </footer>
</div>
<script src="../assets/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<!-- <script src="../assets/plugins/morris/morris.min.js"></script> -->
<script src="../assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="../assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="../assets/plugins/knob/jquery.knob.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="../assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="../assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="../assets/plugins/fastclick/fastclick.js"></script>
<script src="../assets/dist/js/app.min.js"></script>
<!-- <script src="../assets/dist/js/pages/dashboard.js"></script> -->
<script src="../assets/dist/js/demo.js"></script>
<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('#tableMaster').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
    $('#tableMasterScroll').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "scrollX": true
    });

  });
  
</script>
</body>
</html>
<?php
    }else if ($_SESSION['level_name'] == "SA")
       {header('location:index.php');}}
    if (!isset($_SESSION['level_name'])){header('location:../index.php');}
?>