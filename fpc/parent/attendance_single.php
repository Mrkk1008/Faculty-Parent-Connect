<?php
session_start();
include("cn.php");
include("common.php");
checklogin();
$dname = $_SESSION['dname'];
$erno = $_SESSION['erno'];
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
    <title>Attendance</title>

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
    <script>
    function displaytopic(aid) {
        var id = aid;
        document.getElementById('t' + id).style.display = 'block';
    }
    </script>

</head>

<body>
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <?php include("mobilemenu.php"); ?>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <?php //include("menu.php");
        ?>
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
                        <div class="row">
                            <div class="col-md-12">
                            <i style="margin-left:20px;" class="fa fa-chevron-left">
                            <a style="margin-left:10px;" href="attendance_view.php">Back</a></i>
                            <br><br>
                            <?php
                            if(isset($_POST['att_filter'])){
                                $att_date = $_POST['att_date'];
                            ?>
                            <strong>Date: <?php echo $att_date;?></strong>
                            <div class="table-responsive m-b-40">
                                <table class="table table-borderless table-data3">
                                    <thead>
                                        <tr>
                                            <th>Subject</th>
                                            <th style="float:right; line-height:50px;">A or P</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $c = 0;
                                        $resstu = mysqli_query($link, "select * from attedence where dname='" . $dname . "' AND date='$att_date' AND erno='" . $erno . "' ");
                                        while ($rowstu = mysqli_fetch_array($resstu, MYSQLI_BOTH)) {
                                        $c++;
                                        ?>
                                        <tr>
                                            <td><?php echo $rowstu['subname'] ." ".$rowstu['type'] . "(" . $rowstu['time_start'] . "-" . $rowstu['time_end'] . ")<br>By: " . $rowstu['facultyname']; ?>
                                                <br>
                                                <div>
                                                    <?php
                                                    $restopic = mysqli_query($link, "select * from tdic where dname='" . $dname . "' AND sem='" . $rowstu['sem'] . "' AND year='" . $rowstu['year'] . "' AND date='" . $rowstu['date'] . "' AND time_start='" . $rowstu['time_start'] . "' AND time_end='" . $rowstu['time_end'] . "' AND faculty_no='" . $rowstu['faculty_no'] . "' AND subname='" . $rowstu['subname'] . "'");
                                                    $rowtopic = mysqli_fetch_assoc($restopic);
                                                    ?>
                                                    <button onclick="displaytopic('<?php echo $rowtopic['toid']; ?>')"
                                                        style="color: #1182fd;">Topics <i class="fa fa-angle-double-down"></i> </button>
                                                    <p style="display: none;" id="t<?php echo $rowtopic['toid']; ?>">
                                                        <?php echo $rowtopic['topic']; ?></p>
                                                </div>
                                            </td>
                                            <?php
                                            if ($rowstu['ap'] == 'ABSENT') {
                                                echo "<td style='color:red;'>ABSENT</td>";
                                            } else {
                                                echo "<td style='color:green;'>PRESENT</td>";
                                            }
                                            ?>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                            <?php
                                
                            }
                            ?>

                                <!-- Start Footer area-->
                                <?php include("footer.php"); ?>
                                <!-- End Footer area-->
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Jquery JS-->
            <script src="vendor/jquery-3.2.1.min.js"></script>
            <!-- Bootstrap JS-->
            <script src="vendor/bootstrap-4.1/popper.min.js"></script>
            <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
            <!-- Vendor JS       -->
            <script src="vendor/slick/slick.min.js">
            </script>
            <script src="vendor/wow/wow.min.js"></script>
            <script src="vendor/animsition/animsition.min.js"></script>
            <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
            </script>
            <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
            <script src="vendor/counter-up/jquery.counterup.min.js">
            </script>
            <script src="vendor/circle-progress/circle-progress.min.js"></script>
            <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
            <script src="vendor/chartjs/Chart.bundle.min.js"></script>
            <script src="vendor/select2/select2.min.js">
            </script>

            <!-- Main JS-->
            <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->