<?php 
    if(isset($_GET['status'])){
        $comment_id = $_GET['id'];
        if($_GET['status']=='editcomment'){
            
           $array =  $obj->edit_comment($comment_id);
           $row = mysqli_fetch_assoc($array);

        }
    }

    if(isset($_POST['update_comment'])){
       $update_msg =  $obj->update_comment($_POST);
    }

?>



<form action="#" method="POST">

<h5 class="text-success">
    
<?php 
    if(isset($update_msg)){
        echo $update_msg;
    }
?>
</h5> <br> <br>
    
        <h5>ID Người dùng: <?php echo $row['user_id'] ?> </h5> <br>
        <h5>Tên người dùng: <?php echo $row['user_name'] ?> </h5> <br>
        <h5>ID Sản phẩm: <?php echo $row['pdt_id'] ?> </h5> <br>

        <h5>Bình luận: </h5> <br>
        
   

    <div class="form-group">
        <input type="hidden" name="cmt_id" value="<?php echo $row['id'] ?>">
        <textarea name="u_comment" id="" cols="30" rows="10"><?php echo $row['comment'] ?></textarea>
    </div>

    <div class="form-group">
        <input type="submit" value="Cập nhật bình luận" name="update_comment" class="btn btn-lg btn-primary">
    </div>

    
</form>
