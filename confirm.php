  <?php
    require("functions.php");
    $id = $_GET["id"];
    
    $db = new db();
    $sql = "update tasklogs set status = 2 where id = ".$id."";
    $ret = $db->exec($sql);
    $db->close();
    
    header("Location:index.php");
  ?>
