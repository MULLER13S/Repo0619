function displayAbbreviations(){
    //检查兼容性；
    if (!document.getElementsByTagName || !document.createElement ||
        !document.createTextNode) {
        return false;
    }
    //取得缩略词；
    var abbreviations=document.getElementsByTagName("abbr");
    if(abbreviations.length<1){
        return false;
    }
    //遍历缩略词；
    var defs=new Array();
    for(var i=0;i<abbreviations.length;i++){


        var current_abbr=abbreviations[i];
        //排除IE地雷；
        if(current_abbr.length<1) continue;

        var definiton=current_abbr.getAttribute("title");
        var key=current_abbr.lastChild.nodeValue;
        defs[key]=definiton;

    }
//创建定义列表；
    var dlist=document.createElement("dl");
    for(key in defs){
        var definition=defs[key];
        //创建定义标题；
        var dtitle=document.createElement("dt");
        var dtitle_text=document.createTextNode(key);
        dtitle.appendChild(dtitle_text);
        var ddesc=document.createElement("dd");
        var ddesc_text=document.createTextNode(definition);
        ddesc.appendChild(ddesc_text);
        dlist.appendChild(dtitle);
        dlist.appendChild(ddesc);
    }
//ie地雷；
    if(dlist.childNodes.length<1) return false;

    var header=document.createElement("h2");
    var header_text=document.createTextNode("Abbreviations");
    header.appendChild(header_text);
    document.body.appendChild(header);
    document.body.appendChild(dlist);



}
//函数在加载后被调用；
//window.onload=displayAbbreviations;

addLoadEvent(displayAbbreviations);