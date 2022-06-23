<link rel="stylesheet" href="./public/css/touryeuthich.css">
<div class="container ddyt-container">
    <h3 class="text-center my-profile">TOUR YÊU THÍCH</h3>
    <div class="touryeuthich" id="touryeuthich">
        <!-- <div class="item-tour">
            <div class="item-tour-detail">
                <div class="img-tour-detail">
                    <a href="#">
                        <img class="img-tour" src="./public/img/default-user-image.png" alt="">
                    </a>
                    <div class="iconyeuthich">
                        <i class="fa-2x fa-solid fa-heart yeuthich"></i>
                    </div>
                    <span class="time-slot">
                        <i class="fa-solid fa-clock"></i>
                        2 ngày 3 đêm
                    </span>
                </div>
                <div class="content-tour-detail">
                    <div class="title-content-tour">
                        <h4>
                            <a href="#">HÀ NỘI - ĐÀ NẴNG - BÀ NÀ HILL - PHỐ CỔ HỘI AN <span>(2 ngày 3 đêm)</span></a>

                        </h4>
                    </div>
                    <div class="list-content-tour">
                        <div class="item-left">
                            <div class="list-tour_transport">
                                <i class="fa-solid fa-person-walking"></i>
                                <span>Xe bus</span>
                            </div>
                            <div class="list-tour_date">
                                <i class="fa-solid fa-calendar-days"></i>
                                <span>20/06/2022</span>
                            </div>
                        </div>
                        <div class="item-right">
                            <div class="list_tour_price">
                                <p>Giá từ</p>
                                <span>2.000.000đ</span>
                            </div>
                            <a class="btn" href="#">Đặt tour</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</div>
<script>
    var iduser = <?php echo $_SESSION['iduser'] ?>;
    document.onload = loadtouryeuthich()

    function loadtouryeuthich() {

        path = "./public/img/tour/";
        $.post('index.php?controller=ctour&action=getTouryeuthich', {
            iduser: iduser,
        }, function(data) {
            tour = JSON.parse(data);
            for (let i = 0; i < tour.length; i++) {
                t = tour[i];
                idtour = t['idtour']
                hinhanh = t['hinhanh']
                if (hinhanh.length == 0) {
                    hinhanh = 'noimg.png'
                }
                hinhanhtour = path + hinhanh
                nametour = t['nametour']
                price = t['price-adult']
                var price1 = parseInt(price);
                price1 = price1.toLocaleString('vi', {
                    style: 'currency',
                    currency: 'VND'
                });
                daystart = t['day-start']
                daystart1 = daystart.substr(8, 2) + `/` + daystart.substr(5, 2) + `/` + daystart.substr(0, 4)
                numberday = t['numberday']
                numbernight = t['numbernight']
                xe = t['transport']
                $('#touryeuthich').append(`
                <div class="item-tour">
                    <div class="item-tour-detail">
                        <div class="img-tour-detail">
                            <a href="#">
                                <img class="img-tour" src="` + hinhanhtour + `" alt="">
                            </a>
                            <div class="iconyeuthich">
                                <i class="fa-2x fa-solid fa-heart yeuthich" id="` + idtour + `" onclick="touryeuthich(` + idtour + `)"></i>
                            </div>
                            <span class="time-slot">
                                <i class="fa-solid fa-clock"></i>
                                ` + numberday + ` ngày ` + numbernight + ` đêm
                            </span>
                        </div>
                        <div class="content-tour-detail">
                            <div class="title-content-tour">
                                <h4>
                                    <a href="#">` + nametour + `<span>(` + numberday + ` ngày ` + numbernight + ` đêm)</span></a>

                                </h4>
                            </div>
                            <div class="list-content-tour">
                                <div class="item-left">
                                    <div class="list-tour_transport">
                                        <i class="fa-solid fa-person-walking"></i>
                                        <span>` + xe + `</span>
                                    </div>
                                    <div class="list-tour_date">
                                        <i class="fa-solid fa-calendar-days"></i>
                                        <span>` + daystart1 + `</span>
                                    </div>
                                </div>
                                <div class="item-right">
                                    <div class="list_tour_price">
                                        <p>Giá từ</p>
                                        <span>` + price1 + `</span>
                                    </div>
                                    <a class="btn" href="index.php?controller=chome&action=home&page=detailtour&idtour=` + idtour + `">Đặt tour</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                `)
            }
        })
    }

    function touryeuthich(idtour) {
        var icon = document.getElementById(idtour);
        $.post("index.php?controller=ctour&action=xoatouryeuthich", {
            iduser: iduser,
            idtour: idtour,
        }, function(data) {
            if (data >= 0) {
                icon.classList.remove('yeuthich');
                $('#touryeuthich').children().remove();
                loadtouryeuthich();
            } else {
                alert("Xoá thất bại");
            }
        })
    }
</script>