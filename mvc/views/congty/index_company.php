<?php
// require "define.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Company</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="./public/css/firm.css"> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/5f22631803.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./public/css/company.css">
    <link rel="stylesheet" href="./public/css/quanlytaikhoan.css">
    <script src="./public/js/js.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="d-flex img-logo">
            <img src="./public/img/admin/TRAVELVN.png" width="40" height="40" alt="">
            <div class="brand-name">TravelPN</div>
        </div>
        <div class="navbar-menu">
            <div class="navbar-brand brand-wrapper header" href="">

                <div class="navbar-brand d-flex menu-bar" href="#">
                    <ul class="d-flex me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=chome&action=company&path=tour&idcompany=<?php echo $_SESSION['idcompany'] ?>">Quản Lý Tour</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=chome&action=company&path=donhang&idcompany=<?php echo $_SESSION['idcompany'] ?>">Đơn Hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=chome&action=company&path=diadiem&idcompany=<?php echo $_SESSION['idcompany'] ?>">Địa điểm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=chome&action=company&path=giaodich&idcompany=<?php echo $_SESSION['idcompany'] ?>">Giao Dịch</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=chome&action=company&path=thongke&idcompany=<?php echo $_SESSION['idcompany'] ?>">Thống kê</a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <div class="navbar-brand brand-wrapper" href="">
                        <img src="./public/img/admin/TRAVELVN.png" width="40" height="40" alt="">
                        <div class="brand-name">TravelPN</div>
                    </div>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 text-dark">
                        <li class="nav-item">
                            <a class="nav-link text-dark bg-light" aria-current="page" href="index.php?controller=chome&action=company&path=tour">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=chome&action=company&path=tour">Quản Lý Tour</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=chome&action=company&path=donhang">Đơn Hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=chome&action=company&path=giaodich">Địa điểm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=chome&action=company&path=giaodich">Giao Dịch</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="user-wrapper dropdown text-light">
            <?php
            if (isset($_SESSION['idcompany'])) {
                $idcongty = $_SESSION['idcompany'];
            ?>
                <div id="img">

                </div>

                <div>
                    <h6>
                        <?php echo $_SESSION['namecompany'] ?>
                    </h6>
                    <small>My Company</small>
                    <div class="dropdown-content">
                        <a class=" text-dark" href="index.php?controller=ccompany&action=account">Tài Khoản</a>
                        <a class=" text-dark" href="index.php?controller=ccompany&action=logout">Đăng Xuất</a>
                    </div>
                </div>
            <?php
            } else {
            ?>
                <div>
                    <a class="dangnhap me-2" href="index.php?controller=ccompany&action=loginpage">Đăng nhập</a>
                    <a class="ms-2" href="index.php?controller=ccompany&action=registerpage" class="dangky">Đăng ký</a>
                </div>
            <?php
            }
            ?>
        </div>
    </nav>
    <div class="company-page">
        <?php
        if (isset($_GET['path'])) {
            $controller = $_GET['path'];
            if (isset($_GET['page'])) {
                $action = ($_GET['page']);
                $this->viewcongty($controller, $action);
            } else {
                $this->viewcongty($controller, 'list');
            }
        } else {
            if (isset($_GET['page'])) {
                $action = ($_GET['page']);
                $this->viewcongty('', $action);
            } else {
                $this->viewcongty("tour", "list");
            }
        }
        ?>
    </div>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });

        document.onload = loadimg()

        function loadimg() {
            path = "./public/img/congty/";
            idcongty = <?= $idcongty ?>;
            $.post('index.php?controller=cuser&action=getimgcongty', {
                idcongty: idcongty,
            }, function(data) {
                tour = JSON.parse(data);
                if (tour[0]['image']) {
                    img = path + tour[0]['image']
                } else {
                    img = "./public/img/congty/company.png"
                }
                $('#img').append(`
                    <img src="` + img + `" width="30" height="30" alt="">
                `)
            })
        }
    </script>

</body>

</html>
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