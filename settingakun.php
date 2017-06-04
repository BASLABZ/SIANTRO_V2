<?php 
    $member = mysql_query("SELECT * FROM tbl_member WHERE member_id='".$_SESSION['member_id']."' ");
    $m = mysql_fetch_array($member);

    if (isset($_POST['perbarui'])) {

      if (!empty($_FILES) && $_FILES['frm_memberimage']['size'] >0 && $_FILES['frm_memberimage']['error'] == 0){
            $var_memberimage = $_FILES['frm_memberimage']['name'];
                          $move = move_uploaded_file($_FILES['frm_memberimage']['tmp_name'], 'menejemen/upload/memberimage/'.$var_memberimage);

            if ($move) {
              $queryInsert  = mysql_query("UPDATE tbl_member set 
                                                  member_name='".$_POST['frm_name']."',
                                                  member_address='".$_POST['frm_address']."',
                                                  member_useremail='".$_POST['frm_email']."',                  
                                                  member_phonenumber='".$_POST['frm_phone']."',
                                                  member_password='".md5($_POST['frm_password'])."',
                                                  member_placeofbirth='".$_POST['frm_placeofbirth']."',
                                                  member_dateofbirth='".$_POST['frm_dateofbirth']."',
                                                  member_gender='".$_POST['frm_gender']."',
                                                  member_religion='".$_POST['frm_religion']."',
                                                  member_position='".$_POST['frm_position']."',
                                                  member_institution='".$_POST['frm_instansi']."',
                                                  member_skill='".$_POST['frm_keahlian']."',
                                                  member_image='".$var_memberimage."',
                                                  member_hint_question='".$_POST['frm_question']."',
                                                  member_answer_question='".$_POST['frm_answer']."'
                                            WHERE member_id='".$_SESSION['member_id']."'

                                          ");

            }else{
                $queryInsert  = mysql_query("UPDATE tbl_member set 
                                                  member_name='".$_POST['frm_name']."',
                                                  member_address='".$_POST['frm_address']."',
                                                  member_useremail='".$_POST['frm_email']."',                  
                                                  member_phonenumber='".$_POST['frm_phone']."',
                                                  member_password='".md5($_POST['frm_password'])."',
                                                  member_placeofbirth='".$_POST['frm_placeofbirth']."',
                                                  member_dateofbirth='".$_POST['frm_dateofbirth']."',
                                                  member_gender='".$_POST['frm_gender']."',
                                                  member_religion='".$_POST['frm_religion']."',
                                                  member_position='".$_POST['frm_position']."',
                                                  member_institution='".$_POST['frm_instansi']."',
                                                  member_skill='".$_POST['frm_keahlian']."',
                                                  member_hint_question='".$_POST['frm_question']."',
                                                  member_answer_question='".$_POST['frm_answer']."'
                                            WHERE member_id='".$_SESSION['member_id']."'");
            $data=mysql_fetch_array($queryInsert);              
            
            }

      } else {
          $queryInsert  = mysql_query("UPDATE tbl_member set 
                                                  member_name='".$_POST['frm_name']."',
                                                  member_address='".$_POST['frm_address']."',
                                                  member_useremail='".$_POST['frm_email']."',                  
                                                  member_phonenumber='".$_POST['frm_phone']."',
                                                  member_password='".md5($_POST['frm_password'])."',
                                                  member_placeofbirth='".$_POST['frm_placeofbirth']."',
                                                  member_dateofbirth='".$_POST['frm_dateofbirth']."',
                                                  member_gender='".$_POST['frm_gender']."',
                                                  member_religion='".$_POST['frm_religion']."',
                                                  member_position='".$_POST['frm_position']."',
                                                  member_institution='".$_POST['frm_instansi']."',
                                                  member_skill='".$_POST['frm_keahlian']."',
                                                  member_hint_question='".$_POST['frm_question']."',
                                                  member_answer_question='".$_POST['frm_answer']."'
                                            WHERE member_id='".$_SESSION['member_id']."'");
          $data=mysql_fetch_array($queryInsert);
      }

      if ($queryInsert) {
         echo "<script> alert('Data Berhasil Diperbarui'); location.href='index.php?hal=settingakun' </script>";exit;
      }
    }
?>


<div id="signin" class="signin content-section bg-grey">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <h2 class="text-big text-center marg-40-btm">Pengaturan Akun <span class="fa fa-gear"></span></h2>
            <form class="role" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="panel panel-success">
                  <div class="panel-heading">
                    1 - Data Pribadi
                  </div>
                  <div class="panel-body">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" class="form-control form-bordered" placeholder="Masukkan nama" name="frm_name" required="" value="<?php echo $m['member_name']; ?>" >
                      </div><!-- .form-group -->
                    </div><!-- .col-sm-6 -->
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control form-bordered" placeholder="Masukkan email" id="email" name="frm_email" required="" value="<?php echo $m['member_useremail']; ?>">
                      </div><!-- .form-group -->
                    </div><!-- .col-sm-6 -->
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="phone" class="form-label">No. Telepon</label>
                        <input type="text" class="form-control form-bordered" placeholder="Masukan nomor telepon" id="phone" name="frm_phone" required="" value="<?php echo $m['member_phonenumber']; ?>">
                      </div><!-- .form-group -->
                    </div><!-- .col-sm-6 -->
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="gender" class="form-label">Jenis Kelamin</label>
                        <select name="frm_gender" id="gender" class="form-control form-bordered">
                          <option><?php echo $m['member_gender']; ?></option>
                          <?php 
                            if ($m['member_gender']=='Wanita') { ?>
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
                        <input type="text" name="frm_placeofbirth" class="form-control" value="<?php echo $m['member_placeofbirth']; ?>">
                      </div><!-- .form-group -->
                    </div><!-- .col-sm-6 -->
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="dateofbirth" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="frm_dateofbirth" class="form-control" value="<?php echo $m['member_dateofbirth']; ?>">
                      </div><!-- .form-group -->
                    </div><!-- .col-sm-6 -->
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="religion" class="form-label">Agama</label>
                        <select name="frm_religion" id="religion" class="form-control form-bordered">
                          <option><?php echo $m['member_religion']; ?></option>
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
                        <textarea class="form-control" name="frm_address" rows="3" style="resize:none"><?php echo $m['member_address']; ?></textarea>
                      </div><!-- .form-group -->
                    </div><!-- .col-sm-6 -->
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="image" class="form-label">Foto Diri</label><br/>
                        <!-- nambah untuk foto user defaultnya -->
                        <?php 

                            if ($m['member_image']=='') {  ?>
                               <img src="menejemen/upload/memberimage/user-add-icon.png" width="200px" height="250px" alt="Foto Diri" style="border: solid 1px #ddd">
                               <input type="file" id="memberimage" class="form-control form-bordered" name="frm_memberimage">
                         <?php   
                              }else{ ?>
                                    <img src="menejemen/upload/memberimage/<?php echo $m['member_image']; ?>" width="200px" height="250px" alt="Foto Diri" style="border: solid 1px #ddd">
                                    <input type="file" id="memberimage" class="form-control form-bordered" name="frm_memberimage">
                         <?php
                               }
                        ?>
                        
                      </div><!-- .form-group -->
                    </div><!-- .col-sm-6 -->
                  </div>
                </div>
                <div class="panel panel-success">
                  <div class="panel-heading">
                    2 - Data Profesi
                  </div>
                  <div class="panel-body">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="position" class="form-label">Profesi / Jabatan</label>
                        <input type="text" id="position" class="form-control form-bordered" placeholder="Masukan jabatan" name="frm_position" required="" value="<?php echo $m['member_position']; ?>">
                      </div><!-- .form-group -->
                    </div><!-- .col-sm-6 -->
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="instansi" class="form-label">Instansi</label>
                        <input type="text" id="instansi" class="form-control form-bordered" placeholder="Masukan instansi" name="frm_instansi" required="" value="<?php echo $m['member_institution']; ?>">
                      </div><!-- .form-group -->
                    </div><!-- .col-sm-6 -->
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="keahlian" class="form-label">Keahlian</label>
                        <input type="text" id="keahlian" class="form-control form-bordered" placeholder="Masukan keahlian" name="frm_keahlian" required="" value="<?php echo $m['member_skill']; ?>">
                      </div><!-- .form-group -->
                    </div><!-- .col-sm-6 -->
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="kartuprofesi" class="form-label">Dokumen Legalitas Profesi</label><br/>
                        <img src="menejemen/upload/berkas/<?php echo $m['member_doc']; ?>" width="200px">
                        <a href="#">Lihat Detail</a>
                        <!-- <input type="file" id="kartuprofesi" class="form-control form-bordered" name="frm_profesioncard"> -->
                        <!-- *) Dapat dibuktikan dengan scan KTM atau kartu identitas resmi lainnya yang menunjukkan profesi anda. (File : pdf, jpg, png). -->
                      </div><!-- .form-group -->
                    </div><!-- .col-sm-6 -->                  
                  </div>
                </div>
                <div class="panel panel-success">
                  <div class="panel-heading">
                    3 - Data Akun Baru
                  </div>
                  <div class="panel-body">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="passwords" class="form-label">Password</label>
                        <input type="password" class="form-control form-bordered" placeholder="Masukan password baru" id="password" name="frm_password" onblur="cekpassword()" required="" value="<?php echo $m['member_password']; ?>">
                      </div><!-- .form-group -->
                    </div><!-- .col-sm-6 -->
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="position" class="form-label">Pertanyaan Keamanan</label>
                        <select name="frm_question" id="question" class="form-control form-bordered">
                          <option><?php echo $m['member_hint_question']; ?></option>
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
                        <input type="text" name="frm_answer" id="answer" class="form-control form-bordered" placeholder="Masukan jawaban" required="" value="<?php echo $m['member_answer_question']; ?>">
                      </div><!-- .form-group -->
                    </div><!-- .col-sm-6 -->
                  </div>
                </div>
                <div class="col-sm-12 marg-20-top">
                  <button type="submit" class="button btn-square" name="perbarui">Simpan Perubahan</button>
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