<?php 
    $idinstansi  = $_GET['institution_id'];
    $sqlTampil  = mysql_query("SELECT * from ref_institution where institution_id ='".$idinstansi."' ");
    $rowInstansi = mysql_fetch_array($sqlTampil);

    // proses ubah data menu
    if (isset($_POST['ubah'])) {
      $queryUbahInstansi = mysql_query("UPDATE ref_institution SET
                                                          institution_name='".$_POST['institution_name']."'
                                                          WHERE institution_id='".$idinstansi."'");
      if ($queryUbahInstansi) {
        echo "<script> alert('Terimakasih Data Berhasil Diubah'); location.href='index.php?hal=master/institution/list' </script>";exit;
      }
    }
 ?>
<section class="content-header">
      <h1>
        Ubah Master Instansi
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master</a></li>
        <li class="active">Ubah</li>
        <li class="active">Instansi</li>
      </ol>
  </section>
  <section class="content">
    <div class="col-md-6">
          <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Ubah Data Instansi</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <div class="box-body">
          <form class="role" method="POST">
            <div class="form-group row">
              <label class="col-md-4">Nama Instansi</label>
              <div class="col-md-8">
                <input type="text" required class="form-control" name="institution_name" placeholder="Nama Instansi"  value="<?php echo $rowInstansi['institution_name']; ?>">
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