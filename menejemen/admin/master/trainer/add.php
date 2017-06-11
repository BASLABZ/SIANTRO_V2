 <!-- proses simpan data -->
<?php 
    if (isset($_POST['simpan'])) {
           if (!empty($_FILES) && $_FILES['trainer_image']['size'] >0 && $_FILES['trainer_image']['error'] == 0) {
                         $trainer_image = $_FILES['trainer_image']['name'];
                          $move = move_uploaded_file($_FILES['trainer_image']['tmp_name'], 'img/'.$trainer_image);
                          if ($move) {
                            $query = "INSERT INTO ref_trainer ( trainer_name, trainer_username, trainer_password,
                                          trainer_placeofbirth, trainer_dateofbirth, trainer_gender,
                                          trainer_religion, trainer_address, trainer_phonenumber, 
                                          trainer_email, trainer_website, trainer_position, trainer_image, 
                                          trainer_status) 
                                  VALUES ('".$_POST['trainer_name']."', '".$_POST['trainer_username']."', md5('".$_POST['trainer_password']."'), '".$_POST['trainer_placeofbirth']."', '".$_POST['trainer_dateofbirth']."', '".$_POST['trainer_gender']."', '".$_POST['trainer_religion']."', '".$_POST['trainer_address']."', '".$_POST['trainer_phonenumber']."', '".$_POST['trainer_email']."', '".$_POST['trainer_website']."', '".$_POST['trainer_position']."', '".$trainer_image."', 'Y')";
                                  $runSql = mysql_query($query);

                          }else{
                            $query = "INSERT INTO ref_trainer ( trainer_name, trainer_username, trainer_password,
                                          trainer_placeofbirth, trainer_dateofbirth, trainer_gender,
                                          trainer_religion, trainer_address, trainer_phonenumber, 
                                          trainer_email, trainer_website, trainer_position, trainer_image, 
                                          trainer_status) 
                                  VALUES ('".$_POST['trainer_name']."', '".$_POST['trainer_username']."', md5('".$_POST['trainer_password']."'), '".$_POST['trainer_placeofbirth']."', '".$_POST['trainer_dateofbirth']."', '".$_POST['trainer_gender']."', '".$_POST['trainer_religion']."', '".$_POST['trainer_address']."', '".$_POST['trainer_phonenumber']."', '".$_POST['trainer_email']."', '".$_POST['trainer_website']."', '".$_POST['trainer_position']."', '', 'Y')";
                                  $runSql = mysql_query($query);

                          }
              }
                     if ($runSql) {
                           echo "<script> alert('Berhasil Disimpan'); location.href='index.php?hal=master/trainer/list' </script>";exit;
                     }else{
                           echo "<script> alert(' Data Gagal Disimpan'); location.href='index.php?hal=master/trainer/add' </script>";exit;
                     } 
         
    }
 ?>
  <section class="content-header">
      <h1>
        Tambah Master Trainer
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master</a></li>
        <li class="active">Tambah</li>
        <li class="active">Trainer</li>
      </ol>
  </section>
  <section class="content">
    <div class="col-md-10">
          <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Data Trainer</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <div class="box-body">
          <form class="role" method="POST" enctype="multipart/form-data">
            <div class="form-group row">
              <div class="col-md-12">
                <label class="col-md-2">Nama Trainer</label>
              <div class="col-md-4">
                <input type="text" required class="form-control" name="trainer_name" placeholder="Nama Trainer">
              </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
              <label class="col-md-4">Username</label>
              <div class="col-md-8">
                <input type="text" required class="form-control" name="trainer_username" placeholder="Username Trainer">
              </div>
              </div>
              <div class="col-md-6">
              <label class="col-md-4">Password</label>
              <div class="col-md-8">
                <input type="password" required class="form-control" name="trainer_password" placeholder="Password Trainer">
              </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
              <label class="col-md-4">Tempat Lahir</label>
              <div class="col-md-8">
               <textarea class="form-control" name="trainer_placeofbirth" required="" placeholder="Tempat Lahir">
                 
               </textarea>
              </div>
              </div>
              <div class="col-md-6">
              <label class="col-md-4">Tanggal Lahir</label>
              <div class="col-md-8">
                <input type="date" required class="form-control" name="trainer_dateofbirth" placeholder=" Tanggal Lahir">
              </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
              <label class="col-md-4">Agama</label>
              <div class="col-md-8">
               <select class="form-control" name="trainer_religion" required="required">
                 <option value="">Pilih Agama</option>
                 <option value="Islam">Islam</option>
                 <option value="Kristen">Kristen</option>
                 <option value="Budha">Budha</option>
                 <option value="Hindu">Hindu</option>
                 <option value="Protestan">Protestan</option>
                 <option value="Lainnya">Lainnya</option>
               </select>
              </div>
              </div>
              <div class="col-md-6">
              <label class="col-md-4">Jenis Kelamin</label>

              <div class="col-md-8">
              <select class="form-control" name="trainer_gender">
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Pria">Pria</option>
                <option value="Wanita">Wanita</option>
              </select>
              </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
              <label class="col-md-4">Alamat</label>
              <div class="col-md-8">
                <textarea class="form-control" name="trainer_address" required=""></textarea>
              </div>
              </div>
              <div class="col-md-6">
              <label class="col-md-4">No.Telp</label>
              <div class="col-md-8">
                <input type="number" required class="form-control" name="trainer_phonenumber" placeholder="No Telp Trainer">
              </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
              <label class="col-md-4">Email</label>
              <div class="col-md-8">
                <input type="email" class="form-control" name="trainer_email" required="" placeholder="email">
              </div>
              </div>
              <div class="col-md-6">
              <label class="col-md-4">Website</label>
              <div class="col-md-8">
                <input type="text" required class="form-control" name="trainer_website" placeholder="http:">
              </div>
              </div>
            </div>
             <div class="form-group row">
              <div class="col-md-6">
              <label class="col-md-4">Jabatan</label>
              <div class="col-md-8">
                <input type="text" class="form-control" name="trainer_position" required="" placeholder="Jabatan">
              </div>
              </div>
              <div class="col-md-6">
              <label class="col-md-4">Upload</label>
              <div class="col-md-8">
                <input type="file" required name="trainer_image">
              </div>
              </div>
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-sm pull-right" type="submit" name="simpan"><span class="fa fa-save"></span> Simpan</button>
            </div>
          </form>
       
          
        </div>
      </div>
    </div>
  </section>