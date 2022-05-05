<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../public/css/register.css">
    <link rel="stylesheet" href="./public/themify-icons/themify-icons.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/5f22631803.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-register">
        <form class="row g-3">
            <!-- <div class="register-close">
                <button><i class="fa-solid fa-xmark"></i></button>
            </div> -->
            <h3 class="register-title">Đăng Ký</h3>
            <p class="text-center mt-0 mb-0" style="border-bottom: 1px solid black;">Tài Khoản Nhà Bán Hàng</p>
            <!-- <hr> -->
            <a href="" class="text-center link-dark">Đăng ký với tài khoản người dùng</a>
            <div class="register-content">
                <div class="register-by-account">
                    <div class="register-input mt-4">
                        <label for="matkhau" class="form-label">Tên Công Ty</label>
                        <input type="password" class="form-control" id="matkhau" placeholder="Nhập tên công ty">
                    </div>
                    <div class="register-input mt-4">
                        <label for="thanhpho" class="form-label">Thành Phố</label>
                        <input type="password" class="form-control" id="thanhpho" placeholder="Nhập thành phố">
                    </div>
                    <div class="register-input mt-4">
                        <label for="xaphuongthitran" class="form-label">Xã/Phường/Thị Trấn</label>
                        <input type="password" class="form-control" id="xaphuongthitran" placeholder="Nhập xã/phường/thị trấn">
                    </div>
                    <div class="register-input mt-4">
                        <label for="tendangnhap" class="form-label">Tên Đăng Nhập</label>
                        <input type="email" class="form-control" id="tendangnhap"
                            placeholder="Nhập tên đăng nhập">
                    </div>
                    <div class="register-input mt-4">
                        <label for="nhaplaimatkhau" class="form-label">Nhập Lại Mật Khẩu</label>
                        <input type="password" class="form-control" id="nhaplaimatkhau" placeholder="Nhập lại mật khẩu">
                    </div>
                </div>
                <!-- <div style="border-right: 1px solid black;"></div> -->
                <div class="register-by-account">
                    <div class="register-input mt-4">
                        <label for="diachi" class="form-label">Địa Chỉ</label>
                        <input type="email" class="form-control" id="diachi"
                            placeholder="Nhập địa chỉ">
                    </div>
                    <div class="register-input mt-4">
                        <label for="quan" class="form-label">Quận</label>
                        <input type="password" class="form-control" id="quan" placeholder="Nhập quận">
                    </div>
                    <div class="register-input mt-4">
                        <label for="soduong" class="form-label">Số Đường</label>
                        <input type="password" class="form-control" id="soduong" placeholder="Nhập số đường">
                    </div>
                    <div class="register-input mt-4">
                        <label for="matkhau" class="form-label">Mật Khẩu</label>
                        <input type="password" class="form-control" id="matkhau" placeholder="Nhập mật khẩu">
                    </div>
                    <div class="button-group mt-4">
                        <button class="btn btn-outline-dark">Đăng Ký</button>
                        <button class="btn btn-outline-dark">Huỷ</button>
                    </div>    
                </div>
            </div>       
            <div class="end-register">
                <span class="register">
                    <p>Đã có tài khoản?</p>
                    <a href="">Đăng nhập</a>
                </span>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function () {
            $('#eye').click(function () {
                $(this).toggleClass('open');
                $(this).children('i').toggleClass('fa-eye-slash fa-eye');
                if ($(this).hasClass('open')) {
                    $(this).prev().attr('type', 'text');
                } else {
                    $(this).prev().attr('type', 'password');
                }
            });
        });
    </script>
    
</body>

</html>