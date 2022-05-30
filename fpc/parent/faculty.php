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
/*$erno=$_SESSION['erno'];
$dept=mysqli_query($link,"select dept from student where erno='$erno'");
$rowe = mysqli_fetch_array($dept, MYSQLI_BOTH);
$dept1 = $rowe['dept'];
$result = mysqli_query($link,"select * from faculty where dname='$dept1'");
$num1 = mysqli_num_rows($result);
$n = 0;*/
?>
<?php
$erno=$_SESSION['erno'];
$dept=mysqli_query($link,"select dept from student where erno='$erno'");
$rowe = mysqli_fetch_array($dept, MYSQLI_BOTH);
$dept1 = $rowe['dept'];
$result = mysqli_query($link,"select * from faculty where dname='$dept1'");
$num1 = mysqli_num_rows($result);
$n = 0;
$results_per_page = 3;
$result = mysqli_query($link,"SELECT * FROM faculty where dname='$dept1'");
$number_of_results = mysqli_num_rows($result);
	
	$number_of_pages = ceil($number_of_results/$results_per_page);
	
	if (!isset($_GET['page'])) {
	  $page = 1;
	} else {
	  $page = $_GET['page'];
	}
	
$this_page_first_result = ($page-1)*$results_per_page;
$resu = mysqli_query($link,"Select * from faculty where dname='$dept1' LIMIT " . $this_page_first_result . ',' .  $results_per_page);
$num = mysqli_num_rows($resu);
$n = 0;
?>
<?php
/*$year="";
if(isset($_POST['filter']))
{
	$post=$_POST['post'];
	if($post=='post')
	{
		$resu = mysqli_query($link,"Select * from faculty where dname='$dept1'");
	}
	else
	{
		$resu = mysqli_query($link,"Select * from faculty where pname='$post' AND dname='$dept1'");
	}
	$num = mysqli_num_rows($resu);
	$n = 0;
}*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Faculty</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
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

    .page_numbers {
        display: inline-block;
    }

    .page_numbers a {
        float: left;
        padding: 8px;
        text-decoration: none;
        border: 1px solid #555555;
        background-color: white;
    }

    .page_numbers a:hover {
        background-color: #4272d7;
        color: #000000;
    }
    </style>

</head>

<body class="animsition">
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
                        <br />
                        <center>
                            <table>
                                <center>
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <div class="col-lg-9">

                                                    <center>
                                                        <h2 class="title-1 m-b-25">Faculty table</h2>
                                                    </center>
                                                    <div class="table-responsive table--no-card m-b-40">
                                                        <table
                                                            class="table table-borderless table-striped table-earning">
                                                            <thead>
                                                                <tr>
                                                                    <th>Faculty Photo</th>
                                                                    <th>Name</th>
                                                                    <th>POST</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php while($row = @mysqli_fetch_array(@$resu, MYSQLI_BOTH)){
                                                                    ?>
                                                                <tr>
                                                                    <td><img class="image"
                                                                            src="../faculty_photos/<?php echo $row['photo'];?>">
                                                                    </td>
                                                                    <td><?php echo $row['fname']." ".$row['lname'];?>
                                                                    </td>

                                                                    <td><?php echo $row['pname'];  ?></td>

                                                                </tr>

                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                        <br />
                                                        <center>
                                                            <table>
                                                                <center>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="page_numbers">
                                                                                <?php
                                                                                    for ($pagex=1; $pagex<=$number_of_pages; $pagex++)
                                                                                    {
                                                                                        if($page==$pagex){
                                                                                            echo '<a style="background-color: #4272d7; color:white; border:none;" href="faculty.php?page=' . $pagex .'">'.'  '.$pagex.'  '. '</a> ';
                                                                                        } else {
                                                                                            echo '<a style="color:#4272d7; border:none;"" href="faculty.php?page=' . $pagex . '">' . '  ' . $pagex . '  ' . '</a> ';
                                                                                        }
                                                                                    }
                                                                                ?>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </center>
                                                            </table>
                                                        </center>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </center>
                            </table>
                            <!-- Start Footer area-->
                            <?php include("footer.php");?>
                            <!-- End Footer area-->
                    </div>

                </div>
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

</body>

</html>
<!-- end document-->