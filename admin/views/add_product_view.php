<?php 
    $cata_info = $obj-> p_display_catagory();

    if(isset($_POST['add_pdt'])){
        $rtn_msg = $obj->add_product($_POST);
    }
?>

<h2>Thêm sản phẩm</h2>
<h6 class="text-success">
   <?php 
     if(isset($rtn_msg)){
         echo $rtn_msg;
     }
   ?>

</h6>
<form action="" method="post" enctype="multipart/form-data" class="form">
    <div class="form-group">
        <label for="pdt_name">Tên sản phẩm</label>
        <input type="text" name="pdt_name" class="form-control">
    </div>

    <div class="form-group">
        <label for="pdt_price">Giá sản phẩm</label>
        <input type="text" name="pdt_price" class="form-control">
    </div>

    <div class="form-group">
        <label for="pdt_des">Mô tả sản phẩm</label>
        <textarea name="pdt_des" cols="30" rows="10" class="form-control"></textarea>
    </div>

    <div class="form-group">
        <label for="pdt_img">Tồn kho</label>
        <input type="number" name="pdt_stock" class="form-control" max='30' min='1'>
    </div>


    <div class="form-group">
        <label for="pdt_ctg">Danh mục sản phẩm</label>
        <select name="pdt_ctg" class="form-control">
        <option value="">Chọn một danh mục</option>

        <?php while($cata = mysqli_fetch_assoc($cata_info)){ ?>
        <option value="<?php echo $cata['ctg_id'] ?>"><?php echo $cata['ctg_name'] ?></option>

        <?php }?>
        </select>
    </div>

    <div class="form-group">
        <label for="pdt_img">Hình ảnh sản phẩm</label>
        <input type="file" name="pdt_img" class="form-control">
    </div>

    <div class="form-group">
        <label for="pdt_status">Trạng thái</label>
        <select name="pdt_status" class="form-control">
            <option value="1">Đã xuất bản</option>
            <option value="0">Chưa xuất bản</option>
        </select>
    </div>



    <input type="submit" value="Thêm sản phẩm" name="add_pdt" class="btn btn-block btn-primary">
</form>