<?php
session_start();
include_once("admin/class/adminback.php");
$obj = new adminback();

$cata_info = $obj->p_display_catagory();
$cataDatas = array();
while ($data = mysqli_fetch_assoc($cata_info)) {
    $cataDatas[] = $data;
}

if (isset($_POST['addtocart'])) {

    if (isset($_SESSION['cart'])) {
        $pdt_names =  array_column($_SESSION['cart'], "pdt_name");
        if (in_array($_POST['pdt_name'], $pdt_names)) {
            echo "
            <script>
                alert('Sản phẩm này đã có trong giỏ hàng')
            </script>
        ";
        } else {
            $count = count($_SESSION['cart']);
            $_SESSION['cart'][$count] = array(
                'pdt_name' => $_POST['pdt_name'],
                'pdt_price' => $_POST['pdt_price'],
                'pdt_img' => $_POST['pdt_img'],
                'pdt_id' => $_POST['pdt_id'],
                'quantity'=>1
            );
           
        }
    } else {
        $_SESSION['cart'][0] = array(
            'pdt_name' => $_POST['pdt_name'],
            'pdt_price' => $_POST['pdt_price'],
            'pdt_img' => $_POST['pdt_img'],
            'pdt_id' => $_POST['pdt_id'],
            'quantity'=>1
        );
    }
}
if(isset($_POST['remove_product'])){
    foreach($_SESSION['cart'] as $key => $value){
        if($value['pdt_name']==$_POST['remove_pdt_name']){
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart']= array_values($_SESSION['cart']);
        }
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

            <br>
            <!-- Product -->
            <div class="container ">

                <!--Cart Table-->
                <div class="shopping-cart-container">
                    <div class="row">
                        <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                            <h3 class="box-title">Giỏ hàng của bạn</h3>
                            <form class="shopping-cart-form" action="#" method="post">
                                <table class="shop_table cart-form">
                                    <thead>
                                        <tr>
                                            <th class="product-name">Tên sản phẩm</th>
                                            <th class="product-price">Giá (₫)</th>
                                            <th class="product-quantity">Xóa</th>
                                            <!-- <th class="product-subtotal">Tổng (₫)</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php if(isset($_SESSION['cart'])){
                                        
                                        $subtotal=0;
                                        $total_product = 0;
                                        foreach($_SESSION['cart'] as $key=> $value){ 
                                            $subtotal = $subtotal+$value['pdt_price'];
                                            $total_product++;
                                            ?>
                                        <tr class="cart_item">
                                            <td class="product-thumbnail" data-title="Tên sản phẩm">
                                                <a class="prd-thumb" href="single_product.php?status=singleproduct&&id=<?php echo $value['pdt_id'] ?>">
                                                    <figure><img width="113" height="113" src="admin/uploads/<?php echo $value['pdt_img'] ?>" alt="giỏ hàng"></figure>
                                                </a>
                                                <a class="prd-name" href="single_product.php?status=singleproduct&&id=<?php echo $value['pdt_id'] ?>"><?php echo $value['pdt_name'] ?></a>
                                            
                                            </td>
                                            <td class="product-price" data-title="Giá">
                                                <div class="price price-contain">
                                                    <ins><span class="price-amount"><span class="currencySymbol"></span><?php echo $value['pdt_price'] ?></span></ins>
                                                    
                                                </div>
                                            </td>
                                            <td class="product-quantity" data-title="Số lượng">
                                                <form action="" method="POST">

                                                <input type="hidden" value="<?php echo $value['pdt_name'] ?>" name="remove_pdt_name">
                                                    <input class="btn btn-warning" type="submit" value="Xóa sản phẩm" name="remove_product">
                                                </form>
                                            </td>
                                            <!-- <td class="product-subtotal" data-title="Total">
                                                <div class="price price-contain">
                                                    <ins><span class="price-amount"><span class="currencySymbol"></span><?php echo $value['pdt_price'] ?></span></ins>
                                                   
                                                </div>
                                            </td> -->
                                        </tr>

                                        <?php }}else{
                                            echo "Giỏ hàng của bạn đang trống";
                                        }?>

                                     
                                    </tbody>
                                </table>
                            </form>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                            <div class="shpcart-subtotal-block">
                                <div class="subtotal-line ">
                                    <b class="stt-name">Tổng phụ <span class="sub">(<?php echo  $total_product.' sản phẩm' ?>)</span></b>
                                    <span class="stt-price">₫ <?php echo $subtotal; ?></span>
                                </div>
                                <!-- <div class="subtotal-line">
                                    <b class="stt-name">Phí vận chuyển</b>
                                    <span class="stt-price">₫ 0.00</span>
                                </div>
                                <div class="tax-fee">
                                    <p class="title">Thuế & Phí ước tính</p>
                                    <p class="desc">Dựa trên 56789</p>
                                </div> -->
                                <div class="btn-checkout">
                                    <a href="userprofile.php" class="btn checkout">Thanh toán</a>
                                </div>
                              
                                <p class="pickup-info"><b>Nhận hàng miễn phí</b> có sẵn ngay hôm nay. Thêm thông tin về giao hàng và nhận hàng</p>
                            </div>
                        </div>
                    </div>
                </div>





            </div>

            <br>
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