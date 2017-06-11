<?php 
    if (isset($_GET['hapus'])) {
      $queryHapus = mysql_query("DELETE FROM ref_silabus where silabus_id = '".$_GET['hapus']."'");
      if ($queryHapus) {
        echo "<script> alert('Data Berhasil Dihapus'); location.href='index.php?hal=master/silabus/list' </script>";exit;
      }
    }
 ?>
<section class="content-header">
    <h1>
      Master Silabus

    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Master</a></li>
      <li class="active">Silabus</li>
    </ol>
</section>
  <section class="content" >
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Daftar Data Master Silabus <a href="index.php?hal=master/silabus/add" class="btn btn-info btn-sm"><span class=" fa fa-plus"></span> Tambah Data</a></h3>
          </div>
          <div class="box-body">
            <table id="tableMaster" class="table table-bordered table-hover">
              <thead>
                <th>No</th>
                <th>Tanggal Posting</th>
                <th>Nama Kursus</th>
                <th>Judul Silabus</th>
                <th>Topik</th>
                <th>File</th>
                <th>Pengguna</th>
                <th>Aksi</th>
              </thead>
              <tbody>
                <?php 
                  $no =0;
                  $query = mysql_query("SELECT * FROM ref_silabus s JOIN ref_coursename c ON s.coursename_id_fk  = c.coursename_id JOIN ref_operator o ON s.operator_id_fk = o.operator_id where o.operator_id='".$_SESSION['operator_id']."'");
                  while ($rowSilabus = mysql_fetch_array($query)) {
                 ?>
                  <tr>
                    <td><?php echo ++$no; ?></td>
                    <td><?php echo $rowSilabus['silabus_period']; ?></td>
                    <td><?php echo $rowSilabus['coursename_title']; ?></td>
                    <td><?php echo $rowSilabus['silabus_purpose']; ?></td>
                    <td>
                      <?php 
                            $readmoreDeskripsi  = substr($rowSilabus['silabus_topic'], 0 ,100 );
                            echo $readmoreDeskripsi;
                            echo ".....<br>";
                            echo "<a href='index.php?hal=master/silabus/edit&silabus_id=$rowSilabus[silabus_id]' class='btn btn-success btn-xs'>Selengkapnya <span class='fa fa-arrow-right'></span></a> ";
                        ?>
                    </td>
                    <td><?php echo $rowSilabus['silabus_file']; ?></td>
                    <td><?php echo $rowSilabus['operator_name']; ?><?php echo $rowSilabus['operator_id']; ?></td>

                    <td>
                        <?php $idsession = $_SESSION['operator_id']; ?>
                        <?php $idpenulis = $rowSilabus['operator_id']; ?>

                        <?php 
                            if ($idsession != $idpenulis) {
                              echo "TIDAK BISA DI UBAH";
                         }else{ ?>
                          <a href="index.php?hal=master/silabus/edit&silabus_id=<?php echo $rowSilabus['silabus_id']; ?>" class="btn btn-warning btn-sm"><span class="fa fa-edit"></span> Ubah</a>
                       <a href="index.php?hal=master/silabus/list&hapus=<?php echo $rowSilabus['silabus_id']; ?>" class="btn btn-danger btn-sm"> <span class="fa fa-trash"></span> Hapus</a>
                         <?php } ?>
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

