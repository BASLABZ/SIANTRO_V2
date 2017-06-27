 <!-- proses simpan data -->
 <?php 
    if (isset($_POST['simpan'])) {
      $querySimpanLevel  = mysql_query("INSERT INTO ref_level (level_name) 
                                                      values('".$_POST['level_name']."')");
      // konfirmasi bahwa data berhasil disimpan
      if ($querySimpanLevel) {
          echo "<script> alert('Terimakasih Data Berhasil Disimpan'); location.href='index.php?hal=master/level/list' </script>";exit;
      }
    }
  ?>
  <section class="content-header">
      <h1>
        Tambah Master Level
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="index.php?hal=master/level/list">Master</a></li>
        <li class="active">Tambah</li>
        <li class="active">Level</li>
      </ol>
  </section>
  <section class="content">
    <div class="col-md-6">
          <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Data Level</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <div class="box-body">
          <form id="defaultForm" class="role" method="POST">
            <div class="form-group row">
              <label class="col-md-4">Nama Level</label>
              <div class="col-md-8">
                <input type="text" required class="form-control" name="level_name" placeholder="Nama Level">
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

<script type="text/javascript">
$(document).ready(function() {
    $('#defaultForm').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            level_name: {
                //message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Nama Level harus diisi'
                    }
                }
            }
        }
    });
});
</script>