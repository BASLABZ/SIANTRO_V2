<?php 
  
  //cek data akun sdh lengkap belum
  $cek = mysql_query("SELECT member_name, member_address, member_image FROM tbl_member WHERE member_id='".$_SESSION['member_id']."' ");
  $n_cek = mysql_fetch_array($cek);
  if ($n_cek['member_address']=='') {
    echo "<script> alert('Mohon lengkapi data akun terlebih dahulu'); location.href='index.php?hal=settingakun';</script>  ";exit;
  }

  $q_saldo = ("SELECT * FROM trx_saldo 
                                        LEFT JOIN trx_confirmation_ofpayment
                                        ON trx_confirmation_ofpayment.confirmation_id=
                                        trx_saldo.confirmation_id_fk
                                        LEFT JOIN tbl_trainee
                                        ON tbl_trainee.trainee_id=trx_confirmation_ofpayment.trainee_id_fk
                                        LEFT JOIN tblx_trainee_detail
                                        ON tblx_trainee_detail.trainee_id_fk=tbl_trainee.trainee_id
                                        LEFT JOIN ref_coursename
                                        ON ref_coursename.coursename_id=tblx_trainee_detail.coursename_id_fk
                                        WHERE tbl_trainee.member_id_fk='".$_SESSION['member_id']."' ");

  $d_saldo = mysql_fetch_array(mysql_query($q_saldo));
  $q_saldo2 = mysql_query($q_saldo);

?>


    <div id="process" class="process content-section bg-light">
      <div class="container">
        
        <div class="row">

          <div class="col-md-12">
            <div class="process-item highlight text-center">
              <div class="process-item-icon">
                  <h3><span class="fa fa-user-o"></span> Hallo <b><?php echo $n_cek['member_name']; ?></b> <img src="menejemen/upload/memberimage/<?php echo $_SESSION['member_image'] ?>" class="img-circle" style='width: 80px; height: 80px;'> Selamat Datang di Pelatihan Kursus Antropologi Forensik </h3>
                  <h3><span class="fa fa-gear fa"></span> Control Panel</h3>
               
              </div>
                <center>
                    <div class="panel panel-success" style="max-width: 300px">
                      <div class="panel-heading" style="background-color:#26ad5f;">
                        <h4 style="color: #fff">Saldo Anda</h4>
                      </div>
                      <div class="panel-body">
                        <h4>
                          <b>
                          <?php
                            if ($d_saldo=='') {
                                echo "Rp 0";
                            } else {
                              echo "Rp.".number_format($d_saldo['saldo_total'],2,",",".");
                            }  ?>
                            
                          </b>
                        </h4><br/>
                         <a href='#detail_paket'  id='custId' data-toggle='modal' data-id="<?php echo $rowPaket['coursename_id']; ?>" class="btn btn-warning btn-md btn-block btn-md" style='color: white;'><span class='fa fa-eye'></span> Cek Detail</a>
                        
                      </div>
                    </div>
                </center>
              <div class="process-item-content" style="margin-top: 2em"> 
                 <div class="row">
                    <div class="col-md-3 col-sm-6">
                      <div class="process-item highlight text-center">
                        <div class="process-item-icon" style="padding-bottom:10px; ">
                          <span class="fa fa-user-o"></span>
                        </div>
                        <div class="process-item-content">
                         <a href="index.php?hal=settingakun"> <label>Pengaturan Akun</label> </a>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                      <div class="process-item highlight text-center">
                        <div class="process-item-icon" style="padding-bottom:10px; ">
                          <span class="fa fa-list"></span>
                        </div>
                        <div class="process-item-content"> 
                       <a href="index.php?hal=paketkursus/list"> <label>Paket Kursus</label></a>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                      <div class="process-item highlight text-center">
                        <div class="process-item-icon" style="padding-bottom:10px; ">
                          <span class="fa fa-calendar"></span>
                        </div>
                        <div class="process-item-content"> 
                       <a href="index.php?hal=member_jadwal"> <label>Jadwal</label></a>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                      <div class="process-item highlight text-center">
                        <div class="process-item-icon" style="padding-bottom:10px; ">
                          <span class="fa fa-book"></span>
                        </div>
                        <div class="process-item-content">
                        <a href="index.php?hal=donwloadmateri/list"><label>Download Materi</label> </a>
                        </div>
                      </div>
                    </div>

                      <div class="col-md-3 col-sm-6">
                      <div class="process-item highlight text-center">
                        <div class="process-item-icon" style="padding-bottom:10px; ">
                          <span class="fa fa-list"></span>
                        </div>
                        <div class="process-item-content"> 
                       <a href="index.php?hal=pembayaran/list"> <label>Transaksi Pembayaran</label></a>
                        </div>
                      </div>
                    </div>

                     <div class="col-md-3 col-sm-6">
                      <div class="process-item highlight text-center">
                        <div class="process-item-icon" style="padding-bottom:10px; ">
                          <span class="fa fa-check"></span>
                        </div>
                        <div class="process-item-content"> 
                       <a href="index.php?hal=member-nilai"> <label>Nilai</label></a>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                      <div class="process-item highlight text-center">
                        <div class="process-item-icon" style="padding-bottom:10px; ">
                          <span class="fa fa-desktop"></span>
                        </div>
                        <div class="process-item-content">
                        <a href="index.php?hal=exam/list"><label>Ujian </label> </a>
                        </div>
                      </div>
                    </div>

                     <div class="col-md-3 col-sm-6">
                      <div class="process-item highlight text-center">
                        <div class="process-item-icon" style="padding-bottom:10px; ">
                          <span class="fa fa-star"></span>
                        </div>
                        <div class="process-item-content">
                      <a href="index.php">  <label>Sertifikat </label> </a>
                        </div>
                      </div>
                    </div>


                 </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>

<div class="modal fade" id="detail_paket" role="dialog" >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #1ab394; color:white;">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><span class="fa fa-list"></span> Detail Saldo</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                          <label class="col-md-3">Nama</label>
                          <div class="col-md-6">
                            <?php echo $_SESSION['member_name']; ?>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3">Saldo Anda</label>
                          <div class="col-md-6">
                            <?php echo "Rp.".number_format($d_saldo['saldo_total'],2,",","."); ?>
                          </div>
                          <div class="col-md-2">
                            <a href='#modal_cairkan'  id='custId' data-toggle='modal' data-id="<?php echo $rowPaket['coursename_id']; ?>" class="btn btn-warning">Cairkan Saldo</a>
                          </div>
                        </div>
                      <table class="table table-striped table-bordered">

                        <tr>
                          <th>Tanggal</th>
                          <th>Keterangan</th>
                          <th>Nominal</th>
                        </tr>
                        <tr>
                        <?php 
                          while ($row_saldo = mysql_fetch_array($q_saldo2)) { ?>
                            <td><?php echo date('d-m-Y', strtotime($row_saldo['saldo_date'])); ?></td>
                            <td><?php echo "Kelebihan ".$row_saldo['confirmation_category']." ".$row_saldo['coursename_title']; ?></td>
                            <td><?php echo "Rp.".number_format($d_saldo['saldo_total'],2,",","."); ?></td> <?php
                          }
                        ?>
                        </tr>
                      </table>  
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger dim_about" data-dismiss="modal"><span class="fa fa-times"></span> Keluar</button>
                    </div>
                </div>
            </div>
    </div>

    <div class="modal fade" id="modal_cairkan" role="dialog" >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #1ab394; color:white;">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><span class="fa fa-list"></span> Detail Paket Kursus</h4>
                    </div>
                    <!-- -======================================== -->
                    <div class="modal-body">
                       <div class="form-group row">
                          <label class="col-md-3">Nama</label>
                          <div class="col-md-6">
                          <input type="text" disabled="" value="<?php echo $_SESSION['member_name']; ?>" class="form-control">
                            
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3">No Rekening Tujuan</label>
                          <div class="col-md-6">
                            <input type="text" disabled="" value="<?php echo $d_saldo['confirmation_accountnumber']; ?>" class="form-control">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3">Jumlah Cairkan saldo </label>
                          <div class="col-md-6">
                          <input type="text" disabled="" value="<?php echo "Rp.".number_format($d_saldo['saldo_total'],2,",","."); ?>" class="form-control">
                            
                          </div>
                        </div>
                        <div class="form-group row">
                        <label class="col-md-3">Password Anda</label>
                          <div class="col-md-6">
                          <input type="password" value="" placeholder="Masukkan Password akun anda " required="" class="form-control">
                          
                          </div>
                        </div>
                          <div class="col-md-2">
                            <a href='#modal_cairkan'  id='custId' data-toggle='modal' data-id="" class="btn btn-warning">Cairkan Saldo</a>
                          </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger dim_about" data-dismiss="modal"><span class="fa fa-times"></span> Keluar</button>
                    </div>
                </div>
            </div>
    </div>