<?php 

    $catagories = $obj-> display_catagory();

    if(isset($_GET['status'])){
        $get_id = $_GET['id'];
        if($_GET['status']=="published"){
            $obj->catagory_published($get_id);
        }elseif($_GET['status']=="unpublished"){
            $obj->catagory_unpublished($get_id);
        }elseif($_GET['status']=="delete"){
            $obj->delete_catagory($get_id);
        }
    }
   
    

?>
<div >
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên danh mục</th>
                <th>Mô tả danh mục</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>

        <tbody>
           <?php while($ctg = mysqli_fetch_assoc($catagories)){ ?>
            <tr>
                <td><?php echo $ctg['ctg_id'] ?></td>
                <td><?php echo $ctg['ctg_name'] ?></td>
                <td><?php echo $ctg['ctg_des'] ?></td>
                <td>
                    <?php 
                    if($ctg['ctg_status']==0)
                    {echo "Chưa xuất bản";
                    
                         ?> 
                         <a href="?status=published&&id=<?php echo $ctg['ctg_id'] ?>" class="btn btn-sm btn-success">Xuất bản</a>
                        <?php
                    } 
                    else{echo "Đã xuất bản";
                    
                    ?>
                     <a href="?status=unpublished&&id=<?php echo $ctg['ctg_id'] ?>" class="btn btn-sm btn-warning">Hủy xuất bản</a>
                        <?php 
                    }  
                    
                    ?>
                
                </td>
                <td>
                    <a href="edit_cata.php?status=edit&&id=<?php echo $ctg['ctg_id'] ?>" class="btn btn-sm btn-warning">Sửa</a>
                    <a href="?status=delete&&id=<?php echo $ctg['ctg_id'] ?>" class="btn btn-sm btn-danger">Xóa</a>
                </td>
               
            </tr>
            <?php 
                }
            ?>
           
        </tbody>
    </table>
</div>
