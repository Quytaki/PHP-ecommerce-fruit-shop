<?php 
    date_default_timezone_set("Asia/Dhaka");

?>
<style>
    .mydiv{
        width: 200px;
        position: absolute;
        right: 38px;
        overflow: hidden;
    }
</style>
<h2>Bảng điều khiển</h2>


<div class="mydiv">
<form action="" class="form">
    <select name="filterDate" id="filterDate" class="form-control">
        <option value="<?php echo date("Y/m/d")?>" >Hôm nay</option>
        <option value="<?php echo date('Y-m-d', strtotime('-7 days')) ?>" >Tuần này</option>
        <option value="<?php echo date('Y-m-d', strtotime('-30 days')) ?>" >Tháng này</option>
        <option value="<?php echo date('Y-m-d', strtotime('-365 days')) ?>" >Năm nay</option>
        <option value="2020-01-01" >Tất cả thời gian</option>
    </select>
</form>
</div>


<script>
    $(document).ready(function(){
      

        $("#filterDate").change(function(){
            var filterId = this.value;

            $.ajax({
                 url: "json/dashboard_json.php",
                 method: "POST",
                 data: {
                     action: 'load_allorder',
                     did: filterId
                 },
                 success: function(data) {
                     var html = data;
                    
                     $('#totalOrder').text(data);
                 }
             });

             $.ajax({
                 url: "json/dashboard_json.php",
                 method: "POST",
                 data: {
                     action: 'load_allsell',
                     did: filterId
                 },
                 success: function(data) {
                     var html = data;
                    
                     $('#totalSell').text(data);
                 }
             });

             $.ajax({
                 url: "json/dashboard_json.php",
                 method: "POST",
                 data: {
                     action: 'load_allcustomer',
                     did: filterId
                 },
                 success: function(data) {
                     var html = data;
                    
                     $('#totalCustomer').text(data);
                 }
             });

             $.ajax({
                 url: "json/dashboard_json.php",
                 method: "POST",
                 data: {
                     action: 'load_delivered_order',
                     did: filterId
                 },
                 success: function(data) {
                     var html = data;
                    
                     $('#DeliverOrder').text(data);
                 }
             });
             $.ajax({
                 url: "json/dashboard_json.php",
                 method: "POST",
                 data: {
                     action: 'load_processing_order',
                     did: filterId
                 },
                 success: function(data) {
                     var html = data;
                    
                     $('#processingOrder').text(data);
                 }
             });

             $.ajax({
                 url: "json/dashboard_json.php",
                 method: "POST",
                 data: {
                     action: 'load_pending_order',
                     did: filterId
                 },
                 success: function(data) {
                     var html = data;
                    
                     $('#pendingOrder').text(data);
                 }
             });



        })
    })
</script>


<br> <br> <br>
<div class="row">



<!-- order-card start -->

<div class="col-md-6 col-xl-3">
    <div class="card bg-c-blue order-card">
        <div class="card-block">
            <h6 class="m-b-20">Đơn hàng đã nhận</h6>
            <h2 class="text-right"><i class="ti-shopping-cart f-left"></i><span id="totalOrder">0</span></h2>
            <p class="m-b-0"><span class="f-right"></span></p>
        </div>
    </div>
</div>


<div class="col-md-6 col-xl-3">
    <div class="card bg-c-green order-card">
        <div class="card-block">
            <h6 class="m-b-20">Tổng doanh thu</h6>
            <h2 class="text-right"><i class="ti-tag f-left"></i><span id="totalSell">0</span></h2>
            <p class="m-b-0"><span class="f-right"></span></p>
        </div>
    </div>
</div>
<div class="col-md-6 col-xl-3">
    <div class="card bg-c-yellow order-card">
        <div class="card-block">
            <h6 class="m-b-20">Khách hàng hài lòng</h6>
            <h2 class="text-right"><i class="ti-reload f-left"></i><span id="totalCustomer">0</span></h2>
            <p class="m-b-0"><span class="f-right"></span></p>
        </div>
    </div>
</div>
<div class="col-md-6 col-xl-3">
    <div class="card bg-c-pink order-card">
        <div class="card-block">
            <h6 class="m-b-20">Đơn hàng đã giao</h6>
            <h2 class="text-right"><i class="ti-wallet f-left"></i><span id="DeliverOrder">0</span></h2>
            <p class="m-b-0"><span class="f-right"></span></p>
        </div>
    </div>
</div>

<div class="col-md-6 col-xl-3">
    <div class="card bg-c-pink order-card">
        <div class="card-block">
            <h6 class="m-b-20">Đơn hàng đang xử lý</h6>
            <h2 class="text-right"><i class="ti-wallet f-left"></i><span id="processingOrder">0</span></h2>
            <p class="m-b-0"><span class="f-right"></span></p>
        </div>
    </div>
</div>

<div class="col-md-6 col-xl-3">
    <div class="card bg-c-yellow order-card">
        <div class="card-block">
            <h6 class="m-b-20">Đơn hàng chờ xử lý</h6>
            <h2 class="text-right"><i class="ti-reload f-left"></i><span id="pendingOrder">0</span></h2>
            <p class="m-b-0"><span class="f-right"></span></p>
        </div>
    </div>
</div>


<!-- order-card end -->


<!-- users visite and profile start -->

<!-- users visite and profile end -->

</div>
</div>

