<?php
	require_once('mysql.php');
	$sql = "SELECT DISTINCT subjectname FROM detailofsign WHERE studentid = '$studentid' AND classnums = '1' LIMIT ".($page*5).",5";
	//sql执行
	require_once('encodestu_mysql.php');