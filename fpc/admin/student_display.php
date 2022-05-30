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
    $photo = $rowe['photo'];
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
    <title>Student Detail View</title>

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
                                            <font style="font-size:30px;">Student Detail View</font>
                                        </center>
                                    </strong>
                                </div>
                            </div>

                            <!--Form 1 Applying for the Post-->

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Entry Year</label>
                                                <input type="number" name="year" placeholder="Enter year" class="form-control" value="<?php echo $rowe['year']; ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Current Year</label>
                                                <input type="number" name="year" placeholder="Enter year" class="form-control" value="<?php echo $rowe['current_year']; ?>" readonly>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Department Name</label>
                                                <input type="text" name="dept" placeholder="Enter Department" class="form-control" value="<?php echo $rowe['dept']; ?>" readonly> </div>
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
                                            <input type="number" name="erno" placeholder="Enter Enrollment Number" class="form-control" autocomplete="off" value="<?php echo $rowe['erno']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Semester</label>
                                            <input type="number" name="sem" placeholder="Enter Semester" class="form-control" value="<?php echo $rowe['sem']; ?>" readonly>
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
                                        <div class="form-group">
                                            <label class="control-label mb-1">Student Photo</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <img class="image" src="../student_photos/<?php echo $rowe['photo']; ?>">
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">First Name</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="fname" placeholder="Enter First Name" class="form-control" value="<?php echo $rowe['fname']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">Last Name</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="lname" placeholder="Enter Last Name" class="form-control" value="<?php echo $rowe['lname']; ?>" readonly>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">Gender</label>
                                            </div>
                                            <div class="col col-md-9">
                                                <input type="email" name="semail" placeholder="Enter E-mail" class="form-control" autocomplete="off" value="<?php echo $rowe['gender']; ?>" readonly>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">Date Of Birth</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="date" name="dob" placeholder="Enter Date Of Birth" class="form-control" value="<?php echo $rowe['dob']; ?>" readonly>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="email-input" class=" form-control-label">Email-id</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="email" name="semail" placeholder="Enter E-mail" class="form-control" autocomplete="off" value="<?php echo $rowe['semail']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="email-input" class=" form-control-label">Qualification</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="quali" placeholder="Enter Qualification" class="form-control" autocomplete="off" value="<?php echo $rowe['quali']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="email-input" class=" form-control-label">State</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="state" placeholder="Enter State" class="form-control" autocomplete="off" value="<?php echo $rowe['state']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="email-input" class=" form-control-label">City</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="city" placeholder="Enter City" class="form-control" autocomplete="off" value="<?php echo $rowe['city']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="email-input" class=" form-control-label">Pincode</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="number" name="pincode" placeholder="Enter Pincode" class="form-control" autocomplete="off" value="<?php echo $rowe['pincode']; ?>" readonly>
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
                                                <input type="number" name="smobile" placeholder="Enter Mobile Number" class="form-control" value="<?php echo $rowe['smobile']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">Phone No.</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="number" name="sphone" placeholder="Enter Phone Number" class="form-control" value="<?php echo $rowe['sphone']; ?>" readonly>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="email-input" class=" form-control-label">Aadhaar Card</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="number" name="aadhaar" placeholder="Enter Aadhaar card" class="form-control" value="<?php echo $rowe['aadhaar']; ?>" readonly> </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="email-input" class=" form-control-label">Address</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <textarea name="address" rows="3.5" class="form-control" readonly><?php echo $rowe['address']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="email-input" class=" form-control-label">Status</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="email" name="semail" placeholder="Enter E-mail" class="form-control" autocomplete="off" value="<?php echo $rowe['status']; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--End of Form 4 Personal Detail-->

                        </div>
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