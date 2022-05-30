<?php
session_start();
include("cn.php");
include("common.php");
checklogin();
$dname = $_SESSION['dname'];
$reshod = mysqli_query($link, "select fname,lname from faculty where dname='$dname' AND pname='H.O.D.'");
$rowhod = mysqli_fetch_assoc($reshod);
$hodname = $rowhod['fname'] . " " . $rowhod['lname'];
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
    <title>Global Notice Board</title>

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
        .greendot {
            height: 22px;
            width: 22px;
            background-color: #51ff0d;
            border-radius: 50%;
            /* border: 2px solid #333; */
            display: inline-block;
        }

        .greydot {
            height: 22px;
            width: 22px;
            background-color: grey;
            /* border: 2px solid #333; */
            border-radius: 50%;
            display: inline-block;
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
                                    <center><b>Global Notice Board</b></center>
                                </h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <form action="global_single.php" method="post">
                                            <div class="rs-select2--light rs-select2--md">
                                                <input type="date" name="date" class="form-control">
                                            </div>

                                            <button class="au-btn-filter" name="filter">
                                                <i class="zmdi zmdi-filter-list"></i> Fetch
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>Publisher</th>
                                                <th>Title</th>
                                                <th>Date</th>
                                                <th>For Departments</th>
                                                <th>For Semesters</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $result = mysqli_query($link, "Select * from global where (publisher='admin' OR publisher='$hodname') AND (dname like '%$dname%' OR dname='ALL') AND status='ACTIVE' order by gid desc");
                                            while ($row = @mysqli_fetch_array(@$result, MYSQLI_BOTH)) {

                                            ?>
                                                <tr class="tr-shadow">
                                                    <td><?php echo $row['publisher']; ?></td>
                                                    <td><?php echo $row['title']; ?></td>
                                                    <td style="width: 140px;"><?php echo $row['date']; ?></td>
                                                    <td><?php echo $row['dname']; ?></td>
                                                    <td><?php echo $row['sem']; ?></td>
                                                    <td>
                                                        <div class="table-data-feature" style="margin-right:100px;">
                                                            <button class="item" data-toggle="tooltip" data-placement="top" title="View" data-original-title="More" aria-describedby="tooltip181541">
                                                                <a href="global_display.php?gid=<?php echo $row['gid'] ?>"><i class="zmdi zmdi-more"></i></a>
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

    <script src="./js/jquery.min.js"></script>
    <script type="text/javascript">
        function change(aid, ast) {
            var id = aid;
            var st = ast;

            $.ajax({
                type: 'POST',
                url: 'global_change_status.php',
                data: 'id=' + id + '&st=' + st,

                success: function(html) {
                    $('#g' + id).html(html);
                }
            });
        }
    </script>

</body>

</html>
<!-- end document-->