<?php 
	$id = $_GET['id'];
	$row  = mysql_fetch_array(mysql_query("SELECT * FROM trx_soalexam where soalexam_id = '".$id."'"));
	if (isset($_POST['simpan'])) {
		$querysimpan = mysql_query("INSERT INTO  trx_exam (soalexam_id_fk,exam_title,exam_option1,exam_option2,exam_option3,exam_option4,exam_option5,operator_id_fk,exam_true) values ('".$id."','".$_POST['exam_title']."','".$_POST['exam_option1']."','".$_POST['exam_option2']."','".$_POST['exam_option3']."','".$_POST['exam_option4']."','".$_POST['exam_option5']."',
			'".$_SESSION['operator_id']."','')");
			
		if ($querysimpan) {
			echo "<script> alert('Terimakasih Data Berhasil Disimpan'); location.href='index.php?hal=soalujian/new_soal_ujian&id=".$id."' </script>";exit;
		}
	}
 ?>
   <section class="content-header">
      <h1>
        Tambah Soal Ujian 
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Soal Ujian</a></li>
        <li class="active">Tambah</li>
        <li class="active">Soal Ujian</li>
      </ol>
  </section>
      <section class="content">
      <div class="row"> 
        <div class="col-xs-8">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tambah Data Soal Ujian </h3>
            </div>
            <div class="box-body">
              <form class="role" method="POST">
            <div class="form-group row">
              <label class="col-md-3">Nama Kursus</label>
              <div class="col-md-9">
                <input type="text" required="" class="form-control"  value="<?php echo $row['soalexam_title']; ?>" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-3">Soal/Pertanyaan</label>
              <div class="col-md-9">
                <textarea class="form-control" required="" name="exam_title" placeholder="Deskripsi Kursus" style="height: 250px;" id="summerBas"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-3">Option A</label>
              <div class="col-md-9">
                <input type="text" required="" class="form-control" placeholder="Optioanal A" name="exam_option1">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-3">Option B</label>
              <div class="col-md-9">
                <input type="text" required="" class="form-control" placeholder="Optioanal B" name="exam_option2">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-3">Option C</label>
              <div class="col-md-9">
                <input type="text" required="" class="form-control" placeholder="Optioanal C" name="exam_option3">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-3">Option D</label>
              <div class="col-md-9">
                <input type="text" required="" class="form-control" placeholder="Optioanal D" name="exam_option4">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-3">Option E</label>
              <div class="col-md-9">
                <input type="text" required="" class="form-control" placeholder="Optioanal E" name="exam_option5">
              </div>
            </div>
            <!-- tambah combo jawaban  -->
            <div class="form-group">
              <button type="submit" class="btn btn-info pull-right" name="simpan"><span class="fa fa-save"></span> Simpan</button>
            </div>
          </form>
            </div>
          </div>
        </div>
      </div>
    </section>
