<?php
session_start();
include("cn.php");
include("common.php");
checklogin();

if (isset($_GET['sid'])) {
    $resulte = mysqli_query($link, "Select * From student where sid=" . $_GET['sid']);
    $rowe = mysqli_fetch_array($resulte, MYSQLI_BOTH);
    $year = $rowe['year'];
    $dept = $rowe['dept'];
    $erno = $rowe['erno'];
    $sem = $rowe['sem'];
    $fname = $rowe['fname'];
    $lname = $rowe['lname'];
    $gender = $rowe['gender'];
    $status = $rowe['status'];
    $dob = $rowe['dob'];
    $quali = $rowe['quali'];
    $semail = $rowe['semail'];
    $state = $rowe['state'];
    $city = $rowe['city'];
    $pincode = $rowe['pincode'];
    $smobile = $rowe['smobile'];
    $sphone = $rowe['sphone'];
    $aadhaar = $rowe['aadhaar'];
    $address = $rowe['address'];
}
?>
<?php

$msg = "";
$year = "";
$erno = "";
$sem = "";
$fname = "";
$lname = "";
$gender = "";
$status = "";
$dob = "";
$quali = "";
$semail = "";
$state = "";
$city = "";
$pincode = "";
$smobile = "";
$sphone = "";
$aadhaar = "";
$address = "";

if (isset($_POST['Submit'])) {
    $fname = mysqli_real_escape_string($link, $_POST['fname']);
    $lname = mysqli_real_escape_string($link, $_POST['lname']);
    strtoupper($fname);
    strtoupper($lname);
    $year = $_POST['year'];
    $erno = $_POST['erno'];
    $sem = $_POST['sem'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $status = $_POST['status'];
    $dob = $_POST['dob'];
    $quali = $_POST['quali'];
    $semail = $_POST['semail'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $pincode = $_POST['pincode'];
    $smobile = $_POST['smobile'];
    $sphone = $_POST['sphone'];
    $aadhaar = $_POST['aadhaar'];
    $address = $_POST['address'];

    $result = mysqli_query($link, "Update student set year='$year',erno='$erno',sem='$sem',semail='$semail',fname=UPPER('$fname'),lname=UPPER('$lname'),gender='$gender',status='$status',dob='$dob',quali='$quali',state='$state',city='$city',pincode='$pincode',smobile='$smobile',sphone='$sphone',aadhaar='$aadhaar',address='$address' where sid=" . $_GET['sid']);

    header("Location: student.php");
}

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
    <link rel="stylesheet" href="../admin/css/sweetalert2.min.css">

    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Forms</title>

    <!-- Fontfaces CSS-->
    <link href="../admin/css/font-face.css" rel="stylesheet" media="all">
    <link href="../admin/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../admin/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../admin/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../admin/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="../admin/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../admin/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../admin/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../admin/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../admin/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../admin/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../admin/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <!-- popup js -->
    <script src="../admin/js/sweetalert2.all.min.js"></script>

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
                                            <font style="font-size:30px;">Student Form</font>
                                        </center>
                                    </strong> </div>
                            </div>

                            <!--Form 1 Applying for the Post-->

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Year</label>
                                                <input type="number" name="year" placeholder="Enter year" class="form-control" value="<?php echo $rowe['year']; ?>" required>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Department Name</label>
                                                <br>
                                                <input type="text" value="<?php echo $row['dname']; ?>" />
                                            </div>
                                    </div>
                                </div>
                            </div>

                            <!--End of Form 1 Applying for the Post-->

                            <!--Form 2 For Login Info-->

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body card-block">
                                        <div class="form-group">
                                            <label class="control-label mb-1">Enrollment Number</label>
                                            <input type="number" name="erno" placeholder="Enter Enrollment Number" class="form-control" autocomplete="off" value="<?php echo $rowe['erno']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Semester</label>
                                            <input type="number" name="sem" placeholder="Enter Semester" class="form-control" value="<?php echo $rowe['sem']; ?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--End of Form 2 For Login Info-->

                            <!--Form 3 Personal Detail-->

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Personal Details</strong> </div>
                                    <div class="card-body card-block">
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">First Name</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="fname" placeholder="Enter First Name" class="form-control" value="<?php echo $rowe['fname']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">Last Name</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="lname" placeholder="Enter Last Name" class="form-control" value="<?php echo $rowe['lname']; ?>" required>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">Gender</label>
                                            </div>
                                            <div class="col col-md-9">
                                                <select name="gender" class="form-control" required>
                                                    <option value="<?php echo $rowe['gender']; ?>"><?php echo $rowe['gender']; ?></option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">Date Of Birth</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="date" name="dob" placeholder="Enter Date Of Birth" class="form-control" value="<?php echo $rowe['dob']; ?>" required>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="email-input" class=" form-control-label">Email-id</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="email" name="semail" placeholder="Enter E-mail" class="form-control" autocomplete="off" value="<?php echo $rowe['semail']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="email-input" class=" form-control-label">Qualification</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="quali" placeholder="Enter Qualification" class="form-control" autocomplete="off" value="<?php echo $rowe['quali']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="email-input" class=" form-control-label">State</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="state" placeholder="Enter State" class="form-control" autocomplete="off" value="<?php echo $rowe['state']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="email-input" class=" form-control-label">City</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="city" placeholder="Enter City" class="form-control" autocomplete="off" value="<?php echo $rowe['city']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="email-input" class=" form-control-label">Pincode</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="number" name="pincode" placeholder="Enter Pincode" class="form-control" autocomplete="off" value="<?php echo $rowe['pincode']; ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--End of Form 3 Personal Detail-->

                            <!--Form 4 Personal Detail-->

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Contact & Address Deatils</strong> </div>
                                    <div class="card-body card-block">
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">Mobile No.</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="number" name="smobile" placeholder="Enter Mobile Number" class="form-control" value="<?php echo $rowe['smobile']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">Phone No.</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="number" name="sphone" placeholder="Enter Phone Number" class="form-control" value="<?php echo $rowe['sphone']; ?>" required>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="email-input" class=" form-control-label">Aadhaar Card</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="number" name="aadhaar" placeholder="Enter Aadhaar card" class="form-control" value="<?php echo $rowe['aadhaar']; ?>" required> </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="email-input" class=" form-control-label">Address</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <textarea name="address" rows="3.5" class="form-control" required><?php echo $rowe['address']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="email-input" class=" form-control-label">Status</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <select name="status" class="form-control" required>
                                                    <option value="<?php echo $rowe['status']; ?>"><?php echo $rowe['status']; ?></option>
                                                    <option value="ACTIVE">ACTIVE</option>
                                                    <option value="INACTIVE">INACTIVE</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--End of Form 4 Personal Detail-->

                        </div>
                        <center>
                            <div class="card-footer">
                                <button id="btnclick" class="btn btn-primary btn-sm" name="Submit">
                                    <i class="fa fa-dot-circle-o"></i> Submit</button>
                                <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Reset</button>
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
        <script src="../admin/vendor/jquery-3.2.1.min.js"></script>
        <!-- Bootstrap JS-->
        <script src="../admin/vendor/bootstrap-4.1/popper.min.js"></script>
        <script src="../admin/vendor/bootstrap-4.1/bootstrap.min.js"></script>
        <!-- Vendor JS-->
        <script src="../admin/vendor/slick/slick.min.js"></script>
        <script src="../admin/vendor/wow/wow.min.js"></script>
        <script src="../admin/vendor/animsition/animsition.min.js"></script>
        <script src="../admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <script src="../admin/vendor/counter-up/jquery.waypoints.min.js"></script>
        <script src="../admin/vendor/counter-up/jquery.counterup.min.js"></script>
        <script src="../admin/vendor/circle-progress/circle-progress.min.js"></script>
        <script src="../admin/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="../admin/vendor/chartjs/Chart.bundle.min.js"></script>
        <script src="../admin/vendor/select2/select2.min.js"></script>

        <!-- Main JS-->
        <script src="../admin/js/main.js"></script>

        <script>
            function popup() {
                var ms = "";
                if (ms == "success") {
                    Swal.fire('Good!', 'New Student Added!', 'success')
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