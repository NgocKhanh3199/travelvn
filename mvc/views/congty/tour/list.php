<link rel="stylesheet" href="//cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<div class="container">
    <h4 class="page-title">DANH SÁCH TOUR</h4>
    <div class="icon">
        <i class="fa-solid fa-plane"></i>
        <i class="fa-solid fa-plane"></i>
        <i class="fa-solid fa-plane"></i>
    </div>

    <div class="page-table">
        <div class="sp-them">
            <a href="index.php?controller=chome&action=company&path=tour&page=add&idcompany=<?php echo $_SESSION['idcompany']?>"><button id="themtour" style="color:white">Thêm tour</button></a>
        </div>
        <div class="dd-content">
            <table id="tbTour" class="display">
                <thead>
                    <th style="width: 1%">Stt</th>
                    <th style="width: 6%">Hình ảnh</th>
                    <th style="width: 10%">Tên tour</th>
                    <th style="width: 2%">Giá người lớn</th>
                    <th style="width: 2%">Giá trẻ em</th>
                    <th style="width: 3%">Ngày bắt đầu</th>
                    <th style="width: 3%">Ngày kết thúc</th>
                    <th style="width: 1%"></th>
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
    var idcompany = <?= $_GET['idcompany'] ?>;
    document.onload = load()

    function load() {
        loadTableTour()
    }

    function loadTableTour() {
        $.post('index.php?controller=ctour&action=loadTableTour', {
            idcompany: idcompany,
        }, function(data) {
            data = JSON.parse(data);
            $('#tbTour').DataTable({
                data: data
            })
        })
    }

    function deleteTour(idTour) {
        choice = confirm("Có chắc muốn xóa địa danh này ?");
        if (choice) {
            $.post("index.php?controller=ctour&action=deleteTourByIdtour", {
                idTour: idTour
            }, function(data) {
                if (data > 0) {
                    alert("Xóa thành công !");
                    loadTableTour();
                } else if (data < 0) {
                    alert("Xóa thất bại !");
                }
            })
        }
    }
</script>