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
                    <img src="./public/img/trangchu/br-3.jpg" class="d-block" style="width:100%">
                </div>
                <div class="carousel-item">
                    <img src="./public/img/trangchu/bn-2.jpg" class="d-block" style="width:100%">
                </div>
                <div class="carousel-item">
                    <img src="./public/img/trangchu/bn-1.jpg" class="d-block" style="width:100%">
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
                <p class="header-h">Tour n???i b???t</p>
            </div>
            <a class="align-items-center d-flex xemthem" href="index.php?controller=chome&action=home&page=tour">Xem th??m tour</a>
        </div>
        <div class="content-tournoibat">
            <div class="row" id="tournoibat">
                <!-- <div class="col-sm-3 item-wrap"> -->
                <!-- <div class="khungchuaimg">
                        <img src="./public/img/trangchu/tour-ba-na-6.png" alt="" style="width:100%">
                    </div>
                    <div class="item-meta">
                        <p class="item-tua mb-1">
                            <a class="item-header" href="#">Du l???ch banana</a>
                        </p>
                        <p class="item-price md-1">
                            <span class="amount" data-price="900000">900.000</span>
                            <span>VN??</span>
                        </p>
                        <p class="item-khoihanh mb-1">
                            <i class="fa-solid fa-clock"></i>
                            <span>Kh???i h??nh:</span> H???ng ng??y
                        </p>
                        <div class="d-flex justify-content-between">
                            <a class="item-chitiet" href="index.php?controller=chome&action=detail_tour">Xem chi ti???t</a>
                        </div>
                    </div> -->
                <!-- </div> -->
            </div>
        </div>
    </div>
    <div class="container-fluid diemdulichdacsac">
        <div class="header-diemdulichdacsac tuade">
            <img class="header-img" src="./public/img/trangchu/destination.png" alt="">
            <p class="header-h">Nh???ng ??i???m du l???ch ?????c s???c</p>
            <p class="in4-diemdulichdacsac">X???ng ????ng v???i danh x??ng ???R???ng v??ng bi???n b???c???, Vi???t Nam mang ?????n nh???ng b???c h???a ?????p ?????n nao l??ng d??nh t???ng cho du kh??ch. D?? ??ang trong r???ng s??u hay tr???m m??nh c??ng bi???n l???ng, d?? m?? m??ng v???i l??n m??y b???ng b???nh ??? ?????nh n??i cao ng???t hay h??a m??nh c??ng l??n n?????c ?????i d????ng xanh trong, tr??i tim ai kia v???n r???n r??ng nh???ng cung b???c c???m x??c kh?? t??? Y??u l???m m???t Vi???t Nam ?????p ?????n v?? ng???n.</p>
        </div>
        <div class="content-diemdulichdacsac">
            <div class="hihi" id="diemdulich">
                <!-- <div class="item-dacsac">
                    <a class="item-content-dacsac" href="">
                        <img class="item-img-dacsac" src="./public/img/trangchu/tour-ba-na-6.png" alt="" style="width:100%">
                    </a>
                    <div class="ten-dacsac">
                        <p>H???i an ?????p qu?? ta ??i</p>
                    </div>
                    <div class="overlay">
                        <div class="item_header-overlay">H???i An t????i ?????p</div>
                    </div>
                </div>
                <div class="item-dacsac">
                    <a class="item-content-dacsac" href="">
                        <img class="item-img-dacsac" src="./public/img/trangchu/tour-ba-na-6.png" alt="" style="width:100%">
                    </a>
                    <div class="ten-dacsac">
                        <p>H???i an ?????p qu?? ta ??i</p>
                    </div>
                    <div class="overlay">
                        <div class="item_header-overlay">H???i An t????i ?????p</div>
                    </div>
                </div>
                <div class="item-dacsac">
                    <a class="item-content-dacsac" href="">
                        <img class="item-img-dacsac" src="./public/img/trangchu/tour-ba-na-6.png" alt="" style="width:100%">
                    </a>
                    <div class="ten-dacsac">
                        <p>H???i an ?????p qu?? ta ??i</p>
                    </div>
                    <div class="overlay">
                        <div class="item_header-overlay">H???i An t????i ?????p</div>
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
                    <p>C??c th????ng hi???u kh??ch s???n ?????i t??c h??ng ?????u</p>
                </div>
                <a class="align-items-center d-flex khamphangay">Kh??m ph?? ngay</a>
            </div>

            <div class="content-hotel">
                <div class="row">
                    <div class="col-sm-3 item-hotel">
                        <a class="img-hotel" href="">
                            <img src="./public/img/khachsan/z3310332035332_54ab2c28005d66c40f7b606d213f8acc.jpg" alt="" style="height: 410px;width:100%">
                        </a>
                        <div class="item-logo-hotel">
                            <div class="img-logo-hotel">
                                <img class="img-logo" src="./public/img/khachsan/muongthanhlogo-1024x542.png" alt="">
                            </div>
                        </div>
                        <div class="item-hotel-content">
                            <p>Ch??? t??? 215k/ng?????i</p>
                        </div>
                        <div class="overlay-hotel">
                            <ul>
                                <li>Bao tro??n bu????i sa??ng</li>
                                <li>Kha??ch sa??n ba??n cha??y nh????t</li>
                                <li>Phong c??ch ??a d???ng, ph?? h???p v???i m???i s??? th??ch</li>
                                <li>?????m b???o gi?? t???t nh???t</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 row">
                        <div class="col-sm-12 item-hotel">
                            <a class="img-hotel" href="">
                                <img src="./public/img/khachsan/vnprir.jpg" alt="" style=" height: 200px;width:100%">
                            </a>
                            <div class="item-logo-hotel">
                                <div class="img-logo-hotel">
                                    <img class="img-logo" src="./public/img/khachsan/1-vinpearl.png" alt="">
                                </div>
                            </div>
                            <div class="item-hotel-content">
                                <p>Ch??? t??? 418k/ng?????i</p>
                            </div>
                            <div class="overlay-hotel">
                                <ul>
                                    <li>Gi?? ?????c quy???n t???t nh???t</li>
                                    <li>Khu vui ch??i: Safari, VinWonder, Grand World</li>
                                    <li>Ch??nh s??ch ho??n h???y linh ho???t</li>
                                    <li>Combo Du l???ch ??a d???ng</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-12 item-hotel">
                            <a class="img-hotel" href="">
                                <img src="./public/img/khachsan/K4xngVWLTJu6awPcUUfUdg-63-228033380.jpeg" alt="" style=" height: 200px;width:100%">
                            </a>
                            <div class="item-logo-hotel">
                                <div class="img-logo-hotel">
                                    <img class="img-logo" src="./public/img/khachsan/all-accor-live-limitless-logo_optimized.png" alt="">
                                </div>
                            </div>
                            <div class="item-hotel-content">
                                <p>Ch??? t??? 320k/ng?????i</p>
                            </div>
                            <div class="overlay-hotel">
                                <ul>
                                <li>Mi???n ph?? ph??? thu tr??? em</li>
                                    <li>Bao tr???n b???a s??ng</li>
                                    <li>T???p ??o??n kh??ch s???n h??ng ?????u th??? gi???i</li>
                                    <li>Kh??ch s???n cao c???p b??n ch???y</li>
                                  
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 item-hotel">
                        <a class="img-hotel" href="">
                            <img src="./public/img/khachsan/42831_BRFY3DIS86_overview-2_24665838868_o.jpg" alt="" style="height: 410px;width:100%">
                        </a>
                        <div class="item-logo-hotel">
                            <div class="img-logo-hotel">
                                <img class="img-logo" src="./public/img/khachsan/flc.png" alt="">
                            </div>
                        </div>
                        <div class="item-hotel-content">
                            <p>Ch??? t??? 620k/ng?????i</p>
                        </div>
                        <div class="overlay-hotel">
                            <ul>
                                <li>Bao tr???n b???a s??ng</li>
                                <li>Kh??ch s???n, resort cao c???p b??n ch???y</li>
                                <li>?????m b???o gi?? t???t nh???t </li>
                                <li>Voucher du l???ch si??u ti???t ki???m</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 row">
                        <div class="col-sm-12 item-hotel">
                            <a class="img-hotel" href="">
                                <img src="./public/img/khachsan/171d9204.jpg" alt="" style=" height: 200px;width:100%">
                            </a>
                            <div class="item-logo-hotel">
                                <div class="img-logo-hotel">
                                    <img class="img-logo" src="./public/img/khachsan/inter-continental_optimized.png" alt="">
                                </div>
                            </div>
                            <div class="item-hotel-content">
                                <p>Ch??? t??? 1.000k/ng?????i</p>
                            </div>
                            <div class="overlay-hotel">
                                <ul>
                                    <li>B???a s??ng 5 sao chu???n qu???c t???</li>
                                    <li>Ti???n nghi sang tr???ng</li>
                                    <li>Mi???n ph?? 2 tr??? em d?????i 6 tu???i</li>
                                    <li>Khu ngh??? d?????ng l??ng m???n nh???t Vi???t Nam</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-12 item-hotel">
                            <a class="img-hotel" href="">
                                <img src="./public/img/khachsan/44729725f510bd968a16ad91e943c926.jpg" alt="" style=" height: 200px;width:100%">
                            </a>
                            <div class="item-logo-hotel">
                                <div class="img-logo-hotel">
                                    <img class="img-logo" src="./public/img/khachsan/fusion.png" alt="">
                                </div>
                            </div>
                            <div class="item-hotel-content">
                                <p>Ch??? t??? 580k/ng?????i</p>
                            </div>
                            <div class="overlay-hotel">
                                <ul>
                                <li>??n s??ng ti??u chu???n qu???c t???</li>
                                    <li>H??? b??i v?? c???c</li>
                                    <li>?????t ph??ng k???t h???p v???i Spa ?????c ????o</li>
                                    <li>Bar Club ng???m ho??ng h??n</li>
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
                <p class="header-h">Blog du l???ch</p>
                <p>B?? quy???t du l???ch, nh???ng c??u chuy???n th?? v??? ??ang ch??? ????n b???n</p>
            </div>
        </div>
        <div class="item-blog">
            <div class="blog-1 blog">
                <div class="blog-1-img">
                    <img src="./public/img/blogdulich/2.jpg" alt="">
                </div>
                <div class="blog-1-hd">
                    <p class="tua-blog">Travel blogger v?? nh???ng c??u h???i th?????ng g???p</p>
                </div>
            </div>
            <div class="blog-2 blog">
                <div class="blog-2-img">
                    <img src="./public/img/blogdulich/3.jpg" alt="">
                </div>
                <div class="blog-1-hd">
                    <p class="tua-blog">Blog du l???ch b???i b???t ?????u t??? ????u?</p>
                </div>
            </div>
            <div class="blog-3 blog">
                <div class="blog-3-img">
                    <img src="./public/img/blogdulich/1.jpg" alt="">
                </div>
                <div class="blog-1-hd">
                    <p class="tua-blog">L??m travel blogger th??? n??o?</p>
                </div>
            </div>
            <div class="blog-4 blog">
                <div class="blog-4-img">
                    <img src="./public/img/blogdulich/4.jpg" alt="">
                </div>
                <div class="blog-1-hd">
                    <p class="tua-blog">V??ng tr???i H?? Lan</p>
                </div>
            </div>
            <div class="blog-5 blog">
                <div class="blog-5-img">
                    <img src="./public/img/blogdulich/5.jpg" alt="">
                </div>
                <div class="blog-1-hd">
                    <p class="tua-blog">10 m??n ngon Phan Thi???t </p>
                </div>
            </div>
            <div class="blog-6 blog">
                <div class="blog-6-img">
                    <img src="./public/img/blogdulich/7.jpg" alt="">
                </div>
                <div class="blog-1-hd">
                    <p class="tua-blog">M???t ng??y d???o quanh Chiang Mai</p>
                </div>
            </div>
            <div class="blog-7 blog">
                <div class="blog-7-img">
                    <img src="./public/img/blogdulich/6.jpg" alt="">
                </div>
                <div class="blog-1-hd">
                    <p class="tua-blog">Hu??? m???t ng??y th??ng 7</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script>
    document.onload = load()

    function load() {
        loadtour()
        loaddiadiem()
    }

    function loadtour() {

        path = "./public/img/tour/";
        $.post('index.php?controller=ctour&action=getAllTour', {},
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
                    price = t['price-adult']
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
                            <span>VN??</span>
                        </p>
                        <p class="item-khoihanh mb-1">
                            <i class="fa-solid fa-clock"></i>
                            <span>Kh???i h??nh:</span> ` + daystart + `
                        </p>
                        <div class="d-flex justify-content-between">
                            <a class="item-chitiet" href="index.php?controller=chome&action=home&page=detailtour&idtour=` + idtour + `">Xem chi ti???t</a>
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
                for (let i = 0; i < 7; i++) {
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
                            
                            <div class="overlay">
                                <div class="item_header-overlay">` + nameplace + `</div>
                            </div>
                         </div>
                    `)
                }
            })
    }
</script>