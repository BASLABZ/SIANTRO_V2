<?php error_reporting(0); ?>
    <div id="process" class="process content-section bg-light">
      <div class="container">
        <div class="row">
           <div class="col-md-12">
           <div class="panel-group" id="accordion">
                   <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                          <h1><span class="fa fa-list"></span> Control Panel</h1></a>
                   <div id="collapse3" class="panel-collapse collapse">
                       <div class="container">
                         <div class="row">
                           <div class="col-md-12">
                             <?php include 'control-panel.php'; ?>
                           </div>
                         </div>
                       </div>
                      </div>
                  </div>
        </div>
          <div class="col-md-12">
            <div class="process-item highlight text-center">
              <div class="process-item-icon">
               <h1 class="process-item-title">
              <span class="fa fa-list"></span>DAFTAR PAKET KURSUS :
               </h1>
           
              </div>
              <div class="process-item-content"> 

              <table class="table table-resposive table-hover table-bordered">
                <thead>
                  <th>No</th>
                  <th>Nama Kursus</th>
                  <th>Tanggal Mengikuti</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </thead>
                <tbody>
                <?php 
                  $no=0;
                  $sqlpaketkursus  = mysql_query("SELECT * FROM tblx_trainee_detail t join tbl_trainee tn on t.trainee_id_fk = tn.trainee_id  JOIN  ref_coursename c ON t.coursename_id_fk = c.coursename_id where tn.member_id_fk='".$_SESSION['member_id']."' ");

                  while ($paketkursus = mysql_fetch_array($sqlpaketkursus)) {
                 ?>
                 <tr>
                          <td><?php echo ++$no; ?></td>
                          <td><?php echo $paketkursus['coursename_title']; ?></td>
                          <td></td>
                      <?php 
                        $cek = mysql_query("SELECT * trx_score LEFT JOIN tbl_trainee ON tbl_trainee.trainee_id=trx_score.trainee_id_fk WHERE tbl_trainee.member_id_fk='".$_SESSION['member_id']."' ");
                        if (mysql_num_rows($cek)=='') { $flag = 'no' ?>
                          <td><span class="label label-danger">Anda belum mengikuti ujian</span></td> <?php
                        } else { $flag = 'yes' ?>
                          <td><span class="label label-success">Anda telah mengikuti ujian</span></td> <?php
                        }
                      ?>
                          <td>
                          <?php 
                            if ($flag=='yes') { ?>
                              <a href="#" class="btn btn-warning"><span class="fa fa-eye"></span> Lihat Score / Cetak Sertifikat</a><?php                              
                            } else { ?>
                              <a href="index.php?hal=exam/member-exam&kur=<?php echo $paketkursus['tblx_trainee_detail_id']; ?>&no=0" class="btn btn-warning"><span class="fa fa-edit"></span> Ujian Sekarang</a><?php
                            }
                          ?>
                           </td>
                      </tr>
                  
                  <?php } ?>
                </tbody>
              </table>
                
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  
