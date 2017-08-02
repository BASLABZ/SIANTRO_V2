<?php 
	 include 'menejemen/config/inc-db.php';
     session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>JADWAL KURSUS</title>
</head>
		
		<body onload="print()">
			   <center>
			   <h1>JADWAL KURSUS</h1>
			   <hr>
		   		  <?php 
				    $ambilpembagiankelas = mysql_fetch_array(mysql_query("SELECT * FROM tbl_bagimember where member_id_fk = '".$_SESSION['member_id']."'"));
				    $idselectclass = $ambilpembagiankelas['selectcalss_id'];
				   ?>
				     <table class="table table-resposive table-hover table-bordered" border="1">
		              <thead>
		                <th>No</th>
		                <th>JENIS</th>
		                <th>HARI/TANGGAL</th>
		                <th>JAM MULAI</th>
		                <th>JAM SELESAI</th>
		                <th>RUANG</th>
		              </thead>
		              <tbody>
		                <?php $no = 0;
		                    $queryshow = mysql_query("SELECT * FROM tbl_jadwal j JOIN ref_rooms r ON j.rooms_id_fk = r.rooms_id where  j.jadwal_jenis !='UJIAN' and j.selectcalss_id_fk = '".$idselectclass."' ");
		                  // print_r("SELECT * FROM tbl_jadwal j JOIN ref_rooms r ON j.rooms_id_fk = r.rooms_id where  j.jadwal_jenis !='UJIAN' and j.selectcalss_id_fk = '".$idselectclass."' ");
		                    while ($rowjadwal = mysql_fetch_array($queryshow)) {
		                 ?>
		                 <tr>
		                   <td><?php echo ++$no; ?></td>
		                   <td><?php echo $rowjadwal['jadwal_jenis']; ?></td>
		                   <td><?php echo $rowjadwal['jadwal_tanggal']; ?></td>
		                   <td><?php echo $rowjadwal['jadwal_mulai']; ?></td>
		                   <td><?php echo $rowjadwal['jadwal_selesai']; ?></td>
		                   <td><?php echo $rowjadwal['rooms_name']; ?></td>
		                  
		                 </tr>
		                <?php } ?>
		              </tbody>
		            </table>
			   </center>
		</body>
		</html>