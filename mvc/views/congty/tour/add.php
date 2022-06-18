<script src="./public/js/js.js"></script>
<div class="container container-form">
    <h4 class="page-title">THÊM TOUR MỚI</h4>
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
            <span class="">Số hành khách</span>
            <input type="number" id="total-guest" min="1" class="form-control" placeholder="Số lượng hành khách">
        </div>
        <div class="input-group">
            <span class="">Giá người lớn</span>
            <input id="price-adult" type="text" class="form-control" placeholder="Nhập Giá">
        </div>
        <div class="input-group">
            <span class="">Giá trẻ em</span>
            <input id="price-child" type="text" class="form-control" placeholder="Nhập Giá">
        </div>
        <div class="input-group">
            <span class="">Ngày Bắt Đầu</span>
            <input id="day-star" type="date" class="form-control" placeholder="Chọn Ngày Bắt Đầu">
        </div>
        <div class="input-group">
            <span class="">Ngày Kết Thúc</span>
            <input onchange="total()" id="day-end" type="date" class="form-control" placeholder="Chọn Ngày Kết Thúc">
        </div>
        <div class="input-group" id="number-day">
            <span class="">Số Lượng Ngày</span>
            <input value="` + numberday + `" type="number" id="form-control number-day" class="form-control" placeholder="Chọn Số Lượng Ngày">
        </div>
        <div class="input-group" id="number-night">
            <span class="">Số Lượng Đêm</span>
            <input value="` + numberday + `" type="number" id="form-control number-night" class="form-control" placeholder="Chọn Số Lượng Đên">
        </div>
        <div class="input-group">
            <span class="">Vận chuyển</span>
            <input id="transport" type="text" class="form-control" placeholder="Loại xe di chuyển">
        </div>
        <div class="input-group">
            <span class="">Nơi xuất phát</span>
            <select id="start_place" aria-placeholder="chon tinh" name="hotel_name" class="form-select" aria-label="Default select example">

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
        <div class="gr-place">
            <div class="input-group it-tinh">
                <span>Chọn tỉnh</span>
                <select id="tinhdiemden" onchange="locdiemdentheotinh()">

                </select>
            </div>
            <div class="input-group it-place">
                <span class="">Điểm đến</span>
                <select multiple id="dgb" style="width: 250px;" size="5">

                </select>
            </div>
        </div>


        <div class="input-group">
            <div class="addplace">
                <span>Thêm điểm đến</span>
                <div id="totalAddress">

                </div>
                <p id="writeroot"></p>
            </div>



            <input class="btnaddgrplace" type="button" onclick="moreFields()" value="Thêm điểm đến" />
        </div>

        <div class="button-group">
            <button class="btn btn-primary" onclick="add()" type="button">Thêm</button>
            <a href="index.php?controller=chome&action=company&path=tour" class="btn btn-primary" type="button">Thoát </a>
        </div>
    </form>
</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
    var idcompany = <?= $_GET['idcompany'] ?>;
    id_tinh = null;
    ten_tinh = null;
    id_huyen = null;

    document.onload = get()

    function get() {
        get_tinhtour()

    }


    function get_tinhtour() {
        id_tinh = null
        $.ajax({
            url: 'https://provinces.open-api.vn/api/?depth=3',
            method: "GET",
            data: {},
            success: function(data) {
                for (i = 0; i < data.length; i++) {
                    $('#start_place').append(`
                            <option id='tinhtour' value="` + data[i]['code'] + `">` + data[i]['name'] + `</option>
                        `)
                    $('#tinhdiemden').append(`
                            <option id='tinh' value="` + data[i]['code'] + `">` + data[i]['name'] + `</option>
                        `)
                }

            }
        })
    }

    function locdiemdentheotinh() {
        tinh = $('#tinhdiemden').val()
        $.post("index.php?controller=cdiadiem&action=getDiadiembyTinh", {
            tinh: tinh,
        }, function(data) {
            diadiem = JSON.parse(data)
            // $(`#dgb option:selected` ).children().remove()
            for (i = 0; i < diadiem.length; i++) {
                iddiadiem = diadiem[i]['idplace']
                tendiadiem = diadiem[i]['nameplace']
                $('#dgb').append('<option value="' + iddiadiem + '">' + tendiadiem + '</option>')
            }
        })
    }

    var counter = 0;

    const renderField = (number, root) => {
        root.append(`
            <div>
                
                <div class="frame adddiemden" id="diemden-${number}">
                    <input type="file" id="hinhanhplace" name="hinhanh[]" multiple="multiple">

                    <input id="nameplace" name="nameplace" type="text" class="form-control" placeholder="Tên địa chỉ" aria-label="Username" aria-describedby="basic-addon1">

                    <input id="address" name="address" type="text" class="form-control" placeholder="Address" aria-label="Username" aria-describedby="basic-addon1">
                    <select id="city" aria-placeholder="chon tinh" onchange="get_huyen(${number})" name="city" class="form-select" aria-label="Default select example">
                    </select>

                    <select id="district" name="district" onchange="get_id_huyen(${number})" class="form-select" aria-label="Default select example">
                    </select>

                    <select id="ward" name="ward" class="form-select" aria-label="Default select example">
                    </select>

                    <textarea id="in4" name="in4" placeholder="Thông tin" class="form-control" aria-label="With textarea"></textarea>
                </div>
            </div>
        `)
    }

    function moreFields() {
        counter++;
        renderField(counter, $('#totalAddress'))
        get_tinh(counter);

    }

    document.onload = moreFields()

    function get_tinh(counter) {
        id_tinh = null
        $.ajax({
            url: 'https://provinces.open-api.vn/api/?depth=3',
            method: "GET",
            data: {

            },

            success: function(data) {

                for (i = 0; i < data.length; i++) {

                    $(`#diemden-${counter} #city`).append(
                        `
                    <option id='tinh' value="` + data[i]['code'] + `">` + data[i]['name'] + `</option>
                    `
                    )
                }
            }

        })

    }


    function get_huyen(counter) {

        id_tinh = $(`#diemden-${counter} #city`).val()

        $.ajax({
            url: 'https://provinces.open-api.vn/api/p/' + id_tinh + '?depth=2',
            method: "GET",
            data: {

            },
            success: function(data) {

                $(`#diemden-${counter} #district`).children().remove()

                for (i = 0; i < data['districts'].length; i++) {
                    $(`#diemden-${counter} #district`).append(
                        `
                    <option id='huyen' value="` + data['districts'][i]['code'] + `">` + data['districts'][i]['name'] + `</option>
                    `
                    )
                }
            }
        })
    }

    function get_id_huyen(counter) {
        id_huyen = $(`#diemden-${counter} #district`).val()
        $.ajax({
            url: 'https://provinces.open-api.vn/api/d/' + id_huyen + '?depth=2',
            method: "GET",
            data: {

            },
            success: function(data) {

                $(`#diemden-${counter} #ward`).children().remove()

                for (i = 0; i < data['wards'].length; i++) {
                    $(`#diemden-${counter} #ward`).append(
                        `<option id='xa' value="` + data['wards'][i]['code'] + `">` + data['wards'][i]['name'] + `</option>
                    `
                    )
                }
            }
        })
    }

    var $select = $('#dgb');
    var _temp = [];

    $select.mousedown('option', function(e) {
        _temp = $(this).val() || [];
    }).click('option', function(e) {
        var currVal = e.currentTarget.value;
        //nếu k có vị trí phần tử curVal trong mảng temp thì mảng temp 
        //sẽ bằng những phần tử k bằng curVal, không thì thêm currVal vào mảng
        if (_temp.indexOf(currVal) !== -1) {
            _temp = _temp.filter(function(v) {
                // v là hàm kiểm tra phần tử
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

    function add() {
        const count = $('#totalAddress')[0].childElementCount;
        let rs = []
        for (let i = 0; i < count; i++) {
            hinhanhplace = $(`#diemden-${i+1} #hinhanhplace`).get(0).files;
            linkplace = uploadFile(hinhanhplace, 'diadiem');
            rs = [
                ...rs, {
                    linkplace,
                    nameplace: $(`#diemden-${i+1} ` + '#nameplace').val(),
                    in4: $(`#diemden-${i+1} ` + '#in4').val(),
                    address: $(`#diemden-${i+1} ` + '#address').val(),
                    tinh: $(`#diemden-${i+1} ` + '#city').val(),
                    huyen: $(`#diemden-${i+1} ` + '#district').val(),
                    xa: $(`#diemden-${i+1} ` + '#ward').val(),
                    nametinh: $(`#diemden-${i+1} ` + '#city').find('option:selected').text(),
                    namehuyen: $(`#diemden-${i+1} ` + '#district').find('option:selected').text(),
                    namexa: $(`#diemden-${i+1} ` + '#ward').find('option:selected').text()
                }
            ]
        }
        hinhanh = $('#hinhanh').get(0).files;
        link = uploadFile(hinhanh, 'tour');
        nametour = $('#nametour').val();
        totalguest = $('#total-guest').val();
        priceadult = $('#price-adult').val();
        pricechild = $('#price-child').val();
        dayend = $('#day-end').val();
        daystrart = $('#day-star').val();
        in4tour = $('#infotour').val();
        transport = $('#transport').val();
        service = $('#service').val();
        schedule = $('#schedule').val();
        start_place = $('#start_place').val();
        end_place = $('#dgb').val();

        $.post("index.php?controller=ctour&action=add", {
            idcompany: idcompany,
            idtour: Date.now(),
            idplace: Date.now(),
            hinhanh: link,
            nametour: nametour,
            totalguest: totalguest,
            priceadult: priceadult,
            pricechild: pricechild,
            dayend: dayend,
            daystar: daystrart,
            numberday: numberday,
            numbernight: numbernight,
            in4tour: in4tour,
            transport: transport,
            service: service,
            schedule: schedule,
            start_place: start_place,
            end_place: end_place,
            rs: rs,
        }, function(rs) {
            console.log(rs);
            const data = JSON.parse(rs)
            if (data.status) {
                alert(data.message)
                window.location = "index.php?controller=chome&action=company&path=tour&idcompany="+idcompany
            }
        })
    }
</script>