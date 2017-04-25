<!doctype html>
<html mainfest="demo.appcache">
<head>
  <title>Task Test</title>
  <meta name="HandheldFriendly" content="true">
  <meta name="MobileOptimized" content="320">
  <meta name="viewport" content="width=device-width">
  <link rel="shortcut icon" href="gong.png">
  <style>
    html{-webkit-text-size-adjust:none;}
    a{text-decoration:none;}
    #header,#footer,#messager,#content,#oper{padding:15px}
    #header,#footer{background:blue;text-align:center;}
    #header{color:white;font-size:50px;}
    #messager{color:red;}
    #content li{padding:5px;}
    #footer{color:white;}
  </style>
</head>

<body>
  <?php require_once 'function.php';?>
  <div id="header">Task</div>
  <div id="oper">
     <form>
<input type="text"/>
<input type="date"/>
<input type="submit"/>
     </form> 
  </div>
  <div id="messager">message</div>
  <div id="content">
  <ul>
  <?php
  $s = new mysql;
  $sql = "select * from tasks";
  $s->excu($sql);
  while($r = @mysql_fetch_assoc($r->rs)){
    echo $r['content'];
  
  }
  ?>
  </ul>
  </div>
  <div id="footer">Task Ver:0.1 <br/>gongqingkui AT 126.com<br/>all rights reserved</div>
</body>
</html>
