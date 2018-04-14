function signinfo(tr){
	//var td_subname = tr.firstChild;//被点击的行的第一个属性
	//window.location.href = "../sign_info.html";
	var td = tr.getElementsByTagName("td")[0];//获取被点击的一行中表格的数据
	//tr_array[i].style.color = red;
	var value = td.firstChild.nodeValue ;//获得被双击的那行的课程名
	var myclass = "&myclass=" + value;
	setCookie('myclass',value,1);//存储被双击的那行的课程名
	var td2 = tr.getElementsByTagName("td")[1];
	var value2 = td2.firstChild.nodeValue ;
	setCookie("myclassid",value2)
	window.location.href = "../php/detail_sign_frame.php?p=0" + myclass;
}
function setCookie(c_name,value,expiredays){
    var exdate=new Date();
    exdate.setDate(exdate.getDate()+expiredays*60*60*24);
    document.cookie=c_name+ "=" +encodeURI(value)+
    ((expiredays==null) ? "" : ";expires="+exdate.toGMTString());
}
function addLoadEvent(func){
	var oldonload = window.onload;
	if(typeof window.onload != 'function'){
		//alert("success!");
		window.onload = func;
	}else{
		window.onload = function(){
		oldonload();
		func();
		}
	}
}
