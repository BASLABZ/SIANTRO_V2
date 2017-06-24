  <?php 
    $id = $_GET['id'];
    // $idEdit=$_GET['edit'];
    $query  = mysql_query("SELECT
  `ref_coursename`.`coursename_id` as aku,
  `ref_coursename`.`coursename_title`,
  ref_operator.`operator_name`,
  tbl_jadwal.`jadwal_jenis`,
  tbl_jadwal.`jadwal_tanggal`,
  tbl_jadwal.`jadwal_mulai`,
  tbl_jadwal.`jadwal_selesai`,
  ref_rooms.`rooms_id`,
  ref_rooms.`rooms_name`
  
  FROM tbl_selectclass
  
  JOIN `ref_coursename`
    ON `ref_coursename`.`coursename_id`=tbl_selectclass.`coursename_id`
  JOIN ref_operator
    ON ref_operator.`operator_id`=tbl_selectclass.`operator_id_fk`
  JOIN tbl_jadwal
    ON tbl_jadwal.`selectcalss_id_fk`=tbl_selectclass.`selectcalss_id`
  JOIN ref_rooms
    ON ref_rooms.`rooms_id`=tbl_selectclass.`rooms_id`
    
  WHERE tbl_selectclass.`selectcalss_id`= '".$_GET['id']."'
  AND tbl_jadwal.`jadwal_id`='".$_GET['id']."' ");
    $rowList = mysql_fetch_array($query);
    
    $idkus = $rowList['aku'];
    // $jumlah = $rowList['kuota'];


    // if (isset($_POST['jadwal'])) {
    //   $queryjadwal  = "INSERT INTO tbl_jadwal (jadwal_hari,jadwal_mulai,jadwal_selesai,selectcalss_id_fk,trainee_id_fk,rooms_id_fk,jadwal_jenis) 
    //     VALUES ('".$_POST['jadwal_hari']."','".$_POST['jadwal_mulai']."','".$_POST['jadwal_selesai']."','".$rowList['selectcalss_id']."','".$rowtrain['trainee_id_fk']."','".$_POST['rooms_id']."','".$_POST['jadwal_jenis']."')";
    //     $runQuery = mysql_query($queryjadwal);
    //     if ($runQuery) {
    //       echo "<script> alert('Data Berhasil Disimpan'); location.href='index.php?hal=penjadwalan/add_penjadwalan&id=$id' </script>";exit;
    //     }

    // }
    if (isset($_POST['jadwal'])&&isset($_GET['id'])) {
       // $idupdate = $_GET['edit'];
      $queryeditjadwal = mysql_query("UPDATE tbl_jadwal SET 
                                                  jadwal_tanggal='".date('Y-m-d', strtotime($_POST['jadwal_tanggal']))."', jadwal_mulai='".$_POST['jadwal_mulai']."', jadwal_selesai='".$_POST['jadwal_selesai']."' where jadwal_id = '".$_GET['edit']."'");
      if ($queryeditjadwal) {
          echo "<script> alert('Data Berhasil Diubah'); location.href='index.php?hal=penjadwalan/add_penjadwalan&id=".$_GET['id']."' </script>";exit;
          
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
                <input type="text" required class="form-control" name="" value="<?php echo $rowList['coursename_title']; ?>" >
                <input type="hidden" name="selectcalss_id" value="<?php echo $rowList['selectcalss_id']; ?>">
              </div>
            </div>
             <!-- nambah disiini -->
            <div class="form-group row">
              <label class="col-md-4">Nama Trainer</label>
              <div class="col-md-8">
                <input type="text" class="form-control" name="" value="<?php echo $rowList['operator_name']; ?>">
                <input type="hidden" name="selectcalss_id" value="<?php echo $rowList['operator_id_fk']; ?>">
              </div>
              </div>
            <div class="form-group row">
              <label class="col-md-4">Jenis Jadwal</label>
              <div class="col-md-8">
                <select class="form-control" name="jadwal_jenis">
                  <option value="">Pilih Jenis Jadwal</option>
                  <option value="TEORI"
                      <?php if($rowList['jadwal_jenis']=='TEORI'){echo "selected=selected";}?>>TEORI
                  </option>
                  <option value="PRAKTEK"
                      <?php if($rowList['jadwal_jenis']=='PRAKTEK'){echo "selected=selected";}?>>PRAKTEK
                  </option>
                </select>
              </div>
            </div>
               <!-- perubhan disini -->
            <div class="form-group row">
              <label class="col-md-4">Hari/Tanggal</label>
              <div class="col-md-5">
                <input type="text" autocomplete="off" id="datepicker" required class="form-control" name="jadwal_tanggal" value="<?php echo date('m-d-Y', strtotime($rowList['jadwal_tanggal']));?>">
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
                    <input type="text" class="form-control timepicker" name="jadwal_mulai" value="<?php echo $rowList['jadwal_mulai'];?>">

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
                    <input type="text" class="form-control timepicker" name="jadwal_selesai" value="<?php echo $rowList['jadwal_selesai'];?>">

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
                          <?php if($rooms['rooms_id']==$rowList['rooms_id']){echo "selected=selected";}?>><?php echo $rooms['rooms_name']; ?></option>
                          <?php } ?> 
                        </select>
                      </div>
                    </div>
            <div class="form-group">
              <button class="btn btn-primary btn-sm pull-right" name="jadwal" type="submit" name="simpan"><span class="fa fa-save"></span>Ubah</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>