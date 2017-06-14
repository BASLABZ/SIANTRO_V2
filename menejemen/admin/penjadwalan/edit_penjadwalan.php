  <?php 
    $id = $_GET['id'];
    // $idEdit=$_GET['edit'];
    $query  = mysql_query("SELECT * FROM tbl_selectclass s JOIN ref_operator o ON s.operator_id_fk = o.operator_id JOIN ref_rooms r ON s.rooms_id = r.rooms_id JOIN ref_coursename c ON s.coursename_id = c.coursename_id where s.selectcalss_id='".$id."' ");
    $rowList = mysql_fetch_array($query);
    $idkus = $rowList['coursename_id'];
    $jumlah = $rowList['kuota'];
    $rowtrain = mysql_fetch_array(mysql_query("SELECT * FROM tblx_trainee_detail where coursename_id_fk = '".$idkus."'"));

    $showJadwal = mysql_query("SELECT * from tbl_jadwal where selectcalss_id_fk='".$id."'");
    $dataJadwal = mysql_fetch_array($showJadwal);

    // if (isset($_POST['jadwal'])) {
    //   $queryjadwal  = "INSERT INTO tbl_jadwal (jadwal_hari,jadwal_mulai,jadwal_selesai,selectcalss_id_fk,trainee_id_fk,rooms_id_fk,jadwal_jenis) 
    //     VALUES ('".$_POST['jadwal_hari']."','".$_POST['jadwal_mulai']."','".$_POST['jadwal_selesai']."','".$rowList['selectcalss_id']."','".$rowtrain['trainee_id_fk']."','".$_POST['rooms_id']."','".$_POST['jadwal_jenis']."')";
    //     $runQuery = mysql_query($queryjadwal);
    //     if ($runQuery) {
    //       echo "<script> alert('Data Berhasil Disimpan'); location.href='index.php?hal=penjadwalan/add_penjadwalan&id=$id' </script>";exit;
    //     }

    // }
    if (isset($_GET['edit'])&&isset($_GET['id'])) {
       $idupdate = $_GET['edit'];
      $queryeditjadwal = mysql_query("UPDATE tbl_jadwal SET jadwal_tanggal='".$_POST['jadwal_tanggal']."', jadwal_mulai='".$_POST['jadwal_mulai']."', jadwal_selesai='".$_POST['jadwal_selesai']."',    where jadwal_id = '".$_GET['edit']."'");
      if ($queryhapusjadwal) {
          echo "<script> alert('Data Berhasil Dihapus'); location.href='index.php?hal=penjadwalan/add_penjadwalan&id=".$_GET['id']."' </script>";exit;
        }
     }

 ?>
  <section class="content-header">
      <h1>
        Jadwal Kursus
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Transaksi</a></li>
        <li class="active">Jadwal</li>
        <li class="active"><?php echo $rowList['coursename_title']; ?></li>
      </ol>
  </section>
  <section class="content">
    <div class="col-md-6">
          <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Ubah Penjadwalan Kursus</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <div class="box-body">
          <form class="role" method="POST">
            <div class="form-group row">
              <label class="col-md-4">Nama Kursus</label>
              <div class="col-md-8">
                <input type="text" required class="form-control" name="" value="<?php echo $rowList['coursename_title']; ?>" readonly>
                <input type="hidden" name="selectcalss_id" value="<?php echo $rowList['selectcalss_id']; ?>">
              </div>
            </div>
             <!-- nambah disiini -->
            <div class="form-group row">
              <label class="col-md-4">Nama Trainer</label>
              <div class="col-md-8">
                <input type="text" class="form-control" name="" value="<?php echo $rowList['operator_name']; ?>" readonly>
                <input type="hidden" name="selectcalss_id" value="<?php echo $rowList['operator_id_fk']; ?>">
              </div>
              </div>
            <div class="form-group row">
              <label class="col-md-4">Jenis Jadwal</label>
              <div class="col-md-8">
                <select class="form-control" name="jadwal_jenis">
                  <option value="">Pilih Jenis Jadwal</option>
                  <option value="TEORI"
                      <?php if($dataJadwal['jadwal_jenis']=='TEORI'){echo "selected=selected";}?>>TEORI
                  </option>
                  <option value="PRAKTEK"
                      <?php if($dataJadwal['jadwal_jenis']=='PRAKTEK'){echo "selected=selected";}?>>TEORI
                  </option>
                </select>
              </div>
            </div>
               <!-- perubhan disini -->
            <div class="form-group row">
              <label class="col-md-4">Hari/Tanggal</label>
              <div class="col-md-5">
                <input type="text" autocomplete="off" id="datepicker" required class="form-control" name="jadwal_tanggal" value="<?php $dataJadwal['jadwal_tanggal'];?>">
                </div>
                <div class="col-md-3">
                <input type="text" class="form-control" name="jadwal_day" value="" readonly="">
              </div>
            
            </div>

            <div class="form-group row">
              <label class="col-md-4">Jam Mulai</label>
              <div class="col-md-8">
               <div class="bootstrap-timepicker">
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" class="form-control timepicker" name="jadwal_mulai" value="<?php $dataJadwal['jadwal_mulai'];?>">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div>
              </div>
            </div>
           <div class="form-group row">
              <label class="col-md-4">Jam Selesai</label>
              <div class="col-md-8">
                <div class="bootstrap-timepicker">
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" class="form-control timepicker" name="jadwal_selesai" value="<?php $dataJadwal['jadwal_selesai'];?>">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div>
              </div>
            </div>
            <div class="form-group row">
                      <label class="col-md-4">Pilih Ruangan</label>
                      <div class="col-md-8">
                        <select class="form-control select" name="rooms_id">
                          <option value="">Pilih Ruangan</option>
                          <?php $queryrooms = mysql_query("SELECT * FROM ref_rooms order by rooms_id asc");
                          while ($rooms  = mysql_fetch_array($queryrooms)) {?>
                          <!-- BERHENTI DISINI BINGUNG EUY SIK SIK ISTIRAHAT BENTAR -->
                          <option value="<?php echo $rooms['rooms_id']; ?>"
                          <?php if($rooms['rooms_id']==$rowMenu['menu_parent']){echo "selected=selected";}?>><?php  echo $varMenuname; ?></option>
                          <?php } ?> 
                        </select>
                      </div>
                    </div>
            <div class="form-group">
              <button class="btn btn-primary btn-sm pull-right" name="jadwal" type="submit" name="simpan"><span class="fa fa-save"></span> Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-12">
    <div class="box box-default">
       <div class="box-header"><h3>JADWAL KURSUS</h3></div>
       <div class="box-body">
          <table class="table table-responsive table-hover table-stripped">
        <thead>
          <th>No</th>
          <th>JENIS</th>
          <th>HARI</th>
          <th>JAM MULAI</th>
          <th>JAM SELESAI</th>
          <th>RUANG</th>
          <th>AKSI</th>
        </thead>
        <tbody>
          <?php $no = 0;
              $queryshow = mysql_query("SELECT * FROM tbl_jadwal j JOIN ref_rooms r ON j.rooms_id_fk = r.rooms_id where j.jadwal_jenis !='UJIAN' AND j.selectcalss_id_fk = '".$id."'  ");
              while ($rowjadwal = mysql_fetch_array($queryshow)) {
           ?>
           <tr>
             <td><?php echo ++$no; ?></td>
             <td><?php echo $rowjadwal['jadwal_jenis']; ?></td>
             <td><?php echo $rowjadwal['jadwal_hari']; ?></td>
             <td><?php echo $rowjadwal['jadwal_mulai']; ?></td>
             <td><?php echo $rowjadwal['jadwal_selesai']; ?></td>
             <td><?php echo $rowjadwal['rooms_name']; ?></td>
             <td>
               <a href="index.php?hal=penjadwalan/edit_penjadwalan&edit=<?php echo $rowjadwal['jadwal_id']; ?>&id=<?php echo $id; ?>" class="btn btn-success"><span class="fa fa-pencil"></span></a>
               <a href="index.php?hal=penjadwalan/add_penjadwalan&hapus=<?php echo $rowjadwal['jadwal_id']; ?>&id=<?php echo $id; ?>" class="btn btn-danger"><span class="fa fa-trash"></span></a>
             </td>
           </tr>
          <?php } ?>
        </tbody>
      </table>
       </div>
     </div>
    </div>
  </section>