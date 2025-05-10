<h2>Quản lý đơn hàng</h2>

<?php

$catagories = $obj->display_catagory();
$all_order_info = $obj->all_order_info();

$order_infos = array();
while($all_order = mysqli_fetch_assoc($all_order_info)){
    $order_infos[] =$all_order; 
}

if(isset($_POST['update_status_btn'])){
   
   $status_msg =  $obj->updat_order_status($_POST);
}

if(isset( $status_msg)){
    echo  $status_msg ;
}


?>
<div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="product-name">Mã đơn hàng</th>
                <th class="product-price">Sản phẩm</th>
                <th class="product-quantity">Số lượng</th>
                <th class="product-subtotal">Tổng tiền</th>
                <th class="product-subtotal">Sử dụng mã giảm giá</th>
                <th class="product-subtotal">Tên khách hàng</th>
                <th class="product-subtotal">Số điện thoại</th>
                <th class="product-subtotal">Mã giao dịch</th>
                <th class="product-subtotal">Địa chỉ giao hàng</th>
                <th class="product-subtotal">Trạng thái đơn hàng</th>
                <th class="product-subtotal">Cập nhật trạng thái</th>
                <th class="product-subtotal">Thời gian đặt hàng</th>
            </tr>
        </thead>

        <tbody>

        <?php 
                foreach($order_infos as $order_info){
        ?>
        <tr>
                <td class="product-name"><?php echo $order_info['order_id'] ?></td>
                <td class="product-price"><?php echo $order_info['product_name'] ?></td>
                <td class="product-quantity"><?php echo $order_info['pdt_quantity'] ?></td>
                <td class="product-subtotal"><?php echo $order_info['amount'] ?></td>
                <td class="product-subtotal"><?php echo $order_info['uses_coupon'] ?></td>
                <td class="product-subtotal"><?php echo $order_info['customer_name'] ?></td>
                <td class="product-subtotal"><?php echo $order_info['Shipping_mobile'] ?></td>
                <td class="product-subtotal"><?php echo $order_info['trans_id'] ?></td>
                <td class="product-subtotal"><?php echo $order_info['shiping_address'] ?></td>
                <td class="product-subtotal">
                <?php 
                    if($order_info['order_status']==0){
                        echo "<p class='btn btn-danger btn-sm'> Chờ xử lý </p>";
                    } elseif($order_info['order_status']==1){
                        echo "<p class='btn btn-warning btn-sm'> Đang xử lý </p>";
                    } elseif($order_info['order_status']==2){
                        echo "<p class='btn btn-success btn-sm'> Đã giao hàng </p>";
                    }
                ?>
                </td>

                <td class="product-subtotal">
                    <form action="manage_order.php" method="POST">
                        <select name="update_status">
                        <option>Chọn</option>
                            <option value="0">Chờ xử lý</option>
                            <option value="1">Đang xử lý</option>
                            <option value="2">Đã giao hàng</option>
                        </select> <br>
                        <input type="hidden" name="order_id" value="<?php echo $order_info['order_id']  ?>">
                        <input type="submit" value="Cập nhật" name="update_status_btn">
                    </form>

                </td>
                <td class="product-subtotal"><?php echo $order_info['order_time'] ?></td>
            </tr>

                <?php }?>
        </tbody>
    </table>
</div>