function showPic(whichpic){
    if(!document.getElementById("holder")){
        return false;
    }
    var source=whichpic.getAttribute("href");
    var place=document.getElementById("holder");
    //检查是否为图片，nodeName属性总是返回一个大写字母的值；
    if(place.nodeName !='IMG') return false;
    place.setAttribute("src",source);
    if(document.getElementById("description")) {


        var text = whichpic.getAttribute("title");
        var description = document.getElementById("description");
        //alert(description.childNodes[0].nodeValue);
        //检查节点类型是否为文本；
        if(description.firstChild.nodeType ==3)
        description.firstChild.nodeValue = text;
        //window.open("http://www.baidu.com","aa","width=600,height=300");
    }
    return true;
}

function countBodyChildren(){
    var body_element=document.getElementsByTagName("body")[0];
    alert(body_element.nodeType);
}

//window.onload=countBodyChildren();