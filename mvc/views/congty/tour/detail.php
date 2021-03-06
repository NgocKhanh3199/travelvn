<link rel="stylesheet" href="./public/css/company.css">
<script src="./public/js/js.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<div class="container">
    <div class="nd">
        <div class="thongtinchung" id="diadanh">

        </div>
    </div>
    <div class="container container-form">
        <div class="frame1" id="detail-tour"  action="" method="">
            <!-- <div class="gr-item-detail">
                <div class="item_tour">
                    <span class="name-item">Tên Tour</span>
                    <label for="text">ww</label>
                </div>
                <div class="item_tour">
                    <span class="name-item">Nơi xuất phát</span>
                    <label for="text"></label>
                </div>
            </div>
            <div class="gr-item-detail">
                <div class="item_tour">
                    <span class="name-item">Giá người lớn</span>
                    <label for="text">wsa</label>
                </div>
                <div class="item_tour">
                    <span class="name-item">Giá trẻ em</span>
                    <label for="text">sss</label>
                </div>
            </div>
            <div class="gr-item-detail">
                <div class="item_tour">
                    <span class="name-item">Ngày Bắt Đầu</span>
                    <label for="text"></label>
                </div>
                <div class="item_tour">
                    <span class="name-item">Ngày Kết Thúc</span>
                    <label for="text"></label>
                </div>
            </div>
            <div class="gr-item-detail">
                <div class="item_tour" id="number-day1">
                    <span class="name-item">Số Lượng Ngày</span>
                    <label for="text"></label>
                </div>
                <div class="item_tour" id="number-night1">
                    <span class="name-item">Số Lượng Đêm</span>
                    <label for="text"></label>
                </div>
            </div>
            <div class="gr-item-detail">
                <div class="item_tour">
                    <span class="name-item">Vận chuyển</span>
                    <label for="text"></label>
                </div>
                <div class="item_tour">
                    <span class="name-item">Mô Tả</span>
                    <label for="text"></label>
                </div>

            </div>
            <div class="gr-item-detail">
                <div class="item_tour">
                    <span class="name-item">Dịch vụ bao gồm và không bao gồm</span>
                    <label for="text"></label>
                </div>
                <div class="item_tour">
                    <span class="name-item">Lịch trình</span>
                    <label for="text"></label>
                </div>
            </div>
            <div class="place text-start">
                <h4 class="header-place">Điểm đến: </h4>
                <div class="item-place" id="item-place">

                </div>

            </div>

            <div class="button-group">
                <a href="index.php?controller=chome&action=company&path=tour&idcompany=<?php echo $_SESSION['idcompany'] ?>" class="btn btn-primary" type="button">Thoát</a>
            </div> -->
        </div>
    </div>
</div>
<script>
    var idTour = <?= $_GET['idTour'] ?>;
    document.onload = load()

    function load() {
        loadTourByIdtour();
        loadplace();
    }

    function loadTourByIdtour() {
        pathhinhanhtour = "./public/img/tour/";
       
        $.post("index.php?controller=ctour&action=getTourByIdTour", {
            idTour: idTour,

        }, function(data) {
            Tour = JSON.parse(data);
            t = Tour[0];

            idtinh = t['place_start'];
            $.ajax({
                url: 'https://provinces.open-api.vn/api/p/' + idtinh + '?depth=1',
                method: "GET",
                rs: {

                },
                success: function(rs) {
                    place_start = rs['name']
                    $('#start_place1').append(`
                        <span class="name-item">Nơi xuất phát</span>
                        <label class="in4-item" for="text">` + rs['name'] + `</label>
                    `)
                }
            })
            hinhanh = t['hinhanh']
            if (hinhanh.length == 0) {
                hinhanh = 'noimg.png'
            }
            hinhanh = pathhinhanhtour + hinhanh

            hinhanh1 = t['hinhanh1']
            if (hinhanh1.length == 0) {
                hinhanh1 = 'noimg.png'
            }
            hinhanh1 = pathhinhanhtour + hinhanh1

            hinhanh2 = t['hinhanh2']
            if (hinhanh2.length == 0) {
                hinhanh2 = 'noimg.png'
            }
            hinhanh2 = pathhinhanhtour + hinhanh2

            hinhanh3 = t['hinhanh3']
            if (hinhanh3.length == 0) {
                hinhanh3 = 'noimg.png'
            }
            hinhanh3 = pathhinhanhtour + hinhanh3

            $('#detail-tour').append(`
             
                <div class="gr-item-detail">
                    <div class="item_tour">
                        <span class="name-item">Giá người lớn</span>
                        <label class="in4-item" for="text">` + t['price-adult'] + `</label>
                    </div>
                    <div class="item_tour">
                        <span class="name-item">Giá trẻ em</span>
                        <label class="in4-item" for="text">` + t['price-child'] + `</label>
                    </div>
                </div>
                <div class="gr-item-detail">
                    <div class="item_tour">
                        <span class="name-item">Ngày Bắt Đầu</span>
                        <label class="in4-item" for="text">` + t['day-start'] + `</label>
                    </div>
                    <div class="item_tour">
                        <span class="name-item">Ngày Kết Thúc</span>
                        <label class="in4-item" for="text">` + t['day-end'] + `</label>
                    </div>
                </div>
                <div class="gr-item-detail">
                    <div class="item_tour" id="number-day1">
                        <span class="name-item">Số Lượng Ngày</span>
                        <label class="in4-item" for="text">` + t['numberday'] + `</label>
                    </div>
                    <div class="item_tour" id="number-night1">
                        <span class="name-item">Số Lượng Đêm</span>
                        <label class="in4-item" for="text">` + t['numbernight'] + `</label>
                    </div>
                </div>
                <div class="gr-item-detail">
                    <div class="item_tour">
                        <span class="name-item" >Vận chuyển</span>
                        <label class="in4-item" for="text">` + t['transport'] + `</label>
                    </div>
                    <div class="item_tour" id="start_place1">
                        
                        </div>

                </div>
                <div class="item_tour">
                        <span class="m" style="flex-basis: 15%;">Mô Tả</span>
                        <label class="in4-itemm" for="text" >` + t['information'] + `</label>
                    </div>
                    
                    <div class="item_tour">
                        <span class="m" style="flex-basis: 15%;">Lịch trình</span>
                        <label class="in4-itemm" for="text">` + t['schedule'] + `</label>
                    </div>
                    <div class="item_tour">
                        <span class="m" style="flex-basis: 15%;">Dịch vụ bao gồm và không bao gồm</span>
                        <label class="in4-itemm" for="text">` + t['service_not_include'] + `</label>
                    </div>
              
                <div class="place text-start">
                    <h4 class="header-place">Điểm đến: </h4>
                    <div class="item-place" id="item-place">

                    </div>

                </div>

                <div class="button-group">
                    <a href="index.php?controller=chome&action=company&path=tour&idcompany=<?php echo $_SESSION['idcompany'] ?>" class="btn btn-primary" type="button">Thoát</a>
                </div>
            `)

            $('#diadanh').append(`
            <label class="in4-item-name" for="text">` + t['nametour'] + `</label>
            <div class="row diadanh">
                    <div class="col-sm-6">
                        <img src="` + hinhanh + `" alt="" class="w-100 rounded" height="500">
                    </div>
                    <div class="col-sm-6 row">
                        <div class="col-sm-6">
                            <img src="` + hinhanh1 + `" alt="" class="w-100 rounded" height="200">
                        </div>
                        <div class="col-sm-6">
                            <img src="` + hinhanh2 + `" alt="" class="w-100 rounded" height="200">
                        </div>
                        <div class="col-sm-12">
                            <img src="` + hinhanh3 + `" alt="" class="w-100 rounded" height="280">
                        </div>
                    </div>
                </div>
            `)
        })

    }

    function loadplace() {
        pathhinhanhplace = "./public/img/diadiem/";
        $.post("index.php?controller=ctour&action=getPlaceByIdTour", {
            idTour: idTour,

        }, function(data) {
            place = JSON.parse(data);
            for (i = 0; i < place.length; i++) {
                nameplace = place[i]['nameplace']
                address = place[i]['full-address']
                in4 = place[i]['information']
                hinhanh = place[i]['hinhanh']
                if (hinhanh.length == 0) {
                    hinhanh = 'noimg.png'
                }
                hinhanh = pathhinhanhplace + hinhanh

                hinhanh1 = place[i]['hinhanh1']
                if (hinhanh1.length == 0) {
                    hinhanh1 = 'noimg.png'
                }
                hinhanh1 = pathhinhanhplace + hinhanh1

                hinhanh2 = place[i]['hinhanh2']
                if (hinhanh2.length == 0) {
                    hinhanh2 = 'noimg.png'
                }
                hinhanh2 = pathhinhanhplace + hinhanh2

                hinhanh3 = place[i]['hinhanh3']
                if (hinhanh3.length == 0) {
                    hinhanh3 = 'noimg.png'
                }
                hinhanh3 = pathhinhanhplace + hinhanh3
                $('#item-place').append(`
                <div class="place-item">
                    <p class="nameplace">` + nameplace + `</p>
                </div>
                <div class="place-item d-flex">
                    <p>Địa chỉ: </p>
                    <p class="address">` + address + `</p>
                </div>
                <div class="place-item d-flex">
                    <p>Mô tả: </p>
                    <p class="in4">` + in4 + `</p>
                </div>
                <div class="places-img container">
                    <div class="place-img">
                        <img src="` + hinhanh + `" alt="" srcset="">
                    </div>
                    <div class="place-img">
                        <img src="` + hinhanh1 + `" alt="" srcset="">
                    </div>
                    <div class="place-img">
                        <img src="` + hinhanh2 + `" alt="" srcset="">
                    </div>
                    <div class="place-img">
                        <img src="` + hinhanh3 + `" alt="" srcset="">
                    </div>
                </div>
            `)

            }
        })
    }
</script>
