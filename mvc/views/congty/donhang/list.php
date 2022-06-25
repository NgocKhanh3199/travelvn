<link rel="stylesheet" href="//cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<!-- <link rel="stylesheet" href="./public/css/admin.css"> -->
<div class="container">
    <h4 class="page-title">DANH SÁCH ĐƠN HÀNG</h4>
    <div class="icon">
        <i class="fa-solid fa-plane"></i>
        <i class="fa-solid fa-plane"></i>
        <i class="fa-solid fa-plane"></i>
    </div>

    <div class="page-table">
        <div class="dd-content">
            <table id="tbOrder" class="display">
                <thead>
                    <th style="width: 1%">Stt</th>
                    <th style="width: 15%">Mã đơn hàng</th>
                    <th style="width: 15%">Tên khách hàng</th>
                    <th style="width: 3%">Số điện thoại</th>
                    <th style="width: 5%">Email</th>
                    <th style="width: 15%">Địa chỉ</th>
                    <th style="width: 3%">Tổng bill</th>
                    <th style="width: 3%">Trạng thái</th>
                    <th style="width: 1%"></th>
                    <th style="width: 3%"></th>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    var idcompany = <?= $_SESSION['idcompany'] ?>;
    document.onload = load()

    function load() {
        loadTableOrder()
    }

    function loadTableOrder() {
        $.post('index.php?controller=corder&action=loadTableOrdercp', {
            idcompany: idcompany,
        }, function(data) {
            data = JSON.parse(data);
            $('#tbOrder').DataTable({
                data: data
            })
        })
    }

    function DuyetOrder(idorder) {
        choice = confirm("Bạn có chắc duyệt đơn hàng.!");
        if (choice) {
            $.post("index.php?controller=corder&action=duyetOrderByIdorder", {
                idorder: idorder
            }, function(data) {
                if (data > 0) {
                    alert("Duyệt thành công !");
                    loadTableOrder();
                } else if (data < 0) {
                    alert("Duyệt thất bại !");
                }
            })
        }
    }
    function huydon(idorder) {
        choice = confirm("Bạn có chắc duyệt đơn hàng.!");
        if (choice) {
            $.post("index.php?controller=corder&action=huyOrderByIdorder", {
                idorder: idorder
            }, function(data) {
                if (data > 0) {
                    alert("Hủy thành công !");
                    loadTableOrder();
                } else if (data < 0) {
                    alert("Hủy thất bại !");
                }
            })
        }
    }
</script>