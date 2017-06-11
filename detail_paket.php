<?php 
		include 'menejemen/config/inc-db.php';
		$id = $_POST['id'];
		$queryDetail = mysql_query("SELECT * FROM ref_coursename where coursename_id='".$id."'");
		$row = mysql_fetch_array($queryDetail);
 ?>
<form class="role">
	<div class="form-group row">
		<label class="col-md-4">Nama Kursus</label>
		<div class="col-md-6">
			<input type="text" disabled="" value="<?php echo $row['coursename_title']; ?>" class="form-control">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-md-4">Kuota Kursus</label>
		<div class="col-md-6">
			<input type="text" disabled="" value="<?php echo $row['coursename_quota']; ?>" class="form-control">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-md-4">Harga Kursus</label>
		<div class="col-md-6">
			<input type="text" disabled="" value="<?php echo $row['coursename_price']; ?>" class="form-control" >
		</div>
	</div>
	<div class="form-group row">
		<label class="col-md-4">Status Kursus</label>
		<div class="col-md-6">
			<label><span class="fa fa-tag fa-2x"></span> <?php echo $row['coursename_status']; ?></label>
		</div>
	</div>
	
	<div class="form-group row">
		<label class="col-md-4">Deskripsi Kursus</label>
		<div class="col-md-6">
			<p>
				<?php echo $row['coursename_info']; ?>
			</p>
		</div>
	</div>
						<!-- ==nambah disini utk cek/lihat silabus== -->
	<!-- tambahkan link atau button yg mentrigeer untuk melihat detail silabus , kaya misal  kalau halaman download pdf  -->
	<?php $querySilabus=mysql_query("SELECT silabus_file from ref_silabus where coursename_id_fk='".$id."'");
			$qS = mysql_fetch_array($querySilabus);
	?>
	</form>
	<a href="menejemen/upload/silabus/<?php echo $qS['silabus_file'] ?>" target="_blank"><button class="btn btn-rounded btn-primary">Lihat Silabus
</button></a>
</form>