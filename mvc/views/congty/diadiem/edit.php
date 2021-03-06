<script src="./public/js/js.js"></script>
<link rel="stylesheet" href="./public/css/add_diadiem.css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<form class="add_diadiem needs-validation" novalidate>
    <h4 class="page-title">SỬA ĐỊA ĐIỂM</h4>
    <div class="frame">
        <div class="input-groupp">
            <span class="lb-span">Hình ảnh</span>
            <input required type="file" id="hinhanh" name="hinhanh[]" multiple="multiple">
        </div>
        <div class="input-groupp">
            <span class="lb-span">Tên địa điểm</span>
            <input required id="nameplace" type="text" class="form-control ip_name" placeholder="Username" >
        </div>
        <div class="input-groupp">
            <label class="lb-span">Kinh độ</label>
            <input required  id="kinhdo" type="text" class="form-control ip_name" placeholder="Nhập kinh độ" >
        </div>
        <div class="input-groupp">
            <label class="lb-span">Vĩ độ</label>
            <input required id="vido" type="text" class="form-control ip_name" placeholder="Nhập vĩ độ " >
        </div>
        <div class="input-diachi">
            <span class="lb-span">Địa chỉ</span>
            <div class="editdiachi">
                <input required id="address" onchange="get_tinh()" type="text" class="form-control editaddressplace ip" placeholder="Address" >
                <select required id="city" aria-placeholder="chon tinh" onchange="get_huyen()" name="hotel_name" class="ip edittinh" aria-label="Default select example">
                </select>
                <select required id="district" name="hotel_name1" onchange="get_id_huyen()" class="ip edithuyen" aria-label="Default select example">
                </select>
                <select required id="ward" name="hotel_name2" class="ip editxa" aria-label="Default select example">
                </select>
            </div>
        </div>

        <div class="input-groupp">
            <span class="lb-span">Mô tả</span>
            <textarea required id="in4" class="ip form-control ip_text" aria-label="With textarea"></textarea>
        </div>

        <div class="button-group">
            <button class="btn_edit" type="button">Cập nhật</button>
            <button class="btn_thoat" type="button"><a href="index.php?controller=chome&action=company&path=diadiem">Thoát</a> </button>
        </div>
    </div>
</form>
<script>
var forms = document.querySelectorAll('.needs-validation')
    $('.btn_edit').on('click', function(event) {
        Array.prototype.slice.call(forms)
            .forEach(function(e) {
                if (!e.checkValidity()) {
                    e.classList.add('was-validated')
                    event.preventDefault()
                    event.stopPropagation()
                } else {
                    alert("fgh")
                }
            })
    });

    var iddiadiem = <?= $_GET['iddiadiem'] ?>;
    document.onload = loadDiadanhByIddiadanh()


    function loadDiadanhByIddiadanh() {
        $.post("index.php?controller=cdiadiem&action=getDiadiemByIddiadiem", {
            iddiadiem: iddiadiem,
        }, function(data) {
            diadiem = JSON.parse(data);
            dd = diadiem[0];
            $('#nameplace').val(dd['nameplace'])
            $('#address').val(dd['address'])
            $('#kinhdo').val(dd['longitude'])
            $('#vido').val(dd['latitude'])
            path3 = 'https://provinces.open-api.vn/api/w/' + dd['ward'] + '?depth=1'
            $.ajax({
                url: path3,
                method: "GET",
                data: {},
                success: function(data) {
                    $('#ward').append('<option value="' + data['code'] + '">' + data['name'] + '</option>')
                }
            })
            path2 = 'https://provinces.open-api.vn/api/d/' + dd['district'] + '?depth=1'
            $.ajax({
                url: path2,
                method: "GET",
                data: {},
                success: function(data) {
                    $('#district').append('<option value="' + data['code'] + '">' + data['name'] + '</option>')
                }
            })
            path1 = 'https://provinces.open-api.vn/api/p/' + dd['city'] + '?depth=1'
            $.ajax({
                url: path1,
                method: "GET",
                data: {},
                success: function(data) {
                    $('#city').append('<option value="' + data['code'] + '">' + data['name'] + '</option>')
                }
            })


            $('#in4').val(dd['information'])

        })
    }

    function editplace() {
        hinhanh = $('#hinhanh').get(0).files;
        link = uploadFile(hinhanh, 'diadiem');
        nameplace = $('#nameplace').val();
        in4 = $('#in4').val();
        address = $('#address').val();
        tinh = $('#city').val();
        huyen = $('#district').val();
        xa = $('#ward').val();
        nametinh = $('#city').find('option:selected').text();
        namehuyen = $('#district').find('option:selected').text()
        namexa = $('#ward').find('option:selected').text()
        kinhdo = $('#kinhdo').val();
        vido = $('#vido').val();

        $.post("index.php?controller=cdiadiem&action=editplace", {
            iddiadiem: iddiadiem,
            hinhanh: link,
            nameplace: nameplace,
            in4: in4,
            address: address,
            nametinh: nametinh,
            namehuyen: namehuyen,
            namexa: namexa,
            tinh: tinh,
            huyen: huyen,
            xa: xa,
            kinhdo: kinhdo,
            vido: vido,

        }, function(data) {
            if (data > 0) {
                alert('sucess');
                window.location.href = "index.php?controller=chome&action=company&path=diadiem";
            } else if (data <= 0) {
                alert("Không thành công")
            }
        })
    }

    function editplace() {
        hinhanh = $('#hinhanh').get(0).files;
        link = uploadFile(hinhanh, 'diadiem');
        nameplace = $('#nameplace').val();
        in4 = $('#in4').val();
        address = $('#address').val();
        tinh = $('#city').val();
        huyen = $('#district').val();
        xa = $('#ward').val();
        nametinh = $('#city').find('option:selected').text();
        namehuyen = $('#district').find('option:selected').text()
        namexa = $('#ward').find('option:selected').text()
        kinhdo = $('#kinhdo').val();
        vido = $('#vido').val();

        $.post("index.php?controller=cdiadiem&action=editplace", {
            iddiadiem:iddiadiem,
            hinhanh: link,
            nameplace: nameplace,
            in4: in4,
            address: address,
            nametinh: nametinh,
            namehuyen: namehuyen,
            namexa: namexa,
            tinh: tinh,
            huyen: huyen,
            xa: xa,
            kinhdo: kinhdo,
            vido: vido,

        }, function(data) {
            if (data > 0) {
                alert('sucess');
                window.location.href = "index.php?controller=chome&action=company&path=diadiem";
            } else if (data <= 0) {
                alert("Không thành công")
            }
        })
    }
    function get_tinh() {
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
                        $('#city').append(
                            `
                    <option id='tinh' value="` + data[i]['code'] + `">` + data[i]['name'] + `</option>
                    `
                        )
                    }

                }
            })
    }

    function get_huyen() {

        id_tinh = $('#city').val()

        $.ajax({
            url: 'https://provinces.open-api.vn/api/p/' + id_tinh + '?depth=2',
            method: "GET",
            data: {
                // id_account: id_account,
            },
            success: function(data) {
                console.log(id_tinh)
                $('#district').children().remove()
                for (i = 0; i < data['districts'].length; i++) {
                    console.log(data['districts'][i]['name'])
                    $('#district').append(
                        `
                    <option id='huyen' value="` + data['districts'][i]['code'] + `">` + data['districts'][i]['name'] + `</option>
                    `
                    )
                }
            }
        })
    }

    function get_id_huyen() {
        id_huyen = $('#district').val()
        console.log(id_huyen)
        $.ajax({
            url: 'https://provinces.open-api.vn/api/d/' + id_huyen + '?depth=2',
            method: "GET",
            data: {
                // id_account: id_account,
            },
            success: function(data) {

                $('#ward').children().remove()
                for (i = 0; i < data['wards'].length; i++) {
                    // console.log(data['wards'][i]['name'])
                    $('#ward').append(
                        `<option id='xa' value="` + data['wards'][i]['code'] + `">` + data['wards'][i]['name'] + `</option>
                    `
                    )
                }
            }
        })
    }
</script>