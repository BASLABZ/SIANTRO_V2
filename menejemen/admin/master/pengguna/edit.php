<?php 
  // tampil data 
   $idope = $_GET['id'];
   $queryTampil = mysql_query("SELECT * from ref_operator where operator_id = '".$idope."'");
   $rowOperator= mysql_fetch_array($queryTampil);
  ?>

<?php 
    if (isset($_POST['ubah'])) {
           if (!empty($_FILES) && $_FILES['operator_image']['size'] >0 && $_FILES['operator_image']['error'] == 0) {
                         $operator_image = $_FILES['operator_image']['name'];
                          $move = move_uploaded_file($_FILES['operator_image']['tmp_name'], '../upload/image-user/'.$operator_image);
                          if ($move) {
                            $query = "UPDATE ref_operator SET ( operator_name='".$_POST['operator_name']."', operator_username='".$_POST['operator_username']."', operator_password=md5('".$_POST['operator_password']."'), operator_placeofbirth='".$_POST['operator_placeofbirth']."', operator_dateofbirth='".$_POST['operator_dateofbirth']."', operator_gender='".$_POST['operator_gender']."', operator_address='".$_POST['operator_address']."', operator_phonenumber='".$_POST['operator_phonenumber']."', operator_email='".$_POST['operator_email']."', operator_religion='".$_POST['operator_religion']."', operator_website'".$_POST['operator_website']."', operator_position='".$_POST['operator_position']."', operator_image='".$operator_image."', operator_status='".$_POST['operator_status']."',operator_levelid_fk='".$_POST['operator_level']."') where operator_id='".$idope."'";
                                  $runSql = mysql_query($query);

                          }else{
                            $query = "UPDATE ref_operator SET ( operator_name='".$_POST['operator_name']."', operator_username='".$_POST['operator_username']."', operator_password=md5('".$_POST['operator_password']."'),
                                          operator_placeofbirth='".$_POST['operator_placeofbirth']."', operator_dateofbirth='".$_POST['operator_dateofbirth']."', operator_gender='".$_POST['operator_gender']."', operator_address='".$_POST['operator_address']."', operator_phonenumber='".$_POST['operator_phonenumber']."', operator_email='".$_POST['operator_email']."', operator_religion='".$_POST['operator_religidon']."', operator_website'".$_POST['operator_website']."', operator_position='".$_POST['operator_position']."', operator_status='".$_POST['operator_status']."',operator_levelid_fk='".$_POST['operator_level']."') where operator_id='".$idope."'";
                                  $runSql = mysql_query($query);

                          }
                         // $data=mysql_fetch_array($runSql);
              }

                     if ($runSql) {
                           echo "<script> alert('Berhasil Diubah'); location.href='index.php?hal=master/pengguna/list' </script>";exit;
                     }else{
                           echo "<script> alert(' Data Gagal Diubah'); location.href='index.php?hal=master/pengguna/add' </script>";exit;
                     } 
         
    }
 ?>
   <section class="content-header">
      <h1>
        Update Master Pengguna
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master</a></li>
        <li class="active">Edit</li>
        <li class="active">Pengguna</li>
      </ol>
  </section>
  <section class="content">
    <div class="">
          <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Update Data Pengguna</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <div class="box-body">
          <form class="role" method="POST" enctype="multipart/form-data">
            <div class="form-group row">
              <div class="col-md-12">
                <label class="col-md-2">Nama Operator</label>
              <div class="col-md-4">
                <input type="text" required class="form-control" name="operator_name" placeholder="Nama Operator" value="<?php echo $rowOperator['operator_name'] ?>">
              </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
              <label class="col-md-4">Username</label>
              <div class="col-md-8">
                <input type="text" required class="form-control" name="operator_username" placeholder="Username Operator" value="<?php echo $rowOperator['operator_username'] ?>">
              </div>
              </div>
              <div class="col-md-6">
              <label class="col-md-4">Password</label>
              <div class="col-md-8">
                <input type="password" required class="form-control" name="operator_password" placeholder="Password Operator" value="<?php echo $rowOperator['operator_password'] ?>">
              </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
              <label class="col-md-4">Tempat Lahir</label>
              <div class="col-md-8">
               <textarea class="form-control" name="operator_placeofbirth" placeholder="Tempat Lahir" value=""><?php echo $rowOperator['operator_placeofbirth'] ?>
               </textarea>
              </div>
              </div>
              <div class="col-md-6">
              <label class="col-md-4">Tanggal Lahir</label>
              <div class="col-md-8">
                <input type="date" required class="form-control" name="operator_dateofbirth" placeholder=" Tanggal Lahir" value="<?php echo $rowOperator['operator_dateofbirth'] ?>">
              </div>
              </div>
            </div>
            <div class="col-md-6">
              <label class="col-md-4">Jenis Kelamin</label>

              <div class="col-md-8">
              <select class="form-control" name="operator_gender">
                <option value="">Pilih Jenis Kelamin</option>
                <option value="<?php echo $rowOperator['operator_id'] ?>" selected=selected><?php echo $rowOperator['operator_gender'] ?></option>
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
                <textarea class="form-control" name="operator_address" required=""><?php echo $rowOperator['operator_address'] ?></textarea>
              </div>
              </div>
              <div class="col-md-6">
              <label class="col-md-4">No.Telp</label>
              <div class="col-md-8">
                <input type="number" required class="form-control" name="operator_phonenumber" placeholder="No Telp Trainer" value="<?php echo $rowOperator['operator_phonenumber'] ?>">
              </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
              <label class="col-md-4">Email</label>
              <div class="col-md-8">
                <input type="email" class="form-control" name="operator_email" required="" placeholder="email" value="<?php echo $rowOperator['operator_email'] ?>">
              </div>
              </div>
<!-- ini belumssssssssssssssssssssssssss -->
            <div class="form-group row">
              <div class="col-md-6">
              <label class="col-md-4">Agama</label>
              <div class="col-md-8">
               <select class="form-control" name="operator_religion" required="required">
                 <option value="<?php echo $rowOperator['operator_id'] ?>" selected=selected><?php echo $rowOperator['operator_religion'] ?></option>
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
              <label class="col-md-4">Website</label>
              <div class="col-md-8">
                <input type="text" class="form-control" name="operator_website" placeholder="http:" value="<?php echo $rowOperator['operator_website'] ?>">
              </div>
              </div>
            </div>
             <div class="form-group row">
            <div class="col-md-6">
              <label class="col-md-4">Jabatan</label>
              <div class="col-md-8">
                <input type="text" class="form-control" name="operator_position" placeholder="Jabatan" value="<?php echo $rowOperator['operator_position'] ?>">
              </div>
            </div>
            <!-- <div class="col-md-6">
              <label class="col-md-4">Pertanyaan keamanan/label>
              <div class="col-md-8">
                <input type="text" class="form-control" name="operator_hint" required="" placeholder="Jabatan">
              </div>
              </div> -->
            <div class="col-md-6">
              <label class="col-md-4">Upload</label>
              <div class="col-md-8">
                <input type="file" required name="operator_image" value="../img/<?php echo $rowOperator['operator_image'] ?>">
              </div>
              </div>
            </div>
            <div class="col-md-6">
              <label class="col-md-4">Status Operator </label>
              <div class="col-md-8">
                <select class="form-control" name="operator_status" required="">
                  <option value="<?php echo $rowOperator['operator_id'] ?>" selected=selected><?php echo $rowOperator['operator_status'] ?></option>
                  <option>Active</option>
                  <option>Inactive</option>
                </select>
              </div>
              </div>
              <div class="col-md-6">
              <label class="col-md-4">Level Operator</label>
                <div class="col-md-8">
                <select class="form-control" name="operator_level" required="">
                  <?php 
                      $sqlevel="SELECT level_id, level_name from ref_level";
                      $runsqlevel=mysql_query($sqlevel);
                        while ($datalevel=mysql_fetch_array($runsqlevel)) {
                              $var_idLev=$datalevel['level_id'];
                              $var_namaLev=$datalevel['level_name'];
                   ?>
                 <option value="<?php echo $var_idLev?>" selected=selected ><?php echo $var_namaLev ?></option>
                  <?php 
                                    }//tutup dari while

                                  ?>
                </select>
                </div>
              </div>
            <div class="form-group">
              <button class="btn btn-primary btn-sm pull-right" type="submit" name="ubah"><span class="fa fa-save"></span> Ubah Data</button>
            </div>
          </form>
       
          
        </div>
      </div>
    </div>
  </section>