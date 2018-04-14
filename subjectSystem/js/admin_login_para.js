//利用url传递参数
function parseURL(){
	var href = location.href;
	//alert(url);
	var decode = decodeURI(href);
	//alert(decode);
    var url = decode.split("?")[1];
    var para = url.split("&");
    var name = para[0].split("=")[1];
    var id = para[1].split("=")[1];

    var localstorage = window.localStorage;
    localstorage.setItem("adminname",name);
    localStorage.setItem("adminid",id);

    //document.cookie = "username=" + name + "&" + "userid=" + id;
    setCookie("adminname",name,1);
    setCookie("adminid",id,1);

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
