<?php 
	error_reporting(0);
	date_default_timezone_set('Asia/Jakarta');
	
	$var_name			= mysql_real_escape_string($_POST['frm_name']);
	$var_email 			= mysql_real_escape_string($_POST['frm_email']);
	$var_phone 			= mysql_real_escape_string($_POST['frm_phone']);
	$var_gender			= mysql_real_escape_string($_POST['frm_gender']);
	$var_position		= mysql_real_escape_string($_POST['frm_position']);
	$var_institution	= mysql_real_escape_string($_POST['frm_institution']);
	$var_skill			= mysql_real_escape_string($_POST['frm_skill']);
	$var_password		= mysql_real_escape_string($_POST['frm_password']);
	$var_question		= mysql_real_escape_string($_POST['frm_question']);
	$var_answer 		= mysql_real_escape_string($_POST['frm_answer']);


	// ---- || validasi || -----
		$cekMember = mysql_query("SELECT * FROM tbl_member WHERE member_useremail='".$var_email."' ");
		if (mysql_num_rows($cekMember)>0) {
			echo "<script> alert('Maaf, email yang anda inputkan telah terdaftar sebelumnya. Mohon ikuti kebijakan kami dengan hanya memiliki satu akun untuk satu peserta. Apabila anda kesulitan dalam login silahkan gunakan fasilitas forget password untuk mengatur ulang kata sandi anda. Terimakasih'); window.history.go(-1) </script>";exit;
		}
	// ---- || validasi || ----

	  $lokasi_file    = $_FILES['frm_profesioncard']['tmp_name'];
	  $tipe_file      = $_FILES['frm_profesioncard']['type'];
	  $nama_file      = $_FILES['frm_profesioncard']['name'];
	  $acak           = rand(000000,999999);
	  $nama_file_unik = $acak.$nama_file; 
	  		
	  $vdir_upload = "menejemen/upload/berkas/";
	  $vfile_upload = $vdir_upload . $nama_file_unik;
	  $tipe_file   = $_FILES['frm_profesioncard']['type'];

	  //	Simpan gambar dalam ukuran sebenarnya
	  if(move_uploaded_file($_FILES["frm_profesioncard"]["tmp_name"], $vfile_upload)){

		$save = "INSERT INTO tbl_member(
					member_name, 
					member_useremail, 
					member_phonenumber,  
					member_password, 
					member_gender, 
					member_position, 
					member_institution,
					member_skill,
					member_hint_question, 
					member_answer_question,
					member_status_active,
					member_levelid_fk,
					member_register_date,
					member_status_login,
					member_doc

					)

				VALUES(
					'".$var_name."',
					'".$var_email."',
					'".$var_phone."',
					'".md5($var_password)."',
					'".$var_gender."',
					'".$var_position."',
					'".$var_institution."',
					'".$var_skill."',
					'".$var_question."',
					'".$var_answer."',
					'pending',
					'6',
					'".date('Y-m-d')."',
					'N',
					'".$nama_file_unik."'

					)";

		mysql_query($save);
		
		//fungsi sendmail
		// include 'content_mail.php'; //include ja biar ringkes
		
		// mail($var_email, "Aktivasi Akun SiantroUGM", $pesan, $headers);
		//sementara aku matikan fungsi sendmail nya.	

		//================= BUG BUG BUG BUG BUG =====================//

			//disini sering bug, entah gk kuat atau gmn kalo pake sendmail local loadingnya lama dan ujung2nya njepat! -_- echo alertnya nggak mau muncul dan browser berhenti di page ini, mohon pencerahannya mastah.

		//================= BUG BUG BUG BUG BUG =====================//

		
		echo "<script> alert('Terimakasih, anda telah menyelesaikan proses pendaftaran. '); location.href='SENDEMAIL/sendEmailDebug.php?email=".$var_email."' </script>";exit;
	} //if

	else {
		echo "<script> alert('Gagal mengupload berkas, mohon ulangi pendaftaran.'); location.href='index.php' </script>";exit;		
	}

?>