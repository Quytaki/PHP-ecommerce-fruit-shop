<?php
include_once("class/adminback.php");
$obj = new adminback();

if (!isset($_GET['id'])) {
    header("Location: manage_coupon.php");
    exit();
}

$cupon_id = intval($_GET['id']);
$conn = $obj->get_connection();
$result = mysqli_query($conn, "SELECT * FROM cupon WHERE cupon_id = $cupon_id");
$coupon = mysqli_fetch_assoc($result);

if (!$coupon) {
    echo "Không tìm thấy mã giảm giá.";
    exit();
}

$update_msg = '';
if (isset($_POST['update_coupon'])) {
    $code = mysqli_real_escape_string($conn, $_POST['cupon_code']);
    $desc = mysqli_real_escape_string($conn, $_POST['description']);
    $discount = intval($_POST['discount']);
    $status = intval($_POST['status']);
    $sql = "UPDATE cupon SET cupon_code='$code', description='$desc', discount=$discount, status=$status WHERE cupon_id=$cupon_id";
    if (mysqli_query($conn, $sql)) {
        $update_msg = '<div class="alert alert-success mt-2">Cập nhật thành công!</div>';
    } else {
        $update_msg = '<div class="alert alert-danger mt-2">Có lỗi xảy ra khi cập nhật!</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa mã giảm giá</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body { background: linear-gradient(135deg, #e0ffe9 0%, #f8f9fa 100%); min-height: 100vh; }
        .edit-coupon-container {
            max-width: 480px;
            margin: 60px auto;
            padding: 0 10px;
        }
        .card {
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(40,167,69,0.10), 0 1.5px 6px rgba(0,0,0,0.04);
            border: none;
            background: #fff;
        }
        .card-header {
            background: linear-gradient(90deg, #28a745 60%, #43e97b 100%);
            color: #fff;
            border-radius: 18px 18px 0 0;
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            letter-spacing: 1px;
            padding: 24px 0 16px 0;
        }
        .form-label {
            font-weight: 600;
            color: #28a745;
        }
        .form-control:focus, .form-select:focus {
            border-color: #28a745;
            box-shadow: 0 0 0 0.1rem rgba(40,167,69,.15);
        }
        .btn-success {
            min-width: 120px;
            font-weight: 600;
            background: linear-gradient(90deg, #28a745 60%, #43e97b 100%);
            border: none;
            transition: background 0.2s;
        }
        .btn-success:hover {
            background: linear-gradient(90deg, #43e97b 60%, #28a745 100%);
        }
        .btn-secondary {
            min-width: 90px;
            font-weight: 500;
        }
        .icon-title {
            font-size: 2.2rem;
            margin-bottom: 8px;
            color: #fff;
            text-shadow: 0 2px 8px rgba(40,167,69,0.15);
        }
        .alert {
            font-size: 1rem;
            padding: 10px 16px;
        }
    </style>
</head>
<body>
<div class="edit-coupon-container">
    <div class="card">
        <div class="card-header">
            <div class="icon-title"><i class="fa-solid fa-ticket"></i></div>
            Sửa mã giảm giá
        </div>
        <div class="card-body p-4">
            <?php echo $update_msg; ?>
            <form method="post" autocomplete="off">
                <div class="mb-3">
                    <label class="form-label"><i class="fa fa-barcode"></i> Mã giảm giá</label>
                    <input type="text" name="cupon_code" class="form-control" value="<?php echo htmlspecialchars($coupon['cupon_code']); ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label"><i class="fa fa-info-circle"></i> Mô tả</label>
                    <input type="text" name="description" class="form-control" value="<?php echo htmlspecialchars($coupon['description']); ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label"><i class="fa fa-percent"></i> Giảm giá (%)</label>
                    <input type="number" name="discount" class="form-control" value="<?php echo $coupon['discount']; ?>" min="1" max="100" required>
                </div>
                <div class="mb-3">
                    <label class="form-label"><i class="fa fa-toggle-on"></i> Trạng thái</label>
                    <select name="status" class="form-select">
                        <option value="1" <?php if($coupon['status']==1) echo "selected"; ?>>Kích hoạt</option>
                        <option value="0" <?php if($coupon['status']==0) echo "selected"; ?>>Ẩn</option>
                    </select>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <button type="submit" name="update_coupon" class="btn btn-success">
                        <i class="fa fa-save"></i> Cập nhật
                    </button>
                    <a href="manage_coupon.php" class="btn btn-secondary">
                        <i class="fa fa-arrow-left"></i> Quay lại
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
