<?php 
    if (isset($_POST['simpan'])) {
      if (!empty($_FILES) && $_FILES['announcement_image']['size'] >0 && $_FILES['announcement_image']['error'] == 0){
            $announcement_image = $_FILES['announcement_image']['name'];
                          $move = move_uploaded_file($_FILES['announcement_image']['tmp_name'], '../upload/announcement/'.$announcement_image);

            if ($move) {
              $queryInsert  = mysql_query("INSERT INTO ref_announcement (announcement_dateofposted,
                                                            announcement_judul,announcement_description,
                                                            announcement_image,operator_id_fk)
                                                 VALUES (NOW(),'".$_POST['announcement_judul']."',
                                                          '".$_POST['announcement_description']."',
                                                          '".$announcement_image."','".$_SESSION['operator_id']."')");

            }else{
                $queryInsert  = mysql_query("INSERT INTO ref_announcement (announcement_dateofposted,
                                                              announcement_judul,announcement_description,
                                                              announcement_image,operator_id_fk)
                                                   VALUES (NOW(),'".$_POST['announcement_judul']."',
                                                            '".$_POST['announcement_description']."',
                                                            '','".$_SESSION['operator_id']."')");              
            }

      }
      if ($queryInsert) {
         echo "<script> alert('Data Berhasil Disimpan'); location.href='index.php?hal=master/announcement/list' </script>";exit;
      }
    }
 ?>
  <section class="content-header">
      <h1>
        Tambah Master Pengumuman
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master</a></li>
        <li class="active">Tambah</li>
        <li class="active">Pengumuman</li>
      </ol>
  </section>
   <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tambah Data Pengumuman</h3>
            </div>
            <div class="box-body">
              <form id="defaultForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                      <label class="col-md-3">Judul Pengumuman</label>
                      <div class="col-md-9">
                        <input type="text" required="" class="form-control" placeholder="Isi dengan Judul Pengumuman" name="announcement_judul">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-3">Topik Pengumuman</label>
                      <div class="col-md-9">
                        <textarea class="form-control" required="" name="announcement_description" placeholder="Deskripsi Pengumuman" style="height: 250px;" id="summerBas"></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Foto</label>
                        <div class="col-md-4">
                          <input type="file" class="form-control" required="" name="announcement_image">
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
$(document).ready(function() {
    $('#defaultForm').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            announcement_judul: {
                validators: {
                    notEmpty: {
                        message: 'Judul pengumuman harus diisi'
                    }
                }
            },
             announcement_description: {
                validators: {
                    notEmpty: {
                        message: 'Topik pengumuman harus diisi'
                    }
                }
            },
             announcement_image: {
                validators: {
                    notEmpty: {
                        message: 'Foto harus diisi'
                    }
                }
            }
        }
    });
});
</script>