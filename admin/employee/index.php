<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title">Danh sách nhân viên</h3>
		<div class="card-tools">
			<a href="?page=employee/manage_employee" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Create New</a>
		</div>
	</div>
	<div class="card-body">
		<div class="container-fluid">
        <div class="container-fluid">
			<table class="table table-bordered table-stripped">
				<colgroup>
					<col width="5%">
					<col width="15%">
					<col width="20%">
					<col width="20%">
					<col width="10%">
					<col width="15%">
				</colgroup>
				<thead>
					<tr>
						<th>#</th>
						<th>AVT</th>
						<th>Họ tên</th>
						<th>Tên tài khoản</th>
						<th>Quyền</th>
						<th>Ngày tạo</th>
						<th>Hành động</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
						$qry = $conn->query("SELECT * from `users` order by unix_timestamp(date_added) desc ");
						while($row = $qry->fetch_assoc()):
                           
                            
					?>
						<tr>
							<td class="text-center"><?php echo $i++; ?></td>
							<td><img style="width: 50px; height: 50px ;border-radius: 25px;" src="<?php  echo validate_image($row['avatar'])?>" alt="AVT"></td>
							<td><?php echo $row['firstname']." ".$row['lastname'] ?></td>
							<td ><?php echo $row['username'] ?></td>
							<td class="text-center">
                                <?php if($row['type'] == 1): ?>
                                    <span class="badge badge-success changeType"  data-id="<?php echo $row['id'] ?>">Admin</span>
                                <?php else: ?>
                                    <span class="badge badge-primary changeType"  data-id="<?php echo $row['id'] ?>">Nhân viên</span>
                                <?php endif; ?>
                            </td>
							
							<td><?php echo date("Y-m-d H:i",strtotime($row['date_added'])) ?></td>
							<td align="center">
								 <button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
				                  		Hành Động
				                    <span class="sr-only">Mở Rộng</span>
				                  </button>
				                  <div class="dropdown-menu" role="menu">
				                    <a class="dropdown-item" href="?page=employee/manage_employee&id=<?php echo $row['id'] ?>"><span class="fa fa-edit text-primary"></span> Chỉnh Sửa</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item delete_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-trash text-danger"></span> Xóa</a>
				                  </div>
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
		$('.changeType').click(function(){
			_conf("Bạn có chắc thay đổi quyền?","changeType",[$(this).attr('data-id')])
		})
		$('.table').dataTable();
	})
	$(document).ready(function(){
		$('.delete_data').click(function(){
			_conf("Bạn có chắc chắn xóa danh mục này vĩnh viễn?","delete_users",[$(this).attr('data-id')])
		})
		$('.table').dataTable();
	})
	function delete_users($id){
		start_loader();
		$.ajax({
			url: _base_url_ + 'classes/Users.php?f=delete',
			method:"POST",
			data:{id: $id},
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("An error occured.",'error');
				end_loader();
			},
			success:function(resp){
				if (resp == 1) {
					alert_toast("Xóa thành công.",'success');
					end_loader();
					location.reload();
           		 }else{
					alert_toast("An error occured.",'error');
					end_loader();
				}
			}
		})
	}
	function changeType($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=change_type",
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