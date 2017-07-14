<?php 
  
  //cek data akun sdh lengkap belum
  $cek = mysql_query("SELECT member_name, member_address, member_image FROM tbl_member WHERE member_id='".$_SESSION['member_id']."' ");
  $n_cek = mysql_fetch_array($cek);
  if ($n_cek['member_address']=='') {
    echo "<script> alert('Mohon lengkapi data akun terlebih dahulu'); location.href='index.php?hal=settingakun';</script>  ";exit;
  }

?>


    <div id="process" class="process content-section bg-light">
      <div class="container">
        
        <div class="row">

          <div class="col-md-12">
            <div class="process-item highlight text-center">
              <div class="process-item-icon">
                  <h3><span class="fa fa-user-o"></span> Hallo <b><?php echo $n_cek['member_name']; ?></b> <img src="menejemen/upload/memberimage/<?php echo $_SESSION['member_image'] ?>" class="img-circle" style='width: 80px; height: 80px;'> Selamat Datang di Pelatihan Kursus Antropologi Forensik </h3>
                  <h3><span class="fa fa-gear fa"></span> Control Panel</h3>

               
              </div>
              <div class="process-item-content"> 
                 <div class="row">
                    <div class="col-md-3 col-sm-6">
                      <div class="process-item highlight text-center">
                        <div class="process-item-icon" style="padding-bottom:10px; ">
                          <span class="fa fa-user-o"></span>
                        </div>
                        <div class="process-item-content">
                         <a href="index.php?hal=settingakun"> <label>Pengaturan Akun</label> </a>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                      <div class="process-item highlight text-center">
                        <div class="process-item-icon" style="padding-bottom:10px; ">
                          <span class="fa fa-list"></span>
                        </div>
                        <div class="process-item-content"> 
                       <a href="index.php?hal=paketkursus/list"> <label>Paket Kursus</label></a>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                      <div class="process-item highlight text-center">
                        <div class="process-item-icon" style="padding-bottom:10px; ">
                          <span class="fa fa-calendar"></span>
                        </div>
                        <div class="process-item-content"> 
                       <a href="index.php?hal=member_jadwal"> <label>Jadwal</label></a>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                      <div class="process-item highlight text-center">
                        <div class="process-item-icon" style="padding-bottom:10px; ">
                          <span class="fa fa-book"></span>
                        </div>
                        <div class="process-item-content">
                        <a href="index.php?hal=donwloadmateri/list"><label>Download Materi</label> </a>
                        </div>
                      </div>
                    </div>

                      <div class="col-md-3 col-sm-6">
                      <div class="process-item highlight text-center">
                        <div class="process-item-icon" style="padding-bottom:10px; ">
                          <span class="fa fa-list"></span>
                        </div>
                        <div class="process-item-content"> 
                       <a href="index.php?hal=pembayaran/list"> <label>Transaksi Pembayaran</label></a>
                        </div>
                      </div>
                    </div>

                     <div class="col-md-3 col-sm-6">
                      <div class="process-item highlight text-center">
                        <div class="process-item-icon" style="padding-bottom:10px; ">
                          <span class="fa fa-check"></span>
                        </div>
                        <div class="process-item-content"> 
                       <a href="index.php?hal=member-nilai"> <label>Nilai</label></a>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                      <div class="process-item highlight text-center">
                        <div class="process-item-icon" style="padding-bottom:10px; ">
                          <span class="fa fa-desktop"></span>
                        </div>
                        <div class="process-item-content">
                        <a href="index.php?hal=exam/list"><label>Ujian </label> </a>
                        </div>
                      </div>
                    </div>

                     <div class="col-md-3 col-sm-6">
                      <div class="process-item highlight text-center">
                        <div class="process-item-icon" style="padding-bottom:10px; ">
                          <span class="fa fa-star"></span>
                        </div>
                        <div class="process-item-content">
                      <a href="index.php">  <label>Sertifikat </label> </a>
                        </div>
                      </div>
                    </div>


                 </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
