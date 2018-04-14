<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<link type="text/css" rel="stylesheet" href="style/prompt.css">
		<link type="text/css" rel="stylesheet" href="style/reset.css">
		<title>
			prompt---window
		</title>
	</head>
	<body>
		<article>
		<div id="container" style = "position: absolute;top:15%;left:45%">
			<div id="Title">
				<h1>操作成功</h1>
			</div>
			<div id="Button">
				<button type="button" onclick="window.location.href = 'php/time_iframe.php?p=0'">确定</button>
			</div>
		</div>
		</article>
		<div>
			<?php
				require_once('mysql.php');
				$refertime = $_POST['refertime'];
				$realtime = $_POST['realtime'];
				$sql = "INSERT INTO mytime (refertime,realtime) VALUES ('$refertime','$realtime');";
				$result = mysql_query($sql);
				echo "影响行数：".mysql_affected_rows();
			?>
		</div>
	</body>
</html>