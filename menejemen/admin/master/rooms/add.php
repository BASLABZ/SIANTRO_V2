 <!-- proses simpan data -->
 <?php 
    if (isset($_POST['simpan'])) {
      $querySimpanRuangan  = mysql_query("INSERT INTO ref_rooms (rooms_name,rooms_note) 
                                                      values('".$_POST['rooms_name']."', '".$_POST['rooms_note']."' )");
      // konfirmasi bahwa data berhasil disimpan
      if ($querySimpanRuangan) {
          echo "<script> alert('Terimakasih Data Berhasil Disimpan'); location.href='index.php?hal=master/rooms/list' </script>";exit;
      }
    }
  ?>
  <section class="content-header">
      <h1>
        Tambah Master Ruangan
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="index.php?hal=master/rooms/list">Master</a></li>
        <li class="active">Tambah</li>
        <li class="active">Ruangan</li>
      </ol>
  </section>
  <section class="content">
    <div class="col-md-6">
          <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Data Ruangan</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <div class="box-body">
          <form  id="tambah_ruangan" class="role" method="POST">
            <div class="form-group row">
              <label class="col-md-4">Nama Ruangan</label>
              <div class="col-md-8">
                <input type="text" required name="rooms_name" placeholder="Nama Ruangan">
              </div>
            </div>
             <div class="form-group row">
              <label class="col-md-4">Keterangan</label>
              <div class="col-md-8">
                <textarea name="rooms_note" class="form-control" placeholder="Isi keterangan jika diperlukan" required></textarea>
              </div>
            </div> 
            <div class="form-group">
              <button class="btn btn-primary btn-sm pull-right" type="submit" name="simpan"><span class="fa fa-save"></span> Simpan</button>
            </div>
          </form>
       
          
        </div>
      </div>
    </div>
  </section>

 


