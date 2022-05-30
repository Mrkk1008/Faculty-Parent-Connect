<?php
session_start();
include("cn.php");
include("common.php");
checklogin();

$msg = "";
$dname="";
$dcode="";

if(isset($_POST['Submit']))
{
    $dname=mysqli_real_escape_string($link,$_POST['dname']);
    $dcode=mysqli_real_escape_string($link,$_POST['dcode']);
    strtoupper($dname);
    strtoupper($dcode);
	$check_duplicate="select * from department where dname='$dname' AND dcode='$dcode'";
	$result = mysqli_query($link,$check_duplicate);
	
	$count=mysqli_num_rows($result);
	if($count > 0)
	{
        $msg="error";
		//$msg = "<font style='color:red;'>Duplicate Entry</font>";
		//echo $msg;
	}
	else
	{
		$dname = $_POST['dname'];
		$dcode= $_POST['dcode'];
		if(!isset($_GET['did']))
		{		
			$result = mysqli_query($link,"Insert into department(dname,dcode) values(UPPER('$dname'),UPPER('$dcode'))");
            $msg="success";
            //$msg = "<font style='color:green'>New record is saved</font>";
		}
	}
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
    <title>Department Form</title>

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
                                    <strong><center><font style="font-size:30px;">Department Form</font></center></strong>
                                </div>
                            </div>
                                         
                            <div class="col-lg-6">
                           		<br/>
                                
                                <div class="card">
                                
                     				<div class="card-body">
                                    
                                        <form action="" method="post">
                                            <div class="form-group">
                                               <label for="cc-payment" class="control-label mb-1">Department Name</label> 
                                                 <input type="text" name="dname" placeholder="Enter Department" class="form-control" required>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Department Code</label>
                                            	<input type="text" name="dcode" placeholder="Enter Department Code" class="form-control" required>
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
            var ms = "<?php echo $msg ?>";
            if (ms == "success")
            {
                Swal.fire('Good!','New Department Added!','success')
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