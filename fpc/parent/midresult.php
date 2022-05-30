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
    <title>Midresult</title>

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

<body>
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
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <center>
                                    <h3 class="title-5 m-b-35"><b>Mid Marks</b></h3>
                                </center>
                                <?php
                                $resmidrec = mysqli_query($link, "select * from midresult where dname='$dname' GROUP BY sem,year ORDER BY mid DESC");
                                while ($rowmidrec = mysqli_fetch_array(@$resmidrec, MYSQLI_BOTH)) {
                                ?>
                                <div class="table-responsive table-responsive-data2">
                                    <div class="col-md-12">
                                        <div style="margin-left:10px; float:left; " class="col-md-9">
                                            <strong>
                                                <?php echo "Sem: ". $rowmidrec['sem'] . "&nbsp&nbsp&nbsp&nbsp&nbspYear: " . $rowmidrec['year']; ?>
                                                </p>
                                            </strong>
                                        </div>
                                    </div>
                                    <table class="table table-data2" style="margin-left:10px;">
                                        <thead>
                                            <tr>
                                                <th>Subject</th>
                                                <th>Marks</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $resmm = mysqli_query($link, "select * from midresult where erno='".$erno."' AND sem='" . $rowmidrec['sem'] . "' AND year='" . $rowmidrec['year'] . "' AND dname='$dname' ");
                                            while ($row = @mysqli_fetch_array(@$resmm, MYSQLI_BOTH)) {
                                            ?>
                                            <tr class="tr-shadow" enctype="multipart/form-data">
                                                <td><?php echo $row['subname']; ?></td>

                                                <td><?php echo $row['marks']; ?></td>

                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <?php
                                    }
                                    ?>
                                    <!-- END DATA TABLE -->
                                </div>
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