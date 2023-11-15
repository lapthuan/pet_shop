<?php if(isset($_GET['view'])): 
require_once('../../config.php');
endif;?>
<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<?php 
if(!isset($_GET['id'])){
    $_settings->set_flashdata('error','Không có ID đơn hàng nào được cung cấp.');
    redirect('admin/?page=orders');
}
$order = $conn->query("SELECT o.*,concat(c.firstname,' ',c.lastname) as client FROM `orders` o inner join clients c on c.id = o.client_id where o.id = '{$_GET['id']}' ");
$contactQuery = $conn->query("SELECT contact FROM `orders` o inner join clients c on c.id = o.client_id where o.id = '{$_GET['id']}' ") ;
$result = $contactQuery->fetch_assoc(); 
$contact = $result['contact'];

if($order->num_rows > 0){
    foreach($order->fetch_assoc() as $k => $v){
        $$k = $v;
    }
}else{
    $_settings->set_flashdata('error','ID đơn đặt hàng được cung cấp là không xác định');
    redirect('admin/?page=orders');
}
?>
<div class="card card-outline card-primary">
    <div class="card-body">
        <div class="conitaner-fluid">
            <p><b>Tên Khách Hàng: <?php echo $client ?></b></p>
            <p><b>Địa Chỉ Giao Hàng: <?php echo $delivery_address ?></b></p>
            <p><b>Số điện thoại: <?php echo $contact ?></b></p>
            <table class="table-striped table table-bordered">
                <colgroup>
                    <col width="15%">
                    <col width="15%">
                    <col width="30%">
                    <col width="20%">
                    <col width="20%">
                </colgroup>
                <thead>
                    <tr>
                        <th>Số Lượng</th>
                        <th>Đơn Vị</th>
                        <th>Sản Phẩm</th>
                        <th>Giá</th>
                        <th>Tổng Cộng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $olist = $conn->query("SELECT o.*,p.product_name FROM order_list o inner join products p on o.product_id = p.id where o.order_id = '{$id}' ");
                        while($row = $olist->fetch_assoc()):
                    ?>
                    <tr>
                        <td><?php echo $row['quantity'] ?></td>
                        <td><?php echo $row['unit'] ?></td>
                        <td><?php echo $row['product_name'] ." ({$row['size']}) " ?></td>
                        <td class="text-right"><?php echo number_format($row['price']) ?></td>
                        <td class="text-right"><?php echo number_format($row['price'] * $row['quantity']) ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan='4'  class="text-right">Tổng Cộng</th>
                        <th class="text-right"><?php echo number_format($amount) ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="row">
            <div class="col-6">
                <p>Phương Thức Thanh Toán: <span class="badge badge-info"> <?php echo $payment_method == "cod" ? "Thanh toán khi nhận hàng" : "Thanh toán online" ?></span> </p>
                <p>Tình Trạng Thanh Toán: <?php echo $paid == 0 ? '<span class="badge badge-light">Chưa Thanh Toán</span>' : '<span class="badge badge-success">Đã Thanh Toán</span>' ?></p>
            </div>
            <div class="col-6 row row-cols-2">
                <div class="col-3">Tình Trạng Đơn Hàng:</div>
                <div class="col-9">
                <?php 
                    switch($status){
                        case '0':
                            echo '<span class="badge badge-light text-dark">Chờ xác nhận</span>';
	                    break;
                        case '1':
                            echo '<span class="badge badge-primary">Chuẩn bị đơn hàng</span>';
	                    break;
                        case '2':
                            echo '<span class="badge badge-warning">Đang giao hàng</span>';
	                    break;
                        case '3':
                            echo '<span class="badge badge-success">Đã giao hàng</span>';
	                    break;
                        default:
                            echo '<span class="badge badge-danger">Đã hủy</span>';
	                    break;
                    }
                ?>
                </div>
                <?php if(!isset($_GET['view'])): ?>
                <div class="col-3"></div>
                <div class="col">
                    <button type="button" id="update_status" class="btn btn-sm btn-flat btn-primary">Cập Nhật Tình Trạng</button>
                </div>
                <?php endif; ?>
                
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
</div>

<?php if(isset($_GET['view'])): ?>
<style>
    #uni_modal>.modal-dialog>.modal-content>.modal-footer{
        display:none;
    }
</style>
<?php endif; ?>
<script>
    $(function(){
        $('#update_status').click(function(){
            uni_modal("Cập nhật trạng thái", "./orders/update_status.php?oid=<?php echo $id ?>&status=<?php echo $status ?>")
        })
    })
</script>