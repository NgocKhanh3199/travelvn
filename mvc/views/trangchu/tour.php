<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách tour</title>

    <!-- link bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- end_link bootstrap 5 -->
    <!-- link icon -->
    <script src="https://kit.fontawesome.com/5f22631803.js" crossorigin="anonymous"></script>
    <!-- end-link icon -->

    <link rel="stylesheet" href="./public/css/trangchu/menu1.css">
    <link rel="stylesheet" href="./public/css/trangchu/media.css">
    <link rel="stylesheet" href="./public/css/tour/tour.css">
</head>

<body>
    <div class="list-tour">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Photos</a></li>
            <li class="breadcrumb-item"><a href="#">Summer 2017</a></li>
            <li class="breadcrumb-item"><a href="#">Italy</a></li>
            <li class="breadcrumb-item active">Rome</li>
        </ul>
        <div class="row">
            <div class="col-sm-3 seach">
                <div class="header-seach">
                    <p>Lọc kết quả</p>
                </div>
                <div class="content-seach">
                    <div class="item-seach-go">
                        <label for="sel1" class="form-label go">Điểm đi</label>
                        <select class="form-select" id="sel1" name="sellist1">
                            <option>--Tất cả--</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                    </div>
                    <div class="item-seach-stan">
                        <label for="sel1" class="form-label stan">Điểm đến</label>
                        <select class="form-select" id="sel1" name="sellist1">
                            <option>--Tất cả--</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                    </div>
                    <div class="item-seach-day">
                        <label for="text" class="dayy">Số ngày</label>
                        <div class="day">
                            <div class="item-day">1-3 ngày</div>
                            <div class="item-day">4-7 ngày</div>
                            <div class="item-day">8-14 ngày</div>
                            <div class="item-day">trên 14 ngày</div>
                        </div>
                    </div>
                    <div class="item-seach-ticket">
                        <label for="text" class="tick">Giá vé</label>
                        <div class="ticket">
                            <div class="item-ticket">&lt;2.000.000đ</div>
                            <div class="item-ticket">&gt;2.000.000đ</div>
                        </div>
                    </div>
                </div>
                <div class="item-btn-seach">
                    <button class="btn-seach">Lọc kết quả</button>
                </div>
            </div>
            <div class="col-sm-9 tour">
                <div class="header-tour">
                    <p>Danh sách tour du lịch tại Cần Thơ</p>
                </div>
                <div class="in4-tour">
                    <p>Cần Thơ là một thành phố trực thuộc trung ương của Việt Nam,
                        là thành phố sầm uất và phát triển nhất ở Đồng bằng sông Cửu Long.
                        Được mệnh danh là thủ phủ của miền Tây.
                        Các địa điểm du lịch Cần Thơ luôn thu hút rất nhiều du khách trong và ngoài nước muốn tìm hiểu và khám phá văn hóa, ẩm thực của con người nơi đây. </p>
                </div>
                <div class="item-tour">
                    <div class="item-t">
                        <div class="nunber-tour">
                            <P>Chúng tôi tìm thấy 23 tour phù hợp</P>
                        </div>
                    </div>
                    <div class="item-t">
                        <div class="sapxep-tour">
                            <label class="labell" for="text">Sắp xếp theo</label>
                            <select class="form-select sapxep" id="">
                                <option>--CHỌN--</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="item-tour row">
                    <div class="col-sm-4 item-wrap">
                        <div class="khungchuaimg">
                            <img src="./public/img/trangchu/tour-ba-na-6.png" alt="" style="width:100%">
                        </div>
                        <div class="item-meta">
                            <p class="item-tua mb-1"><a class="item-header" href="#">Du lịch banana</a></p>
                            <p class="item-price md-1">
                                <span class="amount" data-price="900000">900.000</span>
                                <span>VNĐ</span>
                            </p>
                            <p class="item-khoihanh mb-1">
                                <i class="fa-solid fa-clock"></i>
                                <span>Khởi hành:</span> Hằng ngày
                            </p>
                            <div class="d-flex justify-content-between">
                                <a class="item-chitiet" href="index.php?controller=chome&action=home&page=detailtour">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 item-wrap">
                        <div class="khungchuaimg">
                            <img src="./public/img/trangchu/tour-ba-na-6.png" alt="" style="width:100%">
                        </div>
                        <div class="item-meta">
                            <p class="item-tua mb-1"><a class="item-header" href="#">Du lịch banana</a></p>
                            <p class="item-price md-1">
                                <span class="amount" data-price="900000">900.000</span>
                                <span>VNĐ</span>
                            </p>
                            <p class="item-khoihanh mb-1">
                                <i class="fa-solid fa-clock"></i>
                                <span>Khởi hành:</span> Hằng ngày
                            </p>
                            <div class="d-flex justify-content-between">
                                <a class="item-chitiet" href="">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 item-wrap">
                        <div class="khungchuaimg">
                            <img src="./public/img/trangchu/tour-ba-na-6.png" alt="" style="width:100%">
                        </div>
                        <div class="item-meta">
                            <p class="item-tua mb-1"><a class="item-header" href="#">Du lịch banana</a></p>
                            <p class="item-price md-1">
                                <span class="amount" data-price="900000">900.000</span>
                                <span>VNĐ</span>
                            </p>
                            <p class="item-khoihanh mb-1">
                                <i class="fa-solid fa-clock"></i>
                                <span>Khởi hành:</span> Hằng ngày
                            </p>
                            <div class="d-flex justify-content-between">
                                <a class="item-chitiet" href="">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 item-wrap">
                        <div class="khungchuaimg">
                            <img src="./public/img/trangchu/tour-ba-na-6.png" alt="" style="width:100%">
                        </div>
                        <div class="item-meta">
                            <p class="item-tua mb-1"><a class="item-header" href="#">Du lịch banana</a></p>
                            <p class="item-price md-1">
                                <span class="amount" data-price="900000">900.000</span>
                                <span>VNĐ</span>
                            </p>
                            <p class="item-khoihanh mb-1">
                                <i class="fa-solid fa-clock"></i>
                                <span>Khởi hành:</span> Hằng ngày
                            </p>
                            <div class="d-flex justify-content-between">
                                <a class="item-chitiet" href="">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 item-wrap">
                        <div class="khungchuaimg">
                            <img src="./public/img/trangchu/tour-ba-na-6.png" alt="" style="width:100%">
                        </div>
                        <div class="item-meta">
                            <p class="item-tua mb-1"><a class="item-header" href="#">Du lịch banana</a></p>
                            <p class="item-price md-1">
                                <span class="amount" data-price="900000">900.000</span>
                                <span>VNĐ</span>
                            </p>
                            <p class="item-khoihanh mb-1">
                                <i class="fa-solid fa-clock"></i>
                                <span>Khởi hành:</span> Hằng ngày
                            </p>
                            <div class="d-flex justify-content-between">
                                <a class="item-chitiet" href="">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 item-wrap">
                        <div class="khungchuaimg">
                            <img src="./public/img/trangchu/tour-ba-na-6.png" alt="" style="width:100%">
                        </div>
                        <div class="item-meta">
                            <p class="item-tua mb-1"><a class="item-header" href="#">Du lịch banana</a></p>
                            <p class="item-price md-1">
                                <span class="amount" data-price="900000">900.000</span>
                                <span>VNĐ</span>
                            </p>
                            <p class="item-khoihanh mb-1">
                                <i class="fa-solid fa-clock"></i>
                                <span>Khởi hành:</span> Hằng ngày
                            </p>
                            <div class="d-flex justify-content-between">
                                <a class="item-chitiet" href="">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 item-wrap">
                        <div class="khungchuaimg">
                            <img src="./public/img/trangchu/tour-ba-na-6.png" alt="" style="width:100%">
                        </div>
                        <div class="item-meta">
                            <p class="item-tua mb-1"><a class="item-header" href="#">Du lịch banana</a></p>
                            <p class="item-price md-1">
                                <span class="amount" data-price="900000">900.000</span>
                                <span>VNĐ</span>
                            </p>
                            <p class="item-khoihanh mb-1">
                                <i class="fa-solid fa-clock"></i>
                                <span>Khởi hành:</span> Hằng ngày
                            </p>
                            <div class="d-flex justify-content-between">
                                <a class="item-chitiet" href="">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 item-wrap">
                        <div class="khungchuaimg">
                            <img src="./public/img/trangchu/tour-ba-na-6.png" alt="" style="width:100%">
                        </div>
                        <div class="item-meta">
                            <p class="item-tua mb-1"><a class="item-header" href="#">Du lịch banana</a></p>
                            <p class="item-price md-1">
                                <span class="amount" data-price="900000">900.000</span>
                                <span>VNĐ</span>
                            </p>
                            <p class="item-khoihanh mb-1">
                                <i class="fa-solid fa-clock"></i>
                                <span>Khởi hành:</span> Hằng ngày
                            </p>
                            <div class="d-flex justify-content-between">
                                <a class="item-chitiet" href="">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 item-wrap">
                        <div class="khungchuaimg">
                            <img src="./public/img/trangchu/tour-ba-na-6.png" alt="" style="width:100%">
                        </div>
                        <div class="item-meta">
                            <p class="item-tua mb-1"><a class="item-header" href="#">Du lịch banana</a></p>
                            <p class="item-price md-1">
                                <span class="amount" data-price="900000">900.000</span>
                                <span>VNĐ</span>
                            </p>
                            <p class="item-khoihanh mb-1">
                                <i class="fa-solid fa-clock"></i>
                                <span>Khởi hành:</span> Hằng ngày
                            </p>
                            <div class="d-flex justify-content-between">
                                <a class="item-chitiet" href="">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sotrang">
                    <div class="container mt-3">
                        <ul class="pagination justify-content-end">
                            <li class="page-item"><a class="page-link" href="#"><i class="fa-solid fa-angle-left"></i></a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i class="fa-solid fa-angle-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>