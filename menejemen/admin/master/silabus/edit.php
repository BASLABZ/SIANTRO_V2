<?php 
$idsilabus = $_GET['silabus_id'];
$querySilabus  = mysql_query("SELECT * FROM ref_silabus where silabus_id = '".$idsilabus."'");
$rowSilabus = mysql_fetch_array($querySilabus);
    if (isset($_POST['ubah'])) {
      if (!empty($_FILES) && $_FILES['silabus_file']['size'] >0 && $_FILES['silabus_file']['error'] == 0){
            $silabus_file = $_FILES['silabus_file']['name'];
                          $move = move_uploaded_file($_FILES['silabus_file']['tmp_name'], '../upload/silabus/'.$silabus_file);

            if ($move) {
              $queryInsert  = mysql_query("UPDATE ref_silabus set 
                                                                  silabus_purpose='".$_POST['silabus_purpose']."',
                                                                  silabus_topic = '".$_POST['silabus_topic']."',
                                                                  coursename_id_fk = '".$_POST['coursename_id_fk']."',
                                                                  silabus_file = '".$silabus_file."'
                                                             WHERE silabus_id = '".$idsilabus."'");

            }else{
                $queryInsert  = mysql_query("UPDATE ref_silabus set
                                                                    silabus_purpose='".$_POST['silabus_purpose']."',
                                                                    silabus_topic = '".$_POST['silabus_topic']."',
                                                                    coursename_id_fk = '".$_POST['coursename_id_fk']."'
                                                               WHERE silabus_id = '".$idsilabus."'");              
            }


      }
      if ($queryInsert) {
         echo "<script> alert('Data Berhasil Diubah'); location.href='index.php?hal=master/silabus/list' </script>";exit;
      }
    }
 ?>
<section class="content-header">
      <h1>
        Tambah Master Silabus
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="index.php?hal=master/silabus/list">Master</a></li>
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
              <form class="role" method="POST" enctype="multipart/form-data">
            <div class="form-group row">
              <label class="col-md-3">Pilih Nama Kursus</label>
              <div class="col-md-9">
                <select class="form-control" name="coursename_id_fk" required="">
                  <option value="">Pilih Nama Kursus</option>
                  <?php $queryKursus = mysql_query("SELECT * FROM ref_coursename order by coursename_id ASC");
                      while ($kursus = mysql_fetch_array($queryKursus)) {
                   ?>
                    <option value="<?php echo $kursus['coursename_id'] ?>"
                                                <?php if($kursus['coursename_id']==$rowSilabus['coursename_id_fk']){echo "selected=selected";}?>><?php  echo $kursus['coursename_title']; ?>
                                            </option>
                  <?php } ?>
                </select>
              </div>
            </div>
                    <div class="form-group row">
              <label class="col-md-3">Judul Silabus</label>
              <div class="col-md-9">
                <input type="text" required="" class="form-control" placeholder="Isi dengan Judul Silabus" name="silabus_purpose" value="<?php echo $rowSilabus['silabus_purpose']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-3">Topik Silabus</label>
              <div class="col-md-9">
                <textarea class="form-control" required="" name="silabus_topic" placeholder="Deskripsi Silabus" style="height: 250px;" id="summerBas"><?php echo $rowSilabus['silabus_topic']; ?></textarea>
              </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">File (PDF,WORD,VIDEO)</label>
                <div class="col-md-4">
                  <input type="file" class="form-control"  name="silabus_file">
                  <label><?php echo $rowSilabus['silabus_file']; ?></label>
                </div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-info pull-right" name="ubah"><span class="fa fa-save"></span> Simpan</button>
            </div>
          </form>
            </div>
          </div>
        </div>
      </div>
    </section>
