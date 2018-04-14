function add_btn(){
	var classname = document.getElementById("subname").getAttribute("value");
	var btn = document.getElementById("list");
	alert(classname);
	btn.setAttribute("onclick",function(){
	if(classname == null){
		alert("请先填写课程名！");
		return;
	}
	var storage = window.localStorage;
	var tname = storage.getItem("username");
	alert('way_of_in.html?classname='+classname+"&teachername=" + tname);
	// window.location.href = 'way_of_in.html?classname='+classname+"&teachername=" + tname;
	});
	
				
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
addLoadEvent(add_btn);