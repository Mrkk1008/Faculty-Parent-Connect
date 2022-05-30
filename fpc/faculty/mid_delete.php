<?php
session_start();
include("cn.php");
include("common.php");
checklogin();
?>
<?php

$sem = $_GET['sem'];
$year = $_GET['year'];
$subcode = $_GET['sub'];

mysqli_query($link,"delete from midresult where sem='".$sem."' AND year='".$year."' AND subcode='".$subcode."' AND faculty_no='".$_SESSION['faculty_no']."' AND dname='".$_SESSION['dname']."'");

header('Location:midresult.php');
?>