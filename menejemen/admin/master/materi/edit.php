<?php 
$id = $_GET['coursematerial_id'];
$queryRowMateri = mysql_query("SELECT * FROM trx_coursematerial where coursematerial_id = '".$id."'");
$rowMateri = mysql_fetch_array($queryRowMateri);
    if (isset($_POST['ubah'])) {
      if (!empty($_FILES) && $_FILES['coursematerial_file']['size'] >0 && $_FILES['coursematerial_file']['error'] == 0){
            $coursematerial_file = $_FILES['coursematerial_file']['name'];
                          $move = move_uploaded_file($_FILES['coursematerial_file']['tmp_name'], '../upload/materi/'.$coursematerial_file);

            if ($move) {
              $queryUpdate  = mysql_query("UPDATE trx_coursematerial SET 
                                    coursematerial_title = '".$_POST['coursematerial_title']."',
                                    coursematerial_file = '".$coursematerial_file."',
                                    coursematerial_description = '".$_POST['coursematerial_description']."',
                                    coursematerial_dateofposted = NOW(),
                                    coursematerial_type = '".$_POST['coursematerial_type']."',
                                    coursename_id_fk = '".$_POST['coursename_id_fk']."',
                                    operator_id_fk = '".$_SESSION['operator_id']."'
                                    WHERE coursematerial_id = '".$id."'
                                     ");
                 

            }else{
                mysql_query("UPDATE trx_coursematerial SET 
                                    coursematerial_title = '".$_POST['coursematerial_title']."',
                                    coursematerial_description = '".$_POST['coursematerial_description']."',
                                    coursematerial_dateofposted = NOW(),
                                    coursematerial_type = '".$_POST['coursematerial_type']."',
                                    coursename_id_fk = '".$_POST['coursename_id_fk']."',
                                    operator_id_fk = '".$_SESSION['operator_id']."'
                                    WHERE coursematerial_id = '".$id."'
                                     ");              
            }


      }
      if ($queryUpdate) {
         echo "<script> alert('Data Berhasil Disimpan'); location.href='index.php?hal=master/materi/list' </script>";exit;
      }
    }
 ?>
  <section class="content-header">
      <h1>
        Tambah Data Materi
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data</a></li>
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
                                                <?php if($kursus['coursename_id']==$rowMateri['coursename_id_fk']){echo "selected=selected";}?>><?php  echo $kursus['coursename_title']; ?>
                                            </option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-3">Judul Materi</label>
              <div class="col-md-9">
                <input type="text" required="" class="form-control" placeholder="Judul Materi" name="coursematerial_title" value="<?php echo $rowMateri['coursematerial_title']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-3">Deskripsi Materi</label>
              <div class="col-md-9">
                <textarea class="form-control" required="" name="coursematerial_description" placeholder="Deskripsi Materi" style="height: 250px;" id="summerBas">
                  <?php echo $rowMateri['coursematerial_description']; ?>
                </textarea>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-3">Jenis File</label>
              <div class="col-md-3">
                <select class="form-control" name="coursematerial_type">
                  <option value="">Pilih status</option>
                  <option value="PDF"
                      <?php if($rowMateri['coursematerial_type']=='PDF'){echo "selected=selected";}?>>PDF
                  </option>
                  <option value="MS.WORD"
                      <?php if($rowMateri['coursematerial_type']=='MS.WORD'){echo "selected=selected";}?>>MS.WORD
                  </option>
                  <option value="VIDEO"
                      <?php if($rowMateri['coursematerial_type']=='VIDEO'){echo "selected=selected";}?>>VIDEO
                  </option>
                </select>
              </div>
               <label class="col-md-3" ><p align="right">File (PDF,WORD,VIDEO)</p></label>
                <div class="col-md-3">
                  <input type="file" class="form-control"  name="coursematerial_file">
                </div>
            </div>
            <div class="form-group row">
              <div class="col-md-12">
               <div class="panel panel-primary">
                 <div class="panel-heading"><h3>Preview VIdeo</h3></div>
                 <div class="panel-body">
                    <?php 
                    if ($rowMateri['coursematerial_type']=='VIDEO') {
                      
               ?>
                      <center> <video width="900" controls>
                        <source src="../upload/materi/<?php echo $rowMateri['coursematerial_file']; ?>" type="video/mp4">
                        <source src="mov_bbb.ogg" type="video/ogg">
                        <?php echo $rowMateri['coursematerial_file']; ?>
                      </video></center>
               <?php } ?>
                 </div>
               </div>
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
