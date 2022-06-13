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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- end-link icon -->

    <link rel="stylesheet" href="./public/css/trangchu/menu1.css">
    <link rel="stylesheet" href="./public/css/trangchu/media.css">
    <link rel="stylesheet" href="./public/css/tour/tour.css">
    <script src="./public/js/js.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>

<body>
    <div class="list-tour m-5 p-2">
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
                        <select id="diemdi" aria-placeholder="chon tinh" name="hotel_name" class="form-select" aria-label="Default select example"></select>
                    </div>
                    <div class="item-seach-stan">
                        <label for="sel1" class="form-label stan">Điểm đến</label>
                        <select id="diemden" aria-placeholder="chon tinh" name="hotel_name" class="form-select" aria-label="Default select example"></select>
                    </div>
                    <div class="item-seach-day">
                        <label for="text" class="dayy">Số ngày</label>
                        <div class="day">
                            <div class="item-day">
                                <input type="checkbox" class="btn-check" id="onetothree" autocomplete="off" value="">
                                <label class="btn btn-outline-secondary" for="onetothree">1-3 ngày</label><br>
                            </div>
                            <div class="item-day">
                                <input type="checkbox" class="btn-check" id="fourtoseven" autocomplete="off" value="">
                                <label class="btn btn-outline-secondary" for="fourtoseven">4-7 ngày</label><br>
                            </div>
                            <div class="item-day">
                                <input type="checkbox" class="btn-check" id="eighttofourteen" autocomplete="off" value="">
                                <label class="btn btn-outline-secondary" for="eighttofourteen">8-14 ngày</label><br>
                            </div>
                            <div class="item-day">
                                <input type="checkbox" class="btn-check" id="overfourteen" autocomplete="off" value="">
                                <label class="btn btn-outline-secondary" for="overfourteen">Trên 14 ngày</label><br>
                            </div>
                        </div>
                    </div>
                    <div class="item-seach-ticket">
                        <label for="text" class="tick">Giá vé</label>
                        <div class="ticket">
                            <div class="item-ticket">
                                <input type="checkbox" class="btn-check" id="min" autocomplete="off" value="2000000">
                                <label class="btn btn-outline-secondary" for="min">&lt;2.000.000đ</label><br>
                            </div>
                            <div class="item-ticket">
                                <input type="checkbox" class="btn-check" id="max" autocomplete="off" value="2000000">
                                <label class="btn btn-outline-secondary" for="max">&gt;2.000.000đ</label><br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item-btn-seach">
                    <button class="btn-seach" id="search-option">Lọc kết quả</button>
                </div>
            </div>
            <div class="col-sm-9 tour">
                <div class="header-tour" id="header-tour">
                    <p><!--Danh sách tour du lịch tại Cần Thơ--></p>
                </div>
                <div class="in4-tour" id="in4-tour">
                    <p> </p>
                </div>
                <div class="item-tour">
                    <div class="item-t">
                        <div class="nunber-tour" id="result">
                            <p></p>
                        </div>
                    </div>
                    <div class="item-t">
                        <div class="sapxep-tour">
                            <label class="labell" for="text">Sắp xếp theo</label>
                            <select class="form-select sapxep" id="arrange" onchange="arrange()">
                                <option>--CHỌN--</option>
                                <option value="idtour">Mới Nhất</option>
                                <option value="price">Giá</option>
                                <option value="numberday">Số Ngày</option>
                            </select>
                        </div>
                    </div>
                </div>
                <?php 
                    if(isset($_GET['name']))
                    {
                ?>
                <input type="hidden" name="" id="tukhoa" value="<?php echo $_GET['name'] ?>">
                <?php
                    }
                ?>
                <div class="item-tour row" id="item-tour">


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
<script>
    var min = $('#min').val()
    var max = $('#max').val()
    var name = $('#tukhoa').val()
    var onetothree = $('#onetothree')
    $('#tamp').remove()
    $('#temp').remove()
    $('#showimg').append('<div id="tamp"></div>')
    $('#hinhanh').append('<div id="temp"></div>')
    //-------------------------------------------------load tour by keyword-----------------------------------------------
    //tìm tour by keyword trước, nếu không có thì tìm tour by tên place, sau đó cho biết thông tin về place đó.
    $.post("index.php?controller=ctour&action=search", {
        name: name
    }, function(data) {
        if (data == '[]') {
            // $.post("index.php?controller=ctour&action=getInformationByNamePlace", {
            //     name: name
            // }, function(data){
            //     var tour = JSON.parse(data)
            //     if(data == '[]')
            //     {
            //         $('#item-tour').append("<h4 class='m-5 p-5 mx-auto text-center bg-warning'>Không tìm thấy kết quả</h4>")
            //     }
            //     //nếu có nhiều hơn 1 thì select các tour liên quan đến keyword đó
            //     else if(tour.length > 1)
            //     {
            //         alert(data)
            //         path = "./public/img/tour/"
            //         $('#result p').append('Chúng tôi tìm thấy ' + tour.length + ' tour phù hợp')
            //         for (var i = 0; i < tour.length; i++) {
            //             img = tour[i]['hinhanh'].length > 0 ? tour[i]['hinhanh'] : "2b95fc58931487994632121fc1f00833_1_55_10_20_5_2022.jpg"
            //             src = path + img
            //             $('#item-tour').append('<div class="col-sm-3 item-wrap" id="tour">' +
            //                 '<div class="khungchuaimg">' +
            //                 ' <img src="' + src + '" alt="" style="width:100%"></div>' +
            //                 ' <div class="item-meta">' +
            //                 '  <p class="item-tua mb-1">' +
            //                 ' <a class="item-header" href="#">' + tour[i]['nametour'] + '</a>' +
            //                 '  </p>' +
            //                 ' <p class="item-price md-1">' +
            //                 '  <span class="amount" data-price="900000">' + tour[i]['price'] + '</span>' +
            //                 '  <span>VNĐ</span>' +
            //                 '  </p>' +
            //                 ' <p class="item-khoihanh mb-1">' +
            //                 '     <i class="fa-solid fa-clock"></i>' +
            //                 '     <span>Khởi hành:</span> ' + tour[i]['day-start'] + ' ' +
            //                 ' </p>' +
            //                 '  <div class="d-flex justify-content-between">' +
            //                 '   <a class="item-chitiet" href="index.php?controller=chome&action=detail_tour">Xem chi tiết</a>' +
            //                 '</div>' +
            //                 '</div>' +
            //                 ' </div>')
            //         }
            //     }
            //     //nếu ít hơn 1 thì select tour liên quan đến keyword đó đồng thời hiển thị thông tin về place đó.
            //     else
            //     {
            //         alert("uk")
            //         path = "./public/img/tour/"
            //         $('#result p').append('Chúng tôi tìm thấy ' + tour.length + ' tour phù hợp')
            //         $('#in4-tour p').attr('class', 'p-2')
            //         // $('#in4-tour p').append('Địa điểm: <b>' + tour[0]['nameplace'] + '</b><br>' + tour[0]['information'])
            //         $('#in4-tour p').append(tour[0]['information'])
            //         $('#header-tour p').append('Danh sách tour du lịch tại ' + tour[0]['nameplace'])
            //         // alert(tour[0]['information'])
            //         img = tour[0]['hinhanh'].length > 0 ? tour[0]['hinhanh'] : "2b95fc58931487994632121fc1f00833_1_55_10_20_5_2022.jpg"
            //             src = path + img
            //             $('#item-tour').append('<div class="col-sm-3 item-wrap" id="tour">' +
            //                 '<div class="khungchuaimg">' +
            //                 ' <img src="' + src + '" alt="" style="width:100%"></div>' +
            //                 ' <div class="item-meta">' +
            //                 '  <p class="item-tua mb-1">' +
            //                 ' <a class="item-header" href="#">' + tour[0]['nametour'] + '</a>' +
            //                 '  </p>' +
            //                 ' <p class="item-price md-1">' +
            //                 '  <span class="amount" data-price="900000">' + tour[0]['price'] + '</span>' +
            //                 '  <span>VNĐ</span>' +
            //                 '  </p>' +
            //                 ' <p class="item-khoihanh mb-1">' +
            //                 '     <i class="fa-solid fa-clock"></i>' +
            //                 '     <span>Khởi hành:</span> ' + tour[0]['day-start'] + ' ' +
            //                 ' </p>' +
            //                 '  <div class="d-flex justify-content-between">' +
            //                 '   <a class="item-chitiet" href="index.php?controller=chome&action=detail_tour">Xem chi tiết</a>' +
            //                 '</div>' +
            //                 '</div>' +
            //                 ' </div>')
            //     }
            // })
            $.post("index.php?controller=ctour&action=getPlaceByUniqueName", {
                name: name
            }, function(data){
                var tour = JSON.parse(data)
                if(data == '[]')
                {
                    $.post("index.php?controller=ctour&action=getInformationByNamePlace", {
                        name: name
                    }, function(data){
                        var tour = JSON.parse(data)
                        if(data == '[]')
                        {
                            $('#item-tour').append("<h4 class='m-5 p-5 mx-auto text-center bg-warning'>Không tìm thấy kết quả</h4>")
                        }
                        //nếu có nhiều hơn 1 thì select các tour liên quan đến keyword đó
                        else
                        { 
                            path = "./public/img/tour/"
                            $('#result p').append('Chúng tôi tìm thấy ' + tour.length + ' tour phù hợp')
                            for (var i = 0; i < tour.length; i++) {
                                img = tour[i]['hinhanh'].length > 0 ? tour[i]['hinhanh'] : "2b95fc58931487994632121fc1f00833_1_55_10_20_5_2022.jpg"
                                src = path + img
                                $('#item-tour').append('<div class="col-sm-3 item-wrap" id="tour">' +
                                    '<div class="khungchuaimg">' +
                                    ' <img src="' + src + '" alt="" style="width:100%"></div>' +
                                    ' <div class="item-meta">' +
                                    '  <p class="item-tua mb-1">' +
                                    ' <a class="item-header" href="#">' + tour[i]['nametour'] + '</a>' +
                                    '  </p>' +
                                    ' <p class="item-price md-1">' +
                                    '  <span class="amount" data-price="900000">' + tour[i]['price'] + '</span>' +
                                    '  <span>VNĐ</span>' +
                                    '  </p>' +
                                    ' <p class="item-khoihanh mb-1">' +
                                    '     <i class="fa-solid fa-clock"></i>' +
                                    '     <span>Khởi hành:</span> ' + tour[i]['day-start'] + ' ' +
                                    ' </p>' +
                                    '  <div class="d-flex justify-content-between">' +
                                    '   <a class="item-chitiet" href="index.php?controller=chome&action=detail_tour">Xem chi tiết</a>' +
                                    '</div>' +
                                    '</div>' +
                                    ' </div>')
                            }
                        }
                    })
                }
                else
                {
                    path = "./public/img/tour/"
                    $('#result p').append('Chúng tôi tìm thấy ' + tour.length + ' tour phù hợp')
                    $('#in4-tour p').attr('class', 'p-2')
                    // $('#in4-tour p').append('Địa điểm: <b>' + tour[0]['nameplace'] + '</b><br>' + tour[0]['information'])
                    $('#in4-tour p').append(tour[0]['information'])
                    $('#header-tour p').append('Danh sách tour du lịch tại ' + tour[0]['nameplace'])
                    img = tour[0]['hinhanh'].length > 0 ? tour[0]['hinhanh'] : "2b95fc58931487994632121fc1f00833_1_55_10_20_5_2022.jpg"
                        src = path + img
                        $('#item-tour').append('<div class="col-sm-3 item-wrap" id="tour">' +
                            '<div class="khungchuaimg">' +
                            ' <img src="' + src + '" alt="" style="width:100%"></div>' +
                            ' <div class="item-meta">' +
                            '  <p class="item-tua mb-1">' +
                            ' <a class="item-header" href="#">' + tour[0]['nametour'] + '</a>' +
                            '  </p>' +
                            ' <p class="item-price md-1">' +
                            '  <span class="amount" data-price="900000">' + tour[0]['price'] + '</span>' +
                            '  <span>VNĐ</span>' +
                            '  </p>' +
                            ' <p class="item-khoihanh mb-1">' +
                            '     <i class="fa-solid fa-clock"></i>' +
                            '     <span>Khởi hành:</span> ' + tour[0]['day-start'] + ' ' +
                            ' </p>' +
                            '  <div class="d-flex justify-content-between">' +
                            '   <a class="item-chitiet" href="index.php?controller=chome&action=detail_tour">Xem chi tiết</a>' +
                            '</div>' +
                            '</div>' +
                            ' </div>')
                }
            })
        } else {
            var tour = JSON.parse(data)
            path = "./public/img/tour/"
            $('#result p').append('Chúng tôi tìm thấy ' + tour.length + ' tour phù hợp')
            for (var i = 0; i < tour.length; i++) {
                img = tour[i]['hinhanh'].length > 0 ? tour[i]['hinhanh'] : "2b95fc58931487994632121fc1f00833_1_55_10_20_5_2022.jpg"
                src = path + img
                $('#item-tour').append('<div class="col-sm-3 item-wrap" id="tour">' +
                    '<div class="khungchuaimg">' +
                    ' <img src="' + src + '" alt="" style="width:100%"></div>' +
                    ' <div class="item-meta">' +
                    '  <p class="item-tua mb-1">' +
                    ' <a class="item-header" href="#">' + tour[i]['nametour'] + '</a>' +
                    '  </p>' +
                    ' <p class="item-price md-1">' +
                    '  <span class="amount" data-price="900000">' + tour[i]['price'] + '</span>' +
                    '  <span>VNĐ</span>' +
                    '  </p>' +
                    ' <p class="item-khoihanh mb-1">' +
                    '     <i class="fa-solid fa-clock"></i>' +
                    '     <span>Khởi hành:</span> ' + tour[i]['day-start'] + ' ' +
                    ' </p>' +
                    '  <div class="d-flex justify-content-between">' +
                    '   <a class="item-chitiet" href="index.php?controller=chome&action=home&page=detailtour">Xem chi tiết</a>' +
                    '</div>' +
                    '</div>' +
                    ' </div>')
            }
        }
    })

    //--------------------------------------------------------------orderby-----------------------------------------------------
    function arrange() {
        $('#result p').remove()
        $('#item-tour #tour').remove()
        $('#item-tour h4').remove()
        $('#in4-tour p').remove()
        var value = $('#arrange').val()
        if (value == 'idtour') {
            $.post("index.php?controller=ctour&action=getAllTourOrderById", {}, function(data) {
                tour = JSON.parse(data);
                if (tour.length > 0) {
                    $('#result').append('<p>Chúng tôi tìm thấy ' + tour.length + ' tour phù hợp</p>')
                    path = "./public/img/tour/"
                    for (var i = 0; i < tour.length; i++) {
                        img = tour[i]['hinhanh'].length > 0 ? tour[i]['hinhanh'] : "2b95fc58931487994632121fc1f00833_1_55_10_20_5_2022.jpg"
                        src = path + img
                        $('#item-tour').append('<div class="col-sm-3 item-wrap" id="tour">' +
                            '<div class="khungchuaimg">' +
                            ' <img src="' + src + '" alt="" style="width:100%"></div>' +
                            ' <div class="item-meta">' +
                            '  <p class="item-tua mb-1">' +
                            ' <a class="item-header" href="#">' + tour[i]['nametour'] + '</a>' +
                            '  </p>' +
                            ' <p class="item-price md-1">' +
                            '  <span class="amount" data-price="900000">' + tour[i]['price'] + '</span>' +
                            '  <span>VNĐ</span>' +
                            '  </p>' +
                            ' <p class="item-khoihanh mb-1">' +
                            '     <i class="fa-solid fa-clock"></i>' +
                            '     <span>Khởi hành:</span> ' + tour[i]['day-start'] + ' ' +
                            ' </p>' +
                            '  <div class="d-flex justify-content-between">' +
                            '   <a class="item-chitiet" href="index.php?controller=chome&action=detail_tour">Xem chi tiết</a>' +
                            '</div>' +
                            '</div>' +
                            ' </div>')
                    }
                } else {
                    $('#item-tour').append("<h4 class='m-5 p-5 mx-auto text-center bg-warning'>Không tìm thấy kết quả</h4>")
                }
            })
        }
        if (value == 'price') {
            $.post("index.php?controller=ctour&action=getAllTourOrderByPrice", {}, function(data) {
                tour = JSON.parse(data);
                if (tour.length > 0) {
                    $('#result').append('<p>Chúng tôi tìm thấy ' + tour.length + ' tour phù hợp</p>')
                    path = "./public/img/tour/"
                    for (var i = 0; i < tour.length; i++) {
                        img = tour[i]['hinhanh'].length > 0 ? tour[i]['hinhanh'] : "2b95fc58931487994632121fc1f00833_1_55_10_20_5_2022.jpg"
                        src = path + img
                        $('#item-tour').append('<div class="col-sm-3 item-wrap" id="tour">' +
                            '<div class="khungchuaimg">' +
                            ' <img src="' + src + '" alt="" style="width:100%"></div>' +
                            ' <div class="item-meta">' +
                            '  <p class="item-tua mb-1">' +
                            ' <a class="item-header" href="#">' + tour[i]['nametour'] + '</a>' +
                            '  </p>' +
                            ' <p class="item-price md-1">' +
                            '  <span class="amount" data-price="900000">' + tour[i]['price'] + '</span>' +
                            '  <span>VNĐ</span>' +
                            '  </p>' +
                            ' <p class="item-khoihanh mb-1">' +
                            '     <i class="fa-solid fa-clock"></i>' +
                            '     <span>Khởi hành:</span> ' + tour[i]['day-start'] + ' ' +
                            ' </p>' +
                            '  <div class="d-flex justify-content-between">' +
                            '   <a class="item-chitiet" href="index.php?controller=chome&action=detail_tour">Xem chi tiết</a>' +
                            '</div>' +
                            '</div>' +
                            ' </div>')
                    }
                } else {
                    $('#item-tour').append("<h4 class='m-5 p-5 mx-auto text-center bg-warning'>Không tìm thấy kết quả</h4>")
                }
            })
        }
        if (value == 'numberday') {
            $.post("index.php?controller=ctour&action=getAllTourOrderByNumberDay", {}, function(data) {
                tour = JSON.parse(data);
                if (tour.length > 0) {
                    $('#result').append('<p>Chúng tôi tìm thấy ' + tour.length + ' tour phù hợp</p>')
                    path = "./public/img/tour/"
                    for (var i = 0; i < tour.length; i++) {
                        img = tour[i]['hinhanh'].length > 0 ? tour[i]['hinhanh'] : "2b95fc58931487994632121fc1f00833_1_55_10_20_5_2022.jpg"
                        src = path + img
                        $('#item-tour').append('<div class="col-sm-3 item-wrap" id="tour">' +
                            '<div class="khungchuaimg">' +
                            ' <img src="' + src + '" alt="" style="width:100%"></div>' +
                            ' <div class="item-meta">' +
                            '  <p class="item-tua mb-1">' +
                            ' <a class="item-header" href="#">' + tour[i]['nametour'] + '</a>' +
                            '  </p>' +
                            ' <p class="item-price md-1">' +
                            '  <span class="amount" data-price="900000">' + tour[i]['price'] + '</span>' +
                            '  <span>VNĐ</span>' +
                            '  </p>' +
                            ' <p class="item-khoihanh mb-1">' +
                            '     <i class="fa-solid fa-clock"></i>' +
                            '     <span>Khởi hành:</span> ' + tour[i]['day-start'] + ' ' +
                            ' </p>' +
                            '  <div class="d-flex justify-content-between">' +
                            '   <a class="item-chitiet" href="index.php?controller=chome&action=detail_tour">Xem chi tiết</a>' +
                            '</div>' +
                            '</div>' +
                            ' </div>')
                    }
                } else {
                    $('#item-tour').append("<h4 class='m-5 p-5 mx-auto text-center bg-warning'>Không tìm thấy kết quả</h4>")
                }
            })
        }
    }

    //------------------------------------------------------------load select city----------------------------------------------
    document.onload = loadTinh()

    function loadTinh() {
        id_tinh = null
        id_tinh =
            $.ajax({
                url: 'https://provinces.open-api.vn/api/?depth=3',
                method: "GET",
                data: {
                    // id_account: id_account,
                },
                success: function(data) {
                    // console.log(d)
                    for (i = 0; i < data.length; i++) {
                        // huyen = data[i]['districts'][0]['name'];
                        // xa = ['districts'][0]['wards'][1]['name']
                        $('#diemden').append(
                            `
                    <option id='tinh' value="` + data[i]['code'] + `">` + data[i]['name'] + `</option>
                    `
                        )
                        $('#diemdi').append(
                            `
                    <option id='tinh' value="` + data[i]['code'] + `">` + data[i]['name'] + `</option>
                    `
                        )
                    }

                }
            })
    }

    //----------------------------------------------button search-option clicked------------------------------------------

    $('#search-option').on('click', function() {
        $('#result p').remove()
        $('#item-tour #tour').remove()
        $('#item-tour h4').remove()
        $('#in4-tour p').remove()
        var idplace = $('#diemden').val()
        //-----------------------------choose by day-----------------------
        //--1to3--
        if ($('#onetothree').prop("checked")) {
            if ($('#fourtoseven').prop("checked")) {
                alert("Bạn chỉ được chọn duy nhất 1 khoảng thời gian!")
            } else if ($('#eighttofourteen').prop("checked")) {
                alert("Bạn chỉ được chọn duy nhất 1 khoảng thời gian!")
            } else if ($('#overfourteen').prop("checked")) {
                alert("Bạn chỉ được chọn duy nhất 1 khoảng thời gian!")
            } else if ($('#min').prop("checked")) {
                if ($('#max').prop("checked")) {
                    alert('Bạn chỉ được chọn 1 mức giá!');
                } else {
                    $.post("index.php?controller=ctour&action=getAllTourByNumberDayAround1To3AndMinPrice", {
                        idplace: idplace,
                        minprice: min
                    }, function(data) {
                        tour = JSON.parse(data);
                        if (tour.length > 0) {
                            $('#result').append('<p>Chúng tôi tìm thấy ' + tour.length + ' tour phù hợp</p>')
                            path = "./public/img/tour/"
                            for (var i = 0; i < tour.length; i++) {
                                img = tour[i]['hinhanh'].length > 0 ? tour[i]['hinhanh'] : "2b95fc58931487994632121fc1f00833_1_55_10_20_5_2022.jpg"
                                src = path + img
                                $('#item-tour').append('<div class="col-sm-3 item-wrap" id="tour">' +
                                    '<div class="khungchuaimg">' +
                                    ' <img src="' + src + '" alt="" style="width:100%"></div>' +
                                    ' <div class="item-meta">' +
                                    '  <p class="item-tua mb-1">' +
                                    ' <a class="item-header" href="#">' + tour[i]['nametour'] + '</a>' +
                                    '  </p>' +
                                    ' <p class="item-price md-1">' +
                                    '  <span class="amount" data-price="900000">' + tour[i]['price'] + '</span>' +
                                    '  <span>VNĐ</span>' +
                                    '  </p>' +
                                    ' <p class="item-khoihanh mb-1">' +
                                    '     <i class="fa-solid fa-clock"></i>' +
                                    '     <span>Khởi hành:</span> ' + tour[i]['day-start'] + ' ' +
                                    ' </p>' +
                                    '  <div class="d-flex justify-content-between">' +
                                    '   <a class="item-chitiet" href="index.php?controller=chome&action=detail_tour">Xem chi tiết</a>' +
                                    '</div>' +
                                    '</div>' +
                                    ' </div>')
                            }
                        } else {
                            $('#item-tour').append("<h4 class='m-5 p-5 mx-auto text-center bg-warning'>Không tìm thấy kết quả</h4>")
                        }
                    })
                }
            } else if ($('#max').prop("checked")) {
                if ($('#min').prop("checked")) {
                    alert('Bạn chỉ được chọn 1 mức giá!');
                } else {
                    $.post("index.php?controller=ctour&action=getAllTourByNumberDayAround1To3AndMaxPrice", {
                        idplace: idplace,
                        maxprice: max
                    }, function(data) {
                        tour = JSON.parse(data);
                        if (tour.length > 0) {
                            $('#result').append('<p>Chúng tôi tìm thấy ' + tour.length + ' tour phù hợp</p>')
                            path = "./public/img/tour/"
                            for (var i = 0; i < tour.length; i++) {
                                img = tour[i]['hinhanh'].length > 0 ? tour[i]['hinhanh'] : "2b95fc58931487994632121fc1f00833_1_55_10_20_5_2022.jpg"
                                src = path + img
                                $('#item-tour').append('<div class="col-sm-3 item-wrap" id="tour">' +
                                    '<div class="khungchuaimg">' +
                                    ' <img src="' + src + '" alt="" style="width:100%"></div>' +
                                    ' <div class="item-meta">' +
                                    '  <p class="item-tua mb-1">' +
                                    ' <a class="item-header" href="#">' + tour[i]['nametour'] + '</a>' +
                                    '  </p>' +
                                    ' <p class="item-price md-1">' +
                                    '  <span class="amount" data-price="900000">' + tour[i]['price'] + '</span>' +
                                    '  <span>VNĐ</span>' +
                                    '  </p>' +
                                    ' <p class="item-khoihanh mb-1">' +
                                    '     <i class="fa-solid fa-clock"></i>' +
                                    '     <span>Khởi hành:</span> ' + tour[i]['day-start'] + ' ' +
                                    ' </p>' +
                                    '  <div class="d-flex justify-content-between">' +
                                    '   <a class="item-chitiet" href="index.php?controller=chome&action=detail_tour">Xem chi tiết</a>' +
                                    '</div>' +
                                    '</div>' +
                                    ' </div>')
                            }
                        } else {
                            $('#item-tour').append("<h4 class='m-5 p-5 mx-auto text-center bg-warning'>Không tìm thấy kết quả</h4>")
                        }
                    })
                }
            } else {
                $.post("index.php?controller=ctour&action=getAllTourByNumberDayAround1To3", {
                    idplace: idplace
                }, function(data) {
                    tour = JSON.parse(data);
                    if (tour.length > 0) {
                        $('#result').append('<p>Chúng tôi tìm thấy ' + tour.length + ' tour phù hợp</p>')
                        path = "./public/img/tour/"
                        for (var i = 0; i < tour.length; i++) {
                            img = tour[i]['hinhanh'].length > 0 ? tour[i]['hinhanh'] : "2b95fc58931487994632121fc1f00833_1_55_10_20_5_2022.jpg"
                            src = path + img
                            $('#item-tour').append('<div class="col-sm-3 item-wrap" id="tour">' +
                                '<div class="khungchuaimg">' +
                                ' <img src="' + src + '" alt="" style="width:100%"></div>' +
                                ' <div class="item-meta">' +
                                '  <p class="item-tua mb-1">' +
                                ' <a class="item-header" href="#">' + tour[i]['nametour'] + '</a>' +
                                '  </p>' +
                                ' <p class="item-price md-1">' +
                                '  <span class="amount" data-price="900000">' + tour[i]['price'] + '</span>' +
                                '  <span>VNĐ</span>' +
                                '  </p>' +
                                ' <p class="item-khoihanh mb-1">' +
                                '     <i class="fa-solid fa-clock"></i>' +
                                '     <span>Khởi hành:</span> ' + tour[i]['day-start'] + ' ' +
                                ' </p>' +
                                '  <div class="d-flex justify-content-between">' +
                                '   <a class="item-chitiet" href="index.php?controller=chome&action=detail_tour">Xem chi tiết</a>' +
                                '</div>' +
                                '</div>' +
                                ' </div>')
                        }
                    } else {
                        $('#item-tour').append("<h4 class='m-5 p-5 mx-auto text-center bg-warning'>Không tìm thấy kết quả</h4>")
                    }
                })
            }
        }
        //--4to7-- 
        else if ($('#fourtoseven').prop("checked")) {
            if ($('#onetothree').prop("checked")) {
                alert("Bạn chỉ được chọn duy nhất 1 khoảng thời gian!")
            } else if ($('#eighttofourteen').prop("checked")) {
                alert("Bạn chỉ được chọn duy nhất 1 khoảng thời gian!")
            } else if ($('#overfourteen').prop("checked")) {
                alert("Bạn chỉ được chọn duy nhất 1 khoảng thời gian!")
            } 
            else if ($('#min').prop("checked")) {
                if ($('#max').prop("checked")) {
                    alert('Bạn chỉ được chọn 1 mức giá!');
                } else {
                    $.post("index.php?controller=ctour&action=getAllTourByNumberDayAround4To7AndMinPrice", {
                        idplace: idplace,
                        minprice: min
                    }, function(data) {
                        tour = JSON.parse(data);
                        if (tour.length > 0) {
                            $('#result').append('<p>Chúng tôi tìm thấy ' + tour.length + ' tour phù hợp</p>')
                            path = "./public/img/tour/"
                            for (var i = 0; i < tour.length; i++) {
                                img = tour[i]['hinhanh'].length > 0 ? tour[i]['hinhanh'] : "2b95fc58931487994632121fc1f00833_1_55_10_20_5_2022.jpg"
                                src = path + img
                                $('#item-tour').append('<div class="col-sm-3 item-wrap" id="tour">' +
                                    '<div class="khungchuaimg">' +
                                    ' <img src="' + src + '" alt="" style="width:100%"></div>' +
                                    ' <div class="item-meta">' +
                                    '  <p class="item-tua mb-1">' +
                                    ' <a class="item-header" href="#">' + tour[i]['nametour'] + '</a>' +
                                    '  </p>' +
                                    ' <p class="item-price md-1">' +
                                    '  <span class="amount" data-price="900000">' + tour[i]['price'] + '</span>' +
                                    '  <span>VNĐ</span>' +
                                    '  </p>' +
                                    ' <p class="item-khoihanh mb-1">' +
                                    '     <i class="fa-solid fa-clock"></i>' +
                                    '     <span>Khởi hành:</span> ' + tour[i]['day-start'] + ' ' +
                                    ' </p>' +
                                    '  <div class="d-flex justify-content-between">' +
                                    '   <a class="item-chitiet" href="index.php?controller=chome&action=detail_tour">Xem chi tiết</a>' +
                                    '</div>' +
                                    '</div>' +
                                    ' </div>')
                            }
                        } else {
                            $('#item-tour').append("<h4 class='m-5 p-5 mx-auto text-center bg-warning'>Không tìm thấy kết quả</h4>")
                        }
                    })
                }
            } 
            else if ($('#max').prop("checked")) {
                if ($('#min').prop("checked")) {
                    alert('Bạn chỉ được chọn 1 mức giá!');
                } else {
                    $.post("index.php?controller=ctour&action=getAllTourByNumberDayAround4To7AndMaxPrice", {
                        idplace: idplace,
                        maxprice: max
                    }, function(data) {
                        tour = JSON.parse(data);
                        if (tour.length > 0) {
                            $('#result').append('<p>Chúng tôi tìm thấy ' + tour.length + ' tour phù hợp</p>')
                            path = "./public/img/tour/"
                            for (var i = 0; i < tour.length; i++) {
                                img = tour[i]['hinhanh'].length > 0 ? tour[i]['hinhanh'] : "2b95fc58931487994632121fc1f00833_1_55_10_20_5_2022.jpg"
                                src = path + img
                                $('#item-tour').append('<div class="col-sm-3 item-wrap" id="tour">' +
                                    '<div class="khungchuaimg">' +
                                    ' <img src="' + src + '" alt="" style="width:100%"></div>' +
                                    ' <div class="item-meta">' +
                                    '  <p class="item-tua mb-1">' +
                                    ' <a class="item-header" href="#">' + tour[i]['nametour'] + '</a>' +
                                    '  </p>' +
                                    ' <p class="item-price md-1">' +
                                    '  <span class="amount" data-price="900000">' + tour[i]['price'] + '</span>' +
                                    '  <span>VNĐ</span>' +
                                    '  </p>' +
                                    ' <p class="item-khoihanh mb-1">' +
                                    '     <i class="fa-solid fa-clock"></i>' +
                                    '     <span>Khởi hành:</span> ' + tour[i]['day-start'] + ' ' +
                                    ' </p>' +
                                    '  <div class="d-flex justify-content-between">' +
                                    '   <a class="item-chitiet" href="index.php?controller=chome&action=detail_tour">Xem chi tiết</a>' +
                                    '</div>' +
                                    '</div>' +
                                    ' </div>')
                            }
                        } else {
                            $('#item-tour').append("<h4 class='m-5 p-5 mx-auto text-center bg-warning'>Không tìm thấy kết quả</h4>")
                        }
                    })
                }
            } 
            else {
                $.post("index.php?controller=ctour&action=getAllTourByNumberDayAround4To7", {
                    idplace: idplace
                }, function(data) {
                    tour = JSON.parse(data);
                    if (tour.length > 0) {
                        $('#result').append('<p>Chúng tôi tìm thấy ' + tour.length + ' tour phù hợp</p>')
                        path = "./public/img/tour/"
                        for (var i = 0; i < tour.length; i++) {
                            img = tour[i]['hinhanh'].length > 0 ? tour[i]['hinhanh'] : "2b95fc58931487994632121fc1f00833_1_55_10_20_5_2022.jpg"
                            src = path + img
                            $('#item-tour').append('<div class="col-sm-3 item-wrap" id="tour">' +
                                '<div class="khungchuaimg">' +
                                ' <img src="' + src + '" alt="" style="width:100%"></div>' +
                                ' <div class="item-meta">' +
                                '  <p class="item-tua mb-1">' +
                                ' <a class="item-header" href="#">' + tour[i]['nametour'] + '</a>' +
                                '  </p>' +
                                ' <p class="item-price md-1">' +
                                '  <span class="amount" data-price="900000">' + tour[i]['price'] + '</span>' +
                                '  <span>VNĐ</span>' +
                                '  </p>' +
                                ' <p class="item-khoihanh mb-1">' +
                                '     <i class="fa-solid fa-clock"></i>' +
                                '     <span>Khởi hành:</span> ' + tour[i]['day-start'] + ' ' +
                                ' </p>' +
                                '  <div class="d-flex justify-content-between">' +
                                '   <a class="item-chitiet" href="index.php?controller=chome&action=detail_tour">Xem chi tiết</a>' +
                                '</div>' +
                                '</div>' +
                                ' </div>')
                        }
                    } else {
                        $('#item-tour').append("<h4 class='m-5 p-5 mx-auto text-center bg-warning'>Không tìm thấy kết quả</h4>")
                    }
                })
            }
        } 
        //--8to14--
        else if ($('#eighttofourteen').prop("checked")) {
            if ($('#onetothree').prop("checked")) {
                alert("Bạn chỉ được chọn duy nhất 1 khoảng thời gian!")
            } else if ($('#fourtoseven').prop("checked")) {
                alert("Bạn chỉ được chọn duy nhất 1 khoảng thời gian!")
            } else if ($('#overfourteen').prop("checked")) {
                alert("Bạn chỉ được chọn duy nhất 1 khoảng thời gian!")
            } 
            else if ($('#min').prop("checked")) {
                if ($('#max').prop("checked")) {
                    alert('Bạn chỉ được chọn 1 mức giá!');
                } else {
                    $.post("index.php?controller=ctour&action=getAllTourByNumberDayAround8To14AndMinPrice", {
                        idplace: idplace,
                        minprice: min
                    }, function(data) {
                        tour = JSON.parse(data);
                        if (tour.length > 0) {
                            $('#result').append('<p>Chúng tôi tìm thấy ' + tour.length + ' tour phù hợp</p>')
                            path = "./public/img/tour/"
                            for (var i = 0; i < tour.length; i++) {
                                img = tour[i]['hinhanh'].length > 0 ? tour[i]['hinhanh'] : "2b95fc58931487994632121fc1f00833_1_55_10_20_5_2022.jpg"
                                src = path + img
                                $('#item-tour').append('<div class="col-sm-3 item-wrap" id="tour">' +
                                    '<div class="khungchuaimg">' +
                                    ' <img src="' + src + '" alt="" style="width:100%"></div>' +
                                    ' <div class="item-meta">' +
                                    '  <p class="item-tua mb-1">' +
                                    ' <a class="item-header" href="#">' + tour[i]['nametour'] + '</a>' +
                                    '  </p>' +
                                    ' <p class="item-price md-1">' +
                                    '  <span class="amount" data-price="900000">' + tour[i]['price'] + '</span>' +
                                    '  <span>VNĐ</span>' +
                                    '  </p>' +
                                    ' <p class="item-khoihanh mb-1">' +
                                    '     <i class="fa-solid fa-clock"></i>' +
                                    '     <span>Khởi hành:</span> ' + tour[i]['day-start'] + ' ' +
                                    ' </p>' +
                                    '  <div class="d-flex justify-content-between">' +
                                    '   <a class="item-chitiet" href="index.php?controller=chome&action=detail_tour">Xem chi tiết</a>' +
                                    '</div>' +
                                    '</div>' +
                                    ' </div>')
                            }
                        } else {
                            $('#item-tour').append("<h4 class='m-5 p-5 mx-auto text-center bg-warning'>Không tìm thấy kết quả</h4>")
                        }
                    })
                }
            } 
            else if ($('#max').prop("checked")) {
                if ($('#min').prop("checked")) {
                    alert('Bạn chỉ được chọn 1 mức giá!');
                } else {
                    $.post("index.php?controller=ctour&action=getAllTourByNumberDayAround8To14AndMaxPrice", {
                        idplace: idplace,
                        maxprice: max
                    }, function(data) {
                        tour = JSON.parse(data);
                        if (tour.length > 0) {
                            $('#result').append('<p>Chúng tôi tìm thấy ' + tour.length + ' tour phù hợp</p>')
                            path = "./public/img/tour/"
                            for (var i = 0; i < tour.length; i++) {
                                img = tour[i]['hinhanh'].length > 0 ? tour[i]['hinhanh'] : "2b95fc58931487994632121fc1f00833_1_55_10_20_5_2022.jpg"
                                src = path + img
                                $('#item-tour').append('<div class="col-sm-3 item-wrap" id="tour">' +
                                    '<div class="khungchuaimg">' +
                                    ' <img src="' + src + '" alt="" style="width:100%"></div>' +
                                    ' <div class="item-meta">' +
                                    '  <p class="item-tua mb-1">' +
                                    ' <a class="item-header" href="#">' + tour[i]['nametour'] + '</a>' +
                                    '  </p>' +
                                    ' <p class="item-price md-1">' +
                                    '  <span class="amount" data-price="900000">' + tour[i]['price'] + '</span>' +
                                    '  <span>VNĐ</span>' +
                                    '  </p>' +
                                    ' <p class="item-khoihanh mb-1">' +
                                    '     <i class="fa-solid fa-clock"></i>' +
                                    '     <span>Khởi hành:</span> ' + tour[i]['day-start'] + ' ' +
                                    ' </p>' +
                                    '  <div class="d-flex justify-content-between">' +
                                    '   <a class="item-chitiet" href="index.php?controller=chome&action=detail_tour">Xem chi tiết</a>' +
                                    '</div>' +
                                    '</div>' +
                                    ' </div>')
                            }
                        } else {
                            $('#item-tour').append("<h4 class='m-5 p-5 mx-auto text-center bg-warning'>Không tìm thấy kết quả</h4>")
                        }
                    })
                }
            } 
            else {
                $.post("index.php?controller=ctour&action=getAllTourByNumberDayAround8To14", {
                    idplace: idplace
                }, function(data) {
                    tour = JSON.parse(data);
                    if (tour.length > 0) {
                        $('#result').append('<p>Chúng tôi tìm thấy ' + tour.length + ' tour phù hợp</p>')
                        path = "./public/img/tour/"
                        for (var i = 0; i < tour.length; i++) {
                            img = tour[i]['hinhanh'].length > 0 ? tour[i]['hinhanh'] : "2b95fc58931487994632121fc1f00833_1_55_10_20_5_2022.jpg"
                            src = path + img
                            $('#item-tour').append('<div class="col-sm-3 item-wrap" id="tour">' +
                                '<div class="khungchuaimg">' +
                                ' <img src="' + src + '" alt="" style="width:100%"></div>' +
                                ' <div class="item-meta">' +
                                '  <p class="item-tua mb-1">' +
                                ' <a class="item-header" href="#">' + tour[i]['nametour'] + '</a>' +
                                '  </p>' +
                                ' <p class="item-price md-1">' +
                                '  <span class="amount" data-price="900000">' + tour[i]['price'] + '</span>' +
                                '  <span>VNĐ</span>' +
                                '  </p>' +
                                ' <p class="item-khoihanh mb-1">' +
                                '     <i class="fa-solid fa-clock"></i>' +
                                '     <span>Khởi hành:</span> ' + tour[i]['day-start'] + ' ' +
                                ' </p>' +
                                '  <div class="d-flex justify-content-between">' +
                                '   <a class="item-chitiet" href="index.php?controller=chome&action=detail_tour">Xem chi tiết</a>' +
                                '</div>' +
                                '</div>' +
                                ' </div>')
                        }
                    } else {
                        $('#item-tour').append("<h4 class='m-5 p-5 mx-auto text-center bg-warning'>Không tìm thấy kết quả</h4>")
                    }
                })
            }
        } 
        //--over14---
        else if ($('#overfourteen').prop("checked")) {
            if ($('#onetothree').prop("checked")) {
                alert("Bạn chỉ được chọn duy nhất 1 khoảng thời gian!")
            } else if ($('#fourtoseven').prop("checked")) {
                alert("Bạn chỉ được chọn duy nhất 1 khoảng thời gian!")
            } else if ($('#eighttofourteen').prop("checked")) {
                alert("Bạn chỉ được chọn duy nhất 1 khoảng thời gian!")
            } 
            else if ($('#min').prop("checked")) {
                if ($('#max').prop("checked")) {
                    alert('Bạn chỉ được chọn 1 mức giá!');
                } else {
                    $.post("index.php?controller=ctour&action=getAllTourByNumberDayOver14AndMinPrice", {
                        idplace: idplace,
                        minprice: min
                    }, function(data) {
                        tour = JSON.parse(data);
                        if (tour.length > 0) {
                            $('#result').append('<p>Chúng tôi tìm thấy ' + tour.length + ' tour phù hợp</p>')
                            path = "./public/img/tour/"
                            for (var i = 0; i < tour.length; i++) {
                                img = tour[i]['hinhanh'].length > 0 ? tour[i]['hinhanh'] : "2b95fc58931487994632121fc1f00833_1_55_10_20_5_2022.jpg"
                                src = path + img
                                $('#item-tour').append('<div class="col-sm-3 item-wrap" id="tour">' +
                                    '<div class="khungchuaimg">' +
                                    ' <img src="' + src + '" alt="" style="width:100%"></div>' +
                                    ' <div class="item-meta">' +
                                    '  <p class="item-tua mb-1">' +
                                    ' <a class="item-header" href="#">' + tour[i]['nametour'] + '</a>' +
                                    '  </p>' +
                                    ' <p class="item-price md-1">' +
                                    '  <span class="amount" data-price="900000">' + tour[i]['price'] + '</span>' +
                                    '  <span>VNĐ</span>' +
                                    '  </p>' +
                                    ' <p class="item-khoihanh mb-1">' +
                                    '     <i class="fa-solid fa-clock"></i>' +
                                    '     <span>Khởi hành:</span> ' + tour[i]['day-start'] + ' ' +
                                    ' </p>' +
                                    '  <div class="d-flex justify-content-between">' +
                                    '   <a class="item-chitiet" href="index.php?controller=chome&action=detail_tour">Xem chi tiết</a>' +
                                    '</div>' +
                                    '</div>' +
                                    ' </div>')
                            }
                        } else {
                            $('#item-tour').append("<h4 class='m-5 p-5 mx-auto text-center bg-warning'>Không tìm thấy kết quả</h4>")
                        }
                    })
                }
            } 
            else if ($('#max').prop("checked")) {
                if ($('#min').prop("checked")) {
                    alert('Bạn chỉ được chọn 1 mức giá!');
                } else {
                    $.post("index.php?controller=ctour&action=getAllTourByNumberDayOver14AndMaxPrice", {
                        idplace: idplace,
                        maxprice: max
                    }, function(data) {
                        tour = JSON.parse(data);
                        if (tour.length > 0) {
                            $('#result').append('<p>Chúng tôi tìm thấy ' + tour.length + ' tour phù hợp</p>')
                            path = "./public/img/tour/"
                            for (var i = 0; i < tour.length; i++) {
                                img = tour[i]['hinhanh'].length > 0 ? tour[i]['hinhanh'] : "2b95fc58931487994632121fc1f00833_1_55_10_20_5_2022.jpg"
                                src = path + img
                                $('#item-tour').append('<div class="col-sm-3 item-wrap" id="tour">' +
                                    '<div class="khungchuaimg">' +
                                    ' <img src="' + src + '" alt="" style="width:100%"></div>' +
                                    ' <div class="item-meta">' +
                                    '  <p class="item-tua mb-1">' +
                                    ' <a class="item-header" href="#">' + tour[i]['nametour'] + '</a>' +
                                    '  </p>' +
                                    ' <p class="item-price md-1">' +
                                    '  <span class="amount" data-price="900000">' + tour[i]['price'] + '</span>' +
                                    '  <span>VNĐ</span>' +
                                    '  </p>' +
                                    ' <p class="item-khoihanh mb-1">' +
                                    '     <i class="fa-solid fa-clock"></i>' +
                                    '     <span>Khởi hành:</span> ' + tour[i]['day-start'] + ' ' +
                                    ' </p>' +
                                    '  <div class="d-flex justify-content-between">' +
                                    '   <a class="item-chitiet" href="index.php?controller=chome&action=detail_tour">Xem chi tiết</a>' +
                                    '</div>' +
                                    '</div>' +
                                    ' </div>')
                            }
                        } else {
                            $('#item-tour').append("<h4 class='m-5 p-5 mx-auto text-center bg-warning'>Không tìm thấy kết quả</h4>")
                        }
                    })
                }
            } 
            else {
                $.post("index.php?controller=ctour&action=getAllTourByNumberDayOver14", {
                    idplace: idplace
                }, function(data) {
                    tour = JSON.parse(data);
                    if (tour.length > 0) {
                        $('#result').append('<p>Chúng tôi tìm thấy ' + tour.length + ' tour phù hợp</p>')
                        path = "./public/img/tour/"
                        for (var i = 0; i < tour.length; i++) {
                            img = tour[i]['hinhanh'].length > 0 ? tour[i]['hinhanh'] : "2b95fc58931487994632121fc1f00833_1_55_10_20_5_2022.jpg"
                            src = path + img
                            $('#item-tour').append('<div class="col-sm-3 item-wrap" id="tour">' +
                                '<div class="khungchuaimg">' +
                                ' <img src="' + src + '" alt="" style="width:100%"></div>' +
                                ' <div class="item-meta">' +
                                '  <p class="item-tua mb-1">' +
                                ' <a class="item-header" href="#">' + tour[i]['nametour'] + '</a>' +
                                '  </p>' +
                                ' <p class="item-price md-1">' +
                                '  <span class="amount" data-price="900000">' + tour[i]['price'] + '</span>' +
                                '  <span>VNĐ</span>' +
                                '  </p>' +
                                ' <p class="item-khoihanh mb-1">' +
                                '     <i class="fa-solid fa-clock"></i>' +
                                '     <span>Khởi hành:</span> ' + tour[i]['day-start'] + ' ' +
                                ' </p>' +
                                '  <div class="d-flex justify-content-between">' +
                                '   <a class="item-chitiet" href="index.php?controller=chome&action=detail_tour">Xem chi tiết</a>' +
                                '</div>' +
                                '</div>' +
                                ' </div>')
                        }
                    } else {
                        $('#item-tour').append("<h4 class='m-5 p-5 mx-auto text-center bg-warning'>Không tìm thấy kết quả</h4>")
                    }
                })
            }
        }
        //--------------------------choose by price--------------------------
        else if ($('#min').prop("checked")) {
            if ($('#max').prop("checked")) {
                alert('Bạn chỉ được chọn 1 mức giá!');
            } else {
                $.post("index.php?controller=ctour&action=getCityByIdAndMinPrice", {
                    idplace: idplace,
                    minprice: min
                }, function(data) {
                    tour = JSON.parse(data);
                    if (tour.length > 0) {
                        $('#result').append('<p>Chúng tôi tìm thấy ' + tour.length + ' tour phù hợp</p>')
                        path = "./public/img/tour/"
                        for (var i = 0; i < tour.length; i++) {
                            img = tour[i]['hinhanh'].length > 0 ? tour[i]['hinhanh'] : "2b95fc58931487994632121fc1f00833_1_55_10_20_5_2022.jpg"
                            src = path + img
                            $('#item-tour').append('<div class="col-sm-3 item-wrap" id="tour">' +
                                '<div class="khungchuaimg">' +
                                ' <img src="' + src + '" alt="" style="width:100%"></div>' +
                                ' <div class="item-meta">' +
                                '  <p class="item-tua mb-1">' +
                                ' <a class="item-header" href="#">' + tour[i]['nametour'] + '</a>' +
                                '  </p>' +
                                ' <p class="item-price md-1">' +
                                '  <span class="amount" data-price="900000">' + tour[i]['price'] + '</span>' +
                                '  <span>VNĐ</span>' +
                                '  </p>' +
                                ' <p class="item-khoihanh mb-1">' +
                                '     <i class="fa-solid fa-clock"></i>' +
                                '     <span>Khởi hành:</span> ' + tour[i]['day-start'] + ' ' +
                                ' </p>' +
                                '  <div class="d-flex justify-content-between">' +
                                '   <a class="item-chitiet" href="index.php?controller=chome&action=detail_tour">Xem chi tiết</a>' +
                                '</div>' +
                                '</div>' +
                                ' </div>')
                        }
                    } else {
                        $('#item-tour').append("<h4 class='m-5 p-5 mx-auto text-center bg-warning'>Không tìm thấy kết quả</h4>")
                    }
                })
            }
        } else if ($('#max').prop("checked")) {
            if ($('#min').prop("checked")) {
                alert('Bạn chỉ được chọn 1 mức giá!');
            } else {
                $.post("index.php?controller=ctour&action=getCityByIdAndMaxPrice", {
                    idplace: idplace,
                    maxprice: max
                }, function(data) {
                    tour = JSON.parse(data);
                    if (tour.length > 0) {
                        $('#result').append('<p>Chúng tôi tìm thấy ' + tour.length + ' tour phù hợp</p>')
                        path = "./public/img/tour/"
                        for (var i = 0; i < tour.length; i++) {
                            img = tour[i]['hinhanh'].length > 0 ? tour[i]['hinhanh'] : "2b95fc58931487994632121fc1f00833_1_55_10_20_5_2022.jpg"
                            src = path + img
                            $('#item-tour').append('<div class="col-sm-3 item-wrap" id="tour">' +
                                '<div class="khungchuaimg">' +
                                ' <img src="' + src + '" alt="" style="width:100%"></div>' +
                                ' <div class="item-meta">' +
                                '  <p class="item-tua mb-1">' +
                                ' <a class="item-header" href="#">' + tour[i]['nametour'] + '</a>' +
                                '  </p>' +
                                ' <p class="item-price md-1">' +
                                '  <span class="amount" data-price="900000">' + tour[i]['price'] + '</span>' +
                                '  <span>VNĐ</span>' +
                                '  </p>' +
                                ' <p class="item-khoihanh mb-1">' +
                                '     <i class="fa-solid fa-clock"></i>' +
                                '     <span>Khởi hành:</span> ' + tour[i]['day-start'] + ' ' +
                                ' </p>' +
                                '  <div class="d-flex justify-content-between">' +
                                '   <a class="item-chitiet" href="index.php?controller=chome&action=detail_tour">Xem chi tiết</a>' +
                                '</div>' +
                                '</div>' +
                                ' </div>')
                        }
                    } else {
                        $('#item-tour').append("<h4 class='m-5 p-5 mx-auto text-center bg-warning'>Không tìm thấy kết quả</h4>")
                    }
                })
            }
        } else {
            $.post("index.php?controller=ctour&action=getCityById", {
                idplace: idplace
            }, function(data) {
                tour = JSON.parse(data);
                if (tour.length > 0) {
                    $('#result').append('<p>Chúng tôi tìm thấy ' + tour.length + ' tour phù hợp</p>')
                    $('#in4-tour ').append('<p>Địa điểm: <b>' + tour[0]['nameplace'] + '</b><br>' + tour[0]['information'] + '</p>')
                    path = "./public/img/tour/"
                    for (var i = 0; i < tour.length; i++) {
                        img = tour[i]['hinhanh'].length > 0 ? tour[i]['hinhanh'] : "2b95fc58931487994632121fc1f00833_1_55_10_20_5_2022.jpg"
                        src = path + img
                        $('#item-tour').append('<div class="col-sm-3 item-wrap" id="tour">' +
                            '<div class="khungchuaimg">' +
                            ' <img src="' + src + '" alt="" style="width:100%"></div>' +
                            ' <div class="item-meta">' +
                            '  <p class="item-tua mb-1">' +
                            ' <a class="item-header" href="#">' + tour[i]['nametour'] + '</a>' +
                            '  </p>' +
                            ' <p class="item-price md-1">' +
                            '  <span class="amount" data-price="900000">' + tour[i]['price'] + '</span>' +
                            '  <span>VNĐ</span>' +
                            '  </p>' +
                            ' <p class="item-khoihanh mb-1">' +
                            '     <i class="fa-solid fa-clock"></i>' +
                            '     <span>Khởi hành:</span> ' + tour[i]['day-start'] + ' ' +
                            ' </p>' +
                            '  <div class="d-flex justify-content-between">' +
                            '   <a class="item-chitiet" href="index.php?controller=chome&action=detail_tour">Xem chi tiết</a>' +
                            '</div>' +
                            '</div>' +
                            ' </div>')
                    }
                } else {
                    $('#item-tour').append("<h4 class='m-5 p-5 mx-auto text-center bg-warning'>Không tìm thấy kết quả</h4>")
                }
            })
        }
    })
</script>