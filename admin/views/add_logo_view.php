<?php 
    $obj=new adminback();
   $logo_info = $obj->display_logo();

   // if(isset($_GET['prostatus'])){
   //     $id = $_GET['id'];
   //     if($_GET['prostatus']=='published'){
   //         $obj->published_product($id);
   //     }elseif($_GET['prostatus']=='unpublished'){
   //         $obj->unpublished_product($id);
   //     }elseif($_GET['prostatus']=="delete"){
   //      $del_msg = $obj->delete_product($id);
   //  }
   // }
?>
<h2>Thêm logo</h2> 

<table class="table">
    <thead>
        <tr>
            <th>ID Logo</th>
           
         
            <th>Logo</th>
         
            <th>Thao tác</th>
        </tr>
    </thead>

    <tbody>
<?php 
    if(isset($del_msg)){
        echo "{$del_msg}";
    }

?>
    <?php while($logo = mysqli_fetch_assoc( $logo_info)) {

        ?>
        <tr>
  
            <td> <?php echo $logo['id']; ?></td>
          
            <td>  <img style="height:60px" src="uploads/<?php echo $logo['img']; ?>" alt=""> </td>
            
           
            <td>    <a href="edit_logo.php?status=edit&&id=<?php echo $logo['id']; ?>" class="btn btn-sm btn-warning">Sửa</a></td>

        </tr>
        <?php }?>
    </tbody>
</table>