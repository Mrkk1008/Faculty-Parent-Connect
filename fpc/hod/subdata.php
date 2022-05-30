<?php
session_start();
include("cn.php");
include("common.php");
$dname = $_SESSION['dname'];

if (isset($_POST["sem"]) && !empty($_POST["sem"])) {
    $_SESSION['sem'] = $_POST['sem'];
    $res1 = mysqli_query($link, "select * from subject where dname='$dname' AND sem='" . $_SESSION['sem'] . "'");

    echo '<option value="">select</option>';
    while ($row1 = mysqli_fetch_array($res1, MYSQLI_BOTH)) {
        echo '<option value="' . $row1['shortname'] . '">' . $row1['shortname'] . '</option>';
    }
    // $res1 = mysqli_query($link,"select * from subject where dname='$dname' AND sem='".$_SESSION['sem']."'");
    // while($row1 = mysqli_fetch_array($res1, MYSQLI_BOTH))
    // {
    //     echo '<option value="'.$row1['shortname'].' LAB">'.$row1['shortname'].' LAB</option>';
    // }
}

if (isset($_POST['Submit'])) {
    $sem = $_SESSION['sem'];
    $year = $_POST['year'];
    $resultf = mysqli_query($link, "Select * from time");
    $j = 1;
    while ($rowf = mysqli_fetch_array($resultf, MYSQLI_BOTH)) {
        //Monday
        $rstr = "rsubmon" . $j;
        if ($_POST[$rstr] == 'LEC') {
            $str = "submon" . $j;
            $fresult1 = mysqli_query($link, "insert into timetable (period,time_start,time_end,day,dname,year,sem,subname,type) values('" . $rowf['period'] . "','" . $rowf['time_start'] . "','" . $rowf['time_end'] . "','MONDAY','$dname','$year','$sem','" . $_POST[$str] . "','LEC')");
        } else if ($_POST[$rstr] == 'LAB') {
            $str = "submon" . $j;
            $bid = "bsubmon" . $j;
            $batch = $_POST[$bid];
            $fresult1 = mysqli_query($link, "insert into timetable (period,time_start,time_end,day,dname,year,sem,subname,type,batch) values('" . $rowf['period'] . "','" . $rowf['time_start'] . "','" . $rowf['time_end'] . "','MONDAY','$dname','$year','$sem','" . $_POST[$str] . "','LAB','".$batch."')");
        }


        //Tuesday
        $rstr = "rsubtue" . $j;
        if ($_POST[$rstr] == 'LEC') {
            $str = "subtue" . $j;
            $fresult1 = mysqli_query($link, "insert into timetable (period,time_start,time_end,day,dname,year,sem,subname,type) values('" . $rowf['period'] . "','" . $rowf['time_start'] . "','" . $rowf['time_end'] . "','TUESDAY','$dname','$year','$sem','" . $_POST[$str] . "','LEC')");
        } else if ($_POST[$rstr] == 'LAB') {
            $str = "subtue" . $j;
            $bid = "bsubtue" . $j;
            $batch = $_POST[$bid];
            $fresult1 = mysqli_query($link, "insert into timetable (period,time_start,time_end,day,dname,year,sem,subname,type,batch) values('" . $rowf['period'] . "','" . $rowf['time_start'] . "','" . $rowf['time_end'] . "','TUESDAY','$dname','$year','$sem','" . $_POST[$str] . "','LAB','".$batch."')");
        }


        //Wednasday
        $rstr = "rsubwed" . $j;
        if ($_POST[$rstr] == 'LEC') {
            $str = "subwed" . $j;
            $fresult1 = mysqli_query($link, "insert into timetable (period,time_start,time_end,day,dname,year,sem,subname,type) values('" . $rowf['period'] . "','" . $rowf['time_start'] . "','" . $rowf['time_end'] . "','WEDNESDAY','$dname','$year','$sem','" . $_POST[$str] . "','LEC')");
        } else if ($_POST[$rstr] == 'LAB') {
            $str = "subwed" . $j;
            $bid = "bsubwed" . $j;
            $batch = $_POST[$bid];
            $fresult1 = mysqli_query($link, "insert into timetable (period,time_start,time_end,day,dname,year,sem,subname,type,batch) values('" . $rowf['period'] . "','" . $rowf['time_start'] . "','" . $rowf['time_end'] . "','WEDNESDAY','$dname','$year','$sem','" . $_POST[$str] . "','LAB','".$batch."')");
        }


        //Thusday
        $rstr = "rsubthus" . $j;
        if ($_POST[$rstr] == 'LEC') {
            $str = "subthus" . $j;
            $fresult1 = mysqli_query($link, "insert into timetable (period,time_start,time_end,day,dname,year,sem,subname,type) values('" . $rowf['period'] . "','" . $rowf['time_start'] . "','" . $rowf['time_end'] . "','THUSDAY','$dname','$year','$sem','" . $_POST[$str] . "','LEC')");
        } else if ($_POST[$rstr] == 'LAB') {
            $str = "subthus" . $j;
            $bid = "bsubthus" . $j;
            $batch = $_POST[$bid];
            $fresult1 = mysqli_query($link, "insert into timetable (period,time_start,time_end,day,dname,year,sem,subname,type,batch) values('" . $rowf['period'] . "','" . $rowf['time_start'] . "','" . $rowf['time_end'] . "','THUSDAY','$dname','$year','$sem','" . $_POST[$str] . "','LAB','".$batch."')");
        }
        

        //Friday
        $rstr = "rsubfri" . $j;
        if ($_POST[$rstr] == 'LEC') {
            $str = "subfri" . $j;
            $fresult1 = mysqli_query($link, "insert into timetable (period,time_start,time_end,day,dname,year,sem,subname,type) values('" . $rowf['period'] . "','" . $rowf['time_start'] . "','" . $rowf['time_end'] . "','FRIDAY','$dname','$year','$sem','" . $_POST[$str] . "','LEC')");
        } else if ($_POST[$rstr] == 'LAB') {
            $str = "subfri" . $j;
            $bid = "bsubfri" . $j;
            $batch = $_POST[$bid];
            $fresult1 = mysqli_query($link, "insert into timetable (period,time_start,time_end,day,dname,year,sem,subname,type,batch) values('" . $rowf['period'] . "','" . $rowf['time_start'] . "','" . $rowf['time_end'] . "','FRIDAY','$dname','$year','$sem','" . $_POST[$str] . "','LAB','".$batch."')");
        }
        

        //Satday
        $rstr = "rsubsat" . $j;
        if ($_POST[$rstr] == 'LEC') {
            $str = "subsat" . $j;
            $fresult1 = mysqli_query($link, "insert into timetable (period,time_start,time_end,day,dname,year,sem,subname,type) values('" . $rowf['period'] . "','" . $rowf['time_start'] . "','" . $rowf['time_end'] . "','SATDAY','$dname','$year','$sem','" . $_POST[$str] . "','LEC')");
        } else if ($_POST[$rstr] == 'LAB') {
            $str = "subsat" . $j;
            $bid = "bsubsat" . $j;
            $batch = $_POST[$bid];
            $fresult1 = mysqli_query($link, "insert into timetable (period,time_start,time_end,day,dname,year,sem,subname,type,batch) values('" . $rowf['period'] . "','" . $rowf['time_start'] . "','" . $rowf['time_end'] . "','SATDAY','$dname','$year','$sem','" . $_POST[$str] . "','LAB','".$batch."')");
        }
        

        $j++;
    }
    //$res = mysqli_query($link, "insert into tt_rec (sem,year,dname) values('$sem','$year','$dname')");
    header('Location:timetable.php');
}
