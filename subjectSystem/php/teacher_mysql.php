	<?php
	$result = mysql_query($sql);
	//处理我们的数据
	if (!$result) {
    echo "Could not successfully run query ($sql) from DB: " . mysql_error();
    exit;
	}
	echo "<script type = 'text/javascript' src = '../js/delete_teacher.js'></script>";
	echo "<script type = 'text/javascript' src = '../js/modify_sub.js'></script>";
	echo "<table border = 1 width = 25% align=center>";
	echo "<form>";
	echo "<tr>";
	echo "<th>工 号</th>";
	echo "<th>姓 名</th>";
	echo "<th>职 称</th>";	
	echo "<th>操作</th>";
	echo "</tr>";								

	
	while($row = mysql_fetch_assoc($result)){
		echo "<tr><td>{$row['id']}</td>
		<td>{$row['name']}</td>
		<td>{$row['rank']}</td>
		<td><a href='../modify_teacher.html' onclick='modify_sub(this);return false;'>修改</a> <a href='#' onclick='myDelete(this);return false;'>删除</a></td></tr>";
	}
	echo "</form>";
	echo "</table>";
	//获取数据总条数
	$total_sql = "SELECT COUNT(*) FROM teacher";
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
	$page_banner .= "<form id='bottom' action = 'teacher_mysql.php' method = 'get' style = 'display : inline'>";
	$page_banner .= "到第<input type = 'text' size = '2' name = 'p'>页";
	$page_banner .= "<input type= 'submit' value = '确定'>";
	$page_banner .= "</form>";
	echo $page_banner;
	echo "</div>";