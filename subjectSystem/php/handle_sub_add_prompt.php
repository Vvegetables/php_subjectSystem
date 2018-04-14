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
		<script type="text/javascript" src = "../js/load2.js">
		</script>		
		<article>
		<div id="container" style = "position: absolute;top:15%;left:45%">
			<div id="Title">
				<h1>操作成功</h1>
			</div>
			<div id="Button">
				<button type="button" onclick="myload()">确定</button>
			</div>
		</div>
		</article>
		<div>
			<?php
				require_once('mysql.php');
				$subname = $_POST['subject'];
				$term = $_POST['term'];
				$class_in = $_POST['class_in'];
				$class_out = $_POST['class_out'];
				$name = $_GET['name'];
				$id = $_GET['id'];
				// if(!isset($_COOKIE['num_students'])){
				// 	setcookie("num_students",0);
				// 	$_COOKIE["num_students"] = 0;
				// 	$nums = $_COOKIE["num_students"];
				// 	echo "影响行数：".$nums;
				// }else{
				// 	$nums = $_COOKIE['num_students'];
				// 	echo "影响行数：".$nums;					
				// }
				//同一门课 同一个老师 不同的上课时间
				// $sql = " SELECT classid FROM subinfo WHERE subname = '$subname' AND teacherid = '$id' AND teachername = '$name' AND starttime != '$class_in' AND term = '$term'";
				// $result = mysql_query($sql);
				// if(mysql_affected_rows() > 0){
				// 	$classids = mysql_fetch_array($result);
				// 	$classid = (int)$classids[0];
				// 	//$classid2 = $classid + 1;
				// 	var_dump($classid);
				// 	$sql = "INSERT INTO subinfo (subname,teacherid,teachername,stunum,term,starttime,endtime) VALUES ('$subname','$id','$name','','$term','$class_in','$class_out');";
				// 	$result = mysql_query($sql);
				// 	//echo $classid.mysql_affected_rows();
				// 	$sql = " SELECT classid FROM subinfo WHERE subname = '$subname' AND teacherid = '$id' AND teachername = '$name' AND starttime = '$class_in' AND term = '$term'";
				// 	$result = mysql_query($sql);
				// 	$classids2 = mysql_fetch_array($result);
				// 	$classid2 = (int)$classids2[0];
				// 	var_dump($classid2);
				// 	//$result = mysql_query($sql);
				// 	$sql = "UPDATE subinfo set classid = '$classid' where classid = '$classid2'";
				// 	$result = mysql_query($sql);
				// 	echo $classid.mysql_affected_rows();
				// }else
				{
					$sql = "INSERT INTO subinfo (subname,teacherid,teachername,stunum,term,starttime,endtime) VALUES ('$subname','$id','$name','','$term','$class_in','$class_out');";
					$result = mysql_query($sql);
					$sql = "SELECT max(classid) FROM subinfo WHERE teacherid = '$id' AND subname = '$subname'";
					$result = mysql_query($sql);
					$cids = mysql_fetch_array($result);
					$cid = $cids[0];
					$sql_stusubject = "UPDATE stusubject SET subjectname = '$subname',classid = '$cid',teacherid = '$id' WHERE teachername = '$name' AND subjectname = '';";
					$result = mysql_query($sql_stusubject);

					$sql_nums = "SELECT COUNT(*) FROM stusubject WHERE classid = '$cid' AND teacherid = '$id';";
					$result = mysql_query($sql_nums);
					$numss = mysql_fetch_array($result);
					$nums = $numss[0];

					$sql = "UPDATE subinfo SET stunum = '$nums' WHERE teacherid = '$id' AND classid = '$cid';";
					mysql_query($sql);
					echo "影响行数：".$nums;
				}

				

			?>
		</div>
	</body>
</html>


