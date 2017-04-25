<?php
error_reporting(E_ALL ^ E_NOTICE);
//[database]
define("DATA_HOST","localhost");
define("DATA_PORT","3306");
define("DATA_USER","root");
define("DATA_PASS","root");
define("DATA_DB","tasks");



class mysql{
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
$this->error_msg = ''.mysql_errno();
echo $this->error_msg;
exit;
}else{
if(!mysql_select_db($this->db,$this->id)){
$this->error = true;
$this->error_msg = ''.mysql_error();
}
//$this->excu('SET CHARACTER SET '.$this->charset);
}
   }
  public function excu($sql){
if(!$this->id){
$this->error = true;
$this->error_msg = '';
return false;
}else{
mysql_query("set names 'gbk'");
$result =@ mysql_query($sql,$this->id);
if(mysql_errno()>0){
$this->error = true;
$this->error_msg ='aaa';
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
class sqlitedb extends SQLite3
{
  function __construct()
  {
$this->open('/home/cubie/database/tasks.db');
  }
}
?>
