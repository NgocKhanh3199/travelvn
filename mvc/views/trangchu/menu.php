

    <div class="pt-2 menu ">
        <div class="row">
            <div class="col-md-4 col-4 logo"><i id="logo-menutop" class="fa-solid fa-bars text-center"></i>
                <a class="text-decoration-none" href="#">TravelVN</a>
            </div>
            <div class="col-md-4 col-2"></div>
            <div class="dropdown col-md-1 col-3 text-center ngonngu">
                <a class="text-decoration-none eng" href="#" role="button" data-bs-toggle="dropdown">
                    ENG <i class="fa-solid fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li class="dropdown-item"> VIE</li>
                </ul>
            </div>
            <div class="col-md-2 col-3 text-center">
                <a class="dangnhap" href="index.php?controller=cuser&action=loginpage">Đăng nhập</a>
            </div>
            <div id="dangky" class="col-md-1 text-center">
                <a class="dangky">Đăng ký</a>
            </div>
        </div>
        <div id="header" class="header">
            <ul class="menutop" id="menutop">
                <li>
                    <i id="logo-menutop1" class="logo2 fa-solid fa-bars text-center"></i>
                </li>
                <li>
                    <a href="#" class="nav-link"><i class="fa-solid fa-house"></i> Trang chủ</a>
                </li>
                <li>
                    <a href="#" class="nav-link "><i class="fa-solid fa-people-group"></i> Về chúng tôi</a>
                </li>
                <li>
                    <a href="#" class="nav-link"><i class="fa-solid fa-plane-departure"></i> Tour du lịch</a>
                </li>
                <li>
                    <a href="#" class="nav-link "><i class="fa-solid fa-hotel"></i> Khách sạn</a>
                </li>
                <li>
                    <a href="#" class="nav-link "><i class="fa-solid fa-notebook"></i> Kinh nghiệm du lịch</a>
                </li>
            </ul>
        </div>
        <div class="overlay-phu" id="phu"></div>
        <div class="menudown" id="menudown">
            <ul class="nav justify-content-center" id="menudown">
                <li class="nav-item">
                    <a href="#" class="nav-link">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link ">Về chúng tôi</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Tour du lịch</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link ">Khách sạn</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link ">Kinh nghiệm du lịch</a>
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
</script>