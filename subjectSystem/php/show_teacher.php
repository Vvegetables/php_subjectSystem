<?php
	require_once('mysql.php');
	$sql = "SELECT * FROM teacher LIMIT ".($page*5).",5";
	//sql执行
	require_once('teacher_mysql.php');