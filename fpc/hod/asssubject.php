<?php
session_start();
include("cn.php");
include("common.php");
checklogin();
?>
<?php
$res = mysqli_query($link, "Select * from sem");
$num = mysqli_num_rows($res);
$n = 0;

$dname = $_SESSION['dname'];
$result2 = mysqli_query($link, "Select * from asssubject where dname='$dname' order by asid desc");
$num = mysqli_num_rows($result2);
$n = 0;
?>
<?php
$sem = "";
if (isset($_POST['filter'])) {
    $sem = $_POST['sem'];
    if ($sem == 'Sem') {
        $result2 = mysqli_query($link, "Select * from subject");
    } else {
        $result2 = mysqli_query($link, "Select * from subject where sem='$sem'");
    }
    $num = mysqli_num_rows($result2);
    $n = 0;
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
    <title>Assigned Subject</title>

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
                        <div class="row">
                            <div class="col-lg-6">
                            </div>
                            <div class="col-lg-6">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">
                                    <center><b>Assigned Subject Table</b></center>
                                </h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <form action="#" method="post">
                                            <div class="rs-select2--light rs-select2--md">
                                                <select class="js-select2" name="sem" size="">
                                                    <option selected="selected">Sem</option>
                                                    <?php while ($rowe = mysqli_fetch_array($res, MYSQLI_BOTH)) {
                                                        $n++;
                                                    ?>
                                                        <option value="<?php echo $rowe['sem']; ?>"><?php echo $rowe['sem']; ?></option>
                                                    <?php } ?>

                                                </select>
                                                <div class="dropDownSelect2"></div>
                                            </div>

                                            <button class="au-btn-filter" name="filter">
                                                <i class="zmdi zmdi-filter-list"></i>filters</button>
                                        </form>
                                    </div>

                                </div>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th style="font-size:18px;">Faculty Name</th>
                                                <th style="font-size:18px;">Subject Name</th>
                                                <th style="font-size:18px;">Subject Code</th>
                                                <th style="font-size:18px;">Sem</th>
                                                <th style="font-size:18px;">Year</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row = mysqli_fetch_array($result2, MYSQLI_BOTH)) {
                                                $n++;
                                            ?>
                                                <tr class="tr-shadow">

                                                    <td style="font-size:18px;">> <?php echo $row['facultyname1']; ?> <br>
                                                        <?php

                                                        if ($row['facultyname2'] == 'Optional') {
                                                            echo "-";
                                                        } else {
                                                            echo "> ".$row['facultyname2'];
                                                        }
                                                        ?></td>

                                                    <td style="font-size:18px;"><?php echo $row['subname']; ?></td>

                                                    <td style="font-size:18px;"><?php echo $row['subcode']; ?></td>

                                                    <td style="font-size:18px;"><?php echo $row['sem']; ?></td>

                                                    <td style="font-size:18px;"><?php echo $row['year']; ?></td>

                                                    <td>
                                                        <div class="table-data-feature">
                                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                <a href="asssubject_edit.php?asid=<?php echo $row['asid'] ?>"><i class="zmdi zmdi-edit"></i></a>
                                                            </button>
                                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                <a href="asssubject_delete.php?asid=<?php echo $row['asid'] ?>"><i class="zmdi zmdi-delete"></i></a>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="spacer"></tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
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

</body>

</html>
<!-- end document-->