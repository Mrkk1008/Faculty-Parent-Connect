<?php
session_start();
include("cn.php");
include("common.php");
checklogin();

if(isset($_GET['pid']))
{
	$resulte = mysqli_query($link,"Select * From parent where pid=".$_GET['pid']);
	$rowe = mysqli_fetch_array($resulte, MYSQLI_BOTH);
	$erno= $rowe['erno'];
	$fathername=$rowe['fathername'];
	$mothername=$rowe['mothername'];
	$fmobile=$rowe['fmobile'];
	$fmobile=$rowe['fmobile'];
	$femail=$rowe['femail'];
	$memail=$rowe['memail'];
	$password=$rowe['password'];
	$fphoto=$rowe['fphoto'];
	$mphoto=$rowe['mphoto'];
	$status=$rowe['status'];

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
    <title>Parent Form</title>

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
        <?php include("mobilemenu.php");?>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <?php include("menu.php");?>
        <!-- END MENU SIDEBAR-->

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
                                    <strong><center><font style="font-size:30px;">Parent Form</font></center></strong>                                </div>
                            </div>
							
                            <!--Form 1 Applying for the Post-->
                        
                            <div class="col-lg-6">
                            <br> <form action="" method="post" enctype="multipart/form-data">
                                <div class="card">
                                    <div class="card-body card-block">
										<div class="form-group">
                                            <label class="control-label mb-1">Enrollment Number</label>
                                            <input type="text" name="erno" placeholder="Enter Enrollment Number" class="form-control" autocomplete="off" readonly value=" <?php  echo $rowe['erno'] ;  ?> ">
		                               </div>
                                       <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Status</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="status" class="form-control" readonly>
                                                        <option value="<?php echo $rowe['status']; ?>"><?php echo $rowe['status']; ?></option>
                                                    </select>
                                                    
                                                </div>
                                         </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!--End of Form 1 Applying for the Post-->
                            
                            <!--Form 2 For Login Info-->
                            
                            <div class="col-lg-6">
                            <br>
                                <div class="card">
                                    <div class="card-body card-block">
                                    	<div class="form-group">
                                            <label class="control-label mb-1">Password</label>
                                            <input type="password" name="password" placeholder="Enter Password" class="form-control" value="<?php echo $rowe['password']; ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!--End of Form 2 For Login Info-->
                            
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Father Details</strong>                                    </div>
                                    <div class="card-body card-block">
                                            <div class="form-group">
                                            <label class="control-label mb-1">Father Name</label>
                                            <input type="text" name="fathername" placeholder="Enter Full Father name" class="form-control" value="<?php echo $rowe['fathername']; ?>" readonly>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label mb-1">Father Moblie</label>
                                            <input type="number" name="fmobile" placeholder="Enter Father moblie" class="form-control" autocomplete="off" value="<?php echo $rowe['fmobile']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Father Email</label>
                                            <input type="email" name="femail" placeholder="Enter Father Email" class="form-control" value="<?php echo $rowe['femail']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Father Photo</label>
                                            <img class="image" src="../parent_photos/<?php echo $rowe['fphoto'];?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Mother Details</strong>                                    </div>
                                    <div class="card-body card-block">
                                            <div class="form-group">
                                            <label class="control-label mb-1">Mother Name</label>
                                            <input type="text" name="mothername" placeholder="Enter Full Mother name" class="form-control" value="<?php echo $rowe['mothername']; ?>" readonly>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label mb-1">Mother Moblie</label>
                                            <input type="number" name="mmobile" placeholder="Enter Mother moblie" class="form-control" autocomplete="off" value="<?php echo $rowe['mmobile']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Mother Email</label>
                                            <input type="email" name="memail" placeholder="Enter Mother Email" class="form-control" value="<?php echo $rowe['memail']; ?>" readonly>
                                        </div>
                                         <div class="form-group">
                                            <label class="control-label mb-1">Mother Photo</label>
                                            <img class="image" src="../parent_photos/<?php echo $rowe['mphoto'];?>">
                                        </div>            
                                    </div>
                                </div>
                            </div>
                            
                            

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

</html>
<!-- end document-->