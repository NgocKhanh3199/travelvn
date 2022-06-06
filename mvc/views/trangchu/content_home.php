<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- link bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- end_link bootstrap 5 -->
    <!-- link icon -->
    <script src="https://kit.fontawesome.com/5f22631803.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- end-link icon -->

    <script src="./public/js/js.js"></script>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <link rel="stylesheet" href="./public/css/trangchu/trangchu.css">
    <link rel="stylesheet" href="./public/css/trangchu/media.css">
</head>

<body>
    <div class="body1">
        <!-- Carousel -->
        <div id="slideshow" class="carousel slide" data-bs-ride="carousel">

            <!-- Indicators/dots -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#slideshow" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#slideshow" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#slideshow" data-bs-slide-to="2"></button>
            </div>

            <!-- The slideshow/carousel -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./public/img/trangchu/dc_200914_Da Lat  (6).jpg" class="d-block" style="width:100%">
                </div>
                <div class="carousel-item">
                    <img src="./public/img/trangchu/tfd_220401043741_613665.jpg" class="d-block" style="width:100%">
                </div>
                <div class="carousel-item">
                    <img src="./public/img/trangchu/tfd_220401044033_037108.jpg" class="d-block" style="width:100%">
                </div>
            </div>

            <!-- Left and right controls/icons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#slideshow" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#slideshow" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>

    <div class="container tournoibat">
        <div class="header-tournoibat justify-content-between d-sm-flex">
            <div class="tuade">
                <img class="header-img" src="./public/img/trangchu/destination.png" alt="">
                <p class="header-h">Tour nổi bật</p>
            </div>
            <a class="align-items-center d-flex xemthem">Xem thêm tour</a>
        </div>
        <div class="content-tournoibat">
<<<<<<< HEAD
            <div class="row" id="tournoibat">
                <!-- <div class="col-sm-3 item-wrap"> -->
                <!-- <div class="khungchuaimg">
=======
            <div class="row" id="tour">
                <!-- <div class="col-sm-3 item-wrap" id="tour">
                    <div class="khungchuaimg">
>>>>>>> a1e9b9f4cf5a3d56e72b9ed6ae960199985a083f
                        <img src="./public/img/trangchu/tour-ba-na-6.png" alt="" style="width:100%">
                    </div>
                    <div class="item-meta">
                        <p class="item-tua mb-1">
                            <a class="item-header" href="#">Du lịch banana</a>
                        </p>
                        <p class="item-price md-1">
                            <span class="amount" data-price="900000">900.000</span>
                            <span>VNĐ</span>
                        </p>
                        <p class="item-khoihanh mb-1">
                            <i class="fa-solid fa-clock"></i>
                            <span>Khởi hành:</span> Hằng ngày
                        </p>
                        <div class="d-flex justify-content-between">
                            <a class="item-chitiet" href="index.php?controller=chome&action=detail_tour">Xem chi tiết</a>
                        </div>
<<<<<<< HEAD
                    </div> -->
                <!-- </div> -->
=======
                    </div> 
                </div>-->

>>>>>>> a1e9b9f4cf5a3d56e72b9ed6ae960199985a083f
            </div>
        </div>
    </div>
    <div class="container-fluid diemdulichdacsac">
        <div class="header-diemdulichdacsac tuade">
            <img class="header-img" src="./public/img/trangchu/destination.png" alt="">
            <p class="header-h">Những điểm du lịch đặc sắc</p>
        </div>
        <div class="content-diemdulichdacsac">
            <div class="hihi" id="diemdulich">
                <!-- <div class="item-dacsac">
                    <a class="item-content-dacsac" href="">
                        <img class="item-img-dacsac" src="./public/img/trangchu/tour-ba-na-6.png" alt="" style="width:100%">
                    </a>
                    <div class="ten-dacsac">
                        <p>Hội an đẹp quá ta ơi</p>
                    </div>
                    <div class="overlay">
                        <div class="item_header-overlay">Hội An tươi đẹp</div>
                    </div>
                </div>
                <div class="item-dacsac">
                    <a class="item-content-dacsac" href="">
                        <img class="item-img-dacsac" src="./public/img/trangchu/tour-ba-na-6.png" alt="" style="width:100%">
                    </a>
                    <div class="ten-dacsac">
                        <p>Hội an đẹp quá ta ơi</p>
                    </div>
                    <div class="overlay">
                        <div class="item_header-overlay">Hội An tươi đẹp</div>
                    </div>
                </div>
                <div class="item-dacsac">
                    <a class="item-content-dacsac" href="">
                        <img class="item-img-dacsac" src="./public/img/trangchu/tour-ba-na-6.png" alt="" style="width:100%">
                    </a>
                    <div class="ten-dacsac">
                        <p>Hội an đẹp quá ta ơi</p>
                    </div>
                    <div class="overlay">
                        <div class="item_header-overlay">Hội An tươi đẹp</div>
                    </div>
                </div> -->
            </div>
        </div>

    </div>
    <div class="hotel-h">
        <div class="hotel">
            <div class="header-tournoibat justify-content-between d-sm-flex">
                <div class="header-diemdulichdacsac tuade">
                    <img class="header-img" src="./public/img/trangchu/destination.png" alt="">
                    <p class="header-h">TravelVN.Hotel</p>
                </div>
                <a class="align-items-center d-flex khamphangay">Khám phá ngay</a>
            </div>

            <div class="content-hotel">
                <div class="row">
                    <div class="col-sm-3 item-hotel">
                        <a class="img-hotel" href="">
                            <img src="./public/img/trangchu/tour-ba-na-6.png" alt="" style="width:100%">
                        </a>
                        <div class="item-logo-hotel">
                            <div class="img-logo-hotel">
                                <img src="./public/img/trangchu/fllc.png" alt="">
                            </div>
                        </div>
                        <div class="item-hotel-content">
                            <p>Chỉ từ 210k/người</p>
                        </div>
                        <div class="overlay-hotel">
                            <ul>
                                <li>Dị thoi đó</li>
                                <li>Dị thoi đó 2</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 row">
                        <div class="col-sm-12 item-hotel">
                            <a class="img-hotel" href="">
                                <img src="./public/img/trangchu/tour-ba-na-6.png" alt="" style="width:100%">
                            </a>
                            <div class="item-logo-hotel">
                                <div class="img-logo-hotel">
                                    <img src="./public/img/trangchu/fllc.png" alt="">
                                </div>
                            </div>
                            <div class="item-hotel-content">
                                <p>Chỉ từ 210k/người</p>
                            </div>
                            <div class="overlay-hotel">
                                <ul>
                                    <li>Dị thoi đó</li>
                                    <li>Dị thoi đó 2</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-12 item-hotel">
                            <a class="img-hotel" href="">
                                <img src="./public/img/trangchu/tour-ba-na-6.png" alt="" style="width:100%">
                            </a>
                            <div class="item-logo-hotel">
                                <div class="img-logo-hotel">
                                    <img src="./public/img/trangchu/fllc.png" alt="">
                                </div>
                            </div>
                            <div class="item-hotel-content">
                                <p>Chỉ từ 210k/người</p>
                            </div>
                            <div class="overlay-hotel">
                                <ul>
                                    <li>Dị thoi đó</li>
                                    <li>Dị thoi đó 2</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 item-hotel">
                        <a class="img-hotel" href="">
                            <img src="./public/img/trangchu/tour-ba-na-6.png" alt="" style="width:100%">
                        </a>
                        <div class="item-logo-hotel">
                            <div class="img-logo-hotel">
                                <img src="./public/img/trangchu/fllc.png" alt="">
                            </div>
                        </div>
                        <div class="item-hotel-content">
                            <p>Chỉ từ 210k/người</p>
                        </div>
                        <div class="overlay-hotel">
                            <ul>
                                <li>Dị thoi đó</li>
                                <li>Dị thoi đó 2</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 row">
                        <div class="col-sm-12 item-hotel">
                            <a class="img-hotel" href="">
                                <img src="./public/img/trangchu/tour-ba-na-6.png" alt="" style="width:100%">
                            </a>
                            <div class="item-logo-hotel">
                                <div class="img-logo-hotel">
                                    <img src="./public/img/trangchu/fllc.png" alt="">
                                </div>
                            </div>
                            <div class="item-hotel-content">
                                <p>Chỉ từ 210k/người</p>
                            </div>
                            <div class="overlay-hotel">
                                <ul>
                                    <li>Dị thoi đó</li>
                                    <li>Dị thoi đó 2</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-12 item-hotel">
                            <a class="img-hotel" href="">
                                <img src="./public/img/trangchu/tour-ba-na-6.png" alt="" style="width:100%">
                            </a>
                            <div class="item-logo-hotel">
                                <div class="img-logo-hotel">
                                    <img src="./public/img/trangchu/fllc.png" alt="">
                                </div>
                            </div>
                            <div class="item-hotel-content">
                                <p>Chỉ từ 210k/người</p>
                            </div>
                            <div class="overlay-hotel">
                                <ul>
                                    <li>Dị thoi đó</li>
                                    <li>Dị thoi đó 2</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="blogdulich">
        <div class="header-tournoibat justify-content-between d-sm-flex">
            <div class="header-diemdulichdacsac tuade">
                <img class="header-img" src="./public/img/trangchu/destination.png" alt="">
                <p class="header-h">Blog du lịch</p>
                <p>Bí quyết du lịch, những câu chuyện thú vị đang chờ đón bạn</p>
            </div>
        </div>
        <div class="item-blog">
            <div class="blog-1 blog">
                <div class="blog-1-img">
                    <img src="./public/img/trangchu/tour-hoi-an-1.png" alt="">
                </div>
                <div class="blog-1-hd">
                    <p class="tua-blog">mẹo du lịch</p>
                </div>
            </div>
            <div class="blog-2 blog">
                <div class="blog-2-img">
                    <img src="./public/img/trangchu/tour-hoi-an-1.png" alt="">
                </div>
                <div class="blog-1-hd">
                    <p class="tua-blog">mẹo du lịch</p>
                </div>
            </div>
            <div class="blog-3 blog">
                <div class="blog-3-img">
                    <img src="./public/img/trangchu/tour-hoi-an-1.png" alt="">
                </div>
                <div class="blog-1-hd">
                    <p class="tua-blog">mẹo du lịch</p>
                </div>
            </div>
            <div class="blog-4 blog">
                <div class="blog-4-img">
                    <img src="./public/img/trangchu/tour-hoi-an-1.png" alt="">
                </div>
                <div class="blog-1-hd">
                    <p class="tua-blog">mẹo du lịch</p>
                </div>
            </div>
            <div class="blog-5 blog">
                <div class="blog-5-img">
                    <img src="./public/img/trangchu/tour-hoi-an-1.png" alt="">
                </div>
                <div class="blog-1-hd">
                    <p class="tua-blog">mẹo du lịch mẹo du lịch</p>
                </div>
            </div>
            <div class="blog-6 blog">
                <div class="blog-6-img">
                    <img src="./public/img/trangchu/tour-hoi-an-1.png" alt="">
                </div>
                <div class="blog-1-hd">
                    <p class="tua-blog">mẹo du lịch</p>
                </div>
            </div>
            <div class="blog-7 blog">
                <div class="blog-7-img">
                    <img src="./public/img/trangchu/tour-hoi-an-1.png" alt="">
                </div>
                <div class="blog-1-hd">
                    <p class="tua-blog">mẹo du lịch</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script>
<<<<<<< HEAD
    document.onload = load()

    function load() {
        loadtour()
        loaddiadiem()
    }

    function loadtour() {
        path = "./public/img/tour/";
        $.post('index.php?controller=ctour&action=getAlltour', {},
            function(data) {
                tour = JSON.parse(data);
                for (let i = 0; i < 4; i++) {
                    t = tour[i];
                    idtour = t['idtour']
                    hinhanh = t['hinhanh']
                    if (hinhanh.length == 0) {
                        hinhanh = 'noimg.png'
                    }
                    hinhanhtour = path + hinhanh
                    nametour = t['nametour']
                    price = t['price']
                    daystart = t['day-start']
                    $('#tournoibat').append(`
                    <div class="col-sm-3 item-wrap">
                    <div class="khungchuaimg">
                        <img src="` + hinhanhtour + `" alt="" style="width:100%">
                    </div>
                    <div class="item-meta">
                        <p class="item-tua mb-1">
                            <a class="item-header" href="#">` + nametour + `</a>
                        </p>
                        <p class="item-price md-1">
                            <span class="amount" data-price="900000">` + price + `</span>
                            <span>VNĐ</span>
                        </p>
                        <p class="item-khoihanh mb-1">
                            <i class="fa-solid fa-clock"></i>
                            <span>Khởi hành:</span> ` + daystart + `
                        </p>
                        <div class="d-flex justify-content-between">
                            <a class="item-chitiet" href="index.php?controller=chome&action=detail_tour&idtour=`+idtour+`">Xem chi tiết</a>
                        </div>
                    </div>
                    </div>
                    `)
                }
            })
    }

    function loaddiadiem() {
        pathplace = "./public/img/diadiem/";
        $.post('index.php?controller=cdiadiem&action=getAlldiadiem', {},
            function(data) {
                place = JSON.parse(data);
                for (let i = 0; i < 6; i++) {
                    p = place[i];
                    idplace = p['idplace']
                    nameplace = p['nameplace']
                    hinhanh = p['hinhanh']
                    // console.log(nameplace)
                    if (hinhanh.length == 0) {
                        hinhanh = 'noimg.png'
                    }
                    hinhanhplace = pathplace + hinhanh
                    $('#diemdulich').append(`
                        <div class="item-dacsac">
                            <a class="item-content-dacsac" href="">
                                <img class="item-img-dacsac" src="` + hinhanhplace + `" alt="" style="width:100%">
                            </a>
                            <div class="ten-dacsac">
                                <p>` + nameplace + `</p>
                            </div>
                            <div class="overlay">
                                <div class="item_header-overlay">` + nameplace + `</div>
                            </div>
                         </div>
                    `)
                }
            })
=======
    window.onload = loadTour()

    function loadTour() {
        $('#tamp').remove()
        $('#temp').remove()
        $('#showimg').append('<div id="tamp"></div>')
        $('#hinhanh').append('<div id="temp"></div>')
        $.post("index.php?controller=ctour&action=getAllTour", {}, function(data) {
            var tour = JSON.parse(data)
            path = "./public/img/tour/"
            for (var i = 0; i < tour.length; i++) {
                img = tour[i]['hinhanh'].length > 0 ? tour[i]['hinhanh'] : "2b95fc58931487994632121fc1f00833_1_55_10_20_5_2022.jpg"
                src = path + img
                $('#tour').append('<div class="col-sm-3 item-wrap" id="tour">' +
                    '<div class="khungchuaimg">' +
                    ' <img src="' + src + '" alt="" style="width:100%"></div>' +
                    ' <div class="item-meta">' +
                    '  <p class="item-tua mb-1">' +
                    ' <a class="item-header" href="#">'+tour[i]['nametour']+'</a>' +
                    '  </p>' +
                    ' <p class="item-price md-1">' +
                    '  <span class="amount" data-price="900000">'+tour[i]['price']+'</span>' +
                    '  <span>VNĐ</span>' +
                    '  </p>' +
                    ' <p class="item-khoihanh mb-1">' +
                    '     <i class="fa-solid fa-clock"></i>' +
                    '     <span>Khởi hành:</span> '+tour[i]['day-start']+' ' +
                    ' </p>' +
                    '  <div class="d-flex justify-content-between">' +
                    '   <a class="item-chitiet" href="index.php?controller=chome&action=detail_tour">Xem chi tiết</a>' +
                    '</div>' +
                    '</div>' +
                    ' </div>')
            }

        })
>>>>>>> a1e9b9f4cf5a3d56e72b9ed6ae960199985a083f
    }
</script>