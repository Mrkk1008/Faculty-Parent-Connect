<?php  
session_start();
include("cn.php");
include("common.php");
checklogin();

$id = $_POST['id'];
$st = $_POST['st'];

if($st == 'ACTIVE'){
    $res = mysqli_query($link, "update faculty set status='INACTIVE' where fid='$id'");
    echo "<button id=$id onclick=change('$id','INACTIVE')><i class='greydot'></i></button>";
}
if($st == 'INACTIVE'){
    $res = mysqli_query($link, "update faculty set status='ACTIVE' where fid='$id'");
    echo "<button id=$id onclick=change('$id','ACTIVE')><i class='greendot'></i></button>";
}