<?php
class db extends SQLite3
{
  function __construct()
  {
    $this->open('tasks.db');
  }
}
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
?>
