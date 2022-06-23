<script src="./public/js/js.js"></script>
<form action="" class="row">
    <h3 class="text-center my-profile">HỒ SƠ CÔNG TY</h3>
    <!-- <input type="file" name="file" id="file" class="inputfile" /> -->
    <label for="file">
        <div class="avata pb-2 ps-1 text-center" id="showimg">
            <!-- <img class="rounded-circle" width="80" height="80" src="./public/img/nguoidung/việt tour.png" alt=""> -->
        </div>

    </label>
    <h6 class="text-center" id="tenct">
        <!-- Việt Tour -->
    </h6>
    <div class="btndoihinhanh">
        <button class="btnavata" type="button" onclick="doiavata()">Thay đổi</button>
    </div>
    <div class="form-content">
        <div class="form-content-left">
            <div class="user-input">
                <label for="tennguoidung" class="form-label">Tên Công Ty</label>
                <input type="text" class="form-control" id="tct" placeholder="Nhập tên công ty" value="Việt Tour">
            </div>
            <div class="user-input">
                <label for="tendangnhap" class="form-label">Tên Đăng Nhập</label>
                <input type="text" class="form-control" id="tendangnhap" readonly placeholder="Nhập tên đăng nhập" value="viettourco">
            </div>
            <div class="user-input">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Nhập email" value="viettour@gmail.com">
            </div>
            <div class="user-input">
                <label for="sodienthoai" class="form-label">Số điện thoại</label>
                <input type="text" class="form-control" id="sodienthoai" placeholder="Nhập số điện thoại" value="02923555481">
            </div>
            <div class="user-input">
                <label for="diachi" class="form-label">Địa Chỉ</label>
                <input type="text" class="form-control" id="diachi" placeholder="Nhập địa chỉ" value="20 Trần Hưng Đạo, phường An Phú, Ninh Kiều, Cần Thơ">
            </div>
            <div class="user-input">
                <label for="thanhpho" class="form-label">Thành Phố</label>
                <select class="form-select" aria-label="Default select example" id="thanhpho" onchange="get_huyen()">

                </select>
            </div>
            <div class="user-input">
                <label for="quan" class="form-label">Quận</label>
                <select class="form-select" aria-label="Default select example" id="quan" onchange="get_id_huyen()">

                </select>
            </div>
            <div class="user-input">
                <label for="xaphuongthitran" class="form-label">Xã/Phường/Thị Trấn</label>
                <select class="form-select" aria-label="Default select example" id="xaphuongthitran">

                </select>
            </div>
            <div class="user-input">
                <label for="soduong" class="form-label">Số Đường</label>
                <input type="text" class="form-control" id="soduong" placeholder="Nhập số đường" value="20 Trần Hưng Đạo">
            </div>
            <div class="user-input ip-img">
                <label for="image" class="form-label">Hình ảnh</label>
                <input  class="form-control" type="file" name="file" id="file" class="inputfile">
            </div>
        </div>
        <!-- <div class="form-content-right">      
        </div> -->
    </div>
    <div class="btn-taikhoan justify-content-md-end">
        <button class="btn btn-dark me-md-2" type="button" onclick="updateCongTy()">Thay đổi</button>
        <button class="btn btn-dark me-lg-5" type="button" onclick="deleteCongTy()">Xoá tài
            khoản</button>
    </div>
</form>
<script>
    //-------------------------------------------load địa chỉ --------------------------------------------------

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
                        $('#thanhpho').append(
                            `
                    <option id='tinh' value="` + data[i]['code'] + `">` + data[i]['name'] + `</option>
                    `
                        )
                    }

                }
            })
    }

    function get_huyen() {

        id_tinh = $('#thanhpho').val()
        console.log(id_tinh)

        $.ajax({
            url: 'https://provinces.open-api.vn/api/p/' + id_tinh + '?depth=2',
            method: "GET",
            data: {
                // id_account: id_account,
            },
            success: function(data) {
                console.log(id_tinh)
                $('#quan').children().remove()
                for (i = 0; i < data['districts'].length; i++) {
                    console.log(data['districts'][i]['name'])
                    $('#quan').append(
                        `
                    <option id='huyen' value="` + data['districts'][i]['code'] + `">` + data['districts'][i]['name'] + `</option>
                    `
                    )
                }
            }
        })
    }

    function get_id_huyen() {
        id_huyen = $('#quan').val()
        // console.log(id_huyen)
        $.ajax({
            url: 'https://provinces.open-api.vn/api/d/' + id_huyen + '?depth=2',
            method: "GET",
            data: {
                // id_account: id_account,
            },
            success: function(data) {

                $('#xaphuongthitran').children().remove()
                for (i = 0; i < data['wards'].length; i++) {
                    $('#xaphuongthitran').append(
                        `<option id='xa' value="` + data['wards'][i]['code'] + `">` + data['wards'][i]['name'] + `</option>
                    `
                    )
                }
            }
        })
    }

    //--------------------------end load địa chỉ ------------------------------------------------


    var idcompany = $('#idcompany').val()

    function doiavata() {
        hinhanh = $('#file').get(0).files;
        link = uploadFile(hinhanh, 'congty')[0];
        $.post("index.php?controller=ccompany&action=updateavataCompany", {
            idcompany: idcompany,
            image: link,
        }, function(data) {
            if (data == 1) {
                alert('Cập nhật thành công!')
                location.reload()
            } else if (data == 0 || data == -1) {
                alert("Cập nhật thất bại!")
            } else {
                console.log(data)
            }
        })
    }

    function updateCongTy() {
        var namecompany = $('#tct').val()
        var email = $('#email').val()
        var phone = $('#sodienthoai').val()
        var address = $('#diachi').val()
        var city = $('#thanhpho').val()
        var district = $('#quan').val()
        var ward = $('#xaphuongthitran').val()
        var street = $('#soduong').val()
      
        $.post("index.php?controller=ccompany&action=updateCompany", {
            idcompany: idcompany,
            namecompany: namecompany,
            email: email,
            phone: phone,
            address: address,
            city: city,
            district: district,
            ward: ward,
            street: street
        }, function(data) {
            if (data == 1) {
                alert('Cập nhật thành công!')
                location.reload()
            } else if (data == 0 || data == -1) {
                alert("Cập nhật thất bại!")
            } else {
                console.log(data)
            }
        })
    }

    function deleteCongTy() {
        var text = 'Bạn có chắc chắn muốn xoá tài khoản? Tài khoản sẽ không thể khôi phục trong tương lai!!'
        if (confirm(text) == true) {
            $.post("index.php?controller=ccompany&action=deleteCompany", {
                idcompany: idcompany
            }, function(data) {
                alert("Tài khoản đã được xoá! Cảm ơn bạn đã sử dụng dịch vụ, hy vọng có thể gặp lại bạn trong tương lai!")
                location.replace("index.php?controller=ccompany&action=logout")
            })
        } else {
            location.reload()
        }
    }
</script>