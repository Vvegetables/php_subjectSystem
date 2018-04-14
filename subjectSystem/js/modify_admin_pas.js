function modify(){
	var href = location.href;
	var decode = decodeURI(href);
    var url = decode.split("?")[1];
    //alert(url);
    var id = url.split("=")[1];
    //alert(id);
    var userid = document.getElementById("adminid");
    //alert(userid);
    userid.setAttribute("value",id);
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
addLoadEvent(modify);