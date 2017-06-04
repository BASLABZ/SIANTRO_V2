  <section class="content-header">
      <h1>
         Pembayaran
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Transaksi</a></li>
        <li class="active">Pembayaran</li>
      </ol>
  </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Data Transaksi  Pembayaran</h3>
            </div>
            <div class="box-body dataTables_scrollBody">
              <table id="tableMasterScroll" class="table table-bordered table-hover">
               <thead>
                  <th>No</th>
                  <th>Invoice</th>
                  <th>Tanggal Input</th>
                  <th>Tanggal Konfrimasi</th>
                  <th>Status</th>
                  <th>Nama Kursus</th>
                  <th>No Rekening</th>
                  <th>Nama Bank</th>
                  <th>Tagihan</th>
                  <th>Jumlah Bayar</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
                </thead>
                <tbody>
                  <?php 
                      $no =0;
                      $queryPembayaran = mysql_query("SELECT * FROM trx_confirmation_ofpayment pay JOIN  tbl_trainee t on pay.trainee_id_fk = t.trainee_id
                        JOIN tblx_trainee_detail tx ON
                        t.trainee_id = tx.trainee_id_fk JOIN 
                          ref_coursename c ON
                        c.coursename_id = tx.coursename_id_fk
                       JOIN tbl_member m ON t.member_id_fk = m.member_id order by confirmation_id DESC");
                      while ($roPembayaran = mysql_fetch_array($queryPembayaran)) {
                   ?>
                   <?php 
                        $queryCount = mysql_query("SELECT sum(coursename_price) as  
                                                      total FROM tblx_trainee_detail d JOIN tbl_trainee tn ON d.trainee_id_fk = tn.trainee_id JOIN ref_coursename c ON d.coursename_id_fk = c.coursename_id JOIN tbl_member m ON tn.member_id_fk = m.member_id where tn.trainee_invoice='".$roPembayaran['trainee_invoice']."'");
                        $loan_array = mysql_fetch_array($queryCount);
                        $totalPembayaran  = $loan_array['total'];
                     ?>
                   <tr>
                     <td><?php echo ++$no; ?></td>
                     <td><?php echo $roPembayaran['trainee_invoice']; ?></td>
                     <td><?php echo $roPembayaran['input_date']; ?></td>
                     <td><?php echo $roPembayaran['confirmation_date']; ?></td>
                     <td><?php echo $roPembayaran['payment_valid']; ?></td>
                     <td><?php echo $roPembayaran['coursename_title']; ?></td>
                     <td><?php echo $roPembayaran['confirmation_accountnumber']; ?></td>
                     <td><?php echo $roPembayaran['namebank']; ?></td>
                     <td><?php echo $totalPembayaran; ?></td>
                     <td><?php echo $roPembayaran['amount_transfer']; ?></td>
                     <td><?php echo $roPembayaran['confirmation_note']; ?></td>
                     <td>
                     <?php 
                          if($roPembayaran['payment_valid']=='VALID'){ ?>
                            <a href="index.php?hal=pembayaran/verifikasi_pembayaran&id=<?php echo $roPembayaran['confirmation_id']; ?>" class="btn btn-small btn-primary"><span class="fa fa-pencil"></span> Terverifikasi</a>
                     <?php
                          } else{?>
                            <a href="index.php?hal=pembayaran/verifikasi_pembayaran&id=<?php echo $roPembayaran['confirmation_id']; ?>" class="btn btn-success"><span class="fa fa-pencil"></span> Verifikasi</a>
                      <?php } ?>
                      </td>
                   </tr>
                   <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>