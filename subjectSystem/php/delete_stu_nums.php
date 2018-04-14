<?php
	require_once('mysql.php');
	$studentid = $_GET['studentid'];
	$classname = urldecode($_COOKIE['oldname']);
	$oldclassid = urldecode($_COOKIE['oldclassid']);
	$sql = "DELETE FROM stusubject WHERE studentid = '$studentid' AND classid = '$oldclassid';";
	$result = mysql_query($sql);
	//echo $classid.$classname.$studentid;
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
			window.location.href = 'stu_num_frame.php?p=0' + '&name=' + name + '&id=' + id ; 
		</script>";