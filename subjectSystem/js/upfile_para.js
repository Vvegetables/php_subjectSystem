function getOldName(){
	//var oldname = parseURL();
	//var de_oldname = decodeURI(oldname);
	var str = document.getElementById("upfile");
	var oldaction = str.getAttribute("action");
    var href = location.href;
    //alert(url);
    var decode = decodeURI(href);
    //alert(decode);
    var url = decode.split("?")[1];
    var _teacherid = url.split("&")[1];
    var teacherid = _teacherid.split("=")[1];
    // var para = url.split("&");
    var _teachername = url.split("&")[0];
    var teachername = url.split("=")[1];
    // var teachername = para[1].split("=")[1];    
	//alert(str.getAttribute("action"));
	str.setAttribute("action",oldaction + "&teachername=" + teachername +"&teacherid=" + teacherid);
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