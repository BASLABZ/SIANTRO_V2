
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
              <span class="fa fa-list"></span>DOWNLOAD MASTERI :
               </h1>
           
              </div>
              <div class="process-item-content"> 

                <table id="tableMaster" class="table table-bordered table-hover">
             <thead>
               <th>No</th>
               <th>Judul Materi</th>
               <th>Nama Kursus</th>
               <th>Tanggal Upload</th>
               <th>Jenis File</th>
               <th>File</th>
               <th>Pengajar</th>
               <th>Aksi</th>
             </thead> 
             <tbody>
               <?php 
                $no = 0;
                $queryMaterial = mysql_query("SELECT * FROM tbl_bagimember bagi join tbl_selectclass s on bagi.selectcalss_id = s.selectcalss_id JOIN ref_operator o ON s.operator_id_fk = o.operator_id JOIN ref_rooms r ON s.rooms_id = r.rooms_id JOIN ref_coursename c ON s.coursename_id = c.coursename_id JOIN trx_coursematerial ck ON c.coursename_id = ck.coursename_id_fk where bagi.member_id_fk = '".$_SESSION['member_id']."'");
                while ($rowMeteri = mysql_fetch_array($queryMaterial)) {
                ?>
                 <tr>
                    <td><?php echo ++$no; ?></td>
                    <td><?php echo $rowMeteri['coursematerial_title']; ?></td>
                    <td><?php echo $rowMeteri['coursename_title']; ?></td>
                    <td><?php echo $rowMeteri['coursematerial_dateofposted']; ?></td>
                   
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
                       <a href="menejemen/upload/materi/<?php echo $rowMeteri['coursematerial_file']; ?>" class="btn btn-info" target="_BLANK"> <span class="fa fa-download"></span> download</a>
                    </td>

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
  
