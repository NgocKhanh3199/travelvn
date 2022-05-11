<?php
// require "define.php";
require "./controller/controller.php";
?>
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
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="menu-qltk">
            <div class="menu-left col-3 border">
                <div class="user-info border-bottom">
                    <div class="">
                        <div class="avata pt-2 pb-2 ps-1" id="hinhanh">
                            <img class="rounded-circle" width="50" height="50" src="./public/img/nguoidung/avatar.jpg" alt="">
                        </div>
                    </div>
                    <div class="tennguoidung align-self-center">
                        <h6 id="tennguoidung">
                            <?php //echo $_SESSION['tennguoidung']
                            ?>
                            Tran Thao
                        </h6>
                    </div>
                    <div class="align-self-center">
                        <a href="trangchu.php?page=ndtrangchu&idnguoidung=<?php //echo $_SESSION['idnguoidung'] 
                                                                            ?>"><button class="btn btn-home btn-dark bg-dark text-primary"><i class="fas fa-home"></i></button></a>
                    </div>
                </div>
                <ul class="user-menu navbar-nav mb-lg-0 w-100">
                    <li class="nav-item border-bottom pt-2 ps-2">
                        <a class="nav-link active text-dark" aria-current="page" href="?page=list">Thông tin tài khoản</a>
                    </li>

                    <li class="nav-item border-bottom pt-2 ps-2" id="diadiemyeuthich">
                        <a class="nav-link text-dark" href="?page=diadiemyeuthich">Tour du lịch yêu thích</a>
                    </li>

                    <li class="nav-item border-bottom pt-2 ps-2">
                        <a class="nav-link text-dark" href="?page=doimatkhau">Đổi mật khẩu</a>
                    </li>

                </ul>
            </div>


            <div class="col-9 bg-light">
                <div class="content bg-white mx-auto">
                    <?php
                        if (isset($_GET['page'])) {
                            $page = $_GET['page'];
                            if (strlen($page) === 0) {
                                $page = "list";
                                echo '<script>location.replace("?folder=' . $folder . '&page=' . $page . '")</script>';
                            }
                            $path = "account/" . $page;
                        } else {
                            $page = "list";
                            $path = "account/" . "$page";
                        }
                    getPage($path);
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

<script>

</script>