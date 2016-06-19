<?php
$type=$_POST['type'];
$xmlDoc=new DOMDocument();
$xmlDoc->load("words.xml");

if($type=="query"){
    $query_word=$_POST['enword'];
    $words=$xmlDoc->getElementsByTagName("word");
    $isEnter=false;
    for($i=0;$i<$words->length;$i++){
        $word=$words->item($i);
        $word_en=getNodeVal($word,"en");
        if($query_word==$word_en){
            $isEnter=true;
            echo $query_word."--中文意思：".getNodeVal($word,"ch")."<br>";
        }

    }
    if(!$isEnter){
        echo "NOT FOUNDED";
    }
}else if($type=="add"){
    $eng_word=$_POST['enword'];
    $ch_word=$_POST['chword'];
    $root=$xmlDoc->getElementsByTagName("words")->item(0);
    $new_word=$xmlDoc->createElement("word");
    $new_word_en=$xmlDoc->createElement("en");
    $new_word_en->nodeValue=$eng_word;
    $new_word_ch=$xmlDoc->createElement("ch");
    $new_word_ch->nodeValue=$ch_word;
    $new_word->appendChild($new_word_en);
    $new_word->appendChild($new_word_ch);
    $root->appendChild($new_word);
    $b=$xmlDoc->save("words.xml");
    if(!$b){
        echo "添加失败";
    }else{
        echo "添加成功";
    }


}
function getNodeVal(&$mynode,$tagname){

    return $mynode->getElementsByTagName($tagname)->item(0)->nodeValue;
}
echo "<br><a href='wordView.php'>BACK</a> ";