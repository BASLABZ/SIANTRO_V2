<?php 
    $idruang  = $_GET['rooms_id'];
    $sqlTampil  = mysql_query("SELECT * from ref_rooms where rooms_id ='".$idruang."' ");
    $rowRuang = mysql_fetch_array($sqlTampil);

    // proses ubah data menu
    if (isset($_POST['ubah'])) {
      $queryUbahRuang = mysql_query("UPDATE ref_rooms SET
                                                          rooms_name='".$_POST['rooms_name']."', rooms_note='".$_POST['rooms_note']."'
                                                          WHERE rooms_id='".$idruang."'");
      if ($queryUbahRuang) {
        echo "<script> alert('Terimakasih Data Berhasil Diubah'); location.href='index.php?hal=master/rooms/list' </script>";exit;
      }
    }
 ?>
<section class="content-header">
      <h1>
        Ubah Master Ruangan
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="index.php?hal=master/rooms/list">Master</a></li>
        <li class="active">Ubah</li>
        <li class="active">Ruangan</li>
      </ol>
  </section>
  <section class="content">
    <div class="col-md-6">
          <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Ubah Data Euangan</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <div class="box-body">
          <form class="role" method="POST">
            <div class="form-group row">
              <label class="col-md-4">Nama Ruang</label>
              <div class="col-md-8">
                <input type="text" required class="form-control" name="rooms_name" placeholder="Nama Ruang"  value="<?php echo $rowRuang['rooms_name']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-4">Keterangan</label>
              <div class="col-md-8">
                <textarea name="rooms_note" class="form-control" placeholder="Isi keterangan jika diperlukan"><?php echo $rowRuang['rooms_note']; ?></textarea>
              </div>
            </div> 
            <div class="form-group">
              <button class="btn btn-primary btn-sm pull-right" type="submit" name="ubah"><span class="fa fa-pencil"></span> Ubah</button>
            </div>
          </form>
       
          
        </div>
      </div>
    </div>
  </section>