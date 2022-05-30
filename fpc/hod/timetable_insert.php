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
    <title>Time table</title>

    <!-- Fontfaces CSS-->
    <link href="../admin/css/font-face.css" rel="stylesheet" media="all">
    <link href="../admin/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../admin/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../admin/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../admin/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="../admin/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../admin/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../admin/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../admin/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../admin/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../admin/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../admin/css/theme.css" rel="stylesheet" media="all">
    <style>
        .image {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px;
            width: 80px;
        }

        #bsubmon1,
        #bsubmon2,
        #bsubmon3,
        #bsubmon4,
        #bsubmon5,
        #bsubmon6,
        #bsubmon7,
        #bsubtue1,
        #bsubtue2,
        #bsubtue3,
        #bsubtue4,
        #bsubtue5,
        #bsubtue6,
        #bsubtue7,
        #bsubwed1,
        #bsubwed2,
        #bsubwed3,
        #bsubwed4,
        #bsubwed5,
        #bsubwed6,
        #bsubwed7,
        #bsubthus1,
        #bsubthus2,
        #bsubthus3,
        #bsubthus4,
        #bsubthus5,
        #bsubthus6,
        #bsubthus7,
        #bsubfri1,
        #bsubfri2,
        #bsubfri3,
        #bsubfri4,
        #bsubfri5,
        #bsubfri6,
        #bsubfri7,
        #bsubsat1,
        #bsubsat2,
        #bsubsat3,
        #bsubsat4,
        #bsubsat5,
        #bsubsat6,
        #bsubsat7 {
            display: none;
        }
    </style>
    <script>
        function showbatch(x, s) {
            var str = s;
            //alert(str);
            if (x == 0) {
                document.getElementById(str).style.display = 'block';
            } else {
                document.getElementById(str).style.display = 'none';
            }
        }
    </script>
    <script src="./js/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#sem').on('change', function() {
                var sem = $(this).val();
                if (sem) {
                    $.ajax({
                        type: 'POST',
                        url: 'subdata.php',
                        data: 'sem=' + sem,
                        success: function(html) {
                            $('#submon1').html(html);
                            $('#submon2').html(html);
                            $('#submon3').html(html);
                            $('#submon4').html(html);
                            $('#submon5').html(html);
                            $('#submon6').html(html);

                            $('#subtue1').html(html);
                            $('#subtue2').html(html);
                            $('#subtue3').html(html);
                            $('#subtue4').html(html);
                            $('#subtue5').html(html);
                            $('#subtue6').html(html);

                            $('#subwed1').html(html);
                            $('#subwed2').html(html);
                            $('#subwed3').html(html);
                            $('#subwed4').html(html);
                            $('#subwed5').html(html);
                            $('#subwed6').html(html);

                            $('#subthus1').html(html);
                            $('#subthus2').html(html);
                            $('#subthus3').html(html);
                            $('#subthus4').html(html);
                            $('#subthus5').html(html);
                            $('#subthus6').html(html);

                            $('#subfri1').html(html);
                            $('#subfri2').html(html);
                            $('#subfri3').html(html);
                            $('#subfri4').html(html);
                            $('#subfri5').html(html);
                            $('#subfri6').html(html);

                            $('#subsat1').html(html);
                            $('#subsat2').html(html);
                            $('#subsat3').html(html);
                            $('#subsat4').html(html);
                            $('#subsat5').html(html);
                            $('#subsat6').html(html);
                        }
                    });
                } else {
                    $('#sub').html('<option value="">Select country first</option>');

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

                    </div>
                    <div class="row">
                        <div class="col-lg-6">

                        </div>
                        <div class="col-lg-6">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- DATA TABLE -->
                            <center>
                                <h3 class="title-5 m-b-35"><b>Time-table Form</b></h3>
                            </center>
                            <div class="table-data__tool">
                                <div class="table-data__tool-left">
                                    <form action="#" method="post">
                                        <div class="rs-select2--light rs-select2--sm">
                                            <select class="js-select2" name="sem" id="sem">
                                                <option value="sem">sem</option>
                                                <?php
                                                $res2 = mysqli_query($link, "Select * from sem");
                                                while ($rowt = mysqli_fetch_array($res2, MYSQLI_BOTH)) {
                                                ?>
                                                    <option value="<?php echo $rowt['sem']; ?>"><?php echo $rowt['sem']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                            <div id='response'></div>

                                        </div>
                                    </form>

                                    <br>
                                    <form action="subdata.php" method="POST">
                                        <div class="rs-select2--light rs-select2--md">
                                            <select class="js-select2" name="year">
                                                <option selected="year">Year</option>
                                                <?php
                                                $res1 = mysqli_query($link, "Select * from year");
                                                while ($rowe = mysqli_fetch_array($res1, MYSQLI_BOTH)) {
                                                ?>
                                                    <option value="<?php echo $rowe['year']; ?>"><?php echo $rowe['year']; ?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                </div>
                            </div>

                            <div class="row m-t-30">
                                <div class="col-md-12">
                                    <!-- DATA TABLE-->
                                    <div class="table-responsive m-b-40">
                                        <table class="table table-borderless table-data3">
                                            <thead>
                                                <tr>
                                                    <th>Sr</th>
                                                    <th>Time</th>
                                                    <th>Monday</th>
                                                    <th>Tuesday</th>
                                                    <th>Wednesday</th>
                                                    <th>Thursday</th>
                                                    <th>Firday</th>
                                                    <th>Saturday</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $resultt = mysqli_query($link, "Select * from time");
                                                $i = 0;
                                                while ($rowt = mysqli_fetch_array($resultt, MYSQLI_BOTH)) {
                                                    $i = $i + 1;;

                                                ?>
                                                    <td><?php echo $rowt['period']; ?></td>
                                                    <td><?php echo $rowt['time_start'] . " to " . $rowt['time_end']; ?></td>

                                                    <!-- Monday Start -->
                                                    <td>
                                                        <div class="rs-select2--light rs-select2--sm">

                                                            <select class="js-select2" name="submon<?php echo $i; ?>" id="submon<?php echo $i; ?>">
                                                                <option value="select">select</option>
                                                            </select>
                                                            <div class="dropDownSelect2"></div>
                                                            <input type="radio" name="rsubmon<?php echo $i; ?>" onclick="showbatch(1,'bsubmon<?php echo $i; ?>')" value="LEC" checked>LEC&nbsp;
                                                            <input type="radio" name="rsubmon<?php echo $i; ?>" onclick="showbatch(0,'bsubmon<?php echo $i; ?>')" value="LAB">LAB
                                                            
                                                            <!-- batch start -->
                                                            <div id="bsubmon<?php echo $i; ?>">
                                                                <select class="js-select2" name="bsubmon<?php echo $i; ?>">
                                                                    <option value="select">batch</option>
                                                                    <option value="B1">B1</option>
                                                                    <option value="B2">B2</option>
                                                                    <option value="B1-B2">B1-B2</option>
                                                                </select>
                                                                <div class="dropDownSelect2"></div>
                                                            </div>
                                                            <!-- batch end  -->
                                                        </div>
                                                    </td>
                                                    <!-- Monday end -->

                                                    <!-- Tuesdat Start -->

                                                    <td>
                                                        <div class="rs-select2--light rs-select2--sm">
                                                            <select class="js-select2" name="subtue<?php echo $i; ?>" id="subtue<?php echo $i; ?>">
                                                                <option value="select">select</option>
                                                            </select>
                                                            <div class="dropDownSelect2"></div>
                                                            <input type="radio" name="rsubtue<?php echo $i; ?>" onclick="showbatch(1,'bsubtue<?php echo $i; ?>')" value="LEC" checked>LEC&nbsp;
                                                            <input type="radio" name="rsubtue<?php echo $i; ?>" onclick="showbatch(0,'bsubtue<?php echo $i; ?>')" value="LAB">LAB
                                                            <!-- batch start -->
                                                            <div id="bsubtue<?php echo $i; ?>">
                                                                <select class="js-select2" name="bsubtue<?php echo $i; ?>">
                                                                    <option value="select">batch</option>
                                                                    <option value="B1">B1</option>
                                                                    <option value="B2">B2</option>
                                                                    <option value="B1-B2">B1-B2</option>
                                                                </select>
                                                                <div class="dropDownSelect2"></div>
                                                            </div>
                                                            <!-- batch end  -->
                                                        </div>
                                                    </td>

                                                    <!-- Tuesday End -->


                                                    <!-- Wednesday Start -->
                                                    <td>
                                                        <div class="rs-select2--light rs-select2--sm">
                                                            <select class="js-select2" name="subwed<?php echo $i; ?>" id="subwed<?php echo $i; ?>">
                                                                <option value="select">select</option>
                                                            </select>
                                                            <div class="dropDownSelect2"></div>
                                                            <input type="radio" name="rsubwed<?php echo $i; ?>" onclick="showbatch(1,'bsubwed<?php echo $i; ?>')" value="LEC" checked>LEC&nbsp;
                                                            <input type="radio" name="rsubwed<?php echo $i; ?>" onclick="showbatch(0,'bsubwed<?php echo $i; ?>')" value="LAB">LAB

                                                            <!-- batch start -->
                                                            <div id="bsubwed<?php echo $i; ?>">
                                                                <select class="js-select2" name="bsubwed<?php echo $i; ?>">
                                                                    <option value="select">batch</option>
                                                                    <option value="B1">B1</option>
                                                                    <option value="B2">B2</option>
                                                                    <option value="B1-B2">B1-B2</option>
                                                                </select>
                                                                <div class="dropDownSelect2"></div>
                                                            </div>
                                                            <!-- batch end  -->
                                                        </div>
                                                    </td>

                                                    <!-- Wednesday End -->


                                                    <!-- Thursday Start -->
                                                    <td>
                                                        <div class="rs-select2--light rs-select2--sm">
                                                            <select class="js-select2" name="subthus<?php echo $i; ?>" id="subthus<?php echo $i; ?>">
                                                                <option value="select">select</option>
                                                            </select>
                                                            <div class="dropDownSelect2"></div>
                                                            <input type="radio" name="rsubthus<?php echo $i; ?>" onclick="showbatch(1,'bsubthus<?php echo $i; ?>')" value="LEC" checked>LEC&nbsp;
                                                            <input type="radio" name="rsubthus<?php echo $i; ?>" onclick="showbatch(0,'bsubthus<?php echo $i; ?>')" value="LAB">LAB
                                                            <!-- batch start -->
                                                            <div id="bsubthus<?php echo $i; ?>">
                                                                <select class="js-select2" name="bsubthus<?php echo $i; ?>">
                                                                    <option value="select">batch</option>
                                                                    <option value="B1">B1</option>
                                                                    <option value="B2">B2</option>
                                                                    <option value="B1-B2">B1-B2</option>
                                                                </select>
                                                                <div class="dropDownSelect2"></div>
                                                            </div>
                                                            <!-- batch end  -->
                                                        
                                                        </div>
                                                    </td>
                                                    <!-- Thursdat End -->


                                                    <!-- Fridat Start -->
                                                    <td>
                                                        <div class="rs-select2--light rs-select2--sm">
                                                            <select class="js-select2" name="subfri<?php echo $i; ?>" id="subfri<?php echo $i; ?>">
                                                                <option value="select">select</option>
                                                            </select>
                                                            <div class="dropDownSelect2"></div>
                                                            <input type="radio" name="rsubfri<?php echo $i; ?>" onclick="showbatch(1,'bsubfri<?php echo $i; ?>')" value="LEC" checked>LEC&nbsp;
                                                            <input type="radio" name="rsubfri<?php echo $i; ?>" onclick="showbatch(0,'bsubfri<?php echo $i; ?>')" value="LAB">LAB

                                                            <!-- batch start -->
                                                            <div id="bsubfri<?php echo $i; ?>">
                                                                <select class="js-select2" name="bsubfri<?php echo $i; ?>">
                                                                    <option value="select">batch</option>
                                                                    <option value="B1">B1</option>
                                                                    <option value="B2">B2</option>
                                                                    <option value="B1-B2">B1-B2</option>
                                                                </select>
                                                                <div class="dropDownSelect2"></div>
                                                            </div>
                                                            <!-- batch end  -->
                                                        </div>
                                                    </td>
                                                    <!-- Friday End -->


                                                    <!-- Saturday Start -->
                                                    <td>
                                                        <div class="rs-select2--light rs-select2--sm">
                                                            <select class="js-select2" name="subsat<?php echo $i; ?>" id="subsat<?php echo $i; ?>">
                                                                <option value="select">select</option>
                                                            </select>
                                                            <div class="dropDownSelect2"></div>
                                                            <input type="radio" name="rsubsat<?php echo $i; ?>" onclick="showbatch(1,'bsubsat<?php echo $i; ?>')" value="LEC" checked>LEC&nbsp;
                                                            <input type="radio" name="rsubsat<?php echo $i; ?>" onclick="showbatch(0,'bsubsat<?php echo $i; ?>')" value="LAB">LAB

                                                            <!-- batch start -->
                                                            <div id="bsubsat<?php echo $i; ?>">
                                                                <select class="js-select2" name="bsubsat<?php echo $i; ?>">
                                                                    <option value="select">batch</option>
                                                                    <option value="B1">B1</option>
                                                                    <option value="B2">B2</option>
                                                                    <option value="B1-B2">B1-B2</option>
                                                                </select>
                                                                <div class="dropDownSelect2"></div>
                                                            </div>
                                                            <!-- batch end  -->
                                                        </div>
                                                    </td>

                                                    <!-- Saturday end -->
                                                    </tr>

                                                <?php

                                                }
                                                ?>
                                            </tbody>
                                        </table>
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
                                    <!-- END DATA TABLE-->
                                </div>
                            </div>
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
    <script src="../admin/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="../admin/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="../admin/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="../admin/vendor/slick/slick.min.js">
    </script>
    <script src="../admin/vendor/wow/wow.min.js"></script>
    <script src="../admin/vendor/animsition/animsition.min.js"></script>
    <script src="../admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="../admin/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="../admin/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="../admin/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="../admin/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../admin/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="../admin/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="../admin/js/main.js"></script>

</body>

</html>
<!-- end document-->