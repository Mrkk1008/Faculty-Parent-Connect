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

/*$dname = $_SESSION['dname'];
$result2 = mysqli_query($link, "Select * from subject where dname='$dname'");
$num = mysqli_num_rows($result2);
$n = 0;*/
?>
<?php
$dept = $_SESSION['dname'];
$results_per_page = 5;
$result = mysqli_query($link, "SELECT * FROM subject where dname='$dept'");
$number_of_results = mysqli_num_rows($result);

$number_of_pages = ceil($number_of_results / $results_per_page);

if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}

$this_page_first_result = ($page - 1) * $results_per_page;
$resu = mysqli_query($link, "Select * from subject where dname='$dept' LIMIT " . $this_page_first_result . ',' .  $results_per_page);
$num = mysqli_num_rows($resu);
$n = 0;
?>
<?php
$sem = "";
if (isset($_POST['filter'])) {
    $sem = $_POST['sem'];
    if ($sem == 'Sem') {
        $result2 = mysqli_query($link, "Select * from subject where dname='$dept'");
    } else {
        $result2 = mysqli_query($link, "Select * from subject where sem='$sem' AND dname='$dept'");
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
    <title>Subjects</title>

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

        .page_numbers {
            display: inline-block;
        }

        .page_numbers a {
            float: left;
            padding: 8px;
            text-decoration: none;
            background-color: white;
        }

        .page_numbers a:hover {
            background-color: #4272d7;
            color: #fff;
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
                                    <center><b>Subject table</b></center>
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
                                    <div class="table-data__tool-right">
                                        <a href="subject_insert.php">
                                            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                                <i class="zmdi zmdi-plus"></i>Add Subject</button>
                                        </a>
                                    </div>
                                </div>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th style="font-size:18px;">Subject Name</th>
                                                <th style="font-size:18px;">Subject Short Name</th>
                                                <th style="font-size:18px;">Subject Code</th>
                                                <th style="font-size:18px;">Sem</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row = mysqli_fetch_array($resu, MYSQLI_BOTH)) {
                                                $n++;
                                            ?>
                                                <tr class="tr-shadow">

                                                    <td style="font-size:18px;"><?php echo $row['subname']; ?></td>

                                                    <td style="font-size:18px;"><?php echo $row['shortname']; ?></td>

                                                    <td style="font-size:18px;"><?php echo $row['subcode']; ?></td>

                                                    <td style="font-size:18px;"><?php echo $row['sem']; ?></td>

                                                    <td>
                                                        <div class="table-data-feature">
                                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                <a href="subject_edit.php?sid=<?php echo $row['sid'] ?>"><i class="zmdi zmdi-edit"></i></a>
                                                            </button>
                                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                <a href="subject_delete.php?sid=<?php echo $row['sid'] ?>"><i class="zmdi zmdi-delete"></i></a>
                                                            </button>
                                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Assign Faculty">
                                                                <a href="asssubject_insert.php?sid=<?php echo $row['sid']; ?>"><i class="fas  fa-plus"></i></a>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="spacer"></tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    
                                    <br />
                                <center>
                                    <table>
                                        <center>
                                            <tr>
                                                <td>
                                                    <div class="page_numbers" <?php if (isset($_POST['filter'])) {
                                                            echo " style='display: none;'";
                                                        } ?>>
                                                        <?php
                                                        for ($pagex = 1; $pagex <= $number_of_pages; $pagex++) {

                                                            if ($page == $pagex) {
                                                                echo '<a style="background-color: #4272d7; color:#fff;" href="subject.php?page=' . $pagex . '">' . '  ' . $pagex . '  ' . '</a> ';
                                                            } else {
                                                                echo '<a href="subject.php?page=' . $pagex . '">' . '  ' . $pagex . '  ' . '</a> ';
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        </center>
                                    </table>
                                </center>
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