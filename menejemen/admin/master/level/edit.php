<?php 
    $idlevel  = $_GET['level_id'];
    $sqlTampil  = mysql_query("SELECT * from ref_level where level_id ='".$idlevel."' ");
    $rowLevel = mysql_fetch_array($sqlTampil);

    // proses ubah data menu
    if (isset($_POST['ubah'])) {
      $queryUbahLevel = mysql_query("UPDATE ref_level SET
                                                          level_name='".$_POST['level_name']."'
                                                          WHERE level_id='".$idlevel."'");
      if ($queryUbahLevel) {
        echo "<script> alert('Terimakasih Data Berhasil Diubah'); location.href='index.php?hal=master/level/list' </script>";exit;
      }
    }
 ?>
<section class="content-header">
      <h1>
        Ubah Master Level
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="index.php?hal=master/level/list">Master</a></li>
        <li class="active">Ubah</li>
        <li class="active">Level</li>
      </ol>
  </section>
  <section class="content">
    <div class="col-md-6">
          <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Ubah Data Level</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <div class="box-body">
          <form class="role" method="POST">
            <div class="form-group row">
              <label class="col-md-4">Nama Level</label>
              <div class="col-md-8">
                <input type="text" required class="form-control" name="level_name" placeholder="Nama Level"  value="<?php echo $rowLevel['level_name']; ?>">
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