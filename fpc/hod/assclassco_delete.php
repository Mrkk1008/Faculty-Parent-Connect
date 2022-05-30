<?php
session_start();
include("cn.php");
include("common.php");
checklogin();
?>
<?php
$asid = $_GET['asid'];

mysqli_query($link,"DELETE FROM assignclass WHERE asid='$asid'");
header('Location:assclassco_display.php');
?>