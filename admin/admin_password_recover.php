<?php 
    include("class/adminback.php");
    $obj= new adminback();

    if(isset($_POST['admin_btn'])){
        $obj->admin_login($_POST);
    }
    session_start();
    if(isset($_SESSION['admin_id'])){
        header("location:dashboard.php");
    }

    if (isset($_POST['admin_recover'])) {
        $recover_email = $_POST['recover_email'];
        $rec_row = $obj->admin_password_recover($recover_email);
    
        $num_row = mysqli_num_rows($rec_row);
        $rec_msg = "";
    
        if ($num_row > 0) {
            $rec_result = mysqli_fetch_assoc($rec_row);
            $rec_id = $rec_result['admin_id'];
           
            $rec_email = $rec_result['admin_email'];
            $rec_pass = $rec_result['admin_pass'];
    
            $to_email = $rec_email;
            $subject = "Khôi phục mật khẩu từ Bán Qủa";
            $body = "Kính gửi,".PHP_EOL."Vui lòng truy cập vào đường dẫn sau để đặt lại mật khẩu của bạn: https://localhost/projects/Fruits_bazar_ecommerce_project/admin/admin_password_update.php?status=update&&id={$rec_id}".PHP_EOL."Xin cảm ơn";
            $headers = "From: graphicsapon@gmail.com";
    
            if (mail($to_email, $subject, $body, $headers)) {
                $rec_msg= "Email đã được gửi thành công đến $to_email...";
               
            } else {
                $rec_msg = "Gửi email không thành công...";
            }
    
    
        } else {
            $rec_msg = "Xin lỗi !!! bạn không có tài khoản";
        }
    }
?>

<?php 
    include ("includes/head.php")
?>

  <body>

  <section class="login p-fixed d-flex text-center bg-primary common-img-bg">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    <div class="login-card card-block auth-body mr-auto ml-auto">
                        <form action="" method="post" class="md-float-material">
                            <div class="text-center">
                              
                            </div>
                            <div class="auth-box">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-left txt-primary">Khôi phục mật khẩu</h3>

                                        <p style="color: Black;">
                                            <?php 
                                                if(isset($rec_msg)){
                                                    echo $rec_msg;
                                                }
                                            ?>
                                        </p>
                                    </div>
                                </div>
                                <hr/> <br>
                                <div class="input-group">
                                    <input type="email" class="form-control" placeholder="Địa chỉ Email của bạn" name="recover_email" required>
                                    <span class="md-line"></span>
                                </div>

                               
                                
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <input type="submit" name="admin_recover" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" value="Khôi phục mật khẩu">
                                    </div>
                                </div>

                                <div class="row m-t-10">
                                    <div class="col-md-12">
                                        <a href="index.php" class="btn btn-success btn-md waves-effect text-center m-b-20">Đi đến Đăng nhập</a>
                                       
                                    </div>
                                </div>
                                <hr/>
                     

                            </div>
                        </form>
                        <!-- end of form -->
                    </div>
                    <!-- Authentication card end -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>
	

  

<?php 
    include ("includes/script.php")
?>

