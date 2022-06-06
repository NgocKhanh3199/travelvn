<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>

    <!-- link bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- end_link bootstrap 5 -->
    <!-- link icon -->
    <script src="https://kit.fontawesome.com/5f22631803.js" crossorigin="anonymous"></script>
    <!-- end-link icon -->
    <script src="./public/js/js.js"></script>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <link rel="stylesheet" href="./public/css/trangchu/menu1.css">
    <link rel="stylesheet" href="./public/css/trangchu/media.css">
    <link rel="stylesheet" href="./public/css/tour/deteil-tour.css">
</head>

<body>
    <div class="detail-tour">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Photos</a></li>
            <li class="breadcrumb-item"><a href="#">Summer 2017</a></li>
            <li class="breadcrumb-item"><a href="#">Italy</a></li>
            <li class="breadcrumb-item active">Rome</li>
        </ul>
        <div class="hd" id="hd">

        </div>

        <div class="stars">
            <form action="">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
            </form>
        </div>
        <div class="item-top">
            <div class="img-item">
                <div id="slideshow" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#slideshow" data-bs-slide-to="0" class="active"></button>
                        <button type="button" data-bs-target="#slideshow" data-bs-slide-to="1"></button>
                        <button type="button" data-bs-target="#slideshow" data-bs-slide-to="2"></button>
                        <button type="button" data-bs-target="#slideshow" data-bs-slide-to="3"></button>
                    </div>
                    <div class="carousel-inner" id="img-item">

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#slideshow" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#slideshow" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>
            <div class="in4-item" id="in4-item">

            </div>
        </div>
        <div class="down">
            <div class="diemnhan">
                <p class="headerr">Điểm nhấn hành trình</p>
                <div class="item-diemnhan" id="diemnhan">


                </div>
            </div>
            <div class="lichtrinh" id="lichtrinh">

            </div>
            <div class="dichvu" id="dichvu">

            </div>
            <div class="ghichu">
                <p class="headerr">Ghi chú</p>
                <p>Sản phẩm Áo thun nam cổ tròn 100% giống mô tả.
                    - Cam kết 100% đổi size nếu sản phẩm khách đặt không vừa (hỗ trợ đổi size trong vòng 7 ngày).
                    - Hỗ trợ đổi trả sản phẩm, hoàn tiền nếu lỗi do nhà sản xuất
                    - Nếu có bất kì khiếu nại cần Shop hỗ trợ về sản phẩm, khi mở sản phẩm các Chị vui lòng quay lại video quá trình mở sản phẩm để được đảm bảo 100% đổi lại sản phẩm mới nếu Shop giao bị lỗi.
                    - Sản phẩm đầy đủ tem, mác, bao bì cao cấp.
                    - Quý khách nhận được sản phẩm, hãy lòng đánh giá giúp Shop để hưởng thêm nhiều ưu đãi hơn nhé.</p>
            </div>
            <div class="danhgiadukhach">
                <p class="headerr">Đánh giá của du khách</p>
                <div class="item-danhgiakh">
                    <div class="logokh">
                        <img src="./public/img/trangchu/tour-hoi-an-1.png" alt="">
                    </div>
                    <div class="info">
                        <label class="tenkh" for="">Ngọc Khánh</label>
                        <div class="stars2">
                            <form action="">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </form>
                        </div>
                        <P>DU LỊCH THẤY CŨNG ĐƯỢC</P>
                    </div>
                </div>
                <div class="item-danhgiakh">
                    <div class="logokh">
                        <img src="./public/img/trangchu/fllc.png" alt="">
                    </div>
                    <div class="info">
                        <label class="tenkh" for="">Thanh Thảo</label>
                        <div class="stars2">
                            <form action="">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </form>
                        </div>
                        <P>Du lịch không có gì dui</P>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
<script>
    var idtour = <?= $_GET['idtour'] ?>;

    document.onload = loadtour()

    function loadtour() {
        path = "./public/img/tour/";
        $.post('index.php?controller=ctour&action=getin4TourbyIdtour', {
                idtour: idtour
            },
            function(data) {
                tour = JSON.parse(data);
                t = tour[0];
                nametour = t['nametour']
                timeday = t['numberday']
                timenight = t['numbernight']
                daystart = t['day-start']
                transport = t['transport']
                $.ajax({
                    url: 'https://provinces.open-api.vn/api/p/' + t['place_start'] + '?depth=1',
                    method: "GET",
                    success: function(data) {
                        $('#in4-xuatphat').append(`
                        <label class="tualabel" for="text">Xuất phát:</label>
                        <label class="in4label" for="text">` + data['name'] + `</label>
                        `)
                        $('#diemnhan-in4').append(`
                        <label class="tualabel1" for="text">Vận chuyển:</label>
                        <label class="in4label1" for="text">Từ ` + data['name'] + `</label>
                        `)
                    }
                })
                price = t['price']
                in4 = t['information']
                lichtrinh = t['schedule']
                dichvu = t['service_not_include']
                hinhanh = t['hinhanh']
                if (hinhanh.length == 0) {
                    hinhanh = 'noimg.png'
                }
                hinhanhtour = path + hinhanh

                hinhanh1 = t['hinhanh1']
                if (hinhanh1.length == 0) {
                    hinhanh1 = hinhanh
                }
                hinhanhtour1 = path + hinhanh1

                hinhanh2 = t['hinhanh2']
                if (hinhanh2.length == 0) {
                    hinhanh2 = hinhanh
                }
                hinhanhtour2 = path + hinhanh2

                hinhanh3 = t['hinhanh3']
                if (hinhanh3.length == 0) {
                    hinhanh3 = hinhanh
                }
                hinhanhtour3 = path + hinhanh3
                $('#hd').append(`
                <header class="header-tour">Du lịch ` + nametour + `</header>
                `)
                $('#img-item').append(`
                <div class="carousel-item active">
                    <img src="` + hinhanhtour + `" class="d-block" style="width:100%">
                        </div>
                        <div class="carousel-item">
                            <img src="` + hinhanhtour1 + `" class="d-block" style="width:100%">
                        </div>
                        <div class="carousel-item">
                            <img src="` + hinhanhtour2 + `" class="d-block" style="width:100%">
                        </div>
                        <div class="carousel-item">
                            <img src="` + hinhanhtour3 + `" class="d-block" style="width:100%">
                        </div>
                `)
                $('#in4-item').append(`
                <div class="tuatour">
                    <h4>` + nametour + `</h4>
                </div>
                <div class="in4tour">
                    <div class="in4-time in4">
                        <label class="tualabel" for="text">Thời gian:</label>
                        <label class="in4label" for="text">` + timeday + ` ngày ` + timenight + ` đêm</label>
                    </div>
                    <div class="in4-go in4">
                        <label class="tualabel" for="text">Khởi hành:</label>
                        <label class="in4label" for="text">` + daystart + `</label>
                    </div>
                    <div class="in4-bus in4">
                        <label class="tualabel" for="text">Vận chuyển:</label>
                        <label class="in4label" for="text">` + transport + `</label>
                    </div>
                    <div class="in4-xuatphat in4" id="in4-xuatphat">
                        
                    </div>
                </div>
                <div class="book">
                    <p class="price text-start">Giá từ: ` + price + `đ</p>
                    <button class="btn-book"> <a href="index.php?controller=chome&action=home&page=oder&idtour=` + idtour + `">Đặt ngay</a> </button>
                </div>
                `)
                $('#diemnhan').append(`
                <div class="diemnhan-in4">
                        <label class="tualabel1" for="text">Hành trình:</label>
                        <label class="in4label1" for="text"> ` + nametour + `</label>
                    </div>
                    <div class="diemnhan-in4">
                        <label class="tualabel1" for="text">Lịch trình:</label>
                        <label class="in4label1" for="text">` + timeday + ` ngày ` + timenight + ` đêm</label>
                    </div>
                    <div class="diemnhan-in4">
                        <label class="tualabel1" for="text">Ngày khỏi hành:</label>
                        <label class="in4label1" for="text">` + daystart + `</label>
                    </div>
                    <div class="diemnhan-in4" id="diemnhan-in4">
                       
                    </div>
                    <span>Đôi nét về chuyến du lịch:</span>
                    <span>` + in4 + `</span>           
                `)
                $('#lichtrinh').append(`
                <p class="headerr">Lịch trình</p>
                <p>` + lichtrinh + `</p>
                `)
                $('#dichvu').append(`
                <p class="headerr">Dịch vụ bao gồm và không bao gồm</p>
                <p>` + dichvu + `</p>
                `)
            })
    }
</script>