<?php 
    include_once("class/adminback.php");
    $obj = new adminback();
    $views = "manage_coupon";
    // Nếu vẫn muốn xóa trực tiếp thì giữ đoạn này, nếu không thì bỏ đi
    if (isset($_GET['delete_coupon'])) {
        $delete_id = intval($_GET['delete_coupon']);
        $obj->delete_coupon($delete_id);
        header("Location: manage_coupon.php");
        exit();
    }
    include ("template.php");
?>