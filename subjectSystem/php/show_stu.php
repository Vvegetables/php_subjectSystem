<?php
	$page = $_GET['p'];
	//$name = $_GET['name'];
	$name = urldecode($_COOKIE['username']);
	$id = urldecode($_COOKIE['userid']);
	$sql = "SELECT * FROM subinfo WHERE teachername = '$name' AND teacherid = '$id' LIMIT ".($page*5).",5";
	require_once('mysql.php');
	require_once('stu_mysql.php');