<?php 
    $id  = $_GET['id'];
    $query  = mysql_query("SELECT * FROM ref_announcement where announcement_id  = '".$id."'");
    $rowPengumuman = mysql_fetch_array($query);
    if (isset($_POST['simpan'])) {
      if (!empty($_FILES) && $_FILES['announcement_image']['size'] >0 && $_FILES['announcement_image']['error'] == 0){
            $announcement_image = $_FILES['announcement_image']['name'];
                          $move = move_uploaded_file($_FILES['announcement_image']['tmp_name'], '../upload/announcement/'.$announcement_image);

            if ($move) {
              $queryInsert  = mysql_query("UPDATE ref_announcement set 
                                                            announcement_judul='".$_POST['announcement_judul']."',
                                                            announcement_description='".$_POST['announcement_description']."',
                                                            announcement_image='".$announcement_image."',
                                                            announcement_dateofposted = NOW()
                                                            where announcement_id = '".$id."'");

            }else{
                $queryInsert  = mysql_query("UPDATE ref_announcement set 
                                                              announcement_judul='".$_POST['announcement_judul']."',
                                                              announcement_description='".$_POST['announcement_description']."',
                                                              announcement_image='',
                                                              announcement_dateofposted = NOW()
                                                              where announcement_id = '".$id."'");              
            }

      }
      if ($queryInsert) {
         echo "<script> alert('Data Berhasil Diubah'); location.href='index.php?hal=master/announcement/list' </script>";exit;
      }
    }
 ?>
  <section class="content-header">
      <h1>
        Ubah Master Pengumuman
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="index.php?hal=master/announcement/list">Master</a></li>
        <li class="active">Ubah</li>
        <li class="active">Pengumuman</li>
      </ol>
  </section>
   <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Ubah Data Pengumuman</h3>
            </div>
            <div class="box-body">
              <form class="role" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                      <label class="col-md-3">Judul Pengumuman</label>
                      <div class="col-md-9">
                        <input type="text" required="" class="form-control" placeholder="Isi dengan Judul Pengumuman" name="announcement_judul" value="<?php echo $rowPengumuman['announcement_judul']; ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-3">Topik Pengumuman</label>
                      <div class="col-md-9">
                        <textarea class="form-control" required="" name="announcement_description" placeholder="Deskripsi Pengumuman" style="height: 250px;" id="summerBas">
                          <?php echo $rowPengumuman['announcement_description']; ?>
                        </textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Foto</label>
                        <div class="col-md-4">
                          <input type="file" class="form-control" required="" name="announcement_image">
                          <img src="../upload/announcement/<?php echo $rowPengumuman['announcement_image']; ?>" class='img-responsive img-thumbnail'>
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
