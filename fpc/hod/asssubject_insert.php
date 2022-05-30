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
$fname = "";
$year = "";

if (isset($_POST['Submit'])) {
    $subname = mysqli_real_escape_string($link, $_POST['subname']);
    $subcode = mysqli_real_escape_string($link, $_POST['subcode']);
    strtoupper($subname);
    strtoupper($subcode);
    $check_duplicate = "select * from asssubject where subname='$subname' AND subcode='$subcode'";
    $result = mysqli_query($link, $check_duplicate);

    $count = mysqli_num_rows($result);
    if ($count > 0) {
        $msg = "error";
        //$msg = "<font style='color:red;'>Duplicate Entry</font>";
        //echo $msg;
    } else {
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

        $result = mysqli_query($link, "Insert into asssubject(subname,subcode,sem,dname,facultyname1,faculty_no1,facultyname2,faculty_no2,year) values(UPPER('$subname'),'$subcode','$sem','$dname','$facultyname1','$facultyno1','$facultyname2','$facultyno2','$year')");
        $msg = "success";
        header('Location:asssubject.php');
    }
}

?>
<?php
$resu = mysqli_query($link, "Select * From subject where sid=" . $_GET['sid']);
$row = mysqli_fetch_array($resu, MYSQLI_BOTH);
$subname = $row['subname'];
$subcode = $row['subcode'];
$sem = $row['sem'];
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

                            <div class="col-lg-6">
                                <br />

                                <div class="card">

                                    <div class="card-body">

                                        <form action="" method="post">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Subject Name:</label> <br>
                                                &nbsp;&nbsp;
                                                <input type="text" name="subname" value="<?php echo $subname; ?>" size="50" readonly>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Subject Code:</label>
                                                <br>
                                                &nbsp;&nbsp;
                                                <input type="text" name="subcode" value="<?php echo $subcode; ?>" readonly>
                                            </div>

                                            <div class="form-group">
                                                <label for="cc-name" class="control-label mb-1">Sem:</label>
                                                <br>
                                                &nbsp;&nbsp;
                                                <input type="text" name="sem" value="<?php echo $sem; ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-name" class="control-label mb-1">Faculty Name 1</label>
                                                <select class="form-control" name="facultyno1">
                                                    <option value="Select">Select</option>
                                                    <?php
                                                    while ($row = mysqli_fetch_array($kev, MYSQLI_BOTH)) {
                                                    ?>
                                                        <option value="<?php echo $row['faculty_no']; ?>"><?php echo $row['fname']; ?>&nbsp;<?php echo $row['lname']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-name" class="control-label mb-1">Faculty Name 2</label>
                                                <select class="form-control" name="facultyno2">
                                                    <option value="Optional">Optional</option>
                                                    <?php
                                                    $kev2 = mysqli_query($link, "Select * from faculty where dname='$dname'");
                                                    $num = mysqli_num_rows($kev2);
                                                    $n = 0;

                                                    while ($row2 = mysqli_fetch_array($kev2, MYSQLI_BOTH)) {
                                                    ?>
                                                        <option value="<?php echo $row2['faculty_no']; ?>"><?php echo $row2['fname']; ?>&nbsp;<?php echo $row2['lname']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="rs-select2--light rs-select2--md">
                                                <label for="cc-name" class="control-label mb-1">Year</label>
                                                <select class="js-select2" name="year" size="">
                                                    <option selected="year">Year</option>
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
        <!-- Vendor JS-->
        <script src="vendor/slick/slick.min.js"></script>
        <script src="vendor/wow/wow.min.js"></script>
        <script src="vendor/animsition/animsition.min.js"></script>
        <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
        <script src="vendor/counter-up/jquery.counterup.min.js"></script>
        <script src="vendor/circle-progress/circle-progress.min.js"></script>
        <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="vendor/chartjs/Chart.bundle.min.js"></script>
        <script src="vendor/select2/select2.min.js"></script>

        <!-- Main JS-->
        <script src="js/main.js"></script>

        <script>
            function popup() {
                var ms = "<?php echo $msg ?>";
                if (ms == "success") {
                    Swal.fire('Good!', 'New Department Added!', 'success')
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