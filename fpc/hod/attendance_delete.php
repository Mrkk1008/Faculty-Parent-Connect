<?php
session_start();
include("cn.php");
include("common.php");
checklogin();
?>
<?php

$sem = $_GET['sem'];
$year = $_GET['year'];
$subcode = $_GET['subcode'];
$subname = $_GET['subname'];
$date = $_GET['date'];
$time_start = $_GET['time_start'];
$time_end = $_GET['time_end'];

mysqli_query($link,"delete from attedence where  sem=$sem AND year=$year AND subcode=$subcode AND faculty_no='".$_SESSION['faculty_no']."' AND date='$date' AND time_start='$time_start' AND time_end='$time_end'");

header('Location:attendance_view.php');
?>