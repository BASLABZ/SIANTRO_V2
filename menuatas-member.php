
    <!-- begin:header -->
    <div style="background-color: #26ad5f;">
      <div id="topbar" class="topbar">
        <div class="container">
          <div class="row">
            <div class="col-sm-6">
              <div class="nav-utility">
                <span class="nav-item">Jl. Medika, Sekip Utara, YK</span>
                <span class="nav-item">+62 274 552577</span>
                <span class="nav-item">lab-biopaleo.fk@ugm.ac.id</span>
              </div>
            </div>
            <div class="col-sm-6 hidden-xs">
              <div class="nav-utility nav-right">
              <?php 
                  if (isset($_SESSION['member_id'])) {?>
                
                <?php 
                  $queryDataBooking  = mysql_query("SELECT * FROM tbl_temp where member_id_fk ='".$_SESSION['member_id']."'");
                  $cekBooking  = mysql_num_rows($queryDataBooking);
                  
                  if ($cekBooking > 0) {
                    echo "<a href='index.php?hal=booking' class='nav-item btn btn-default'><span class='fa fa-shopping-cart '></span> Data Booking Anda</a>";
                  }
                  ?> 
                  <a class="nav-item btn btn-default" href="index.php?hal=settingakun"><i class="fa fa-gear"></i> Pengaturan Profil</a>   
                
                    <a class="nav-item btn btn-default" href="index.php?logout=1"><i class="fa fa-sign-out"></i> Keluar</a>           
                <?php } else{ ?>
                  <a class="nav-item btn btn-default" href="index.php?hal=login"><i class="fa fa-lock"></i> Masuk</a> 
                  <a class="nav-item btn btn-default" href="index.php?hal=register"><i class="fa fa-user"></i> Daftar</a>      
              <?php } ?>
                
             
              </div><!-- .nav-utility -->
            </div><!-- .col-sm-4 -->

          </div><!-- .row -->
        </div><!-- .container -->
      </div><!-- .topbar -->
      <div class="site-header-affix-wrapper">
        <header id="masthead" class="site-header" role="banner">
          <div class="container">
            <div class="row">
              <div class="col-sm-3">
                <div class="site-branding">
                  <h1 class="site-title"><a href="index.php" rel="home">Antro.</a></h1>
                </div><!-- .site-branding -->
              </div><!-- .col-sm-3 -->

              <div class="col-sm-9">
                <nav id="site-navigation" class="main-navigation" role="navigation">
                  <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><span class="pe-7s-menu"></span><span class="sr-only">Primary Menu</span></button>

                  <div class="menu-testing-menu-container">
                    <ul id="primary-menu" class="menu nav-menu" aria-expanded="false">
                      <li class="menu-item"><a href="index.php">Beranda</a></li>
                      <li class="menu-item"><a href="index.php?hal=pengumuman">Pengumuman</a></li>
                      <li class="menu-item"><a href="index.php?hal=paket">Paket Kursus</a></li>
                      <li class="menu-item"><a href="index.php?hal=prosedur">Prosedur</a></li>
                      <li class="menu-item"><a href="index.php?hal=tentang">Tentang</a></li>
                      <li class="menu-item"><a href="index.php?hal=kontak">Kontak</a></li>
                      <!-- <li class="menu-item"><a href="index.php?hal=role-myteam">ATURAN CODING / JOB DESC</a></li> -->
                      <?php 
                        if (isset($_SESSION['member_id'])) {
                       ?>
                      <li class="menu-item"><a href="index.php?hal=control-panel"><span class="fa fa-gear"></span> CONTROL PANEL</a></li>
                      <?php } ?>
                    </ul>
                  </div>
                </nav><!-- #site-navigation -->
              </div><!-- .col-sm-9 -->
            </div><!-- .row -->
          </div><!-- .container -->
        </header><!-- #masthead -->
      </div><!-- .site-header-affix-wrapper -->
    </div><!-- #header -->
    <!-- end:header -->
