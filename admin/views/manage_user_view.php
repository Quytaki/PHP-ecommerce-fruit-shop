<?php 
    $arry = $obj->show_admin_user();
   
  if(isset($_GET['status'])){
      $admin_id = $_GET['id'];
      if($_GET['status']=='delete'){
            $del_msg = $obj->delete_admin($admin_id);
      }
  }

?>

<div class="container">
    <h2>Quản lý người dùng</h2>

    <h4 class="text-success">
        <?php 
            if(isset($del_msg )){
                echo $del_msg;
            }
        ?>
    </h4>

    <table class="table table-bordered">
        <thead>

       
            <tr>
                <th>ID Người Dùng</th>
                <th>Email Người Dùng</th>
                <th>Vai Trò</th>
                <th>Hành Động</th>
            </tr>
        </thead>

        <tbody>
        <?php 
            while($user = mysqli_fetch_assoc($arry)){
        ?>
            <tr>
                <td> <?php echo $user['admin_id'] ?> </td>
                <td> <?php echo $user['admin_email'] ?> </td>
               
                <td> <?php if($user['role']==1){
                    echo "Quản trị viên";
                }else{
                    echo "Điều hành viên";
                } ?> </td>
            
                <td>  
                    <a href="edit_admin.php?status=userEdit&&id=<?php echo $user['admin_id'] ?>" class="btn btn-sm btn-warning">Sửa </a>
                    <a href="?status=delete&&id=<?php echo $user['admin_id'] ?>" class="btn btn-sm btn-danger">Xóa</a>

                </td>
            </tr>

           

            <?php }?>
        </tbody>
    </table>
</div>