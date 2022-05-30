<?php
session_start();
include("cn.php");
include("common.php");
checklogin();
$dname = $_SESSION['dname'];
$facultyname = $_SESSION['fname'] . " " . $_SESSION['lname'];
$faculty_no = $_SESSION['faculty_no'];



if (isset($_POST['attsubmit'])) {
    $sem = $_POST['sem'];
    $year = $_POST['year'];

    $ltype = $_POST['ltype'];

    $batch = $_POST['batch'];

    $subcode = $_POST['subcode'];

    $topic = $_POST['topic'];

    $ressub = mysqli_query($link, "select shortname from subject where subcode='$subcode'");
    $rowsubname = mysqli_fetch_array($ressub, MYSQLI_BOTH);
    $shortname = $rowsubname['shortname'];

    $from = $_POST['from'];
    $to = $_POST['to'];

    $c = 0;
    if($ltype == 'LECTURE'){
        $resstu = mysqli_query($link, "select * from student where sem='$sem' AND current_year='$year' AND dept='$dname' AND status='ACTIVE' ORDER By erno");
    }else if($ltype == 'LAB'){
        $resstu = mysqli_query($link, "select * from student where sem='$sem' AND current_year='$year' AND dept='$dname' AND status='ACTIVE' AND batch='$batch' ORDER By erno");
    }
    while ($rowstu = mysqli_fetch_array($resstu, MYSQLI_BOTH)) {
        $c++;
        $postid = "student" . $c;

        mysqli_query($link, "insert into attedence (erno, sname, dname, sem, year,subcode, subname, facultyname, faculty_no, date, time_start, time_end, ap, type, batch) values ('" . $rowstu['erno'] . "','" . $rowstu['fname'] . " " . $rowstu['lname'] . "','$dname','$sem','$year','$subcode','$shortname','" . $facultyname . "','" . $faculty_no . "','" . $_POST['date'] . "','$from','$to','" . $_POST[$postid] . "', '$ltype', '$batch')");
    }
    mysqli_query($link, "insert into TDIC (sem, year, date, time_start, time_end, subname, subcode, facultyname, faculty_no, topic, dname) values ('$sem', '$year', '".$_POST['date']."', '$from', '$to', '$shortname', '$subcode', '$facultyname', '$faculty_no', '$topic', '$dname')");
    header('Location:attendance_view.php');
}
