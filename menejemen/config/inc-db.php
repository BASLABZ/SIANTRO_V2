<?php 
		mysql_connect("localhost",'root','') or die("Server off");
		mysql_select_db("siantrougm") or die("database not found");
		
		// function for sql date 
			function jin_date_sql($date){
				$exp = explode('/',$date);
				if(count($exp) == 3) {
					$date = $exp[2].'-'.$exp[1].'-'.$exp[0];
				}
				return $date;
			}
			function jin_date_str($date){
				$exp = explode('-',$date);
				if(count($exp) == 3) {
					$date = $exp[2].'/'.$exp[1].'/'.$exp[0];
				}
				return $date;
			}
 ?>