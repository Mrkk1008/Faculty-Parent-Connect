<?php
session_start();
include("cn.php");
include("common.php");
checklogin();
?>
<?php
$res1 = mysqli_query($link,"Select post_name from post");
$num = mysqli_num_rows($res1);
$s = 0;
?>
<?php
$erno=$_SESSION['erno'];
$ress=mysqli_query($link,"select * from student where erno='$erno'");
$rowe = mysqli_fetch_array($ress, MYSQLI_BOTH);
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
	<style>
	.image {
  			border: 1px solid #ddd;
  			border-radius: 4px;
  			padding: 5px;
  			width: 100px;
			height:100px;	
		}
		
	</style>
</head>

<body class="animsition">
    <!-- popup js -->
    <script src="js/sweetalert2.all.min.js"></script>

    <div class="page-wrapper"><!-- HEADER MOBILE-->
           <!-- HEADER DESKTOP-->
          	<?php include("mobilemenu.php");?>
            <!-- END HEADER DESKTOP-->

        <!-- PAGE CONTAINER-->
     
<div class="page-container">
            <!-- HEADER DESKTOP-->
          	<?php include("header.php");?>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                        	
                            <div class="col-lg-12">
                            	<div class="card-header">
                                    <strong><center><font style="font-size:30px;">Student Form</font></center></strong>                                </div>
                            </div>

                            <!--Form 1 Applying for the Post-->
                        
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="" method="post" enctype="multipart/form-data">
                                         <div class="form-group">
                                           
                                            <img class="image" src="../student_photos/<?php echo $rowe['photo'];?>" >
                                        </div>     
                                            <div class="form-group">
                                               <label for="cc-payment" class="control-label mb-1">Year</label> 
                                                 <input type="number" name="year" placeholder="Enter year" class="form-control" value="<?php echo $rowe['year']; ?>" disabled>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Department Name</label>
                                            	 <input type="text" name="dept" placeholder="Enter Department" class="form-control" value="<?php echo $rowe['dept']; ?>" disabled>                                            </div>
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
                                            <input type="number" name="erno" placeholder="Enter Enrollment Number" class="form-control" autocomplete="off" value="<?php echo $rowe['erno']; ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Semester</label>
                                            <input type="number" name="sem" placeholder="Enter Semester" class="form-control" value="<?php echo $rowe['sem']; ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!--End of Form 2 For Login Info-->
                            
                            <!--Form 3 Personal Detail-->
                            
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Personal Details</strong>                                    </div>
                                    <div class="card-body card-block">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">First Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="fname" placeholder="Enter First Name" class="form-control" value="<?php echo $rowe['fname']; ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Last Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="lname" placeholder="Enter Last Name" class="form-control" value="<?php echo $rowe['lname']; ?>" disabled>
                                                </div>
                                            </div>
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Gender</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="gender" class="form-control" value="<?php echo $rowe['gender']; ?>" disabled>
                                                </div>
                                            </div>
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Date Of Birth</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="date" name="dob" placeholder="Enter Date Of Birth" class="form-control" value="<?php echo $rowe['dob']; ?>" disabled>
                                                </div>
                                            </div>
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Email-id</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <input type="email" name="semail" placeholder="Enter E-mail" class="form-control" autocomplete="off" value="<?php echo $rowe['semail']; ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Qualification</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <input type="text" name="quali" placeholder="Enter Qualification" class="form-control" autocomplete="off" value="<?php echo $rowe['quali']; ?>" disabled>
                                                </div>
                                            </div>
                                             <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">State</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <input type="text" name="state" placeholder="Enter State" class="form-control" autocomplete="off" value="<?php echo $rowe['state']; ?>" disabled>                                                            
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">City</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <input type="text" name="city" placeholder="Enter City" class="form-control" autocomplete="off" value="<?php echo $rowe['city']; ?>" disabled>                                                            
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Pincode</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <input type="number" name="pincode" placeholder="Enter Pincode" class="form-control" autocomplete="off" value="<?php echo $rowe['pincode']; ?>"disabled>                                                            
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
                                        <strong>Contact & Address Details</strong>                                    </div>
                                    <div class="card-body card-block">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Mobile No.</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" name="smobile" placeholder="Enter Mobile Number" class="form-control" value="<?php echo $rowe['smobile']; ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Phone No.</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" name="sphone" placeholder="Enter Phone Number" class="form-control" value="<?php echo $rowe['sphone']; ?>" disabled>
                                                </div>
                                            </div>
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Aadhaar Card</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" name="aadhaar" placeholder="Enter Aadhaar card" class="form-control" value="<?php echo $rowe['aadhaar']; ?>" disabled>                                                 </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Address</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <textarea name="address" rows="3.5" class="form-control" disabled><?php echo $rowe['address']; ?></textarea>    	
                                                </div>
                                            </div>
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Status</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="status"  class="form-control" value="<?php echo $rowe['status']; ?>" disabled>                                                 </div>
                                            </div>
                                            
                                    </div>
                                </div>
                            </div>
                            
                            <!--End of Form 4 Personal Detail-->

                    </div>
     				</form>
                       		<!-- Start Footer area-->
    							<?php include("footer.php");?>
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
        function popup()
        {
            var ms = "";
            if (ms == "success")
            {
                Swal.fire('Good!','New Student Added!','success')
            }
            else if (ms == "error")
            {
                Swal.fire('Oops!','Duplicate entry found!','error')
            }
        }   
    </script>

    <script>
        popup()
    </script>
</body>