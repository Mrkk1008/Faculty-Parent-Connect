<?php
session_start();
include("cn.php");
include("common.php");
checklogin();
$dname = $_SESSION['dname'];
?>

<?php
if (isset($_POST['sySubmit'])) {
    $sem = $_POST['sem'];
    $year = $_POST['year'];
    $ltype = $_POST['ltype'];

    $from_er = $_POST['from_er'];
    $to_er = $_POST['to_er'];
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
    <title>Subjects</title>

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
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <h3 class="title-5 m-b-35">
                        <center><b>Taking Attendance</b></center>
                    </h3>
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <form action="attendance_take_logic.php" method="post">

                                <div class="col-12 col-md-5">
                                    <input type="hidden" name="sem" value="<?php echo $sem; ?>">
                                    <input type="hidden" name="year" value="<?php echo $year; ?>">
                                    <input type="hidden" name="from_er" value="<?php echo $from_er; ?>">
                                    <input type="hidden" name="to_er" value="<?php echo $to_er; ?>">
                                    <input type="hidden" name="ltype" value="<?php echo $ltype; ?>">
                                    <input type="date" name="date" class="form-control" required>
                                    <div class="dropDownSelect2"></div>
                                </div>
                                <br>
                                <div class="rs-select2--light rs-select2--sm">
                                    <select class="js-select2" name="subcode">
                                        <option selected="selected">subject</option>
                                        <?php
                                        $res = mysqli_query($link, "select subname,subcode from asssubject where sem=$sem AND ( faculty_no1='" . $_SESSION['faculty_no'] . "' OR faculty_no2='" . $_SESSION['faculty_no'] . "' )");
                                        while ($row = mysqli_fetch_array($res, MYSQLI_BOTH)) {
                                            $shortname = mysqli_query($link, "select shortname from subject where subcode='" . $row['subcode'] . "'");
                                            $rowsname = mysqli_fetch_array($shortname, MYSQLI_BOTH);
                                            $shortname = $rowsname['shortname'];
                                        ?>
                                            <option value="<?php echo $row['subcode']; ?>"><?php echo $shortname; ?> </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                                <div class="rs-select2--light rs-select2--sm">
                                    <select class="js-select2" name="from" size="">
                                        <option selected="selected">from</option>
                                        <?php
                                        $res = mysqli_query($link, "select * from time");
                                        while ($row = mysqli_fetch_array($res, MYSQLI_BOTH)) {
                                        ?>
                                            <option value="<?php echo $row['time_start']; ?>"><?php echo $row['time_start']; ?> </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                                <div class="rs-select2--light rs-select2--sm">
                                    <select class="js-select2" name="to" size="">
                                        <option selected="selected">to</option>
                                        <?php
                                        $res = mysqli_query($link, "select * from time");
                                        while ($row = mysqli_fetch_array($res, MYSQLI_BOTH)) {
                                        ?>
                                            <option value="<?php echo $row['time_end']; ?>"><?php echo $row['time_end']; ?> </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>


                        </div>
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>Enrollment<br>Name</th>
                                                <th>A</th>
                                                <th>P</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $c = 0;
                                            if($from_er == "" AND $to_er == ""){
                                                $resstu = mysqli_query($link, "select * from student where sem='$sem' AND dept='$dname' AND status='ACTIVE' ORDER By erno");
                                            }else{
                                                $resstu = mysqli_query($link, "select * from student where sem='$sem' AND dept='$dname' AND status='ACTIVE' AND erno between '$from_er' AND '$to_er' ORDER By erno");
                                            }
                                            while ($rowstu = mysqli_fetch_array($resstu, MYSQLI_BOTH)) {
                                                $c++;
                                            ?>
                                                <tr>
                                                    <td><?php echo $rowstu['erno'] . "<br>" . $rowstu['fname'] . " " . $rowstu['lname']; ?></td>
                                                    <td><input type="radio" value="ABSENT" name="student<?php echo $c; ?>"></td>
                                                    <td><input type="radio" value="PRESENT" name="student<?php echo $c; ?>"></td>

                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <center>
                                    <div class="card-footer">
                                        <button id="btnclick" class="btn btn-primary btn-sm" name="attsubmit">
                                            <i class="fa fa-dot-circle-o"></i> Submit</button>

                                    </div>
                                </center>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                    </div>
                    </form>
                    <!-- END DATA TABLE -->
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