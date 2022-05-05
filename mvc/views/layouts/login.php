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
            <div class="login-method d-flex">
                <button class="btn btn-outline-dark"><i class="ti-facebook text-primary"></i>Facebook</button>
                <button class="btn btn-outline-dark">
                    <i class="ti-google text-danger"></i>
                    <!-- <svg width="36" height="36" fill="none"><path d="M18.498 11.795a6.17 6.17 0 013.983 1.454l3.12-2.972a10.485 10.485 0 00-16.507 3.062l3.519 2.712a6.211 6.211 0 015.885-4.256z" fill="#D94F3D"></path><path d="M12.295 17.998c0-.662.108-1.32.318-1.947l-3.519-2.712a10.467 10.467 0 000 9.318l3.519-2.712a6.174 6.174 0 01-.318-1.947z" fill="#F2C042"></path><path d="M28.567 16.09H18.546v4.294h5.678a5.119 5.119 0 01-2.173 2.94l3.49 2.692c2.232-2.002 3.542-5.258 3.026-9.927z" fill="#5085ED"></path><path d="M22.05 23.324a6.67 6.67 0 01-3.552.877 6.211 6.211 0 01-5.886-4.256l-3.518 2.712a10.51 10.51 0 009.404 5.84c2.573.07 5.081-.815 7.042-2.482l-3.49-2.69z" fill="#57A75C"></path></svg> -->
                    Google
                </button>
            </div>
            <hr>
            <div class="login-by-account">
                <p class="text-center mt-0 mb-0">Hoặc đăng nhập bằng tên đăng nhập</p>
                <div class="login-input">
                    <input type="text" class="form-control" id="tendangnhap" placeholder="Nhập tên đăng nhập">
                </div>
                <div class="login-input">
                    <input type="password" class="form-control" id="matkhau" placeholder="Nhập mật khẩu">
                    <div id="eye">
                        <i class="fa-solid fa-eye"></i>
                    </div>
                </div>
            </div>
            <div class="end-login">
                <button class="btn btn-outline-dark w-100" type="button" onclick="login()">Đăng nhập</button>
                <div class="forgot-pass"><a href="">Quên mật khẩu?</a></div>
                <span class="register">
                    <p>Chưa có tài khoản?</p>
                    <a href="">Đăng ký tài khoản</a>
                </span>
            </div>
            <a href="" class="text-center link-dark link-nbh">Đăng Nhập Với Tài Khoản Nhà Bán Hàng</a>
        </form>
    </div>


</body>

</html>

<script>
    // $(document).ready(function() {
    //     $('#eye').click(function() {
    //         $(this).toggleClass('open');
    //         $(this).children('i').toggleClass('fa-eye-slash fa-eye');
    //         if ($(this).hasClass('open')) {
    //             $(this).prev().attr('type', 'text');
    //         } else {
    //             $(this).prev().attr('type', 'password');
    //         }
    //     });
    // });

    function login() {
        tendangnhap = $('#tendangnhap').val()
        matkhau = $('#matkhau').val()

        $.post("index.php?controller=cuser&action=login", {
            tendangnhap:tendangnhap,
            matkhau:matkhau
        }, function(data) {
            console.log(data);
            if(data > 0)
            {
                alert('sucess')
            }
        })

    }
</script>