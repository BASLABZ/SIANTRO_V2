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
               <th>Tanggal Mulai</th>
               <th>Tanggal Penutupan</th>
               <th>Harga</th>
               <th>Kuota</th>
               <th>Status Kursus</th>
               <th>Status Bersyarat</th>
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
                  <td><?php echo $rowKursus['coursename_date_end']; ?></td>
                  <td>Rp.<?php echo $rowKursus['coursename_price']; ?></td>
                  <td><?php echo $rowKursus['coursename_quota']; ?></td>
                  <td><?php echo $rowKursus['coursename_status']; ?></td>
                  <td>
                    <?php if ($rowKursus['coursename_con'] == 'Y') { ?>
                    <span class="btn btn-warning">Bersyarat</span>
                    <b><i><?php 
                        // filter show coursename_name 
                        $param  = $rowKursus['coursename_ref'];
                        $query_param  = mysql_query("SELECT * FROM ref_coursename where coursename_id = '".$param."'");
                        echo "<ul>";
                        while ($row_param_ref = mysql_fetch_array($query_param)) {
                          echo "<li>";
                          echo $row_param_ref['coursename_title'];
                          echo "</li>";
                        }
                        echo "</ul>";
                     ?></i></b>
                     <?php }else if ($rowKursus['coursename_con'] =='N') { ?>
                     <span class="btn btn-info">Tidak Bersyarat</span>
                     <?php } ?>
                  </td>
                   <td>
                       <a href="index.php?hal=master/kursus/edit&coursename_id=<?php echo $rowKursus['coursename_id']; ?>" class="btn btn-warning btn-sm"><span class="fa fa-edit"></span> Ubah</a>
                       <br><br>
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
