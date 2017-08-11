<?php 
		$query = mysql_query("SELECT * FROM  trx_saldo LEFT JOIN tbl_member ON tbl_member.member_id=trx_saldo.member_id_fk WHERE saldo_id='".$_GET['id']."' and saldo_status='Request' ");
		$detail = mysql_fetch_array($query);
        $idmember = $detail['member_id_fk'];


		if (isset($_POST['clearcair'])) {
            //upload bukti
            $lokasi_file    = $_FILES['frm_bukticair']['tmp_name'];
            $tipe_file      = $_FILES['frm_bukticair']['type'];
            $nama_file      = $_FILES['frm_bukticair']['name'];
            $acak           = rand(000000,999999);
            $nama_file_unik = $acak.$nama_file; 
                
            $vdir_upload = "../../menejemen/upload/saldo/";
            $vfile_upload = $vdir_upload . $nama_file_unik;
            $tipe_file   = $_FILES['frm_bukticair']['type'];

            if(move_uploaded_file($_FILES["frm_bukticair"]["tmp_name"], $vfile_upload)){
    		  $q_update = mysql_query("UPDATE trx_saldo SET saldo_status='clear',saldo_image='".$nama_file_unik."' WHERE saldo_id='".$_POST['frm_saldoid']."' ");	
                echo "<script> alert('Berhasil mencairkan saldo.'); location.href='index.php?hal=saldo/list' </script>";exit;
            } else {
                echo "<script> alert('Gagal mengupload berkas, mohon ulangi.'); location.href='index.php?hal=saldo/list' </script>";exit;
            }   
		  
		}

 ?>
  <section class="content-header">
      <h1>Verfikasi Pencairan</h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="index.php?hal=pembayaran/pembayaran">Pembayaran</a></li>
        <li class="active">Verifikasi Pembayaran</li>
      </ol>
  </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Verifikasi Pencairan</h3>
            </div>
            <div class="box-body">
             <div class="col-md-12">
             <form class="role" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="frm_saldoid" value="<?php echo $detail['saldo_id']; ?>">
                <div class="form-group row">
                    <label class="col-md-6">TANGGAL Permohonan Pencairan</label>
                    <label class="col-md-6"><?php echo $detail['saldo_date']; ?></label>
                </div>
                <div class="form-group row">
                    <label class="col-md-6">NAMA MEMBER</label>
                    <label class="col-md-6"><?php echo $detail['member_name']; ?></label>
                </div>
                <div class="form-group row">
                    <label class="col-md-6">NO REKENING</label>
                    <label class="col-md-6"><?php echo $detail['saldo_rekening']; ?></label>
                </div>
                <div class="form-group row">
                    <label class="col-md-6">NAMA BANK</label>
                    <label class="col-md-6"><?php echo $detail['namebank']; ?></label>
                </div>
                <div class="form-group row">
                    <label class="col-md-6">TOTAL PENCAIRAN</label>
                    <label class="col-md-6"><?php echo $detail['saldo_total']; ?></label>
                </div>
                <div class="form-group row">
                    <label class="col-md-6">UPLOAD BUKTI PENCAIRAN</label>
                    <label class="col-md-6"><input type="file" name="frm_bukticair"> </label>
                </div>
                <div class="form-group row"> 			
	             		<div class="col-md-12">
	             			<button type="submit" name="clearcair" class="btn btn-success pull-right">UBAH STATUS</button>
	             		</div>
                </div>
             </form>
             	
             	
             </div>
            </div>
          </div>
        </div>
      </div>
    </section>
   