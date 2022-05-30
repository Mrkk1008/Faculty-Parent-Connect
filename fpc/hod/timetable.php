<?php
session_start();
include("cn.php");
include("common.php");
checklogin();

$dname = $_SESSION['dname'];
?>
<?php
function printtable($s, $y)
{
    $fsem = $s;
    $fyear = $y;
    global $link;
?>
    <!-- DATA TABLE-->
    <div class="table-responsive m-b-40">
        <div style="background-color:#333333;  border-top-right-radius: 3px; border-top-left-radius: 3px; height:50px;">

            <div style="float:left; line-height:50px;">
                <p style="color:white; font-size:20px;">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSEM: <?php echo  $fsem; ?> &nbsp&nbsp&nbsp YEAR: <?php echo  $fyear; ?></p>
            </div>
            <div class="table-data-feature" style="float:right; position:relative; top:30%; ">

                <button class="item" data-toggle="tooltip" data-placement="top" onClick="exportTableToExcel('<?php echo "sem" . $fsem . "year" . $fyear ?>')" title="Download xls">
                </button>

                <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                    <a href="timetable_edit.php?sem=<?php echo $fsem; ?>&year=<?php echo $fyear; ?>"><i class="zmdi zmdi-edit"></i></a>
                </button>
                <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                    <a href="timetable_delete.php?sem=<?php echo $fsem; ?>&year=<?php echo $fyear; ?>"><i class="zmdi zmdi-delete"></i></a>
                </button>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            </div>
        </div>
        <table class="table table-borderless table-data3" id="<?php echo "sem" . $fsem . "year" . $fyear ?>">
            <thead>
                <tr>
                    <th>Period</th>
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
                $res = mysqli_query($link, "select * from time");
                while ($row = mysqli_fetch_array($res, MYSQLI_BOTH)) {
                ?>
                    <tr>
                        <td><?php echo $row['period']; ?></td>
                        <td><?php echo $row['time_start'] . " to " . $row['time_end']; ?></td>

                        <!--MONDAY START-->
                        <?php
                        $dayres = mysqli_query($link, "select * from timetable where period='" . $row['period'] . "' AND day='MONDAY' AND sem='" . $fsem . "' AND year='" . $fyear . "' ");
                        $data = mysqli_fetch_array($dayres, MYSQLI_BOTH);
                        if ($data['type'] == 'LAB' and $data['subname'] != "") {
                        ?>

                            <td style="background-color:grey; color:#000; vertical-align : middle; ">
                                <?php
                                echo $data['subname'] . " " . $data['type'] . "<br>" . $data['batch'];
                                ?>
                            </td>
                        <?php
                        } else if ($data['subname'] != "") {
                        ?>
                            <td>
                                <?php
                                echo $data['subname'] . " " . $data['type'];
                                ?>
                            </td>

                        <?php
                        } else {
                            echo "<td> </td>";
                        }
                        ?>
                        <!--MONDAY STOP-->

                        <!--TUESDAY START-->
                        <?php
                        $dayres = mysqli_query($link, "select * from timetable where period='" . $row['period'] . "' AND day='TUESDAY' AND sem='" . $fsem . "' AND year='" . $fyear . "' ");
                        $data = mysqli_fetch_array($dayres, MYSQLI_BOTH);
                        if ($data['type'] == 'LAB' and $data['subname'] != "") {
                        ?>

                            <td style="background-color:grey; color:black; vertical-align : middle; ">
                                <?php
                                echo $data['subname'] . " " . $data['type'] . "<br>" . $data['batch'];
                                ?>
                            </td>
                        <?php
                        } else if ($data['subname'] != "") {
                        ?>
                            <td>
                                <?php
                                echo $data['subname'] . " " . $data['type'];
                                ?>
                            </td>

                        <?php
                        } else {
                            echo "<td> </td>";
                        }
                        ?>
                        <!--TUESDAY STOP-->


                        <!--WEDNESDAY START-->
                        <?php
                        $dayres = mysqli_query($link, "select * from timetable where period='" . $row['period'] . "' AND day='WEDNESDAY' AND sem='" . $fsem . "' AND year='" . $fyear . "' ");
                        $data = mysqli_fetch_array($dayres, MYSQLI_BOTH);
                        if ($data['type'] == 'LAB' and $data['subname'] != "") {
                        ?>

                            <td style="background-color:grey; color:black; vertical-align : middle; ">
                                <?php
                                echo $data['subname'] . " " . $data['type'] . "<br>" . $data['batch'];
                                ?>
                            </td>
                        <?php
                        } else if ($data['subname'] != "") {
                        ?>
                            <td>
                                <?php
                                echo $data['subname'] . " " . $data['type'];
                                ?>
                            </td>

                        <?php
                        } else {
                            echo "<td> </td>";
                        }
                        ?>
                        <!--WEDNESDAY STOP-->


                        <!--THURSDAY START-->
                        <?php
                        $dayres = mysqli_query($link, "select * from timetable where period='" . $row['period'] . "' AND day='THUSDAY' AND sem='" . $fsem . "' AND year='" . $fyear . "' ");
                        $data = mysqli_fetch_array($dayres, MYSQLI_BOTH);
                        if ($data['type'] == 'LAB' and $data['subname'] != "") {
                        ?>

                            <td style="background-color:grey; color:black; vertical-align : middle; ">
                                <?php
                                echo $data['subname'] . " " . $data['type'] . "<br>" . $data['batch'];
                                ?>
                            </td>
                        <?php
                        } else if ($data['subname'] != "") {
                        ?>
                            <td>
                                <?php
                                echo $data['subname'] . " " . $data['type'];
                                ?>
                            </td>

                        <?php
                        } else {
                            echo "<td> </td>";
                        }
                        ?>
                        <!--THURSDAY STOP-->


                        <!--FRIDAY START-->
                        <?php
                        $dayres = mysqli_query($link, "select * from timetable where period='" . $row['period'] . "' AND day='FRIDAY' AND sem='" . $fsem . "' AND year='" . $fyear . "' ");
                        $data = mysqli_fetch_array($dayres, MYSQLI_BOTH);
                        if ($data['type'] == 'LAB' and $data['subname'] != "") {
                        ?>

                            <td style="background-color:grey; color:black; vertical-align : middle; ">
                                <?php
                                echo $data['subname'] . " " . $data['type'] . "<br>" . $data['batch'];
                                ?>
                            </td>
                        <?php
                        } else if ($data['subname'] != "") {
                        ?>
                            <td>
                                <?php
                                echo $data['subname'] . " " . $data['type'];
                                ?>
                            </td>

                        <?php
                        } else {
                            echo "<td> </td>";
                        }
                        ?>
                        <!--FRIDAY STOP-->

                        
                        <!--SATDAY START-->
                        <?php
                        $dayres = mysqli_query($link, "select * from timetable where period='" . $row['period'] . "' AND day='SATDAY' AND sem='" . $fsem . "' AND year='" . $fyear . "' ");
                        $data = mysqli_fetch_array($dayres, MYSQLI_BOTH);
                        if ($data['type'] == 'LAB' and $data['subname'] != "") {
                        ?>

                            <td style="background-color:grey; color:black; vertical-align : middle;">
                                <?php
                                echo $data['subname'] . " " . $data['type'] . "<br>" . $data['batch'];
                                ?>
                            </td>
                        <?php
                        } else if ($data['subname'] != "") {
                        ?>
                            <td>
                                <?php
                                echo $data['subname'] . " " . $data['type'];
                                ?>
                            </td>

                        <?php
                        } else {
                            echo "<td> </td>";
                        }
                        ?>
                        <!--SATDAY STOP-->
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- END DATA TABLE-->
<?php
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
    <title>Time Table</title>

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
    </style>
    <script>
        function exportTableToExcel(tableID, filename = '') {
            var downloadLink;
            var dataType = 'application/vnd.ms-excel';
            var tableSelect = document.getElementById(tableID);
            var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

            // Specify file name
            filename = filename ? filename + '.xls' : 'excel_data.xls';

            // Create download link element
            downloadLink = document.createElement("a");

            document.body.appendChild(downloadLink);

            if (navigator.msSaveOrOpenBlob) {
                var blob = new Blob(['\ufeff', tableHTML], {
                    type: dataType
                });
                navigator.msSaveOrOpenBlob(blob, filename);
            } else {
                // Create a link to the file
                downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

                // Setting the file name
                downloadLink.download = filename;

                //triggering the function
                downloadLink.click();
            }
        }
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
                                <h3 class="title-5 m-b-35"><b>Time-tables</b></h3>
                            </center>
                            <div class="table-data__tool">
                                <div class="table-data__tool-left">
                                    <form action="" method="post">
                                        <div class="rs-select2--light rs-select2--md">
                                            <select class="js-select2" name="year" required>
                                                <option selected="Year">Year</option>
                                                <?php
                                                $fetchyear = mysqli_query($link, "select * from year");
                                                while ($row = mysqli_fetch_array($fetchyear, MYSQLI_BOTH)) {
                                                ?>
                                                    <option value="<?php echo $row['year']; ?>"><?php echo $row['year']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--light rs-select2--sm">
                                            <select class="js-select2" name="sem" required>
                                                <option value="Sem">Sem</option>
                                                <?php
                                                $fetchsem = mysqli_query($link, "select * from sem");
                                                while ($rowe = mysqli_fetch_array($fetchsem, MYSQLI_BOTH)) {
                                                ?>
                                                    <option value="<?php echo $rowe['sem']; ?>"><?php echo $rowe['sem']; ?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <button class="au-btn-filter" name="filter">
                                            <i class="zmdi zmdi-filter-list"></i>filters</button>
                                    </form>
                                </div>
                                <div class="table-data__tool-right">
                                    <a href="./timetable_insert.php">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>add timetable</button>
                                    </a>
                                </div>
                            </div>

                            <div class="row m-t-30">
                                <div class="col-md-12">
                                    <?php
                                    if (isset($_POST['filter'])) {

                                        if ($_POST['year'] != 'Year'  && $_POST['sem'] != 'Sem') {

                                            $s = $_POST['sem'];
                                            $y = $_POST['year'];
                                            $ttres = mysqli_query($link, "select * from timetable where sem='$s' AND year='$y' AND dname='$dname' group by sem,year order by ttid desc");
                                            while ($ttrow = mysqli_fetch_array($ttres, MYSQLI_BOTH)) {

                                                printtable($ttrow['sem'], $ttrow['year']);
                                            }
                                        } else if ($_POST['year'] != 'Year') {
                                            $y = $_POST['year'];
                                            $fetch = mysqli_query($link, "select * from timetable where year='$y' AND dname='$dname' group by sem,year");

                                            if (mysqli_num_rows($fetch)) {
                                                while ($row = mysqli_fetch_array($fetch, MYSQLI_BOTH)) {
                                                    printtable($row['sem'], $row['year']);
                                                }
                                            }
                                        } else if ($_POST['sem'] != 'Sem') {
                                            $s = $_POST['sem'];
                                            $fetch = mysqli_query($link, "select * from timetable where sem='$s' AND dname='$dname' group by sem,year");

                                            if (mysqli_num_rows($fetch)) {
                                                while ($row = mysqli_fetch_array($fetch, MYSQLI_BOTH)) {
                                                    printtable($row['sem'], $row['year']);
                                                }
                                            }
                                        } else {
                                            $ttres = mysqli_query($link, "select * from timetable where dname='$dname' group by sem,year order by ttid desc");
                                            while ($ttrow = mysqli_fetch_array($ttres, MYSQLI_BOTH)) {

                                                printtable($ttrow['sem'], $ttrow['year']);
                                            }
                                        }

                                        // $fetch = mysqli_query($link, "select * from timetable where sem='$s' AND year='$y' AND dname='$dname' group by sem,year");

                                        // if (mysqli_num_rows($fetch)) {
                                        //     while ($row = mysqli_fetch_array($fetch, MYSQLI_BOTH)) {
                                        //         printtable($row['sem'], $row['year']);
                                        //     }
                                        // }
                                    } else {

                                        $ttres = mysqli_query($link, "select * from timetable where dname='$dname' group by sem,year order by ttid desc");
                                        while ($ttrow = mysqli_fetch_array($ttres, MYSQLI_BOTH)) {

                                            printtable($ttrow['sem'], $ttrow['year']);
                                        }
                                    }
                                    ?>
                                    <?php

                                    // if (isset($_POST['filteron'])) {
                                    // } else {

                                    // }

                                    ?>
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