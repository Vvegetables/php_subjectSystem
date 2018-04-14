function addLoadEvent(func){
	var oldonload = window.onload;
	if(typeof window.onload != 'function'){
		window.onload = func;
	}else{
		window.onload = function(){
			oldonload();
			func();
		}
	}
}


function myDelete(a){
	var isDelete = confirm('是否删除');
	if(isDelete){
		var td = a.parentNode; //td标签
		var tr = td.parentNode;
        var tbody=tr.parentNode;  //table标签
        /*tbody.removeChild(tr);  
        //只剩行首时删除表格  
        if(tbody.rows.length==1) {  
            tbody.parentNode.removeChild(tbody);  
        }*/
        //alert(tr.firstChild.childNodes[0].nodeValue);
        var studentid = tr.childNodes[0].childNodes[0].nodeValue;//课程名称
        window.location='delete_stu_nums.php?p=0&studentid='+studentid;//按下确认跳转
        
	}else{
		//alert("false");
		var db = window.localStorage;
		var name = db.getItem("username");
		var id = db.getItem("userid");
		window.location.href='stu_num_frame.php?p=0' + "&name=" + name + "&id=" + id;//按下取消返回
	}
}