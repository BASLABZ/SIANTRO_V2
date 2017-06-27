<?php 
      if (isset($_GET['hapus'])) {
        $queryHapus = mysql_query("DELETE FROM ref_coursename where coursename_id = '".$_GET['hapus']."'");
        if ($queryHapus) {
          echo "<script> alert('Data Berhasil Dihapus'); location.href='index.php?hal=master/kursus/list' </script>";exit;
        }
      }
 ?>
<section class="content-header">
    <h1>
      Master Kursus

    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Master</a></li>
      <li class="active">Kursus</li>
    </ol>
</section>
  <section class="content" >
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Daftar Data Master Kursus <a href="index.php?hal=master/kursus/add" class="btn btn-info btn-sm"><span class=" fa fa-plus"></span> Tambah Data</a></h3>
          </div>
          <div class="box-body">
            <table id="tableMaster" class="table table-bordered table-hover">
             <thead>
               <th>No</th>
               <th>Judul Kursus</th>
               <th>Tanggal Start</th>
               <th>Deskripsi</th>
               <th>Harga</th>
               <th>Kuota</th>
               <th>Status</th>
               <th>Aksi</th>
             </thead> 
             <tbody>
               <?php 
                  $no = 0;
                  $query  = mysql_query("SELECT * FROM ref_coursename ORDER BY coursename_id DESC");
                  while ($rowKursus = mysql_fetch_array($query)) {
                ?>
                <tr>
                  <td><?php echo ++$no; ?></td>
                  <td><?php echo $rowKursus['coursename_title']; ?></td>
                  <td><?php echo $rowKursus['coursename_date']; ?></td>
                  <td>
                      <?php 
                            $readmoreDeskripsi  = substr($rowKursus['coursename_info'], 0 ,250 );
                            echo $readmoreDeskripsi;
                            echo ".....<br>";
                            echo "<a href='index.php?hal=master/kursus/edit&coursename_id=$rowKursus[coursename_id]' class='btn btn-success btn-xs'>Selengkapnya <span class='fa fa-arrow-right'></span></a> ";
                        ?>
                  </td>
                  <td>Rp.<?php echo $rowKursus['coursename_price']; ?></td>
                  <td><?php echo $rowKursus['coursename_quota']; ?></td>
                  <td><?php echo $rowKursus['coursename_status']; ?></td>
                   <td>
                       <a href="index.php?hal=master/kursus/edit&coursename_id=<?php echo $rowKursus['coursename_id']; ?>" class="btn btn-warning btn-sm"><span class="fa fa-edit"></span> Ubah</a>
                       <a href="index.php?hal=master/kursus/list&hapus=<?php echo $rowKursus['coursename_id']; ?>" class="btn btn-danger btn-sm"> <span class="fa fa-trash"></span> Hapus</a>
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
