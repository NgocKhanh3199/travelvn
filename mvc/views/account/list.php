<form action="" class="row">
    <h3 class="text-center my-profile">HỒ SƠ CỦA TÔI</h3>
    <input type="file" name="file" id="file" class="inputfile" />
    <label for="file">
        <div class="avata pb-2 ps-1 text-center" id="showimg">
            <img class="rounded-circle" width="80" height="80" src="./public/img/nguoidung/avatar.jpg" alt="">
        </div>
    </label>
    <h6 class="text-center" id="tennd">
        <?php //echo $_SESSION['tennguoidung']
        ?>
        Tran Thao
    </h6>
    <div class="user-input col-lg-5 mx-auto">
        <label for="tennguoidung" class="form-label">Tên người dùng</label>
        <input type="text" class="form-control" id="tnd" placeholder="Nhập tên người dùng" value="">
    </div>
    <div class="user-input col-lg-5 mx-auto">
        <label for="tendangnhap" class="form-label">Tên đăng nhập</label>
        <input type="text" class="form-control" id="tendangnhap" readonly placeholder="Nhập tên đăng nhập" value="thao56">
    </div>
    <div class="user-input col-lg-5 mx-auto">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" placeholder="Nhập email" value="thao56@gmail.com">

    </div>
    <div class="user-input col-lg-5 mx-auto">
        <label for="sodienthoai" class="form-label">Số điện thoại</label>
        <input type="text" class="form-control" id="sodienthoai" placeholder="Nhập số điện thoại" value="0795832722">
    </div>
    <div class="user-input col-lg-5 mx-auto">
        <label for="ngaysinh" class="form-label">Ngày sinh</label>
        <input type="text" class="form-control" id="ngaysinh" placeholder="Nhập ngày sinh" value="05-06-2000">
    </div>
    <div class="user-input col-lg-5 mx-auto">
        <label for="gioitinh" class="form-label">Giới tính</label>
        <input type="text" class="form-control" id="gioitinh" placeholder="Nhập giới tính" value="Nữ">
    </div>
    <div class="btn-taikhoan justify-content-md-end">
        <button class="btn btn-dark me-md-2" type="button" onclick="//updateThongTinNguoiDung()">Thay đổi</button>
        <button class="btn btn-dark me-lg-5" type="button" onclick="//xoataikhoan()">Xoá tài khoản</button>
    </div>
</form>