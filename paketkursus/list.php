
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
              <span class="fa fa-list"></span>DAFTAR PAKET KURSUS :
               </h1>
           
              </div>
              <div class="process-item-content"> 

              <table class="table table-resposive table-hover table-bordered">
                <thead>
                  <th><center>No</center></th>
                  <th><center>Invoice</center></th>
                  <th><center>Tanggal Input</center></th>
                  <th><center>Nama Kursus</center></th>
                  <th><center>Status</center></th>
                  <th><center>Keterangan</center></th>
                  <th><center>Aksi</center></th>
                </thead>
                <tbody>
                <?php 
                if (isset($_GET['hapus'])) {
                $queryHapus  = mysql_query("DELETE FROM tbl_trainee where trainee_id='".$_GET['hapus']."'");
                  }
                  // query yang beneeer ///////////////////////////
                  $no=0;
                  $sqlpaketkursus  = mysql_query("SELECT 
                `trainee_id`,
                `trainee_invoice`,
                `trainee_inputdate`,
                `coursename_title`,
                `trainee_invoice_status`,
                `catatan_pembayaran_konfirmasi`,
                `trainee_invoice_status`
                 
                FROM tbl_trainee
                LEFT JOIN `tblx_trainee_detail`
                  ON `tblx_trainee_detail`.`trainee_id_fk`=tbl_trainee.`trainee_id`
                LEFT JOIN `ref_coursename`
                  ON `ref_coursename`.`coursename_id`=`tblx_trainee_detail`.`coursename_id_fk`
                LEFT JOIN `trx_confirmation_ofpayment`
                  ON `trx_confirmation_ofpayment`.`trainee_id_fk`=`tbl_trainee`.`trainee_id`

                WHERE member_id_fk='".$_SESSION['member_id']."'");

                  while ($paketkursus = mysql_fetch_array($sqlpaketkursus)) {
                 ?>
                 <tr>
                          <td><?php echo ++$no; ?></td>
                          <td><?php echo $paketkursus['trainee_invoice']; ?></td>
                          <td><?php echo $paketkursus['trainee_inputdate']; ?></td>
                          <td><?php echo $paketkursus['coursename_title']; ?></td>
                          <td><?php echo $paketkursus['trainee_invoice_status']; ?> </td>
                          <td><?php echo $paketkursus['catatan_pembayaran_konfirmasi']; ?> </td>
                          <td>
                            
                            <?php if ($paketkursus['trainee_invoice_status']=='PENDING' || $paketkursus['trainee_invoice_status']=='TIDAK VALID') {?>
                               <a href="index.php?hal=paketkursus/detail_paket&invoice=<?php echo $paketkursus['trainee_invoice']; ?>" class="btn btn-sm btn-warning"><span class="fa fa-eye"></span> Lihat Data</a> <?php
                              echo " <a href='index.php?hal=pembayaran/pembayaran&invoice=".$paketkursus['trainee_invoice']."' class='btn btn-sm btn-success'><span class='fa fa-money'></span> Bayar</a>";?>
                              <!-- hapusssss -->
                              <a href='index.php?hal=paketkursus/list&hapus=<?php echo $paketkursus['trainee_id']; ?>' class='btn btn-sm btn-danger btn-flat'><span class='fa fa-trash'></span> Batal Bayar</a> <?php

                            }else {  ?>
                             <a href="index.php?hal=paketkursus/detail_paket&invoice=<?php echo $paketkursus['trainee_invoice']; ?>" class="btn btn-warning"><span class="fa fa-eye"></span> Lihat Data</a>
                           <?php
                             }

                            ?>
                           </td>
                      </tr>
                  
                  <?php } ?>
                </tbody>
              </table>
                
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  
