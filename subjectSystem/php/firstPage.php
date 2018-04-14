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
				//echo "<script type = 'text/javascript'>alert('hello');</script>";
				require_once('show_stu.php');
			?>
		</div>
		<script type = "text/javascript" src = "../js/parseURL.js"></script>
	</body>
</html>