 <?php 
  // tampil data 
   $idtrainer = $_GET['trainer_id'];
   $queryTampil = mysql_query("SELECT * from ref_trainer where trainer_id = '".$idtrainer."'");
   $rowTrainer = mysql_fetch_array($queryTampil);
  ?>
 <!-- proses simpan data -->
<?php 
    if (isset($_POST['ubah'])) {
           if (!empty($_FILES) && $_FILES['trainer_image']['size'] >0 && $_FILES['trainer_image']['error'] == 0) {
                         $trainer_image = $_FILES['trainer_image']['name'];
                          $move = move_uploaded_file($_FILES['trainer_image']['tmp_name'], 'img/'.$trainer_image);
                          if ($move) {
                            $query = "UPDATE ref_trainer SET  
                                          trainer_name = '".$_POST['trainer_name']."', trainer_username = '".$_POST['trainer_username']."', 
                                          trainer_password = md5('".$_POST['trainer_password']."'),
                                          trainer_placeofbirth = '".$_POST['trainer_placeofbirth']."',
                                          trainer_dateofbirth = '".$_POST['trainer_dateofbirth']."' ,
                                          trainer_gender = '".$_POST['trainer_gender']."',
                                          trainer_religion = '".$_POST['trainer_religion']."',
                                          trainer_address = '".$_POST['trainer_address']."' ,
                                          trainer_phonenumber = '".$_POST['trainer_phonenumber']."', 
                                          trainer_email = '".$_POST['trainer_email']."',
                                          trainer_website = '".$_POST['trainer_website']."',
                                          trainer_position = '".$_POST['trainer_position']."',
                                          trainer_image = '".$trainer_image."', trainer_status = 'Y' WHERE trainer_id = '".$idtrainer."'";
                                  $runSql = mysql_query($query);
                                          

                          }
              }else{
                             
                        

                     
              $query = "UPDATE ref_trainer SET  
                                          trainer_name = '".$_POST['trainer_name']."', trainer_username = '".$_POST['trainer_username']."', 
                                          trainer_password = md5('".$_POST['trainer_password']."'),
                                          trainer_placeofbirth = '".$_POST['trainer_placeofbirth']."',
                                          trainer_dateofbirth = '".$_POST['trainer_dateofbirth']."' ,
                                          trainer_gender = '".$_POST['trainer_gender']."',
                                          trainer_religion = '".$_POST['trainer_religion']."',
                                          trainer_address = '".$_POST['trainer_address']."' ,
                                          trainer_phonenumber = '".$_POST['trainer_phonenumber']."', 
                                          trainer_email = '".$_POST['trainer_email']."',
                                          trainer_website = '".$_POST['trainer_website']."',
                                          trainer_position = '".$_POST['trainer_position']."',
                                          trainer_status = 'Y' WHERE trainer_id = '".$idtrainer."'";
            $runSql = mysql_query($query);

                           }
                     if ($runSql) {
                           echo "<script> alert('Berhasil Diubah'); location.href='index.php?hal=master/trainer/list' </script>";exit;
                     }else{
                           echo "<script> alert(' Data Gagal Diubah'); location.href='index.php?hal=master/trainer/edit&trainer_id=$idtrainer' </script>";exit;
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
                <input type="text" required class="form-control" name="trainer_name" placeholder="Nama Trainer"
                value="<?php echo $rowTrainer['trainer_name']; ?>">
              </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
              <label class="col-md-4">Username</label>
              <div class="col-md-8">
                <input type="text" required class="form-control" name="trainer_username" placeholder="Username Trainer" value="<?php echo $rowTrainer['trainer_username']; ?>">
              </div>
              </div>
              <div class="col-md-6">
              <label class="col-md-4">Password</label>
              <div class="col-md-8">
                <input type="password" required class="form-control" name="trainer_password" placeholder="Password Trainer" value="<?php echo $rowTrainer['trainer_password']; ?>">
              </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
              <label class="col-md-4">Tempat Lahir</label>
              <div class="col-md-8">
               <textarea class="form-control"  name="trainer_placeofbirth" required="" placeholder="Tempat Lahir" >
                 <?php echo $rowTrainer['trainer_placeofbirth']; ?>
               </textarea>
              </div>
              </div>
              <div class="col-md-6">
              <label class="col-md-4">Tanggal Lahir</label>
              <div class="col-md-8">
                <input type="date" required class="form-control" name="trainer_dateofbirth" placeholder=" Tanggal Lahir" value="<?php echo $rowTrainer['trainer_dateofbirth']; ?>">
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
                <textarea class="form-control" name="trainer_address" required=""><?php echo $rowTrainer['trainer_address']; ?></textarea>
              </div>
              </div>
              <div class="col-md-6">
              <label class="col-md-4">No.Telp</label>
              <div class="col-md-8">
                <input type="number" required class="form-control" name="trainer_phonenumber" placeholder="No Telp Trainer" value="<?php echo $rowTrainer['trainer_phonenumber']; ?>">
              </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
              <label class="col-md-4">Email</label>
              <div class="col-md-8">
                <input type="email" value="<?php echo $rowTrainer['trainer_email']; ?>" class="form-control" name="trainer_email" required="" placeholder="email">
              </div>
              </div>
              <div class="col-md-6">
              <label class="col-md-4">Website</label>
              <div class="col-md-8">
                <input type="text" value="<?php echo $rowTrainer['trainer_website']; ?>" required class="form-control" name="trainer_website" placeholder="http:">
              </div>
              </div>
            </div>
             <div class="form-group row">
              <div class="col-md-6">
              <label class="col-md-4">Jabatan</label>
              <div class="col-md-8">
                <input type="text" class="form-control" value="<?php echo $rowTrainer['trainer_position']; ?>" name="trainer_position" required="" placeholder="Jabatan">
              </div>
              </div>
              <div class="col-md-6">
              <label class="col-md-4">Upload</label>
              <div class="col-md-8">
                
                <input type="file" name="trainer_image">
              </div>
              </div>
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-sm pull-right" type="submit" name="ubah"><span class="fa fa-save"></span> Simpan</button>
            </div>
          </form>
       
          
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <img src="img/<?php echo $rowTrainer['trainer_image']; ?>"  class="img-responsive img-thumbnail">
    </div>
  </section>