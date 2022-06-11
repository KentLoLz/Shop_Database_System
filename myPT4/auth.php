<?php
session_start();
$userlevel=$_SESSION['userlevel'];
if ($userlevel == ""){
  header("Location:login.php");
}
 
?>