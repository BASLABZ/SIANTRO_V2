<?php 
		$id = $_GET['id'];
		$query = mysql_query("SELECT * FROM  trx_confirmation_ofpayment t  join tbl_trainee tn on t.trainee_id_fk = tn.trainee_id where t.confirmation_id = '".$id."'");
		$detail = mysql_fetch_array($query);
        $idmember = $detail['member_id_fk'];
        $querymember = mysql_query("SELECT * from tbl_member where member_id = '".$idmember."'");
        $runmember = mysql_fetch_array($querymember);
        $email = $runmember['member_useremail'];


		if (isset($_POST['ubahstatus'])) {
			if ($_POST['payment_valid']=='VALID' OR $_POST['payment_valid']=='MENUNGGU KONFIRMASI') {
				$query_valid = mysql_query("UPDATE trx_confirmation_ofpayment set payment_valid='".$_POST['payment_valid']."' , payment_date_valid = NOW(),
											catatan_pembayaran_konfirmasi='' where confirmation_id='".$id."'");
                $qv1 = mysql_fetch_array(mysql_query("SELECT trainee_id_fk FROM trx_confirmation_ofpayment WHERE confirmation_id='".$id."' "));  

                $query_valid = mysql_query("UPDATE tbl_trainee set trainee_invoice_status='".$_POST['payment_valid']."', trainee_inputdateconfirm= NOW() where trainee_id='".$qv1['trainee_id_fk']."'");


                    //validasi saldo
                    if ($detail['amount_transfer']>$detail['total_tagihan']) {
                        //masukan ke saldo
                        $var_sisa = $detail['amount_transfer']-$detail['total_tagihan'];
                        $q_save = mysql_query("INSERT INTO trx_saldo(
                                                                    saldo_id,
                                                                    confirmation_id_fk,
                                                                    saldo_total,
                                                                    saldo_date,
                                                                    saldo_status)
                                                            VALUES(
                                                                    '',
                                                                    '".$id."',
                                                                    '".$var_sisa."',
                                                                    '".date('Y-m-d')."',
                                                                    'Deposit'
                                                                    )"); 
                    }     

			   if ($query_valid) {
		            echo "<script> alert('STATUS BERHASIL DIUBAH'); location.href='SENDEMAIL/sendEmailDebug.php?id=".$id."&email=".$email."' </script>";exit;

		       }
			}else if ($_POST['payment_valid']=='TIDAK VALID') {
				$query_not_valid = mysql_query("UPDATE trx_confirmation_ofpayment set payment_valid='".$_POST['payment_valid']."',  payment_date_valid = NOW(),
											catatan_pembayaran_konfirmasi='".$_POST['catatan_pembayaran_konfirmasi']."' where confirmation_id='".$id."'");
                // BIKIN QUERY UNTUK UPDATE 3 TABEL SEKALIGUS UNTUK MERUBAH STATUS PEMBAYARAN UNTUK SISI MEMBER JUGA ITU DIATAS BARU SATU TABEL TOK MAKANYA PAS FRONT END STAUS NGGA BERUBAH WALAU DI UPDATE SISI ADMIN
                $q_notv1 = mysql_fetch_array(mysql_query("SELECT trainee_id_fk FROM trx_confirmation_ofpayment WHERE confirmation_id='".$id."' "));  

                $query_notvalid = mysql_query("UPDATE tbl_trainee set trainee_invoice_status='".$_POST['payment_valid']."', trainee_inputdateconfirm= NOW() where trainee_id='".$q_notv1['trainee_id_fk']."'");
                // bener begini kah ? marikita cobaaa :)))))))))


			   if ($query_notvalid) {
		            echo "<script> alert('STATUS BERHASIL DIUBAH'); location.href='index.php?hal=pembayaran/verifikasi_pembayaran&id=".$id."' </script>";exit;
		       } 	
			}
			
		}

 ?>
  <section class="content-header">
      <h1>Verfikasi Pembayaran</h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="index.php?hal=pembayaran/pembayaran">Pembayaran</a></li>
        <li class="active">Verifikasi Pembayaran</li>
      </ol>
  </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Verifikasi Pembayaran</h3>
            </div>
            <div class="box-body">
             <div class="col-md-12">
             	<div class="form-group row">
             		<label class="col-md-6">TANGGAL PEMBAYARAN</label>
             		<label class="col-md-6"><?php echo $detail['confirmation_date']; ?></label>
             	</div>
                <div class="form-group row">
                    <label class="col-md-6">NAMA MEMBER</label>
                    <label class="col-md-6"><?php echo $runmember['member_name']; ?></label>
                </div>
             	<div class="form-group row">
             		<label class="col-md-6">NO REKENING</label>
             		<label class="col-md-6"><?php echo $detail['confirmation_accountnumber']; ?></label>
             	</div>
             	<div class="form-group row">
             		<label class="col-md-6">NAMA BANK</label>
             		<label class="col-md-6"><?php echo $detail['namebank']; ?></label>
             	</div>
             	<div class="form-group row">
             		<label class="col-md-6">KATEGORI PEMBAYARAN</label>
             		<label class="col-md-6"><?php echo $detail['confirmation_category']; ?></label>
             	</div>
             	<div class="form-group row">
             		<label class="col-md-6">SLIP PEMBAYARAN</label>
             		<label class="col-md-6"><img class="img-thumbnail img-responsive" src="../upload/payment/<?php echo $detail['confirmation_proofpayment']; ?>"></label>
             	</div>
             	<div class="form-group row">
             		<label class="col-md-6">TOTAL TAGIHAN PEMBAYARAN</label>
             		<label class="col-md-6"><?php echo $detail['total_tagihan']; ?></label>
             	</div>
             	<div class="form-group row">
             		<label class="col-md-6">JUMLAH YANG DIBAYAR</label>
             		<label class="col-md-6"><?php echo $detail['amount_transfer']; ?></label>
             	</div>
             	<div class="form-group row"> 
             		<form class="role" method="POST">
             			<label class="col-md-6">VERIFIKASI STATUS</label>
	             		<label class="col-md-6">
	             			<select class="form-control" name="payment_valid" id="payment">
	             					<option value=""
                                                <?php if($detail['payment_valid']=='MENUNGGU KONFIRMASI'){echo "selected=selected";}?>>MENUNGGU KONFIRMASI
                                            </option>
								<option value="VALID"
                                                <?php if($detail['payment_valid']=='VALID'){echo "selected=selected";}?>>VALID
                                            </option>
                                            <option value="TIDAK VALID"
                                                <?php if($detail['payment_valid']=='TIDAK VALID'){echo "selected=selected";}?>>TIDAK VALID
                                            </option>
	             			</select>
	             		</label>
	             		<div class="col-md-12" id="catatan_pembayaran_konfirmasi" hidden>
	             			<label>Alasan Tidak Valid</label>
	             			<textarea class="form-control" name="catatan_pembayaran_konfirmasi" >
	             			</textarea>
	             		</div>
	             			
	             		<div class="col-md-12">
	             			<button type="submit" name="ubahstatus" class="btn btn-success pull-right">UBAH STATUS</button>
	             		</div>
             		</form>
             	</div>
             	
             	
             </div>
            </div>
          </div>
        </div>
      </div>
    </section>
   