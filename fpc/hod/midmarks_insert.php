<?php
session_start();
include("cn.php");
include("common.php");
checklogin();
$dname = $_SESSION['dname'];
?>

<?php

$sem = $_POST['sem'];
$year = $_POST['year'];

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
    <link href="css/fpc-datestyle.css" rel="stylesheet" media="all">
    <style>
        .image {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px;
            width: 80px;
        }
    </style>

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
                            <div class="row m-t-30">
                                <div class="col-md-7">
                                    <!-- DATA TABLE-->
                                    <?php
                                    $ressub = mysqli_query($link, "select * from asssubject where faculty_no1='" . $_SESSION['faculty_no'] . "' AND sem='$sem' AND year='$year'");
                                    $subnum = mysqli_num_rows($ressub);
                                    if ($subnum < 1) {
                                    ?>
                                        <center>
                                            <div style="border:2px solid black; padding: 0px 20px; border-radius:15px;">
                                                <strong>* Sorry, You are not assigned as a Primary faculty for any subject! *</strong>

                                            </div>
                                        </center>
                                    <?php
                                    }
                                    while ($rowsub = mysqli_fetch_array($ressub, MYSQLI_BOTH)) {
                                    ?>
                                        <div class="table-responsive m-b-0">
                                            <div style="background-color:#333333;  border-radius: 3px; height:50px; ">

                                                <div style="float:left; line-height:50px;">
                                                    <p style="color:white; font-size:15px;">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<b>Subject:</b>&nbsp<?php echo $rowsub['subname'] . " (" . $rowsub['subcode'] . ")"; ?> &nbsp&nbsp&nbsp </p>
                                                </div>

                                                <div class="table-data-feature" style="float:right; position:relative; top:30%; ">
                                                    <form action="midmarks_insert_logic.php" method="post">

                                                        <input type="hidden" name="subname" value="<?php echo $rowsub['subname']; ?>">
                                                        <input type="hidden" name="subcode" value="<?php echo $rowsub['subcode']; ?>">
                                                        <input type="hidden" name="semm" value="<?php echo $sem; ?>">
                                                        <input type="hidden" name="yearr" value="<?php echo $year; ?>">
                                                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                                </div>
                                            </div>
                                            <table class="table table-borderless table-data3">
                                                <thead>
                                                    <tr>
                                                        <!-- <th><input class="datedropper-init" type="date" data-dd-large="true" data-dd-large-default="true" placeholder="mm/dd/yyyy" id="date-style" name="doe" style="padding-left:10px; background:#ffffff; color: #333333; border: 1px solid #000000; border-radius:50px; "><br><br>Name</th> -->
                                                        <th><input type="date" name="doe" style=" background:#ffffff; color: #333333; border:2px solid #000000; border-radius:18px; padding: 0px 10px; width:200px;"><br><br>Name</th>
                                                        <th>Enrollment No.</th>
                                                        <th>Marks (out of 30)</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $c = 1;
                                                    $resstu = mysqli_query($link, "select * from student where sem=$sem AND dept='$dname' AND status='ACTIVE' ORDER BY erno");
                                                    while ($rowstu = mysqli_fetch_assoc($resstu)) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $rowstu['fname'] . " " . $rowstu['lname']; ?></td>
                                                            <td><?php echo $rowstu['erno']; ?></td>
                                                            <td><input type="text" placeholder="Enter here" class="form-control" name="student<?php echo $c; ?>"></td>
                                                        </tr>
                                                    <?php
                                                        $c++;
                                                    }
                                                    ?>

                                                </tbody>
                                            </table>
                                            <center>
                                                <div class="card-footer">
                                                    <button id="btnclick" class="btn btn-primary btn-sm" name="submit">
                                                        <i class="fa fa-dot-circle-o"></i> Submit</button>
                                                    <button type="reset" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-ban"></i> Reset</button>
                                                    </form>
                                                </div>
                                            </center>
                                        </div>
                                    <?php
                                    }
                                    ?>
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
    <!-- <script src="js/jquery.min.js"></script> -->
    <script src="js/datedropper.pro.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

</body>

</html>
<!-- end document-->