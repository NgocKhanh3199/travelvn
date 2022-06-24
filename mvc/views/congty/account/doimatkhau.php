<div class="container dmk-container">
    <form class="needs-validation" novalidate>
        <h3 class="text-center dmk-title">ĐỔI MẬT KHẨU</h3>
        <div class="mk-input-group">
            <label for="matkhaucu" class="form-label">Mật Khẩu Cũ</label>
            <input required type="password" class="form-control" placeholder="Nhập mật khẩu cũ" value="" id="matkhaucu">
        </div>
        <div class="mk-input-group">
            <label for="matkhaumoi" class="form-label">Mật Khẩu Mới</label>
            <input required type="password" class="form-control" id="matkhaumoi" placeholder="Nhập mật khẩu mới" value="">
        </div>
        <div class="mk-input-group">
            <label for="nhaplaimatkhau" class="form-label">Nhập Lại Mật Khẩu Mới</label>
            <input required type="password" class="form-control" id="nhaplaimatkhau" placeholder="Nhập lại mật khẩu mới" value="">
        </div>
        <div class="mk-button-group">
            <button class="btn btn-outline-primary btn-doimatkhau">Thay Đổi</button>
            <button class="btn btn-outline-primary" onclick="cancel()">Huỷ</button>
        </div>
    </form>
</div>
<script>
 var forms = document.querySelectorAll('.needs-validation')
    $('.btn-doimatkhau').on('click', function(event) {
        Array.prototype.slice.call(forms)
            .forEach(function(e) {
                if (!e.checkValidity()) {
                    e.classList.add('was-validated')
                    event.preventDefault()
                    event.stopPropagation()
                } else {
                    checkPassword()
                }
            })
    });

    var idcompany = $('#idcompany').val()

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
            $.post("index.php?controller=ccompany&action=checkPassword", {
                idcompany: idcompany,
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
        $.post("index.php?controller=ccompany&action=updatePassword", {
            idcompany: idcompany,
            newPassword: newPassword
        }, function(data) {
            if (data == 1) {
                alert("Đổi mật khẩu thành công!")
                location.reload()
            } else {
                alert("Đổi mật khẩu thất bại!")
            }
        })
    }

    function cancel() {
        location.reload()
    }
</script>