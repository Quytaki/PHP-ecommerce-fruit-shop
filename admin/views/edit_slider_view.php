<?php
if (isset($_GET['status'])) {
    if ($_GET['status'] == "edit") {
        $slide_id = $_GET['id'];
    }
}

$row = $obj->slide_By_id($slide_id);
$slide = mysqli_fetch_assoc($row);

if (isset($_POST['update_slider_btn'])) {
    $slider_msg =  $obj->slider_update($_POST);
}
?>

<h2>Chỉnh sửa Slider</h2>


<h4>
    <?php
    if (isset($slider_msg)) {
        echo $slider_msg;
    }
    ?>
</h4>

<form action="" method="post" enctype="multipart/form-data">


    <h4>Slider số: <?php echo $slide['slider_id'] ?></h4>

    <input type="hidden" value="<?php echo $slide['slider_id'] ?>" name="slider_id">


    <div class="form-group">
        <label for="first_line">Dòng thứ nhất</label>
        <input type="text" name="first_line" class="form-control" value="<?php echo $slide['first_line'] ?>">
    </div>

    <div class="form-group">
        <label for="second_line">Dòng thứ hai</label>
        <input type="text" name="second_line" class="form-control" value="<?php echo $slide['second_line'] ?>">
    </div>

    <div class="form-group">
        <label for="third_line">Dòng thứ ba</label>
        <input type="text" name="third_line" class="form-control" value="<?php echo $slide['third_line'] ?>">
    </div>

    <div class="form-group">
        <label for="btn_left">Nút bên trái</label>
        <input type="text" name="btn_left" class="form-control" value="<?php echo $slide['btn_left'] ?>">
    </div>

    <div class="form-group">
        <label for="btn_right">Nút bên phải</label>
        <input type="text" name="btn_right" class="form-control" value="<?php echo $slide['btn_right'] ?>">
    </div>


    <div class="form-group">
        <label for="slider_img">Hình ảnh Slider <span class="text-warning">(Hình ảnh Slider phải có kích thước: chiều rộng 1920px và chiều cao 550px)</span> </label>
        <input type="file" name="slider_img" class="form-control" required>

       
    </div>





    <input type="submit" value="Cập nhật Slider" name="update_slider_btn" class="btn btn-primary">

</form>