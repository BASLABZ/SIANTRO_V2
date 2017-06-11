<?php 
$id = $_GET['coursename_id'];
$query = "SELECT * FROM ref_coursename where coursename_id = '".$id."'";
$rowKursus = mysql_fetch_array(mysql_query($query));

if (isset($_POST['ubah'])) {
  $queryUPdate = mysql_query("UPDATE ref_coursename SET 
                                            coursename_title='".$_POST['coursename_title']."',
                                            coursename_info = '".$_POST['coursename_info']."',
                                            coursename_price = '".$_POST['coursename_price']."',
                                            coursename_quota = '".$_POST['coursename_quota']."',
                                            coursename_status = '".$_POST['coursename_status']."',
                                            coursename_date = NOW(),
                                            coursename_con = '".$_POST['coursename_con']."',
                                            coursename_ref = '".$_POST['coursename_ref']."'
                                            WHERE coursename_id='".$id."'");
  if ($queryUPdate) {
       echo "<script> alert('Terimakasih Data Berhasil Diubah'); location.href='index.php?hal=master/kursus/list' </script>";exit;
  }
}
 ?>
  <section class="content-header">
      <h1>
        Ubah Master Kursus
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master</a></li>
        <li class="active">Ubah</li>
        <li class="active">Kursus</li>
      </ol>
  </section>
      <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Ubah Data Member</h3>
            </div>
            <div class="box-body">
              <form class="role" method="POST">
            <div class="form-group row">
              <label class="col-md-3">Judul Kursus</label>
              <div class="col-md-9">
                <input type="text" required="" class="form-control" placeholder="Judul Kursus" name="coursename_title" value="<?php echo $rowKursus['coursename_title']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-3">Deskripsi Kursus</label>
              <div class="col-md-9">
                <textarea class="form-control" required="" name="coursename_info" placeholder="Deskripsi Kursus" style="height: 250px;" id="summerBas">
                  <?php echo $rowKursus['coursename_info']; ?>
                </textarea>
              </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">Harga</label>
                <div class="col-md-4">
                  <input type="number" class="form-control" required="" name="coursename_price" value="<?php echo $rowKursus['coursename_price']; ?>">
                </div>
                <label  class="col-md-2" align="right">Kuota</label>
                <div class="col-md-2">
                  <input type="number" class="form-control" required="" name="coursename_quota" value="<?php echo $rowKursus['coursename_quota']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-3">Status Kursus</label>
              <div class="col-md-4">
                <select class="form-control" name="coursename_status">
                  <option value="">Pilih status</option>
                   <option value="opened"
                      <?php if($rowKursus['coursename_status']=='opened'){echo "selected=selected";}?>>BUKA
                  </option>
                  <option value="clossed"
                      <?php if($rowKursus['coursename_status']=='clossed'){echo "selected=selected";}?>>TUTUP
                  </option>
                  <option value="upcoming"
                      <?php if($rowKursus['coursename_status']=='upcoming'){echo "selected=selected";}?>>AKAN BUKA
                  </option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-3">Kondisi Kursus</label>
              <div class="col-md-4">
                <select class="form-control" name="coursename_con">
                  <option>Pilih Kondisi</option>
                  <option value="opened">YA</option>
                  <option value="upcoming">TIDAK</option>
                </select>
              </div>
            </div>
            
            <div class="form-group row">
              <label class="col-md-3">Pilih Referensi Kursus</label>
              <div class="col-md-6">
                <select class="form-control" name="coursename_ref" required="">
                  <option value="">Pilih Nama Kursus</option>
                  <?php $queryKursus = mysql_query("SELECT * FROM ref_coursename order by coursename_id ASC");
                      while ($kursus = mysql_fetch_array($queryKursus)) {
                   ?>
                    <option value="<?php echo $kursus['coursename_id']; ?>"><?php echo $kursus['coursename_title']; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-info pull-right" name="ubah"><span class="fa fa-save"></span> Simpan</button>
            </div>
          </form>
            </div>
          </div>
        </div>
      </div>
    </section>
