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
            <!-- <hr> -->
            <a href="" class="text-center link-dark">Đăng ký với tài khoản nhà bán hàng</a>
            <div class="register-content">
                <div class="register-by-account">
                    <div class="register-input mt-4">
                        <label for="tennguoidung" class="form-label">Tên Người Dùng</label>
                        <input type="text" class="form-control" id="tennguoidung"
                            placeholder="Nhập tên người dùng">
                    </div>
                    <div class="register-input mt-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Nhập email">
                    </div>
                    <div class="register-input mt-4">
                        <label for="ngaysinh" class="form-label">Ngày sinh</label>
                        <input type="date" class="form-control" id="ngaysinh" placeholder="Nhập ngày sinh">
                    </div>
                    <div class="register-input mt-4">
                        <label for="matkhau" class="form-label">Mật Khẩu</label>
                        <input type="password" class="form-control" id="matkhau" placeholder="Nhập mật khẩu">
                    </div> 
                </div>
                <!-- <div style="border-right: 1px solid black;"></div> -->
                <div class="register-by-account">
                    <div class="register-input mt-4">
                        <label for="sodienthoai" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control" id="sodienthoai" placeholder="Nhập số điện thoại">
                    </div>
                    <div class="register-input mt-4">
                        <label for="gioitinh" class="form-label">Giới Tính</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Chọn Giới Tính</option>
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                            <option value="Khác">Khác</option>
                          </select>
                    </div>
                    <div class="register-input mt-4">
                        <label for="tendangnhap" class="form-label">Tên Đăng Nhập</label>
                        <input type="text" class="form-control" id="tendangnhap" placeholder="Nhập tên đăng nhập">
                    </div>
                    <div class="register-input mt-4">
                        <label for="nhaplaimatkhau" class="form-label">Nhập Lại Mật Khẩu</label>
                        <input type="password" class="form-control" id="nhaplaimatkhau" placeholder="Nhập lại mật khẩu">
                    </div>
                </div>
            </div>   
            <div class="button-group mt-4">
                <button class="btn btn-outline-dark">Đăng Ký</button>
                <button class="btn btn-outline-dark">Huỷ</button>
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