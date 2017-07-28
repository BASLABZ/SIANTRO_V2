  <?php 
    $ambilpembagiankelas = mysql_fetch_array(mysql_query("SELECT * FROM tbl_bagimember where member_id_fk = '".$_SESSION['member_id']."'"));
    $idselectclass = $ambilpembagiankelas['selectcalss_id'];
   ?>
    <div id="process" class="process content-section bg-light">
      <div class="container">
        
        <div class="row">
           <div class="col-md-12">
           <div class="panel-group" id="accordion">
                   <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                          <h1><span class="fa fa-list"></span> Control Panel</h1></a>
                   <div id="collapse3" class="panel-collapse collapse">
                       <div class="container">
                         <div class="row">
                           <div class="col-md-12">
                             <?php include 'control-panel.php'; ?>
                           </div>
                         </div>
                       </div>
                      </div>
                  </div>
        </div>
          <div class="col-md-12">
            <div class="process-item highlight text-center">
              <div class="process-item-icon">
               <h1 class="process-item-title">
              <span class="fa fa-calendar"></span>JADWAL KURSUS :
               </h1>
           
              </div>
              <div class="process-item-content"> 
              <button class="btn btn primary " style="pull-right">Cetak Jadwal </button>
             <table class="table table-resposive table-hover table-bordered">
              <thead>
                <th>No</th>
                <th>JENIS</th>
                <th>HARI/TANGGAL</th>
                <th>JAM MULAI</th>
                <th>JAM SELESAI</th>
                <th>RUANG</th>
              </thead>
              <tbody>
                <?php $no = 0;
                    $queryshow = mysql_query("SELECT * FROM tbl_jadwal j JOIN ref_rooms r ON j.rooms_id_fk = r.rooms_id where  j.jadwal_jenis !='UJIAN' and j.selectcalss_id_fk = '".$idselectclass."' ");
                  // print_r("SELECT * FROM tbl_jadwal j JOIN ref_rooms r ON j.rooms_id_fk = r.rooms_id where  j.jadwal_jenis !='UJIAN' and j.selectcalss_id_fk = '".$idselectclass."' ");
                    while ($rowjadwal = mysql_fetch_array($queryshow)) {
                 ?>
                 <tr>
                   <td><?php echo ++$no; ?></td>
                   <td><?php echo $rowjadwal['jadwal_jenis']; ?></td>
                   <td><?php echo $rowjadwal['jadwal_tanggal']; ?></td>
                   <td><?php echo $rowjadwal['jadwal_mulai']; ?></td>
                   <td><?php echo $rowjadwal['jadwal_selesai']; ?></td>
                   <td><?php echo $rowjadwal['rooms_name']; ?></td>
                  
                 </tr>
                <?php } ?>
              </tbody>
            </table>
                
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="process-item highlight text-center">
              <div class="process-item-icon">
               <h1 class="process-item-title">
              <span class="fa fa-calendar"></span>JADWAL UJIAN KURSUS :
               </h1>
           
              </div>
              <div class="process-item-content"> 
             <table class="table table-resposive table-hover table-bordered">
              <thead>
                <th>No</th>
                <th>JENIS</th>
                <th>HARI/TANGGAL</th>
                <th>JAM MULAI</th>
                <th>JAM SELESAI</th>
                <th>RUANG</th>
              </thead>
              <tbody>
                <?php $no = 0;
                    $queryshow = mysql_query("SELECT * FROM tbl_jadwal j JOIN ref_rooms r ON j.rooms_id_fk = r.rooms_id where  j.jadwal_jenis ='UJIAN' and j.selectcalss_id_fk = '".$idselectclass."' ");
                    while ($rowjadwal = mysql_fetch_array($queryshow)) {
                 ?>
                 <tr>
                   <td><?php echo ++$no; ?></td>
                   <td><?php echo $rowjadwal['jadwal_jenis']; ?></td>
                   <td><?php echo $rowjadwal['jadwal_tanggal']; ?></td>
                   <td><?php echo $rowjadwal['jadwal_mulai']; ?></td>
                   <td><?php echo $rowjadwal['jadwal_selesai']; ?></td>
                   <td><?php echo $rowjadwal['rooms_name']; ?></td>
                  <!-- $_SESSION['tgl_ujian']= -->
                 </tr>

                <?php } ?>
              </tbody>
            </table>
                
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  
