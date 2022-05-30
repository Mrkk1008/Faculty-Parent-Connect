<?php
session_start();
include("cn.php");
include("common.php");
checklogin();
$dname = $_SESSION['dname'];
$asem = $_SESSION['asem'];
$ayear = $_SESSION['ayear'];
?>
<?php

$gsem = $_POST['gsem'];
$gyear = $_POST['gyear'];

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
    </style>

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
                    <div class="row">
                        <div class="col-md-12">

                            <center>
                                <h3 class="title-5 m-b-35"><b>Midresult Report</b></h3>
                            </center>

                            <div class="table-data__tool-left">
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small" name="attgen" onclick="exportTableToExcel('tblData')">
                                    <i class="fa fa-download"></i> Download xls file</button></a>
                            </div>
                        </div>

                    </div>
                    <div>
                        <strong>
                            <?php echo "Sem: " . $gsem . "  Year: " . $gyear; ?>
                        </strong>
                    </div>

                    <div class="table-responsive m-b-40">
                        <table class="table table-borderless table-data3" id="tblData">
                            <thead>
                                <tr>
                                    <th>Enrollment</th>
                                    <th>Name</th>
                                    <?php
                                    $ressub = mysqli_query($link, "select * from subject where sem=$asem");
                                    while ($rowsub = mysqli_fetch_array($ressub, MYSQLI_BOTH)) {
                                    ?>
                                        <th><?php echo $rowsub['shortname']; ?></th>
                                    <?php
                                    }
                                    ?>
                                    <th>No. of Subject Fail</th>
                                </tr>

                            </thead>
                            <tbody>

                                <?php
                                $c = 0;
                                $resstu = mysqli_query($link, "select * from student where sem='" . $asem . "' AND status='ACTIVE' AND dept='$dname' ORDER By erno");
                                while ($rowstu = mysqli_fetch_array($resstu, MYSQLI_BOTH)) {
                                    $c++;
                                ?>
                                    <tr>
                                        <td><?php
                                            echo $rowstu['erno'];
                                            ?></td>

                                        <td><?php
                                            echo $rowstu['fname'] . " " . $rowstu['lname'];
                                            ?></td>

                                        <!-- Subject Starts -->
                                        <?php
                                        $ressub = mysqli_query($link, "select * from subject where sem=$asem");
                                        while ($rowsub = mysqli_fetch_array($ressub, MYSQLI_BOTH)) {

                                            $resmark =  mysqli_query($link, "select * from midresult where sem='$gsem' AND year='$gyear' AND subcode='" . $rowsub['subcode'] . "' AND erno='" . $rowstu['erno'] . "'");
                                            $rowmark = mysqli_fetch_array($resmark, MYSQLI_BOTH);
                                            $marks = $rowmark['marks'];
                                            if ($marks < 12) {
                                                echo "<td style=background:grey>" . $rowmark['marks'] . "</td>";
                                            } else {
                                                echo "<td>" . $rowmark['marks'] . "</td>";
                                            }
                                        }

                                        $restotal =  mysqli_query($link, "select count(marks) as 'total' from midresult where sem='$gsem' AND year='$gyear' AND marks<12 AND erno='" . $rowstu['erno'] . "'");
                                        $rowtotal = mysqli_fetch_array($restotal, MYSQLI_BOTH);
                                        if ($rowtotal >= 1) {
                                            echo "<td style=background:grey>" . $rowtotal['total'] . "</td>";
                                        }else{
                                        echo "<td>" . $rowtotal['total'] . "</td>";
                                        }
                                        
                                        ?>
                                        <!-- Subject Ends -->
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- start Footer area-->
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

</body>

</html>
<!-- end document-->