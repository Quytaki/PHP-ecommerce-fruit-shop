<?php
 
session_start();
include_once("admin/class/adminback.php");
$obj = new adminback();

$cata_info = $obj->p_display_catagory();
$cataDatas = array();
while ($data = mysqli_fetch_assoc($cata_info)) {
    $cataDatas[] = $data;
}

// if (isset($_POST['user_login_btn'])) {
//     $logmsg = $obj->user_login($_POST);
// }

$userid = $_SESSION['user_id'];
$username = $_SESSION['username'];

if (empty($userid)) {
    header("location:user_login.php");
}

if(empty($_SESSION['cart'])){
    header("location:exist_order.php");
}

if (isset($_POST['remove_product'])) {
    foreach ($_SESSION['cart'] as $key => $value) {
        if ($value['pdt_name'] == $_POST['remove_pdt_name']) {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
        }
    }
}

if (isset($_GET['logout'])) {
    if ($_GET['logout'] == "logout") {
        $obj->user_logout();
    }
}

if (isset($_POST['confirm_order'])) {
   
    // $obj->place_order($_POST);

    $order_msg = $obj->confirm_order($_POST, $_SESSION['cart']);
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


                <div class="row">
                    <div class="col-md-2">
                        <h4>Xin chào <?php
                                    if (isset($username)) {
                                        echo strtoupper($username);
                                    }
                                    ?></h4>
                        <a href="?logout=logout">Đăng xuất</a>
                    </div>

                    <div class="col-md-7">
                        <h2 class="text-center text-dark">Giỏ hàng của bạn</h2>

                        <?php


                        if (isset($_SESSION['cart'])) {
                            if (count($_SESSION['cart']) > 0) {
                        ?>




                                <table class="shop_table cart-form">
                                    <thead>
                                        <tr>
                                            <th class="product-name">Tên sản phẩm</th>
                                            <th class="product-name">Giá</th>
                                            <th class="product-price">Số lượng</th>
                                            <th class="product-quantity">Xóa</th>
                                            <th class="product-subtotal">Tổng</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                   



                                        <?php
                                      
                                        
                                        if (isset($_SESSION['cart'])) {

                                            $_SESSION['subtotal'] = 0;
                                            $_SESSION['cart_pdt_number'] = 0;
                                            $order_names = '';


                                            foreach ($_SESSION['cart'] as $key => $value) {
                                                $_SESSION['subtotal'] =  $_SESSION['subtotal'] + $value['pdt_price'];
                                                $_SESSION['cart_pdt_number']++;
                                                $order_names = $value['pdt_name'] . "<br> " . $order_names;
                                                


                                        ?>
                                                <tr class="cart_item">
                                                    <td class="product-thumbnail" data-title="Tên sản phẩm">
                                                        <a class="prd-thumb" href="single_product.php?status=singleproduct&&id=<?php echo $value['pdt_id'] ?>">
                                                            <figure><img width="113" height="113" src="admin/uploads/<?php echo $value['pdt_img'] ?>" alt="giỏ hàng"></figure>
                                                        </a>
                                                        <a class="prd-name" href="single_product.php?status=singleproduct&&id=<?php echo $value['pdt_id'] ?>"><?php echo $value['pdt_name'] ?></a>

                                                    </td>



                                                    <td class="product-subtotal" data-title="Tổng">
                                                        <div class="price price-contain">
                                                            <ins><span class="price-amount"><?php echo $value['pdt_price'] ?>
                                                                    <input type="hidden" class="pdt_price" value="<?php echo $value['pdt_price'] ?>">
                                                                </span></ins>

                                                        </div>
                                                    </td>

          

                                                
                                                    <td class="product-quantity" data-title="Số lượng">
                                                        <form action="" method="POST">


                                                            <input class="btn btn-warning" type="submit" value="Xóa" name="remove_product">
                                                            <input type="hidden" value="<?php echo $value['pdt_name'] ?>" name="remove_pdt_name">
                                                        </form>
                                                    </td>

                     <form class="shopping-cart-form" action="#" method="POST">

                                                    <td class="product-price" data-title="Giá">
                                                        <?php $count=1; ?>
                                                        <div class="">
                                                            <input type="number" value="1" name="quantity" class="quantity" style="width: 65px;" id="quantity" min="1" max="10" onchange="subtotal(), totalOfAll()">

                                                        </div>
                                                    </td>


                                                    <td class="product-subtotal" data-title="Tổng">
                                                        <div class="price price-contain">
                                                            <ins><span class="price-amount subtotal"> <?php echo $value['pdt_price'] ?> </span></ins>

                                                        </div>
                                                    </td>
                                                </tr>





                                        <?php }
                                        } else {
                                            echo "Giỏ hàng của bạn đang trống";
                                        } ?>


                                      
                                   
                                        

                                        <!-- <tr class="cart_item wrap-buttons">
                                            <td>
                                                <h3 style="color: black;">Thanh toán</h3>
                                            </td>

                                            <form class="shopping-cart-form" action="#" method="POST">

                                                <td colspan="3">
                                                    <input type="text" style="border: none; width:100%;" placeholder="Nhập mã giao dịch bKash" name="txid" required>
                                                </td>

                                        </tr> -->

                                        <!-- <tr class="cart_item wrap-buttons">
                                            <td>

                                                <h3 style="color: black;">Địa chỉ giao hàng</h3>
                                            </td>
                                            <td colspan="3">


                                                <input type="text" style="border: none; width:100%" placeholder="Nhập dịch vụ chuyển phát và địa điểm" name="shiping" required>
                                            </td>

                                        </tr> -->




                                    </tbody>
                                </table>



                               

                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?>">
                                <input type="hidden" name="product_name" value="<?php echo $order_names ?>">
                                <input type="hidden" name="product_item" value="<?php echo $_SESSION['cart_pdt_number'] ?>">
                                <input type="hidden" name="amount" value="<?php echo $_SESSION['subtotal'] ?>">
                                <input type="hidden" name="order_status" value="0">
                                <input type="hidden" id="afterdiscount_input" name="afterdiscount" value="<?php echo $_SESSION['subtotal']; ?>">
                               



                             
                                

                        <?php
                            } else {
                                echo "Giỏ hàng của bạn đang trống";
                            }
                        }
                        ?>

                    </div>

                    <div class="col-md-3">
                        <div class="shpcart-subtotal-block">
                            <div class="subtotal-line">
                                <b class="stt-name">Tổng <span class="sub">(<?php echo   $_SESSION['cart_pdt_number'] ?> Sản phẩm)</span></b>
                                <span class="stt-price" id="totalOfall"> <?php echo $_SESSION['subtotal']  ?> </span>


                            </div>

                            <div class="subtotal-line ">
                                <p class="stt-name" style="font-weight: normal;">Sử dụng mã giảm giá (fruitsbazar)</p>
                                <br>
                                <input type="text" name="coupon" id="cupon" class="form-control" style="width:40%; padding:5px; display:inline">

                                <span class="stt-price" style="font-weight: normal;" id="discount">0</span>
                            </div>

                            <hr style="border-top:1px solid #313030">

                            <div class="subtotal-line">
                                <b class="stt-name" style="font-weight: normal;">Tổng</b>
                                <span class="stt-price" style="font-weight: normal;" id="afterdiscount"></span>
                            </div>

                            <div style="margin-top: 25px;">
                            <b class="stt-name">Thanh toán <span class="sub"></span></b> 
                                <input type="text" style="border: none; width:100%;" placeholder="Nhập mã giao dịch bKash" name="txid" required>

                            </div>

                            <div style="margin-top: 25px;">
                            <b class="stt-name">Số điện thoại <span class="sub"></span></b>  <br>
                                <input type="text" name="shipping_Mobile" class="form-control" value="<?php echo $_SESSION['mobile'] ?>" required>
                            </div>

                            <div style="margin-top: 25px;">
                            <b class="stt-name">Địa chỉ giao hàng <span class="sub"></span></b>  <br>
                               <textarea name="shiping" class="form-control" id="" required> <?php echo $_SESSION['address'] ?> </textarea>
                            </div>


                            <div class="subtotal-line">
                                <b class="stt-name"></b>
                                <span class="stt-price" id="priceWithVat"></span>
                            </div>
                

                            
                                <div class="btn-checkout">

                                    <input type="submit" class="btn btn-success btn-block btn-lg " value="Xác nhận đặt hàng" name="confirm_order">

                                </div>

            </form>

                            <p class="pickup-info"><b>Nhận hàng miễn phí</b> có sẵn ngay hôm nay. Thêm thông tin về giao hàng và nhận hàng</p>
                        </div>
                    </div>
                </div>


            </div>






        </div>
    </div>
    <br>


    <script>
        var item_price = document.getElementsByClassName("pdt_price");
        var item_quantity = document.getElementsByClassName("quantity");
        var item_total = document.getElementsByClassName("subtotal");

        function subtotal() {
            for (let i = 0; i < item_price.length; i++) {
                item_total[i].innerText = item_price[i].value * item_quantity[i].value;



            }
        }

        var totalAll = document.getElementById("totalOfall");

        function totalOfAll() {
            let total = 0;
            for (let i = 0; i < item_total.length; i++) {
                total += parseInt(item_total[i].innerText);
            }
            totalAll.innerText = total;


        }

        $(document).ready(function() {
            
            
            var cupon_code = $("#cupon");

            var discount = $("#discount");
            var total_price = parseInt($("#totalOfall").text());

                $("#afterdiscount").text(total_price);
              
           
            $(cupon_code).on("keyup keydown keypress blur", function() {


                // alert (cupon_code.val());

                $.ajax({
                    url: "json/coupon.php",
                    method: "POST",
                    data: {
                        action: 'load_discount',
                        cupon: cupon_code.val(),
                        price: total_price
                    },
                    success: function(data) {

                        var html = Math.round(data);
                        discount.text(html);
                        updateAfterDiscount();
                    }
                })

              
                    $("#afterdiscount").text(total_price - parseInt(discount.text()));
                


            });

            $("#quantity").change(function(){
                updateAfterDiscount();
            });

            function updateAfterDiscount() {
                var total_price = parseInt($("#totalOfall").text());
                var discount_val = parseInt($("#discount").text()) || 0;
                var after = total_price - discount_val;
                $("#afterdiscount").text(after);
                $("#afterdiscount_input").val(after);
            }

        })
    </script>
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