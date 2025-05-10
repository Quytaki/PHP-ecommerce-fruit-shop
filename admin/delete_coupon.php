<?php
include_once("class/adminback.php");
$obj = new adminback();

if (!isset($_GET['id'])) {
    header("Location: manage_coupon.php");
    exit();
}

$cupon_id = intval($_GET['id']);

if (isset($_POST['confirm_delete'])) {
    $obj->delete_coupon($cupon_id);
    header("Location: manage_coupon.php");
    exit();
}
?>

<h2>Xóa mã giảm giá</h2>
<p>Bạn có chắc chắn muốn xóa mã giảm giá này không?</p>
<form method="post">
    <button type="submit" name="confirm_delete">Xóa</button>
    <a href="manage_coupon.php">Hủy</a>
</form>
