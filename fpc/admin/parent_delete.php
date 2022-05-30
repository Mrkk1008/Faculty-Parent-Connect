<?php
session_start();
include("cn.php");
include("common.php");
checklogin();
?>
<?php
$pid = $_GET['pid'];

mysqli_query($link,"delete FROM parent WHERE pid='$pid'");
header('Location:parent.php');
?>
