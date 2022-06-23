

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximun-scale=1.0">
    <title>Admin Home</title>
    <link rel="stylesheet" href="./public/css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/5f22631803.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>

<body>
    <input type="checkbox" id="nav-toggle">
    <div class="slidebar">
        <div class="slidebar-brand">
            <h3><span class="logo"><img src="./public/img/admin/TRAVELVN.png" alt=""></span><span>Travel VN</span></h3>
        </div>
        <div class="slidebar-menu" id="slidebar-menu">
            <ul>
                <li class="menu-item">
                    <a href="index.php" class="menu-link">
                        <span><i class="fa-solid fa-house"></i></span> <span>Trang Chủ</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="index.php?controller=chome&action=admin&path=tour" class="menu-link">
                        <span><i class="fa-solid fa-umbrella-beach"></i></span><span> Quản Lý Tour</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="index.php?controller=chome&action=admin&path=nguoidung" class="menu-link">
                        <span><i class="fa-solid fa-users"></i></span><span> Quản Lý Người Dùng</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="index.php?controller=chome&action=admin&path=diadiem" class="menu-link">
                        <span><i class="fa-solid fa-location-dot"></i></span><span> Quản Lý Địa Điểm</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="index.php?controller=chome&action=admin&path=donhang" class="menu-link">
                        <span><i class="fa-solid fa-clipboard-list"></i></span><span> Quản Lý Đơn Hàng</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="index.php?controller=chome&action=admin&path=congty" class="menu-link">
                        <span><i class="fa-solid fa-building"></i></span><span> Quản Lý Công Ty</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="index.php?controller=chome&action=admin&path=giaodich&page=loinhuanthang" class="menu-link">
                        <span><i class="fa-solid fa-location-crosshairs"></i></span><span> Quản Lý Giao Dịch</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="index.php?controller=chome&action=admin&path=chamsockhachhang&page=list" class="menu-link">
                        <span><i class="fa-solid fa-location-crosshairs"></i></span><span>Chăm sóc khách hàng</span>
                    </a>
                </li>
            
                <li class="menu-item">
                    <a href="index.php?controller=chome&action=admin" class="menu-link">
                        <span><i class="fa-solid fa-clipboard-list"></i></span><span> Thống kê </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <header class="" style="background-color: white;">
            <h4 class="header-title">
                <label for="nav-toggle">
                    <span><i class="fa-solid fa-bars"></i></span>
                </label>
                Dashboard
            </h4>
            <div class="search-wrapper">
                <span><i class="fa-solid fa-magnifying-glass"></i></span>
                <input type="search" name="" id="" placeholder="Tìm Kiếm">
            </div>
            <div class="user-wrapper dropdown">
                <img src="./public/img/default-user-image.png" width="50" height="50" alt="">
                <div>
                    <?php 
                        if(isset($_SESSION['name'])) {
                    ?>
                    <h6><?php echo $_SESSION['name']?></h6>
                    <small>Super admin</small>
                    <?php
                        }
                        else{
                    ?>
                    <META http-equiv="refresh" content="0;URL=index.php?controller=cuser&action=loginpage">
                    <?php } ?>
                </div>
                <div class="dropdown-content">
                    <a href="index.php?controller=chome&action=admin&page=doimatkhau"><i class="fa-solid fa-user"></i>Đổi Mật Khẩu</a>
                    <a href="index.php?controller=cuser&action=logout"><i class="fa-solid fa-arrow-right-from-bracket"></i> Đăng Xuất</a>
                </div>
            </div>
            
        </header>
        <main>
        <?php
           if(isset($_GET['path']))
           {
           $controller = $_GET['path'];
           if(isset($_GET['page']))
           {
               $action = ($_GET['page']);
               $this->viewadmin($controller,$action);
           }
           else
           {
            $this->viewadmin($controller,'list');
           }
           }
           else
           {
           if(isset($_GET['page']))
           {
               $action = ($_GET['page']);
               $this->viewadmin('',$action);
           }
           else
           {
            $this->viewadmin("", "content_index_admin");
           }
           }   
            ?>

        </main>

    </div>
    <script>
        // $(document).ready(function() {
        //     $('#myTable').DataTable();
        //     $('#myTable1').DataTable();
        // });

        // var menu = document.getElementById('slidebar-menu')
        // console.log(menu);
        // var items = menu.getElementsByClassName('menu-item')
        // console.log(items)
        // var a = menu.getElementsByClassName('menu-link')
        // console.log(a)

        // for (var i = 0; i < items.length; i++) {
        //     items[i].addEventListener("click", function() {
        //         var current = document.getElementsByClassName("active");

        //         // If there's no active class
        //         if (current.length > 0) {
        //             current[0].className = current[0].className.replace("active", " ");
        //         }

        //         // Add the active class to the current/clicked button
        //         this.className += " active";
        //     });
        // }

        // for (var i = 0; i < items.length; i++) {
        //     items[i].addEventListener("click", function() {
        //     var current = document.getElementsByClassName("active");
        //     current[0].className = current[0].className.replace(" active", "");
        //     this.className += " active";
        //     });
        // }
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