   <?php 
    $INVOICE = $_GET['invoice'];
    $querydetail_paket = mysql_query("SELECT * FROM tblx_trainee_detail d JOIN tbl_trainee tn ON d.trainee_id_fk = tn.trainee_id JOIN ref_coursename c ON d.coursename_id_fk = c.coursename_id JOIN tbl_member m ON tn.member_id_fk = m.member_id where tn.trainee_invoice='".$INVOICE."'");
    $detail_paket = mysql_fetch_array($querydetail_paket);
    ?>
    <div id="process" class="process content-section bg-light">
      <div class="container">
        
        <div class="row">
        <div class="col-md-12">
           <div class="panel-group" id="accordion">
                   <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                          <h1><span class="fa fa-list"></span> Control Panel</h1></a>
                   <div id="collapse3" class="panel-collapse collapse">
                       <div class="container">
                         <div class="row">
                           <div class="col-md-12">
                             <?php include 'control-panel.php'; ?>
                           </div>
                         </div>
                       </div>
                      </div>
                  </div>
        </div>
          <div class="col-md-12">
            <div class="process-item highlight text-center">
              <div class="process-item-icon">
               <h1 class="process-item-title">
              <span class="fa fa-list"></span> PAKET BERDASARKAN INVOICE : <?php echo $INVOICE;  ?> NAMA KURSUS : <?php echo $detail_paket['coursename_title']; ?>
               </h1>
           
              </div>
              <div class="process-item-content"> 
                    
                   <div class="row">
                <div class="col-md-2"><a href="index.php?hal=paketkursus/list" class="btn btn-success"><span class="fa fa-arrow-left"></span> Kembali</a></div>
                <div class="col-md-8"></div>
              </div>
              <br>
                <div class="form-group row">
                  <div class="col-md-4"><label>Nama Kursus :</label></div>
                  <div class="col-md-6"><label><?php echo $detail_paket['coursename_title']; ?></label></div>
                </div>
                <div class="form-group row">
                  <div class="col-md-4"><label>Tanggal Daftar :</label></div>
                  <div class="col-md-6"><label><?php echo $detail_paket['trainee_inputdate']; ?></label></div>
                </div>
                <div class="form-group row">
                  <div class="col-md-4"><label>Harga Kursus :</label></div>
                  <div class="col-md-6"><label>Rp. <?php echo $detail_paket['coursename_price']; ?></label></div>
                </div>
                 <div class="form-group row">
                  <div class="col-md-4"><label>Nama Kursus :</label></div>
                  <div class="col-md-6"><label><?php echo $detail_paket['trainee_invoice_status']; ?></label></div>
                </div>
                <div class="form-group row">
                  <div class="col-md-4"><label>Deskripsi Kursus :</label></div>
                  <div class="col-md-6">
                  <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                          Baca Deskripsi</a>
                        </h4>
                      </div>
                      <div id="collapse2" class="panel-collapse collapse">
                        <div class="panel-body"><?php echo $detail_paket['coursename_info']; ?></div>
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
      </div>
    </div>
