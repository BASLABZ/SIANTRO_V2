<?php 
    if (isset($_POST['simpan'])) {
      if (!empty($_FILES) && $_FILES['silabus_file']['size'] >0 && $_FILES['silabus_file']['error'] == 0){
            $silabus_file = $_FILES['silabus_file']['name'];
                          $move = move_uploaded_file($_FILES['silabus_file']['tmp_name'], '../upload/silabus/'.$silabus_file);
 
            if ($move) {
              $queryInsert  = mysql_query("INSERT INTO ref_silabus (coursename_id_fk,silabus_purpose,
                                                        silabus_period,silabus_topic,silabus_file,
                                                        operator_id_fk)
                                                VALUES ('".$_POST['coursename_id_fk']."',
                                                        '".$_POST['silabus_purpose']."',
                                                        NOW(),
                                                        '".$_POST['silabus_topic']."',
                                                        '".$silabus_file."','".$_SESSION['operator_id']."')");

            }else{
                $queryInsert  = mysql_query("INSERT INTO ref_silabus (coursename_id_fk,silabus_purpose,
                                                        silabus_period,silabus_topic,silabus_file,
                                                        operator_id_fk)
                                                VALUES ('".$_POST['coursename_id_fk']."',
                                                        '".$_POST['silabus_purpose']."',
                                                        NOW(),
                                                        '".$_POST['silabus_topic']."',
                                                        '','".$_SESSION['operator_id']."')");              
            }


      }
      if ($queryInsert) {
         echo "<script> alert('Data Berhasil Disimpan'); location.href='index.php?hal=master/silabus/list' </script>";exit;
      }
    }
 ?>
<section class="content-header">
      <h1>
        Tambah Master Silabus
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="index.php?hal=master/silabus_v2/list">Master</a></li>
        <li class="active">Tambah</li>
        <li class="active">Silabus</li>
      </ol>
  </section>
      <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tambah Data Member</h3>
            </div>
            <div class="box-body">
              <form id="defaultFormSilabus" class="role" method="POST" enctype="multipart/form-data">
            <div class="form-group row">
              <label class="col-md-3">Pilih Nama Kursus</label>
              <div class="col-md-9">
                <select class="form-control select" name="coursename_id_fk" required="" id="coursename_id_fk">
                  <option value="">Pilih Nama Kursus</option>
                  <?php $queryKursus = mysql_query("SELECT * FROM ref_coursename order by coursename_id ASC");
                      while ($kursus = mysql_fetch_array($queryKursus)) {
                   ?>
                    <option value="<?php echo $kursus['coursename_id']; ?>"><?php echo $kursus['coursename_title']; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
                    <div class="form-group row">
              <label class="col-md-3">Judul Silabus</label>
              <div class="col-md-9">
                <input type="text"  class="form-control" placeholder="Isi dengan Judul Silabus" name="silabus_purpose" id="silabus_purpose">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-3">Topik Silabus</label>
              <div class="col-md-9">
                <textarea class="form-control"  name="silabus_topic" placeholder="Deskripsi Silabus" style="height: 250px;" id="summerBas"></textarea>
              </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">File</label>
                <div class="col-md-4">
                  <input type="file" class="form-control" required="" name="silabus_file">
                </div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-info pull-right" name="simpan"><span class="fa fa-save"></span> Simpan</button>
            </div>
          </form>
            </div>
          </div>
        </div>
      </div>
    </section>
