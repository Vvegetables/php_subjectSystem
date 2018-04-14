function choosesub(){
	//创建select结点
	// var mySelect = document.createElement("select"); 
	// mySelect.id = "mySelect"; 
	// document.body.appendChild(mySelect);
	var obj = document.getElementsByTagName("select")[0];//获得select
    var obj2 = document.getElementsByTagName("select")[1];
	var href = location.href;
	//alert(url);
	var decode = decodeURI(href);	
    var url = decode.split("?")[1];//获得php传来的数据
    var para = url.split("&");
    var length = para.length - 1;
    //alert(length);
    for(var i = 0;i<length;i++){
    	//obj.add(new Option(para[i],para[i]));
    	obj.options[i] = new Option(para[i],para[i]);
    }
    var para_times = para[length].split("^");
    var length2 = para_times.length - 1;
    for(var i = 0;i<length2;i++){
        //obj.add(new Option(para[i],para[i]));
        obj2.options[i] = new Option(para_times[i],para_times[i]);
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
addLoadEvent(choosesub);

//动态创建下拉列表--慕客手记
