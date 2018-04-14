function judgeurl(){
	var href = window.location.href;
	herf = decodeURI(href);
	var para = href.split("?")[1];//这是参数
	//para = encodeURIComponent(para);
	if(para == '0'){
		return;
	}
	else{
		//var old_para = para.split("&");
		var subname = document.getElementById("subname");
		subname.setAttribute("value",localStorage.getItem("add_sub_old_subname"));
		var term = document.getElementById("term");
    	var options = term.getElementsByTagName("option");
    	for(var j = 0;j < options.length;j++){
    		if(options[j].innerText == localStorage.getItem("add_sub_old_term")){
    			options[j].selected = true;
    		}
    	}
		var class_in = document.getElementById("class_in");
    	var options = class_in.getElementsByTagName("option");
    	for(var j = 0;j < options.length;j++){
    		if(options[j].innerText == localStorage.getItem("add_sub_old_class_in")){
    			options[j].selected = true;
    		}
    	}
    	var class_out = document.getElementById("class_out");
    	var options = class_out.getElementsByTagName("option");
    	for(var j = 0;j < options.length;j++){
    		if(options[j].innerText == localStorage.getItem("add_sub_old_class_out")){
    			options[j].selected = true;
    		}
    	}
	}
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
addLoadEvent(judgeurl);