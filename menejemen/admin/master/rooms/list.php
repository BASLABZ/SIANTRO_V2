  <!-- proses hapus data master menu -->
  <?php 
      if (isset($_GET['hapus'])) {
         $queryHapusRuang  = mysql_query("DELETE FROM ref_rooms where rooms_id='".$_GET['hapus']."'");
        if ($queryHapusRuang){
            echo "<script> alert('Terimakasih Data Berhasil Dihapus'); location.href='index.php?hal=master/rooms/list' </script>";exit;
        }
      }
   ?>
  <section class="content-header">
      <h1>
        Master Ruangan
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master</a></li>
        <li class="active">Ruangan</li>
      </ol>
  </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Data Master Ruangan <br/><a href="index.php?hal=master/rooms/add" class="btn btn-info btn-sm"><span class=" fa fa-plus"></span> Tambah Data</a></h3>
            </div>
            <div class="box-body">
              <table id="tableMaster" class="table table-bordered table-hover">
                <thead>
                  <th><center>No</center></th>
                  <th><center>Nama Ruang</center></th>
                  <th><center>Keterangan</center></th>
                  <th><center>Action</center></th>
                </thead>
                <tbody>
                 <?php 
                  $no = 0;
                  $queryRuang = mysql_query("SELECT rooms_id,rooms_name, rooms_note from ref_rooms order by rooms_id asc");
                  while ($rowRuang = mysql_fetch_array($queryRuang)) {
                    $var_Id = $rowRuang['rooms_id'];
                    //$var_nama=$var_data['level_name'];
                  ?>
                  <tr>
                    <td><?php echo ++$no; ?></td>
                    <td><?php echo $rowRuang['rooms_name']; ?></td>
                    <td><?php echo $rowRuang['rooms_note']; ?></td>
                    <td><center>
                       <a href="index.php?hal=master/rooms/edit&rooms_id=<?php echo $rowRuang['rooms_id']; ?>" class="btn btn-warning btn-sm"><span class="fa fa-edit"></span> Ubah</a>
                       <a href="index.php?hal=master/rooms/list&hapus=<?php echo $rowRuang['rooms_id']; ?>" class="btn btn-danger btn-sm"> <span class="fa fa-trash"></span> Hapus</a>


                      </center>
                    </td>
                  </tr>
                 <?php  } //tutup while
                 ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>