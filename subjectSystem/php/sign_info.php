	<?php
	$result = mysql_query($sql);
	//处理我们的数据
	if (!$result) {
    echo "Could not successfully run query ($sql) from DB: " . mysql_error();
    exit;
	}

	echo "<script type = 'text/javascript' src = '../js/delete_stu.js'></script>";
	echo "<script type = 'text/javascript' src = '../js/show_signinfo.js'></script>";
	//echo "alert('hello')";
	echo 
	"<table border = 1 width = 100% align=center>
	<form>
	<tr>
	<th>课程名</th>
	<th>教 师</th>
	<th>学生人数</th>
	<th>学 期</th>
	<th>上课时间</th>
	<th>下课时间</th>
	<th>操 作</th>
	</tr>";							

	
	while($row = mysql_fetch_assoc($result)){
		echo 
		"<tr align=center><td>{$row['subname']}</td>
		<td>{$row['']}</td>
		<td>{$row['']}</td>
		<td>{$row['']}</td>
		<td>{$row['']}</td>
		<td>{$row['']}</td>
		<td><a href='../modify_sub.html'>修改</a> <a href='#' onclick='myDelete(this);return false;'>删除</a></td>
		</tr>";
	}
	echo "</form>";
	echo "</table>";
	//获取数据总条数
	$total_sql = "SELECT COUNT(*) FROM subinfo";
	$total_result = mysql_fetch_array(mysql_query($total_sql));
	$total = $total_result[0];
	//echo "总条数".$total;
	$total_pages = ceil($total / 5);
	//释放结果，关闭连接
	mysql_free_result($result);
	mysql_close($conn);
	/* 3.显示数据 + 分页条 */

	echo "<div class='page' align=center style='margin-top:50px'>";
	$page_banner = "总条数".$total;
	
	if($page > 0){
		$page_banner .= "<a href = '".$_SERVER['PHP_SELF']."?p=0'>首页

</a>";
		$page_banner .= "<a href = '".$_SERVER['PHP_SELF']."?p=".

($page-1)."'>上一页</a>";
	}
	if($page < $total_pages-1){
		$page_banner .= "<a href = '".$_SERVER['PHP_SELF']."?p=".

($page+1)."'>下一页</a>";
		$page_banner .= "<a href = '".$_SERVER['PHP_SELF']."?p=".

($total_pages-1)."'>尾页</a>";
	}
	
	$page_banner .= "共{$total_pages}页,";
	$page_banner .= "<form id='bottom' action = 'stu_mysql.php' method = 'get' style = 'display : inline'>";
	$page_banner .= "到第<input type = 'text' size = '2' name = 'p'>页";
	$page_banner .= "<input type= 'submit' value = '确定'>";
	$page_banner .= "</form>";
	echo $page_banner;
	echo "</div>";