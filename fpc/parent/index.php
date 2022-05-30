<?php
session_start();
include("cn.php");

$msg = "";
$dept = "";
if (isset($_POST['submit'])) {
    if (isset($_POST["captcha"]) && $_POST["captcha"] != "" && $_SESSION["code"] == $_POST["captcha"]) {
        $erno = mysqli_real_escape_string($link, $_POST['erno']);
        $password = mysqli_real_escape_string($link, $_POST['password']);

        $result = mysqli_query($link, "Select * From parent where erno='$erno'");
        $res = mysqli_query($link, "select * from student where erno='$erno'");
        $studept = mysqli_fetch_array($res, MYSQLI_BOTH);

        $dname = $studept['dept'];
        $res1 = mysqli_query($link, "Select faculty_no,dname From faculty where dname='$dname'");
        if (@mysqli_num_rows(@$result) > 0) {
            $row = mysqli_fetch_array($result, MYSQLI_BOTH);
            $rowe = mysqli_fetch_array($res1, MYSQLI_BOTH);
            if ((md5($password) == $row["password"])) {

                $_SESSION['adminok'] = "ok";
                $_SESSION['erno'] = $row['erno'];

                $_SESSION['femail'] = $row['femail'];
                $_SESSION['fathername'] = $row['fathername'];
                $_SESSION['mothername'] = $row['mothername'];
                $_SESSION['faculty_no'] = $rowe['faculty_no'];
                $_SESSION['dname'] = $rowe['dname'];
                $_SESSION['sem'] = $studept['sem'];
                $_SESSION['year'] = $studept['year'];
                $_SESSION['c_year'] = $studept['current_year'];
                $_SESSION['dname'] = $dname;
                header("Location: admin.php");
                /*echo "<script>window.open('admin.php','_self')</script>";*/
            } else {
                $msg = "Password incorrect";
            }
        } else {
            $msg = "Username incorrect";
        }
    } else {
        $msg = "Wrong code Entered";
    }
}
?>
<?php
//$res = mysqli_query($link,"Select * From department");
//$num=mysqli_num_rows($res);
//$n=0;
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
        <div class="page-content--bge5" style="background:url(images/bggif.gif); background-repeat:no-repeat; background-size:100% 100%;">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <h1>Parent Login </h1>
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="" method="post">
                                <label>Enter Enrollment No</label>
                                <input class="au-input au-input--full" type="text" name="erno" placeholder="Enter Enrollment No" autocomplete="off" required>
                        </div>
                        <br />
                        <div class="form-group">
                            <label>Password</label>
                            <input class="au-input au-input--full" type="password" name="password" placeholder="Enter Password" autocomplete="off" required>
                        </div>

                        <div class="form-group">
                            <label>Enter Captcha</label>
                            <input class="au-input" name="captcha" type="text" autocomplete="off" required />
                            <img src="captcha.php" />
                            <a href="index.php">
                                <i class="fa fa-refresh"></i>
                            </a>
                            <br />
                        </div>
                        <span>
                            <font color="#FF0000"><?php echo $msg; ?></font>
                        </span>
                        <input style="background-color: #208bff" name="submit" type="submit" id="submit" value="Login" class="au-btn au-btn--block au-btn--green m-b-20">
                        </form>
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