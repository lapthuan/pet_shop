<style>
#uni_modal .modal-content>.modal-footer,
#uni_modal .modal-content>.modal-header {
    display: none;
}
</style>
<div class="container-fluid">
    <div class="row">
        <h3 class="float-right">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </h3>
        <div class="col-lg-12">
            <h3 class="text-center">Tìm lại mật khẩu</h3>
            <hr>
            <form action="" id="forgot-form">
                <div class="form-group">
                    <label for="" class="control-label">Email</label>
                    <input type="email" class="form-control form" name="email" required>
                </div>

                <div class="form-group d-flex justify-content-between">
                    <p>Trở về <a href="javascript:void()" id="login-show"
                            class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">đăng
                            nhập</a></p>

                    <button class="btn btn-flat rounded-1" style="background-color: #F5DEA8">Tìm
                        lại</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<script>
$(function() {
    $('#login-show').click(function() {
        uni_modal("", "login.php")
    })
    $('#forgot-form').submit(function(e) {

        e.preventDefault();
        start_loader()
        if ($('.err-msg').length > 0)
            $('.err-msg').remove();
        $.ajax({
            url: _base_url_ + "classes/Master.php?f=send_email",
            method: "POST",
            data: $(this).serialize(),
            dataType: "json",
            error: err => {
                console.log(err)
                alert_toast("an error occured", 'error')
                end_loader()
            },
            success: function(resp) {
                if (typeof resp == 'object' && resp.status == 'success') {
                    console.log(resp)
                    alert_toast("Kiểm tra email của bạn để lấy mật khẩu", 'success')
                    end_loader()
                } else {
                    console.log(resp)

                    alert_toast("Không gửi được Email", 'error')
                    end_loader()
                }
            }
        })
    })

})

function showPassword() {
    var x = document.getElementById("myInput");
    var y = document.getElementById("myInput-rp");
    if (x.type === "password") {
        x.type = "text";
        y.type = "text";
    } else {
        x.type = "password";
        y.type = "password";
    }
}
</script>