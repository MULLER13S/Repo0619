function insertParagragh(text){
    var str="<p>";
    str +=text;
    str+="</p>";
    document.write(str);
}

//window.onload=function(){
//    var testDiv=document.getElementById("testDiv");
//    alert(testDiv.innerHTML);
//}

window.onload= function () {
    var para=document.createElement("p");
    var testDiv=document.getElementById("testDiv");
    testDiv.appendChild(para);
    var txt=document.createTextNode("Hello Sunday");
    para.appendChild(txt);
}
