<!DOCTYPE html>
<html lang="en">

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

<body>
    <div class="container-login">
        <form class="row g-3">
            <div class="login-close">
                <button><i class="ti-close"></i></button>
            </div>
            <h3 class="login-title">Đăng Nhập</h3>
            <p class="text-center mt-0 mb-0">Tài Khoản Nhà Bán Hàng</p>
            <hr>
            <a href="index.php?controller=cuser&action=loginpage" class="text-center link-dark">Đăng nhập với tài khoản người dùng</a>
            <div class="login-by-account">
                <div class="login-input">
                    <input type="text" class="form-control" id="username" placeholder="Nhập tên đăng nhập">
                </div>
                <div class="login-input mt-4">
                    <input type="password" class="form-control" id="password" placeholder="Nhập mật khẩu">
                </div>
            </div>
            <div class="end-login">
                <button class="btn btn-outline-dark w-100" onclick="login()">Đăng nhập</button>
                <a href="index.php" class="btn btn-outline-dark w-100 mt-2">Huỷ</a>
                <div class="forgot-pass"><a href="" data-bs-toggle="modal" data-bs-target="#myModal">Quên mật khẩu?</a></div>
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
                <span class="register">
                    <p>Chưa có tài khoản?</p>
                    <a href="index.php?controller=ccompany&action=registerpage">Đăng ký tài khoản</a>
                </span>
            </div>
        </form>
    </div>


</body>

</html>

<script>
    $(document).ready(function() {
        $('#eye').click(function() {
            $(this).toggleClass('open');
            $(this).children('i').toggleClass('fa-eye-slash fa-eye');
            if ($(this).hasClass('open')) {
                $(this).prev().attr('type', 'text');
            } else {
                $(this).prev().attr('type', 'password');
            }
        });
    });

    $('#re_pass').click(function() {

        re_email = $('#email').val();
        $.post("index.php?controller=creset_pass&action=checkemail", {
            re_email: re_email,
        }, function(data) {
            // console.log(data)
            if (data.length > 0) {
                alert("Mã xác minh đã được gửi đến địa chỉ email" + re_email + "Vui lòng xác minh")
            } else {
                console.log(data)
            }
        })
    })


    function sentcode() {
        re_email = $('#email').val();
        token = $('#token').val();
        $.post("index.php?controller=creset_pass&action=checktoken", {
            re_email: re_email,
            token: token
        }, function(data) {
            // console.log(data)
            if (data > 0) {
                alert("sucess")
                window.location.href = "index.php?controller=chome&action=reset_pass&iduser=" + data
            } else {
                alert("Sai mã xác minh")
            }
        })


    }

    function login() {
        username = $('#username').val()
        password = $('#password').val()

        $.post("index.php?controller=ccompany&action=login", {
            username: username,
            password: password
        }, function(data) {
            console.log(data)
            if (data > 0) {
                alert('sucess');
                window.location.href = "index.php?controller=chome&action=company";
            } else if (data <= 0) {
                alert('Đăng nhập thất bại')
            }
        })

    }
</script>