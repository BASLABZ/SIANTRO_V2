<?php 
    $operator = mysql_query("SELECT * FROM ref_operator WHERE operator_id='".$_SESSION['operator_id']."' ");
    $op = mysql_fetch_array($operator);

    if (isset($_POST['perbarui'])) {

      if (!empty($_FILES) && $_FILES['frm_opimage']['size'] >0 && $_FILES['frm_opimage']['error'] == 0){
            $var_opimage = $_FILES['frm_opimage']['name'];
                          $move = move_uploaded_file($_FILES['frm_opimage']['tmp_name'], 'menejemen/upload/image-user/'.$var_opimage);

            if ($move) {
              $queryUpdate  = mysql_query("UPDATE ref_operator set 
                                                  operator_name='".$_POST['frm_name']."',
                                                  operator_address='".$_POST['frm_address']."',
                                                  operator_email='".$_POST['frm_email']."',                  
                                                  operator_phonenumber='".$_POST['frm_phone']."',
                                                  operator_password='".md5($_POST['frm_password'])."',
                                                  operator_placeofbirth='".$_POST['frm_placeofbirth']."',
                                                  operator_dateofbirth='".$_POST['frm_dateofbirth']."',
                                                  operator_gender='".$_POST['frm_gender']."',
                                                  operator_religion='".$_POST['frm_religion']."',
                                                  operator_position='".$_POST['frm_position']."',
                                                  operator_image='".$var_opimage."',
                                                  operator_hint_question='".$_POST['frm_question']."',
                                                  operator_answer_question='".$_POST['frm_answer']."'
                                            WHERE operator_id='".$_SESSION['operator_id']."'

                                          ");

            }else{
                $queryUpdate  = mysql_query("UPDATE ref_operator set 
                                                  operator_name='".$_POST['frm_name']."',
                                                  operator_address='".$_POST['frm_address']."',
                                                  operator_email='".$_POST['frm_email']."',                  
                                                  operator_phonenumber='".$_POST['frm_phone']."',
                                                  operator_password='".md5($_POST['frm_password'])."',
                                                  operator_placeofbirth='".$_POST['frm_placeofbirth']."',
                                                  operator_dateofbirth='".$_POST['frm_dateofbirth']."',
                                                  operator_gender='".$_POST['frm_gender']."',
                                                  operator_religion='".$_POST['frm_religion']."',
                                                  operator_position='".$_POST['frm_position']."',
                                                  operator_hint_question='".$_POST['frm_question']."',
                                                  operator_answer_question='".$_POST['frm_answer']."'
                                            WHERE operator_id='".$_SESSION['operator_id']."'

                                          ");
                   
            
            }

      } else {
          $queryUpdate  = mysql_query("UPDATE ref_operator set 
                                                  operator_name='".$_POST['frm_name']."',
                                                  operator_address='".$_POST['frm_address']."',
                                                  operator_email='".$_POST['frm_email']."',                  
                                                  operator_phonenumber='".$_POST['frm_phone']."',
                                                  operator_password='".md5($_POST['frm_password'])."',
                                                  operator_placeofbirth='".$_POST['frm_placeofbirth']."',
                                                  operator_dateofbirth='".$_POST['frm_dateofbirth']."',
                                                  operator_gender='".$_POST['frm_gender']."',
                                                  operator_religion='".$_POST['frm_religion']."',
                                                  operator_position='".$_POST['frm_position']."',
                                                  operator_hint_question='".$_POST['frm_question']."',
                                                  operator_answer_question='".$_POST['frm_answer']."'
                                            WHERE operator_id='".$_SESSION['operator_id']."'

                                          ");
       
      }

      if ($queryUpdate) {
         echo "<script> alert('Data Berhasil Diperbarui'); location.href='index.php?hal=master/pengguna/profil' </script>";exit;
      }
    }
?>


<div id="signin" class="signin content-section bg-grey">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <h2 class="text-big text-center marg-40-btm">Edit Akun Operator<span class="fa fa-gear"></span></h2>
            <form class="role" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="panel panel-success">
                  <div class="panel-heading">
                    1 - Data Pribadi
                  </div>
                  <div class="panel-body">
                  <div class="col-sm-6">
                      <div class="form-group">
                        <label for="image" class="form-label">Foto Diri</label><br/>
                        <!-- nambah untuk foto user defaultnya -->
                        <?php 

                            if ($op['operator_image']!='') {  ?>
                                  <img src="../../menejemen/upload/image-user/<?php echo $op['operator_image']; ?>" width="200px" height="250px" alt="Foto Diri" style="border: solid 1px #ddd">
                                  <input type="file" id="" class="form-control form-bordered" name="frm_opimage"><!-- <?php echo $op['operator_image'] ?> -->
                            <!-- =============== -->
                              
                         <?php   
                              }else{ ?>
                                    <img src="../../menejemen/upload/image-user/user-add-icon.png" width="200px" height="250px" alt="Foto Diri" style="border: solid 1px #ddd">
                                    <input type="file" id="" class="form-control form-bordered" name="frm_opimage">
                         <?php
                               }
                        ?>
                        
                      </div><!-- .form-group -->
                    </div><!-- .col-sm-6 -->
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" class="form-control form-bordered" placeholder="Masukkan nama" name="frm_name" required="" value="<?php echo $op['operator_name']; ?>" >
                      </div><!-- .form-group -->
                    </div><!-- .col-sm-6 -->
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control form-bordered" placeholder="Masukkan email" id="email" name="frm_email" required="" value="<?php echo $op['operator_email']; ?>">
                      </div><!-- .form-group -->
                    </div><!-- .col-sm-6 -->
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="phone" class="form-label">No. Telepon</label>
                        <input type="text" class="form-control form-bordered" placeholder="Masukan nomor telepon" id="phone" name="frm_phone" required="" value="<?php echo $op['operator_phonenumber']; ?>">
                      </div><!-- .form-group -->
                    </div><!-- .col-sm-6 -->
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="gender" class="form-label">Jenis Kelamin</label>
                        <select name="frm_gender" id="gender" class="form-control form-bordered">
                          <option><?php echo $op['operator_gender']; ?></option>
                          <?php 
                            if ($op['operator_gender']=='Wanita') { ?>
                              <option>Pria</option> <?php                          
                            } else { ?>
                              <option>Wanita</option> <?php
                            }
                          ?>
                        </select>
                      </div><!-- .form-group -->
                    </div><!-- .col-sm-6 -->
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="placeofbirth" class="form-label">Tempat Lahir</label>
                        <input type="text" name="frm_placeofbirth" class="form-control" value="<?php echo $op['operator_placeofbirth']; ?>">
                      </div><!-- .form-group -->
                    </div><!-- .col-sm-6 -->
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="dateofbirth" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="frm_dateofbirth" class="form-control" value="<?php echo $op['operator_dateofbirth']; ?>">
                      </div><!-- .form-group -->
                    </div><!-- .col-sm-6 -->
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="religion" class="form-label">Agama</label>
                        <select name="frm_religion" id="religion" class="form-control form-bordered">
                          <option><?php echo $op['operator_religion']; ?></option>
                          <option value="islam">Islam</option>
                          <option value="katolik">Katolik</option>
                          <option value="kristen">Kristen</option>
                          <option value="hindu">Hindu</option>
                          <option value="budha">Budha</option>
                        </select>
                      </div><!-- .form-group -->
                    </div><!-- .col-sm-6 -->
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="address" class="form-label">Alamat Rumah</label>
                        <textarea class="form-control" name="frm_address" rows="3" style="resize:none"><?php echo $op['operator_address']; ?></textarea>
                      </div><!-- .form-group -->
                    </div><!-- .col-sm-6 -->
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="position" class="form-label">Profesi / Jabatan</label>
                        <input type="text" id="position" class="form-control form-bordered" placeholder="Masukan jabatan" name="frm_position" required="" value="<?php echo $op['operator_position']; ?>">
                      </div><!-- .form-group -->
                    </div><!-- .col-sm-6 -->
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="website" class="form-label">Website</label><br/>
                        <input type="text" id="website" class="form-control form-bordered" placeholder="Masukan jabatan" name="frm_website" required="" value="<?php echo $op['operator_website']; ?>">
                      </div><!-- .form-group -->
                    </div><!-- .col sm6
                  </div>
                </div>
                <div class="panel panel-success">
                  <div class="panel-heading">
                    2 - Data Profesi
                  </div>
                  <div class="panel-body">
                    col-sm-6 -->                  
                  </div>
                </div>
                <div class="panel panel-success">
                  <div class="panel-heading">
                    2 - Data Akun Baru
                  </div>
                  <div class="panel-body">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="passwords" class="form-label">Password</label>
                        <input type="password" class="form-control form-bordered" placeholder="Masukan password baru" id="password" name="frm_password" onblur="cekpassword()" required="" value="<?php echo $op['operator_password']; ?>">
                      </div><!-- .form-group -->
                    </div><!-- .col-sm-6 -->
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="position" class="form-label">Pertanyaan Keamanan</label>
                        <select name="frm_question" id="question" class="form-control form-bordered">
                          <option><?php echo $op['operator_hint_question']; ?></option>
                          <option>Siapa nama gadis ibu kandung anda?</option>
                          <option>Di kota manakah anda dilahirkan?</option>
                          <option>Apa nama sekolah dasar anda?</option>
                          <option>Siapa nama panggilan anda ketika kecil?</option>
                        </select>
                      </div><!-- .form-group -->
                    </div><!-- .col-sm-6 -->
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="position" class="form-label">Jawaban Keamanan</label>
                        <input type="text" name="frm_answer" id="answer" class="form-control form-bordered" placeholder="Masukan jawaban" required="" value="<?php echo $op['operator_answer_question']; ?>">
                      </div><!-- .form-group -->
                    </div><!-- .col-sm-6 -->
                  </div>
                </div>
                <div class="col-sm-12 marg-20-top">
                  <button type="submit" class="btn btn-primary" name="perbarui">Simpan Perubahan</button>
                </div>
              </div><!-- .row -->
            </form>
          </div>
        </div><!-- .row -->
      </div><!-- .container -->
    </div><!-- #signin -->
    <!-- end:signin -->

    <script type="text/javascript">
          function cekpassword(){
            var pass = document.getElementById('password');
              var minlength = 6;
            if (pass.value.length<minlength) {
                  alert('Password yang anda inputkan terlalu pendek');
                pass.value = pass.value.substring(0,pass.value.length-100);
              };
          }
    </script>