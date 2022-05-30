<?php
session_start();
include("cn.php");
include("common.php");
checklogin();
$dname = $_SESSION['dname'];


$restotal = mysqli_query($link, "select count(subname) as 'total' from attedence where sem=6 AND year=2019 AND subcode='3360705' AND erno='176860307012'");
$rowtotal = mysqli_fetch_array($restotal, MYSQLI_BOTH);

$resattended = mysqli_query($link, "select count(subname) as 'attended' from attedence where sem=6 AND year=2019 AND subcode='3360705' AND erno='176860307012' AND ap='PRESENT'");
$rowattended = mysqli_fetch_array($resattended, MYSQLI_BOTH);

// select count(subname) as 'total' from attedence where sem=6 AND year=2019 AND subcode='3360705' AND date between ('2020-02-27' AND '2020-02-27') AND dname='COMPUTER ENGINEERING' AND erno='176860307012';select count(subname) as 'total' from attedence where sem=6 AND year=2019 AND subcode='3360705' AND date between ('2020-02-27' AND '2020-02-27') AND dname='COMPUTER ENGINEERING' AND erno='176860307012';

$at = (int)$rowattended['attended'];
$tt = (int)$rowtotal['total'];

echo gettype($at);

echo gettype($tt);
 
// $perc = ( $rowattended['attended'] * 100) / $restotal['total'];


// echo $perc;









?>
