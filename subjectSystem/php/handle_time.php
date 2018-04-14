<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<link type="text/css" rel="stylesheet" href="style/fPage.css">
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
			<form id="iForm" action="handle_time.php?p=0" method="post">
				<span>形式时间：</span><input style="border:#000000 1px solid" id="look" type="text" name="subName">
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
				if($action == '查询' && $text != NULL){
					$sql = "SELECT * FROM mytime where refertime ='$text'";
				}else if($action == '新增'){
				echo
				"<script type='text/javascript'>
					window.location.href = '../time_add.html';
				</script>";
				}else if($action == '删除'){
					echo "<script type = 'text/javascript'>
						var isDelete = confirm('是否删除');
						if(isDelete){
							window.location.href='delete_all_time.php';
						}else{
							window.location.href='time_iframe.php?p=0';
						}
						</script>
					";
				}else{
					$sql = "SELECT * FROM mytime LIMIT ".($page*5).",5";
				}
				require_once("mysql.php");
				require_once("time_mysql.php");
			?>
		</div>
	</body>
</html>
	