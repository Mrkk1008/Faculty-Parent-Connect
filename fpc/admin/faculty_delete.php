<?php
session_start();
include("cn.php");
include("common.php");
checklogin();
?>
<?php
$fid = $_GET['fid'];

mysqli_query($link,"DELETE FROM faculty WHERE fid='$fid'");
header('Location:faculty.php');
?>