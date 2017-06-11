  <?php $id = $_GET['id'];
        $query = mysql_query("SELECT * FROM ref_coursename where coursename_id = '".$id."'");
        $row = mysql_fetch_array($query);

        // simpan
        if (isset($_POST['simpan'])) {
          $querysimpan  = mysql_query("INSERT INTO trx_soalexam(soalexam_title,soalexam_jenis,soalexam_status,soalexam_datecreated,soalexam_text,coursename_id_fk,operator_id_fk)VALUES 
            ('".$_POST['soalexam_title']."','".$_POST['soalexam_jenis']."','ACTIVE',NOW(),'".$_POST['soalexam_text']."','".$row['coursename_id']."','".$_SESSION['operator_id']."')");
          if ($querysimpan) {
                echo "<script> alert('Terimakasih Data Berhasil Disimpan'); location.href='index.php?hal=soalujian/view_soal_ujian&id=".$id."' </script>";exit;
          }else{
                echo "<script> alert('Terimakasih Data gagal Disimpan'); location.href='index.php?hal=soalujian/view_soal_ujian&id=".$id."' </script>";exit;
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
              <h3 class="box-title">Tambah Data Soal Ujian</h3>
            </div>
            <div class="box-body">
              <form class="role" method="POST">
            <div class="form-group row">
              <label class="col-md-3">Nama Kursus</label>
              <div class="col-md-9">
                <input type="text" required="" class="form-control" placeholder="Judul Kursus" name="coursename_id" value="<?php echo $row['coursename_title']; ?>" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-3">Nama Soal Ujian</label>
              <div class="col-md-9">
                <input type="text" required="" class="form-control" placeholder="Nama Soal Ujian" name="soalexam_title">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-3">Jenis Ujian</label>
              <div class="col-md-4">
                <select class="form-control" name="soalexam_jenis">
                  <option>Pilih Jenis</option>
                  <option value="UJIAN REGULER">UJIAN REGULER</option>
                  <option value="REMIDI">REMIDI</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-3">Keterangan Soal Ujian</label>
              <div class="col-md-9">
                <textarea class="form-control" required="" name="soalexam_text" placeholder="Deskripsi Kursus" style="height: 250px;" id="summerBas"></textarea>
              </div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-info pull-right" name="simpan"><span class="fa fa-save"></span> Simpan</button>
            </div>
          </form>
            </div>
          </div>
        </div>
      </div>
    </section>
