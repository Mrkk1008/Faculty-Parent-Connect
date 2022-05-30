<?php
session_start();
include("cn.php");
include("common.php");
checklogin();
?>
<?php
$sid = $_GET['sid'];

mysqli_query($link,"DELETE  student, parent FROM student INNER JOIN parent ON parent.erno=student.erno WHERE student.sid='$sid' ");
header('Location:student.php');
?>