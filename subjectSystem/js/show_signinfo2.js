function signinfo(){
	//var td_subname = tr.firstChild;//被点击的行的第一个属性
	//window.location.href = "../sign_info.html";
	var tr_array = document.getElementsByTagName("tr");
	for(var i = 1;i<tr_array.length;i++){
		tr_array[i].ondblclick = function(){

			window.location.href = "../php/detail_sign_frame.php?p=0";
		};
	}
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
addLoadEvent(signinfo);