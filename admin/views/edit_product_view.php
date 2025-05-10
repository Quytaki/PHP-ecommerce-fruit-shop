<?php 

ini_set("display_erros", "Off");
    $obj=new adminback();
    $cata_info = $obj-> p_display_catagory();
    if(isset($_GET['prostatus'])){
        $id = $_GET['id'];
        if($_GET['prostatus']=='edit'){
           $pdt_info= $obj->edit_product($id);
           $pdt = mysqli_fetch_assoc($pdt_info);

        }
    }

    if(isset($_POST['update_pdt'])){
        $update_msg = $obj->update_product($_POST); 
    }


?>
<h4>Cập nhật sản phẩm</h4>

<?php 
    if(isset($update_msg)){
        echo $update_msg;
    }
?>
<form action="" method="post" enctype="multipart/form-data" class="form">
    <div class="form-group">
        <label for="pdt_name">Tên sản phẩm</label>
        <input type="text" name="u_pdt_name" class="form-control" value="<?php echo $pdt['pdt_name'] ?>" >
    </div>

    <input type="hidden" name="pdt_id" value="<?php echo $pdt['pdt_id'] ?>">
    <div class="form-group">
        <label for="pdt_price">Giá sản phẩm</label>
        <input type="text" name="u_pdt_price" class="form-control" value="<?php echo $pdt['pdt_price'] ?>">
    </div>

    <div class="form-group">
        <label for="pdt_des">Mô tả sản phẩm</label>
        <textarea name="u_pdt_des" cols="30" rows="10" class="form-control" ><?php echo $pdt['pdt_des']?> </textarea>
    </div>

    <div class="form-group">
        <label for="pdt_stock">Tồn kho</label>
        <input type="number" name="pdt_stock" class="form-control" max='30' min='1' value="<?php echo $pdt['product_stock']?>">
    </div>


    <div class="form-group">
        <label for="pdt_ctg">Danh mục sản phẩm</label>
        <select name="u_pdt_ctg" class="form-control">
        <option value="">Chọn một danh mục</option>

        <?php while($cata = mysqli_fetch_assoc($cata_info)){ ?>
        <option value="<?php echo $cata['ctg_id'] ?>"  ><?php echo $cata['ctg_name'] ?></option>

        <?php }?>
        </select>
    </div>

   

    <div class="form-group">
        <label for="pdt_img">Hình ảnh sản phẩm</label>
        <div class="mb-3">
        <img src="uploads/<?php echo $pdt['pdt_img']?>" style="width: 80px;" >
    </div>
        <input type="file" name="u_pdt_img" class="form-control">
    </div>

    <div class="form-group">
        <label for="pdt_status">Trạng thái</label>
        <select name="u_pdt_status" class="form-control">
            <option value="1" <?php if($pdt['pdt_status']==1){ echo "selected";} ?> >Đã xuất bản</option>
            <option value="0" <?php if($pdt['pdt_status']==0){echo "selected";} ?> >Chưa xuất bản</option>
        </select>
    </div>

    <input type="submit" value="Cập nhật sản phẩm" name="update_pdt" class="btn btn-block btn-primary">
</form>