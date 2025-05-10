<?php
session_start();
include_once("../admin/class/adminback.php");
$obj = new adminback();

if ($_POST['action'] == 'load_discount') {
    $cupon_code = $_POST['cupon'];
    $price = intval($_POST['price']);
    $discount = 0;

    $cupon_info = $obj->get_coupon_by_code($cupon_code);
    if ($cupon_info && $cupon_info['status'] == 1) {
        $discount = round($price * $cupon_info['discount'] / 100);
    }
    echo $discount;
}
?>