<?php 
	 include 'menejemen/config/inc-db.php';
     session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>JADWAL UJIAN</title>
</head>
		
		<body onload="print()">
			   <center>
			   <h1>JADWAL UJIAN</h1>
			   <hr>
			   	 <table class="table table-resposive table-hover table-bordered" border="1">
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
		                  $sqlpaketkursus  = mysql_query("SELECT j.jadwal_jenis,t.trainee_id_fk,j.jadwal_id,tn.member_id_fk,c.coursename_title,j.jadwal_tanggal,j.jadwal_mulai , j.jadwal_selesai FROM tbl_jadwal j JOIN tbl_trainee tn ON j.trainee_id_fk = tn.trainee_id join tblx_trainee_detail t on tn.trainee_id=t.trainee_id_fk
		                    JOIN ref_coursename c ON c.coursename_id = t.coursename_id_fk where tn.member_id_fk = '".$_SESSION['member_id']."' and j.jadwal_jenis='UJIAN'");
		                  while ($paketkursus = mysql_fetch_array($sqlpaketkursus)) {
		                    $jumlah_absen = mysql_fetch_array(mysql_query("SELECT count(absen_meet) as jumlah FROM trx_absen a join tbl_jadwal j ON a.jadwal_id_fk = j.jadwal_id where a.member_id_fk='".$_SESSION['member_id']."' and j.trainee_id_fk = '".$paketkursus['trainee_id_fk']."' and j.jadwal_jenis='TEORI' OR j.jadwal_jenis='PRAKTEK'" ));

		                 ?>
		                 <tr>
		                          <td><?php echo ++$no; ?></td>
		                          <td><?php echo $paketkursus['coursename_title']; ?></td>
		                          <td>
		                            Tanggal : <?php echo $paketkursus['jadwal_tanggal']; ?><br>
		                            Mulai  : <?php echo $paketkursus['jadwal_mulai']; ?><br>
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
		                             
		                                if ($jumlah_absen['jumlah'] >= '4') {
		                                 
		                           ?>
		                          <?php 
		                            if ($flag=='yes') { ?>
		                              <a href="index.php?hal=exam/member-exam-finish&kur=<?php echo $paketkursus['coursename_id_fk']; ?>&detailpeserta=<?php echo $paketkursus['tblx_trainee_detail_id']; ?> " class="btn btn-warning"><span class="fa fa-eye"></span> Lihat Score / Cetak Sertifikat</a><?php                              
		                            } else { ?>
		                              <a href="index.php?hal=exam/member-exam&kur=<?php echo $paketkursus['tblx_trainee_detail_id']; ?>&no=0" class="btn btn-warning"><span class="fa fa-edit"></span> Ujian Sekarang</a><?php
		                            }
		                          ?>
		                          <?php }else{
		                            echo "Anda Belum Bisa Mengikuti Ujian , karena jumlah absen anda kurang dari 4 x pertemuan. Jumlah Absen Anda : ";
		                             echo $jumlah_absen['jumlah'];

		                          } ?>
		                           </td>
		                      </tr>
		                  
		                  <?php } ?>
		                </tbody>
		              </table>
			   </center>
		</body>
		</html>