<?php
function countdown($time_end)
{
    $rem = $time_end - time();
    $day = floor($rem / 86400);
    $hr  = floor(($rem % 86400) / 3600);
    $min = floor(($rem % 3600) / 60);
    $sec = ($rem % 60);
    return array('day' => $day, 'hour' => $hr, 'minute' => $min, 'second' => $sec);
}

$timer = countdown($_GET['time_end']);
if($timer['hour'] <= 0){
	// tambah notifikasi nya disini :)
	// kasih tau waktu Ujian telah selesai trus kmn ?

	echo 'Waktu selesai';
} else {
	echo $timer['hour'].':'.$timer['minute'].':'.$timer['second'];
}
// exit;
