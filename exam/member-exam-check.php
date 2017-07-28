<?php
	error_reporting(0); 
	session_start();

	$var_kursus			= $_POST['kursus'];
	$var_paketsoal		= $_POST['paketsoal'];
	$var_nomorsoal 		= $_POST['nomorsoal'];
	$var_nomorurutsoal  = $_POST['nomorurutsoal'];
	$var_peserta 		= $_POST['peserta'];
	$var_peserta_detail = $_POST['peserta_detail'];
	$var_jawaban 		= $_POST['jawaban'];
	
	//(fungsi cek)cek apakah sudah pernah menjawab sebelumnya..(?)
	$q_cek = mysql_query("SELECT * FROM tbl_temp_score WHERE traineedetail_id_fk='".$var_peserta_detail."' and exam_id_fk='".$var_nomorsoal."' ");
	$d_cek = mysql_fetch_array($q_cek);

	//cari kunci jawaban
	$q_kunci = mysql_query("SELECT * FROM trx_exam WHERE soalexam_id_fk='".$var_paketsoal."' and exam_id='".$var_nomorsoal."' ");
	$d_kunci = mysql_fetch_array($q_kunci);
	
	//lanjutan fungsi cek
	if ((mysql_num_rows($q_cek))>0) {
		//jika jawaban yg dulu benar
		if ($d_cek['temp_answer']==$d_kunci['exam_true']) {
			$_SESSION['tampungscore'.$var_peserta] = $_SESSION['tampungscore'.$var_peserta]-2;
		} 		
		//hapus record sebelumnya yg utk menampung jawaban terdahulu
		$q_hapus = mysql_query("DELETE FROM tbl_temp_score WHERE temp_score_id='".$d_cek['temp_score_id']."' ");
	}

	if ($var_nomorurutsoal==1){
		if ($var_jawaban==$d_kunci['exam_true']) {
			$tampungscore = 2;
		} else {
			$tampungscore = 0;
		}
		$_SESSION['tampungscore'.$var_peserta] = $tampungscore;
	} else {
		if ($var_jawaban==$d_kunci['exam_true']) {
			$_SESSION['tampungscore'.$var_peserta] = $_SESSION['tampungscore'.$var_peserta]+2;
		} else {
			$_SESSION['tampungscore'.$var_peserta] = $_SESSION['tampungscore'.$var_peserta]+0;
		}
		$tampungscore = $_SESSION['tampungscore'.$var_peserta];
	}

	//simpan jawaban
	$q_jawaban = mysql_query("INSERT INTO tbl_temp_score 
													VALUES(
															'',
															'".$var_nomorsoal."',
															'".$var_peserta_detail."',
															'".$var_jawaban."'
														  ) ");

	if ($var_nomorurutsoal<30) {
		// $var_nomorsoal = $var_nomorsoal+1;
		echo "<script>location.href='index.php?hal=exam/member-exam&kur=$var_kursus&no=$var_nomorurutsoal' </script>";
		// header('location:index.php?hal=member-exam&kur=$var_kursus&no=$var_nomorsoal');
		exit;
	} else {
		$tampungscore = ($tampungscore*10)/6;
		//=========== (1) konversi score huruf =============
		// A = > 75 (lulus)
		// B = > 65 (lulus)
		// C = > 56 (rekomendasi remidi)
		// D = < 56 (tdk lulus)

		if ($tampungscore >= 75 ) {
			$score = "A";
			$status = "Lulus";
		} elseif ($tampungscore >=65 and $tampungscore <75) {
			$score = "B";
			$status = "Lulus";
		} elseif ($tampungscore >=56 and $tampungscore <65) {
			$score = "C";
			$status = "Diujung Tanduk";
		} else {
			$score = "D";
			$status = "Tidak Lulus";
		}

		//=========== (2) Simpan Score =============
		$q_savescore = mysql_query("INSERT INTO trx_score VALUES(
																	'',
																	'".$var_peserta."',
																	'".$var_paketsoal."',
																	'".$tampungscore."',
																	'".$score."',
																	'".$status."'	
																)");	
		//=========== (3) gue tampol loh =============
		// echo "<script>location.href='index.php?hal=exam/member-exam-finish&peserta='".$var_peserta."' </script>";
		echo "<script>location.href='index.php?hal=exam/member-exam-finish&detailpeserta=".$var_peserta_detail."' </script>";
		// tampilan score
	}

?>