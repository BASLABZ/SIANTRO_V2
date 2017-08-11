<?php //error_reporting(0); ?>
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
              <span class="fa fa-list"></span>DAFTAR HISTORY UJIAN PELATIHAN&KURSUS :
                <center><a href="cetak_jadwal_ujian.php" target="_BLANK"><button class="btn btn-primary"><span class="fa fa-print"></span> Cetak Jadwal</button></a></center>
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
                  $sqlpaketkursus  = mysql_query("SELECT t.tblx_trainee_detail_id,
                                                          c.coursename_id,j.jadwal_jenis,
                                                          t.trainee_id_fk,j.jadwal_id,
                                                          tn.member_id_fk,c.coursename_title,
                                                          j.jadwal_tanggal,j.jadwal_mulai , 
                                                          j.jadwal_selesai 
                                                  FROM tbl_jadwal j JOIN tbl_trainee tn 
                                                  ON j.trainee_id_fk = tn.trainee_id 
                                                  JOIN tblx_trainee_detail t ON tn.trainee_id=t.trainee_id_fk 
                                                  JOIN ref_coursename c ON c.coursename_id = 
                                                  t.coursename_id_fk 
                                                  WHERE tn.member_id_fk = '".$_SESSION['member_id']."' and j.jadwal_jenis='UJIAN'");
                  // print_r($sqlpaketkursus);
                  // exit();

                  while ($paketkursus = mysql_fetch_array($sqlpaketkursus)) {
                    $jumlah_absen = mysql_fetch_array(mysql_query("SELECT count(absen_meet) as jumlah FROM trx_absen a join tbl_jadwal j ON a.jadwal_id_fk = j.jadwal_id where a.member_id_fk='".$_SESSION['member_id']."' and j.trainee_id_fk = '".$paketkursus['trainee_id_fk']."' and j.jadwal_jenis='TEORI' OR j.jadwal_jenis='PRAKTEK'" ));

                 ?>
                 <tr>
                          <td><?php echo ++$no; ?></td>
                          <td><?php echo $paketkursus['coursename_title']; ?></td>
                          <td>
                            Tanggal : <?php echo $paketkursus['jadwal_tanggal']; ?><br>
                            Mulai   : <?php echo $paketkursus['jadwal_mulai']; ?><br>
                            Selesai : <?php echo $paketkursus['jadwal_selesai']; ?><br>
                          </td>

                      <?php 
                        $cek = mysql_query("SELECT * FROM trx_score LEFT JOIN tbl_trainee ON tbl_trainee.trainee_id=trx_score.trainee_id_fk WHERE tbl_trainee.member_id_fk='".$_SESSION['member_id']."' ");
                        echo "<td>";
                        if (mysql_num_rows($cek)=='') { $flag = 'no' ?>
                         <span class="label label-danger">Anda belum mengikuti ujian</span></td> <?php
                        } else { $flag = 'yes' ?>
                          <td><span class="label label-success">Anda telah mengikuti ujian</span></td> <?php
                        } 
                        echo "</td>";
                      ?>
                     
                          <td>
                             <?php 
                             
                                // if ($jumlah_absen['jumlah'] >= '4') {
                                 
                           ?>
                          <?php 
                            if ($flag=='yes') { ?>
                              <a href="index.php?hal=exam/member-exam-finish&kur=<?php echo $paketkursus['coursename_id_fk']; ?>&detailpeserta=<?php echo $paketkursus['tblx_trainee_detail_id']; ?> " class="btn btn-warning"><span class="fa fa-eye"></span> Lihat Score / Cetak Sertifikat</a><?php                              
                            } else { ?>
                              <a href="index.php?hal=exam/member-exam&kur=<?php echo $paketkursus['tblx_trainee_detail_id']; ?>&no=0" class="btn btn-warning"><span class="fa fa-edit"></span> Ujian Sekarang</a><?php
                            }
                          ?>
                          <?php 
                        // }else{
                          //   echo "Anda Belum Bisa Mengikuti Ujian , karena jumlah absen anda kurang dari 4 x pertemuan. Jumlah Absen Anda : ";
                          //    echo $jumlah_absen['jumlah'];

                          // } ?>
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
  
