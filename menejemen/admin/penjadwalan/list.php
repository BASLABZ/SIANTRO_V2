  <?php  
    // session_start();
  ?>
  <section class="content-header">
      <h1>
        Penjadwalan Kelas
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Transaksi</a></li>
        <li class="active">Penjadwalan Kelas</li>
      </ol>
  </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Penjadwalan Kelas</h3>
            </div>
            <div class="box-body">
              <table id="tableMaster" class="table table-bordered table-hover">
                <thead>
                  <th><center>No</center></th>
                  <th><center>Nama Kursus</center></th>
                  <th><center>Nama Trainer</center></th>
                  <th><center>Ruang</center></th>
                  <th><center>Jumlah Peserta</center></th>
                  <th><center>Action</center></th>
                </thead>
                <tbody>
                  <?php 

                    $no=0; 
                      $query = mysql_query("SELECT * FROM tbl_selectclass s JOIN ref_operator o ON s.operator_id_fk = o.operator_id JOIN ref_rooms r ON s.rooms_id = r.rooms_id JOIN ref_coursename c ON s.coursename_id = c.coursename_id where o.operator_id='".$_SESSION['operator_id']."'");
                      // tadinya untuk kondisi syaratya ada ini >;
                      // nah itu bikin penjadwalannya nggak nampil ,,, 
                      //penjadwalan tampil setelah kondisi where nya dihilangkan 

                    $no=0;
                      $query = mysql_query("SELECT * FROM tbl_selectclass s JOIN ref_operator o ON s.operator_id_fk = o.operator_id JOIN ref_rooms r ON s.rooms_id = r.rooms_id JOIN ref_coursename c ON s.coursename_id = c.coursename_id ");

                      while ($rowselect  = mysql_fetch_array($query)) {
                        
                   ?>
                   <tr>
                     <td><?php echo ++$no; ?></td>
                     <td><?php echo $rowselect['coursename_title']; ?></td>
                     <td><?php echo $rowselect['operator_name']; ?></td>
                     <td><?php echo $rowselect['rooms_name']; ?></td>
                     <td><?php echo $rowselect['kuota']; ?></td>
                     <td><a href="index.php?hal=penjadwalan/ubah_jadwal&id=<?php echo $rowselect['selectcalss_id']; ?>" class="btn btn-warning"><span class="fa fa-edit"></span> Ubah</a>
                     <?php
                     // if($rowselect['kuota']==0) { ?>

                      <!-- <a href="index.php?hal=penjadwalan/list" class="btn btn-success"><span class="fa fa-calendar"></span> JADWALKAN KURSUS INI</a>
                      <a href="index.php?hal=penjadwalan/list" class="btn btn-primary"><span class="fa fa-calendar"></span> JADWALKAN UJIAN</a> -->
                    <?php  
                     //      echo "<script> alert('Belum ada peserta pada kursus ini !'); location.href='index.php?hal=penjadwalan/list' </script>";exit;
                     // }else{
                     ?>
                     <a href="index.php?hal=penjadwalan/add_penjadwalan&id=<?php echo $rowselect['selectcalss_id']; ?>" class="btn btn-success"><span class="fa fa-calendar"></span> JADWALKAN KURSUS INI</a>
                     <a href="index.php?hal=penjadwalan/add_penjadwalan_ujian&id=<?php echo $rowselect['selectcalss_id']; ?>" class="btn btn-primary"><span class="fa fa-calendar"></span> JADWALKAN UJIAN</a>
                     <?php
                      // }//tutup else
                     ?>
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