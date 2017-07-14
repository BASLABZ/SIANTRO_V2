<?php 
error_reporting(0);
  $kursus = mysql_query("SELECT * FROM tblx_trainee_detail
  LEFT JOIN ref_coursename ON tblx_trainee_detail.coursename_id_fk=ref_coursename.coursename_id
  LEFT JOIN trx_soalexam ON trx_soalexam.coursename_id_fk=ref_coursename.coursename_id
  WHERE tblx_trainee_detail_id='".$_GET['kur']."'");
  
  $rowKursus = mysql_fetch_array($kursus);

  $q_score = mysql_query("SELECT * FROM trx_score WHERE trainee_id_fk='".$_GET['peserta']."' ");
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
                  <table class="table">
                    <tr>
                      <td>Score Anda</td>
                      <td> : </td>
                      <td> <?php echo $d_score['score_alfabet']; ?> </td>
                    </tr>
                    <tr>
                      <td>Jawaban Benar</td>
                      <td> : </td>
                      <td> 12 </td>
                    </tr>
                    <tr>
                      <td>Jawaban Salah</td>
                      <td> : </td>
                      <td> 2 </td>
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
                    <button class="btn btn-primary pull-right"><a href="sertifikat/index.html" target="_blank" style="color: #fff">Cetak Sertifikat <i class="fa fa-print"></i></a> </button> 
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
                        <h4>1. Lorem ipsum dolor sit amet</h4>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger dim_about" data-dismiss="modal"><span class="fa fa-times"></span> Keluar</button>
                    </div>
                </div>
            </div>
    </div>
    