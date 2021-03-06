<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./public/css/login.css">
    <link rel="stylesheet" href="./public/themify-icons/themify-icons.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/5f22631803.js" crossorigin="anonymous"></script>
</head>
<div class="container dmk-container">
    <form class="needs-validation" novalidate>
        <h3 class="text-center dmk-title">TẠO LẠI MẬT KHẨU</h3>
        <div class="mk-input-group">
            <label for="matkhaumoi" class="form-label">Mật Khẩu Mới</label>
            <input required type="text" class="form-control" id="matkhaumoi" placeholder="Nhập mật khẩu mới" value="">
        </div>
        <div class="mk-input-group">
            <label for="nhaplaimatkhau" class="form-label">Nhập Lại Mật Khẩu Mới</label>
            <input required type="text" class="form-control" id="nhaplaimatkhau" placeholder="Nhập lại mật khẩu mới" value="">
        </div>
        <div class="mk-button-group">
            <button type="button" class="btn btn-outline-primary btn-doimatkhau">Thay đổi</button>
            <button class="btn btn-outline-primary">Huỷ</button>
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
                    change_pass()
                }
            })
    });
    iduser = <?= $_GET['iduser'] ?>

    function change_pass() {
        newpass = $('#matkhaumoi').val();
        newpass2 = $('#nhaplaimatkhau').val();
        if (newpass == newpass2) {
            $.post("index.php?controller=creset_pass&action=reset", {
                newpass: newpass,
                newpass2: newpass2,
                iduser: iduser,
            }, function(data) {
                if (data > 0) {
                    alert("Đổi mật khẩu thành công")
                    window.location.href = "index.php?controller=cuser&action=loginpage"
                } else {
                    console.log(data)
                }
            })
        } else {
            alert("Mật khẩu không trùng khớp")
        }
    }
</script>