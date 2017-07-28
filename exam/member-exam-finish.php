<?php 
error_reporting(0);
  $kursus = mysql_query("SELECT * FROM tblx_trainee_detail
  LEFT JOIN ref_coursename ON tblx_trainee_detail.coursename_id_fk=ref_coursename.coursename_id
  LEFT JOIN trx_soalexam ON trx_soalexam.coursename_id_fk=ref_coursename.coursename_id
  WHERE tblx_trainee_detail_id='".$_GET['kur']."'");
  
  $rowKursus = mysql_fetch_array($kursus);

  $q_score = mysql_query("SELECT * FROM trx_score LEFT JOIN tbl_trainee ON trx_score.trainee_id_fk=tbl_trainee.trainee_id LEFT JOIN tblx_trainee_detail ON tblx_trainee_detail.trainee_id_fk=tbl_trainee.trainee_id WHERE tblx_trainee_detail_id='".$_GET['detailpeserta']."' ");
  $d_score = mysql_fetch_array($q_score);
?>
  <!-- prosedur -->
    <div id="process" class="process content-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 marg-60-btm">
            <h2 class="text-big text-center text-uppercase"><span class="fa fa-user"></span> Ujian <?php echo $rowKursus['coursename_title'] ?></h2>
            <!-- nama kursus dinamis diambil dari session -->
            <hr>
           <i><p align="center"><span class="fa fa-arrow-left"></span> Anda telah menyelesaikan ujian ini <span class="fa fa-arrow-right"></span> </p></i>
           
          </div><!-- .col-## -->
        </div><!-- .row -->
        <div class="row">
        <?php 
            
         ?>
          <div class="col-md-2 col-sm-12"></div>
          <div class="col-md-8 col-sm-12" style="margin-top: -6em">
            <div class="process-item highlight text-center">
                <div class="col-md-12" style="background-color: #26AD5F; text-align: center; padding-bottom: 1em; margin-bottom: 4em"><h3 style="color: #fff">SELAMAT <?php echo strtoupper($_SESSION['member_name']); ?></h3></div>
              <div class="process-item-content" style="text-align: left; padding-bottom: 4em"> 
                <h5>
                <?php 
                  $benar = 0;
                  $salah = 0;
                  $getAnsw = mysql_query("SELECT * FROM tbl_temp_score 
                    LEFT JOIN trx_exam ON trx_exam.exam_id=tbl_temp_score.exam_id_fk
                    WHERE traineedetail_id_fk='".$_GET['detailpeserta']."' ORDER BY temp_score_id ASC");
                  while ($dataAnsw = mysql_fetch_array($getAnsw)) {
                    if ($dataAnsw['temp_answer']==$dataAnsw['exam_true']) {
                      $benar = $benar+1;
                    } else {
                      $salah = $salah+1;
                    }
                  }
                ?>
                  <table class="table">
                    <tr>
                      <td>Score Anda</td>
                      <td> : </td>
                      <td> <?php echo $d_score['score_alfabet']; ?> </td>
                    </tr>
                    <tr>
                      <td>Jawaban Benar</td>
                      <td> : </td>
                      <td> <?php echo $benar; ?> </td>
                    </tr>
                    <tr>
                      <td>Jawaban Salah</td>
                      <td> : </td>
                      <td> <?php echo $salah; ?> </td>
                    </tr>
                    <tr>
                      <td>Status</td>
                      <td> : </td>
                      <td><span style="font-size: 20pt"><b> <?php echo $d_score['score_status']; ?> </b></span></td>
                    </tr>
                  </table>
                </h5><br/>
                    <button class="btn btn-primary">
                     <a href='#detail_paket' id='custId' data-toggle='modal' data-id="<?php echo $rowPaket['coursename_id']; ?>" style="color: #fff"><span class='fa fa-eye'></span> Cek Jawaban Anda</a>
                     </button>
                  <?php 
                    if ($d_score['score_status']=='Tidak Lulus') { ?>
                      <button class="btn btn-primary pull-right" disabled>Cetak Sertifikat <i class="fa fa-print"></i></button> <?php                      
                    } else { ?>
                      <button class="btn btn-primary pull-right"><a href="sertifikat/index.php?idtrainee=<?php echo $d_score['trainee_id']; ?>" target="_blank" style="color: #fff">Cetak Sertifikat <i class="fa fa-print"></i></a> </button> <?php 
                    }
                  ?>
              </div><!-- .process-item-content -->
            </div><!-- .process-item -->
          </div><!-- .col-## -->
          <div class="col-md-2 col-sm-12"></div>

        </div><!-- .row -->
      </div><!-- .container -->
    </div><!-- #process -->
    <!-- end:process -->
    <div class="modal fade" id="detail_paket" role="dialog" >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #1ab394; color:white;">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><span class="fa fa-list"></span> Detail Jawaban</h4>
                    </div>
                    <div class="modal-body">
                        <!-- query jawaban peserta dengan jawaban yg benar -->
                      <?php 
                        $no_urut = 1;
                        $getAnsw2 = mysql_query("SELECT * FROM tbl_temp_score 
                          LEFT JOIN trx_exam ON trx_exam.exam_id=tbl_temp_score.exam_id_fk
                          WHERE traineedetail_id_fk='".$_GET['detailpeserta']."' ORDER BY temp_score_id ASC");
                        while ($dataAnsw2 = mysql_fetch_array($getAnsw2)) { ?>
                        <h4><?php echo $no_urut++.") ".$dataAnsw2['exam_title'] ?></h4>
                        <table>
                          <tr>
                            <td width="100px">Jawaban anda</td>
                            <td width="20px"> : </td>
                            <td><?php echo $dataAnsw2['temp_answer']; ?></td>
                          </tr>
                          <tr>
                            <td>Jawaban benar</td>
                            <td> : </td>
                            <td><?php echo $dataAnsw2['exam_true']; ?></td>
                          </tr>
                        </table>
                                                    
                      <?php    
                        }
                      ?>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger dim_about" data-dismiss="modal"><span class="fa fa-times"></span> Keluar</button>
                    </div>
                </div>
            </div>
    </div>
    