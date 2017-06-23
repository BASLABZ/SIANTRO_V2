 
<div id="signin" class="signin content-section bg-grey">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <h2 class="text-big text-center marg-40-btm">Sign Up <span class="pe-7s-add-user"></span></h2>
            <form class="contact-form" action="?hal=register-save" method="post" enctype='multipart/form-data'>
              <div class="row">
                <div class="panel panel-success">
                  <div class="panel-heading">
                    1 - Data Pribadi
                  </div>
                  <div class="panel-body">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" class="form-control form-bordered" placeholder="Masukkan nama" name="frm_name" required="" >
                      </div><!-- .form-group -->
                    </div><!-- .col-sm-6 -->
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control form-bordered" placeholder="Masukkan email" id="email" name="frm_email" required="">
                      </div><!-- .form-group -->
                    </div><!-- .col-sm-6 -->
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="phone" class="form-label">No. Telepon</label>
                        <input type="text" class="form-control form-bordered" placeholder="Masukan nomor telepon" id="phone" name="frm_phone" onkeyup="cekphone()" required="">
                      </div><!-- .form-group -->
                    </div><!-- .col-sm-6 -->
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="gender" class="form-label">Jenis Kelamin</label>
                        <select name="frm_gender" id="gender" class="form-control form-bordered">
                          <option>Pria</option>
                          <option>Wanita</option>
                        </select>
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
                        <input type="text" id="position" class="form-control form-bordered" placeholder="Masukan jabatan" name="frm_position" required="">
                      </div><!-- .form-group -->
                    </div><!-- .col-sm-6 -->
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="instansi" class="form-label">Instansi</label>
                        <input type="text" id="instansi" class="form-control form-bordered" placeholder="Masukan instansi" name="frm_institution" required="">
                      </div><!-- .form-group -->
                    </div><!-- .col-sm-6 -->
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="keahlian" class="form-label">Keahlian</label>
                        <input type="text" id="keahlian" class="form-control form-bordered" placeholder="Masukan keahlian" name="frm_skill" required="">
                      </div><!-- .form-group -->
                    </div><!-- .col-sm-6 -->
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="kartuprofesi" class="form-label">Dokumen Legalitas Profesi</label>
                        <input type="file" id="kartuprofesi" class="form-control form-bordered" name="frm_profesioncard" required="" accept="application/pdf, image/jpg, image/png, image/jpeg">
                        *) Dapat dibuktikan dengan scan KTM atau kartu identitas resmi lainnya yang menunjukkan profesi anda. (File : pdf, jpg, png).
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
                        <input type="password" class="form-control form-bordered" placeholder="Masukan password baru" id="password" name="frm_password" onblur="cekpassword()" required="">
                      </div><!-- .form-group -->
                    </div><!-- .col-sm-6 -->
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="position" class="form-label">Pertanyaan Keamanan</label>
                        <select name="frm_question" id="question" class="form-control form-bordered">
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
                        <input type="text" name="frm_answer" id="answer" class="form-control form-bordered" placeholder="Masukan jawaban" required="">
                      </div><!-- .form-group -->
                    </div><!-- .col-sm-6 -->
                  </div>
                </div>
                <div class="col-sm-12 marg-20-top">
                  <button type="submit" class="button btn-square">Daftar</button>
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

          function cekphone(){
            var notlp = document.getElementById('phone');
            if (!/^[0-9]+$/.test(notlp.value)) {
                notlp.value = notlp.value.substring(0,notlp.value.length-100);
              };
          }

    </script>