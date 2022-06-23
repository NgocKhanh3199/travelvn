<div class=" menu">
    <div class="row flex">
        <div class="col-md-4 col-4 logo"><i id="logo-menutop" class="fa-solid fa-bars text-center"></i>
            <a class="text-decoration-none" href="#">TravelVN</a>
        </div>
        <div class="col-md-4 col-2">
            <nav class="navbar navbar-light">
                <div class="containe">
                    <form class="from" action="index.php">
                        <input type="hidden" name="controller" value="chome">
                        <input type="hidden" name="action" value="home">
                        <!-- <input type="hidden" name="path" value="trangchu"> -->
                        <input type="hidden" name="page" value="tour">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="name">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </nav>
        </div>
        <?php
        if (isset($_SESSION['iduser'])) {
        ?>
            <div class="col-md-4 dropdown">
                <a class="nameuser" href="#">
                    <i class="fa-solid fa-user"></i>
                    Xin chào, <?php
                                if (isset($_SESSION['name'])) {
                                    $name = $_SESSION['name'];
                                    echo $name;
                                }
                                ?>
                </a>
                <div class="dropdown-content">
                    <a href="index.php?controller=cuser&action=account"><i class="fa-solid fa-user"></i> Tài Khoản</a>
                    <a href="index.php?controller=cuser&action=logout"><i class="fa-solid fa-arrow-right-from-bracket"></i> Đăng Xuất</a>
                </div>
            </div>

        <?php
        } else {
        ?>
            <div class="dndk col-md-4">
                <div class="text-center">
                    <a class="dangnhap" href="index.php?controller=cuser&action=loginpage"> <i class="fa-solid fa-right-to-bracket"></i> Đăng nhập</a>
                </div>
                <div id="dangky" class="text-center">
                    <a href="index.php?controller=cuser&action=registerPage" class="dangky"><i class="fa-solid fa-registered"></i> Đăng ký</a>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <div id="header" class="header">
        <ul class="menutop" id="menutop">
            <li>
                <i id="logo-menutop1" class="logo2 fa-solid fa-bars text-center"></i>
            </li>
            <li>
                <a href="index.php?controller=chome&action=home" class="nav-link"><i class="fa-solid fa-house"></i> Trang chủ</a>
            </li>
            <li>
                <a href="#" class="nav-link "><i class="fa-solid fa-people-group"></i> Về chúng tôi</a>
            </li>
            <li>
                <a href="index.php?controller=chome&action=home&page=tour" class="nav-link"><i class="fa-solid fa-plane-departure"></i> Tour du lịch</a>
            </li>
            <li>
                <a href="#" class="nav-link "><i class="fa-solid fa-hotel"></i> Khách sạn</a>
            </li>
            <li>
                <a href="#" class="nav-link "><i class="fa-solid fa-note-sticky"></i> Kinh nghiệm du lịch</a>
            </li>
            <li>
                <a href="index.php?controller=chome&action=home&page=chamsockhachhang" class="nav-link "><i class="fa-solid fa-circle-question"></i> Liên Hệ</a>
            </li>
        </ul>
    </div>
    <div class="overlay-phu" id="phu"></div>
    <div class="menudown" id="menudown">
        <ul class="nav justify-content-center" id="menudown">
            <li class="nav-item">
                <a href="index.php?controller=chome&action=home" class="nav-link">Trang chủ</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link ">Về chúng tôi</a>
            </li>
            <li class="nav-item">
                <a href="index.php?controller=chome&action=home&page=tour" class="nav-link">Tour du lịch</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link ">Khách sạn</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link ">Kinh nghiệm du lịch</a>
            </li>
            <li>
                <a href="index.php?controller=chome&action=home&page=chamsockhachhang" class="nav-link "><i class="fa-solid fa-notebook"></i>Liên Hệ</a>
            </li>
        </ul>
    </div>
</div>

<script>
      var header = document.getElementById('header');
      var logomenutop = document.getElementById('logo-menutop');
      var logomenutop1 = document.getElementById('logo-menutop1');
      var overlay = document.getElementById('phu');
      logomenutop.onclick = function() {
          overlay.style.display = 'block';
          header.style.transform = 'translateX(0%)';
      }
      logomenutop1.onclick = function() {
          overlay.style.display = 'none';
          header.style.transform = 'translateX(-100%)';
      }
      overlay.onclick = function() {
          overlay.style.display = 'none';
          header.style.transform = 'translateX(-100%)';
      }

    //   function googleTranslateElementInit() {
    //       new google.translate.TranslateElement({
    //           pageLanguage: 'en'
    //       }, 'google_translate_element');
    //   }
</script>
<!-- <span>
    <div class="translate" id="google_translate_element"></div>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'vi'
            }, 'google_translate_element');
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</span> -->

