<?php
session_start();
include("cn.php");

$msg = "";

if (isset($_POST['submit']))
{
	if(isset($_POST["captcha"]) && $_POST["captcha"] !="" && $_SESSION["code"]==$_POST["captcha"])
	{
		$username = mysqli_real_escape_string($link,$_POST['username']);
		$password = mysqli_real_escape_string($link,$_POST['password']);
	
		$result = mysqli_query($link,"Select * From admin where username='$username'");
	
		if(mysqli_num_rows($result)>0)
		{
			$row = mysqli_fetch_array($result, MYSQLI_BOTH);
			if($password == $row["password"])
			{
			
				$_SESSION['adminok'] = "ok";
				$_SESSION['username'] = $username;
			
				header("Location: admin.php");
			/*echo "<script>window.open('admin.php','_self')</script>";*/

			}
			else
			{
				$msg = "Password incorrect";
			}
		}
		else
			{
			$msg = "Username incorrect";
    		}
	}
	else
	{
 		$msg= "Wrong code Entered" ;
	}
}
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
    <title>Login</title>

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

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5" style="background:url(images/1.jpg); background-repeat:no-repeat; background-size:100% 100%;">
            <img src="images/2.jpg" width="100%" height="2%"/>
            <div class="container" >
                <div class="login-wrap" >
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <h1>Class co-ordinator Login </h1>
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="text" name="username" placeholder="username" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="password" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label>Enter iamge Text:-</label>
                                    <input class="au-input" name="captcha" type="text" autocomplete="off" required />
									<img src="captcha.php" />
                                    	<a href="index.php">
                                			<i class="fa fa-refresh"></i>
                                    	</a>
                                    <br />
                                </div>
                                <!--<div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Remember Me
                                    </label>
                                    <label>
                                        <a href="#">Forgotten Password?</a>
                                    </label>
                                </div>-->
                                <span><font color="#FF0000"><?php echo $msg; ?></font></span>
                                <input name="submit" type="submit" id="submit" value="Login" class="au-btn au-btn--block au-btn--green m-b-20">
                                <!--<button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>-->
                                <!--<div class="social-login-content">
                                    <div class="social-button">
                                        <button class="au-btn au-btn--block au-btn--blue m-b-20">sign in with facebook</button>
                                        <button class="au-btn au-btn--block au-btn--blue2">sign in with twitter</button>
                                    </div>
                                </div>-->
                            </form>
                            <!--<div class="register-link">
                                <p>
                                    Don't you have account?
                                    <a href="#">Sign Up Here</a>
                                </p>
                            </div>-->
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