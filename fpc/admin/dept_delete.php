<?php
session_start();
include("cn.php");
include("common.php");
checklogin();
?>
<?php
$did = $_GET['did'];

mysqli_query($link,"delete FROM department WHERE did='$did'");
header('Location:dept.php');
?>