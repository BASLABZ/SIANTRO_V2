  <section class="content-header">
      <h1>
        Master Pengguna
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master</a></li>
        <li class="active">Pengguna</li>
      </ol>
  </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Data Master Pengguna/ Operator <a href="index.php?hal=master/pengguna/add" class="btn btn-info btn-sm"><span class=" fa fa-plus"></span> Tambah Data</a></h3>
            </div>
            <div class="box-body">
              <table id="tableMaster" class="table table-bordered table-hover">
                <thead>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Jenis Kelamin</th>
                  <th>Email</th>
                  <th>Level</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  <?php 
                    // pembuatan nomot urut
                    $no =0;
                    // eksekusi query untuk menampilkan master pengguna
                    $sqloperator=mysql_query("SELECT operator_id,operator_name,operator_username,operator_gender,operator_email,level_name FROM ref_operator o LEFT JOIN ref_level l on l.level_id=o.operator_levelid_fk");
                    // looping data dari hasil query master penguna
                    while ($rowOperator  = mysql_fetch_array($sqloperator)) {
                   ?>
                   <tr>
                    <td><?php echo $no++; ?></td>
                     <td><?php echo $rowOperator['operator_name']; ?></td>
                     <td><?php echo $rowOperator['operator_username']; ?></td>
                     <td><?php echo $rowOperator['operator_gender']; ?></td>
                     <td><?php echo $rowOperator['operator_email']; ?></td>
                     <td><?php echo $rowOperator['level_name']; ?></td>
                     <td>
                       <a href="index.php?hal=master/pengguna/edit&id=<?php echo $rowOperator['operator_id']; ?>" class="btn btn-warning btn-sm"><span class="fa fa-edit"></span> Ubah</a>
                       <a href="index.php?hal=master/pengguna/edit&id=<?php echo $rowOperator['operator_id']; ?>" class="btn btn-danger btn-sm"> <span class="fa fa-trash"></span> Hapus</a>
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