<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./public/css/register.css">
    <link rel="stylesheet" href="./public/themify-icons/themify-icons.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/5f22631803.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-register">
        <form class="form row g-3 needs-validation" novalidate>
            <!-- <div class="register-close">
                <button><i class="fa-solid fa-xmark"></i></button>
            </div> -->
            <h3 class="register-title">Đăng Ký</h3>
            <!-- <hr> -->
            <a href="index.php?controller=ccompany&action=registerpage" class="text-center link-dark">Đăng ký với tài khoản nhà bán hàng</a>
            <div class="register-content">
                <div class="register-by-account">
                    <div class="register-input mt-4">
                        <label for="tennguoidung" class="form-label">Tên Người Dùng</label>
                        <input required type="text" class="form-control" id="tennguoidung" placeholder="Nhập tên người dùng">
                    </div>
                    <div class="register-input mt-4">
                        <label for="email" class="form-label">Email</label>
                        <input required type="email" class="form-control" id="email" placeholder="Nhập email">
                    </div>
                    <div class="register-input mt-4">
                        <label for="ngaysinh" class="form-label">Ngày sinh</label>
                        <input required type="date" class="form-control" id="ngaysinh" placeholder="Nhập ngày sinh">
                    </div>
                    <div class="register-input mt-4">
                        <label for="matkhau" class="form-label">Mật Khẩu</label>
                        <input required type="password" class="form-control" id="matkhau" placeholder="Nhập mật khẩu">
                        <div id="eye">
                            <i class="fa-solid fa-eye"></i>
                        </div>
                    </div>
                </div>
                <!-- <div style="border-right: 1px solid black;"></div> -->
                <div class="register-by-account">
                    <div class="register-input mt-4">
                        <label for="sodienthoai" class="form-label">Số điện thoại</label>
                        <input required type="text" class="form-control" id="sodienthoai" placeholder="Nhập số điện thoại">
                    </div>
                    <div class="register-input mt-4">
                        <label for="gioitinh" class="form-label">Giới Tính</label>
                        <select required class="form-select" aria-label="Default select example" id="gioitinh">
                            <option selected>Chọn Giới Tính</option>
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                            <option value="Khác">Khác</option>
                        </select>
                    </div>
                    <div class="register-input mt-4">
                        <label for="tendangnhap" class="form-label">Tên Đăng Nhập</label>
                        <input required type="text" class="form-control" id="tendangnhap" placeholder="Nhập tên đăng nhập">
                    </div>
                    <div class="register-input mt-4">
                        <label for="nhaplaimatkhau" class="form-label">Nhập Lại Mật Khẩu</label>
                        <input required type="password" class="form-control" id="nhaplaimatkhau" placeholder="Nhập lại mật khẩu">
                        <div id="eye">
                            <i class="fa-solid fa-eye"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="button-group mt-4">
                <button class="btn btn-outline-dark btn-dangky" id="dangky">Đăng Ký</button>
                <button class="btn btn-outline-dark">Huỷ</button>
            </div>
            <div class="end-register">
                <span class="register">
                    <p>Đã có tài khoản?</p>
                    <a href="index.php?controller=cuser&action=loginpage">Đăng nhập</a>
                </span>
            </div>
        </form>
    </div>

    <script>
        var forms = document.querySelectorAll('.needs-validation')
        $('.btn-dangky').on('click', function(event) {
            Array.prototype.slice.call(forms)
                .forEach(function(e) {
                    if (!e.checkValidity()) {
                        e.classList.add('was-validated')
                        event.preventDefault()
                        event.stopPropagation()
                    } else {
                        dangky()
                    }
                })
        });

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

        function dangky() {
            var tennguoidung = $('#tennguoidung').val()
            var sodienthoai = $('#sodienthoai').val()
            var email = $('#email').val()
            var gioitinh = $('#gioitinh').val()
            var ngaysinh = $('#ngaysinh').val()
            var tendangnhap = $('#tendangnhap').val()
            var matkhau = $('#matkhau').val()
            var nhaplaimatkhau = $('#nhaplaimatkhau').val()
            if (matkhau != nhaplaimatkhau) {
                alert('Mật khẩu và nhập lại mật khẩu không khớp!')
            } else {
                $.post("index.php?controller=cuser&action=register", {
                    tendangnhap: tendangnhap,
                    matkhau: matkhau,
                    tennguoidung: tennguoidung,
                    email: email,
                    sodienthoai: sodienthoai,
                    gioitinh: gioitinh,
                    ngaysinh: ngaysinh
                }, function(data) {
                    console.log(data);
                    if (data > 0) {
                        alert('Đăng ký thành công vui lòng kiểm tra mail để kích hoạt tài khoản')
                        // window.location.href = "index.php?controller=cuser&action=loginpage"
                    } else if (data <= 0) {
                        alert('Đăng ký thất bại')
                    }
                })
            }
        }
    </script>

</body>

</html>