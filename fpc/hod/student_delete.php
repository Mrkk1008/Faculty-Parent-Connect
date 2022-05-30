<?php
session_start();
include("cn.php");
include("common.php");
checklogin();
?>
<?php
$sid = $_GET['sid'];

mysqli_query($link,"DELETE FROM student WHERE sid='$sid'");
header('Location:student.php');
?>
