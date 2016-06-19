<?php
/**
  * wechat php test
  */

//define your token
define("TOKEN", "weixin03");
$wechatObj = new wechatCallbackapiTest();
$wechatObj->responseMsg();

//$wechatObj->valid();
//exit;
class wechatCallbackapiTest
{
	public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
			//必须添加header，原微信样板少了这一行，token验证不通过；
			header('content-type:text');
        	echo $echoStr;
        	exit;
        }
    }

	//这个函数专门处理业务逻辑；
    public function responseMsg()
    {
		//get post data, May be due to the different environments
		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

      	//extract post data
		if (!empty($postStr)){
                /* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
                   the best way is to check the validity of xml by yourself */
			//xml技术解析数据；
                libxml_disable_entity_loader(true);
              	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $fromUsername = $postObj->FromUserName;
                $toUsername = $postObj->ToUserName;
                $keyword = trim($postObj->Content);

			//这个$event就是事件具体内容；
			$event=$postObj->Event;
			//当我们调试微信时，将信息输出到文件中；
			//file_put_contents("abc.log",$fromUsername.'-'.$toUsername.'-'.$keyword,FILE_APPEND);


                $time = time();
                $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";


			//当用户关注微信平台，会发送一个订阅事件；
			switch($postObj->MsgType){
				case 'event':
					//如果是用户订阅事件
					if($event=='subscribe'){
					$contentStr="welcome,南山网新闻系统\r\n\r\n *菜单如下\r\n\r\n
					1.输入新闻就返回新闻条目";
			//这里我们先返回菜单，填充模板即可
						$msgType='text';
					$textTpl=sprintf($textTpl,$fromUsername,$toUsername,$time,$msgType,$contentStr);
						echo $textTpl;
				}
					break;
				case 'text':
					if($keyword=='新闻'){
						//返回新闻列表
						/*$newsTpl="
						<xml>
						<ToUserName><![CDATA[%s]]></ToUserName>
						<FromUserName><![CDATA[%s]]></FromUserName>
						<CreateTime>%s</CreateTime>
						<MsgType><![CDATA[news]]></MsgType>
						<ArticleCount>2</ArticleCount>
						<Articles>
						<item>
						<Title><![CDATA[%s]]></Title>
						<Description><![CDATA[%s]]></Description>
						<PicUrl><![CDATA[%s]]></PicUrl>
						<Url><![CDATA[%s]]></Url>
						</item>
						<item>
						<Title><![CDATA[%s]]></Title>
						<Description><![CDATA[%s]]></Description>
						<PicUrl><![CDATA[%sl]]></PicUrl>
						<Url><![CDATA[%s]]></Url>
						</item>
						</Articles>
						</xml>
						";*/

						$newsTplHeader="
						<xml>
						<ToUserName><![CDATA[%s]]></ToUserName>
						<FromUserName><![CDATA[%s]]></FromUserName>
						<CreateTime>%s</CreateTime>
						<MsgType><![CDATA[news]]></MsgType>
						<ArticleCount>%s</ArticleCount>
						<Articles>
						";
						//这里需要循环拼接
						$newsTplItem="
						<item>
						<Title><![CDATA[%s]]></Title>
						<Description><![CDATA[%s]]></Description>
						<PicUrl><![CDATA[%s]]></PicUrl>
						<Url><![CDATA[%s]]></Url>
						</item>
						";
						$newsTplFooter="
						</Articles>
						</xml>
						";

						/*//后面这些数据从数据库取
						$title1='新闻标题1';
						$title2='新闻标题2';
						$des1='新闻描述内容1...';
						$des2='新闻描述内容2...';

						$picUrl1="http://20160301.qilinhuayuan.applinzi.com/upload/newsImage/1.jpg";
						$picUrl2="http://20160301.qilinhuayuan.applinzi.com/upload/newsImage/2.jpg";

						//点击图片跳转的地址
						$url1="http://news.baidu.com";
						$url2="http://news.qq.com";*/


						$link=mysqli_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,
							SAE_MYSQL_PASS,app_qilinhuayuan);
						mysqli_query($link,"set names utf8");
						$sql="select title,description,picUrl,url from newsImages limit 0,4";
						$res1=mysqli_query($link,$sql);
						$contentStr="";
						$itemCount=0;
						//循环取出数据
						while($row=mysqli_fetch_assoc($res1)){
							$contentStr.=sprintf($newsTplItem,$row['title'],$row['description'],
								$row['picUrl'],$row['url']);
							++$itemCount;
						}
						//开始拼接返回的结果
						$newsTplHeader=sprintf($newsTplHeader,$fromUsername,$toUsername,$time,$itemCount);
						$resultStr=$newsTplHeader.$newsTplItem.$newsTplFooter;
						/*//填充模板
						$resultStr=sprintf($newsTpl,$fromUsername,$toUsername,$time,$title1,$des1,$picUrl1,
							$url1,$title2,$des2,$picUrl2,$url2);*/
						echo $resultStr;
					}else if($keyword=='歌曲'){
						$contentStr="欢迎来到南山点歌系统\r\n\r\n菜单如下\r\n\r\n1.
						周杰伦-简单爱\r\n2.王菲-执迷不悔\r\n3.周杰伦-暗号\r\n输入歌曲编号，立马聆听";
						$msgType='text';
						$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
						echo $resultStr;//检测keyword是不是一个数
					}else if(preg_match("/^[1-9](\d){0,2}$/",$keyword)){
						if($keyword=='1'){
							$desc='周杰伦-简单爱';
						}else if($keyword=='2'){
							$desc='王菲-执迷不悔';
						}else if($keyword=='3'){
							$desc='周杰伦-暗号';
						}else{
							$desc='周杰伦-简单爱';
							$keyword=1;
						}
						//如何返回音乐--》查看微信开发文档
						$musicTpl="
						<xml>
					<ToUserName><![CDATA[%s]]></ToUserName>
					<FromUserName><![CDATA[%s]]></FromUserName>
					<CreateTime>%s</CreateTime>
					<MsgType><![CDATA[music]]></MsgType>
					<Music>
					<Title><![CDATA[周杰伦-王菲]]></Title>
					<Description><![CDATA[%s]]></Description>
					<MusicUrl><![CDATA[%s]]></MusicUrl>
					<HQMusicUrl><![CDATA[%s]]></HQMusicUrl>
					</Music>
					</xml>
						";

						//得到播放音乐的地址
						$musicUrl="http://20160301.qilinhuayuan.applinzi.com/mp3/{$keyword}.mp3";
						//填充返回的结果
						$resultStr = sprintf($musicTpl, $fromUsername, $toUsername, $time, $desc, $musicUrl,$musicUrl);
						echo $resultStr;
					}else if(preg_match("/^cxwz([\x{4e00}-\x{9fa5}]+)/ui",$keyword,$res)){
						$address=$res[1];
						//取出这个用户的地理位置
						$link=mysqli_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,
							SAE_MYSQL_PASS,app_qilinhuayuan);
						mysqli_query($link,"set names utf8");
						$sql="select longitude,latitude from `members` WHERE wxname='{$fromUsername}'";
						$res=mysqli_query($link,$sql);
						if($row=mysqli_fetch_assoc($res)) {
							$contentStr="点击该链接，即可查询\r\n\r\n
							 http://api.map.baidu.com/place/search?query=".urlencode($address)."&location=".$row['latitude'].",".$row['longitude']."&radius=1000&output=html&coord_type=gcj02";
							$msgType='text';
							$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
							echo $resultStr;
						}else{
							$contentStr="请先上报您的地理位置";
							$msgType='text';
							$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
							echo $resultStr;
						}

					}else if($keyword=='刮奖'){



					}else{
						$contentStr="你的输入格式不正确，请重新输入";
						$msgType='text';
						$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
						echo $resultStr;
					}
				break;
				//地理位置
				case 'location':
				//获取用户的经纬度
				$Location_Y=$postObj->Location_Y;
				$Location_X=$postObj->Location_X;
					$contentStr="您好，我们已经收到您的地理位置\r\n\r\n
					经度 {$Location_Y}\r\n
					纬度 {$Location_X}\r\n
					请输入你要查询的地方";
					$msgType='text';
					$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
					echo $resultStr;

				//创建一张members表，保存地址
					$link=mysqli_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,
						SAE_MYSQL_PASS,app_qilinhuayuan);
					mysqli_query($link,"set names utf8");


					$sql="select wxname from `members` WHERE wxname='{$fromUsername}'";
					$res2=mysqli_query($link,$sql);
					if($row=mysqli_fetch_assoc($res2)) {
						$sql="update `members` set longitude='{$Location_Y}',latitude='{$Location_X}',
join_time='{$time}' WHERE wxname='{$fromUsername}'";
						mysqli_query($link,$sql);

					}else{
						//如果用户不存在，说明第一次来，就添加
						$sql="insert into `members` (wxname,longitude,latitude,join_time)
VALUES ('{$fromUsername}','{$Location_Y}','{$Location_X}','{$time}')";
						mysqli_query($link,$sql);
					}



					break;

				default:
					break;

			}

				if(!empty( $keyword ))
                {
              		$msgType = "text";
					if($keyword=='ok'){
						$contentStr = "hello,欢迎来到CURRY";
					}else{
						preg_match('/(\d+)([+-])(\d+)/i',$keyword,$res);
						if($res[2]=='+'){
							$result=$res[1]+$res[3];
						}else if($res[2]=='-'){
							$result=$res[1]-$res[3];
						}
						$contentStr = "Welcome to wechat world!运算结果是：".$result;
					}


                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $resultStr;
                }else{
                	echo "Input something...";
                }

        }else {
        	echo "";
        	exit;
        }

    }
		
	private function checkSignature()
	{
        // you must define TOKEN by yourself
        if (!defined("TOKEN")) {
            throw new Exception('TOKEN is not defined!');
        }
        
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        		
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}
}

?>