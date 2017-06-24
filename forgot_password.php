<!-- function for login system -->
<?php 
       if (isset($_POST['forgot_password'])) {
           $email  = $_POST['email'];
           $pertanyaan_keamanan = $_POST['frm_question'];
           $jawaban  = $_POST['frm_answer'];

           $query_cek_email = mysql_query("SELECT * FROM tbl_member where member_useremail = '".$email."' AND member_hint_question = '".$pertanyaan_keamanan."' AND member_answer_question = '".$jawaban."'");
           $cek_valid_akun = mysql_fetch_array($query_cek_email);
           $new_pass = 'n3w_4kun '.$cek_valid_akun['member_id'].'';
           $encryp = md5($new_pass);


           if ($email == $cek_valid_akun['member_useremail'] AND $pertanyaan_keamanan == $cek_valid_akun['member_hint_question'] AND $jawaban == $cek_valid_akun['member_answer_question']) {
                $update_new_password = mysql_query("UPDATE tbl_member set member_password = '".$encryp."' where member_id = '".$cek_valid_akun['member_id']."'");
               echo "<script> alert('Password Anda Berhasil Di reset dan cek email untuk melihat password baru anda!.'); location.href='SENDEMAIL/forgot_password.php?email=".$email."&new_pass=".$new_pass."' </script>";exit;
           }else{
            echo "data salah";
           }

       }
 ?>
    <div id="signin" class="signin content-section bg-grey">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <h2 class="text-big text-center marg-40-btm">Lupa Kata Sandi ? <span class="pe-7s-key"></span></h2>
            <form class="contact-form" method="POST">
              <div class="form-group">
                <label for="username">Email</label>
                <input type="text" class="form-control form-bordered" placeholder="Masukkan email" id="username" name="email">
              </div>
              <div class="form-group">
                <label for="username">Pertanyaan Keamanan</label>
                <select name="frm_question" id="question" class="form-control form-bordered">
                  <option>Siapa nama gadis ibu kandung anda?</option>
                  <option>Di kota manakah anda dilahirkan?</option>
                  <option>Apa nama sekolah dasar anda?</option>
                  <option>Siapa nama panggilan anda ketika kecil?</option>
                </select>
              </div>
              <div class="form-group">
                <label for="position" class="form-label">Jawaban Keamanan</label>
                <input type="text" name="frm_answer" id="answer" class="form-control form-bordered" placeholder="Masukan jawaban" required="">
              </div>
              <button type="submit" name="forgot_password" class="button btn-square">Bantuan Login</button>
              <br><br><p class="text-center"><small>Belum punya akun ? <a href="index.php?hal=register">Daftar Sekarang !</a> | <a href="index.php?hal=login">Login Sistem</a></small></p>
            </form>
          </div>
        </div><!-- .row -->
      </div><!-- .container -->
    </div><!-- #signin -->