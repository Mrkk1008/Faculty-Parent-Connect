<?php  
session_start();
include("cn.php");
include("common.php");
checklogin();
$dept = $_SESSION['dname'];



$id = $_POST['id'];
$st = $_POST['st'];

if($st == 'ACTIVE'){
    $res = mysqli_query($link, "update student set status='INACTIVE' where sid='$id'");
    echo "<button id=$id onclick=change('$id','INACTIVE')><i class='greydot'></i></button>";
}
if($st == 'INACTIVE'){
    $res = mysqli_query($link, "update student set status='ACTIVE' where sid='$id'");
    echo "<button id=$id onclick=change('$id','ACTIVE')><i class='greendot'></i></button>";
}