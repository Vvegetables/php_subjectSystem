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
			<form id="iForm" action="handle_stu.php?p=0" method="post">
				<span>课程名：</span><input style="border:#000000 1px solid" id="look" type="text" name="subName">
				<input type="submit" value="查询" name="mySubmit">
				<input type="submit" value="新增" name="mySubmit">
				<input type="submit" value="删除" name="mySubmit">
			</form>			
		</div>
		<div class="iBody">
			<?php
				$page = $_GET['p'];
				$action = @$_POST["mySubmit"];
				$text = @$_POST['subName'];
				$name = $_GET['name'];
				$id = $_GET['id'];
				if($action == '查询' && $text != NULL){
					$sql = "SELECT * FROM subinfo WHERE subname ='$text' AND teacherid = '$id'";
				}else if($action == '新增'){
				echo
				"<script type='text/javascript'>
					window.location.href = '../subject_add2.html?0';
				</script>";
				}else if($action == '删除'){
					echo "<script type = 'text/javascript'>
						var isDelete = confirm('是否删除');
						if(isDelete){
							window.location.href='delete_all.php';
						}else{".
							"window.location.href='firstPage.php?p=0"."&name=".$name."&id=".$id."';
						}
						</script>
					";
				}else{
					$sql = "SELECT * FROM subinfo WHERE teacherid = '$id' LIMIT ".($page*5).",5";
				}
				//echo $text;
				require_once("mysql.php");
				require_once("stu_mysql.php");
			?>
		</div>
		<script type = "text/javascript" src = "../js/parseURL.js"></script>
	</body>
</html>
	