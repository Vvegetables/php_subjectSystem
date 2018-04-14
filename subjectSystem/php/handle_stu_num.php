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
			<form id="iForm" action="handle_stu_num.php?p=0" method="post">
				<span>学生姓名：</span><input style="border:#000000 1px solid" id="look" type="text" name="stuname">
				<input type="submit" value="查询" name="mySubmit">
				<input type="submit" value="新增" name="mySubmit">
				<input type="submit" value="删除" name="mySubmit">
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
				$classname = urldecode($_COOKIE['oldname']);//课程名
				$oldclassid = urldecode($_COOKIE['oldclassid']);//课程id
				if($action == '查询' && $studentname != ""){
					$sql = "SELECT * FROM stusubject WHERE studentname ='$studentname' AND teacherid = '$id' AND subjectname = '$classname' AND classid = '$oldclassid' LIMIT ".($page*5).",5";
					
				}else if($action == '新增'){
				echo
				"<script type='text/javascript'>
					window.location.href = '../stu_add.html';
				</script>";
				}else if($action == '删除'){
					echo "<script type = 'text/javascript'>
						var isDelete = confirm('是否删除');
						if(isDelete){
							window.location.href='delete_all_one-teacher-students.php';
						}else{".
							"window.location.href='stu_num_frame.php?p=0"."&name=".$name."&id=".$id."';
						}
						</script>
					";
				}else{
					$sql = "SELECT * FROM stusubject WHERE teacherid = '$id' AND subjectname = '$classname' AND classid = '$oldclassid' LIMIT ".($page*5).",5";
				}
				require_once("mysql.php");
				require_once("stu_nums_mysql.php");				
				if($action == '返回'){
					echo
					"<script type='text/javascript'>
						var href = window.localStorage.getItem('modifysuburl');
						var decode = decodeURI(href);
    					var url = decode.split('?')[1];
    					var para = url.split('&');".
    					"para[3] = ".$total.";
						href = para.join('&');
						var myhref = decode.split('?')[0] + '?' + href;
						window.location.href = myhref;
					</script>";
				}

			?>
		</div>
		<script type = "text/javascript" src = "../js/parseURL.js"></script>
	</body>
</html>
	