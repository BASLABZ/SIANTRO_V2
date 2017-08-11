<?php 
    $id = $_GET['id'];
    $query  = mysql_query("SELECT * FROM tbl_selectclass s JOIN ref_operator o ON s.operator_id_fk = o.operator_id JOIN ref_coursename c ON s.coursename_id = c.coursename_id where s.selectcalss_id='".$id."' ");
    $rowList = mysql_fetch_array($query);
    $idkus = $rowList['coursename_id'];
    $queryJadwal = mysql_query("SELECT * FROM tbl_jadwal where selectcalss_id_fk='".$rowList['selectcalss_id']."' ");
    $runqueryJadwal = mysql_fetch_array($queryJadwal);
    $idjadwal = $runqueryJadwal['jadwal_id'];
 ?>
 <?php 
      if (isset($_POST['simpan'])) {
        $cekmember = $_POST['member_id'];
        $banyak  = count($cekmember);
        // print_r($cekmember);
        // die();
        
        for ($i=0; $i < $banyak ; $i++) { 
           $kodemember = $cekmember[$i];

           $insert = "INSERT INTO  trx_absen (absen_date,jadwal_id_fk,member_id_fk,absen_meet) values (NOW(),'".$idjadwal."','".$kodemember."','1')";
           $runinsert  = mysql_query($insert);
        }
      
        if ($insert) {
           echo "<script> alert('Data Berhasil Disimpan'); location.href='index.php?hal=absensi/jadwal_absensi&id=".$id."' </script>";exit;
        }else{
           echo "<script> alert('Data Gagal Disimpan'); location.href='index.php?hal=absensi/jadwal_absensi&id=".$id."' </script>";exit;
        }

      }
      // absen semua 
      if (isset($_POST['absensemua'])) {
        $query_banyak_peserta = mysql_query("SELECT count(*) as banyak_peserta FROM tblx_trainee_detail d JOIN tbl_trainee tn ON d.trainee_id_fk = tn.trainee_id JOIN ref_coursename c ON d.coursename_id_fk = c.coursename_id JOIN tbl_member m ON tn.member_id_fk = m.member_id where c.coursename_id='".$idkus."' and m.member_status_active='active'");
        $query_cek_member_id = mysql_query("SELECT * FROM tblx_trainee_detail d JOIN tbl_trainee tn ON d.trainee_id_fk = tn.trainee_id JOIN ref_coursename c ON d.coursename_id_fk = c.coursename_id JOIN tbl_member m ON tn.member_id_fk = m.member_id where c.coursename_id='".$idkus."' and m.member_status_active='active'");
          
          $row_banyak_peserta = mysql_fetch_array($query_banyak_peserta);
          $banyak_peserta = $row_banyak_peserta['banyak_peserta'];        
                  while ($row_cek_member_id = mysql_fetch_array($query_cek_member_id)) {
                      $kodemember_semua = $row_cek_member_id['member_id'];
                      
                      $insert_semua = "INSERT INTO  trx_absen (absen_date,jadwal_id_fk,member_id_fk,absen_meet) values (NOW(),'".$idjadwal."','".$kodemember_semua."','1')";

                      $run_query_semua=mysql_query($insert_semua);
             
          }
          if ($run_query_semua) {
             echo "<script> alert('Data Berhasil Disimpan'); location.href='index.php?hal=absensi/jadwal_absensi&id=".$id."' </script>";exit;
          }
        // $cek_member = mysql_fetch_array(mysql_query("SELECT * FROM tblx_trainee_detail d JOIN tbl_trainee tn ON d.trainee_id_fk = tn.trainee_id JOIN ref_coursename c ON d.coursename_id_fk = c.coursename_id JOIN tbl_member m ON tn.member_id_fk = m.member_id where c.coursename_id='".$idkus."' and m.member_status_active='active'"));

        // $row_banyak_peserta = mysql_fetch_array($query_banyak_peserta);
        // $banyak_peserta = $row_banyak_peserta['banyak_peserta'];
        // $cek_member_id= $cek_member['member_id'];
        //     for ($x=0 ; $x < $banyak_peserta ; $x++) { 
        //      $kodemember_semua = $cek_member_id[$x];
        //      print_r($cek_member_id[$x]);
        //      // $insert_semua = "INSERT INTO  trx_absen (absen_date,jadwal_id_fk,member_id_fk,absen_meet) values (NOW(),'".$idjadwal."','".$kodemember_semua."','1')";
        //      // print_r($insert_semua);
        //      // $runinsert  = mysql_query($insert);
        //   }    
      }
  ?>
  <section class="content-header">
      <h1>
      ABSENSI KELAS KURSUS
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Transaksi</a></li>
        <li class="active">Absensi</li>
        <li class="active">Absensi Kelas Kursus</li>
      </ol>
  </section>
   <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              
            </div>
            <div class="box-body">
              <form class="role" method="POST" >
                    <div class="form-group row">
                      <label class="col-md-3">Nama Kursus</label>
                      <div class="col-md-6">
                      <input type="text" class="form-control" name="" disabled="" value="<?php echo $rowList['coursename_title']; ?>">
                      </div>
                    </div>
                     <div class="form-group row">
                      <label class="col-md-3">Nama Pengajar</label>
                      <div class="col-md-6">
                      <input type="text" class="form-control" name="" disabled="" value="<?php echo $rowList['operator_name']; ?>">
                      </div>
                    </div>
                      <div class="form-group row">
                      <label class="col-md-3">Hari/Tanggal</label>
                      <div class="col-md-6">
                      <input type="text" class="form-control" name="" disabled="" value="<?php echo $runqueryJadwal['jadwal_tanggal']; ?>">
                      </div>
                    </div>
                      <div class="form-group row">
                      <label class="col-md-3">Jam Mulai</label>
                      <div class="col-md-6">
                      <input type="text" class="form-control" name="" disabled="" value="<?php echo $runqueryJadwal['jadwal_mulai']; ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-3">Jam Selesai</label>
                      <div class="col-md-6">
                      <input type="text" class="form-control" name="" disabled="" value="<?php echo $runqueryJadwal['jadwal_selesai']; ?>">
                      </div>
                    </div>
                    
               </form>
               <br>
               <form class="role" method="POST">
                <input type="hidden" value="<?php echo $rowList['selectcalss_id']; ?>" name='selectcalss_id'>
                  <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                      <table class="table table-responsive table-bordered table-hover " id="tableMaster">

                      <thead>

                        <th>Absen</th>
                        <th>Nama Member</th>
                      </thead>
                      <tbody>
                        <?php 
                        $no=0;
                        $querybagi  = mysql_query("SELECT * FROM tblx_trainee_detail d JOIN tbl_trainee tn ON d.trainee_id_fk = tn.trainee_id JOIN ref_coursename c ON d.coursename_id_fk = c.coursename_id JOIN tbl_member m ON tn.member_id_fk = m.member_id where c.coursename_id='".$idkus."' and m.member_status_active='active'  ");
                        while ($rowmember = mysql_fetch_array($querybagi)) {
                          
                         ?>
                         <tr>
                          <td><input type="checkbox" name="absen"> </td>
                           <td><input type="hidden" value="<?php echo $rowmember['member_id']; ?>" name='member_id[]'>
                           <?php echo $rowmember['member_name']; ?></td>
                         </tr>
                         <?php } ?>
                      </tbody>
                    </table>
                    </div>
                  </div>
                  <br>
                  <div class="form-group">
                      <div class="col-md-10">
                      <!-- nambah disini ??? -->
                       <!-- <input type="checkbox" >Pilih semua  -->
                       <button type="submit" name="absensemua" class="btn btn-info pull-left"><span class="fa fa-list"></span> ABSEN SEMUA <span class="fa fa-check"></span> </button>
                        <button type="submit" class="btn btn-info pull-right" name="simpan"><span class="fa fa-check"></span> ABSEN</button>
                      </div>
                    </div>
               </form>
            </div>
          </div>
        </div>
      </div>
    </section>

