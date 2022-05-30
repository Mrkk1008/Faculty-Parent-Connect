<?php
session_start();
include("cn.php");
include("common.php");
checklogin();
?>
<?php
$res = mysqli_query($link, "Select * from department");
$num = mysqli_num_rows($res);
$n = 0;
?>
<?php
$res1 = mysqli_query($link, "Select post_name from post");
$num = mysqli_num_rows($res1);
$s = 0;
?>
<?php

$results_per_page = 3;

$result = mysqli_query($link, "SELECT * FROM faculty");
$number_of_results = mysqli_num_rows($result);

$number_of_pages = ceil($number_of_results / $results_per_page);

if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}

$this_page_first_result = ($page - 1) * $results_per_page;
$result = mysqli_query($link, "SELECT * FROM faculty LIMIT " . $this_page_first_result . ',' . $results_per_page);
?>
<?php
$dept = "";
$year = "";
if (isset($_POST['filter'])) {
    $dept = $_POST['dept'];
    $post = $_POST['post'];
    if ($dept == 'Department' and $post == 'post') {
        $result = mysqli_query($link, "Select * from faculty");
    } else if ($dept != 'Department' and $post == 'post') {
        $result = mysqli_query($link, "Select * from faculty where dname='$dept'");
    } else if ($dept == 'Department' and $post != 'post') {
        $result = mysqli_query($link, "Select * from faculty where pname='$post'");
    } else {
        $result = mysqli_query($link, "Select * from faculty where pname='$post' AND dname='$dept'");
    }
    $num = mysqli_num_rows($result);
    $n = 0;
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

        background-color: white;
    }

    .page_numbers a:hover {
        background-color: #4272d7;
        color: white;
        ;
    }

    .greendot {
        height: 22px;
        width: 22px;
        background-color: #51ff0d;
        border-radius: 50%;
        display: inline-block;
    }

    .greydot {
        height: 22px;
        width: 22px;
        background-color: grey;
        border-radius: 50%;
        display: inline-block;
    }
    </style>
    <script src="./js/jquery.min.js"></script>
    <script type="text/javascript">
    function change(aid, ast) {
        var id = aid;
        var st = ast;
        $.ajax({
            type: 'POST',
            url: 'faculty_change_status.php',
            data: 'id=' + id + '&st=' + st,

            success: function(html) {
                $('#f' + id).html(html);
            }
        });
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
                                <h3 class="title-5 m-b-35"><b>Faculty table</b></h3>
                            </center>
                            <div class="table-data__tool">
                                <div class="table-data__tool-left">
                                    <form action="#" method="post">
                                        <div class="rs-select2--light rs-select2--md">
                                            <select class="js-select2" name="dept">
                                                <option selected="selected">Department</option>
                                                <?php while ($row = mysqli_fetch_array($res, MYSQLI_BOTH)) {

                                                ?>
                                                <option value="<?php echo $row['dname']; ?>">
                                                    <?php echo $row['dname']; ?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--light rs-select2--sm">
                                            <select class="js-select2" name="post">
                                                <option value="post">post</option>
                                                <option value="H.O.D.">H.O.D.</option>
                                                <option value="Lecturer">Lecturer</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <button class="au-btn-filter" name="filter">
                                            <i class="zmdi zmdi-filter-list"></i>filters</button>
                                    </form>
                                </div>
                                <div class="table-data__tool-right">
                                    <a href="faculty_insert.php">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>add faculty</button></a>

                                </div>
                            </div>
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>Faculty Photo</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Department</th>
                                            <th>POST</th>
                                            <th>Mobile</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php while ($row = @mysqli_fetch_array(@$result, MYSQLI_BOTH)) {

                                        ?>
                                        <tr class="tr-shadow" enctype="multipart/form-data">
                                            <td><a
                                                    href="photoupdate.php?phid=<?php echo $row['fid'] ?>&for=<?php echo "faculty"; ?>"><img
                                                        class="image"
                                                        src="../faculty_photos/<?php echo $row['photo']; ?>"></a></td>
                                            <td><?php echo $row['fname'] . " " . $row['lname']; ?></td>
                                            <td>
                                                <a href="mailto:<?php echo $row['email'];  ?>" target="_blank">
                                                    <span class="block-email"><?php echo $row['email'];  ?></span>
                                                </a>
                                            </td>
                                            <td class="desc"><?php echo $row['dname']; ?></td>
                                            <td><?php echo $row['pname'];  ?></td>
                                            <td><span><?php echo $row['mobile']; ?></span></td>
                                            <td id="f<?php echo $row['fid']; ?>">

                                                <?php
                                                    if ($row['status'] == 'ACTIVE') {
                                                    ?>
                                                <button id="<?php echo $row['fid']; ?>"
                                                    onClick="change('<?php echo $row['fid']; ?>','ACTIVE')"><?php if ($row['status'] == 'ACTIVE') {
                                                                                                                                                            echo "<i class='greendot'></i>";
                                                                                                                                                        } ?></button>
                                                <?php
                                                    } else if ($row['status'] == 'INACTIVE') {
                                                    ?>
                                                <button id="<?php echo $row['fid']; ?>"
                                                    onClick="change('<?php echo $row['fid']; ?>','INACTIVE')"><?php if ($row['status'] == 'INACTIVE') {
                                                                                                                                                                echo "<i class='greydot'></i>";
                                                                                                                                                            } ?></button>
                                                <?php
                                                    }
                                                    ?>
                                            </td>
                                            <td>
                                                <div class="table-data-feature">
                                                    <button class="item" data-toggle="tooltip" data-placement="top"
                                                        title="Edit">
                                                        <a href="faculty_edit.php?fid=<?php echo $row['fid'] ?>"><i
                                                                class="zmdi zmdi-edit"></i></a>
                                                    </button>
                                                    <button class="item" data-toggle="tooltip" data-placement="top"
                                                        title="Delete">
                                                        <a href="faculty_delete.php?fid=<?php echo $row['fid'] ?>"><i
                                                                class="zmdi zmdi-delete"></i></a>
                                                    </button>
                                                    <button class="item" data-toggle="tooltip" data-placement="top"
                                                        title="View" data-original-title="More"
                                                        aria-describedby="tooltip181541">
                                                        <a href="faculty_display.php?fid=<?php echo $row['fid'] ?>"><i
                                                                class="zmdi zmdi-more"></i></a>
                                                    </button>
                                                </div>
                                            </td>
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
                                                    <div class="page_numbers"
                                                        <?php 
                                                        if (isset($_POST['filter'])) {
                                                            echo " style='display: none;'";
                                                        } else if (isset($_POST['search'])) {
                                                            echo " style='display: none;'";
                                                        } ?>>

                                                        <?php
                                                        for ($pagex = 1; $pagex <= $number_of_pages; $pagex++) {
                                                            if ($page == $pagex) {
                                                                echo '<a style="background-color: #4272d7; color:white;" href="faculty.php?page=' . $pagex . '">' . '  ' . $pagex . '  ' . '</a> ';
                                                            } else {
                                                                echo '<a href="faculty.php?page=' . $pagex . '">' . '  ' . $pagex . '  ' . '</a> ';
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