<?php

session_start();
include_once("admin/class/adminback.php");
$obj = new adminback();

$cata_info = $obj->p_display_catagory();
$cataDatas = array();
while ($data = mysqli_fetch_assoc($cata_info)) {
    $cataDatas[] = $data;
}

if (isset($_POST['user_login_btn'])){
    $logmsg = $obj->user_login($_POST);
}


if(isset($_SESSION['user_id'])){
    $userId = $_SESSION['user_id'];
    if($userId){
        header('location:userprofile.php');
    }
}



?>


<?php
include_once("includes/head.php");
?>

<body class="biolife-body">
    <!-- Preloader -->

    <?php
    include_once("includes/preloader.php");
    ?>

    <!-- HEADER -->
    <header id="header" class="header-area style-01 layout-03">

        <?php
        include_once("includes/header_top.php");
        ?>

        <?php
        include_once("includes/header_middle.php");
        ?>

        <?php
        include_once("includes/header_bottom.php");
        ?>

    </header>

    <!-- Page Contain -->
    <div class="page-contain">

        <!-- Main content -->
        <div id="main-content" class="main-content">


            <div class="container">
                <h2 class="text-center">Đăng nhập</h2>

                <h4 class="text-danger"> <?php 
                    if(isset($logmsg)){
                        echo $logmsg;
                    }
                ?></h4>
                <div class="row">

               

                    <!--Form Sign In-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="signin-container">
                            <form action="" name="frm-login" method="post">
                                <p class="form-row">
                                    <label for="email">Email</label>
                                    <input type="email" id="fid-name" name="user_email" class="txt-input">
                                </p>
                                <p class="form-row">
                                    <label for="user_password">Mật khẩu:</label>
                                    <input type="password" name="user_password" class="txt-input">
                                </p>
                                <p class="wrap-btn">
                                    <input type="submit" value="Đăng nhập" name="user_login_btn" class="btn btn-success">
                                    <a href="user_password_recover.php" class="link-to-help">Quên mật khẩu</a>
                                </p>
                            </form>
                        </div>
                    </div>

                    <!--Go to Register form-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="register-in-container">
                            <div class="intro">
                                <h4 class="box-title">Khách hàng mới?</h4>
                                <p class="sub-title">Tạo tài khoản với chúng tôi và bạn có thể:</p>
                                <ul class="lis">
                                    <li>Thanh toán nhanh hơn</li>
                                    <li>Lưu nhiều địa chỉ giao hàng</li>
                                    <li>Truy cập lịch sử đơn hàng</li>
                                    <li>Theo dõi đơn hàng mới</li>
                                    <li>Lưu sản phẩm vào danh sách yêu thích</li>
                                </ul>
                                <a href="user_register.php" class="btn btn-bold">Tạo tài khoản</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>






        </div>
    </div>

    <!-- FOOTER -->

    <?php
    include_once("includes/footer.php");
    ?>

    <!--Footer For Mobile-->
    <?php
    include_once("includes/mobile_footer.php");
    ?>

    <?php
    include_once("includes/mobile_global.php")
    ?>


    <!-- Scroll Top Button -->
    <a class="btn-scroll-top"><i class="biolife-icon icon-left-arrow"></i></a>

    <?php
    include_once("includes/script.php")
    ?>
</body>

</html>