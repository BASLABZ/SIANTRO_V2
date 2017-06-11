<?php 
		$id = $_GET['id'];
		$query = mysql_query("SELECT * FROM ref_coursename where coursename_id = '".$id."'");
		$row = mysql_fetch_array($query);
		if (isset($_GET['hapus']) && isset($_GET['id'])) {
			$queryhapus = mysql_query("DELETE FROM trx_soalexam where soalexam_id = '".$_GET['hapus']."'");
			if ($queryhapus) {
				  echo "<script> alert('Terimakasih Data Berhasil Dihapus'); location.href='index.php?hal=soalujian/view_soal_ujian&id=".$id."' </script>";exit;
			}
		}
 ?>
   <section class="content-header">
      <h1>
        Daftar Soal Ujian : <?php echo $row['coursename_title']; ?>
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"></a></li>
        <li class="active">Daftar Soal Ujian</li>
      </ol>
  </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> <a href="index.php?hal=soalujian/add_soal_ujian&id=<?php echo $row['coursename_id']; ?>" class="btn btn-success"> <span class="fa fa-plus"></span> Tambah Soal</a> <br/>
            </div>
            <div class="box-body">
              <table id="tableMaster" class="table table-bordered table-hover">
                <thead>
                  <th><center>No</center></th>
                  <th><center>Nama Kursus</center></th>
                  <th><center>Nama Soal Ujian</center></th>
                  <th><center>Aktifkan</center></th>
                  <th><center>Tanggal</center></th>
                  <th><center>Action</center></th>
                </thead>
                <tbody>
                  <?php 
                    $no=0;
                      $query = mysql_query("SELECT * FROM  trx_soalexam s JOIN ref_coursename c ON s.coursename_id_fk = c.coursename_id JOIN ref_operator o ON s.operator_id_fk = o.operator_id where c.coursename_id ='".$id."' order by s.soalexam_id DESC
                        ");
                      while ($rowselect  = mysql_fetch_array($query)) {
                        
                   ?>
                   <tr>
                     <td><?php echo ++$no; ?></td>
                     <td><?php echo $rowselect['coursename_title']; ?></td>
                     <td><?php echo $rowselect['soalexam_title']; ?></td>
                     <td><?php echo $rowselect['soalexam_status']; ?></td>
                     <td><?php echo $rowselect['soalexam_datecreated']; ?></td>
                     <td><?php echo $rowselect['operator_name']; ?></td>
                     <td>
                     <a href="index.php?hal=soalujian/new_soal_ujian&id=<?php echo $rowselect['soalexam_id']; ?>" class="btn btn-success"> <span class="fa fa-plus"></span> Buat / Lihat Soal Ujian</a>

                     <a href="index.php?hal=soalujian/view_soal_ujian&id=<?php echo $rowselect['soalexam_id']; ?>" class="btn btn-primary"> <span class="fa fa-pencil"></span> Edit</a>
                     
                     <a href="index.php?hal=soalujian/view_soal_ujian&hapus=<?php echo $rowselect['soalexam_id']; ?>&id=<?php echo $rowselect['coursename_id_fk']; ?>" class="btn btn-danger"> <span class="fa fa-eye"></span> hapus</a>
                     </td>
                   </tr>
                   <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>