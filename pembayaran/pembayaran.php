   <?php 
    $INVOICE = $_GET['invoice'];
    $query = mysql_query("SELECT * FROM tbl_trainee t JOIN tbl_member m ON t.member_id_fk = m.member_id where  trainee_invoice='".$INVOICE."'");
    $rowP = mysql_fetch_array($query);

    ?>
    <?php 
    $queryCounts = mysql_query("SELECT sum(coursename_price) as  
                                  total FROM tblx_trainee_detail d JOIN tbl_trainee tn ON d.trainee_id_fk = tn.trainee_id JOIN ref_coursename c ON d.coursename_id_fk = c.coursename_id JOIN tbl_member m ON tn.member_id_fk = m.member_id where tn.trainee_invoice='".$INVOICE."'");
    $loan_arrayl = mysql_fetch_array($queryCounts);
    $totalPembayaranYangharus  = $loan_arrayl['total'];
    ?>

    <?php 
        // proses simpan pembayaran 
        if (isset($_POST['simpanPembayaran'])) {
            if (!empty($_FILES) && $_FILES['confirmation_proofpayment']['error'] == 0) {
              $fileName = $_FILES['confirmation_proofpayment']['name'];
              $move = move_uploaded_file($_FILES['confirmation_proofpayment']['tmp_name'], 'menejemen/upload/payment/'.$fileName);
             if ($move) {
                  $querySimpan  = "INSERT INTO  trx_confirmation_ofpayment (confirmation_category,trainee_id_fk,confirmation_date,confirmation_accountnumber,confirmation_proofpayment,input_date,amount_transfer,confirmation_status,confirmation_note,namebank,payment_date_valid,payment_valid,total_tagihan,catatan_pembayaran_konfirmasi)
             vALUES ('".$_POST['confirmation_category']."','".$_POST['trainee_id_fk']."',NOW(),'".$_POST['confirmation_accountnumber']."',
             '".$fileName."',NOW(),'".$_POST['amount_transfer']."','Y','".$_POST['confirmation_note']."','".$_POST['namebank']."','','MENUNGGU KONFIRMASI','".$totalPembayaranYangharus."','')";
              
             $queryUPdatePaket = "UPDATE tbl_trainee set trainee_invoice_status='MENUNGGU KONFIRMASI' where trainee_invoice='".$INVOICE."' ";

             $queryUPdatekurus_detail = "UPDATE  tblx_trainee_detail set trainee_status ='AKTIVE' where trainee_id_fk='".$rowP['trainee_id']."' ";
             
             $queryUpdateMember = "UPDATE tbl_member set member_status_active='active' where member_id='".$_SESSION['member_id']."' ";
             
             $runQuery = mysql_query($querySimpan);
             $runQueryUpdatePaket = mysql_query($queryUPdatePaket);
             $runUpdatedetail = mysql_query($queryUPdatekurus_detail);
             $runUpdateMember = mysql_query($queryUpdateMember);
             }
             if ($runUpdateMember) {
                   echo "<script> alert('Terimakasih Data Berhasil Disimpan'); location.href='index.php?hal=paketkursus/list' </script>";exit;
             }
            }
         
          

        }
     ?>
    <div id="process" class="process content-section bg-light">
      <div class="container">
        
        <div class="row">

          <div class="col-md-12">
            <div class="process-item highlight text-center">
              <div class="process-item-icon">
               <h1 class="process-item-title">
              <span class="fa fa-list"></span> SLIP PENAGIHAN INVOICE : <?php echo $INVOICE; ?>
               </h1>
           
              </div>
              <div class="process-item-content"> 
                 <div class="row well">
                  <form class="role" method="POST" enctype="multipart/form-data">
                  <div class="col-md-6">
                    
                      <div class="form-group row">
                        <label class="col-md-6">Invoice : </label>
                        <div class="col-md-6">
                          <input type="text" class="form-control" value="<?php echo $INVOICE; ?>" disabled>
                          <input type="hidden" name="trainee_id_fk" value="<?php echo $rowP['trainee_id']; ?>" >
                        </div>
                      </div>
                       <div class="form-group row">
                        <label class="col-md-6">Nama : </label>
                        <div class="col-md-6">
                          <input type="text" class="form-control" value="<?php echo $rowP['member_name']; ?>" disabled>
                        </div>
                      </div>
                       <div class="form-group row">
                        <label class="col-md-6">Jenis : </label>
                        <div class="col-md-6">
                          <select class="form-control" name="confirmation_category" required="required">
                            <option value="">Pilih Jenis Bayar</option>
                            <option value="Bayar Kursus">Pembayaran Kursus</option>
                            <option value="Bayar Remidi">Pembayaran Remidi</option>
                          </select>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-md-6">Nomor Rekening : </label>
                        <div class="col-md-6">
                         <input type="text" class="form-control" required="" name="confirmation_accountnumber">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-6">Nama Bank : </label>
                        <div class="col-md-6">
                         <input type="text" class="form-control" required="" name="namebank">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-6">Bukti Pembayaran: </label>
                        <div class="col-md-6">
                         <input type="file" class="form-control" required="" name="confirmation_proofpayment">
                        </div>
                      </div>
                      <div class="form-group row">
                         <label class="col-md-6">Tagihan Pembayaran: </label>
                          <div class="col-md-6">
                           <input type="text" disabled class="form-control" required=""  value="<?php echo $totalPembayaranYangharus; ?>">
                          </div>
                      </div>
                      <div class="form-group row">
                         <label class="col-md-6">Jumlah Transfer: </label>
                          <div class="col-md-6">
                           <input type="text"  class="form-control" id="countf" onkeyup="cekcount()" required="" name="amount_transfer">
                          </div>
                      </div>
                      <div class="form-group row">
                         <label class="col-md-6">Catatan: </label>
                          <div class="col-md-6">
                           <textarea class="form-control" name="confirmation_note" required=""></textarea>
                          </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6">
                         <button type="submit" name="simpanPembayaran" class="btn btn-success btn-block"><span class="fa fa-save"> SIMPAN</span></button>
                        </div>
                      </div>
                  </div>
                  </form>
                </div> 
               <div class="row">
                <div class="col-md-2"><a href="index.php?hal=paket" class="btn btn-success"><span class="fa fa-arrow-left"></span> Kembali</a></div>
                <div class="col-md-8"></div>
                <div class="col-md-2"><button type="submit" name="simpan" class="btn btn-success"><span class="fa fa-save"></span> Cetak</button></div>
              </div>
              <br>
              <table class="table table-resposive table-hover table-bordered">
                <thead>
                  <th>No</th>
                  <th>Nama Kursus</th>
                  <th>Kuota</th>
                  <th>Harga Paket</th>
                  <th>Status</th>
                  
                </thead>
                <tbody>
                <?php 
                  $no=0;
                  $sqlSlipPembayaran  = mysql_query("SELECT * FROM tblx_trainee_detail d JOIN tbl_trainee tn ON d.trainee_id_fk = tn.trainee_id JOIN ref_coursename c ON d.coursename_id_fk = c.coursename_id JOIN tbl_member m ON tn.member_id_fk = m.member_id where tn.trainee_invoice='".$INVOICE."' ");

                  while ($rowpembayaran_preview = mysql_fetch_array($sqlSlipPembayaran)) {
                 ?>
                  <tr>
                    <td><?php echo ++$no; ?></td>
                    <td>
                      <?php 
                          echo "<input type='hidden' name='coursename_id_fk[]' value='".$rowpembayaran_preview['coursename_id_fk']."'>";
                       ?>
                      <?php echo $rowpembayaran_preview['coursename_title']; ?></td>
                    <td><?php echo $rowpembayaran_preview['coursename_quota']; ?></td>
                    <td><?php echo $rowpembayaran_preview['coursename_price']; ?></td>
                    <td><?php echo $rowpembayaran_preview['coursename_status']; ?></td>
                   
                  </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="3"><h3 align="right">Total Pembayaran :</h3></td>
                    <?php 
                        $queryCount = mysql_query("SELECT sum(coursename_price) as  
                                                      total FROM tblx_trainee_detail d JOIN tbl_trainee tn ON d.trainee_id_fk = tn.trainee_id JOIN ref_coursename c ON d.coursename_id_fk = c.coursename_id JOIN tbl_member m ON tn.member_id_fk = m.member_id where tn.trainee_invoice='".$INVOICE."'");
                        $loan_array = mysql_fetch_array($queryCount);
                        $totalPembayaran  = $loan_array['total'];
                     ?>
                    <td><h3 align="left">Rp. <?php echo $totalPembayaran; ?></h3> </td>
                  </tr>
                  <tr>
                    <td colspan="5">
                      <h6><i>*jika pembayaran tidak dilakukan selama -+ 4 jam maka pendaftaran paket kursus akan di batalkan</i></h6>
                    </td>
                  </tr>
                </tfoot>

              </table>

              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>

<!-- js untuk biar tidak bisa diinputkan angka -->
<script type="text/javascript">
  function cekcount(){
            var jmltf = document.getElementById('countf');
            if (!/^[0-9]+$/.test(jmltf.value)) {
                jmltf.value = jmltf.value.substring(0,jmltf.value.length-100);
              };
          }
</script>