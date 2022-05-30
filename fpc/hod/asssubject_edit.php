<?php
session_start();
include("cn.php");
include("common.php");
checklogin();

$dname = $_SESSION['dname'];
?>
<?php
$kev = mysqli_query($link, "Select * from faculty where dname='$dname'");
$num = mysqli_num_rows($kev);
$n = 0;
?>

<?php

$msg = "";
$subname = "";
$subcode = "";
$sem = "";
$facultyname = "";
$year = "";

if (isset($_POST['Submit'])) {
    $subname = $_POST['subname'];
    $subcode = $_POST['subcode'];
    $sem = $_POST['sem'];
    $facultyno1 = $_POST['facultyno1'];
    $facultyno2 = $_POST['facultyno2'];
    $year = $_POST['year'];

    $facultyname1 = mysqli_query($link, "select fname,lname from faculty where faculty_no=$facultyno1");
    $rowfnamelname = mysqli_fetch_assoc($facultyname1);
    $facultyname1 = $rowfnamelname['fname'] . " " . $rowfnamelname['lname'];
    if ($facultyno2 == 'Optional') {
        $facultyname2 = 'Optional';
    } else {
        $resfacultyname2 = mysqli_query($link, "select fname,lname from faculty where faculty_no=$facultyno2");
        $rowfnamelname = mysqli_fetch_array($resfacultyname2, MYSQLI_BOTH);
        $facultyname2 = $rowfnamelname['fname'] . " " . $rowfnamelname['lname'];
    }

    $result = mysqli_query($link, "Update asssubject set subname=UPPER('$subname'), subcode='$subcode', sem='$sem', facultyname1='$facultyname1' , facultyname2='$facultyname2', faculty_no1='$facultyno1' , faculty_no2='$facultyno2', year='$year' where asid=" . $_GET['asid']);

    header("Location: asssubject.php");
}

?>
<?php
if (isset($_GET['asid'])) {
    $result2 = mysqli_query($link, "Select * From sem");
    $resulte = mysqli_query($link, "Select * From asssubject where asid=" . $_GET['asid']);
    $rowe = mysqli_fetch_array($resulte, MYSQLI_BOTH);
    $subname = $rowe['subname'];
    $subcode = $rowe['subcode'];
    $sem = $rowe['sem'];
    $facultyname1 = $rowe['facultyname1'];
    $facultyname2 = $rowe['facultyname2'];
    $facultyno1 = $rowe['faculty_no1'];
    $facultyno2 = $rowe['faculty_no2'];
    $year = $rowe['year'];
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
    <title>Forms</title>

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
                                            <font style="font-size:30px;">Subject</font>
                                        </center>
                                    </strong>
                                </div>
                            </div>


                            <!--Form 1 Applying for the Post-->

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="" method="post">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Subject Name</label>
                                                <br>&nbsp;&nbsp;
                                                <input type="text" name="subname" placeholder="Enter Subject name" value="<?php echo $subname; ?>" readonly>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Subject Code</label>
                                                <br>&nbsp;&nbsp;
                                                <input type="text" name="subcode" placeholder="Enter Subject Code" value="<?php echo $subcode; ?>" readonly>
                                            </div>

                                            <div class="form-group">
                                                <label for="cc-name" class="control-label mb-1">Sem</label>
                                                <br>&nbsp;&nbsp;
                                                <input type="text" name="sem" placeholder="Enter sem Code" value="<?php echo $sem; ?>" readonly>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Faculty 1</label>
                                                <select class="form-control" name="facultyno1">
                                                    <option value="<?php echo $facultyname1; ?>"><?php echo $facultyname1  ?></option>
                                                    <?php
                                                    while ($row = mysqli_fetch_array($kev, MYSQLI_BOTH)) {
                                                        $n++;
                                                    ?>
                                                        <option value="<?php echo $row['faculty_no']; ?>"><?php echo $row['fname']; ?>&nbsp;<?php echo $row['lname']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Faculty 2</label>
                                                <select class="form-control" name="facultyno2">
                                                    <option value="<?php echo $facultyname2; ?>"><?php echo $facultyname2  ?></option>
                                                    <option value="Optional">Optional</option>
                                                    <?php
                                                    $kev2 = mysqli_query($link, "Select * from faculty where dname='$dname'");
                                                    while ($row = mysqli_fetch_array($kev2, MYSQLI_BOTH)) {
                                                        $n++;
                                                    ?>
                                                        <option value="<?php echo $row['faculty_no']; ?>"><?php echo $row['fname']; ?>&nbsp;<?php echo $row['lname']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="rs-select2--light rs-select2--md">
                                                <label for="cc-name" class="control-label mb-1">Year</label>
                                                <select class="js-select2" name="year" size="">
                                                    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                                    <?php
                                                    $resyear = mysqli_query($link, "Select * from year");
                                                    while ($rowyear = mysqli_fetch_array($resyear, MYSQLI_BOTH)) {
                                                    ?>
                                                        <option value="<?php echo $rowyear['year']; ?>"><?php echo $rowyear['year']; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <div class="dropDownSelect2"></div>
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

        <script>
            function popup() {
                var ms = "<?php echo $msg ?>";
                if (ms == "success") {
                    Swal.fire('Good!', 'New Faculty Added!', 'success')
                } else if (ms == "error") {
                    Swal.fire('Oops!', 'Duplicate entry found!', 'error')
                }
            }
        </script>

        <script>
            popup()
        </script>

</body>

</html>
<!-- end document-->