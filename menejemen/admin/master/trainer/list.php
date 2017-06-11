  <!-- proses hapus data master Pengajar -->
  <?php 
      if (isset($_GET['hapus'])) {

         $queryHapusPengajar  = "DELETE from ref_operator where operator_id='".$_GET['hapus']."'";
        $runDelete = mysql_query($queryHapusPengajar);
        if ($runDelete){
            echo "<script> alert('Terimakasih Data Berhasil Dihapus'); location.href='index.php?hal=master/operator/list' </script>";exit;
        }
      }
   ?>
  <section class="content-header">
      <h1>
        Master Pengajar
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master</a></li>
        <li class="active">Pengajar</li>
      </ol>
  </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Data Master Pengajar <a href="index.php?hal=master/operator/add" class="btn btn-info btn-sm"><span class=" fa fa-plus"></span> Tambah Data</a></h3>
            </div>
            <div class="box-body">
              <table id="tableMasterScroll" class="table table-bordered table-hover table-responsive">
                <thead>
                  <th>No</th>
                  <th>Nama Pengajar</th>
                  <th>Username</th>
                  <th>Tempat/Tanggal Lahir</th>
                  <th>Agama</th>
                  <th>Jenis Kelamin</th>
                  <th>Alamat</th>
                  <th>No Telpon</th>
                  <th>Email</th>
                  <th>Position</th>
                  <th>Status</th>
                  <th>Foto</th>
                  <th>Website</th>
                  <th>Aksi</th>
                </thead>
                <tbody>
                  <?php 
                    $no=0;
                    $queryPengajar = mysql_query("SELECT * FROM ref_operator order by operator_id DESC");
                    while ($rowTrainner  = mysql_fetch_array($queryPengajar)) {
                   ?>
                    <tr>
                      <td><?php echo ++$no; ?></td>
                      <td><?php echo $rowTrainner['operator_name']; ?></td>
                      <td><?php echo $rowTrainner['operator_username']; ?></td>
                      <td><?php echo $rowTrainner['operator_placeofbirth']; ?>/<?php echo $rowTrainner['operator_dateofbirth']; ?></td>
                      <td><?php echo $rowTrainner['operator_gender']; ?></td>
                      <td><?php echo $rowTrainner['operator_religion']; ?></td>
                      <td><?php echo $rowTrainner['operator_address']; ?></td>
                      <td><?php echo $rowTrainner['operator_phonenumber']; ?></td>
                      <td><?php echo $rowTrainner['operator_email']; ?></td>
                      <td><?php echo $rowTrainner['operator_position']; ?></td>
                      <td><?php echo $rowTrainner['operator_status']; ?></td>
                      <td><img src="img/<?php echo $rowTrainner['operator_image']; ?>" class="img-thumbnail img-responsive" style="width: 100px; height: 100px;" >
                      </td>
                      <td><?php echo $rowTrainner['operator_website']; ?></td>

                      <td>
                        <a href="index.php?hal=master/operator/edit&operator_id=<?php echo $rowTrainner['operator_id'] ?>" class="btn btn-warning bt-xs"><span class="fa fa-pencil"></span> Ubah</a>
                        <a href="index.php?hal=master/operator/list&hapus=<?php echo $rowTrainner['operator_id']; ?>" class="btn btn-danger bt-xs"><span class="fa fa-trash"></span> Hapus</a>
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