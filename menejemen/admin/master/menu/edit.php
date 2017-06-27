<?php 
    $idmenu  = $_GET['menu_id'];
    $sqlTampil  = mysql_query("SELECT * from ref_menu where menu_id ='".$idmenu."' ");
    $rowMenu  = mysql_fetch_array($sqlTampil);

    // proses ubah data menu
    if (isset($_POST['ubah'])) {
      $queryUbahMenu = mysql_query("UPDATE ref_menu SET
                                                          menu_name='".$_POST['menu_name']."',
                                                          menu_url ='".$_POST['menu_url']."',
                                                          menu_parent = '".$_POST['menu_parent']."'
                                                       WHERE menu_id='".$idmenu."'");
      if ($queryUbahMenu) {
        echo "<script> alert('Terimakasih Data Berhasil Disimpan'); location.href='index.php?hal=master/menu/list' </script>";exit;
      }
    }
 ?>
<section class="content-header">
      <h1>
        Ubah Master Menu
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="index.php?hal=master/menu/list">Master</a></li>
        <li class="active">Ubah</li>
        <li class="active">Menu</li>
      </ol>
  </section>
  <section class="content">
    <div class="col-md-6">
          <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Ubah Data Menu</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <div class="box-body">
          <form class="role" method="POST">
            <div class="form-group row">
              <label class="col-md-4">Nama Menu</label>
              <div class="col-md-8">
                <input type="text" required class="form-control" name="menu_name" placeholder="Nama Menu"  value="<?php echo $rowMenu['menu_name']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-4">Url Menu</label>
              <div class="col-md-8">
                <input type="text" required class="form-control" name="menu_url" placeholder="Nama Url" value="<?php echo $rowMenu['menu_url']; ?>">
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
                        <option value="<?php echo $varMenuid ?>"
                            <?php if($varMenuid==$rowMenu['menu_parent']){echo "selected=selected";}?>><?php  echo $varMenuname; ?>
                        </option>
                    <?php 
                      }//tutup while
                    ?>
               </select>
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