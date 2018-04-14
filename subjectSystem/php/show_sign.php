<?php
	$page = $_GET['p'];
	//$name = $_GET['name'];
	//$name = $_GET['myname'];//登录用户--教师的名字
	//$name = urldecode($_COOKIE['username']);
	//$classname = $_GET['oldname'];//课程名字
	$name = urldecode($_COOKIE['username']);//利用cookie得到用户名
	//$id = $_GET['id'];
	$id = urldecode($_COOKIE['userid']);
	$myclassid = urldecode($_COOKIE['myclassid']);
	$classname = urldecode($_COOKIE['myclass']);//课程名
	//$classname = $_GET['myclass'];
	$sql = "SELECT * FROM stusubject WHERE teacherid = '$id' AND subjectname = '$classname' AND classid ='$myclassid' LIMIT  ".($page*5).",5";
	require_once('mysql.php');
	require_once('sign_mysql.php');