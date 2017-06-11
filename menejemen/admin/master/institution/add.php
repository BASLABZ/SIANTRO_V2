 <!-- proses simpan data -->
 <?php 
    if (isset($_POST['simpan'])) {
      $querySimpanInstansi  = mysql_query("INSERT INTO ref_institution (institution_name) 
                                                      values('".$_POST['institution_name']."')");
      $rowinstansi=mysql_num_rows($querySimpanInstansi);
      if($rowinstansi>0){
        echo "<script> alert('Maaf Data Instansi sudah tersedia'); location.href='index.php?hal=master/institution/list' </script>";
      }else
      // konfirmasi bahwa data berhasil disimpan
      if ($querySimpanInstansi) {
          echo "<script> alert('Terimakasih Data Berhasil Disimpan'); location.href='index.php?hal=master/institution/list' </script>";exit;
      }
    }
  ?>
  <section class="content-header">
      <h1>
        Tambah Master Instansi
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master</a></li>
        <li class="active">Tambah</li>
        <li class="active">Instansi</li>
      </ol>
  </section>
  <section class="content">
    <div class="col-md-6">
          <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Data Instansi</h3>
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
                <input type="text" required class="form-control" name="institution_name" placeholder="Nama Instansi">
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