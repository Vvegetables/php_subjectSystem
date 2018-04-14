//利用url传递参数
function parseURL(){
	var href = location.href;
	//alert(url);
	var decode = decodeURI(href);
	//alert(decode);
    var url = decode.split("?")[1];
    var para = url.split("&");//教师名字
    var name = para[0].split("=")[1];//教师名字
    var id = para[1].split("=")[1];//教师id

    var localstorage = window.localStorage;
    localstorage.setItem("username",name);
    localStorage.setItem("userid",id);

    //document.cookie = "username=" + name + "&" + "userid=" + id;
    setCookie("username",name,1);
    setCookie("userid",id,1);

    var dname = document.getElementById('name');
    var did = document.getElementById('id');
    var myframe = document.getElementsByTagName('iframe')[0];
    var oldsrc = myframe.getAttribute('src');
    myframe.setAttribute("src",oldsrc + "&" + para[0] + "&" + para[1]);
    //alert(myframe.getAttribute('src'));
    did.innerText = id;
    dname.innerText = name;
    //alert(document.cookie);
    // var i = localStorage.getItem("useid");
    // var n = localStorage.getItem("username");
    //alert("id:"+i);
    //alert("teacher:" + myframe.getAttribute('src'));
}

function setCookie(c_name,value,expiredays){
    var exdate=new Date();
    exdate.setDate(exdate.getDate()+expiredays*60*60*24);
    document.cookie=c_name+ "=" +encodeURI(value)+
    ((expiredays==null) ? "" : ";expires="+exdate.toGMTString());
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
addLoadEvent(parseURL);
