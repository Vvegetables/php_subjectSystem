function getOldName(){
	//var oldname = parseURL();
	//var de_oldname = decodeURI(oldname);
	var str = document.getElementsByTagName("form")[0];
	var oldaction = str.getAttribute("action");
    var db = window.localStorage;
    var name = db.getItem("adminname");
    var id = db.getItem("adminid");
	//alert(str.getAttribute("action"));
	str.setAttribute("action",oldaction + "&name=" + name + "&id=" + id);
	//alert(str.getAttribute("action"));
}


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
addLoadEvent(getOldName);