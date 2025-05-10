<?php 





    if(isset($_POST['add_user'])){
        $add_msg = $obj->add_admin_user($_POST);
    }
?>

<div class="container">
<h2>Thêm Quản trị viên hoặc Điều hành viên</h2>
<br>
<h6 class="text-success">
    <?php 
        if(isset($add_msg)){
            echo $add_msg;
        }
    ?>
</h6>
<form action="" method="POST">
    <div class="form-group">
        <h4>Email Người Dùng</h4>
        <input type="email" name="user_name" class="form-control" required>
    </div>

    <div class="form-group">
        <h4>Mật Khẩu</h4>
        <input type="password" name="user_password" class="form-control" required>
    </div>

    <div class="form-group">
        <h4>Vai Trò</h4>
       <select name="user_role" class="form-control">
           <option disabled selected>--Chọn--</option>
           <option value="1">Quản trị viên</option>
           <option value="2">Điều hành viên</option>
       </select>
    </div>

    <div class="form-group">
        <input type="submit" name="add_user" class="btn btn-primary" value="Thêm người dùng">
    </div>
</form>
</div>