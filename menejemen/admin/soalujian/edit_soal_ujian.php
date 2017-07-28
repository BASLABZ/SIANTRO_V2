  <?php $id = $_GET['id'];
  // echo $id; exit();
        $query = mysql_query("SELECT * FROM trx_soalexam s 
                                JOIN ref_coursename c ON c.coursename_id=s.coursename_id_fk 
                                JOIN ref_operator o ON o.operator_id=s.operator_id_fk  
                                where soalexam_id = '".$id."'");
        // echo $query; exit();

        $row = mysql_fetch_array($query);

        // update disini dittt=====================
        if (isset($_POST['ubah'])) {
          if($_POST['soalexam_jenis']=='UJIAN REGULER' || $_POST['soalexam_status']=='ACTIVE'){
              $queryUpdate=mysql_query("UPDATE trx_soalexam SET soalexam_title='".$_POST['soalexam_title']."',soalexam_jenis='UJIAN REGULER',soalexam_status='ACTIVE',soalexam_datecreated=NOW(),soalexam_text='".$_POST['soalexam_text']."',coursename_id_fk='".$row['coursename_id']."',operator_id_fk='".$_SESSION['operator_id']."' WHERE soalexam_id='".$id."'");
            }
            elseif ($_POST['soalexam_jenis']=='UJIAN REGULER' || $_POST['soalexam_status']=='NONACTIVE') {
                $queryUpdate=mysql_query("UPDATE trx_soalexam SET soalexam_title='".$_POST['soalexam_title']."',soalexam_jenis='UJIAN REGULER',soalexam_status='NONACTIVE',soalexam_datecreated=NOW(),soalexam_text='".$_POST['soalexam_text']."',coursename_id_fk='".$row['coursename_id']."',operator_id_fk='".$_SESSION['operator_id']."' WHERE soalexam_id='".$id."'");
            }
            elseif ($_POST['soalexam_jenis']=='REMIDI' || $_POST['soalexam_status']=='ACTIVE'){
                $queryUpdate=mysql_query("UPDATE trx_soalexam SET soalexam_title='".$_POST['soalexam_title']."',soalexam_jenis='REMIDI',soalexam_status='ACTIVE',soalexam_datecreated=NOW(),soalexam_text='".$_POST['soalexam_text']."',coursename_id_fk='".$row['coursename_id']."',operator_id_fk='".$_SESSION['operator_id']."' WHERE soalexam_id='".$id."'");   
            } 
            elseif ($_POST['soalexam_jenis']=='REMIDI' || $_POST['soalexam_status']=='NONACTIVE') {
                $queryUpdate=mysql_query("UPDATE trx_soalexam SET soalexam_title='".$_POST['soalexam_title']."',soalexam_jenis='REMIDI',soalexam_status='NONACTIVE',soalexam_datecreated=NOW(),soalexam_text='".$_POST['soalexam_text']."',coursename_id_fk='".$row['coursename_id']."',operator_id_fk='".$_SESSION['operator_id']."' WHERE soalexam_id='".$id."'");   
            }
              if ($queryUpdate) {
                echo "<script> alert('Terimakasih Data Berhasil Diubah'); location.href='index.php?hal=soalujian/view_soal_ujian&id=".$id."' </script>";exit;
              }else{
                    echo "<script> alert('Opps Data gagal Diubah, periksa kembali data anda'); location.href='index.php?hal=soalujian/view_soal_ujian&id=".$id."' </script>";exit;
              } //tutup else 
          }
          
   ?>
  <section class="content-header">
      <h1>
        Ubah Daftar Soal Ujian 
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Soal Ujian</a></li>
        <li class="active">Ubah</li>
        <li class="active">Soal Ujian</li>
      </ol>
  </section>
      <section class="content">
      <div class="row">
        <div class="col-xs-8">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Ubah Data Soal Ujian</h3>
            </div>
            <div class="box-body">
              <form class="role" method="POST">
            <div class="form-group row">
              <label class="col-md-3">Nama Kursus</label>
              <div class="col-md-9">
                <input type="text" class="form-control" placeholder="Judul Kursus" name="coursename_id" value="<?php echo $row['coursename_title']; ?>" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-3">Nama Soal Ujian</label>
              <div class="col-md-9">
                <input type="text" required="" class="form-control" placeholder="Nama Soal Ujian" name="soalexam_title" value="<?php echo $row['soalexam_title']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-3">Jenis Ujian</label>
              <div class="col-md-4">
                <select class="form-control" name="soalexam_jenis">
                  <option>Pilih Jenis</option>
                  <option value="UJIAN REGULER"
                      <?php if($row['soalexam_jenis']=='UJIAN REGULER'){echo "selected=selected";}?>>UJIAN REGULER
                  </option>
                  <option value="REMIDI"
                      <?php if($row['soalexam_jenis']=='REMIDI'){echo "selected=selected";}?>>REMIDI
                  </option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-3">Status Ujian</label>
              <div class="col-md-4">
                <select class="form-control" name="soalexam_status">
                  <option>Pilih Status</option>
                  <option value="ACTIVE">
                  <?php if($row['soalexam_status']=='ACTIVE'){echo "selected=selected";}?>>ACTIVE</option>
                  <option value="NONACTIVE">
                  <?php if($row['soalexam_status']=='NONACTIVE'){echo "selected=selected";}?>>NONACTIVE</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-3">Keterangan Soal Ujian</label>
              <div class="col-md-9">
                <textarea class="form-control" required="" name="soalexam_text" placeholder="Deskripsi Kursus" style="height: 250px;" id="summerBas"><?php echo $row['soalexam_text']; ?></textarea>
              </div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-info pull-right" name="ubah"><span class="fa fa-save"></span> Ubah Data</button>
            </div>
          </form>
            </div>
          </div>
        </div>
      </div>
    </section>
