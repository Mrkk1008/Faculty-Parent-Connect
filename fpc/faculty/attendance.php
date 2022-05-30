<?php
session_start();
include("cn.php");
include("common.php");
checklogin();
$dname = $_SESSION['dname'];
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
    <title>Forget Password</title>

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
        #forlab {
            display: none;
        }
    </style>
    <script>
        function shower(x) {
            if (x == 0) {
                document.getElementById('forlab').style.display = 'block';
            } else {
                document.getElementById('forlab').style.display = 'none';
            }
        }
    </script>
</head>

<body class="animsition">
    <!-- HEADER MOBILE-->
    <?php //include("mobilemenu.php");
    ?>
    <!-- END HEADER MOBILE-->

    <!-- MENU SIDEBAR-->
    <?php //include("menu.php");
    ?>
    <!-- END MENU SIDEBAR-->

    <!-- PAGE CONTAINER-->

    <!-- HEADER DESKTOP-->
    <?php //include("header.php");
    ?>
    <!-- HEADER DESKTOP-->

    <!-- MAIN CONTENT-->

    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <h3><strong>Take Attendance</strong></h3>
                        </div>
                        <div class="login-form">
                            <form action="attendance_take.php" method="post">
                                <center>
                                    <div class="rs-select2--light rs-select2--sm">
                                        <select class="js-select2" name="sem" size="">
                                            <option selected="selected">Sem</option>
                                            <?php
                                            $res = mysqli_query($link, "select * from sem");
                                            while ($row = mysqli_fetch_array($res, MYSQLI_BOTH)) {
                                            ?>
                                                <option value="<?php echo $row['sem']; ?>"><?php echo $row['sem']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>

                                    <div class="rs-select2--light rs-select2--sm">
                                        <select class="js-select2" name="year" size="">
                                            <option selected="selected">year</option>
                                            <?php
                                            $res = mysqli_query($link, "select * from year");
                                            while ($row = mysqli_fetch_array($res, MYSQLI_BOTH)) {
                                            ?>
                                                <option value="<?php echo $row['year']; ?>"><?php echo $row['year']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                    <br>
                                    <input type="radio" value="LECTURE" onclick="shower(1)" name="ltype" checked> LECTURE
                                    <input type="radio" value="LAB" onclick="shower(0)" name="ltype"> LAB
                                    <br>
                                    <br>
                                    <div id="forlab">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">*For Lab. attendance*</label>
                                        </div>
                                        <div>
                                            <div class="row form-group">
                                                <div class="col-12 col-sm-3">
                                                    <div class="rs-select2--light rs-select2--sm">
                                                        <select class="js-select2" name="batch" size="">
                                                            <option value="">Batch</option>
                                                            <option value="B1">B1</option>
                                                            <option value="B2">B2</option>
                                                        </select>
                                                        <div class="dropDownSelect2"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <center>
                                        <br>
                                        <button class="au-btn au-btn--block au-btn--green m-b-20" name="sySubmit" type="submit">submit</button>
                            </form>
                            <br>
                            <a href="attendance_view.php">View your taken Attendance</a>
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
    <!-- popup js -->
    <script src="js/sweetalert2.all.min.js"></script>

</body>

</html>
<!-- end document-->
<?php
/*if(isset($_POST['Submit']))
	{
		$email = $_SESSION['email'];
		$fetchpass = mysqli_query($link,"select password from faculty where email='$email'");
		while($row = mysqli_fetch_array($fetchpass, MYSQLI_BOTH))
		{
			$oldpass = $_POST['oldpass'];
			$newpass = $_POST['newpass'];
			if($row[0] == $oldpass)
			{
				$result = mysqli_query($link,"update faculty set password='$newpass' where email='$email'");
				$msg="success";
			}
			else
			{
				$msg="error";
			}
		}
	}*/

?>
<script>
    function popup() {
        var ms = "<?php echo $msg ?>";
        if (ms == "success") {
            Swal.fire('Good!', 'Your password is changed!', 'success')
        } else if (ms == "error") {
            Swal.fire('Oops!', 'Your old password is wrong!', 'error')
        }
    }
</script>

<script>
    popup()
</script>