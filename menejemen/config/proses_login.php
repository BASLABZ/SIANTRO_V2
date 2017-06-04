<?php 
		session_start();
		include 'inc-db.php';
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password = md5($password);

		$query = "SELECT operator_username, operator_password, operator_name, operator_login, operator_image, operator_id, ref_level.level_id, level_name,level_id FROM ref_operator left join ref_level on ref_level.level_id=ref_operator.operator_levelid_fk
		    WHERE operator_username='".$username."' AND operator_password='".$password."' ";
		$hasil = mysql_query($query);
		$data = mysql_fetch_array($hasil);
		$var_statusLogin= $data['operator_login'];
		
		if ($password == $data['operator_password'] and $data['operator_login']!='Y' )
		{
			mysql_query("UPDATE ref_operator SET operator_login='Y' WHERE operator_id='".$data['operator_id']."' ");
		echo "<script> alert('Login Sukses');</script>";
		    // menyimpan username dan level ke dalam session
		    $_SESSION['operator_id']       = $data['operator_id']; 
		    $_SESSION['level_id']    = $data['level_id'];
		    $_SESSION['level_name']  = $data['level_name'];
		    $_SESSION['operator_username']   = $data['operator_username'];
		     $_SESSION['operator_image'] = $data['operator_image'];
		    // $_SESSION['login_time'] = date('Y-m-d');
		    //Penggunaan Meta Header HTTP
		    if ($data['level_id']=='1'){
		        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../admin/index.php">';    
		    }else if($data['level_id']=='5'){
		        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../admin/index.php">';    
		    }
		    exit;
		}
		elseif($password == $data['operator_password'] and $data['operator_login']=='Y') {
		echo "<script> alert('Maaf Akun yang anda gunakan sedang aktif');</script>"; 
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../index.php">';    
		    exit;
		}
		else 
		echo "<script> alert('Proses Login Gagal Silahkan Melakukan Login Lagi');</script>"; 
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../index.php">';    
		    exit;
 ?>