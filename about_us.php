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
                        <h2>Về chúng tôi</h2>
                        <p>
                            Bán Qủa là cửa hàng thương mại điện tử chuyên cung cấp các loại trái cây tươi ngon, an toàn và chất lượng đến tận tay khách hàng. Chúng tôi cam kết mang đến trải nghiệm mua sắm trực tuyến tiện lợi, nhanh chóng và đáng tin cậy.
                        </p>
                        <p>
                            Đội ngũ Bán Qủa luôn lựa chọn kỹ lưỡng từng sản phẩm, đảm bảo nguồn gốc rõ ràng và giá cả hợp lý. Chúng tôi không ngừng cải tiến dịch vụ để đáp ứng tốt nhất nhu cầu của khách hàng.
                        </p>
                        <p>
                            Cảm ơn bạn đã tin tưởng và lựa chọn Bán Qủa!
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
