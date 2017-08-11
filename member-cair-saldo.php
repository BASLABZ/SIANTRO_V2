<?php 
	
	//validasi password
	$q_member = mysql_query("SELECT * FROM tbl_member WHERE member_id='".$_POST['frm_memberid']."' ");
	$d_member = mysql_fetch_array($q_member);

	if ((md5($_POST['frm_pass']))!=$d_member['member_password']) {
		echo "<script> alert('Maaf password yang anda inputkan tidak cocok, mohon cek kembali data anda'); location.href='index.php?hal=control-panel' </script>";exit;;

	} else {

		$q_saldoakumulasi = mysql_fetch_array(mysql_query("SELECT sum(saldo_total) AS totalku, member_id_fk FROM trx_saldo 
                                        LEFT JOIN trx_confirmation_ofpayment
                                        ON trx_confirmation_ofpayment.confirmation_id=
                                        trx_saldo.confirmation_id_fk
                                        LEFT JOIN tbl_trainee
                                        ON tbl_trainee.trainee_id=trx_confirmation_ofpayment.trainee_id_fk
                                        LEFT JOIN tblx_trainee_detail
                                        ON tblx_trainee_detail.trainee_id_fk=tbl_trainee.trainee_id
                                        LEFT JOIN ref_coursename
                                        ON ref_coursename.coursename_id=tblx_trainee_detail.coursename_id_fk
                                        WHERE tbl_trainee.member_id_fk='".$_SESSION['member_id']."' "));

		$q_cair = mysql_query("INSERT INTO trx_saldo(
									saldo_id,  
									saldo_total,
									saldo_date,
									saldo_status,
									saldo_rekening)
							VALUES (
									'',
									'".$q_saldoakumulasi['totalku']."',
									'".date('Y-m-d H:i:s')."',
									'Request',
									'".$_POST['rekening']."')");
	}
?> 