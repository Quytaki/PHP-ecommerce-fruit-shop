<?php 
    $show_coupon = $obj->show_coupon();
 
    
?>

<h2>Quản lý mã giảm giá</h2>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Mã giảm giá ID</th>
            <th>Mã giảm giá</th>
            <th>Mô tả mã giảm giá</th>
            <th>Giảm giá</th>
            <th>Thao tác</th>
        </tr>
    </thead>

    <tbody>
            <?php 
               while($result = mysqli_fetch_assoc($show_coupon) ){
            ?>
        <tr>
            <td> <?php echo $result['cupon_id'] ?></td>
            <td> <?php echo $result['cupon_code'] ?></td>
            <td> <?php echo $result['description'] ?></td>
            <td> <?php echo $result['discount'] ?></td>
            <td><a href="">Sửa</a>  <a href="">Xóa</a>  </td>
           
        </tr>

        <?php }?>
    </tbody>
</table>