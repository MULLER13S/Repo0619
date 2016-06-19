function prepare(){
    var preview=document.getElementById("preview");
    preview.style.position="absolute";
    preview.style.left="0px";
    preview.style.top="0px";
    var list=document.getElementById("linkList");
    var links=document.getElementsByTagName("a");
    links[0].onmousemove=function(){moveMessage();}

}
window.onload=prepare();
