<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title">Danh sách người dùng</h3>
		
	</div>
	<div class="card-body">
		<div class="container-fluid">
        <div class="container-fluid">
			<table class="table table-bordered table-stripped">
				<colgroup>
					<col width="5%">
					<col width="15%">
					<col width="20%">
					<col width="35%">
					<col width="10%">
					<col width="15%">
				</colgroup>
				<thead>
					<tr>
						<th>#</th>
						<th>Ngày tạo</th>
						<th>Họ tên</th>
						<th>Địa chỉ</th>
						<th>Giới tính</th>
						<th>Số điện thoại</th>
						<th>Email</th>
						<th>Trạng thái</th>
					
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
						$qry = $conn->query("SELECT * from `clients` order by unix_timestamp(date_created) desc ");
						while($row = $qry->fetch_assoc()):
                            $row['default_delivery_address'] = strip_tags(stripslashes(html_entity_decode($row['default_delivery_address'])));
                            
					?>
						<tr>
							<td class="text-center"><?php echo $i++; ?></td>
							<td><?php echo date("Y-m-d H:i",strtotime($row['date_created'])) ?></td>
							<td><?php echo $row['firstname']." ".$row['lastname'] ?></td>
							<td ><p class="truncate-1 m-0"><?php echo $row['default_delivery_address'] ?></p></td>
							<td ><?php echo $row['gender'] ?></td>
							<td ><?php echo $row['contact'] ?></td>
							<td ><?php echo $row['email'] ?></td>
							<td class="text-center">
                                <?php if($row['status'] == 1): ?>
                                    <span class="badge badge-success delete_data"  data-id="<?php echo $row['id'] ?>">Hoạt động</span>
                                <?php else: ?>
                                    <span class="badge badge-danger delete_data"  data-id="<?php echo $row['id'] ?>">Đã khóa</span>
                                <?php endif; ?>
                            </td>
							

						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('.delete_data').click(function(){
			_conf("Bạn có muốn khóa tài khoản này?","changeStatus",[$(this).attr('data-id')])
		})
		$('.table').dataTable();
	})
	function changeStatus($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=change_status",
			method:"POST",
			data:{id: $id},
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("An error occured.",'error');
				end_loader();
			},
			success:function(resp){
				if(typeof resp== 'object' && resp.status == 'success'){
					location.reload();
				}else{
					alert_toast("An error occured.",'error');
					end_loader();
				}
			}
		})
	}
</script>