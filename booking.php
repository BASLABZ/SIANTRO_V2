  <?php 
  error_reporting(0);
    if ($_SESSION['member_id']=='') {
      echo "<script>alert('Maaf anda belum Login , silahkan Login sistem terlebih dahulu'); history.back(-1)</script>";
      exit();
    }
        if (isset($_GET['hapus'])) {
          $queryHapus  = mysql_query("DELETE FROM tbl_temp where temp_id='".$_GET['hapus']."'");
        }
        if (isset($_POST['simpan'])) {

          // ayo buat validasi bab quotaaanya disini 

            // ================================================================
                // $sqlCek=mysql_query("SELECT coursename_id, coursename_quota from ref_coursename where coursename_id='".$_GET['id']."'");
                // $dataCek=mysql_fetch_array($sqlCek);

                // if($dataCek['coursename_quota']<='0'){
                //     echo "<script> alert('Maaf, kuota Kursus yang Anda pilih sudah habis '); location.href='index.php?hal=booking' </script>";exit;
                //}
            // =====================================================================

            // $cek = mysql_query("SELECT * from "));
            // $lihatData= mysql_num_rows($cekTemp);
            // nambah validasi disini
            // if ($lihatData=='' || $lihatData=='0') {
            //    echo "<script>alert('Maaf, Belum ada Data Paket yang terpilih, silahkan plih Paket kursus anda '); history.back(-1)</script>";
            //    exit();
            // }

            $tahun = date('Y');
            $subtahun   = substr($tahun, 2);
            $queryCekI = mysql_query("SELECT * FROM  tbl_trainee order by trainee_id DESC");

            $RowKode = mysql_fetch_array($queryCekI);
            $kode = $RowKode['trainee_id']+1;

            $invoice    = "".$kode."/INV/".$subtahun.""; 

            $idkursus = $_POST['coursename_id_fk'];
            $quota  = $_POST['coursename_quota'];

            $queyINsertTraineee = mysql_query("INSERT INTO  tbl_trainee (trainee_inputdateconfirm,trainee_invoice_status,trainee_invoice,member_id_fk,trainee_inputdate) 
              VALUES ('','PENDING','".$invoice."','".$_SESSION['member_id']."',NOW())");
            $idtrainee = mysql_insert_id();
            
            $banyak = count($idkursus);
            for ($i=0; $i < $banyak; $i++) { 
              $kodeKursus = $idkursus[$i];
              $quotaKursus = $quota[$i];
              $hasilkurang = $quotaKursus-1;
              $queryINSERT = mysql_query("INSERT INTO tblx_trainee_detail (coursename_id_fk,trainee_status,trainee_id_fk)
               VALUES ('".$kodeKursus."','PENDING','".$idtrainee."')");


              $queryUPDATE = mysql_query("UPDATE ref_coursename set coursename_quota = '".$hasilkurang."'

                where coursename_id='".$kodeKursus."'");
              // nambah validasi disiniiii -----
              // ====================================================================
              // $dataUpdate=mysql_fetch_array($queryUPDATE);

              //   if($dataUpdate['coursename_quota']=='0'){
              //     $queryUPDATEstatus=mysql_query("UPDATE ref_coursename set coursename_status='clossed' where coursename_id='".$kodeKursus."'");

              //      // if($dataCek['coursename_quota']<='0'){
              //       // echo "<script> alert('Maaf, kuota Kursus yang Anda pilih sudah habis '); location.href='index.php?hal=booking' </script>";exit;
              //     // }
              //   }//tutup ifupdate
              }//tutup for

            // }
                
            $queryHapusTemp  = mysql_query("DELETE FROM tbl_temp WHERE member_id_fk = '".$_SESSION['member_id']."'");

            if ($queryHapusTemp) {
               echo "<script> alert('Terimakasih Data Berhasil Disimpan, Silahkan lakukan konfirmasi pembayarannya'); location.href='index.php?hal=pembayaran/pembayaran&invoice=$invoice' </script>";exit;
            }
            
            

        }//button simpan booking 
   ?>
    <div id="process" class="process content-section bg-light">
      <div class="container">
        
        <div class="row">

          <div class="col-md-12">
            <div class="process-item highlight text-center">
              <div class="process-item-icon">
               <h1 class="process-item-title">
              <span class="fa fa-list"></span> Daftar Booking Paket
               </h1>
               <h6><i>cek kembali data booking anda sebelum menekan tombol simpan, karena setelah anda menekan tombol simpan, maka ada aka diarahkan ke halaman konfirmasi pembayaran nya</i></h6>
           
              </div>
              <div class="process-item-content"> 
                <form method="POST">
                
              
              <table class="table table-resposive table-hover table-bordered">
                <thead>
                  <th>No</th>
                  <th>Nama Kursus</th>
                  <th>Sisa Kuota</th>
                  <th>Harga Paket</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </thead>
                <tbody>
                <?php 
                  $no=0;
                  $sqltemp  = mysql_query("SELECT * FROM tbl_temp t 
                                                      JOIN ref_coursename k 
                                                      ON t.coursename_id_fk = k.coursename_id
                                                      JOIN tbl_member m 
                                                      ON  t.member_id_fk = m.member_id
                                                       where t.member_id_fk = '".$_SESSION['member_id']."'");
                  while ($rowTemp = mysql_fetch_array($sqltemp)) {
                    // 27 juli 2017
                      if ($rowTemp['coursename_quota']==0) {
                        $penuh = 1; ?>

                        <input type="hidden" id="var_penuh" value="<?php echo $rowTemp['coursename_title'] ?>" <?php
                      }
                    // close 27 juli 2017
                 ?>
                  <tr>
                    <td><?php echo ++$no; ?></td>
                    <td>
                      <?php 
                          echo "<input type='hidden' name='coursename_id_fk[]' value='".$rowTemp['coursename_id_fk']."'>";
                          echo "<input type='hidden' name='coursename_quota[]' value='".$rowTemp['coursename_quota']."'>";
                       ?>
                      <?php echo $rowTemp['coursename_title']; ?></td>
                    <td><?php echo $rowTemp['coursename_quota']; ?></td>
                    <td><?php echo $rowTemp['coursename_price']; ?></td>
                    <td><?php echo $rowTemp['coursename_status']; ?></td>
                    <td><a href="index.php?hal=booking&hapus=<?php echo $rowTemp['temp_id']; ?>" class="btn btn-danger btn-flat"><span class="fa fa-trash"></span></a></td>
                  </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="3"><h3 align="right">Total Pembayaran :</h3></td>
                    <?php 
                        $queryCount = mysql_query("SELECT sum(coursename_price) as  
                                                      total FROM tbl_temp t 
                                                      JOIN ref_coursename k 
                                                      ON t.coursename_id_fk = k.coursename_id
                                                      JOIN tbl_member m 
                                                      ON  t.member_id_fk = m.member_id
                                                       where t.member_id_fk = '".$_SESSION['member_id']."'");
                        $loan_array = mysql_fetch_array($queryCount);
                        $totalPembayaran  = $loan_array['total'];
                     ?>
                    <td><h3 align="left">Rp. <?php echo $totalPembayaran; ?></h3> </td>
                  </tr>
                </tfoot>
              </table>
              <br/>
              <div class="row">
                <div class="col-md-2"><a href="index.php?hal=paket" class="btn btn-success"><span class="fa fa-arrow-left"></span> Kembali</a></div>
                <div class="col-md-8"></div>
                <?php 
                  //=============cek data akun sdh lengkap belum===================
            //====jika blm lengkap makan tidak boleh melkukan kofirmasi pembayaran dulu =====
                  $cek = mysql_query("SELECT member_address FROM tbl_member WHERE member_id='".$_SESSION['member_id']."' ");
                  $n_cek = mysql_fetch_array($cek);
                  if ($n_cek['member_address']=='') { ?>
                    <div class="col-md-2"><a href="index.php?hal=settingakun" onclick="ucing()" class="btn btn-success"><span class="fa fa-save"></span> Simpans</a></div> <?php
                  } else { 
                    if ($penuh!='') { ?>
                      <div class="col-md-2"><button type="button" name="simpan" class="btn btn-success" onclick="kebak()"><span class="fa fa-save"></span> Simpan</button>
                      </div> <?php
                    } else { ?>
                      <div class="col-md-2"><button type="submit" name="simpan" class="btn btn-success"><span class="fa fa-save"></span> Simpan</button>
                      </div> <?php
                    }
                  }
                ?>
              </div>
                </form>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
<!-- tambahaan js yaaa mak yaaa  -->
<script type="text/javascript">
  function ucing(){
    alert('Mohon lengkapi data');
    // document.getElementById('nyoh').click();
  }
  function kebak(){
    var a = document.getElementById('var_penuh').value;
    alert('Maaf Kuota Kursus '+a+' yang anda pilih sudah penuh');
    
  }
</script>