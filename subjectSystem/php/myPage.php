<?php
	/* 1.传入页码 */
	$page = $_GET['p'];
	/* 2.根据页码取出数据：php->mysql处理 */
	$host = '127.0.0.1:3306';
	$userName = 'root';
	$password = '';
	$db = 'subject';
	//连接数据库
	$conn = mysql_connect($host,$userName,$password);
	if(!$conn){
		echo '数据库连接失败'.'<br>';
		exit();
	}
	//选择所要操作的数据库
	mysql_select_db($db);
	//设置数据库编码格式
	mysql_query("SET NAMES UTF8");
	//编写sql获取分页数据
	$sql = "SELECT * FROM teacher LIMIT ".($page*5).",5";
	//sql执行
	$result = mysql_query($sql);
	//处理我们的数据
	if (!$result) {
    echo "Could not successfully run query ($sql) from DB: " . mysql_error();
    exit;
	}
	while($row = mysql_fetch_assoc($result)){
		echo $row["id"].'--'.$row["name"].'--'.$row["rank"].'<br>';
	}
	//获取数据总条数
	$total_sql = "SELECT COUNT(*) FROM teacher";
	$total_result = mysql_fetch_array(mysql_query($total_sql));
	$total = $total_result[0];
	echo "总条数".$total;
	$total_pages = ceil($total / 5);
	//释放结果，关闭连接
	mysql_free_result($result);
	mysql_close($conn);
	/* 3.显示数据 + 分页条 */

	//.$_SERVER['PHP_SELF']."?p=".($page-1).
	$page_banner = "";
	if($page > 0){
		$page_banner .= "<a href = '".$_SERVER['PHP_SELF']."?p=0'>首页</a>";
		$page_banner .= "<a href = '".$_SERVER['PHP_SELF']."?p=".($page-1)."'>上一页</a>";
	}
	if($page < $total_pages-1){
		$page_banner .= "<a href = '".$_SERVER['PHP_SELF']."?p=".($page+1)."'>下一页</a>";
		$page_banner .= "<a href = '".$_SERVER['PHP_SELF']."?p=".($total_pages-1)."'>尾页</a>";
	}
	
	$page_banner .= "共{$total_pages}页,";
	$page_banner .= "<form action = 'mypage.php' method = 'get' style = 'display : inline'>";
	$page_banner .= "到第<input type = 'text' size = '2' name = 'p'>页";
	$page_banner .= "<input type= 'submit' value = '确定'>";
	$page_banner .= "</form>";
	echo $page_banner;

	