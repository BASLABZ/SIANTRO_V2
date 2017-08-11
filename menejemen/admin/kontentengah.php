    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <section class="content">
      
        <div class="row">
        <div class="col-md-12">
      <div class="callout callout-success">
        <h3>Selamat Datang Di Pelatihan Kursus ANTROPOLOGI FORENSIK UGM</h3>
        <h3>Anda Login sebagai : <?php 
                                      // session_start();
                                       echo $_SESSION['level_name'];   ?></h3>

        <p>Anda berada di adminarea Kursus Antropologi Forensik Fakultas Kedokteran Universitas Gadjah Mada. <br/>Selamat Belajar dan Mengajar :)</p>
      </div>
    </div>
      
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Skor Ujian</span>
              <span class="info-box-number"><a href="index.php?hal=skor/list" style="color: white;">Daftar Skor</a></span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Likes</span>
              <span class="info-box-number">41,410</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fa fa-calendar"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Jadwal Kursus</span>
              <span class="info-box-number"><a href="index.php?hal=penjadwalan/list" style="color: white;">Data Jadwal Kursus</a></span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fa fa-file-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">UJIAN PESERTA</span>
              <span class="info-box-number"><a href="index.php?hal=soalujian/list" style="color: white;">Setting Ujian</a> </span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    Setting Ujian Hari Ini
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div> 
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
    </section>