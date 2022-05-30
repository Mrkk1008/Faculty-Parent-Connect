<?php
session_start();
include("cn.php");
include("common.php");
checklogin();

$dname = $_SESSION['dname'];
$s_sem = $_SESSION['sem'];
$s_year = $_SESSION['year'];
$s_c_year = $_SESSION['c_year'];
?>
<?php
function printtable($s, $y)
{
    $fsem = $s;
    $fyear = $y;
    global $link;
?>
    <!-- DATA TABLE-->
    <div class="table-responsive m-b-40">
        <div  border-radius: 3px; height:50px; ">
<center>
            <div style="float:left; line-height:50px;" >
            
                <p style="color:black; font-size:20px;">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp SEM: <?php echo  $fsem; ?> &nbsp&nbsp&nbsp YEAR: <?php echo  $fyear; ?> </p>
            </div></center>
        </div><center>
        <table class="table table-borderless table-data3">
            <thead>
                <tr>
                    <th>Period</th>
                    <th style="padding: 17px 50px;">Time</th>
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Firday</th>
                    <th>Saturday</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $res = mysqli_query($link, "select * from time");
                while ($row = mysqli_fetch_array($res, MYSQLI_BOTH)) {
                ?>
                    <tr>
                        <td><?php echo $row['period']; ?></td>
                        <td><?php echo $row['time_start'] . " to " . $row['time_end']; ?></td>

                        <!--MONDAY START-->
                        <?php
                        $dayres = mysqli_query($link, "select * from timetable where period='" . $row['period'] . "' AND day='MONDAY' AND sem='" . $fsem . "' AND year='" . $fyear . "' ");
                        $data = mysqli_fetch_array($dayres, MYSQLI_BOTH);
                        if ($data['type'] == 'LAB' and $data['subname'] != "") {
                        ?>

                            <td style="background-color:grey; color:#000; vertical-align : middle; ">
                                <?php
                                echo $data['subname'] . " " . $data['type'] . "<br>" . $data['batch'];
                                ?>
                            </td>
                        <?php
                        } else if ($data['subname'] != "") {
                        ?>
                            <td>
                                <?php
                                echo $data['subname'] . " " . $data['type'];
                                ?>
                            </td>

                        <?php
                        } else {
                            echo "<td> </td>";
                        }
                        ?>
                        <!--MONDAY STOP-->

                        <!--TUESDAY START-->
                        <?php
                        $dayres = mysqli_query($link, "select * from timetable where period='" . $row['period'] . "' AND day='TUESDAY' AND sem='" . $fsem . "' AND year='" . $fyear . "' ");
                        $data = mysqli_fetch_array($dayres, MYSQLI_BOTH);
                        if ($data['type'] == 'LAB' and $data['subname'] != "") {
                        ?>

                            <td style="background-color:grey; color:black; vertical-align : middle; ">
                                <?php
                                echo $data['subname'] . " " . $data['type'] . "<br>" . $data['batch'];
                                ?>
                            </td>
                        <?php
                        } else if ($data['subname'] != "") {
                        ?>
                            <td>
                                <?php
                                echo $data['subname'] . " " . $data['type'];
                                ?>
                            </td>

                        <?php
                        } else {
                            echo "<td> </td>";
                        }
                        ?>
                        <!--TUESDAY STOP-->


                        <!--WEDNESDAY START-->
                        <?php
                        $dayres = mysqli_query($link, "select * from timetable where period='" . $row['period'] . "' AND day='WEDNESDAY' AND sem='" . $fsem . "' AND year='" . $fyear . "' ");
                        $data = mysqli_fetch_array($dayres, MYSQLI_BOTH);
                        if ($data['type'] == 'LAB' and $data['subname'] != "") {
                        ?>

                            <td style="background-color:grey; color:black; vertical-align : middle; ">
                                <?php
                                echo $data['subname'] . " " . $data['type'] . "<br>" . $data['batch'];
                                ?>
                            </td>
                        <?php
                        } else if ($data['subname'] != "") {
                        ?>
                            <td>
                                <?php
                                echo $data['subname'] . " " . $data['type'];
                                ?>
                            </td>

                        <?php
                        } else {
                            echo "<td> </td>";
                        }
                        ?>
                        <!--WEDNESDAY STOP-->


                        <!--THURSDAY START-->
                        <?php
                        $dayres = mysqli_query($link, "select * from timetable where period='" . $row['period'] . "' AND day='THUSDAY' AND sem='" . $fsem . "' AND year='" . $fyear . "' ");
                        $data = mysqli_fetch_array($dayres, MYSQLI_BOTH);
                        if ($data['type'] == 'LAB' and $data['subname'] != "") {
                        ?>

                            <td style="background-color:grey; color:black; vertical-align : middle; ">
                                <?php
                                echo $data['subname'] . " " . $data['type'] . "<br>" . $data['batch'];
                                ?>
                            </td>
                        <?php
                        } else if ($data['subname'] != "") {
                        ?>
                            <td>
                                <?php
                                echo $data['subname'] . " " . $data['type'];
                                ?>
                            </td>

                        <?php
                        } else {
                            echo "<td> </td>";
                        }
                        ?>
                        <!--THURSDAY STOP-->


                        <!--FRIDAY START-->
                        <?php
                        $dayres = mysqli_query($link, "select * from timetable where period='" . $row['period'] . "' AND day='FRIDAY' AND sem='" . $fsem . "' AND year='" . $fyear . "' ");
                        $data = mysqli_fetch_array($dayres, MYSQLI_BOTH);
                        if ($data['type'] == 'LAB' and $data['subname'] != "") {
                        ?>

                            <td style="background-color:grey; color:black; vertical-align : middle; ">
                                <?php
                                echo $data['subname'] . " " . $data['type'] . "<br>" . $data['batch'];
                                ?>
                            </td>
                        <?php
                        } else if ($data['subname'] != "") {
                        ?>
                            <td>
                                <?php
                                echo $data['subname'] . " " . $data['type'];
                                ?>
                            </td>

                        <?php
                        } else {
                            echo "<td> </td>";
                        }
                        ?>
                        <!--FRIDAY STOP-->

                        
                        <!--SATDAY START-->
                        <?php
                        $dayres = mysqli_query($link, "select * from timetable where period='" . $row['period'] . "' AND day='SATDAY' AND sem='" . $fsem . "' AND year='" . $fyear . "' ");
                        $data = mysqli_fetch_array($dayres, MYSQLI_BOTH);
                        if ($data['type'] == 'LAB' and $data['subname'] != "") {
                        ?>

                            <td style="background-color:grey; color:black; vertical-align : middle;">
                                <?php
                                echo $data['subname'] . " " . $data['type'] . "<br>" . $data['batch'];
                                ?>
                            </td>
                        <?php
                        } else if ($data['subname'] != "") {
                        ?>
                            <td>
                                <?php
                                echo $data['subname'] . " " . $data['type'];
                                ?>
                            </td>

                        <?php
                        } else {
                            echo "<td> </td>";
                        }
                        ?>
                        <!--SATDAY STOP-->
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        </center>
    </div>
    <!-- END DATA TABLE-->
<?php
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
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
 <style>
        .image {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px;
            width: 80px;
        }
    </style>
</head>

<body >

    <div class="page-wrapper"><!-- HEADER MOBILE-->
         <!-- HEADER DESKTOP-->
          	<?php include("mobilemenu.php");?>
            <!-- END HEADER DESKTOP-->


        <!-- PAGE CONTAINER-->
     
        <div class="page-container">
            <!-- HEADER DESKTOP-->
          	<?php include("header.php");?>
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- DATA TABLE -->
                            <center>
                                <h3 class="title-5 m-b-35"><b>Time-tables</b></h3>
                            </center>
                            <div class="table-data__tool">
                                <div class="table-data__tool-left">
                                    

                            <div class="row m-t-30">
                                <div class="col-md-12">
                                    <?php
                                    // if (isset($_POST['filter'])) {
                                    //     echo "<input type=hidden name=filteron>";
                                    //     $s = $_POST['sem'];
                                    //     $y = $_POST['year'];
                                    //     $fetch = mysqli_query($link, "select * from timetable where sem='$s' AND year='$y' AND dname='$dname' group by sem,year");

                                    //     if ($s != 'Sem' and $y == 'Year') {
                                    //         while ($row = mysqli_fetch_array($fetch, MYSQLI_BOTH)) {
                                    //             printtable($row['sem'], $row['year']);
                                    //         }
                                    //     }
                                    // }
                                    ?>
                                    <?php

                                    // if (isset($_POST['filteron'])) {
                                    // } else {
                                    //     $ttres = mysqli_query($link, "select * from timetable where dname='$dname' AND sem=$sem AND year=$year group by sem,year order by ttid desc");
                                    //     while ($ttrow = mysqli_fetch_array($ttres, MYSQLI_BOTH)) {

                                    //         printtable($ttrow['sem'], $ttrow['year']);
                                    //     }
                                    // }

                                    printtable($s_sem,$s_c_year);


                                    ?>
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