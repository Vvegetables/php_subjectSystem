function myload(){
	var db = window.localStorage;
	var name = db.getItem("username");
	var id = db.getItem("userid");
	//alert("&name=" + name + "&id=" + id);
	window.location.href = 'php/stu_num_frame.php?p=0' + '&name=' + name + '&id=' + id ;
}