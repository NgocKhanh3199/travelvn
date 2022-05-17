<script src="./public/js/js.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<div class="container container-form">
    <h4 class="page-title">SỬA TOUR</h4>
    <form class="frame" action="" method="">
        <div class="input-group">
            <span class="">Tên Tour</span>
            <input id="nametour" type="text" class="form-control" placeholder="Nhập Tên Tour">
        </div>
        <div class="input-group">
            <span class="">Hình ảnh</span>
            <input type="file" id="hinhanh" name="hinhanh[]" multiple="multiple">
        </div>
        <div class="input-group">
            <span class="">Giá</span>
            <input id="price" type="text" class="form-control" placeholder="Nhập Giá">
        </div>
        <div class="input-group">
            <span class="">Ngày Bắt Đầu</span>
            <input id="day-star" type="date" class="form-control" placeholder="Chọn Ngày Bắt Đầu">
        </div>
        <div class="input-group">
            <span class="">Ngày Kết Thúc</span>
            <input onchange="total()" id="day-end" type="date" class="form-control" placeholder="Chọn Ngày Kết Thúc">
        </div>
        <div class="input-group" id="number-day1">
            <span class="">Số Lượng Ngày</span>
            <input value="" type="number" id="number-day" class="form-control" placeholder="Chọn Số Lượng Ngày">
        </div>
        <div class="input-group" id="number-night2">
            <span class="">Số Lượng Đêm</span>
            <input value="" type="number" id="number-night" class="form-control" placeholder="Chọn Số Lượng Đên">
        </div>
        <div class="input-group">
            <span class="">Vận chuyển</span>
            <input id="transport" type="text" class="form-control" placeholder="Loại xe di chuyển">
        </div>
        <div class="input-group">
            <span class="">Nơi xuất phát</span>
            <input id="start_place" type="text" class="form-control" placeholder="Địa điểm xuất phát">
        </div>
        <div class="input-group">
            <span class="">Điểm đến</span>
            <select multiple id="dgb" style="width: 250px;" size="5">

            </select>
        </div>

        <div class="input-group">
            <span class="">Mô Tả</span>
            <textarea id="infotour" aria-colspan="4" type="text" class="form-control" placeholder="Nhập Mô Tả"></textarea>
        </div>
        <div class="input-group">
            <span class="">Dịch vụ bao gồm và không bao gồm</span>
            <textarea id="service" aria-colspan="4" type="text" class="form-control" placeholder="Nhập Mô Tả"></textarea>
        </div>
        <div class="input-group">
            <span class="">Lịch trình</span>
            <textarea id="schedule" aria-colspan="4" type="text" class="form-control" placeholder="Nhập Mô Tả"></textarea>
        </div>

        <div class="button-group">
            <button class="btn btn-primary" onclick="edit()" type="button">Thêm</button>
            <a href="index.php?controller=chome&action=company&path=tour" class="btn btn-primary" type="button">Thoát </a>
        </div>
    </form>
</div>
<script>
    var idTour = <?= $_GET['idTour'] ?>;
    document.onload = loadTourByIdtour()
    document.onload = load()

    function load() {
        loadDiadiem()
    }

    function loadDiadiem() {
        $.post("index.php?controller=cdiadiem&action=getDiadiem", {}, function(data) {
            diadiem = JSON.parse(data)
            for (i = 0; i < diadiem.length; i++) {
                iddiadiem = diadiem[i]['idplace']
                tendiadiem = diadiem[i]['nameplace']
                $('#dgb').append('<option value="' + iddiadiem + '">' + tendiadiem + '</option>')
            }
        })
    }



    function loadTourByIdtour() {
        // console.log(123)
        $('#tamp').remove()
        $('#showimg').append('<div id="tamp"></div>')
        $.post("index.php?controller=ctour&action=getTourByIdTour", {
            idTour: idTour,

        }, function(data) {
            Tour = JSON.parse(data);
            t = Tour[0];
            $('#nametour').val(t['nametour']);
            $('#price').val(t['price']);
            $('#day-end').val(t['day-end']);
            $('#day-star').val(t['day-start']);
            $('#infotour').val(t['infomation']);
            $('#transport').val(t['transport']);
            $('#service').val(t['service']);
            $('#schedule').val(t['schedule']);
            $('#start_place').val(t['start_place']);
            $('#number-night').val(t['numbernight']);
            $('#number-day').val(t['numberday']);
            //---------------
            // path = "/banmypham/public/img/sanpham/"
            // img = sp['hinhanh'].length > 0 ? sp['hinhanh'] : "delivery.png"
            // src = path + img
            // $('#tamp').append('<button id="btn-img"><img src="' + src + '" alt=""></button>')
        })
    }

    // function closeAddTour() {
    //     location.replace("?controller=cTour&action=list");
    // }

    function edit() {
        hinhanh = $('#hinhanh').get(0).files;
        link = uploadFile(hinhanh, 'tour');
        nametour = $('#nametour').val();
        pricetour = $('#price').val();
        dayend = $('#day-end').val();
        daystart = $('#day-star').val();
        numberday =$('#number-day').val();
        numbernight =$('#number-night').val();
        in4tour = $('#infotour').val();
        transport = $('#transport').val();
        service = $('#service').val();
        schedule = $('#schedule').val();
        start_place = $('#start_place').val();
        $.post("index.php?controller=ctour&action=edit", {
            idTour: idTour,
            hinhanh: link,
            nametour: nametour,
            pricetour: pricetour,
            dayend: dayend,
            daystar: daystart,
            numberday: numberday,
            numbernight: numbernight,
            in4tour: in4tour,
            transport: transport,
            service: service,
            schedule: schedule,
            start_place: start_place,
        }, function(data) {
            if (data > 0) {
                alert("Cập nhật thành công");
                window.location.href="index.php?controller=chome&action=company&path=tour"
            } else if (data <= 0) {
                alert("Cập nhật thất bại")
            }
        })

    }

    var $select = $('#dgb');
    var _temp = [];

    $select.mousedown('option', function(e) {
        _temp = $(this).val() || [];
    }).click('option', function(e) {
        var currVal = e.currentTarget.value;

        if (_temp.indexOf(currVal) !== -1) {
            _temp = _temp.filter(function(v) {
                return v != currVal;
            });
        } else {
            _temp.push(currVal);
        }

        $select.find('option').each(function(i, v) {
            $(v).prop('selected', (_temp.indexOf(v.value) !== -1));
        });
    });

    function getLastDayOfMonth(year, month) {
        return new Date(year, month, 0);
    }

    function total() {
        daystar = $('#day-star').val();
        dayend = $('#day-end').val();
        get_start_date = new Date(daystar);
        var start_date = get_start_date.getDate();
        var start_month = get_start_date.getMonth() + 1;
        var start_year = get_start_date.getFullYear();
        get_end_date = new Date(dayend);
        var end_date = get_end_date.getDate();
        var end_month = get_end_date.getMonth() + 1;
        var end_year = get_end_date.getFullYear();

        const lastDayCurrentMonth = getLastDayOfMonth(
            start_year,
            start_month,
        );
        total_startdayofmonth = lastDayCurrentMonth.getDate()

        if (start_month == end_month) {
            numberday = end_date - start_date;
            numbernight = numberday - 1;
            if (numberday < 0) {
                alert("lỗi rồi ngu")
                numberday = null;
                numbernight = null;
            }
        } else if (start_month != end_month) {
            numberday = (total_startdayofmonth - start_date) + end_date;
            numbernight = numberday - 1;
            if (numberday < 0) {
                alert("lỗi rồi ngu")
                numberday = null;
                numbernight = null;
            }
        }
        $('#number-day').empty()
        $('#number-night').empty()
        $('#number-day').append(`
        <span class="">Số Lượng Ngày</span>
            <input value="` + numberday + `" type="number" id="form-control number-day" class="form-control" placeholder="Chọn Số Lượng Ngày">
        `)
        $('#number-night').append(`
        <span class="">Số Lượng Đêm</span>
        <input value="` + numbernight + `" type="number" id="form-control number-night" class="form-control" placeholder="Chọn Số Lượng Đêm">
        `)
    }

    numberday = $('#number-day').val();
    numbernight = $('#number-night').val();

    
</script>