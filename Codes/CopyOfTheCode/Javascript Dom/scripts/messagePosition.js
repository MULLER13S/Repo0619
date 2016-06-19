function messagePosition(){
    if(!document.getElementById) return false;
    if(!document.getElementById("message")) return false;

    var elem=document.getElementById("message");


    elem.style.position="absolute";
    elem.style.left="50px";
    elem.style.top="100px";
    movement=setTimeout("moveMessage()",10);
    //moveElement("message",400,300,10);

}



function moveElement(elementID,final_x,final_y,interval){
    if(!document.getElementById) return false;
    if(!document.getElementById(elementID)) return false;
    var xpos=parseInt(elem.style.left);
    var ypos=parseInt(elem.style.top);
    if(xpos==final_x&&ypos==final_y){
        return true;
    }
    if(xpos<final_x){
        xpos++;
    }
    if(xpos>final_x){
        xpos--;
    }
    if(ypos<final_y){
        ypos++;
    }
    if(ypos>final_y){
        ypos--;
    }

    elem.style.left=xpos+"px";
    elem.style.top=ypos+"px";

    var repeat="moveElement("+elementID+","+final_x+","+final_y+","+interval+")";
    //var repeat="moveElement(elementID,final_x,final_y,interval)";
    movement=setTimeout(repeat,20);

}

addLoadEvent(messagePosition);
