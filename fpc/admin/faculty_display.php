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
    $photo = $rowe['photo'];
}
?>
<?php
$res1 = mysqli_query($link, "Select post_name from post");
$num = mysqli_num_rows($res1);
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
    <title>Faculty Details View</title>

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
                                            <font style="font-size:30px;">Faculty Details View</font>
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

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Post Details</strong>
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Post Name</label>
                                                <div class="col-12 col-md-12">
                                                    <input type="text" name="lname" placeholder="Enter Last Name" class="form-control" value="<?php echo $rowe['pname']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Department Name</label>
                                                <div class="col-12 col-md-12">
                                                    <input type="text" name="lname" placeholder="Enter Last Name" class="form-control" value="<?php echo $rowe['dname']; ?>" readonly>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>

                            <!--End of Form 1 Applying for the Post-->

                            <!--Form 2 For Login Info-->

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>For Login info</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <div class="form-group">
                                            <label class="control-label mb-1">E-mail Id</label>
                                            <input type="email" name="email" placeholder="Enter E-mail" class="form-control" autocomplete="off" value="<?php echo $rowe['email']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Password</label>
                                            <input type="password" name="password" placeholder="Enter Password" class="form-control" value="<?php echo $rowe['password']; ?>" readonly>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!--End of Form 2 For Login Info-->

                            <!--Form 3 Personal Detail-->

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Personal Details</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <div class="form-group">
                                            <label class="control-label mb-1">Faculty Photo</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <img class="image" src="../faculty_photos/<?php echo $rowe['photo']; ?>">
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
                                                <label for="text-input" class=" form-control-label">Faculty Id No.</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="lname" placeholder="Enter Last Name" class="form-control" value="<?php echo $rowe['faculty_no']; ?>" readonly>
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
                                                <label for="email-input" class=" form-control-label">Category</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="lname" placeholder="Enter Last Name" class="form-control" value="<?php echo $rowe['cast']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="email-input" class=" form-control-label">Marital Status</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="lname" placeholder="Enter Last Name" class="form-control" value="<?php echo $rowe['ma_status']; ?>" readonly>

                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="email-input" class=" form-control-label">Country</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="lname" placeholder="Enter Last Name" class="form-control" value="<?php echo $rowe['country']; ?>" readonly>

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
                                        <strong>Contact & Address Deatils</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">Mobile No.</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="number" name="mobile" placeholder="Enter Mobile Number" class="form-control" value="<?php echo $rowe['mobile']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">Phone No.</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="number" name="pno" placeholder="Enter Phone Number" class="form-control" value="<?php echo $rowe['pno']; ?>" readonly>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="email-input" class=" form-control-label">Aadhaar Card</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="number" name="aadhar" placeholder="Enter Aadhaar card" class="form-control" value="<?php echo $rowe['aadhar']; ?>" readonly> </div>
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
                                                <input type="text" name="lname" placeholder="Enter Last Name" class="form-control" value="<?php echo $rowe['status']; ?>" readonly>

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