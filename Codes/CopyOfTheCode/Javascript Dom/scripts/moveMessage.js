function moveMessage(){
    var elem=document.getElementById("preview");

    var xpos=parseInt(elem.style.left);
    var ypos=parseInt(elem.style.top);
    if(xpos==-200&&ypos==0){
        return true;
    }
    if(xpos<-200){
        xpos++;
    }
    if(xpos>-200){
        xpos--;
    }
    if(ypos<0){
        ypos++;
    }
    if(ypos>0){
        ypos--;
    }

    elem.style.left=xpos+"px";
    elem.style.top=ypos+"px";
    movement=setTimeout("moveMessage()",10);
}

addLoadEvent(moveMessage);
