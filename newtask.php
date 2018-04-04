<?php
    require("functions.php");
    $content = $_GET["content"];
    $date = $_GET["date"];

    $db = new db();
    if($date !=null){
    $sql = "insert into tasklogs(content,date,status)values('".$content."','".$date."',1)";
    }else{
    $sql = "insert into tasklogs(content,status)values('".$content."',1)";
    }
    echo $sql;
    $ret = $db->exec($sql);
    $db->close();
    
    header("Location:index.php");
?>
