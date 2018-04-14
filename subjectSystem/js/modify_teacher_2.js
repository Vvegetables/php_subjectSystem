//利用url传递参数
function parseURL(){
	var href = location.href;
	//alert(url);
	var decode = decodeURI(href);
	//alert(decode);
    var url = decode.split("?")[1];
    var para = url.split("&");
    var len = para.length;
    //alert(len);
    //alert(para[2]);

    var id = document.getElementById("id");
    id.setAttribute("value",para[0]);
    var name = document.getElementById("name");
    name.setAttribute("value",para[1]);
    var rank = document.getElementById("rank");
    rank.setAttribute("value",para[2]);
    return para[0];
}
function getOldId(){
	var oldid = parseURL();
	//var de_oldname = decodeURI(oldname);
	var str = document.getElementsByTagName("form")[0];
	var oldaction = str.getAttribute("action");
	//alert(str.getAttribute("action"));
	str.setAttribute("action",oldaction + '&oldid=' + oldid);
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
addLoadEvent(getOldId);