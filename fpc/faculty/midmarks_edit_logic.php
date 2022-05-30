<?php
session_start();
include("cn.php");
include("common.php");
checklogin();
$dname = $_SESSION['dname'];


if (isset($_POST['submit'])){
$sem = $_POST['semm'];
$year = $_POST['yearr'];
$subcode = $_POST['subcode'];
$resstu = mysqli_query($link, "select * from midresult where sem='$sem' AND year='$year' AND subcode='$subcode' AND dname='$dname' AND faculty_no='".$_SESSION['faculty_no']."' ORDER BY erno");
$c=0;
while ($rowstu = mysqli_fetch_array($resstu, MYSQLI_BOTH))
{
    $c++;
    
    $postname = "student".$c;
    
    mysqli_query($link, "update midresult set marks='".$_POST[$postname]."' , doe='".$_POST['doe']."' WHERE sem='$sem' AND year='$year' AND subcode='$subcode' AND dname='$dname' AND faculty_no='".$_SESSION['faculty_no']."' AND erno='".$rowstu['erno']."'");

    
}
//mysqli_query($link,"insert into mid_rec(sem, year, faculty_no,subcode,dname) values('$sem','$year','".$_SESSION['faculty_no']."','".$_POST['subcode']."','$dname')");
header('Location:midresult.php');

}

?>