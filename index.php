<?php 
session_start();
if($_SESSION['user'])
{
  #echo  $_SESSION['user'];
}else{
#echo 'aaa';
header('Location:login.php');
}?>
<!doctype html>
<html mainfest="demo.appcache">
<head>
  <title>Task</title>

  <meta name="apple-mobile-web-app-capable" content="yes"/>  
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
  <meta name="apple-mobile-web-app-title" content="Task"/>
  <meta name="viewport" content="width=device-width"/>
  <meta name="HandheldFriendly" content="true"/>
  <meta content="text/html;charset=utf-8" http-equiv="Content-type"/>
  <meta name="MobileOptimized" content="320"/>

  <link rel="shortcut icon" href="gong.png">
  <link rel="stylesheet" style="text/css" href="base.css">
</head>
<body onLoad="document.formnewtask.content.focus()">
  <div id="header">Task</div>
  <div id="oper">
     <form action="newtask.php" name="formnewtask">
<input type="text" name="content" />
<input type="date" name="date"/>
<input type="submit" value="New Task"/>
     </form> 
  </div>
  <div id="content">
  <h3>Date</h3>
  <ul>
  <?php
    require('functions.php');
    $today = date('Y-m-d');
    $db = new db();
    $rs = $db->query("select * from tasklogs where status =1 and date not null order by date");
    while($r = $rs->fetchArray(SQLITE3_ASSOC)){
      echo "<li >[<a href='confirm.php?id=".$r['id']."'>Confirm</a>]<span  class='";      
      if($today == $r['date']){
        echo 'today';
      }elseif($today<$r['date']){
        echo 'future';
      }elseif($today>$r['date']){
        echo 'last';
      }
      echo "'>".$r['date'].": ".$r['content'].$r['id']."</span></li>";

    }
    $db->close();
  ?>
  </ul>
  <h3>Task</h3>
  <ul>
  <?php
    $db = new db();
    $rs = $db->query("select * from tasklogs where status =1 and date is null");
    $ind =1;
    while($r = $rs->fetchArray(SQLITE3_ASSOC)){
      echo "<li>[<a href='confirm.php?id=".$r['id']."'>Confirm</a>]".$ind++.".".$r['content'].$r['id']."</li>";
    }
    $db->close();
  ?>
  </ul>
  </div>
  <div id="footer">Task Ver:0.1 <br/>gongqingkui AT 126.com<br/>all rights reserved<br/><a href="logout.php" style="color:white">Logout</a></div>
</body>
</html>
