<?php
class MyDB extends SQLite3
{
 function __construct()
 {
   $this->open('/home/cubie/database/tasks.db');
  }
}
$db = new MyDB();
if(!$db){
  echo $db->lastErrorMsg();
}else {
  echo "Opened database successfully\n";
}

$sql =<<<EOF
   CREATE TABLE tasks
   (id INT PRIMARY KEY     NOT NULL,
   content TEXT    NOT NULL,
   status INT     NOT NULL);
EOF;

$ret = $db->exec($sql);
if(!$ret){
echo $db->lastErrorMsg();
} else {
echo "Table created successfully\n";
}
$db->close();
?>
