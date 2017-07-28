<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bare - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>


    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-1 text-left">
            <img class="img-responsive" src="image/logo-ugm.png" alt="" width="60px">
            </div>
            <div class="col-lg-11 text-left"> 
             <p>FAKULTAS KEDOKTERAN UNIVERSITAS GADJAH MADA </p>
             <p>LABORATORIUM BIOANTROPOLOGI & PALEOANTROPOLOGI </p>
            </div>
        </div>

        <div class="row">
        <?php 
            session_start();
            include '../menejemen/config/inc-db.php';
            $get = mysql_query("SELECT * FROM tbl_trainee
                                LEFT JOIN tblx_trainee_detail
                                ON tblx_trainee_detail.trainee_id_fk=tbl_trainee.trainee_id 
                                LEFT JOIN ref_coursename 
                                ON ref_coursename.coursename_id=tblx_trainee_detail.coursename_id_fk
                                LEFT JOIN trx_score
                                ON trx_score.trainee_id_fk=tbl_trainee.trainee_id
                                WHERE trx_score.trainee_id_fk='".$_GET['idtrainee']."' ");
            $data = mysql_fetch_array($get);
        ?>

            <div class="col-lg-12 text-center" style="background-image:url('image/UGMLogoKuning.jpg');background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center; padding-bottom: 10%;">
                <h1>SERTIFIKAT</h1>
                <p> diberikan kepada <b><?php echo strtoupper($_SESSION['member_name']); ?></b></p>

                <p class="lead">Atas partisipasinya sebagai peserta</p>
                <p> Pada KURSUS <?php echo strtoupper($data['coursename_title']); ?> yang diselenggarakan oleh</p> 
                <p>Laboratorium Bioantropologi & Paleoantropologi </p>
                <p>Fakultas Kedokteran Universitas Gadjah Mada, Yogyakarta</p>
                <p> Periode <?php echo date('d F Y', strtotime($data['trainee_inputdate'])); ?> </p>
                <p> Hasil: <?php echo $data['score_status']; ?> dengan nilai <b><?php echo $data['score_alfabet']; ?></b> </p>

             
            </div>

         <div class="row">
            <div class="col-lg-12 text-left">


                <div class="row">

                        <div class="col-lg-6 text-left ">Prof. dr. Ova Emilia, M.Med.Ed., Sp. OG(K), Ph.D. <br>Dekan Fakultas Kedokteran UGM</div>
                        <div class="col-lg-6 text-right">Dra. Neni Trilusiana Rahmawati, M.Kes., Ph.D. <br>Kepala Lab. Bioantropologi &  Paleoantropologi <br>Fakultas Kedokteran UGM
</div>
                     
                </div>

             <!-- <p>FAKULTAS KEDOKTERAN UNIVERSITAS GADJAH MADA </p>
             <p>LABORATORIUM BIOANTROPOLOGI & PALEOANTROPOLOGI </p>
 -->
            </div>
        </div>






        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
