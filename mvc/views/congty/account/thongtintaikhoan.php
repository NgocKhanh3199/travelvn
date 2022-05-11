<form action="" class="row">
    <h3 class="text-center my-profile">HỒ SƠ CÔNG TY</h3>
    <input type="file" name="file" id="file" class="inputfile" />
    <label for="file">
        <div class="avata pb-2 ps-1 text-center" id="showimg">
            <img class="rounded-circle" width="80" height="80" src="./public/img/nguoidung/việt tour.png" alt="">
        </div>
    </label>
    <h6 class="text-center" id="tennd">
        <?php //echo $_SESSION['tennguoidung']
        ?>
        Việt Tour
    </h6>
    <div class="form-content">
        <div class="form-content-left">
            <div class="user-input">
                <label for="tennguoidung" class="form-label">Tên Công Ty</label>
                <input type="text" class="form-control" id="tnd" placeholder="Nhập tên công ty" value="Việt Tour">
            </div>
            <div class="user-input">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Nhập email" value="viettour@gmail.com">

            </div>
            <div class="user-input">
                <label for="diachi" class="form-label">Địa Chỉ</label>
                <input type="text" class="form-control" id="diachi" placeholder="Nhập địa chỉ" value="20 Trần Hưng Đạo, phường An Phú, Ninh Kiều, Cần Thơ">
            </div>
            <div class="user-input">
                <label for="quan" class="form-label">Quận</label>
                <input type="text" class="form-control" id="quan" placeholder="Nhập quận" value="Ninh Kiều">
            </div>
            <div class="user-input">
                <label for="soduong" class="form-label">Số Đường</label>
                <input type="text" class="form-control" id="soduong" placeholder="Nhập số đường" value="20 Trần Hưng Đạo">
            </div>
        </div>
        <div class="form-content-right">
            <div class="user-input">
                <label for="tendangnhap" class="form-label">Tên Đăng Nhập</label>
                <input type="text" class="form-control" id="tendangnhap" readonly placeholder="Nhập tên đăng nhập" value="viettourco">
            </div>
            <div class="user-input">
                <label for="sodienthoai" class="form-label">Số điện thoại</label>
                <input type="text" class="form-control" id="sodienthoai" placeholder="Nhập số điện thoại" value="02923555481">
            </div>
            <div class="user-input">
                <label for="thanhpho" class="form-label">Thành Phố</label>
                <input type="text" class="form-control" id="thanhpho" placeholder="Nhập thành phố" value="Cần Thơ">
            </div>
            <div class="user-input">
                <label for="xaphuongthitran" class="form-label">Xã/Phường/Thị Trấn</label>
                <input type="text" class="form-control" id="xaphuongthitran" placeholder="Nhập xã/phường/thị trấn" value="An Phú">
            </div>
        </div>

    </div>
    <div class="btn-taikhoan justify-content-md-end">
        <button class="btn btn-dark me-md-2" type="button" onclick="//updateThongTinNguoiDung()">Thay đổi</button>
        <button class="btn btn-dark me-lg-5" type="button" onclick="//xoataikhoan()">Xoá tài
            khoản</button>
    </div>
</form>