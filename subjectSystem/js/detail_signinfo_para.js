function parseURL(){
	var href = location.href;
	//alert(url);
	var decode = decodeURI(href);
	// // alert(decode);
    var url = decode.split("?")[1];

 	var db = window.localStorage;
	var name = db.getItem("username");
	var id = db.getItem("userid");

	//alert(id);
    var myframe = document.getElementsByTagName('form')[0];
    var oldsrc = myframe.getAttribute('action');
    myframe.setAttribute("action",oldsrc + url + "&name=" + name + "&id=" + id);
    //alert("form"+myframe.getAttribute('action'));
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
function getCookie(c_name)  
{  
if (document.cookie.length>0)  
  {  
  c_start=document.cookie.indexOf(c_name + "=")  
  if (c_start!=-1)  
    {   
    c_start=c_start + c_name.length+1   
    c_end=document.cookie.indexOf(";",c_start)  
    if (c_end==-1) c_end=document.cookie.length  
    return unescape(document.cookie.substring(c_start,c_end))  
    }   
  }  
return "";  
} 
addLoadEvent(parseURL);