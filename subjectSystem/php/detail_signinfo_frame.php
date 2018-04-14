<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>
			the detail of sign
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
<!-- 			<form id="iForm" action="handle_signinfo.php?" method="post">
				<span>签到情况：</span>
				<select name="typeofsign">
					<option value="出勤">出勤</option>
					<option value="迟到">迟到</option>
					<option value="早退">早退</option>
					<option value="旷课">旷课</option>
				</select>
				<input type="submit" value="查询" name="mySubmit">
				<input type="submit" value="返回" name="mySubmit">				
			</form> -->
		</div>
		<div class="iBody">
			<?php
				//echo "<script type = 'text/javascript'>alert('hello');</script>";
				require_once('show_signinfo.php');
			?>
		</div>
		<script type = "text/javascript" src = "../js/detail_signinfo_para.js"></script>
	</body>
</html>