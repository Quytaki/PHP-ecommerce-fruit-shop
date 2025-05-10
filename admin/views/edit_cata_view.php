<?php 
    if(isset($_GET['status'])){
        if($_GET['status']=='edit'){
            $id = $_GET['id'];
           $cata = $obj->display_cataByID($id);
        }
    }

    if(isset($_POST['update_ctg'])){
        $up_msg = $obj->updata_catagory($_POST);
    }
?>


<h2>Cập nhật danh mục</h2>

<h6 class="">
    <?php if(isset($up_msg)){ echo $up_msg;} ?>
</h6>

</h4>
<form action="" method="post">


    <div class="form-group">
        <label for="u_ctg_name">Tên danh mục</label>
        <input type="text" name="u_ctg_name" class="form-control" value="<?php echo $cata['ctg_name'] ?>">
    </div>

    <div class="form-group">
        <label for="u_ctg_des">Mô tả danh mục</label>
        <input type="text" name="u_ctg_des" class="form-control"  value="<?php echo $cata['ctg_des'] ?>">
    </div>

    <div class="form-group">
        <label for="u_ctg_status">Tên danh mục</label>
        <select name="u_ctg_status" class="form-control">
            <option value="1">Đã xuất bản</option>
            <option value="0">Chưa xuất bản</option>
        </select>
    </div>

    <input type="hidden" name="u_ctg_id" value="<?php echo $cata['ctg_id'] ?>" >

    <input type="submit" value="Cập nhật danh mục" name="update_ctg" class="btn btn-primary" >

</form>