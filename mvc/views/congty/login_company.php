<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
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
                    <input type="email" class="form-control" id="exampleFormControlInput1"
                        placeholder="Nhập tên đăng nhập">
                </div>
                <div class="login-input mt-4">
                    <input type="password" class="form-control" id="inputPassword" placeholder="Nhập mật khẩu">
                </div>
            </div>
            <div class="end-login">
                <button class="btn btn-outline-dark w-100">Đăng nhập</button>
                <a href="index.php" class="btn btn-outline-dark w-100 mt-2">Huỷ</a>
                <div class="forgot-pass"><a href="">Quên mật khẩu?</a></div>
                <span class="register">
                    <p>Chưa có tài khoản?</p>
                    <a href="register_company.php">Đăng ký tài khoản</a>
                </span>
            </div>
        </form>
    </div>

    
</body>

</html>