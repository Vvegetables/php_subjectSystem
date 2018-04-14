    function showsigninfo(a){
   
   
    // window.location.href = "../";
    var td = a.parentNode; //td标签
    var tr = td.parentNode;
    var td_array = tr.getElementsByTagName("td");//获取被点击的一行中表格的数据
    var str = "&";
    //alert(td_array[0].firstChild.nodeValue);
    str += "subname=" + td_array[0].firstChild.nodeValue + "&";
    str += "studentid=" + td_array[1].firstChild.nodeValue + "&";
    str += "studentname=" + td_array[2].firstChild.nodeValue + "&";
    str += "class=" + td_array[3].firstChild.nodeValue;
    var oldsrc = a.getAttribute("href");
    a.setAttribute("href",oldsrc + str);
    //alert(a.getAttribute("href"));
    window.location.href = oldsrc + str;
    }