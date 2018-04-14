//利用url传递参数
function parseURL(){
	var href = location.href;
	//alert(url);
    window.localStorage.setItem("modifysuburl",href);//保存url
	var decode = decodeURI(href);
	//alert(decode);
    var url = decode.split("?")[1];
    var para = url.split("&");
    var len = para.length;
    //alert(len);
    //alert(para[0]);

    var subname = document.getElementById("subject");
    subname.setAttribute("value",para[0]);//----para[0] 课程名
    var stunum = document.getElementById("stunum");
    //alert(typeof stunum.innerText);
    var oldclassid = para[1];//-----课程号
    stunum.innerText = para[3];//----学生人数
    setCookie("oldclassid",oldclassid,1);
    var selections = document.getElementsByTagName("select");
    for(var i = 0;i<selections.length;i++){
    	var options = selections[i].getElementsByTagName("option");
    	for(var j = 0;j < options.length;j++){
    		if(options[j].innerText == para[4 + i]){
    			options[j].selected = true;
    		}
    	}
    }
    //alert("1");
    return para[0];
}
function getOldName(){
	var oldname = parseURL();
	//var de_oldname = decodeURI(oldname);
    //alert(oldname);
    setCookie("oldname",oldname,1);
	var str = document.getElementsByTagName("form")[0];
    var a_href = document.getElementById("stunum");//学生人数的超链接
    var old_a_href = a_href.getAttribute("href");
	var oldaction = str.getAttribute("action");
    var db = window.localStorage;
    var name = db.getItem("username");
    var id = db.getItem("userid");
	//alert(str.getAttribute("action"));
	str.setAttribute("action",oldaction + '&oldname=' + oldname + "&myname=" + name + "&id=" + id 
        + "&stunum=" + a_href.innerText);
    a_href.setAttribute("href",old_a_href + "&oldname=" + oldname + "&myname=" + name + "&id=" + id);
	//alert(a_href.getAttribute("href"));
}
function setCookie(c_name,value,expiredays){
    var exdate=new Date();
    exdate.setDate(exdate.getDate()+expiredays*60*60*24);
    document.cookie=c_name+ "=" +encodeURIComponent(value.replace(/\+/g,'%2B'))+
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
addLoadEvent(getOldName);