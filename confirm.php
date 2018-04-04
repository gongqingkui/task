  <?php
    require("function.php");
    $id = $_GET["id"];
    $db = new sqlitedb();
    if(!$db){echo $db->lastErrorMsg();}else{echo "open ok\n";}

    $sql = "update tasks set status = 2 where id = ".$id."";
    echo $sql;
    $ret = $db->exec($sql);
    if($ret){
      echo $db->lastErrorMsg();
    }else{
      echo $db->changes(),"record update";
    }

    $db->close();
  ?>
