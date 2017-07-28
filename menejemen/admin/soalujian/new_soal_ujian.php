<?php 
		$id = $_GET['id'];
		$query = mysql_query("SELECT * FROM  trx_soalexam s JOIN ref_coursename c ON s.coursename_id_fk = c.coursename_id JOIN ref_operator o ON s.operator_id_fk = o.operator_id where s.soalexam_id = '".$id."'");
		$row = mysql_fetch_array($query);
    // hapus data
    if (isset($_GET['hapus']) && isset($_GET['id'])) {
      $hapus = mysql_query("DELETE FROM trx_exam where exam_id = '".$_GET['hapus']."'");
      if ($hapus) {
        echo "<script> alert('Terimakasih Data Berhasil Disimpan'); location.href='index.php?hal=soalujian/new_soal_ujian&id=".$_GET['id']."' </script>";exit;
      }
    }

    // jawab 
    if (isset($_POST['jawab'])) {
      $jawab = mysql_query("UPDATE trx_exam set exam_true='".$_POST['exam_true']."' where exam_id = '".$_POST['idupdate']."'");
        echo "<script> alert('Terimakasih Data Berhasil Diubah'); location.href='index.php?hal=soalujian/new_soal_ujian&id=".$id."' </script>";exit;
    }
		
 ?>
   <section class="content-header">
      <h1>
        Nama Kursus : <?php echo $row['coursename_title']; ?> | Nama Soal : <?php echo $row['soalexam_title']; ?>
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"></a></li>
        <li class="active">Daftar Soal Ujian</li>
      </ol>
  </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> <a href="index.php?hal=soalujian/new_add_soal&id=<?php echo $row['soalexam_id']; ?>" class="btn btn-success"> <span class="fa fa-plus"></span> Tambah Soal</a> <br/>
            </div>
            <div class="box-body">
              <table id="tableMasterScroll" class="table table-bordered table-hover">
                <thead>
                  <th><center>No</center></th>
                  <th><center>Pertanyaan</center></th>
                  <th><center>A</center></th>
                  <th><center>B</center></th>
                  <th><center>C</center></th>
                  <th><center>D</center></th>
                  <th><center>E</center></th>
                  <th><center>Jawaban</center></th>
                  <th><center>Action</center></th>
                </thead>
                <tbody>
                  <?php 
                  // tambahin where 
                    $no=0;
                      $query = mysql_query("SELECT * FROM   trx_exam JOIN trx_soalexam
                      on trx_soalexam.soalexam_id=trx_exam.soalexam_id_fk where soalexam_id_fk='".$id."' order by exam_id asc
                        ");
                      while ($rowselect  = mysql_fetch_array($query)) {
                        
                   ?>
                   <tr>
                     <td><?php echo ++$no; ?></td>
                     <td width="20%"><?php echo $rowselect['exam_title']; ?></td>
                     <td><?php echo $rowselect['exam_option1']; ?></td>
                     <td><?php echo $rowselect['exam_option2']; ?></td>
                     <td><?php echo $rowselect['exam_option3']; ?></td>
                     <td><?php echo $rowselect['exam_option4']; ?></td>
                     <td><?php echo $rowselect['exam_option5']; ?></td>
                     <td>
                       <form class="role" method="POST">
                        <h3>Jawaban Yang Benar : 
                          <?php 
                            if ($rowselect['exam_true']==$rowselect['exam_option1']) {
                              echo "A";
                            } elseif ($rowselect['exam_true']==$rowselect['exam_option2']) {
                              echo "B";
                            } elseif ($rowselect['exam_true']==$rowselect['exam_option3']) {
                              echo "C";
                            } elseif ($rowselect['exam_true']==$rowselect['exam_option4']) {
                              echo "D";
                            } else {
                              echo "E";
                            }
                          ?>
                        </h3>
                        <input type="hidden" name="idupdate" value="<?php echo $rowselect['exam_id']; ?>">
                         <select class="form-control" name="exam_true">
                           <option value="">JAWBAN YANG BENAR</option>
                           <option value="<?php echo $rowselect['exam_option1']; ?>"><?php echo $rowselect['exam_option1']; ?></option>
                           <option value="<?php echo $rowselect['exam_option2']; ?>"><?php echo $rowselect['exam_option2']; ?></option>
                           <option value="<?php echo $rowselect['exam_option3']; ?>"><?php echo $rowselect['exam_option3']; ?></option>
                           <option value="<?php echo $rowselect['exam_option4']; ?>"><?php echo $rowselect['exam_option4']; ?></option>
                           <option value="<?php echo $rowselect['exam_option5']; ?>"><?php echo $rowselect['exam_option5']; ?></option>
                         </select> 
                         <button type="submit" name="jawab" class="btn btn-xs btn-warning">JAWAB</button>
                       </form>
                     </td>
                     <td>
                     <a href="index.php?hal=soalujian/new_soal_ujian&id=<?php echo $rowselect['soalexam_id']; ?>" class="btn btn-xs btn-success"> <span class="fa fa-plus"></span> Buat Soal Ujian</a>
                     
                     <a href="index.php?hal=soalujian/new_edit_soal&id=<?php echo $rowselect['soalexam_id']; ?>" class="btn btn-xs btn-primary"> <span class="fa fa-pencil"></span> Edit</a>
                     
                     <a href="index.php?hal=soalujian/new_soal_ujian&hapus=<?php echo $rowselect['exam_id']; ?>&id=<?php echo $rowselect['soalexam_id_fk']; ?>" class="btn btn-xs btn-danger"> <span class="fa fa-eye"></span> hapus</a>
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