<?php
	$teacherid = urldecode($_COOKIE['userid']);
	$sql = "DELETE FROM subinfo WHERE teacherid = '$teacherid'";
	require_once('mysql.php');
	//require_once('stu_mysql.php');
	mysql_query($sql);
	$sql = "DELETE FROM stusubject WHERE teacherid = '$teacherid'";
	mysql_query($sql);
	echo "<script type = 'text/javascript'>
		 	var db = window.localStorage;
			var name = db.getItem('username');
			var id = db.getItem('userid');
			window.location.href = 'firstPage.php?p=0' + '&name=' + name + '&id=' + id ; 
		</script>";
