
    <div id="process" class="process content-section bg-light">
      <div class="container">
        
        <div class="row">

          <div class="col-md-12">
            <div class="process-item highlight text-center">
              <div class="process-item-icon">
               <h1 class="process-item-title">
              <span class="fa fa-file"></span>DAFTAR TRANSAKSI PEMBAYARAN / HISTORI : 
               </h1>
           
              </div>
              <div class="process-item-content"> 
              <p align="right"><a href="" class="btn btn-success btn-lg"><span class="fa fa-print"></span> Cetak Histori pembayaran</a></p>
              <table class="table table-resposive table-hover table-bordered">
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
                  <th>Keterangan Dari Aadmin</th>
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
                       JOIN tbl_member m ON t.member_id_fk = m.member_id where m.member_id = '".$_SESSION['member_id']."'");
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
                     <td><?php echo $roPembayaran['catatan_pembayaran_konfirmasi']; ?></td>
                     <td><a href="" class="btn btn-info"><span class="fa fa-print"></span> Cetak</a></td>
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
  
