<?php 
	
	//ini file utk ngecek menu apa saja yg harus segera diproses. intine ngecek siji2
		$nKonfirmasi = 0;
		$nRegistrasi = 0;
		$nSaldo = 0;
		// $nKonfirmasi = 0;
	// ===== KONFIRMASI PEMBAYARAN ==== //
		$queryKonfirmasi=mysql_query("SELECT * from trx_confirmation_ofpayment WHERE payment_valid='MENUNGGU KONFIRMASI'");
		$cqK = mysql_num_rows($queryKonfirmasi);
		if ($cqK>0) { 
			$nKonfirmasi = $cqK;
		} 
	// ===== KONFIRMASI PEMBAYARAN ==== //

	// ===== REGISTRASI MEMBER ==== //
		$queryRegistrasi=mysql_query("SELECT * from tbl_member WHERE member_status_active='pending'");
		$cqR = mysql_num_rows($queryRegistrasi);
		if ($cqR>0) { 
			$nRegistrasi = $cqR;
		} 
	// ===== REGISTRASI MEMBER ==== //		

	// ===== KONFIRMASI SALDO ==== //
		$querySaldo=mysql_query("SELECT * from trx_saldo WHERE saldo_status='Deposit'");
		$cqS = mysql_num_rows($querySaldo);
		if ($cqS>0) { 
			$nSaldo = $cqS;
		} 
	// ===== KONFIRMASI SALDO ==== //	

?>