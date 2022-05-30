<?php
session_start();
include("cn.php");
include("common.php");
checklogin();


if(isset($_GET['phid']))
{
	$for = $_GET['for'];
}
?>
<?php 

$photo="";

if(isset($_POST['Submit']))
	{
		$dateforimg = date('mjYHis');
		if($_GET['for'] == 'faculty')
		{
			if($_FILES['file']['name'] != "")
			{
				copy($_FILES['file']['tmp_name'],
				"../faculty_photos/".$dateforimg.$_FILES['file']['name'])
				or die ("could not copy file");
			}
			$photo=$_FILES['file']['name'];

			$result = mysqli_query($link,"Update faculty set photo='$dateforimg$photo' where fid=".$_GET['phid']);
			header("Location: faculty.php");
		}
		
		else if($_GET['for'] == 'student')
		{
			if($_FILES['file']['name'] != "")
			{
				copy($_FILES['file']['tmp_name'],
				"../student_photos/".$dateforimg.$_FILES['file']['name'])
				or die ("could not copy file");
			}
			$photo=$_FILES['file']['name'];

			$result = mysqli_query($link,"Update student set photo='$dateforimg$photo' where sid=".$_GET['phid']);
			header("Location: student.php");
		}
		else if($_GET['for'] == 'father')
		{
			if($_FILES['file']['name'] != "")
			{
				copy($_FILES['file']['tmp_name'],
				"../parent_photos/".$dateforimg.$_FILES['file']['name'])
				or die ("could not copy file");
			}
			$photo=$_FILES['file']['name'];

			$result = mysqli_query($link,"Update parent set fphoto='$dateforimg$photo' where pid=".$_GET['phid']);
			header("Location: parent.php");
		}
		else if($_GET['for'] == 'mother')
		{
			if($_FILES['file']['name'] != "")
			{
				copy($_FILES['file']['tmp_name'],
				"../parent_photos/".$dateforimg.$_FILES['file']['name'])
				or die ("could not copy file");
			}
			$photo=$_FILES['file']['name'];

			$result = mysqli_query($link,"Update parent set mphoto='$dateforimg$photo' where pid=".$_GET['phid']);
			header("Location: parent.php");
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
    <title>Faculty Edit</title>

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
                    <form action="#" method="POST" enctype="multipart/form-data">
                        
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                    	<strong>Update Photo</strong>
                                    	</div>
                                    		<div class="card-body">
                                    			<div class="form-group">
                                            		<input type="file" name="file" id="file"  class="form-control" >
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
        function popup()
        {
            var ms = "<?php echo $msg ?>";
            if (ms == "success")
            {
                Swal.fire('Good!','New Faculty Added!','success')
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