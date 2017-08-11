<?php 
  error_reporting(0);
  if ($_SESSION['member_id']=='') {
    header('location:index.php');
    exit();
  }
  // end block timer

  $kursus = mysql_query("SELECT * FROM tblx_trainee_detail
  LEFT JOIN ref_coursename ON tblx_trainee_detail.coursename_id_fk=ref_coursename.coursename_id
  LEFT JOIN trx_soalexam ON trx_soalexam.coursename_id_fk=ref_coursename.coursename_id
  WHERE tblx_trainee_detail_id='".$_GET['kur']."'");
  
  $rowKursus = mysql_fetch_array($kursus);
//============= bikin kombinasi ID untuk sessionnya biar dinamis disini ========================
  $idxSessionTimer = md5('asdf');
  // block timer
  if (empty($_SESSION[$idxSessionTimer])) {
      $_SESSION[$idxSessionTimer] = array(
          'time_end' => strtotime(date('Y-m-d H:i:s') . ' +90 minutes'),
      );
      $timer = '?' . http_build_query($_SESSION[$idxSessionTimer]);
  } else {
      $timer = '?' . http_build_query($_SESSION[$idxSessionTimer]);
  }
  // print_r($rowKursus);

?>
  <!-- prosedur -->
    <div id="process" class="process content-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 marg-60-btm">
          <div class="pull-left">
             <div class="panel panel-primary">
              <div class="panel-heading">
                 <button class="btn btn-primary btn-lg">
                    <span id="waktu"></span>
                 </button>
              </div>
            </div>
          </div>
            <!-- <div id="defaultCountdown"></div> -->
            <h2 class="text-big text-center text-uppercase"><span class="fa fa-user"></span> Ujian <?php echo $rowKursus['coursename_title'] ?></h2>
            <!-- nama kursus dinamis diambil dari session -->
            <hr>
           <i><p align="center"><span class="fa fa-arrow-left"></span> Bacalah soal dengan teliti, pastikan anda menjawab setiap soal. Semoga Sukses 
           <!-- <span id="timer"></span>  -->
           <span class="fa fa-arrow-right"></span> </p></i>
           <p>
              <center>   <span id="future_date"></span></center>
           </p>
           
          </div><!-- .col-## -->
        </div><!-- .row -->
        <div class="row">
        <?php 
            if ($_GET['no']=='') {
              $limit = 0;
              $no_urut = 1;
            } else {
              $limit = $_GET['no'];
              $no_urut = $limit;
            }
            $querexam = mysql_query("SELECT * FROM trx_exam
                            LEFT JOIN trx_soalexam ON trx_soalexam.soalexam_id=trx_exam.soalexam_id_fk
                            LEFT JOIN ref_coursename ON ref_coursename.coursename_id=trx_soalexam.coursename_id_fk
                            LEFT JOIN tblx_trainee_detail ON tblx_trainee_detail.coursename_id_fk=ref_coursename.coursename_id
                            WHERE tblx_trainee_detail_id='".$_GET['kur']."' LIMIT $limit,1");
            while ($rowExam = mysql_fetch_array($querexam)) {
              $no_urut = $limit+1;
         ?>
          <div class="col-md-2 col-sm-12">
         
          </div>
          <div class="col-md-8 col-sm-12" style="margin-top: -6em">
            <form action="index.php?hal=exam/member-exam-check" method="post">
            <div class="process-item highlight text-center">
                <div class="col-md-12" style="background-color: #ccc; text-align: right"><?php echo $no_urut." dari 30 soal"; ?></div>
              <div class="process-item-icon" style="padding-top: 40px; padding-bottom: 20px">
               <h4 class="process-item-title">
                <?php echo $no_urut.". &nbsp;&nbsp;".$rowExam['exam_title'] ?>
               </h4>
              </div>
              <div class="process-item-content" style="text-align: left; padding-bottom: 4em"> 
                <h5>
                  <input type="hidden" name="kursus" value="<?php echo $_GET['kur'] ?>">
                  <input type="hidden" name="paketsoal" value="<?php echo $rowExam['soalexam_id']; ?>">
                  <input type="hidden" name="peserta" value="<?php echo $rowExam['trainee_id_fk']; ?>">
                  <input type="hidden" name="peserta_detail" value="<?php echo $rowExam['tblx_trainee_detail_id']; ?>">
                  <input type="hidden" name="nomorsoal" value="<?php echo $rowExam['exam_id'] ?>">
                  <input type="hidden" name="nomorurutsoal" value="<?php echo $no_urut ?>">


                  <input type="radio" name="jawaban" value="<?php echo $rowExam['exam_option1']; ?>" onclick="cek()">&nbsp;&nbsp;&nbsp;<?php echo $rowExam['exam_option1']; ?><br/>
                  <input type="radio" name="jawaban" value="<?php echo $rowExam['exam_option2']; ?>" onclick="cek()">&nbsp;&nbsp;&nbsp;<?php echo $rowExam['exam_option2']; ?><br/>
                  <input type="radio" name="jawaban" value="<?php echo $rowExam['exam_option3']; ?>" onclick="cek()">&nbsp;&nbsp;&nbsp;<?php echo $rowExam['exam_option3']; ?><br/>
                  <input type="radio" name="jawaban" value="<?php echo $rowExam['exam_option4']; ?>" onclick="cek()">&nbsp;&nbsp;&nbsp;<?php echo $rowExam['exam_option4']; ?><br/>
                  <input type="radio" name="jawaban" value="<?php echo $rowExam['exam_option5']; ?>" onclick="cek()">&nbsp;&nbsp;&nbsp;<?php echo $rowExam['exam_option5']; ?>
                </h5><br/>
                <script type="text/javascript">
                  function cek(){
                    document.getElementById('lanjut').disabled = false;
                  }
                </script>
                  <?php 
                    if ($no_urut!=1) { ?>
                      <button type="button" class="btn btn-primary" onclick="history.back()"><i class="fa fa-arrow-left"></i> Sebelumnya</button> <?php
                    }
                  ?>
                    <button type="submit" class="btn btn-primary pull-right" id="lanjut"  disabled="">Selanjutnya <i class="fa fa-arrow-right"></i> </button> 
              </div><!-- .process-item-content -->
            </div><!-- .process-item -->
            </form>
          </div><!-- .col-## -->
          <div class="col-md-2 col-sm-12"></div>
          <?php } ?>
        </div><!-- .row -->
      </div><!-- .container -->
    </div><!-- #process -->
    <!-- end:process -->
     <script type="text/javascript">
        // function countdown( elementName, minutes, seconds )
        //   {
        //       var element, endTime, hours, mins, msLeft, time;

        //       function twoDigits( n )
        //       {
        //           return (n <= 9 ? "0" + n : n);
        //       }

        //       function updateTimer()
        //       {
        //           msLeft = endTime - (+new Date);
        //           if ( msLeft < 1000 ) {
        //               element.innerHTML = "UJIAN SELESAI";
                      
        //               alert('Terimah Kasih Ujian Telah Selesai'); location.href='index.php' 
        //           } else {
        //               time = new Date( msLeft );
        //               hours = time.getUTCHours();
        //               mins = time.getUTCMinutes();
        //               element.innerHTML = (hours ? hours + ':' + twoDigits( mins ) : mins) + ':' + twoDigits( time.getUTCSeconds() );
        //               setTimeout( updateTimer, time.getUTCMilliseconds() + 500 );
        //           }
        //       }

        //       element = document.getElementById( elementName );
        //       endTime = (+new Date) + 1000 * (60*minutes + seconds) + 500;
        //       updateTimer();
        //   }
        // countdown( "countdown", 90, 0 );
          function loadlink(){
              $('#waktu').load('timer.php<?php echo $timer; ?>',function () {
                   // $(this).unwrap();
                   
              });
          }

          // This will run on page load
          loadlink();

          // this will run after every 1 seconds
          setInterval(function(){
              loadlink()
          }, 1000);
      </script>
    

    