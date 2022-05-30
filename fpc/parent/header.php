<?php
$erno = $_SESSION['erno'];
$result = mysqli_query($link, "Select * from parent where erno='$erno'");
$row = mysqli_fetch_array($result, MYSQLI_BOTH);
$fphoto = $row['fphoto'];
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
                                            <img src="../parent_photos/<?php echo $fphoto; ?>" />                                        </div>
                                        <div class="content">
                                            <?php echo $_SESSION['fathername'];?>                                       </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          </header>