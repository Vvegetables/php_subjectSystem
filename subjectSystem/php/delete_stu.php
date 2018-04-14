<?php
	require_once('mysql.php');
	$classid = $_GET['classid'];
	$teachername = $_GET["teachername"];
	$teacherid = urldecode($_COOKIE['userid']);
	$sql = "DELETE FROM subinfo WHERE classid = '$classid' AND teacherid = '$teacherid';";
	$sql2 = "DELETE FROM stusubject WHERE classid = '$classid' AND teacherid = '$teacherid';";
	$result = mysql_query($sql);
	$result = mysql_query($sql2);
	//echo $classid.$teacherid;
	//echo "<script type = 'text/javascript'>alert('false');</script>";
	//处理我们的数据
	if (!$result) {
    echo "Could not successfully run query ($sql) from DB: " . mysql_error();
    exit;
	}
	//echo "<script type = 'text/javascript' src = '../js/load2.js'></script>";
	echo "<script type = 'text/javascript'>
		 	var db = window.localStorage;
			var name = db.getItem('username');
			var id = db.getItem('userid');
			window.location.href = 'firstPage.php?p=0' + '&name=' + name + '&id=' + id ; 
		</script>";