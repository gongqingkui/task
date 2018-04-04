<?php
session_start();
$user = $_GET['user'];
$pass = $_GET['pass'];
echo $user,$pass;
if ($user=='gongqingkui' and $pass=='123')
{
  $_SESSION['user']=$user;
  echo  $_SESSION['user'];
  header("Location:index.php");
 }else{
 header("Location:login.php");
 }
