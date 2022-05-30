<?php
session_start();
include("cn.php");
include("common.php");
checklogin();
$dname = $_SESSION['dname'];
$session_faculty = $_SESSION['fname'] . " " . $_SESSION['lname'];


if (isset($_GET['gid'])) {
    $resulte = mysqli_query($link, "Select * From global where gid=" . $_GET['gid']);
    $rowe = mysqli_fetch_array($resulte, MYSQLI_BOTH);
    $title = $rowe['title'];
    $desc = $rowe['desci'];
    $date = $rowe['date'];
    $status = $rowe['status'];

    if ($rowe['sem'] == 'ALL') {
        $sem_arr = 'ALL';
    } else {
        $sem_arr = explode(",", $rowe['sem']);
    }
}
?>
<?php

if (isset($_POST['Submit'])) {
    $title = $_POST['title'];
    $desci = $_POST['desci'];
    $date = $_POST['date'];
    $status = $_POST['status'];
    
    if (isset($_POST['sall'])) {
        $sem = "ALL";
    } else if (isset($_POST['arr_sem'])) {
        $sem = implode(",", $_POST['arr_sem']);
    }

    $result = mysqli_query($link, "update global set title='$title',desci='$desci',date='$date',status='$status',sem='$sem' where gid=" . $_GET['gid']);
    $msg = "success";
    header("Location: globle.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <link rel="stylesheet" href="css/sweetalert2.min.css">

    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Global Notice Forms</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
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
    <!-- popup js -->
    <script src="js/sweetalert2.all.min.js"></script>

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

                            <div class="col-lg-12">
                                <div class="card-header">
                                    <strong>
                                        <center>
                                            <font style="font-size:30px;">Global Notice board </font>
                                        </center>
                                    </strong>
                                </div>
                            </div>


                            <!--Form global notice board-->
                            <!--<form action="" method="post">-->
                            <div class="col-lg-12">

                                <div class="card">

                                    <div class="card-header">
                                        <strong></strong>
                                    </div>
                                    <form action="" method="POST">
                                        <div class="card-body card-block">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Publisher</label>
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <input type="text" name="publisher" value="<?php echo $session_faculty; ?>" class="form-control" required readonly>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Title</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="title" value="<?php echo $rowe['title']; ?>" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Description</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="desci" rows="6.5" class="form-control" value="<?php echo $rowe['desci']; ?>" required><?php echo $rowe['desci']; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Date</label>
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <input type="date" name="date" value="<?php echo $rowe['date']; ?>" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Status</label>
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <select name="status" class="form-control" required>
                                                        <option value="<?php echo $rowe['status']; ?>"><?php echo $rowe['status']; ?></option>
                                                        <option value="ACTIVE">ACTIVE</option>
                                                        <option value="INACTIVE">INACTIVE</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">For Department</label>
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <input type="text" name="dname" value="<?php echo $dname; ?>" class="form-control" required readonly>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">For Semesters</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <?php
                                                    if ($sem_arr == 'ALL') {
                                                    ?>
                                                        <input type="checkbox" id="scheckall" name="sall" value="ALL" checked> ALL <br>
                                                        <?php
                                                        $res = mysqli_query($link, "SELECT * FROM sem");
                                                        while ($row = mysqli_fetch_assoc($res)) {
                                                        ?>
                                                            <input type="checkbox" class="sitem" name='arr_sem[]' value="<?php echo $row['sem']; ?>" checked> <?php echo $row['sem']; ?> <br>
                                                        <?php
                                                        }
                                                    } else {
                                                        ?>

                                                        <input type="checkbox" id="scheckall" name="sall" value="ALL"> ALL <br>
                                                        <?php
                                                        $res = mysqli_query($link, "SELECT * FROM sem");
                                                        while ($row = mysqli_fetch_assoc($res)) {
                                                            $s_checked = "";
                                                            if (in_array($row['sem'], $sem_arr)) {
                                                                $s_checked = "checked";
                                                            }
                                                        ?>
                                                            <input type="checkbox" class="sitem" name='arr_sem[]' value="<?php echo $row['sem']; ?>" <?php echo " " . $s_checked; ?>> <?php echo $row['sem']; ?> <br>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>

                                        </div>
                                </div>

                            </div>
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
                        <!-- Start Footer area-->
                        <?php include("footer.php"); ?>
                        <!-- End Footer area-->
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
        <script>
            $('#scheckall').change(function() {
                $(".sitem").prop("checked", $(this).prop("checked"))
            })
            $('.sitem').change(function() {
                if ($(this).prop("checked") == false) {
                    $('#scheckall').prop("checked", false)
                }
                if ($('.sitem:checked').length == $('.sitem').length) {
                    $('#scheckall').prop("checked", true)
                }
            })



            $('#dcheckall').change(function() {
                $(".ditem").prop("checked", $(this).prop("checked"))
            })
            $('.ditem').change(function() {
                if ($(this).prop("checked") == false) {
                    $('#dcheckall').prop("checked", false)
                }
                if ($('.ditem:checked').length == $('.ditem').length) {
                    $('#dcheckall').prop("checked", true)
                }
            })
        </script>
</body>

</html>
<!-- end document-->