function validateForm(whichform){
	for(var i = 0;i<whichform.elements.length;i++){
		var element = whichform.elements[i];

		if(element.required == 'required'){
			//alert(element);
			if(!isFilled(element)){
				alert("请填写" + element.name + "表格");
				return false;
			}
		}
	}
	return true;
}

function prepareForms(){
	for(var i = 0;i<document.forms.length;i++){
		var thisform = document.forms[i];
		//resetFields(thisform);
		thisform.onsubmit = function(){
			if(!validateForm(this)) {return false;}
			var article = document.getElementsByTagName('body')[0];
			if(submitFormWithAjax(this,article)) return false;
			//alert("success!");
		}
	}
}

function getHTTPObject(){
	if(typeof XMLHttpRequest == "undefined")
		XMLHttpRequest = function(){
			try{return new ActiveXObject("Msxml2.XMLHTTP.6.0");}
				catch(e){}
			try{return new ActiveXObject("Msxml2.XMLHTTP.3.0");}
				catch(e){}
			try{return new ActiveXObject("Msxml2.XMLHTTP");}
				catch(e){}
			return 	false;
		}
	return new XMLHttpRequest();
}

function displayAjaxLoading(element){
	while(element.hasChildNodes()){
		element.removeChild(element.lastChild);
	}
	var content = document.createElement("img");
	content.setAttribute("src","images/timg.gif");
	content.setAttribute("alt","Loading...");
	element.appendChild(content);
}

function submitFormWithAjax(whichform,thetarget){
	var request = getHTTPObject();
	if(!request){return false;}
	displayAjaxLoading(thetarget);
	var dataParts = [];
	var element;
	for(var i = 0;i<whichform.elements.length;i++){
		element = whichform.elements[i];
		dataParts[i] = element.name + '=' + encodeURIComponent(element.value);
	}
	var data = dataParts.join('&');
	request.open("POST",whichform.getAttribute("action"),true);
	request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	request.onreadystatechange = function(){
		if(request.readyState == 4){
			if(request.status == 200 || request.status == 0){
				//var matches = request.responseText.match(/<html>([\s\S]+)<\/html>/);//跳转页面的article部分
			// 	if(matches.length > 0){
			// 		thetarget.innerHTML = matches[1];
			// 	}else{
			// 		thetarget.innerHTML = '<p>对不起，这里有错误！</p>';
			// 	}
			// }else{
			// 	thetarget.innerHTML = '<p>' + request.statusText + '</p>';
			// }
			}
				thetarget.innerHTML=request.responseText
		}
	};
	request.send(data);
	return true;
};
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
addLoadEvent(prepareForms);