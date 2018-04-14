<?php
	$sql = "DELETE FROM mytime";
	require_once('mysql.php');
	require_once('time_mysql.php');
	echo "<script type = 'text/javascript'>window.location='time_iframe.php?p=0';</script>";
