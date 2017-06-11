<?php 
    if (isset($_POST['simpan'])) {
           if (!empty($_FILES) && $_FILES['operator_image']['size'] >0 && $_FILES['operator_image']['error'] == 0) {
                         $operator_image = $_FILES['operator_image']['name'];
                          $move = move_uploaded_file($_FILES['operator_image']['tmp_name'], '../upload/image-user/'.$operator_image);
                          if ($move) {
                            $query = "INSERT INTO ref_operator ( operator_name, operator_username, operator_password,
                                          operator_placeofbirth, operator_dateofbirth, operator_gender, operator_address, operator_phonenumber, operator_email, operator_religion, operator_website, operator_position, operator_hint_question, operator_answer_question, operator_image, 
                                          operator_status, operator_login, operator_levelid_fk) 
                                  VALUES ('".$_POST['operator_name']."', '".$_POST['operator_username']."', md5('".$_POST['operator_password']."'), '".$_POST['operator_placeofbirth']."', '".$_POST['operator_dateofbirth']."', '".$_POST['operator_gender']."', '".$_POST['operator_address']."', '".$_POST['operator_phonenumber']."', '".$_POST['operator_email']."', '".$_POST['operator_religion']."', '".$_POST['operator_website']."', '".$_POST['operator_position']."','','', '".$operator_image."', '".$_POST['operator_status']."','N', '".$_POST['operator_level']."')";
                                  $runSql = mysql_query($query);

                          }else{
                            $query = "INSERT INTO ref_operator ( operator_name, operator_username, operator_password,
                                          operator_placeofbirth, operator_dateofbirth, operator_gender, operator_address, operator_phonenumber, operator_email, operator_religion, operator_website, operator_position, operator_hint_question, operator_answer_question, operator_image, 
                                          operator_status, operator_login, operator_levelid_fk) 
                                  VALUES ('".$_POST['operator_name']."', '".$_POST['operator_username']."', md5('".$_POST['operator_password']."'), '".$_POST['operator_placeofbirth']."', '".$_POST['operator_dateofbirth']."', '".$_POST['operator_gender']."', '".$_POST['operator_address']."', '".$_POST['operator_phonenumber']."', '".$_POST['operator_email']."', '".$_POST['operator_religion']."', '".$_POST['operator_website']."', '".$_POST['operator_position']."','','', '".$_POST['operator_status']."','N', '".$_POST['operator_level']."')";
                                  $runSql = mysql_query($query);

                          }
              }
                     if ($runSql) {

                           echo "<script> alert('Berhasil Disimpan'); location.href='index.php?hal=master/pengguna/list' </script>";exit;
                     }else{
                           echo "<script> alert(' Data Gagal Disimpan'); location.href='index.php?hal=master/pengguna/add' </script>";exit;
                     } 
         
    }
 ?>
   <section class="content-header">
      <h1>
        Tambah Master Pengguna
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master</a></li>
        <li class="active">Tambah</li>
        <li class="active">Pengguna</li>
      </ol>
  </section>
  <section class="content">
    <div class="">
          <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Data Pengguna</h3>
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
                <input type="text" required class="form-control" name="operator_name" placeholder="Nama Operator">
              </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
              <label class="col-md-4">Username</label>
              <div class="col-md-8">
                <input type="text" required class="form-control" name="operator_username" placeholder="Username Operator">
              </div>
              </div>
              <div class="col-md-6">
              <label class="col-md-4">Password</label>
              <div class="col-md-8">
                <input type="password" required class="form-control" name="operator_password" placeholder="Password Operator">
              </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
              <label class="col-md-4">Tempat Lahir</label>
              <div class="col-md-8">
               <textarea class="form-control" name="operator_placeofbirth" required="" placeholder="Tempat Lahir">
                 
               </textarea>
              </div>
              </div>
              <div class="col-md-6">
              <label class="col-md-4">Tanggal Lahir</label>
              <div class="col-md-8">
                <input type="date" required class="form-control" name="operator_dateofbirth" placeholder=" Tanggal Lahir">
              </div>
              </div>
            </div>
            <div class="col-md-6">
              <label class="col-md-4">Jenis Kelamin</label>

              <div class="col-md-8">
              <select class="form-control" name="operator_gender">
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
                <textarea class="form-control" name="operator_address" required=""></textarea>
              </div>
              </div>
              <div class="col-md-6">
              <label class="col-md-4">No.Telp</label>
              <div class="col-md-8">
                <input type="number" required class="form-control" name="operator_phonenumber" placeholder="No Telp Trainer">
              </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
              <label class="col-md-4">Email</label>
              <div class="col-md-8">
                <input type="email" class="form-control" name="operator_email" required="" placeholder="email">
              </div>
              </div>

            <div class="form-group row">
              <div class="col-md-6">
              <label class="col-md-4">Agama</label>
              <div class="col-md-8">
               <select class="form-control" name="operator_religion" required="required">
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
              <label class="col-md-4">Website</label>
              <div class="col-md-8">
                <input type="text" required class="form-control" name="operator_website" placeholder="http:">
              </div>
              </div>
            </div>
             <div class="form-group row">
            <div class="col-md-6">
              <label class="col-md-4">Jabatan</label>
              <div class="col-md-8">
                <input type="text" class="form-control" name="operator_position" required="" placeholder="Jabatan">
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
                <input type="file" required name="operator_image">
              </div>
              </div>
            </div>
            <div class="col-md-6">
              <label class="col-md-4">Status Operator </label>
              <div class="col-md-8">
                <select class="form-control" name="operator_status" required="">
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
                 <option value="<?php echo $var_idLev?>"><?php echo $var_namaLev ?></option>
                  <?php 
                                    }//tutup dari while

                                  ?>
                </select>
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