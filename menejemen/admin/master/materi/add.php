<?php 
    if (isset($_POST['simpan'])) {
      if ($_POST['video_link']!='') {
        $coursematerial_file = $_POST['video_link'];
        $queryInsert  = mysql_query("INSERT INTO trx_coursematerial (coursematerial_title,
                coursematerial_file,coursematerial_description,coursematerial_dateofposted,
                coursematerial_type,coursename_id_fk,operator_id_fk)
                 VALUES ('".$_POST['coursematerial_title']."','".$coursematerial_file."','".$_POST['coursematerial_description']."',NOW(),'".$_POST['coursematerial_type']."','".$_POST['coursename_id_fk']."','".$_SESSION['operator_id']."')");
      }
      elseif (!empty($_FILES) && $_FILES['coursematerial_file']['size'] >0 && $_FILES['coursematerial_file']['error'] == 0){

            if ($move) {
              $queryInsert  = mysql_query("INSERT INTO trx_coursematerial (coursematerial_title,
                coursematerial_file,coursematerial_description,coursematerial_dateofposted,
                coursematerial_type,coursename_id_fk,operator_id_fk)
                 VALUES ('".$_POST['coursematerial_title']."','".$coursematerial_file."','".$_POST['coursematerial_description']."',NOW(),'".$_POST['coursematerial_type']."','".$_POST['coursename_id_fk']."','".$_SESSION['operator_id']."')");
                 

            }else{
                $queryInsert  = mysql_query("INSERT INTO trx_coursematerial (coursematerial_title,
                  coursematerial_file,coursematerial_description,coursematerial_dateofposted,
                  coursematerial_type,coursename_id_fk,operator_id_fk)
                   VALUES ('".$_POST['coursematerial_title']."','','".$_POST['coursematerial_description']."',NOW(),'".$_POST['coursematerial_type']."','".$_POST['coursename_id_fk']."','".$_SESSION['operator_id']."')");              
            }


      }
      if ($queryInsert) {
         echo "<script> alert('Data Berhasil Disimpan'); location.href='index.php?hal=master/materi/list' </script>";exit;
      }
    }
 ?>
  <section class="content-header">
      <h1>
        Tambah Data Materi
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="index.php?hal=master/materi/list">Data</a></li>
        <li class="active">Tambah</li>
        <li class="active">Materi</li>
      </ol>
  </section>
      <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tambah Data Materi</h3>
            </div>
            <div class="box-body">
              <form id="materikursus" class="role" method="POST" enctype="multipart/form-data">
               <div class="form-group row">
              <label class="col-md-3">Pilih Nama Kursus</label>
              <div class="col-md-9">
                <select class="form-control select" name="coursename_id_fk" required="">
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
              <label class="col-md-3">Judul Materi</label>
              <div class="col-md-9">
                <input type="text" required="" class="form-control" placeholder="Judul Materi" name="coursematerial_title">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-3">Deskripsi Materi</label>
              <div class="col-md-9">
                <textarea class="form-control" required="" name="coursematerial_description" placeholder="Deskripsi Materi" style="height: 250px;" id="summerBas"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-3">Jenis File</label>
              <div class="col-md-3">
                <select class="form-control" id="teles" onchange="cusvid()" name="coursematerial_type">
                  <option value="">Pilih status</option>
                  <option value="PDF">PDF</option>
                  <option value="MS.WORD">MS. WORD</option>
                  <option value="VIDEO">VIDEO</option>
                </select>
              </div>
              <script type="text/javascript">
                function cusvid(){
                  var a = document.getElementById("teles").value;
                  if (a == "VIDEO") {
                    document.getElementById('vid').hidden = false;
                    document.getElementById('pil').hidden = true;
                  } else {
                    document.getElementById('vid').hidden = true;
                    document.getElementById('pil').hidden = false;
                  }
                }
              </script>
              <textarea id="vid" style="resize: none;" name="video_link" hidden=""></textarea>
               <label class="col-md-3" ><p align="right">File (PDF,WORD,VIDEO)</p></label>
              <div id="pil">
                <div class="col-md-3">
                  <input type="file" class="form-control" required="" name="coursematerial_file">
                </div>
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
