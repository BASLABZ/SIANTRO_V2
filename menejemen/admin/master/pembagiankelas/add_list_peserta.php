<?php 
    $id = $_GET['id'];
    $query  = mysql_query("SELECT * FROM tbl_selectclass s JOIN ref_operator o ON s.operator_id_fk = o.operator_id JOIN ref_rooms r ON s.rooms_id = r.rooms_id JOIN ref_coursename c ON s.coursename_id = c.coursename_id where s.selectcalss_id='".$id."' ");
    $rowList = mysql_fetch_array($query);
    $idkus = $rowList['coursename_id'];
    $jumlah = $rowList['kuota'];

 ?>
 <?php 
      if (isset($_POST['simpan'])) {
        $cekmember = $_POST['member_id'];
        $idselect = $_POST['selectcalss_id'];
        $banyak  = count($cekmember);
        $totalKuota  = $jumlah+$banyak;
        for ($i=0; $i < $banyak ; $i++) { 
           $kodemember = $cekmember[$i];
           $insert = mysql_query("INSERT INTO  tbl_bagimember (selectcalss_id,member_id_fk) values ('".$id."','".$kodemember."')");
        }
        $update = mysql_query("UPDATE tbl_selectclass set kuota='".$totalKuota."' where selectcalss_id='".$idselect."'");
        if ($insert) {
           echo "<script> alert('Data Berhasil Disimpan'); location.href='index.php?hal=master/pembagiankelas/list' </script>";exit;
        }

      }
  ?>
  <section class="content-header">
      <h1>
        Tambah Master Pembagian Kelas Kursus , Jadwal, Peserta 
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master</a></li>
        <li class="active">Tambah</li>
        <li class="active">Pembagian Kelas Kursus</li>
      </ol>
  </section>
   <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tambah Master Pembagian Kelas Kursus , Jadwal, Peserta <?php echo $rowList['coursename_title']; ?></h3>
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
                      <label class="col-md-3">Ruang</label>
                      <div class="col-md-6">
                      <input type="text" class="form-control" name="" disabled="" value="<?php echo $rowList['rooms_name']; ?>">
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
                        <th>No</th>
                        <th>Nama Member</th>
                      </thead>
                      <tbody>
                        <?php 
                        $no=0;
                        $querybagi  = mysql_query("SELECT * FROM tblx_trainee_detail d JOIN tbl_trainee tn ON d.trainee_id_fk = tn.trainee_id JOIN ref_coursename c ON d.coursename_id_fk = c.coursename_id JOIN tbl_member m ON tn.member_id_fk = m.member_id where c.coursename_id='".$idkus."' and m.member_status_active='active'  ");
                        while ($rowmember = mysql_fetch_array($querybagi)) {
                          
                         ?>
                         <tr>
                           <td><?php echo ++$no; ?></td>
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
                        <button type="submit" class="btn btn-info pull-right" name="simpan"><span class="fa fa-save"></span> Simpan</button>
                      </div>
                    </div>
               </form>
            </div>
          </div>
        </div>
      </div>
    </section>
