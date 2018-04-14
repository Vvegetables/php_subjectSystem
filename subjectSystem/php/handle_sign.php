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
			<form id="iForm" action="handle_sign.php?p=0" method="post">
				<span>学生姓名：</span><input style="border:#000000 1px solid" id="look" type="text" name="stuname">
				<input type="submit" value="查询" name="mySubmit">
				<input type="submit" value="返回" name="mySubmit">
			</form>			
		</div>
		<div class="iBody">
			<?php
				$page = $_GET['p'];
				$action = @$_POST["mySubmit"];
				$studentname = @$_POST['stuname'];//学生姓名
				$name = $_GET['name'];//用户名
				$id = $_GET['id'];//用户id
				$classname = urldecode($_COOKIE['myclass']);//课程名
				$classid = urldecode($_COOKIE['myclassid']);
				if($action == '查询' && $studentname != ""){
					$sql = "SELECT * FROM stusubject WHERE studentname ='$studentname' AND teacherid = '$id' AND subjectname = '$classname' AND classid = '$classid' LIMIT ".($page*5).",5";
					
				}else if($action == '返回'){
				echo
				"<script type='text/javascript'>
					window.location.href = 'firstPage.php?p=0&name=".$name."&id=".$id."';
				</script>";
				}else{
					$sql = "SELECT * FROM stusubject WHERE teacherid = '$id' AND subjectname = '$classname' AND classid = '$classid' LIMIT ".($page*5).",5";
				}
				require_once("mysql.php");
				require_once("sign_mysql.php");				

			?>
		</div>
		<script type = "text/javascript" src = "../js/parseURL.js"></script>
	</body>
</html>
	