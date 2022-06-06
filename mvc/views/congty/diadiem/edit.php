<script src="./public/js/js.js"></script>
<link rel="stylesheet" href="./public/css/add_diadiem.css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<div class="container add_diadiem">
    <h4 class="page-title">SỬA ĐỊA ĐIỂM</h4>
    <div class="frame">
    <div class="input-group">
            <span class="lb-span">Hình ảnh</span>
            <input type="file" id="hinhanh" name="hinhanh[]" multiple="multiple">
        </div>
        <div class="input-group">
            <span class="lb-span">Tên địa điểm</span>
            <input class="ip_name" id="nameplace" type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group">
            <span class="lb-span">Địa chỉ</span>
            <input id="address" type="text" class="form-control ip" placeholder="Address" aria-label="Username" aria-describedby="basic-addon1">
            <select id="city" aria-placeholder="chon tinh" onchange="get_huyen()" name="hotel_name" class="ip tinh" aria-label="Default select example">       
            </select>
            <select id="district" name="hotel_name1" onchange="get_id_huyen()" class="ip huyen" aria-label="Default select example">     
            </select>
            <select id="ward" name="hotel_name2" class="ip xa" aria-label="Default select example">           
            </select>
        </div>

        <div class="input-group">
            <span class="lb-span">Mô tả</span>
            <!-- <span class="input-group-text" id="basic-addon1">Xã/phường/thị trấn</span> -->
            <textarea id="in4" class="ip form-control" aria-label="With textarea"></textarea>
        </div>
        
        <div class="button-group">
            <button class="btn_edit" type="button">Cập nhật</button>
            <button class="btn_thoat" type="button"><a href="?folder=diadiem">Thoát</a> </button>
        </div>
    </div>
</div>
<script>
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
            path3 ='https://provinces.open-api.vn/api/w/' + dd['ward'] + '?depth=1'
            $.ajax({
                url: path3,
                method: "GET",
                data: {
                },
                success: function(data) {
                    $('#ward').append('<option value="' + data['code'] + '">' + data['name'] + '</option>')
                }
            })
            path2 ='https://provinces.open-api.vn/api/d/' + dd['district'] + '?depth=1'
            $.ajax({
                url: path2,
                method: "GET",
                data: {
                },
                success: function(data) {
                    $('#district').append('<option value="' + data['code'] + '">' + data['name'] + '</option>')
                }
            })
            path1 ='https://provinces.open-api.vn/api/p/' + dd['city'] + '?depth=1'
            $.ajax({
                url: path1,
                method: "GET",
                data: {
                },
                success: function(data) {
                    $('#city').append('<option value="' + data['code'] + '">' + data['name'] + '</option>')
                }
            })
            
            
            $('#in4').val(dd['infomation'])

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