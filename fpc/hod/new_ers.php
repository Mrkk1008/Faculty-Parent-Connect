<?php
session_start();
include("cn.php");
include("common.php");
$dname = $_SESSION['dname'];

        $_SESSION['new_er_sem'] = $_POST['sem'];
        // $_SESSION['new_er_year'] = $_POST['year'];
        $res1 = mysqli_query($link, "select erno from student where dept='$dname' AND sem='".$_SESSION['new_er_sem']."' AND status='ACTIVE' order by erno");

        echo '<option value="">select</option>';
        while ($row1 = mysqli_fetch_array($res1, MYSQLI_BOTH)) {
            echo '<option value="' . $row1['erno'] . '">' . $row1['erno'] . '</option>';
        }
