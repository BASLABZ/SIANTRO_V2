
<section class="content-header">
      <h1>
        Tambah Master Level
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="index.php?hal=master/level/list">Master</a></li>
        <li class="active">Tambah</li>
        <li class="active">Fasilitas</li>
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
          <h3 class="box-title">Tambah Data Fasilitas Hak Akses</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <div class="box-body">
          <form class="role" method="POST">
            <div class="form-group row">
              <label class="col-md-4">Fasilitas Hak akses</label><br/><br/>
              <div class="">
                <?php 
		             $q_show1 = "SELECT menu_id, menu_name FROM ref_menu";
		               $r_show1 = mysql_query($q_show1);
		  							$jumlah=0;
		                        while ($data_show1=mysql_fetch_array($r_show1)) {
		                              $var_menuid1 = $data_show1['menu_id'];
		                              $var_menuname1 = $data_show1['menu_name'];
		                              $jumlah++;
		                                
		                              $var_idbaru = $var_menuid1; ?>

		                      <div class="col-sm-6">
                            <input type="checkbox" data-toggle="switch" value=<?php echo $var_menuid1 ?> name=<?php echo "menu".$jumlah ?>> <?php echo $var_menuname1 ?><br/> 
                          </div>

                           <?php 
                                }//tutup while
                            ?>

              </div>
            </div> 
            <div class="form-group col-sm-8">
            <input type="hidden" value="<?php echo $var_idlevel?>" name="id_level">
              <button class="btn btn-primary btn-sm pull-right" type="submit" name="btn_submit"><span class="fa fa-save"></span> Simpan</button>
            </div>
          </form>
       
          
        </div>
      </div>
    </div>
  </section><br/>

<?php
//error_reporting(0);
    $varlevelId=$_POST['id_level'];

		$sqlMenu="SELECT menu_id, menu_name, menu_parent FROM ref_menu";
		$runsql=mysql_query($sqlMenu);
		$var_jmlmenu=mysql_num_rows($runsql);

	//perulangan data
	for ($var_i=0; $var_i<$var_jmlmenu ; $var_i++) { 
			$var_menu=$_POST['menu'.$var_i];
			// echo "Yang dipilih: ".$var_menu."<br>";
			if ($var_menu!='') { //jika var_menu tidak ksong maka increment kan var_jumlah 
					$sqlsave="INSERT into trx_level_menu(level_id_fk,menu_id_fk) values('$varlevelId','$var_menu')";
            // echo $sqlsave; exit();
					$run_sqlsave=mysql_query($sqlsave);	
									$var_sukses=1;

		}//tutup for
}

	if ($var_sukses==1) {
		echo "<script> alert('Terimakasih Data Hak Akses Berhasil Disimpan'); location.href='index.php?hal=master/level/list' </script>";
	}else{
		echo"Maaf anda belum mengisi fasilitas !";
		header("location:level-menuadd.php");
	}



?>