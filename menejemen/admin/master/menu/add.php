 <!-- proses simpan data -->
 <?php 
    if (isset($_POST['simpan'])) {
      $querySimpanMenu  = mysql_query("INSERT INTO ref_menu (menu_name,menu_url,menu_parent) 
                                                      values('".$_POST['menu_name']."','".$_POST['menu_url']."','".$_POST['menu_parent']."')");
      // konfirmasi bahwa data berhasil disimpan
      if ($querySimpanMenu) {
          echo "<script> alert('Terimakasih Data Berhasil Disimpan'); location.href='index.php?hal=master/menu/list' </script>";exit;
      }
    }
  ?>
  <section class="content-header">
      <h1>
        Tambah Master Menu
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master</a></li>
        <li class="active">Tambah</li>
        <li class="active">Menu</li>
      </ol>
  </section>
  <section class="content">
    <div class="col-md-6">
          <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Data Menu</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <div class="box-body">
          <form id="defaultForm" class="role" method="POST">
            <div class="form-group row">
              <label class="col-md-4">Nama Menu</label>
              <div class="col-md-8">
                <input type="text" required class="form-control" name="menu_name" placeholder="Nama Menu">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-4">Url Menu</label>
              <div class="col-md-8">
                <input type="text" required class="form-control" name="menu_url" placeholder="Nama Url">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-4">Parent Menu</label>
              <div class="col-md-8">
               <select class="form-control" required=required name="menu_parent">
                 <?php 
                    $sqlmenu="SELECT menu_id, menu_name, menu_url from ref_menu where menu_parent=0 order by menu_id ASC";
                      $runsqlmen=mysql_query($sqlmenu);
                      while ($datamenu=mysql_fetch_array($runsqlmen)) {
                        $varMenuid=$datamenu['menu_id'];
                        $varMenuname=$datamenu['menu_name']; ?>
                        <option value="<?php echo $varMenuid?>"><?php echo $varMenuname?></option>
                    <?php 
                      }//tutup while
                    ?>
               </select>
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
                  menu_name: {
                      //message: 'The username is not valid',
                      validators: {
                          notEmpty: {
                              message: 'Nama Menu harus diisi'
                          }
                      }
                  },
                   menu_url: {
                      //message: 'The username is not valid',
                      validators: {
                          notEmpty: {
                              message: 'Nama url harus diisi'
                          }
                      }
                  }
              }
          });
      });
</script>


