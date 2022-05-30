<?php
session_start();
include("cn.php");
include("common.php");
//checklogin();
$dname = $_SESSION['dname'];


if (isset($_POST['submit'])){
$sem = $_POST['semm'];
$year = $_POST['yearr'];
$resstu = mysqli_query($link, "select * from student where sem=$sem  AND dept='$dname' AND status='ACTIVE' ORDER BY erno");
$c=1;
while ($rowstu = mysqli_fetch_array($resstu, MYSQLI_BOTH)){
    
    $postname = "student".$c;
    
    mysqli_query($link, "insert into midresult (sname,erno,subname,subcode,doe,marks,sem,year,dname,facultyname,faculty_no) values('".$rowstu['fname']." ".$rowstu['lname']."','".$rowstu['erno']."','".$_POST['subname']."','".$_POST['subcode']."','".$_POST['doe']."','".$_POST[$postname]."','".$rowstu['sem']."','".$year."','$dname','".$_SESSION['fname']." ".$_SESSION['lname']."',".$_SESSION['faculty_no'].")");

    $c++;
}
header('Location:midresult.php');

}

?>