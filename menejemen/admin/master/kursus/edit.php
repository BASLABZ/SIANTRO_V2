<?php 
$id = $_GET['coursename_id']; 
$query = "SELECT * FROM ref_coursename where coursename_id = '".$id."'";
$rowKursus = mysql_fetch_array(mysql_query($query));

if (isset($_POST['simpan'])) {
        $mulai = date('Y-m-d', strtotime(str_replace('-', '/', $_POST['mulai'])));
        $penutupan = date('Y-m-d', strtotime(str_replace('-', '/', $_POST['penutupan'])));
      if ($_POST['coursename_status']=='opened') {
       
        $query = mysql_query( "UPDATE  ref_coursename set 
                                       coursename_title = '".$_POST['coursename_title']."',
                                       coursename_date = '$mulai',
                                       coursename_info = '".$_POST['coursename_info']."',
                                       coursename_price = '".$_POST['coursename_price']."',
                                       coursename_quota = '".$_POST['coursename_quota']."',
                                       coursename_status = 'opened', coursename_con = '".$_POST['coursename_con']."', coursename_ref = '".$_POST['coursename_ref']."' , coursename_date_end = '$penutupan'
                                      WHERE coursename_id = '".$id."'  ");  

      }else if($_POST['coursename_status']=='upcoming'){
        $query = mysql_query( "UPDATE  ref_coursename set 
                                       coursename_title = '".$_POST['coursename_title']."',
                                       coursename_date = '$mulai',
                                       coursename_info = '".$_POST['coursename_info']."',
                                       coursename_price = '".$_POST['coursename_price']."',
                                       coursename_quota = '".$_POST['coursename_quota']."',
                                       coursename_status = 'upcoming', coursename_con = '".$_POST['coursename_con']."', coursename_ref = '".$_POST['coursename_ref']."' , coursename_date_end = '$penutupan'
                                      WHERE coursename_id = '".$id."'  ");  
      }
      else if($_POST['coursename_status']=='clossed'){
        $query = mysql_query( "UPDATE  ref_coursename set 
                                       coursename_title = '".$_POST['coursename_title']."',
                                       coursename_date = '$mulai',
                                       coursename_info = '".$_POST['coursename_info']."',
                                       coursename_price = '".$_POST['coursename_price']."',
                                       coursename_quota = '".$_POST['coursename_quota']."',
                                       coursename_status = 'clossed', coursename_con = '".$_POST['coursename_con']."', coursename_ref = '".$_POST['coursename_ref']."' , coursename_date_end = '$penutupan'
                                      WHERE coursename_id = '".$id."'  ");  
      }      
      if ($query) {
          echo "<script> alert('Terimakasih Data Berhasil Diubah'); location.href='index.php?hal=master/kursus/list' </script>";exit;
       } 
    }

 ?>
  <section class="content-header">
      <h1>
        Ubah Master Kursus
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="index.php?hal=master/kursus/list">Master</a></li>
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
              <form id="defaultForm" class="role" method="POST">
            <div class="form-group row">
              <label class="col-md-3">Judul Kursus</label>
              <div class="col-md-9">
                <input type="text" required="" class="form-control" placeholder="Judul Kursus" name="coursename_title" value="<?php echo $rowKursus['coursename_title']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-3">Deskripsi Kursus</label>
              <div class="col-md-9">
                <textarea class="form-control" required="" name="coursename_info" placeholder="Deskripsi Kursus" style="height: 250px;" id="summerBas"><?php echo $rowKursus['coursename_info']; ?></textarea>
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
              <div class="col-md-2">
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
              <label class="col-md-1">Mulai</label>
              <div class="col-md-2"><input type="text" class="form-control " id="datepicker_mulai" name="mulai" required="" value="<?php echo $rowKursus['coursename_date']; ?>"></div>
              <label class="col-md-1">Penutupan</label>
              <div class="col-md-2"><input type="text" class="form-control " id="datepicker_penutupan" name="penutupan" required="" value="<?php echo $rowKursus['coursename_date_end']; ?>"></div>
            </div>
            <div class="form-group row">
              <label class="col-md-3">Status Bersyarat</label>
              <div class="col-md-4">
              <!-- kaya gini ener engga yaaa  mau nambah yg item di hidden itu, munculnya kalau ada aksi tertentu-->
                <select class="form-control" name="coursename_con" id="kondisi_bersyarat" required="">
                  <option value="">Pilih Kondisi</option>
                  <option value="Y"  <?php if($rowKursus['coursename_con']=='Y'){echo "selected=selected";}?>>Ya</option>
                  <option value="N"<?php if($rowKursus['coursename_con']=='N'){echo "selected=selected";}?>>TIDAK</option>
                </select>
              </div>
            </div>
            
            <?php 
                if ($rowKursus['coursename_con']=='Y') {
             ?>
                <div class="form-group row" id="referensi" >
              <label class="col-md-3">Pilih Referensi Kursus</label>
              <div class="col-md-9">
                <select class="form-control select" name="coursename_ref" style="width: 100%;">
                  <option value="">Pilih Nama Kursus</option>
                  <?php $queryKursus = mysql_query("SELECT * FROM ref_coursename order by coursename_id ASC");
                      while ($kursus = mysql_fetch_array($queryKursus)) {
                   ?>
                     <option value="<?php echo $kursus['coursename_id'] ?>"
                                                <?php if($kursus['coursename_id']==$rowKursus['coursename_id']){echo "selected=selected";}?>><?php  echo $kursus['coursename_title']; ?>
                                            </option>
                    
                  <?php } ?>
                </select>
              </div>
            </div>
             <?php }else{ ?>
                <div class="form-group row" id="referensi" hidden>
              <label class="col-md-3">Pilih Referensi Kursus</label>
              <div class="col-md-9">
                <select class="form-control select" name="coursename_ref" style="width: 100%;">
                  <option value="">Pilih Nama Kursus</option>
                  <?php $queryKursus = mysql_query("SELECT * FROM ref_coursename order by coursename_id ASC");
                      while ($kursus = mysql_fetch_array($queryKursus)) {
                   ?>
                    <option value="<?php echo $kursus['coursename_id']; ?>">
                    <?php echo $kursus['coursename_title']; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            
             <?php } ?>
            <div class="form-group">
              <button type="submit" class="btn btn-info pull-right" name="simpan"><span class="fa fa-save"></span> Simpan</button>
            </div>
          </form>
            </div>
          </div>
        </div>
      </div>
    </section>
