//判断一个表单是否有必须要填写的输入框，然后没有被填写
function validateForm(whichform){
	for(var i = 0;i<whichform.elements.length;i++){
		//遍历表单中需要填写的信息
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

//为页面中的所有表单绑定点击提交事件。
function prepareForms(){
	for(var i = 0;i<document.forms.length;i++){
		//遍历所有表单
		var thisform = document.forms[i];
		//resetFields(thisform);
		thisform.onsubmit = function(){
			//点击函数返回false页面不会发生跳转
			if(!validateForm(this)) {return false;}
			//找到p标签由article引用
			var article = document.getElementsByTagName('p')[0];
			//以异步的方式提交数据，返回的信息存在article变量里
			if(submitFormWithAjax(this,article)) return false;
			//alert("success!");
		}
	}
}

function getHTTPObject(){
	//创建ajax对象。
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

//加载比较慢的时候，增加用户友好度，显示加载等待图片
function displayAjaxLoading(element){
	//去掉指定标签内不需要的子元素
	while(element.hasChildNodes()){
		element.removeChild(element.lastChild);
	}
	//创建img元素
	var content = document.createElement("img");
	content.setAttribute("src","images/timg.gif");
	content.setAttribute("alt","Loading...");
	element.appendChild(content);
}

//自己封装js的ajax异步提交表单的方法
function submitFormWithAjax(whichform,thetarget){
	//得到ajax对象
	var request = getHTTPObject();
	if(!request){return false;}
	//这个函数的交互没有完成，就会显示等待图片。
	displayAjaxLoading(thetarget);
	var dataParts = [];
	var element;
	for(var i = 0;i<whichform.elements.length;i++){
		element = whichform.elements[i];
		dataParts[i] = element.name + '=' + encodeURIComponent(element.value);//数据传输时要加码和解码的
	}
	var data = dataParts.join('&');
	//以下是实现ajax的核心函数
	request.open("POST",whichform.getAttribute("action"),true);//第一个参数：传递数据的方式
	//第二个参数：表单的url链接-即处理数据的地方，第三个参数是是否采用异步传输的方式
	//发送http的头部，这是一个固定搭配
	request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	//数据传输状态改变时的处理函数---即反馈函数，得到服务器传回来的信息
	request.onreadystatechange = function(){
		//数据传输完成
		if(request.readyState == 4){
			if(request.status == 200 || request.status == 0){
				//这里的p标签和上面prepareForms函数里为form表单绑定的事件显示回调信息的元素是一致的
				var matches = request.responseText.match(/<p>([\s\S]+)<\/p>/);//跳转页面的article部分
				if(matches.length > 0){
					thetarget.innerHTML = matches[1];
				}else{
					thetarget.innerHTML = '<p>对不起，这里有错误！</p>';
				}
			}else{
				thetarget.innerHTML = '<p>' + request.statusText + '</p>';
			}
			thetarget.innerHTML=request.responseText
		}
	};
	//发送信息，如果采用get方式，那么不需要data。
	request.send(data);
	return true;
};
//扩展window.onload函数的功能，可以绑定多个事件。
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