<link rel="stylesheet" href="//cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<div class="container">
    <h4 class="page-title">DANH SÁCH NGƯỜI DÙNG</h4>
    <div class="page-table">
        <div class="dd-content">
            <table id="tbUser" class="display">
                <thead>
                    <th style="width: 1%">Stt</th>
                    <th style="width: 6%">Tài khoản</th>
                    <th style="width: 10%">Tên người dùng</th>
                    <th style="width: 2%">Số điện thoại</th>
                    <th style="width: 3%">Email</th>
                    <th style="width: 3%">Giới tính</th>
                    <th style="width: 3%">Ngày sinh</th>
                    <th style="width: 1%"></th>
                    <th style="width: 1%"></th>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    document.onload = load()

    function load() {
        loadTableUser()
    }

    function loadTableUser() {
        $.post("index.php?controller=cuser&action=loadTableUser", {

        }, function(data) {
            // console.log(data);
            data = JSON.parse(data);
            $('#tbUser').DataTable({
                data: data
            })
        })
    }
    // function duyetTour(idTour) {
    //     choice = confirm("Duyệt tour để tour hiển thị trên trang chủ người dùng.!");
    //     if (choice) {
    //         $.post("index.php?controller=ctour&action=duyetTourByIdtour", {
    //             idTour: idTour
    //         }, function(data) {
    //             if (data > 0) {
    //                 alert("Duyệt thành công !");
    //                 loadTableTour();
    //             } else if (data < 0) {
    //                 alert("Duyệt thất bại !");
    //             }
    //         })
    //     }
    // }

    // function deleteTour(idTour) {
    //     choice = confirm("Có chắc muốn xóa địa danh này ?");
    //     if (choice) {
    //         $.post("index.php?controller=ctour&action=deleteTourByIdtour", {
    //             idTour: idTour
    //         }, function(data) {
    //             if (data > 0) {
    //                 alert("Xóa thành công !");
    //                 loadTableTour();
    //             } else if (data < 0) {
    //                 alert("Xóa thất bại !");
    //             }
    //         })
    //     }
    // }
</script>