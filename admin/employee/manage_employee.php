<?php
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `users` where id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}
?>
<div class="card card-outline card-primary">
<div class="card-header">
		<h3 class="card-title"><?php echo isset($id) ? "Cập Nhật ": "Tạo Mới " ?> Nhân viên</h3>
	</div>
    <div class="card-body">
        <div class="container-fluid">
            <div id="msg"></div>
            <form action="" id="manage-user">
                
				<input type="hidden" name ="id" value="<?php echo isset($id) ? $id : '' ?>">

                <div class="form-group">
                    <label for="name">Họ</label>
                    <input type="text" name="firstname" id="firstname" class="form-control"
                        value="<?php echo isset($firstname) ? $firstname : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="name">Tên</label>
                    <input type="text" name="lastname" id="lastname" class="form-control"
                        value="<?php echo isset($lastname) ? $lastname : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="username">Tài khoản</label>
                    <input type="text" name="username" id="username" class="form-control"
                        value="<?php echo isset($username) ? $username : ''; ?>" required
                        autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input type="password" name="password" id="password" class="form-control" value=""
                        autocomplete="off">
                    <small><i>Để trống nếu bạn không muốn thay đổi mật khẩu.</i></small>
                </div>
				<div class="form-group">
					<label for="type" class="control-label">Quyền</label>
					<select name="type" id="type" class="custom-select select">
						<option value="1" <?php echo isset($type) && $type ==1 ? 'selected' : '' ?>>Admin</option>
						<option value="0" <?php echo isset($type) && $type == 0 ? 'selected' : '' ?>>Nhân viên</option>
					</select>
				</div>
                <div class="form-group">
                    <label for="" class="control-label">Avatar</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input rounded-circle" id="customFile" name="img"
                            onchange="displayImg(this,$(this))">
                        <label class="custom-file-label" for="customFile">Chọn tập tin</label>
                    </div>
                </div>
                <div class="form-group d-flex justify-content-center">
                    <img src="<?php echo validate_image( isset($avatar) ? $avatar :'') ?>" alt=""
                        id="cimg" class="img-fluid img-thumbnail" style="width: 100px;height: 100px">
                </div>
            </form>
        </div>
    </div>
    <div class="card-footer">   
                <button class="btn btn-flat btn-primary"  form="manage-user">Lưu</button>
				<a class="btn btn-flat btn-default" href="?page=employee">Hủy</a>
    </div>
</div>
<script>
function displayImg(input, _this) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#cimg').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
$('#manage-user').submit(function(e) {
    e.preventDefault();
    start_loader()
    $.ajax({
        url: _base_url_ + 'classes/Users.php?f=csave',
        data: new FormData($(this)[0]),
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST',
        success: function(resp) {
			console.log('resp', resp)
            if (resp == 1) {
				alert_toast("Thêm thành công.",'success');
				end_loader();
            }else if (resp == 2) {
				alert_toast("Cập nhật thành công.",'success');
				end_loader();
            } else if (resp == 4) {
				alert_toast("Tài khoản đã tồn tại.",'warning');
				end_loader();
            } else {
                $('#msg').html('<div class="alert alert-danger">Username already exist</div>')
                end_loader()
            }
        }
    })
})
</script>