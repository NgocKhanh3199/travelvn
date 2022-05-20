<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tài khoản</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/200253888f.js" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="./Shoppy-admin/css/style.css"> -->
    <link rel="stylesheet" href="./public/css/quanlytaikhoan.css">
    <script src="./public/js/js.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/5f22631803.js" crossorigin="anonymous"></script>
</head>

<body>
<span>
    <div class="translate" id="google_translate_element"></div>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'vi'
            }, 'google_translate_element');
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</span>
    <div class="container-fluid">
        <div class="menu-qltk">
            <div class="menu-left col-3 border">
                <div class="user-info border-bottom">
                    <div class="">
                        <div class="avata pt-2 pb-2 ps-1" id="hinhanh">
                            <!-- <img class="rounded-circle" width="50" height="50" src="" alt=""> -->
                        </div>
                    </div>
                    <div class="tennguoidung align-self-center">
                        <h6 id="tencongty">
                            <!-- Tran Thao -->
                        </h6>
                    </div>
                    <div class="align-self-center">
                        <a href="index.php?controller=chome&action=company"><button class="btn btn-home btn-dark bg-dark text-primary"><i class="fas fa-home"></i></button></a>
                    </div>
                </div>
                <ul class="user-menu navbar-nav mb-lg-0 w-100">
                    <input type="hidden" value="<?php echo $_SESSION['idcompany'] ?>" id="idcompany">
                    <li class="nav-item border-bottom pt-2 ps-2">
                        <a class="nav-link active text-dark" aria-current="page" href="?controller=ccompany&action=account">Thông tin tài khoản</a>
                    </li>
                    <li class="nav-item border-bottom pt-2 ps-2">
                        <a class="nav-link text-dark" href="?controller=ccompany&action=account&page=doimatkhau">Đổi mật khẩu</a>
                    </li>

                </ul>
            </div>


            <div class="col-9 bg-light">
                <div class="content bg-white mx-auto">
                <?php
                    if (isset($_GET['path'])) {
                        $controller = $_GET['path'];
                        if (isset($_GET['page'])) {
                            $action = ($_GET['page']);
                            $this->viewcongty($controller, $action);
                        } else {
                            $this->viewcongty($controller, 'thongtintaikhoan');
                        }
                    } else {
                        if (isset($_GET['page'])) {
                            $action = ($_GET['page']);
                            $this->viewcongty('account', $action);
                        } else {
                            $this->viewcongty("account", "thongtintaikhoan");
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    var idcompany = $('#idcompany').val()
    $(document).ready(function() {
        $('#tamp').remove()
        $('#temp').remove()
        $('#showimg').append('<div id="tamp"></div>')
        $('#hinhanh').append('<div id="temp"></div>')
        $.post("index.php?controller=ccompany&action=findCompanyById", {
            idcompany: idcompany
        }, function(data) {
            company = JSON.parse(data);
            name = company[0]['namecompany']
            $('#tencongty').append(company[0]['namecompany'])
            $('#tenct').append(company[0]['namecompany'])
            $('#tct').val(company[0]['namecompany'])
            $('#tendangnhap').val(company[0]['username'])
            $('#email').val(company[0]['email'])
            $('#sodienthoai').val(company[0]['phone'])
            $('#diachi').val(company[0]['address'])
            $('#thanhpho').val(company[0]['city'])
            $('#quan').val(company[0]['district'])
            $('#xaphuongthitran').val(company[0]['ward'])
            $('#soduong').val(company[0]['street'])
            path = "./public/img/nguoidung/"
            img = company[0]['image'].length > 0 ? company[0]['image'] : "việt tour.png"
            src = path + img
            $('#tamp').append('<img class="rounded-circle" width="80" height="80" src="' + src + '" alt="">')
            $('#temp').append('<img class="rounded-circle" width="50" height="50" src="' + src + '" alt="">')
        })
    })
</script>


