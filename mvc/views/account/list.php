<script src="./public/js/js.js"></script>
<form action="" class="row">
    <h3 class="text-center my-profile">HỒ SƠ CỦA TÔI</h3>

    <!-- <label for="file"></label> -->
    <div class="avata pt-2 pb-2 ps-1 text-center" id="showimg">

    </div>
    <!-- <input type="file" class="bg-dark" name="file" id="file" class="inputfile" /> -->
    <h6 class="text-center" id="tennd">
        <!-- Tran Thao -->
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
    <div class="user-input col-lg-5 ms-5">
        <label for="image" class="form-label">Hình ảnh</label>
        <input class="form-control" type="file" name="file" id="file" class="inputfile">
    </div>
    <div class="btn-taikhoan justify-content-md-end">
        <button class="btn btn-dark me-md-2" type="button" onclick="updateUser()">Thay đổi</button>
        <button class="btn btn-dark me-lg-5" type="button" onclick="deleteUser()">Xoá tài khoản</button>
    </div>
</form>

<script>
    function updateUser() {
        hinhanh = $('#file').get(0).files;
        link = uploadFile(hinhanh, 'nguoidung')[0];
        var name = $('#tnd').val()
        var username = $('#tendangnhap').val()
        var email = $('#email').val()
        var phone = $('#sodienthoai').val()
        var birthday = $('#ngaysinh').val()
        var gender = $('#gioitinh').val()
        // console.log(link);
        $.post('index.php?controller=cuser&action=updateUser', {
            iduser: iduser,
            image: link,
            name: name,
            username: username,
            email: email,
            phone: phone,
            birthday: birthday,
            gender: gender
        }, function(data) {
            if (data == 1) {
                alert('Cập nhật thành công!')
                location.reload()
            } else if (data == 0 || data == -1) {
                alert("Cập nhật thất bại!")
            } else {
                console.log(data)
            }
        });
    };

    function deleteUser() {
        var text = 'Bạn có chắc chắn muốn xoá tài khoản? Tài khoản sẽ không thể khôi phục trong tương lai!!'
        if (confirm(text) == true) {
            $.post("index.php?controller=cuser&action=deleteUser", {
                iduser: iduser
            }, function(data) {
                alert("Tài khoản đã được xoá! Cảm ơn bạn đã sử dụng dịch vụ, hy vọng có thể gặp lại bạn trong tương lai!")
                location.replace("index.php?controller=cuser&action=logout")
            })
        } else {
            location.reload()
        }
    }
</script>