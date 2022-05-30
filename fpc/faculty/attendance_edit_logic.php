<?php
session_start();
include("cn.php");
include("common.php");
checklogin();
$dname = $_SESSION['dname'];


if (isset($_POST['attsubmit']))
{
    $sem = $_POST['sem'];
    $year = $_POST['year'];

    $subcode = $_POST['subcode'];

    $ressub = mysqli_query($link, "select shortname from subject where subcode='$subcode'");
    $rowsubname = mysqli_fetch_array($ressub, MYSQLI_BOTH);
    
    $shortname = $rowsubname['shortname'];

    $from = $_POST['from'];

    $to = $_POST['to'];

    $fromx = $_POST['fromx'];

    $tox = $_POST['tox'];

    $datex = $_POST['datex'];

    $subcodex = $_POST['subcodex'];

    $c=0;
    $resstu = mysqli_query($link, "select * from attedence where sem=$sem AND year=$year AND subcode=$subcodex AND faculty_no='".$_SESSION['faculty_no']."' AND date='$datex' AND time_start='$fromx' AND time_end='$tox' ORDER By erno");
    while($rowstu = mysqli_fetch_array($resstu, MYSQLI_BOTH) )
    {
        $c++;
        $postid = "student".$c;

        mysqli_query($link, "update attedence set subname='$shortname', subcode='$subcode', date='".$_POST['date']."', time_start='$from', time_end='$to', ap='".$_POST[$postid]."' where erno='".$rowstu['erno']."' AND sem=$sem AND year=$year AND subcode=$subcodex AND faculty_no='".$_SESSION['faculty_no']."' AND date='$datex' AND time_start='$fromx' AND time_end='$tox'");
        
    }
    header('Location:attendance_view.php');
}


?>