<?php
session_start();
include("cn.php");
include("common.php");
checklogin();
?>
<?php
$gid = $_GET['gid'];

mysqli_query($link,"DELETE FROM global WHERE gid='$gid'");
header('Location:globle.php');
?>