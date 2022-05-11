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
    <link rel="stylesheet" href="./public/css/firm.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/5f22631803.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./public/css/company.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid navbar-menu">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-brand brand-wrapper" href="">
                <img src="./public/img/admin/TRAVELVN.png" width="40" height="40" alt="">
                <div class="brand-name">
                    <h6>TravelVN</h6>
                    <h6>The best solution for your company</h6>
                </div>
            </div>
            <div class="navbar-brand d-flex menu-bar" href="#">
                <ul class="d-flex me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php?controller=chome&action=company&path=tour">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?controller=chome&action=company&path=tour">Quản Lý Tour</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?controller=chome&action=company&path=donhang">Đơn Hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?controller=chome&action=company&path=giaodich">Giao Dịch</a>
                    </li>
                    <li class="nav-item">
                        <form class="form-search d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-light" type="submit">Search</button>
                        </form>
                    </li>
                </ul>
            </div>
            <div class="user-wrapper dropdown text-light">
                <img src="./public/img/nguoidung/việt tour.png" width="30" height="30" alt="">
                <div>
                    <h6>Việt Tour</h6>
                    <small>My Company</small>
                    <div class="dropdown-content">
                        <a href="qltk_company.php">Tài Khoản</a>
                        <a href="#">Đăng Xuất</a>
                    </div>
                </div>
            </div>

            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <div class="navbar-brand brand-wrapper" href="">
                        <img src="./public/img/admin/TRAVELVN.png" width="40" height="40" alt="">
                        <div class="brand-name text-dark">
                            <h6>TravelVN</h6>
                            <h6>The best solution for your company</h6>
                        </div>
                    </div>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 text-dark">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Trang Chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=chome&action=company&path=tour">Quản Lý Tour</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=chome&action=company&path=donhang">Đơn Hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=chome&action=company&path=giaodich">Giao Dịch</a>
                        </li>
                    </ul>
                    <form class="d-flex mt-4">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <div class="company-page">
        <?php
       if(isset($_GET['path']))
       {
       $controller = $_GET['path'];
       if(isset($_GET['page']))
       {
           $action = ($_GET['page']);
           $this->viewcongty($controller,$action);
       }
       else
       {
        $this->viewcongty($controller,'list');
       }
       }
       else
       {
       if(isset($_GET['page']))
       {
           $action = ($_GET['page']);
           $this->viewcongty('',$action);
       }
       else
       {
        $this->viewcongty("tour", "list");
       }
       }
        ?>
    </div>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

</body>

</html>