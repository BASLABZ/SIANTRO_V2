<?php 
    if (isset($_POST['simpan'])) {
      if ($_POST['coursename_status']=='opened') {
        $query = mysql_query("INSERT INTO ref_coursename
                                           (coursename_title, coursename_date, coursename_info,
                                            coursename_price, coursename_quota, coursename_status,coursename_con,coursename_ref,coursename_date_end) 
                              VALUES ('".$_POST['coursename_title']."',".$_POST['coursename_date'].", '".$_POST['coursename_info']."', '".$_POST['coursename_price']."', '".$_POST['coursename_quota']."', 'opened','".$_POST['coursename_con']."','".$_POST['coursename_ref']."','".$_POST['coursename_date_end']."')");  
      }else{
        $query = mysql_query("INSERT INTO ref_coursename
                                           (coursename_title, coursename_date, coursename_info,
                                            coursename_price, coursename_quota, coursename_status) 
                              VALUES ('".$_POST['coursename_title']."','".$_POST['coursename_date'].", '".$_POST['coursename_info']."', '".$_POST['coursename_price']."', '".$_POST['coursename_quota']."', '".$_POST['coursename_status']."','".$_POST['coursename_date_end']."')");
      }
      
      if ($query) {
            echo "<script> alert('Terimakasih Data Berhasil Disimpan'); location.href='index.php?hal=master/kursus/list' </script>";exit;
       } 
    }
 ?>
  <section class="content-header">
      <h1>
        Tambah Master Kursus
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="index.php?hal=master/kursus/list">Master</a></li>
        <li class="active">Tambah</li>
        <li class="active">Kursus</li>
      </ol>
  </section>
      <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tambah Data Member</h3>
            </div>
            <div class="box-body">
              <form id="defaultForm" class="role" method="POST">
            <div class="form-group row">
              <label class="col-md-3">Judul Kursus</label>
              <div class="col-md-9">
                <input type="text" required="" class="form-control" placeholder="Judul Kursus" name="coursename_title">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-3">Deskripsi Kursus</label>
              <div class="col-md-9">
                <textarea class="form-control" required="" name="coursename_info" placeholder="Deskripsi Kursus" style="height: 250px;" id="summerBas"></textarea>
              </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">Harga</label>
                <div class="col-md-4">
                  <input type="number" class="form-control" required="" name="coursename_price">
                </div>
                <label  class="col-md-2" align="right">Kuota</label>
                <div class="col-md-2">
                  <input type="number" class="form-control" required="" name="coursename_quota">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-3">Status Kursus</label>
              <div class="col-md-2">
                <select class="form-control" name="coursename_status">
                  <option>Pilih status</option>
                  <option value="opened">BUKA</option>
                  <option value="upcoming">AKAN DIBUKA</option>
                </select>
              </div>
              <label class="col-md-1">Mulai</label>
              <div class="col-md-2"><input type="text" class="form-control " id="datepicker_mulai" name="coursename_date"></div>
              <label class="col-md-1">Penutupan</label>
              <div class="col-md-2"><input type="text" class="form-control " id="datepicker_penutupan" name="coursename_date_end"></div>
            </div>
            <div class="form-group row">
              <label class="col-md-3">Status Bersyarat</label>
              <div class="col-md-4">
              <!-- kaya gini ener engga yaaa  mau nambah yg item di hidden itu, munculnya kalau ada aksi tertentu-->
                <select class="form-control" name="coursename_con" id="kondisi_bersyarat">
                  <option>Pilih Kondisi</option>
                  <option value="Y">YA</option>
                  <option value="N">TIDAK</option>
                </select>
              </div>
            </div>
            
            <div class="form-group row" id="referensi" hidden>
              <label class="col-md-3">Pilih Referensi Kursus</label>
              <div class="col-md-6">
                <select class="form-control" name="coursename_ref" >
                  <option value="">Pilih Nama Kursus</option>
                  <?php $queryKursus = mysql_query("SELECT * FROM ref_coursename order by coursename_id ASC");
                      while ($kursus = mysql_fetch_array($queryKursus)) {
                   ?>
                    <option value="<?php echo $kursus['coursename_id']; ?>"><?php echo $kursus['coursename_title']; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-info pull-right" name="simpan"><span class="fa fa-save"></span> Simpan</button>
            </div>
          </form>
            </div>
          </div>
        </div>
      </div>
    </section>
<script type="text/javascript">
// validasi status bersyarat

$(document).ready(function() {
    $('#defaultForm').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            coursename_title: {
                validators: {
                    notEmpty: {
                        message: 'Judul Kursus harus diisi'
                    }
                }
            },
             coursename_date: {
                validators: {
                    notEmpty: {
                        message: 'Tanggal Periode Kursus harus diisi'
                    }
                }
            },
             coursename_info: {
                validators: {
                    notEmpty: {
                        message: 'Deskripsi Kursus harus diisi'
                    }
                }
            },
             coursename_price: {
                validators: {
                    notEmpty: {
                        message: 'Biaya harus diisi'
                    }
                }
            },
            coursename_quota: {
                validators: {
                    notEmpty: {
                        message: 'Kuota Kursus harus diisi'
                    }
                }
            },
            coursename_status: {
                validators: {
                    notEmpty: {
                        message: 'Status Kursus harus diisi'
                    }
                }
            },

        }
    });
});
</script>
