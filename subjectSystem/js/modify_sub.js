    function modify_sub(a){
   
   
    // window.location.href = "../";
    var td = a.parentNode; //td标签
    var tr = td.parentNode;
    var td_array = tr.getElementsByTagName("td");//获取被点击的一行中表格的数据
    var str = "?";
    for(var i = 0;i<td_array.length - 2;i++){
        str += td_array[i].firstChild.nodeValue + "&";
    }
    str += td_array[td_array.length - 2].firstChild.nodeValue;
    var oldsrc = a.getAttribute("href");
    a.setAttribute("href",oldsrc + str);
    //alert(a.getAttribute("href"));
    window.location.href = oldsrc + str;
    }