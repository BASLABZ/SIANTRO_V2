  <section class="content-header">
      <h1>
         Konfirmasi Saldo 
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Transaksi</a></li>
        <li class="active">Konfirmasi Saldo</li>
      </ol>
  </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Data Transaksi Saldo</h3>
            </div>
            <div class="box-body dataTables_scrollBody">
              <table id="tableMasterScroll" class="table table-bordered table-hover">
               <thead>
                  <th>No</th>
                  <th>Tanggal Saldo Masuk</th>
                  <th>Nama Peserta</th>
                  <th>Jumlah Total Saldo</th>
                  <th>Status Saldo</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
                </thead>
                <tbody>
                  <?php 
                      $no =0;
                      $querySaldo = mysql_query("SELECT * FROM trx_saldo 
                                        LEFT JOIN trx_confirmation_ofpayment
                                        ON trx_confirmation_ofpayment.confirmation_id=
                                        trx_saldo.confirmation_id_fk
                                        LEFT JOIN tbl_trainee
                                        ON tbl_trainee.trainee_id=trx_confirmation_ofpayment.trainee_id_fk
                                        LEFT JOIN tbl_member 
                                        ON tbl_trainee.member_id_fk=tbl_member.member_id
                                        LEFT JOIN tblx_trainee_detail
                                        ON tblx_trainee_detail.trainee_id_fk=tbl_trainee.trainee_id
                                        LEFT JOIN ref_coursename
                                        ON ref_coursename.coursename_id=tblx_trainee_detail.coursename_id_fk
                                        ORDER BY tbl_trainee.member_id_fk"); 
                      while ($roSaldo = mysql_fetch_array($querySaldo)) {
                   ?>
                   <?php 
                        // $queryCount = mysql_query("SELECT sum(coursename_price) as  
                        //                               total FROM tblx_trainee_detail d JOIN tbl_trainee tn ON d.trainee_id_fk = tn.trainee_id JOIN ref_coursename c ON d.coursename_id_fk = c.coursename_id JOIN tbl_member m ON tn.member_id_fk = m.member_id where tn.trainee_invoice='".$roPembayaran['trainee_invoice']."'");
                        // $loan_array = mysql_fetch_array($queryCount);
                        // $totalPembayaran  = $loan_array['total'];
                     ?>
                   <tr>
                     <td><?php echo ++$no; ?></td>
                     <td><?php echo $roSaldo['saldo_date']; ?></td>
                     <td><?php echo $roSaldo['member_name']; ?></td>
                     <td><?php echo "Rp.".number_format($roSaldo['saldo_total'],2,",","."); ?></td>
                     <td><button class="btn btn-sm btn-primary"><?php echo $roSaldo['saldo_status']; ?></button></td>
                     <td><?php echo "Kelebihan ".$roSaldo['confirmation_category']." ".$roSaldo['coursename_title']; ?></td>
                     <td>
                        <a href="index.php?hal=pembayaran/verifikasi_pembayaran&id=<?php //echo $roPembayaran['confirmation_id']; ?>" class="btn btn-success"><span class="fa fa-pencil"></span> Lihat Detail</a>
                     
                      </td>
                   </tr>
                   <?php }//tutup while 
                    ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>