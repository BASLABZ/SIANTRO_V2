<?php 
      if (isset($_GET['hapus'])) {
        $queryHapus = mysql_query("DELETE FROM trx_coursematerial where coursematerial_id = '".$_GET['hapus']."'");
        if ($queryHapus) {
          echo "<script> alert('Data Berhasil Dihapus'); location.href='index.php?hal=master/materi/list' </script>";exit;
        }
      }
 ?>
<section class="content-header">
    <h1>
      Master Materi

    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Master</a></li>
      <li class="active">Materi</li>
    </ol>
</section>
  <section class="content" >
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Daftar Data Master Materi <a href="index.php?hal=master/materi/add" class="btn btn-info btn-sm"><span class=" fa fa-plus"></span> Tambah Data</a></h3>
          </div>
          <div class="box-body">
            <table id="tableMaster" class="table table-bordered table-hover">
             <thead>
               <th>No</th>
               <th>Judul Materi</th>
               <th>Nama Kursus</th>
               <th>Tanggal Upload</th>
               <th>Deskripsi</th>
               <th>Jenis File</th>
               <th>File</th>
               <th>Operator</th>
               <th>Aksi</th>
             </thead> 
             <tbody>
               <?php 
                $no = 0;
                $queryMaterial = mysql_query("SELECT * FROM trx_coursematerial m JOIN ref_operator o ON m.operator_id_fk = o.operator_id JOin ref_coursename k ON m.coursename_id_fk = k.coursename_id where o.operator_id = '".$_SESSION['operator_id']."' ORDER BY m.coursematerial_id DESC");
                while ($rowMeteri = mysql_fetch_array($queryMaterial)) {
                ?>
                  <tr>
                    <td><?php echo ++$no; ?></td>
                    <td><?php echo $rowMeteri['coursematerial_title']; ?></td>
                    <td><?php echo $rowMeteri['coursename_title']; ?></td>
                    <td><?php echo $rowMeteri['coursematerial_dateofposted']; ?></td>
                    <td>
                      <?php 
                            $readmoreDeskripsi  = substr($rowMeteri['coursematerial_description'], 0 ,100 );
                            echo $readmoreDeskripsi;
                            echo ".....<br>";
                            echo "<a href='index.php?hal=master/materi/edit&materi=$rowMeteri[coursematerial_id]' class='btn btn-success btn-xs'>Selengkapnya <span class='fa fa-arrow-right'></span></a> ";
                        ?>
                    </td>
                    <td><?php echo $rowMeteri['coursematerial_type']; ?></td>
                    <td>
                    <?php if ($rowMeteri['coursematerial_type']=='VIDEO') {
                      echo "<span class='fa fa-file-video-o fa-3x'></span>";
                    }else if ($rowMeteri['coursematerial_type']=='PDF') {
                      echo "<span class='fa fa-file-pdf-o  fa-3x'></span>";
                    }else{
                    echo "<span class='fa fa-file-word-o   fa-3x'></span>";
                      } ?>
                  </td>
                    <td><?php echo $rowMeteri['operator_name']; ?></td>
                     <td>
                       <a href="index.php?hal=master/materi/edit&materi=<?php echo $rowMeteri['coursematerial_id']; ?>" class="btn btn-warning btn-sm"><span class="fa fa-edit"></span> Ubah</a>
                       <a href="index.php?hal=master/materi/list&hapus=<?php echo $rowMeteri['coursematerial_id']; ?>" class="btn btn-danger btn-sm"> <span class="fa fa-trash"></span> Hapus</a>
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
