  <!-- proses hapus data master menu -->
  <?php 
      if (isset($_GET['hapus'])) {
         $queryHapusMenu  = mysql_query("DELETE FROM ref_menu where menu_id='".$_GET['hapus']."'");
        if ($queryHapusMenu){
            echo "<script> alert('Terimakasih Data Berhasil Dihapus'); location.href='index.php?hal=master/menu/list' </script>";exit;
        }
      }
   ?>
  <section class="content-header">
      <h1>
        Member
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Member</a></li>
      </ol>
  </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Data Member</h3>
            </div>
            <div class="box-body">
              <table id="tableMaster" class="table table-bordered table-hover">
                <thead>
                  <th>No</th>
                  <th>Nama Member</th>
                  <th>Alamat Member</th>      
                  <th>Email Member</th>
                  <th>Nomor Telepon</th>
                  <th>Jenis Kelamin</th>
                  <th align="center">Status Member</th>
                  <th>Member Potition</th>
                  <th>Aksi</th>
                </thead>
                <tbody>
                  <?php 
                      $no = 0;
                      $queryMember = mysql_query("SELECT member_id, member_name, member_address, member_useremail,member_phonenumber, member_password, member_gender, member_status_active,member_position FROM tbl_member");
                      while ($rowMember  = mysql_fetch_array($queryMember)) {
                   ?>
                   <tr>
                     <td><?php echo ++$no; ?></td>
                     <td><?php echo $rowMember['member_name']; ?></td>
                     <td><?php echo $rowMember['member_address']; ?></td>
                     <td><?php echo $rowMember['member_useremail']; ?></td>
                     <td><?php echo $rowMember['member_phonenumber']; ?></td>
                     <td><?php echo $rowMember['member_gender']; ?></td>
                     <td>
                       <?php
                          $varkondisi=0;
                            if ($rowMember['member_status_active']=='N') {
                              echo "Non Aktifkan";
                            }else{
                              echo "Aktifkan<br>";
                             
                            }

                          ?>
                     </td>
                     <td><?php echo $rowMember['member_position']; ?></td>
                     <td>
                       <a href="index.php?hal=member/edit&member_id=<?php echo $rowMember['member_id'] ?>" class="btn btn-info btn-sm"><span class="fa fa-eye"></span> Lihat Data</a>
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