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
        var refertime = tr.childNodes[0].childNodes[0].nodeValue;//id
        window.location='delete_time.php?p=0&refertime='+refertime;//按下确认跳转
        
	}else{
		//alert("false");
		window.location='../php/time_iframe.php?p=0';//按下取消返回
	}
}