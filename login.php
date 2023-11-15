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
            <h3 class="text-center">Đăng nhập</h3>
            <hr>
            <form action="" id="login-form">
                <div class="form-group">
                    <label for="" class="control-label">Email</label>
                    <input type="email" class="form-control form" name="email" required>
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Mật khẩu</label>
                    <input type="password" class="form-control form" name="password" required>
                </div>
                <div class="form-group d-flex justify-content-between">
                    <p>Chưa có tài khoản <a href="javascript:void()" id="create_account"
                            class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">đăng
                            ký</a></p>
                    <p> <a href="javascript:void()" id="forgot_password"
                            class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Quên
                            mật khẩu</a></p>

                    <button class="btn btn-flat rounded-1" style="background-color: #F5DEA8">Đăng
                        nhập</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
$(function() {
    $('#create_account').click(function() {
        uni_modal("", "registration.php", "mid-large")
    })
    $('#forgot_password').click(function() {
        uni_modal("", "forgotPassword.php", "mid-large")
    })
    $('#login-form').submit(function(e) {
        e.preventDefault();
        start_loader()
        if ($('.err-msg').length > 0)
            $('.err-msg').remove();
        $.ajax({
            url: _base_url_ + "classes/Login.php?f=login_user",
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
                    alert_toast("Đăng nhập thành công", 'success')
                    setTimeout(function() {
                        location.reload()
                    }, 2000)
                } else if (resp.status == 'incorrect') {
                    var _err_el = $('<div>')
                    _err_el.addClass("alert alert-danger err-msg").text(
                        "Thông tin xác thực không chính xác.")
                    $('#login-form').prepend(_err_el)
                    end_loader()

                } else if (resp.status == 'block') {
                    alert_toast("Tài khoản của bạn đã bị khóa", 'error')
                    end_loader()

                } else {
                    console.log(resp)
                    alert_toast("an error occured", 'error')
                    end_loader()
                }
            }
        })
    })
})
</script>