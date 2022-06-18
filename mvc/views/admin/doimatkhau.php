<div class="container dmk-container">
    <input type="hidden" name="" id="iduser" value="<?php echo $_SESSION['iduser']?>">
    <form>
        <h3 class="text-center dmk-title mb-3">ĐỔI MẬT KHẨU</h3>
        <div class="container text-start p-4 border border-secondary">
            <div class="mk-input-group mb-4">
                <label for="matkhaucu" class="form-label">Mật Khẩu Cũ</label>
                <input type="password" class="form-control" placeholder="Nhập mật khẩu cũ" value="" id="matkhaucu">
            </div>
            <div class="mk-input-group mb-4">
                <label for="matkhaumoi" class="form-label">Mật Khẩu Mới</label>
                <input type="password" class="form-control" id="matkhaumoi" placeholder="Nhập mật khẩu mới" value="">
            </div>
            <div class="mk-input-group">
                <label for="nhaplaimatkhau" class="form-label">Nhập Lại Mật Khẩu Mới</label>
                <input type="password" class="form-control" id="nhaplaimatkhau" placeholder="Nhập lại mật khẩu mới" value="">
                <div class="text-center mt-2"><a href="" class="text-dark" data-bs-toggle="modal" data-bs-target="#myModal">Quên mật khẩu?</a></div>
            </div>
        </div>

        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <a href="#" class="backmodel"><i data-bs-dismiss="modal" class="fa-solid fa-arrow-left"></i></a>
                    <div class="form-label haeder-modal">
                        <p class="headermodal"> Đặt lại mật khẩu</p>
                        <input type="email" class="form-control" id="email" placeholder="Nhập email">
                        <br>
                        <a class="btn btn-success" id="re_pass">Gửi mã</a>
                        <br>
                        <input type="text" class="form-control" id="token" placeholder="Mã">
                        <div class="sentcode">
                            <button type="button" class="btn bg-primary sentcode1" onclick="sentcode()">TIẾP THEO</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mk-button-group mt-3">
            <button class="btn btn-outline-primary" type="button" onclick="checkPassword()">Thay Đổi</button>
            <a class="btn btn-outline-primary" href="index.php?controller=chome&action=admin">Huỷ</a>
        </div>
    </form>
</div>

<script>
    var iduser = $('#iduser').val()

    function checkPassword() {
        var oldPassword = $('#matkhaucu').val()
        var newPassword = $('#matkhaumoi').val()
        var reEnterPassword = $('#nhaplaimatkhau').val()
        if (oldPassword === '' || newPassword === '' || reEnterPassword === '') {
            alert("Vui lòng không bỏ trống thông tin!")
        } else if (newPassword !== reEnterPassword) {
            alert("Mật khẩu mới và nhập lại mật khẩu mới không trùng nhau!")
        } else if (oldPassword === newPassword) {
            alert("Mật khẩu cũ và mật khẩu mới trùng nhau!")
        } else {
            $.post("index.php?controller=cuser&action=checkPassword", {
                iduser: iduser,
                oldPassword: oldPassword
            }, function(data) {
                if (data == 1) {
                    updatePassword()
                } else {
                    alert("Mật khẩu cũ không chính xác!")
                }

            })
        }
    }

    function updatePassword() {
        var newPassword = $('#matkhaumoi').val()
        $.post("index.php?controller=cuser&action=updatePassword", {
            iduser: iduser,
            newPassword: newPassword
        }, function(data) {
            if(data == 1)
            {
                alert("Đổi mật khẩu thành công!")
                window.location.replace("index.php?controller=chome&action=admin")
            }
            else
            {
                alert("Đổi mật khẩu thất bại!")
            }
        })
    }

    function cancel() {
        location.reload()
    }
</script>