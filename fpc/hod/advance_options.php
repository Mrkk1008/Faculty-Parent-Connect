<?php
session_start();
include("cn.php");
include("common.php");
checklogin();
$dept = $_SESSION['dname'];
$s_msg = "";
$stat_msg =  "";
$sem_msg = "";
?>

<?php
if (isset($_POST['allocate_new_batch'])) {
    $res_batch = mysqli_query($link, "update student set batch='" . $_POST['batch'] . "' where dept='$dept' AND erno between '" . $_POST['new_start_er'] . "' AND '" . $_POST['new_end_er'] . "'");
    if ($res_batch) {
        $s_msg = "Succesfully Allocated!";
    }
}

if (isset($_POST['change_stat'])) {
    $res_stat = mysqli_query($link, "update student set status='" . $_POST['status'] . "' where dept='$dept' AND sem='" . $_POST['sem'] . "' AND year='" . $_POST['year'] . "'");
    if ($res_stat) {
        $stat_msg = "Succesfully Changed!";
    }
}

if(isset($_POST['change_sem'])){
    $res_sem = mysqli_query($link, "update student set sem='".$_POST['new_sem']."' where sem='".$_POST['old_sem']."' AND status='ACTIVE' AND dept='$dept'");
    if($res_sem){
        $sem_msg = "Succesfully Changed!";
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
    <title>Advance Option</title>

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
            background-color: white;
        }

        .page_numbers a:hover {
            background-color: #4272d7;
            color: #fff;
        }
    </style>
    <script src="./js/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#bsem').on('change', function() {
                var sem = $(this).val();
                //alert('sem='+sem+'  year='+year);
                if (sem) {
                    $.ajax({
                        type: 'POST',
                        url: 'new_ers.php',
                        data: 'sem=' + sem,

                        success: function(html) {
                            $('#new_ers').html(html),
                                $('#new_ers2').html(html);
                        }
                    });
                } else {
                    $('#new_ers').html('<option value="">Select country first</option>');

                }
            });
        });
    </script>

</head>

<body class="animsition">
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
                            <div class="col-lg-6">

                            </div>
                            <div class="col-lg-6">

                            </div>
                        </div>
                        <div class="row">

                            <!-- Main content start  -->

                            <div class="col-md-12">

                                <center>
                                    <h3 class="title-5 m-b-35"><b>Advance Options</b></h3>
                                </center>

                                <!-- Status change START  -->
                                <div>
                                    <strong><i class="fa fa-circle" style="display: inline;"></i>
                                        <p style="display: inline;"> Change student's Status</p>
                                    </strong>
                                    <br><br>
                                    <div class="table-data__tool">
                                        <div class="table-data__tool-left">
                                            <form action="" method="post">
                                                <div class="rs-select2--light rs-select2--sm" style="width: 80px;">
                                                    <select class="js-select2" name="sem" id="sem">
                                                        <option value="Sem">Sem</option>
                                                        <?php
                                                        $ressem = mysqli_query($link, "select * from sem");
                                                        while ($rowsem = mysqli_fetch_array($ressem, MYSQLI_BOTH)) {
                                                            $s++;
                                                        ?>
                                                            <option value="<?php echo $rowsem['sem']; ?>"><?php echo $rowsem['sem']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <div class="dropDownSelect2"></div>
                                                </div>

                                                <div class="rs-select2--light rs-select2--md" style="width: 130px;">
                                                    <select class="js-select2" name="year" id="year">
                                                        <option value="Year">Entry Year</option>
                                                        <?php
                                                        $ressem = mysqli_query($link, "select * from year");
                                                        while ($rowsem = mysqli_fetch_array($ressem, MYSQLI_BOTH)) {
                                                            $s++;
                                                        ?>
                                                            <option value="<?php echo $rowsem['year']; ?>"><?php echo $rowsem['year']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <div class="dropDownSelect2"></div>
                                                </div>
                                                <p style="margin-left: 30px; margin-right: 10px; display: inline;">Change Status to:</p>
                                                <div class="rs-select2--light rs-select2--sm">
                                                    <select class="js-select2" name="status" id="status">
                                                        <option value="">Status</option>
                                                        <option value="ACTIVE">ACTIVE</option>
                                                        <option value="INACTIVE">INACTIVE</option>
                                                    </select>
                                                    <div class="dropDownSelect2"></div>
                                                </div>
                                                <button style="margin-left: 10px;" type="submit" class="btn btn-primary" name="change_stat">Change</button>
                                                <p style=" color: green; margin-top: 18px;"><?php echo $stat_msg; ?></p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <!-- Status change END  -->

                                <!-- Sem change Start  -->

                                <div>
                                    <strong><i class="fa fa-circle" style="display: inline;"></i>
                                        <p style="display: inline;"> Change student's Semester</p>
                                    </strong>
                                    <p style="display: inline;"> (make sure you go for higher to lower semester)</p>
                                    <br><br>
                                    <div class="table-data__tool">
                                        <div class="table-data__tool-left">
                                            <form action="" method="post">
                                                <p style="display: inline; margin-right: 8px;">From: </p>
                                                <div class="rs-select2--light rs-select2--sm" style="width: 100px;">
                                                    <select class="js-select2" name="old_sem" id="sem">
                                                        <option value="Sem">Sem</option>
                                                        <?php
                                                        $ressem = mysqli_query($link, "select * from sem");
                                                        while ($rowsem = mysqli_fetch_array($ressem, MYSQLI_BOTH)) {
                                                            $s++;
                                                        ?>
                                                            <option value="<?php echo $rowsem['sem']; ?>"><?php echo $rowsem['sem']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <div class="dropDownSelect2"></div>
                                                </div>
                                                <p style="display: inline; margin-left: 20px; margin-right: 8px;">To: </p>
                                                <div class="rs-select2--light rs-select2--sm" style="width: 100px;">
                                                    <select class="js-select2" name="new_sem" id="sem">
                                                        <option value="Sem">Sem</option>
                                                        <?php
                                                        $ressem = mysqli_query($link, "select * from sem");
                                                        while ($rowsem = mysqli_fetch_array($ressem, MYSQLI_BOTH)) {
                                                            $s++;
                                                        ?>
                                                            <option value="<?php echo $rowsem['sem']; ?>"><?php echo $rowsem['sem']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <div class="dropDownSelect2"></div>
                                                </div>
                                                <button style="margin-left: 10px;" type="submit" class="btn btn-primary" name="change_sem">Change</button>
                                                <p style=" color: green; margin-top: 18px;"><?php echo $sem_msg; ?></p>
                                            </form>
                                        </div>
                                        
                                    </div>
                                </div>
                                <br>

                                <!-- Sem change End  -->

                                <!-- batch start  -->

                                <div>
                                    <strong><i class="fa fa-circle" style="display: inline;"></i>
                                        <p style="display: inline;"> Allocate Students in Batch</p>
                                    </strong>
                                    <br><br>
                                    <div class="table-data__tool">
                                        <div class="table-data__tool-left">
                                            <form action="" method="post">
                                                <div class="rs-select2--light rs-select2--sm">
                                                    <select class="js-select2" name="sem" id="bsem">
                                                        <option value="Sem">Sem</option>
                                                        <?php
                                                        $ressem = mysqli_query($link, "select * from sem");
                                                        while ($rowsem = mysqli_fetch_array($ressem, MYSQLI_BOTH)) {
                                                            $s++;
                                                        ?>
                                                            <option value="<?php echo $rowsem['sem']; ?>"><?php echo $rowsem['sem']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <div class="dropDownSelect2"></div>
                                                </div>

                                                <div class="rs-select2--light rs-select2--md" style="width:400px;">
                                                    <select class="js-select2" name="new_start_er" id="new_ers">
                                                        <option value="">First select Sem</option>
                                                    </select>
                                                    <div class="dropDownSelect2"></div>
                                                </div>
                                                <div class="rs-select2--light rs-select2--md" style="width:400px;">
                                                    <select class="js-select2" name="new_end_er" id="new_ers2">
                                                        <option value="">First select Sem</option>
                                                    </select>
                                                    <div class="dropDownSelect2"></div>
                                                </div>

                                                <div class="rs-select2--light rs-select2--sm">
                                                    <select class="js-select2" name="batch" id="batch">
                                                        <option value="">Batch</option>
                                                        <option value="B1">B1</option>
                                                        <option value="B2">B2</option>
                                                    </select>
                                                    <div class="dropDownSelect2"></div>
                                                </div>
                                                <button type="submit" class="btn btn-primary" name="allocate_new_batch">Allocate</button>
                                                <p style=" color: green; margin-top: 18px;"><?php echo $s_msg; ?></p>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Batch end  -->

                            </div>

                        </div>
                        <!-- Main content end  -->
                    </div>
                </div>

                <!-- Start Footer area-->
                <?php include("footer.php"); ?>
                <!-- End Footer area-->
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