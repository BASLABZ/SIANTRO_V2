<?php
  $var_idLevel=($_GET['level_id']);
  error_reporting(0);
?>
<section class="content-header">
      <h1>
        Update Hak Akses
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master</a></li>
        <li class="active">Update</li>
        <li class="active">Hak akses</li>
      </ol>
  </section>

<!-- ================================================================ -->
  <section class="content">
  <?php //coba ambil data level (id_level) berdasrkan dari page list(level).php

             $var_idLev =($_GET['level_id']);
              $sqlShow = "SELECT level_id, level_name from ref_level where level_id='".$var_idLev."'";
              // echo $sqlShow; exit();
              $runsql =mysql_query($sqlShow);

              $var_data=mysql_fetch_array($runsql);
              $var_idlevel=$var_data['level_id'];
              $var_namaLev = $var_data['level_name']; ?>
    <div class="">
          <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Ubah Data Fasilitas Hak Akses</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <div class="box-body">
          <form class="role" method="POST">
            <div class="form-group row">
              <label class="col-md-4">Fasilitas Hak akses anda </label><br/><br/>
              <div class="">
                <?php 
		             $var_show = "SELECT menu_id, menu_name from ref_menu";
                 $var_sql = mysql_query($var_show);
                            
                 $var_i = 0; // penanda perulangan
                    while ($var_exec = mysql_fetch_array($var_sql)) {
                      $var_id = ($var_exec['menu_id']);
                      $var_nama = ($var_exec['menu_name']);
                      $var_i++;
                              //}
                            //================================================================================
                      $var_show1 = "SELECT menu_id_fk from trx_level_menu where level_id_fk='".$var_idLevel."'";
                      $var_sql1 = mysql_query($var_show1);

                          while ($var_data = mysql_fetch_array($var_sql1)) {
                              // $id = ($exec['id_pangkat']);
                            $var_menuku = ($var_data['menu_id_fk']);

                            if ($var_menuku==$var_id) { // membandingkan id_menu di TABEL MENU dan TABEL LEVEL_MENU ($id hanya satu dan dibandingkan dgn seluruh hasil $menuku)
                              $var_notice = 1; ?>

  		                      <div class="col-sm-6">
                              <input type="checkbox" data-toggle="switch" value=<?php echo $var_id ?> name=<?php echo "menu".$var_i ?> checked=""> <?php echo $var_nama ?><br/> 
                            </div> 

                      <?php 
                            $var_idbaru = $var_id;  
                            }// tutup if id
                            $var_notice = 0;
                          }//tutup while

                            if ($var_notice!=1 && $var_idbaru != $var_id) { // perlakuan default (menu tdk terdaftar dlm menuku) ?>
                              <div class="col-sm-6">
                                <input type="checkbox" data-toggle="switch"value="<?php echo $var_id ?>" name=<?php echo "menu".$var_i ?> ><?php echo $var_nama ?><br/>
                              </div>
                                <?php   
                                    } // tutup if notice
                                  }// tutup while yg awal (paling atas)
                            ?>

              </div>
            </div> 
            <div class="form-group col-sm-8">
            <input type="hidden" value="<?php echo $var_idlevel?>" name="id_level">
              <button class="btn btn-primary btn-sm pull-right" type="submit" name="btn_submit"><span class="fa fa-save"></span> Ubah </button>
            </div>
          </form>
       
          
        </div>
      </div>
    </div>
  </section><br/>

  <!-- sampai siniiiii ditttttttt -->

<?php
//error_reporting(0);
    $varlevelId=$_GET['id_level'];

		//record dibersihkan agar tidak jadi peumpukan/penyimpanan ganda data ketika hendak di-update
    $sql_clear="DELETE from trx_level_menu where level_id_fk='".$var_idLevel."'";
    $run_sqlclear=mysql_query($sql_clear);

    //menampilkan semua menu sesuai dengan database dit
    $sqlMenu="SELECT menu_id, menu_name, menu_parent from ref_menu";
    $runsql=mysql_query($sqlMenu);
    $var_jmlMenu=mysql_num_rows($runsql);

    for ($var_i=1; $var_i<=$var_jmlMenu ; $var_i++) {
      $var_Menu=($_POST['menu'.$var_i]);
  //echo "yang dipilih : ".$var_Menu;
  //exit();
       if ($var_Menu!='') {
        $var_saveMenu = "INSERT into trx_level_menu (level_id_fk, menu_id_fk) VALUES ('$var_idLevel','$var_Menu')"; 
        $varunsql = mysql_query($var_saveMenu);
      
        $varSukses=1;

      }

    }
    if ($varSukses==1) { 
      echo "<script> alert('Terimakasih Data Hak Akses Berhasil Diubah'); location.href='index.php?hal=master/level/list' </script>";exit;
    }//tutup if
      
?>

