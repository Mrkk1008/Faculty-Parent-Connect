<?php
$dept = $_SESSION['dname'];
$result = mysqli_query($link, "Select * from faculty where dname='$dept' AND pname='H.O.D.' and email='".$_SESSION['email']."'");
$row = mysqli_fetch_array($result, MYSQLI_BOTH);
$photo = $row['photo'];
?>

<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">
                <form class="form-header" action="" method="POST">
                    <!--<input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />-->
                    <!--<button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>                                </button>-->
                </form>
                <div class="header-button">
                    <div class="noti-wrap">
                    </div>
                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                <img src="../faculty_photos/<?php echo $photo; ?>" /> </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#"><?php echo $_SESSION['fname'] . " " . $_SESSION['lname']; ?></a> </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        <a href="#">
                                            <img src="../faculty_photos/<?php echo $photo; ?>" /> </a>
                                        s</div>
                                    <div class="content">
                                        <h5 class="name"> </h5>
                                            <!-- <a href="#"></a> </h5> -->
                                        <span>> <?php echo $_SESSION['email']; ?></span><br>
                                        <span>> H.O.D.</span><br> 
                                        <span>> <?php echo $_SESSION['dname']; ?></span>
                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="changepass.php">
                                            <i class="fa fa-key"></i>Change Password
                                        </a>
                                    </div>
                                </div>
                                <div class="account-dropdown__footer">
                                    <a href="logout.php">
                                        <i class="zmdi zmdi-power"></i>Logout
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>