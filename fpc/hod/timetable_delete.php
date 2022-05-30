<?php
        session_start();
        include("cn.php");
        include("common.php");
        $dname = $_SESSION['dname'];

        $sem = $_GET['sem'];
        $year = $_GET['year'];

        $res1 = mysqli_query($link,"delete from tt_rec where sem='$sem' AND year='$year'");

        $res2 = mysqli_query($link,"delete from timetable where sem='$sem' AND year='$year'");

        header('Location:timetable.php');

?>