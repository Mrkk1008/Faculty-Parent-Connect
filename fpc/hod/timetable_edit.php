<?php
session_start();
include("cn.php");
include("common.php");
checklogin();

$dname = $_SESSION['dname'];
?>
<?php
if (isset($_GET['sem']) and isset($_GET['year'])) {
    $sem = $_GET['sem'];
    $year = $_GET['year'];
}
?>
<?php
if (isset($_POST['Submit'])) {
    $newyear = $_POST['year'];
    $changeyear = mysqli_query($link, "update tt_rec set year='$newyear' where sem='$sem' AND year='$year'");
    $resultf = mysqli_query($link, "Select * from time");
    $j = 1;
    while ($rowf = mysqli_fetch_array($resultf, MYSQLI_BOTH)) {
        //Monday
        $str = "submon" . $j;
        $rstr = "rsubmon" . $j;
        $bstr = "bsubmon" . $j;
        $fresult1 = mysqli_query($link, "update timetable set subname='" . $_POST[$str] . "', year='$newyear',type='".$_POST[$rstr]."',batch='".$_POST[$bstr]."' where period='" . $rowf['period'] . "' AND day='MONDAY' AND sem='$sem' AND year='$year'");

        //Tuesday
        $str = "subtue" . $j;
        $rstr = "rsubtue" . $j;
        $bstr = "bsubtue" . $j;
        $fresult1 = mysqli_query($link, "update timetable set subname='" . $_POST[$str] . "', year='$newyear',type='".$_POST[$rstr]."',batch='".$_POST[$bstr]."'  where period='" . $rowf['period'] . "' AND day='TUESDAY' AND sem='$sem' AND year='$year'");

        //Wednasday
        $str = "subwed" . $j;
        $rstr = "rsubwed" . $j;
        $bstr = "bsubwed" . $j;
        $fresult1 = mysqli_query($link, "update timetable set subname='" . $_POST[$str] . "', year='$newyear',type='".$_POST[$rstr]."',batch='".$_POST[$bstr]."'  where period='" . $rowf['period'] . "' AND day='WEDNESDAY' AND sem='$sem' AND year='$year'");

        //Thusday
        $str = "subthus" . $j;
        $rstr = "rsubthus" . $j;
        $bstr = "bsubthus" . $j;
        $fresult1 = mysqli_query($link, "update timetable set subname='" . $_POST[$str] . "', year='$newyear',type='".$_POST[$rstr]."',batch='".$_POST[$bstr]."'  where period='" . $rowf['period'] . "' AND day='THUSDAY' AND sem='$sem' AND year='$year'");

        //Friday
        $str = "subfri" . $j;
        $rstr = "rsubfri" . $j;
        $bstr = "bsubfri" . $j;
        $fresult1 = mysqli_query($link, "update timetable set subname='" . $_POST[$str] . "', year='$newyear',type='".$_POST[$rstr]."',batch='".$_POST[$bstr]."'  where period='" . $rowf['period'] . "' AND day='FRIDAY' AND sem='$sem' AND year='$year'");

        //Satday
        $str = "subsat" . $j;
        $rstr = "rsubsat" . $j;
        $bstr = "bsubsat" . $j;
        $fresult1 = mysqli_query($link, "update timetable set subname='" . $_POST[$str] . "', year='$newyear',type='".$_POST[$rstr]."',batch='".$_POST[$bstr]."'  where period='" . $rowf['period'] . "' AND day='SATDAY' AND sem='$sem' AND year='$year'");

        $j++;
    }

    header('Location:timetable.php');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Faculty</title>

    <!-- Fontfaces CSS-->
    <link href="../admin/css/font-face.css" rel="stylesheet" media="all">
    <link href="../admin/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../admin/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../admin/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../admin/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="../admin/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../admin/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../admin/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../admin/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../admin/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../admin/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../admin/css/theme.css" rel="stylesheet" media="all">
    <style>
        .image {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px;
            width: 80px;
        }
    </style>
    <script>
        function showbatch(x, s) {
            var str = s;
            //alert(str);
            if (x == 0) {
                document.getElementById(str).style.display = 'block';
            } else {
                document.getElementById(str).style.display = 'none';
            }
        }
    </script>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <?php include("mobilemenu.php"); ?>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <?php include("menu.php"); ?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php include("header.php"); ?>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                    </div>
                    <div class="row">
                        <div class="col-lg-6">

                        </div>
                        <div class="col-lg-6">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- DATA TABLE -->
                            <center>
                                <h3 class="title-5 m-b-35"><b>Time-table Form</b></h3>
                            </center>

                            <form action="#" method="POST">
                                <div class="rs-select2--light rs-select2--md">
                                    <select class="js-select2" name="year">
                                        <option selected="<?php echo $year; ?>"><?php echo $year; ?></option>
                                        <?php
                                        $res1 = mysqli_query($link, "Select * from year");
                                        while ($rowe = mysqli_fetch_array($res1, MYSQLI_BOTH)) {
                                        ?>
                                            <option value="<?php echo $rowe['year']; ?>"><?php echo $rowe['year']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>

                        </div>
                    </div>

                    <div class="row m-t-30">
                        <div class="col-md-12">
                            <!-- DATA TABLE-->
                            <div class="table-responsive m-b-40">
                                <table class="table table-borderless table-data3">
                                    <thead>
                                        <tr>
                                            <th>Sr</th>
                                            <th>Time</th>
                                            <th>Monday</th>
                                            <th>Tuesday</th>
                                            <th>Wednesday</th>
                                            <th>Thursday</th>
                                            <th>Firday</th>
                                            <th style="text-align: left;">Saturday</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $resultt = mysqli_query($link, "Select * from time");
                                        $i = 0;
                                        while ($rowt = mysqli_fetch_array($resultt, MYSQLI_BOTH)) {
                                            $i = $i + 1;;

                                        ?>
                                            <td><?php echo $rowt['period']; ?></td>
                                            <td><?php echo $rowt['time_start'] . " to " . $rowt['time_end']; ?></td>

                                            <!-- Monday start -->
                                            <td>
                                                <div class="rs-select2--light rs-select2--sm">

                                                    <select class="js-select2" name="submon<?php echo $i; ?>" id="submon<?php echo $i; ?>">
                                                        <?php
                                                        $dayres = mysqli_query($link, "select * from timetable where period='" . $rowt['period'] . "' AND day='MONDAY' AND sem='" . $sem . "' AND year='" . $year . "' ");
                                                        $data = mysqli_fetch_array($dayres, MYSQLI_BOTH);
                                                        ?>
                                                        <option value="<?php echo $data['subname']; ?>"><?php echo $data['subname']; ?></option>
                                                        <?php
                                                        $subres = mysqli_query($link, "select * from subject where sem='$sem'");
                                                        while ($subdata = mysqli_fetch_array($subres, MYSQLI_BOTH)) {
                                                        ?>
                                                            <option value="<?php echo $subdata['shortname']; ?>"><?php echo $subdata['shortname']; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                    <div class="dropDownSelect2"></div>
                                                    <!-- type start -->
                                                    <input type="radio" name="rsubmon<?php echo $i; ?>" onclick="showbatch(1,'bsubmon<?php echo $i; ?>')" value="LEC" <?php
                                                                                                                                                                        if ($data['type'] == 'LEC') {
                                                                                                                                                                            echo "checked";
                                                                                                                                                                        }
                                                                                                                                                                        ?>>LEC&nbsp;
                                                    <input type="radio" name="rsubmon<?php echo $i; ?>" onclick="showbatch(0,'bsubmon<?php echo $i; ?>')" value="LAB" <?php
                                                                                                                                                                        if ($data['type'] == 'LAB') {
                                                                                                                                                                            echo "checked";
                                                                                                                                                                        }
                                                                                                                                                                        ?>>LAB

                                                    <!-- type end -->

                                                    <!-- batch start -->
                                                    <div id="bsubmon<?php echo $i; ?>" <?php
                                                                                        if ($data['type'] == 'LAB') {
                                                                                            echo " style='display:block;'";
                                                                                        } else {
                                                                                            echo " style='display:none;'";
                                                                                        }
                                                                                        ?>>
                                                        <select class="js-select2" name="bsubmon<?php echo $i; ?>">
                                                            <option value="<?php
                                                                            if ($data['type'] == 'LAB') {
                                                                                echo $data['batch'];
                                                                            } else {
                                                                                echo "select";
                                                                            }
                                                                            ?>"><?php
                                                                                if ($data['type'] == 'LAB') {
                                                                                    echo $data['batch'];
                                                                                } else {
                                                                                    echo "select";
                                                                                }
                                                                                ?></option>
                                                            <option value="B1">B1</option>
                                                            <option value="B2">B2</option>
                                                            <option value="B1-B2">B1-B2</option>
                                                        </select>
                                                        <div class="dropDownSelect2"></div>
                                                    </div>
                                                    <!-- batch end  -->
                                                </div>
                                            </td>
                                            <!-- Monday end  -->

                                            <!-- Tuesday Start  -->
                                            <td>
                                                <div class="rs-select2--light rs-select2--sm">
                                                    <select class="js-select2" name="subtue<?php echo $i; ?>" id="subtue<?php echo $i; ?>">
                                                        <?php
                                                        $dayres = mysqli_query($link, "select * from timetable where period='" . $rowt['period'] . "' AND day='TUESDAY' AND sem='" . $sem . "' AND year='" . $year . "' ");
                                                        $data = mysqli_fetch_array($dayres, MYSQLI_BOTH);
                                                        ?>
                                                        <option value="<?php echo $data['subname']; ?>"><?php echo $data['subname']; ?></option>
                                                        <?php
                                                        $subres = mysqli_query($link, "select * from subject where sem='$sem'");
                                                        while ($subdata = mysqli_fetch_array($subres, MYSQLI_BOTH)) {
                                                        ?>
                                                            <option value="<?php echo $subdata['shortname']; ?>"><?php echo $subdata['shortname']; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                    <div class="dropDownSelect2"></div>
                                                    <!-- type start -->
                                                    <input type="radio" name="rsubtue<?php echo $i; ?>" onclick="showbatch(1,'bsubtue<?php echo $i; ?>')" value="LEC" <?php
                                                                                                                                                                        if ($data['type'] == 'LEC') {
                                                                                                                                                                            echo "checked";
                                                                                                                                                                        }
                                                                                                                                                                        ?>>LEC&nbsp;
                                                    <input type="radio" name="rsubtue<?php echo $i; ?>" onclick="showbatch(0,'bsubtue<?php echo $i; ?>')" value="LAB" <?php
                                                                                                                                                                        if ($data['type'] == 'LAB') {
                                                                                                                                                                            echo "checked";
                                                                                                                                                                        }
                                                                                                                                                                        ?>>LAB

                                                    <!-- type end -->

                                                    <!-- batch start -->
                                                    <div id="bsubtue<?php echo $i; ?>" <?php
                                                                                        if ($data['type'] == 'LAB') {
                                                                                            echo " style='display:block;'";
                                                                                        } else {
                                                                                            echo " style='display:none;'";
                                                                                        }
                                                                                        ?>>
                                                        <select class="js-select2" name="bsubtue<?php echo $i; ?>">
                                                            <option value="<?php
                                                                            if ($data['type'] == 'LAB') {
                                                                                echo $data['batch'];
                                                                            } else {
                                                                                echo "select";
                                                                            }
                                                                            ?>"><?php
                                                                                if ($data['type'] == 'LAB') {
                                                                                    echo $data['batch'];
                                                                                } else {
                                                                                    echo "select";
                                                                                }
                                                                                ?></option>
                                                            <option value="B1">B1</option>
                                                            <option value="B2">B2</option>
                                                            <option value="B1-B2">B1-B2</option>
                                                        </select>
                                                        <div class="dropDownSelect2"></div>
                                                    </div>
                                                    <!-- batch end  -->

                                                </div>
                                            </td>
                                            <!-- Tuesday End  -->

                                            <!-- Wednesday start -->
                                            <td>
                                                <div class="rs-select2--light rs-select2--sm">
                                                    <select class="js-select2" name="subwed<?php echo $i; ?>" id="subwed<?php echo $i; ?>">
                                                        <?php
                                                        $dayres = mysqli_query($link, "select * from timetable where period='" . $rowt['period'] . "' AND day='WEDNESDAY' AND sem='" . $sem . "' AND year='" . $year . "' ");
                                                        $data = mysqli_fetch_array($dayres, MYSQLI_BOTH);
                                                        ?>
                                                        <option value="<?php echo $data['subname']; ?>"><?php echo $data['subname']; ?></option>
                                                        <?php
                                                        $subres = mysqli_query($link, "select * from subject where sem='$sem'");
                                                        while ($subdata = mysqli_fetch_array($subres, MYSQLI_BOTH)) {
                                                        ?>
                                                            <option value="<?php echo $subdata['shortname']; ?>"><?php echo $subdata['shortname']; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                    <div class="dropDownSelect2"></div>

                                                    <!-- type start -->
                                                    <input type="radio" name="rsubwed<?php echo $i; ?>" onclick="showbatch(1,'bsubwed<?php echo $i; ?>')" value="LEC" <?php
                                                                                                                                                                        if ($data['type'] == 'LEC') {
                                                                                                                                                                            echo "checked";
                                                                                                                                                                        }
                                                                                                                                                                        ?>>LEC&nbsp;
                                                    <input type="radio" name="rsubwed<?php echo $i; ?>" onclick="showbatch(0,'bsubwed<?php echo $i; ?>')" value="LAB" <?php
                                                                                                                                                                        if ($data['type'] == 'LAB') {
                                                                                                                                                                            echo "checked";
                                                                                                                                                                        }
                                                                                                                                                                        ?>>LAB

                                                    <!-- type end -->

                                                    <!-- batch start -->
                                                    <div id="bsubwed<?php echo $i; ?>" <?php
                                                                                        if ($data['type'] == 'LAB') {
                                                                                            echo " style='display:block;'";
                                                                                        } else {
                                                                                            echo " style='display:none;'";
                                                                                        }
                                                                                        ?>>
                                                        <select class="js-select2" name="bsubwed<?php echo $i; ?>">
                                                            <option value="<?php
                                                                            if ($data['type'] == 'LAB') {
                                                                                echo $data['batch'];
                                                                            } else {
                                                                                echo "select";
                                                                            }
                                                                            ?>"><?php
                                                                                if ($data['type'] == 'LAB') {
                                                                                    echo $data['batch'];
                                                                                } else {
                                                                                    echo "select";
                                                                                }
                                                                                ?></option>
                                                            <option value="B1">B1</option>
                                                            <option value="B2">B2</option>
                                                            <option value="B1-B2">B1-B2</option>
                                                        </select>
                                                        <div class="dropDownSelect2"></div>
                                                    </div>
                                                    <!-- batch end  -->
                                                </div>
                                            </td>
                                            <!-- Wednesday end  -->

                                            <!-- Thursday start  -->
                                            <td>
                                                <div class="rs-select2--light rs-select2--sm">
                                                    <select class="js-select2" name="subthus<?php echo $i; ?>" id="subthus<?php echo $i; ?>">
                                                        <?php
                                                        $dayres = mysqli_query($link, "select * from timetable where period='" . $rowt['period'] . "' AND day='THUSDAY' AND sem='" . $sem . "' AND year='" . $year . "' ");
                                                        $data = mysqli_fetch_array($dayres, MYSQLI_BOTH);
                                                        ?>
                                                        <option value="<?php echo $data['subname']; ?>"><?php echo $data['subname']; ?></option>
                                                        <?php
                                                        $subres = mysqli_query($link, "select * from subject where sem='$sem'");
                                                        while ($subdata = mysqli_fetch_array($subres, MYSQLI_BOTH)) {
                                                        ?>
                                                            <option value="<?php echo $subdata['shortname']; ?>"><?php echo $subdata['shortname']; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                    <div class="dropDownSelect2"></div>

                                                    <!-- type start -->
                                                    <input type="radio" name="rsubthus<?php echo $i; ?>" onclick="showbatch(1,'bsubthus<?php echo $i; ?>')" value="LEC" <?php
                                                                                                                                                                        if ($data['type'] == 'LEC') {
                                                                                                                                                                            echo "checked";
                                                                                                                                                                        }
                                                                                                                                                                        ?>>LEC&nbsp;
                                                    <input type="radio" name="rsubthus<?php echo $i; ?>" onclick="showbatch(0,'bsubthus<?php echo $i; ?>')" value="LAB" <?php
                                                                                                                                                                        if ($data['type'] == 'LAB') {
                                                                                                                                                                            echo "checked";
                                                                                                                                                                        }
                                                                                                                                                                        ?>>LAB

                                                    <!-- type end -->

                                                    <!-- batch start -->
                                                    <div id="bsubthus<?php echo $i; ?>" <?php
                                                                                        if ($data['type'] == 'LAB') {
                                                                                            echo " style='display:block;'";
                                                                                        } else {
                                                                                            echo " style='display:none;'";
                                                                                        }
                                                                                        ?>>
                                                        <select class="js-select2" name="bsubthus<?php echo $i; ?>">
                                                            <option value="<?php
                                                                            if ($data['type'] == 'LAB') {
                                                                                echo $data['batch'];
                                                                            } else {
                                                                                echo "select";
                                                                            }
                                                                            ?>"><?php
                                                                                if ($data['type'] == 'LAB') {
                                                                                    echo $data['batch'];
                                                                                } else {
                                                                                    echo "select";
                                                                                }
                                                                                ?></option>
                                                            <option value="B1">B1</option>
                                                            <option value="B2">B2</option>
                                                            <option value="B1-B2">B1-B2</option>
                                                        </select>
                                                        <div class="dropDownSelect2"></div>
                                                    </div>
                                                    <!-- batch end  -->

                                                </div>
                                            </td>
                                            <!-- Thursday end -->

                                            <!-- Friday start  -->
                                            <td>
                                                <div class="rs-select2--light rs-select2--sm">
                                                    <select class="js-select2" name="subfri<?php echo $i; ?>" id="subfri<?php echo $i; ?>">
                                                        <?php
                                                        $dayres = mysqli_query($link, "select * from timetable where period='" . $rowt['period'] . "' AND day='FRIDAY' AND sem='" . $sem . "' AND year='" . $year . "' ");
                                                        $data = mysqli_fetch_array($dayres, MYSQLI_BOTH);
                                                        ?>
                                                        <option value="<?php echo $data['subname']; ?>"><?php echo $data['subname']; ?></option>
                                                        <?php
                                                        $subres = mysqli_query($link, "select * from subject where sem='$sem'");
                                                        while ($subdata = mysqli_fetch_array($subres, MYSQLI_BOTH)) {
                                                        ?>
                                                            <option value="<?php echo $subdata['shortname']; ?>"><?php echo $subdata['shortname']; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                    <div class="dropDownSelect2"></div>

                                                    <!-- type start -->
                                                    <input type="radio" name="rsubfri<?php echo $i; ?>" onclick="showbatch(1,'bsubfri<?php echo $i; ?>')" value="LEC" <?php
                                                                                                                                                                        if ($data['type'] == 'LEC') {
                                                                                                                                                                            echo "checked";
                                                                                                                                                                        }
                                                                                                                                                                        ?>>LEC&nbsp;
                                                    <input type="radio" name="rsubfri<?php echo $i; ?>" onclick="showbatch(0,'bsubfri<?php echo $i; ?>')" value="LAB" <?php
                                                                                                                                                                        if ($data['type'] == 'LAB') {
                                                                                                                                                                            echo "checked";
                                                                                                                                                                        }
                                                                                                                                                                        ?>>LAB

                                                    <!-- type end -->

                                                    <!-- batch start -->
                                                    <div id="bsubfri<?php echo $i; ?>" <?php
                                                                                        if ($data['type'] == 'LAB') {
                                                                                            echo " style='display:block;'";
                                                                                        } else {
                                                                                            echo " style='display:none;'";
                                                                                        }
                                                                                        ?>>
                                                        <select class="js-select2" name="bsubfri<?php echo $i; ?>">
                                                            <option value="<?php
                                                                            if ($data['type'] == 'LAB') {
                                                                                echo $data['batch'];
                                                                            } else {
                                                                                echo "select";
                                                                            }
                                                                            ?>"><?php
                                                                                if ($data['type'] == 'LAB') {
                                                                                    echo $data['batch'];
                                                                                } else {
                                                                                    echo "select";
                                                                                }
                                                                                ?></option>
                                                            <option value="B1">B1</option>
                                                            <option value="B2">B2</option>
                                                            <option value="B1-B2">B1-B2</option>
                                                        </select>
                                                        <div class="dropDownSelect2"></div>
                                                    </div>
                                                    <!-- batch end  -->

                                                </div>
                                            </td>
                                            <!-- Friday end  -->


                                            <!-- Satur start  -->
                                            <td style="text-align: left;">
                                                <div class="rs-select2--light rs-select2--sm">
                                                    <select class="js-select2" name="subsat<?php echo $i; ?>" id="subsat<?php echo $i; ?>">
                                                        <?php
                                                        $dayres = mysqli_query($link, "select * from timetable where period='" . $rowt['period'] . "' AND day='SATDAY' AND sem='" . $sem . "' AND year='" . $year . "' ");
                                                        $data = mysqli_fetch_array($dayres, MYSQLI_BOTH);
                                                        ?>
                                                        <option value="<?php echo $data['subname']; ?>"><?php echo $data['subname']; ?></option>
                                                        <?php
                                                        $subres = mysqli_query($link, "select * from subject where sem='$sem'");
                                                        while ($subdata = mysqli_fetch_array($subres, MYSQLI_BOTH)) {
                                                        ?>
                                                            <option value="<?php echo $subdata['shortname']; ?>"><?php echo $subdata['shortname']; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                    <div class="dropDownSelect2"></div>

                                                    <!-- type start -->
                                                    <input type="radio" name="rsubsat<?php echo $i; ?>" onclick="showbatch(1,'bsubsat<?php echo $i; ?>')" value="LEC" <?php
                                                                                                                                                                        if ($data['type'] == 'LEC') {
                                                                                                                                                                            echo "checked";
                                                                                                                                                                        }
                                                                                                                                                                        ?>>LEC&nbsp;
                                                    <input type="radio" name="rsubsat<?php echo $i; ?>" onclick="showbatch(0,'bsubsat<?php echo $i; ?>')" value="LAB" <?php
                                                                                                                                                                        if ($data['type'] == 'LAB') {
                                                                                                                                                                            echo "checked";
                                                                                                                                                                        }
                                                                                                                                                                        ?>>LAB

                                                    <!-- type end -->

                                                    <!-- batch start -->
                                                    <div id="bsubsat<?php echo $i; ?>" <?php
                                                                                        if ($data['type'] == 'LAB') {
                                                                                            echo " style='display:block;'";
                                                                                        } else {
                                                                                            echo " style='display:none;'";
                                                                                        }
                                                                                        ?>>
                                                        <select class="js-select2" name="bsubsat<?php echo $i; ?>">
                                                            <option value="<?php
                                                                            if ($data['type'] == 'LAB') {
                                                                                echo $data['batch'];
                                                                            } else {
                                                                                echo "select";
                                                                            }
                                                                            ?>"><?php
                                                                                if ($data['type'] == 'LAB') {
                                                                                    echo $data['batch'];
                                                                                } else {
                                                                                    echo "select";
                                                                                }
                                                                                ?></option>
                                                            <option value="B1">B1</option>
                                                            <option value="B2">B2</option>
                                                            <option value="B1-B2">B1-B2</option>
                                                        </select>
                                                        <div class="dropDownSelect2"></div>
                                                    </div>
                                                    <!-- batch end  -->

                                                </div>
                                            </td>
                                            </tr>

                                        <?php

                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <center>
                                <div class="card-footer">
                                    <button id="btnclick" class="btn btn-primary btn-sm" name="Submit">
                                        <i class="fa fa-dot-circle-o"></i> Submit
                                    </button>
                                    <button type="reset" class="btn btn-danger btn-sm">
                                        <i class="fa fa-ban"></i> Reset
                                    </button>
                                </div>
                            </center>
                            </form>
                            <!-- END DATA TABLE-->
                        </div>
                    </div>
                    <!-- END DATA TABLE -->
                </div>
            </div>

            <!-- Start Footer area-->
            <?php include("footer.php"); ?>
            <!-- End Footer area-->
        </div>
    </div>
    </div>
    </div>

    </div>

    <!-- Jquery JS-->
    <script src="../admin/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="../admin/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="../admin/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="../admin/vendor/slick/slick.min.js">
    </script>
    <script src="../admin/vendor/wow/wow.min.js"></script>
    <script src="../admin/vendor/animsition/animsition.min.js"></script>
    <script src="../admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="../admin/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="../admin/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="../admin/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="../admin/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../admin/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="../admin/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="../admin/js/main.js"></script>

</body>

</html>
<!-- end document-->