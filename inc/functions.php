<?php
/*------------------------------------
SimsmaBBS��ҵ��
һ��PHP�������˷���������֧��
�ٷ�վ�㣺http://www.17php.com
ϵͳ�ܺ����� The total Functions Libary
Createed By rznqp@163.com (c)2007
�������� һ��PHPվ�� ������ ��д QQ4304410
------------------------------------*/
error_reporting(E_ALL ^ E_NOTICE);
@ Session_start();
//����ʱ��Ϊ�Ϻ�ʱ����PHP��Ȼû�б���ʱ�����ɻ��У�
date_default_timezone_set("Asia/Shanghai");
/**
 * ����ȫ�ֱ���
 */
@require_once("inc/const.php");
/**
 * ���ݿ������ࡣ
 * ��������һ�������������Ƿ��Զ���ʼ���ӣ�Ĭ��ΪTRUE
 */
class mysql{
  //The Default Database Settings
  var $db= DATA_DB;
  var $host= DATA_HOST;
  var $user= DATA_USER;
  var $pass= DATA_PASS;
  var $port= DATA_PORT;
  var $charset='gb2312';
  var $id=false;
  var $rs;
  var $error=false;
  var $error_msg='';
  function __construct($autoconnect = true){
    if($autoconnect){
   	 $this->link();
    }
   }
   public function link(){
        if(!is_object($this->id)){
   	   $this->id = @mysql_connect($this->host.':'.$this->port,$this->user,$this->pass);
        }
   	if(!$this->id){
        $this->error = true;
   		$this->error_msg = '�޷����ӵ����ݿ�.�����Ƿ���������ά�������û������.����.<br>�����ο���Ϣ:<br>'.mysql_errno();   	   	
                echo $this->error_msg;
 		exit;
   	}else{
   		if(!mysql_select_db($this->db,$this->id)){
   			$this->error = true;
   			$this->error_msg = '�޷�ѡ�����ݿ⣬�������ݿ������Ƿ���ȷ��<br>�����ο���Ϣ��<br>'.mysql_error();
   		}
   		//$this->excu('SET CHARACTER SET '.$this->charset);
   	}
   }
   public function excu($sql){
   	if(!$this->id){
   		$this->error = true;
   		$this->error_msg = '�������󡣼����ο���Ϣ���������ӵ�MYSQL,Ȼ����ִ��SQL���.'; 
   		return false;  	
   	}else{
   		mysql_query("set names 'gbk'");
   		$result =@ mysql_query($sql,$this->id);
   		if(mysql_errno()>0){
   			$this->error = true;
   			$this->error_msg = 'ִ��SQL���ʧ��.SQL���Ϊ:<br>'.$sql.'<br>�����ο���Ϣ:<br>'.mysql_error();
   			return false;
   		}
                $this->rs = $result;
   		return $result;
   	}
   }
   public function close(){
   mysql_close($this->id);
   }
}
/**
 * �����ݼ�¼���з�ҳ����
 *
 */

 function alert($message,$url = '#'){
	echo "<script language=javascript>";
	echo "alert('".TIPS.".'\n'.$message.'\n'.'\");";
	if($url!='#'){
		if($url!='-1'){
		echo "location.href='".$url."';";
		}else{
		echo "history.go(-1);";
		}
	}
	echo "</script>";
 }
 //��ת������ҳ��ĺ���
 function popErrors($error_id){
   header("Location:error.php?id=".$error_id);
   exit;
 }
/* return some spaces in HTML fromt.
 @para $num: how many spaces you need
 @access:public
 @return:string
 */ 
function space($num){
	$spaces = '';
	for($i=1;$i<=$num;$i++){
		$spaces .= '&nbsp;';
	}
	return $spaces;
}
function cnSpace($num){
 $spaces='';
 for($i=0;$i<=$num;$i++){
 $spaces .= "��";
 }
 return $spaces;
}
/* return a format string with <font> tag
 @para $str:the string you want to format.
 @para $color:the color you want the characters to be.
 @para $pixs:the size of the character.
 @access :public
 @return :string
 */
function font($str,$color,$pixs = 12){
	return "<font style='font-size:".$pixs."px;color:".$color."'>".$str."</font>";
}
/**
 * return a format string with <a> tag
 * @param string $str
 * @param string $url
 * @param string $target
 * @return string
 */
function a($str,$title,$url,$target = '_self'){
   return "<a href='".$url."' target='".$target."' title='".$title."'>".$str."</a>";
}
 //����½״̬�ĺ���
 function check_login_status($session_name = "SESS_USERNAME")
 {
  if($_SESSION[$session_name]==""){
    popErrors("011");
    exit;
  }
}
/*
����Ϊgongqingkui@126.com
//ͨ��get�õ��������մ���session�С�
*/
function setSESSday()
{
if($_GET['year'])
{
	if($_SESSION['SESS_YEAR'])
	{
		$_SESSION['SESS_YEAR'] = intval($_GET['year']);
	}
	else 
	{
		session_register("SESS_YEAR");
		$_SESSION['SESS_YEAR'] = intval($_GET['year']);
	}
}
else 
{
	if($_SESSION['SESS_YEAR'])
	{
		/*$_SESSION['SESS_YEAR'] = date("Y",time());*/
	}
	else 
	{
		session_register("SESS_YEAR");
		$_SESSION['SESS_YEAR'] = date("Y",time());
	}
}
if($_GET['month'])
{
	if($_SESSION['SESS_MONTH'])
	{
		$_SESSION['SESS_MONTH'] = sprintf("%02d",intval($_GET['month']));
	}
	else 
	{
		session_register("SESS_MONTH");
		$_SESSION['SESS_MONTH'] = sprintf("%02d",intval($_GET['month']));
	}
}
else
{
	if($_SESSION['SESS_MONTH'])
	{
		/*$_SESSION['SESS_MONTH'] = date("m",time());*/
	}
	else 
	{
		session_register("SESS_MONTH");
		$_SESSION['SESS_MONTH'] = date("m",time());
	}
}
if($_GET['day'])
{
	if($_SESSION['SESS_DAY'])
	{
		$_SESSION['SESS_DAY'] = sprintf("%02d",intval($_GET['day']));
	}
	else 
	{
		session_register("SESS_DAY");
		$_SESSION['SESS_DAY'] = sprintf("%02d",intval($_GET['day']));
	}
}
else
{
	if($_SESSION['SESS_DAY'])
	{
		/*$_SESSION['SESS_DAY'] = date("d",time());*/
	}
	else 
	{
		session_register("SESS_DAY");
		$_SESSION['SESS_DAY'] = date("d",time());
	}
}
}
/*
 * �������Ӣ�﷭��ɸ������ԣ������������� ��׺����
 */
function tran($word)
{
	//echo $word;
	global $dic;
	if(LOCATION=="en")	
	{
		return $dic[$word][0];
	}
	elseif(LOCATION=="cn")
	{
		return $dic[$word][1];
	}elseif(LOCATION=="tw")
	{
		return $dic[$word][2];
	}
	else
	{
		//û�е�¼��������ú���
		return $dic[$word][1];
	}
}
/**
 * get che Unix time of China(GMT+8)
 * no parameters
 * @return int
 */
function cntime(){
 return time();
}
/*
trcolor
*/
function trcolor()
{
	static $a=1;
	return ($a=$a*-1)==1?"color1":"color2";
}
function cnSubStr($string,$sublen){
  if($sublen>=strlen($string)){
    return $string;
  }
$s="";
for($i=0;$i<$sublen;$i++){
  if(ord($string{$i})>127){
    $s.=$string{$i}.$string{++$i};
    continue;
  }else{
    $s.=$string{$i};
    continue;
  }
}
return $s."..";
}
/*
 * setCookie($var,$value)
 */
function set_cookie($var,$value)
{
	setcookie ($var,$value,time()+3600*24*7);///һ��ʱ��  
}
/*
 * getCookie($var)
 */
function get_cookie($var)
{
	return $_COOKIE[$var];
}
//���΢��
function weimiao(){
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}
function with_get($script)
{
	$page = $script;
	$page = $page."?";
	foreach($_GET as $key => $val)
	{
		$page = $page.$key."=".$val."&";
	}
	return substr($page,0,strlen($page)-1);

}
//UBB�����������ʽ����
function  ubb($text){  
  $text=eregi_replace("\[hr\]","<hr>",$text);     
  $text=eregi_replace("\[i\]","<i>",$text);   
  $text=eregi_replace("\[/i\]","</i>",$text);   
  $text=eregi_replace("\[b\]","<b>",$text);   
  $text=eregi_replace("\[/b\]","</b>",$text);   
  $text=eregi_replace("\[u\]","<u>",$text);   
  $text=eregi_replace("\[/u\]","</u>",$text); 
  //5.1���ϰ汾�Ѿ�ȡ����h1-h5��email��ǵ�֧�֡�  
  $text=eregi_replace("\[code\]","<blockquote><div class=code><b>Code:</b>",$text); 
  $text=eregi_replace("\[/code\]","</div></blockquote>",$text);    
  $text=eregi_replace("\[color=#([a-fA-F0-9]{6})\]","<font   color=#\\1>",$text);   
  $text=eregi_replace("\[/color\]","</font>",$text); 
  $text=eregi_replace("\[emot=([a-zA-Z\_]+)\]","<img  src=editer/emoticons/\\1.png>",$text);   
  $text=eregi_replace("\[emot=([0-9]+)\]","<img  src=editer/emoticons/\\1.gif>",$text);     
  $text=eregi_replace("\[size=([0-9])\]","<font   size='\\1'>",$text);   
  $text=eregi_replace("\[/size\]","</font>",$text);   
  $text=eregi_replace("\[font=(.+)\](.+)\[/font\]","<font   face='\\1'>\\2</font>",$text);     
  $text=eregi_replace("\[email\](.+)\[/email\]","<a   href='mailto:\\1'>\\1</a>",$text);
  $text=eregi_replace("\[url=([-a-zA-Z0-9\:\/\.\?\=\&\_\-\%#]+)\]","<a   href='\\1'  target='_blank'>",$text);   
  $text=eregi_replace("\[/url\]","</a>",$text);   
  $text=eregi_replace("\[img]([-a-zA-Z0-9\:\/\.\&\_\%]+)\[/img\]","<a   href='\\1'  target='_blank'><img src='\\1' border=0 title='����鿴ͼƬ' onLoad='if(this.width>700){this.width=700;}'></a>",$text);   
  return  $text;   
} 
/**
 * �Խ�Ҫ�������ҳ�Ĵ�����ݽ��д���
 * ��UBB���롢����ո��������Ҫ����
 * @param unknown_type $str
 */
function printout($str,$ubb){
	$str = str_replace(' ','&nbsp;',$str);
	if($ubb=='1'){
	$str = ubb($str);
	}
	return $str;	
}
?>