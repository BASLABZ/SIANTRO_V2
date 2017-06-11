<?php 
    if (isset($_POST['simpan'])) {
      $querysimpan  = mysql_query("INSERT INTO  tbl_selectclass (operator_id_fk,rooms_id,coursename_id) 
                                            values ('".$_POST['operator_id_fk']."','".$_POST['rooms_id']."','".$_POST['coursename_id']."')");
      if ($querysimpan) {
          echo "<script> alert('Data Berhasil Disimpan'); location.href='index.php?hal=master/pembagiankelas/list' </script>";exit;
      }
    }
 ?>
  <section class="content-header">
      <h1>
        Tambah Master Pembagian Kelas Kursus
        
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
              <h3 class="box-title">Tambah Data Pembagian Kelas Kursus</h3>
            </div>
            <div class="box-body">
              <form class="role" method="POST" >
                    <div class="form-group row">
                      <label class="col-md-3">Pilih Kursus</label>
                      <div class="col-md-6">
                        <select class="form-control select" name="coursename_id">
                          <option value="">Pilih Kursus</option>
                          <?php $querykursus = mysql_query("SELECT * FROM ref_coursename order by coursename_id asc");
                          while ($kursus  = mysql_fetch_array($querykursus)) {?>
                          <option value="<?php echo $kursus['coursename_id']; ?>"><?php echo $kursus['coursename_title']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-3">Pilih Pengajar</label>
                      <div class="col-md-4">
                        <select class="form-control select" name="operator_id_fk">
                          <option value="">Pilih Operator</option>
                          <?php $queryop = mysql_query("SELECT * FROM ref_operator order by operator_id asc");
                          while ($operator  = mysql_fetch_array($queryop)) {?>
                          <option value="<?php echo $operator['operator_id']; ?>"><?php echo $operator['operator_name']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                     <div class="form-group row">
                      <label class="col-md-3">Pilih Ruangan</label>
                      <div class="col-md-4">
                        <select class="form-control select" name="rooms_id">
                          <option value="">Pilih Ruangan</option>
                          <?php $queryrooms = mysql_query("SELECT * FROM ref_rooms order by rooms_id asc");
                          while ($rooms  = mysql_fetch_array($queryrooms)) {?>
                          <option value="<?php echo $rooms['rooms_id']; ?>"><?php echo $rooms['rooms_name']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <div class="col-md-9">
                        <button type="submit" class="btn btn-info pull-right" name="simpan"><span class="fa fa-save"></span> Simpan</button>
                      </div>
                    </div>
               </form>
            </div>
          </div>
        </div>
      </div>
    </section>
