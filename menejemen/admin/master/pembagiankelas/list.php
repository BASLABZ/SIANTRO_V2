  <section class="content-header">
      <h1>
        Pembagian Kelas
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master</a></li>
        <li class="active">Pembagian Kelas</li>
      </ol>
  </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Data Master Pembagian Kelas <br/><a href="index.php?hal=master/pembagiankelas/add" class="btn btn-info btn-sm"><span class=" fa fa-plus"></span> Tambah Data</a></h3>
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
                      $query = mysql_query("SELECT * FROM tbl_selectclass s JOIN ref_operator o ON s.operator_id_fk = o.operator_id JOIN ref_rooms r ON s.rooms_id = r.rooms_id JOIN ref_coursename c ON s.coursename_id = c.coursename_id");
                      while ($rowselect  = mysql_fetch_array($query)) {
                        
                   ?>
                   <tr>
                     <td><?php echo ++$no; ?></td>
                     <td><?php echo $rowselect['coursename_title']; ?></td>
                     <td><?php echo $rowselect['operator_name']; ?></td>
                     <td><?php echo $rowselect['rooms_name']; ?></td>
                     <td><?php echo $rowselect['kuota']; ?></td>
                     <td><a href="" class="btn btn-warning"><span class="fa fa-edit"></span> ubah</a>
                     <a href="" class="btn btn-danger"><span class="fa fa-trash"></span> hapus</a>
                     <a href="index.php?hal=master/pembagiankelas/add_list_peserta&id=<?php echo $rowselect['selectcalss_id']; ?>" class="btn btn-success"><span class="fa fa-users"></span> Masukkan Peserta</a>
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