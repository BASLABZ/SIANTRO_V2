  <?php 
    $id = $_GET['id'];
    $query  = mysql_query("SELECT * FROM tbl_selectclass s JOIN ref_operator o ON s.operator_id_fk = o.operator_id JOIN ref_rooms r ON s.rooms_id = r.rooms_id JOIN ref_coursename c ON s.coursename_id = c.coursename_id where s.selectcalss_id='".$id."' ");
    $rowList = mysql_fetch_array($query);
    $idkus = $rowList['coursename_id'];
    $jumlah = $rowList['kuota'];
    $rowtrain = mysql_fetch_array(mysql_query("SELECT * FROM tblx_trainee_detail where coursename_id_fk = '".$idkus."'"));
    

 ?>
  <section class="content-header">
      <h1>
        Jadwal   Ujian Kurus Hari Ini
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Transaksis</a></li>
        <li class="active">Jadwal  Ujian</li>
        <li class="active"><?php echo $rowList['coursename_title']; ?></li>
      </ol>
  </section>
  <section class="content">
    <div class="col-md-12">
    <div class="box box-default">
       <div class="box-header"></div>
       <div class="box-body">
          <table class="table table-responsive table-hover table-stripped">
        <thead>
          <th>No</th>
          <th>HARI</th>
          <th>JAM MULAI</th>
          <th>JAM SELESAI</th>
          <th>RUANG</th>
          <th>AKSI</th>
        </thead>
        <tbody>
          <?php $no = 0;
              $querys = "SELECT * FROM tbl_jadwal j JOIN ref_rooms r ON j.rooms_id_fk = r.rooms_id where  j.jadwal_jenis='UJIAN' and j.selectcalss_id_fk = '".$id."' ";
              $queryshow = mysql_query($querys);
              while ($rowjadwal = mysql_fetch_array($queryshow)) {
           ?>
           <tr>
             <td><?php echo ++$no; ?></td>
             <td><?php echo $rowjadwal['jadwal_hari']; ?></td>
             <td><?php echo $rowjadwal['jadwal_mulai']; ?></td>
             <td><?php echo $rowjadwal['jadwal_selesai']; ?></td>
             <td><?php echo $rowjadwal['rooms_name']; ?></td>
             <td>
               <a href="" class="btn btn-primary"><span class="fa fa-check"></span> Aktifkan</a>
             </td>
           </tr>
          <?php } ?>
        </tbody>
      </table>
       </div>
     </div>
    </div>
  </section>