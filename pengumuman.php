
            <!-- prosedur -->
    <div id="process" class="process content-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 marg-60-btm">
            <h2 class="text-big text-center text-uppercase"><span class="fa fa-calendar"></span> Berita Kami</h2>
            <hr>
          </div><!-- .col-## -->
        </div><!-- .row -->
        <div class="row">
        <?php 
            $sqlpengumuman  = mysql_query("SELECT * FROM ref_announcement order by announcement_id DESC");
            while ($rowberita  = mysql_fetch_array($sqlpengumuman)) {
         ?>
          <div class="col-md-6 col-sm-6">
            <div class="process-item highlight text-center">
              <img src="menejemen/upload/announcement/<?php echo $rowberita['announcement_image']; ?>" style="width: 556px; height: 302px;">
              <div class="process-item-content">
                <span class="process-item-number"><span class="fa fa-picture-o"></span></span>
                <h3 class="process-item-title"><?php echo $rowberita['announcement_judul']; ?></h3>
                <a href="index.php?hal=detail_pengumuman&id_pengumuman=<?php echo $rowberita['announcement_id']; ?>" class="btn btn-success"><span class="fa fa-eye"></span> Baca Pengumuman</a>
              </div><!-- .process-item-content -->
            </div><!-- .process-item -->
          </div>
         <?php } ?>
        </div><!-- .row -->
      </div><!-- .container -->
    </div><!-- #process -->
    <!-- end:process -->
