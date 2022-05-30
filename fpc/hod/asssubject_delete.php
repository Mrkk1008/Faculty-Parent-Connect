<?php
session_start();
include("cn.php");
include("common.php");
checklogin();
?>
<?php
$asid = $_GET['asid'];

mysqli_query($link,"delete FROM asssubject where asid='$asid'");
header('Location:asssubject.php');
?>