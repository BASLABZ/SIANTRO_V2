  <!-- proses hapus data master menu -->
  <?php 
      if (isset($_GET['hapus'])) {
         $queryHapusInstansi  = mysql_query("DELETE FROM ref_institution where institution_id='".$_GET['hapus']."'");
        if ($queryHapusInstansi){
            echo "<script> alert('Terimakasih Data Berhasil Dihapus'); location.href='index.php?hal=master/institution/list' </script>";exit;
        }
      }
   ?>
  <section class="content-header">
      <h1>
        Master Instansi
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master</a></li>
        <li class="active">Instansi</li>
      </ol>
  </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Data Master Instansi <br/><a href="index.php?hal=master/institution/add" class="btn btn-info btn-sm"><span class=" fa fa-plus"></span> Tambah Data</a></h3>
            </div>
            <div class="box-body">
              <table id="tableMaster" class="table table-bordered table-hover">
                <thead>
                  <th><center>No</center></th>
                  <th><center>Nama Instansi</center></th>
                  <th><center>Action</center></th>
                </thead>
                <tbody>
                 <?php 
                  $no = 0;
                  $queryInstansi = mysql_query("SELECT institution_id,institution_name from ref_institution order by institution_id asc");
                  while ($rowInstansi = mysql_fetch_array($queryInstansi)) {
                    $var_Id = $rowInstansi['institution_id'];
                    //$var_nama=$var_data['level_name'];
                  ?>
                  <tr>
                    <td><center><?php echo ++$no; ?></center></td>
                    <td><?php echo $rowInstansi['institution_name']; ?></td>
                    <!-- <td><center>
                     <?php //--dicheck apakah id_level sudah ada di tabel level_menu
                            //--Jikalau sudah ada maka tulisannya edit fasilitas, 
                            //--jika belum ada tulisane isi fasilitas
                           // $sqlcheck="SELECT level_id_fk from trx_level_menu where level_id_fk='".$var_Id."'";
                           // $resultcheck=mysql_query($sqlcheck); 
                            //$var_row=mysql_num_rows($resultcheck);
                             // if($var_row==0){ // jika belum terisi
                        ?>
                            <!-- maka tulisan pada link berubah menjadi isi fasilitas -->
                            <!-- <a href="index.php?hal=master/level/levelmenu-add&level_id=<?php //echo $var_Id; ?>"><button type="button" class="btn btn-success btn-xs"> Isi Fasilitas</button></a></center></td>  -->
                        <?php      
                                // } else // jika sudah
                                //     {
                        ?>
                                  <!-- //maka link berubah menjadi edit -->
                                  <!-- <a href="index.php?hal=master/level/levelmenu-edit&level_id=<?php //echo $var_Id; ?>"><button type="button" class="btn btn-primary btn-xs"> Edit Fasilitas</button></a></center></td> -->
                        <?php  
                                   // }//tutup else
                        ?> 
                    
                    <td><center>
                       <a href="index.php?hal=master/institution/edit&institution_id=<?php echo $rowInstansi['institution_id']; ?>" class="btn btn-warning btn-sm"><span class="fa fa-edit"></span> Ubah</a>
                       <a href="index.php?hal=master/institution/list&hapus=<?php echo $rowInstansi['institution_id']; ?>" class="btn btn-danger btn-sm"> <span class="fa fa-trash"></span> Hapus</a>


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