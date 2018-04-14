<?php
	require_once('mysql.php');
	$sql = "SELECT * FROM mytime LIMIT ".($page*5).",5";
	//sql执行
	require_once('time_mysql.php');