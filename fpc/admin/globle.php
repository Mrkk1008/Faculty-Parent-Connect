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
?>
<?php
$sem = "";
$result = mysqli_query($link, "Select * from global order by gid desc");
$num = mysqli_num_rows($result);
$n = 0;
?>
<?php
$date = "";
if (isset($_POST['filter'])) {
    $date = $_POST['date'];
    if ($date == 'YY-MM-DD') {
        $result = mysqli_query($link, "Select * from global");
    } else {
        $result = mysqli_query($link, "Select * from global where date='$date'");
    }
    $num = mysqli_num_rows($result);
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
                                        <form action="globle_fetch.php" method="post">
                                            <div class="rs-select2--light rs-select2--md">
                                                <input type="date" name="date" class="form-control">
                                            </div>

                                            <button class="au-btn-filter" name="filter">
                                                <i class="zmdi zmdi-filter-list"></i> Fetch
                                            </button>
                                        </form>
                                    </div>
                                    <div class="table-data__tool-right">
                                        <a href="globle_insert.php">
                                            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                                <i class="zmdi zmdi-plus"></i>Add Notice</button></a>
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
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row = @mysqli_fetch_array(@$result, MYSQLI_BOTH)) {
                                                $n++;
                                            ?>
                                                <tr class="tr-shadow">
                                                    <td><?php echo $row['publisher']; ?></td>
                                                    <td><?php echo $row['title']; ?></td>
                                                    <td style="width: 140px;"><?php echo $row['date']; ?></td>
                                                    <td><?php echo $row['dname']; ?></td>
                                                    <td><?php echo $row['sem']; ?></td>
                                                    
                                                    <td id="g<?php echo $row['gid']; ?>">
                                                        <?php
                                                        if ($row['status'] == 'ACTIVE') {
                                                        ?>
                                                            <button id="<?php echo $row['gid']; ?>" onclick="change('<?php echo $row['gid']; ?>','ACTIVE')"><?php echo "<i class='greendot'></i>"; ?></button>
                                                        <?php
                                                        } else if ($row['status'] == 'INACTIVE') {
                                                        ?>
                                                            <button id="<?php echo $row['gid']; ?>" onclick="change('<?php echo $row['gid']; ?>','INACTIVE')"><?php echo "<i class='greydot'></i>"; ?></button>
                                                        <?php
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <div class="table-data-feature">
                                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                <a href="globle_edit.php?gid=<?php echo $row['gid'] ?>"><i class="zmdi zmdi-edit"></i></a>
                                                            </button>
                                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                <a href="globle_delete.php?gid=<?php echo $row['gid'] ?>"><i class="zmdi zmdi-delete"></i></a>
                                                            </button>
                                                            <button class="item" data-toggle="tooltip" data-placement="top" title="View" data-original-title="More" aria-describedby="tooltip181541">
                                                                <a href="globle_display.php?gid=<?php echo $row['gid'] ?>"><i class="zmdi zmdi-more"></i></a>
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