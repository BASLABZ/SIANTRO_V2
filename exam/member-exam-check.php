<?php 
	
	error_reporting(0);

	$var_kursus			= $_POST['kursus'];
	$var_paketsoal		= $_POST['paketsoal'];
	$var_nomorsoal 		= $_POST['nomorsoal'];
	$var_peserta 		= $_POST['peserta'];
	$var_peserta_detail = $_POST['peserta_detail'];
	$var_jawaban 		= $_POST['jawaban'];
	
	//cari kunci jawaban
	$q_kunci = mysql_query("SELECT * FROM trx_exam WHERE soalexam_id_fk='".$var_paketsoal."' and exam_id='".$var_nomorsoal."' ");
	$d_kunci = mysql_fetch_array($q_kunci);

	if ($var_jawaban==$d_kunci['exam_true']) {
		$tampungscore = $tampungscore+1;
	} else {
		$tampungscore = $tampungscore-1;
	}

	//simpan jawaban
	$q_jawaban = mysql_query("INSERT INTO tbl_temp_score 
													VALUES(
															'',
															'".$var_nomorsoal."',
															'".$var_peserta."',
															'".$var_jawaban."'
														  ) ");

	if ($var_nomorsoal<3) {
		// $var_nomorsoal = $var_nomorsoal+1;
		echo "<script>location.href='index.php?hal=exam/member-exam&kur=$var_kursus&no=$var_nomorsoal' </script>";
		// header('location:index.php?hal=member-exam&kur=$var_kursus&no=$var_nomorsoal');
		exit;
	} else {
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
		// echo "<script>location.href='index.php?hal=exam/member-exam-finish?peserta=$var_peserta' </script>";
		echo "<script>location.href='index.php?hal=exam/member-exam-finish' </script>";
		// tampilan score
	}

?>