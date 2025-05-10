<?php
session_start();
include_once("admin/class/adminback.php");
$obj = new adminback();

$cata_info = $obj->p_display_catagory();
$cataDatas = array();
while ($data = mysqli_fetch_assoc($cata_info)) {
    $cataDatas[] = $data;
}
?>
<?php include_once("includes/head.php"); ?>
<body class="biolife-body">
    <?php include_once("includes/preloader.php"); ?>
    <header id="header" class="header-area style-01 layout-03">
        <?php include_once("includes/header_top.php"); ?>
        <?php include_once("includes/header_middle.php"); ?>
        <?php include_once("includes/header_bottom.php"); ?>
    </header>
    <div class="page-contain">
        <div id="main-content" class="main-content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Chính sách bảo mật</h2>
                        <p>
                            Fruits Bazar cam kết bảo vệ thông tin cá nhân của khách hàng. Chúng tôi chỉ thu thập các thông tin cần thiết để phục vụ cho việc đặt hàng và giao hàng.
                        </p>
                        <p>
                            Mọi thông tin cá nhân của khách hàng sẽ được bảo mật tuyệt đối, không chia sẻ cho bên thứ ba khi chưa có sự đồng ý của khách hàng, trừ trường hợp theo yêu cầu của pháp luật.
                        </p>
                        <p>
                            Nếu bạn có bất kỳ thắc mắc nào về chính sách bảo mật, vui lòng liên hệ với chúng tôi qua email hoặc số điện thoại trên website.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once("includes/footer.php"); ?>
    <?php include_once("includes/mobile_footer.php"); ?>
    <?php include_once("includes/mobile_global.php"); ?>
    <a class="btn-scroll-top"><i class="biolife-icon icon-left-arrow"></i></a>
    <?php include_once("includes/script.php"); ?>
</body>
</html>
