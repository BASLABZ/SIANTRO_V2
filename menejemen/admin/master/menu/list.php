  <!-- proses hapus data master menu -->
  <?php 
      if (isset($_GET['hapus'])) {
         $queryHapusMenu  = mysql_query("DELETE FROM ref_menu where menu_id='".$_GET['hapus']."'");
        if ($queryHapusMenu){
            echo "<script> alert('Terimakasih Data Berhasil Dihapus'); location.href='index.php?hal=master/menu/list' </script>";exit;
        }
      }
   ?>
  <section class="content-header">
      <h1>
        Master Menu
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master</a></li>
        <li class="active">Menu</li>
      </ol>
  </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Data Master Menu <br/><a href="index.php?hal=master/menu/add" class="btn btn-info btn-sm"><span class=" fa fa-plus"></span> Tambah Data</a></h3>
            </div>
            <div class="box-body">
              <table id="tableMaster" class="table table-bordered table-hover">
                <thead>
                  <th><center>No</center></th>
                  <th><center>Nama Menu</center></th>
                  <th><center>URL Menu</center></th>
                  <th><center>Parent Menu</center></th>
                  <th><center>Action</center></th>
                </thead>
                <tbody>
                 <?php 
                  $no = 0;
                  $queryMenu = mysql_query("SELECT menu_id,menu_name,menu_url,menu_parent FROM ref_menu order by menu_id asc");
                  while ($rowMenu = mysql_fetch_array($queryMenu)) {
                    $var_parent = $rowMenu['menu_parent'];
                  ?>
                  <tr>
                    <td><?php echo ++$no; ?></td>
                    <td><?php echo $rowMenu['menu_name']; ?></td>
                    <td><?php echo $rowMenu['menu_url']; ?></td>
                    <td><?php $queryParen = mysql_query("SELECT menu_name from ref_menu where menu_id='".$var_parent."'");
                        while ($menuParent = mysql_fetch_array($queryParen)) {
                            echo $menuParent['menu_name'];
                          }
                     ?></td>
                    <td>
                       <a href="index.php?hal=master/menu/edit&menu_id=<?php echo $rowMenu['menu_id']; ?>" class="btn btn-warning btn-sm"><span class="fa fa-edit"></span> Ubah</a>
                       <a href="index.php?hal=master/menu/list&hapus=<?php echo $rowMenu['menu_id']; ?>" class="btn btn-danger btn-sm"> <span class="fa fa-trash"></span> Hapus</a>
                    </td>
                  </tr>
                 <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>