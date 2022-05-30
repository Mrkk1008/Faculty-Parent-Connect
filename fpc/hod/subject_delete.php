<?php
session_start();
include("cn.php");
include("common.php");
checklogin();
?>
<?php
$sid = $_GET['sid'];

mysqli_query($link,"delete FROM subject WHERE sid='$sid'");
header('Location:subject.php');
?>