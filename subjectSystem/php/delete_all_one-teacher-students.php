<?php
	$teachername = urldecode($_COOKIE['username']);//利用cookie得到用户名
	$classname = urldecode($_COOKIE['oldname']);//利用cookie得到课程名
	$oldclassid = urldecode($_COOKIE['oldclassid']);
	$teacherid = urldecode($_COOKIE['userid']);
	$sql = "DELETE FROM stusubject WHERE teacherid = '$teacherid' AND subjectname = '$classname' AND classid = '$oldclassid'";
	require_once('mysql.php');
	//require_once('stu_mysql.php');
	mysql_query($sql);
	echo "<script type = 'text/javascript'>
		 	var db = window.localStorage;
			var name = db.getItem('username');
			var id = db.getItem('userid');
			window.location.href = 'stu_num_frame.php?p=0' + '&name=' + name + '&id=' + id ; 
		</script>";