<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<link type="text/css" rel="stylesheet" href="style/prompt.css">
		<link type="text/css" rel="stylesheet" href="style/reset.css">
		<title>
			prompt---window
		</title>
		<script type="text/javascript">
			function load(){
				var href = location.href;
				//alert(url);
				var decode = decodeURI(href);
				// alert(decode);
    			var url = decode.split("?")[1];
    			var para = url.split("&");//教师名字
    			var name;
   				var id;

    			for(var i = 0;i<para.length;i++){
       				var temp = para[i].split("=")[0];
       	 			var temp2 = para[i].split("=")[1];
        			if(temp == "name"){
            			name = temp2;
       				}
        			if(temp == "id"){
            			id = temp2;
        			}
   			 	}
				window.location.href='php/t_iframe2.php?p=0' + '&name=' + name + "$id=" + id ;
			}
		</script>
	</head>
	<body>
		<article>
		<div id="container" style = "position: absolute;top:15%;left:45%">
			<div id="Title">
				<h1>操作成功</h1>
			</div>
			<div id="Button">
				<button type="button" onclick="load()">确定</button>
			</div>
		</div>
		</article>
		<div>
			<?php
				require_once('mysql.php');
				$id = $_POST['id'];
				$name = $_POST['name'];
				$rank = $_POST['rank'];
				$sql = "INSERT INTO teacher (id,name,rank,password) VALUES ('$id','$name','$rank',PASSWORD('$id'));";
				$result = mysql_query($sql);
				echo "影响行数：".mysql_affected_rows();
				//echo "插入行数:$sql"
			?>
		</div>
	</body>
</html>