<?php
	require_once('mysql.php');
	$oldrefertime = $_GET['oldrefertime'];
	$refertime = $_POST['refertime'];
	$realtime = $_POST['realtime'];
	$sql = "UPDATE mytime SET refertime = '$refertime',realtime = '$realtime' WHERE refertime = '$oldrefertime'";
	//$sql = "UPDATE subinfo SET subname = '设计原理' WHERE subname = '编译原理'";
	$result = mysql_query($sql);
	//echo $oldname;
	//echo "影响行数：".mysql_affected_rows();
	//echo "<script type = 'text/javascript'>\<php? echo 'mysql_affected_rows();'\<\?\>;</script>";
	echo "<script type = 'text/javascript'>window.location.href = '../prompt_time.html'; </script>";