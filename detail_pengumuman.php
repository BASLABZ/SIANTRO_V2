 <?php 
  $id = $_GET['id_pengumuman'];
  $querypengumuman  = mysql_query("SELECT * FROM ref_announcement a JOIN ref_operator o ON a.operator_id_fk=o.operator_id where a.announcement_id = '".$id."'");
  $detail = mysql_fetch_array($querypengumuman);
  ?>
 <div id="process" class="process content-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-12">
            <div class="process-item highlight text-center">
              <img src="menejemen/upload/announcement/<?php echo $detail['announcement_image']; ?>" style="width: 556px; height: 302px;">
              <div class="process-item-content">
                <span class="process-item-number"><span class="fa fa-picture-o"></span></span>
                <h3 class="process-item-title"><?php echo $detail['announcement_judul']; ?></h3>
                <p><span class="fa fa-calendar"></span> <?php echo $detail['announcement_dateofposted']; ?> <span class="fa fa-user"></span> 
                    <?php echo $detail['operator_name']; ?>
                </p>
               <p>
                 <?php echo $detail['announcement_description']; ?>
               </p>
              </div><!-- .process-item-content -->
            </div><!-- .process-item -->
          </div>
         
        </div><!-- .row -->
      </div><!-- .container -->
    </div><!-- #process -->