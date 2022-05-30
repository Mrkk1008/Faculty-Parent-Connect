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

    $ltype = $_POST['ltype'];

    $from_er = $_POST['from_er'];
    $to_er = $_POST['to_er'];

    $subcode = $_POST['subcode'];

    $ressub = mysqli_query($link, "select shortname from subject where subcode='$subcode'");
    $rowsubname = mysqli_fetch_array($ressub, MYSQLI_BOTH);
    $shortname = $rowsubname['shortname'];

    $from = $_POST['from'];
    $to = $_POST['to'];
 
    $c=0;
    if($from_er == "" AND $to_er == ""){
        $resstu = mysqli_query($link, "select * from student where sem='$sem' AND dept='$dname' AND status='ACTIVE' ORDER By erno");
    }else{
        $resstu = mysqli_query($link, "select * from student where sem='$sem' AND dept='$dname' AND status='ACTIVE' AND erno between '$from_er' AND '$to_er' ORDER By erno");
    }
    
    while($rowstu = mysqli_fetch_array($resstu, MYSQLI_BOTH) )
    {
        $c++;
        $postid = "student".$c;

        mysqli_query($link, "insert into attedence (erno, sname, dname, sem, year,subcode, subname, facultyname, faculty_no, date, time_start, time_end, ap, type) values ('".$rowstu['erno']."','".$rowstu['fname']." ".$rowstu['lname']."','$dname','$sem','$year','$subcode','$shortname','".$_SESSION['fname']." ".$_SESSION['lname']."','".$_SESSION['faculty_no']."','".$_POST['date']."','$from','$to','".$_POST[$postid]."', '$ltype')");
        
    }
    header('Location:attendance_view.php');
}


?>