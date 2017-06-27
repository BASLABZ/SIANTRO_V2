  <!-- proses hapus data master menu -->
  <?php 
      if (isset($_GET['hapus'])) {
         $queryHapusPengumuman  = mysql_query("DELETE FROM ref_announcement where announcement_id='".$_GET['hapus']."'");
        if ($queryHapusPengumuman){
            echo "<script> alert('Terimakasih Data Berhasil Dihapus'); location.href='index.php?hal=master/announcement/list' </script>";exit;
        }
      }
   ?>
  <section class="content-header">
      <h1>
        Master Pengumuman
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="index.php?hal=master/announcement/list">Master</a></li>
        <li class="active">Pengumuman</li>
      </ol>
  </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Data Master Pengumuman <br/><a href="index.php?hal=master/announcement/add" class="btn btn-info btn-sm"><span class=" fa fa-plus"></span> Tambah Data</a></h3>
            </div>
            <div class="box-body">
              <table id="tableMaster" class="table table-bordered table-hover">
                <thead>
                  <th><center>No</center></th>
                  <th>Judul Pengumuman</th>
                  <th>Tanggal Posting</th>
                  <th><center>Isi Pengumuman</center></th>
                  <th>Gambar</th>
                  <th><center>Dibuat Oleh</center></th>
                  <th><center>Action</center></th>
                </thead>
                <tbody>
                 <?php 
                  $no = 0;
                  $queryPengumuman = mysql_query("SELECT announcement_id,announcement_dateofposted,operator_name,announcement_judul,announcement_description,announcement_image,operator_name FROM ref_announcement a JOIN ref_operator o ON o.operator_id=a.operator_id_fk order by announcement_id asc");
                  while ($rowPengumuman = mysql_fetch_array($queryPengumuman)) {
                  ?>
                  <tr>
                    <td><?php echo ++$no; ?></td>
                    <td><?php echo $rowPengumuman['announcement_judul']; ?></td>
                    <td><?php echo $rowPengumuman['announcement_dateofposted']; ?></td>
                    <td><?php echo $rowPengumuman['announcement_description']; ?></td>
                    <td><img src="../upload/announcement/<?php echo $rowPengumuman['announcement_image']; ?>" class='img-responsive img-thumbnail'></td>
                    <td><?php echo $rowPengumuman['operator_name']; ?></td>
                    
                    <td><center>
                       <a href="index.php?hal=master/announcement/edit&id=<?php echo $rowPengumuman['announcement_id']; ?>" class="btn btn-warning btn-sm"><span class="fa fa-edit"></span> Ubah</a>
                       <a href="index.php?hal=master/announcement/list&hapus=<?php echo $rowPengumuman['announcement_id']; ?>" class="btn btn-danger btn-sm"> <span class="fa fa-trash"></span> Hapus</a>
                       </center>
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