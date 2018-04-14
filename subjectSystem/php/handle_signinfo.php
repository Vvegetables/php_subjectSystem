<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>
			first
		</title>
		<style type="text/css">
		   .iBody{
				margin-top: 6%;
				text-align: center;
			}
			#iForm input{
				border:#000000 1px solid;
			}
			.header{
				text-align: center;
				margin-top: 5%;
			}
			.header input{
				font-size: 20px;
			}
			span{
				font-size: 20px;
			}
		</style>
	</head>
	<body>
		<div class="header">
			<form id="iForm" action="handle_signinfo.php?" method="post">
				<span>签到情况：</span>
				<select name="typeofsign">
					<option value="出勤" selected="selected">出勤</option>
					<option value="迟到">迟到</option>
					<option value="早退">早退</option>
					<option value="旷课">旷课</option>
				</select>
				<input type="submit" value="查询" name="mySubmit">
				<input type="submit" value="返回" name="mySubmit">
			</form>			
		</div>
		<div class="iBody">
			<?php
				$page = $_GET['p'];
				$action = $_POST["mySubmit"];
				$type = $_POST['typeofsign'];
				//$studentname = $_POST['stuname'];//学生姓名
				$name = $_GET['name'];//用户名
				$id = $_GET['id'];//用户id
				//$classname = urldecode($_COOKIE['myclass']);//课程名
				$subjectname = $_GET['subname'];
				$studentname = $_GET['studentname'];
				$studentid = $_GET['studentid'];
				$classname = $studentname;
				if($action == '查询' && $studentname != ""){
					$sql = "SELECT * FROM detailofsign WHERE studentname ='$studentname' AND teachername = '$name' AND subjectname = '$subjectname' AND typeofsign = '$type' AND studentid = '$studentid';";
					
				}else if($action == '返回'){
				echo
				"<script type='text/javascript'>
					window.location.href = 'detail_sign_frame.php?p=0&name=".$name."&id=".$id."';
				</script>";
				goto a;
				}else{
					$sql = "SELECT * FROM detailofsign WHERE studentname ='$studentname' AND teachername = '$name' AND subjectname = '$subjectname' AND studentid = '$studentid' LIMIT ".($page*5).",5";
				}
				require_once("mysql.php");
				require_once("signinfo_mysql.php");				
				a:
			?>
		</div>
		<script type = "text/javascript" src = "../js/detail_signinfo_para.js"></script>
	</body>
</html>
	