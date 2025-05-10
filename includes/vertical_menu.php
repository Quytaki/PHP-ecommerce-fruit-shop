<?php 
include_once("admin/class/adminback.php");
$obj = new adminback();
$catagories = $obj->p_display_catagory();
$ctgDatas = array();
while($data = mysqli_fetch_assoc($catagories)){
    $ctgDatas[]=$data;
}

$pdt_info = $obj->view_all_product();
$pdt_datas = array();
if ($pdt_info && mysqli_num_rows($pdt_info) > 0) {
    while($pdt_ftecth = mysqli_fetch_assoc($pdt_info)){
        $pdt_datas[] = $pdt_ftecth;
    }
}
?>

<div class="vertical-menu vertical-category-block">
    <div class="block-title">
        <span class="menu-icon">
            <span class="line-1"></span>
            <span class="line-2"></span>
            <span class="line-3"></span>
        </span>
        <span class="menu-title">Danh mục sản phẩm</span>
        <span class="angle" data-tgleclass="fa fa-caret-down"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
    </div>
    <div class="wrap-menu">
        <ul class="menu clone-main-menu">
            <?php foreach($ctgDatas as $ctgData){ ?>
            <li class="menu-item menu-item-has-children has-megamenu">
                <a href="catagory.php?status=catView&&id=<?php echo $ctgData['ctg_id'] ?>" class="menu-name" data-title="<?php echo $ctgData['ctg_name'] ?>"><i
                        class="biolife-icon icon-fruits"></i><?php echo $ctgData['ctg_name'] ?></a>
                <div class="wrap-megamenu">
                    <div class="mega-content">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12 xs-margin-bottom-25 md-margin-bottom-0">
                                <div class="wrap-custom-menu vertical-menu">
                                    <h4 class="menu-title">Sản phẩm liên quan</h4>
                                    <ul class="menu">
                                        <?php 
                                        foreach($pdt_datas as $pdt_data){
                                            if($pdt_data['ctg_id'] == $ctgData['ctg_id']) {
                                        ?>
                                        <li><a href="single_product.php?status=singleproduct&&id=<?php echo $pdt_data['pdt_id'] ?>"><?php echo $pdt_data['pdt_name'] ?></a></li>
                                        <?php 
                                            }
                                        }  
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <?php } ?>
        </ul>
    </div>
</div>