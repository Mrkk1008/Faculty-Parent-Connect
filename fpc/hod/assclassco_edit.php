<?php
session_start();
include("cn.php");
include("common.php");
checklogin();

if (isset($_GET['fid'])) {
    $resulte = mysqli_query($link, "Select * From faculty where fid=" . $_GET['fid']);
    $rowe = mysqli_fetch_array($resulte, MYSQLI_BOTH);
    $pname = $rowe['pname'];
    $dname = $rowe['dname'];
    $email = $rowe['email'];
    $password = $rowe['password'];
    $fname = $rowe['fname'];
    $lname = $rowe['lname'];
    $status = $rowe['status'];
    $dob = $rowe['dob'];
    $cast = $rowe['cast'];
    $ma_status = $rowe['ma_status'];
    $country = $rowe['country'];
    $mobile = $rowe['mobile'];
    $pno = $rowe['pno'];
    $aadhar = $rowe['aadhar'];
    $address = $rowe['address'];
    $faculty_no = $rowe['faculty_no'];
}


?>
<?php

$msg = "";
$pname = "";
$fname = "";
$lname = "";
$sem = "";
$year = "";


if (isset($_POST['Submit'])) {
    $fname = mysqli_real_escape_string($link, $_POST['fname']);
    $lname = mysqli_real_escape_string($link, $_POST['lname']);
    strtoupper($fname);
    strtoupper($lname);
    $pname = $_POST['pname'];
    $fname = $_POST['fname'];
    $sem = $_POST['sem'];
    $year = $_POST['year'];
    //$lname=$_POST['lname'];
    $dept = $_SESSION['dname'];

    $result = mysqli_query($link, "insert into assignclass(facultyname,faculty_no,sem,year,dname) values('$fname','$faculty_no','$sem','$year','$dept')");

    //$resulte = mysqli_query($link,"Update faculty set pname='$pname',email='$email',password='$password',fname=UPPER('$fname'),lname=UPPER('$lname'),status='$status',dob='$dob',cast='$cast',ma_status='$ma_status',country='$country',mobile='$mobile',pno='$pno',aadhar='$aadhar',address='$address' where fid=".$_GET['fid']);

    header("Location: assclassco.php");
}

?>
<?php
$res1 = mysqli_query($link, "Select post_name from post");
$num = mysqli_num_rows($res1);
$n = 0;
?>
<?php
$res = mysqli_query($link, "Select dname from department");
$num = mysqli_num_rows($res);
$n = 0;
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
    <title>Class co-ordinator Edit</title>

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
                                            <font style="font-size:30px;">Assign Class Co-ordinator</font>
                                        </center>
                                    </strong>
                                </div>
                            </div>

                            <!--  <div class="col-lg-12">
                            	<div class="card-header">
                                        <center> <?php echo "<font style='font-size:20px;'>$msg</font>" ?></center>
                                        <?php echo $msg; ?>
                                </div>
                            </div> -->

                            <!--Form 1 Applying for the Post-->

                            <div class="col-lg-6"><br>
                                <div class="card">

                                    <div class="card-body">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Post Name</label> <br>
                                                <input type="text" value="Class Co-ordinator" readonly />
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Faculty Name</label>
                                                <div class="col-12 col-md-12">
                                                    <br>
                                                    <input type="text" name="fname" value="<?php echo $rowe['fname'] . " " . $rowe['lname']; ?>" readonly />
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>

                            <!--End of Form 1 Applying for the Post-->

                            <!--Form 2 For Login Info-->

                            <div class="col-lg-6"><br>
                                <div class="card">

                                    <div class="card-body card-block">
                                        <div class="rs-select2--light rs-select2--md">
                                            <label for="cc-name" class="control-label mb-1">Year</label>
                                            <select class="js-select2" name="year" size="">
                                                <option value="year">Year</option>
                                                <?php
                                                $resyear = mysqli_query($link, "Select * from year");
                                                while ($rowyear = mysqli_fetch_array($resyear, MYSQLI_BOTH)) {
                                                ?>
                                                    <option value="<?php echo $rowyear['year']; ?>"><?php echo $rowyear['year']; ?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        
                                        <br><br>

                                        <div class="rs-select2--light rs-select2--md">
                                            <label for="cc-name" class="control-label mb-1">Sem</label>
                                            <select class="js-select2" name="sem" size="">
                                                <option value="sem">Sem</option>
                                                <?php
                                                $ressem = mysqli_query($link, "Select * from sem");
                                                while ($rowsem = mysqli_fetch_array($ressem, MYSQLI_BOTH)) {
                                                ?>
                                                    <option value="<?php echo $rowsem['sem']; ?>"><?php echo $rowsem['sem']; ?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>

                                    </div>

                                </div>
                            </div>

                            <!--End of Form 2 For Login Info-->

                            <!--Form 3 Personal Detail-->



                            <!--End of Form 3 Personal Detail-->

                            <!--Form 4 Personal Detail-->



                            <!--End of Form 4 Personal Detail-->

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