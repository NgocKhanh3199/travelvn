<script src="./public/js/js.js"></script>
<div class="container">
    <h4 class="page-title">THÊM ĐỊA ĐIỂM</h4>
    <div class="frame">
        <div class="input-group">
            <span class="">Hình ảnh</span>
            <input type="file" id="hinhanh" name="hinhanh[]" multiple="multiple">
        </div>
        <div class="input-group">
            <span class="">Tên địa điểm</span>
            <input id="nameplace" type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group">
            <span class="">Địa chỉ</span>
            <input id="address" type="text" class="form-control" placeholder="Address" aria-label="Username" aria-describedby="basic-addon1">
            <select id="city" aria-placeholder="chon tinh" onchange="get_huyen()" name="hotel_name" class="form-select" aria-label="Default select example">

            </select>
            <select id="district" name="hotel_name1" onchange="get_id_huyen()" class="form-select" aria-label="Default select example">

            </select>
            <select id="ward" name="hotel_name2" class="form-select" aria-label="Default select example">

            </select>
        </div>

        <div class="input-group">
            <span class="">Mô tả</span>

            <textarea id="in4" class="form-control" aria-label="With textarea"></textarea>
        </div>

        <div class="button-group">
            <button class="btn btn-primary" type="button" onclick="addplace()">Thêm</button>
            <button class="btn btn-primary" type="button"><a href="?controller=chome&action=admin&path=diadiem">Thoát</a> </button>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
    id_tinh = null;
    ten_tinh = null;
    id_huyen = null;

    document.onload = get()
    // A URL returns TEXT data.

    function get() {
        get_tinh()

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
                // console.log(id_tinh)
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
        // console.log(id_huyen)
        $.ajax({
            url: 'https://provinces.open-api.vn/api/d/' + id_huyen + '?depth=2',
            method: "GET",
            data: {
                // id_account: id_account,
            },
            success: function(data) {

                $('#ward').children().remove()
                for (i = 0; i < data['wards'].length; i++) {
                    $('#ward').append(
                        `<option id='xa' value="` + data['wards'][i]['code'] + `">` + data['wards'][i]['name'] + `</option>
                    `
                    )
                }
            }
        })
    }

    function addplace() {
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

        $.post("index.php?controller=cdiadiem&action=addplace", {
            idplace: Date.now(),
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
        }, function(data) {
            if (data > 0) {
                alert('sucess');
                // window.location.href = "index.php?controller=chome&action=admin&path=diadiem";
            } else if (data <= 0) {
                alert("Không thành công")
            }
        })

    }
</script>