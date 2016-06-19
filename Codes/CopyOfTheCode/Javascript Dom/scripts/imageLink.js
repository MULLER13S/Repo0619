function prepareGallery() {
    if (!document.getElementsByTagName) return false;
    if (!document.getElementById) return false;
    if (!document.getElementById("imageGallery")) return false;
    var gallery = document.getElementById("imageGallery");
    var links = gallery.getElementsByTagName("a");

    for (var i = 0; i < links.length; i++) {
        links[i].onclick = function () {
            return showPic(this) ? false : true;
            //return false;

            //links[i].onkeypress = links[i].onclick;
        }
    }

}

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


        var text = whichpic.getAttribute("title")?whichpic.getAttribute("title"):"";
        var description = document.getElementById("description");
        //alert(description.childNodes[0].nodeValue);
        //检查节点类型是否为文本；
        if(description.firstChild.nodeType ==3)
            description.firstChild.nodeValue = text;
        //window.open("http://www.baidu.com","aa","width=600,height=300");
    }
    return true;
}