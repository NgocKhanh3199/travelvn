<script src="./public/js/js.js"></script>
<link rel="stylesheet" href="//cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<div class="container">
    <h4 class="page-title">CHI TIẾT CÔNG TY</h4>
    <input type="hidden" name="" id="idcompany" value="<?php echo $_GET['idcompany'] ?>">
    <div class="container p-4 d-flex justify-content-center border border-secondary mt-4 mb-4">
        <div class="p-4 img-congty">

        </div>
        <div class="text-start p-4" id="info">

        </div>
    </div>
    <div class="border border-dark p-4">
        <h5 class="" style="font-style: italic; text-align:start; margin: 20px; border-bottom: 1px solid black">Tour</h5>
        <div class="page-table pt-4">
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
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
    <div class="border border-dark p-4 mt-4">
        <h5 class="" style="font-style: italic; text-align:start; margin: 20px; border-bottom: 1px solid black">Lợi Nhuận Tháng</h5>
        <div class="page-table pt-4" style="margin-top:20px">
            <table id="myTable1" class="display">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Thời Gian</th>
                        <th>Lợi Nhuận</th>
                        <th>Trạng Thái</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>02/2022</td>
                        <td>15.000.000đ</td>
                        <td>Chưa Thanh Toán</td>
                        <td><button class="admin-button"><a href="?controller=chome&action=admin&path=congty&page=loinhuanthang">Chi Tiết</a></button></td>
                        <td><button class="admin-button"><a href="">Thanh Toán</a></button></td>
                        <td><button class="admin-button"><a href="">Huỷ</a></button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    <button class="admin-button mt-4"><a href="?controller=chome&action=admin&path=congty">Trở Lại</a> </button>
</div>
<script>
    var idcompany = $('#idcompany').val()
    document.onload = load()

    function load() {
        loadDetailCompany()
        loadTour()
    }

    function loadDetailCompany() {
        pathhinhanhcongty = "./public/img/congty/";
        $.post("index.php?controller=ccompany&action=loadDetailCompanyByIdCompany", {
            idcompany: idcompany
        }, function(data) {
            data = JSON.parse(data)
            $('#info').append(`
                <h5 class="pb-2 text-center"><span class="fw-bold">` + data[0]['namecompany'] + `</span></h5>
                <h6>Địa chỉ: <span class="fw-bold">` + data[0]['address'] + `</span></h6>
                <h6>Đường: <span class="fw-bold">` + data[0]['street'] + `</span></h6>
                <h6>Xã/Phường/Thị Trấn: <span class="fw-bold">` + data[0]['ward'] + `</span></h6>
                <h6>Quận/Huyện: <span class="fw-bold">` + data[0]['district'] + `</span></h6>
                <h6>Tỉnh/Thành Phố: <span class="fw-bold">` + data[0]['city'] + `</span></h6>
            `)
            hinhanh = data[0]['image']
            if (hinhanh.length == 0) {
                hinhanh = 'việt tour.png'
            }
            hinhanh = pathhinhanhcongty + hinhanh
            $('.img-congty').append(`
                <img src="` + hinhanh + `" width="200px" height="200px" alt="">
            `)
        })
    }

    function loadTour() {
        $.post('index.php?controller=ccompany&action=loadTableTourByIdCompany', {
            idcompany: idcompany
        }, function(data) {
            data = JSON.parse(data);
            $('#tbTour').DataTable({
                data: data
            })
        })
    }
</script>