<link rel="stylesheet" href="//cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<div class="container">
    <h4 class="page-title">CHI TIẾT ĐƠN HÀNG</h4>
    <div id="info"></div>
    <h5 style="font-style: italic; text-align:start; margin: 20px; border-bottom: 1px solid black">Thông Tin Đơn Hàng</h5>
    <input type="hidden" name="idorder" id="idorder" value="<?php echo $_GET['idorder'] ?>">
    <input type="hidden" name="iduser" id="iduser" value="<?php echo $_GET['iduser'] ?>">
    <!-- <div class="page-table">
        <table id="tableDetailOrder" class="display">
            <thead>
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Ngày bắt đầu</th>
                    <th>Ngày kết thúc</th>
                    <th>Tên khách hàng</th>
                    <th>Điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Người lớn</th>
                    <th>Trẻ em</th>
                    <th>Ghi chú</th>
                    <th>Thành tiền</th>
                    <th>Thanh toán</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div> -->
    <div class="container content-detail-order text-start d-flex justify-content-around p-2">

    </div>
    <h5 style="font-style: italic; text-align:start; margin: 20px; border-bottom: 1px solid black">Tour</h5>
    <div class="page-table" style="margin-top:30px">
        <table id="tbTour" class="display">
            <thead>
                <th style="width: 1%">ID tour</th>
                <th style="width: 6%">Hình ảnh</th>
                <th style="width: 10%">Tên tour</th>
                <th style="width: 2%">Giá người lớn</th>
                <th style="width: 2%">Giá trẻ em</th>
                <th style="width: 3%">Ngày bắt đầu</th>
                <th style="width: 3%">Ngày kết thúc</th>
                <th style="width: 1%"></th>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
    <button class="admin-button"><a href="index.php?controller=chome&action=admin&path=nguoidung&page=detail&idUser=<?php echo $_GET['iduser'] ?>">Trở Lại</a></button>
</div>

<script>
    var idorder = $('#idorder').val()
    var iduser = $('#iduser').val()
    document.onload = load()

    function load() {
        loadTableDetailOrder()
        loadTableTour()
        loadNameOfUser()
    }

    function loadTableDetailOrder() {
        $.post("index.php?controller=cuser&action=loadTableDetailOrderByIdOrder", {
            idorder: idorder
        }, function(data) {
            data = JSON.parse(data)
            var paymentMethod = data[0]['payment-method']
            if (paymentMethod == 0) {
                paymentMethod = 'Thanh toán trực tiếp'
            } else {
                paymentMethod = 'Thanh toán online'
            }
            $('.content-detail-order').append(`
                <div>
                    <h6>Mã đơn hàng: <span class="fw-bold">` + data[0]['idorder'] + `</span></h6>
                    <h6>Mã tour: <span class="fw-bold">` + data[0]['idtour'] + `</span></h6>
                    <h6>Ngày bắt đầu: <span class="fw-bold">` + data[0]['daystart'] + `</span></h6>
                    <h6>Ngày kết thúc: <span class="fw-bold">` + data[0]['dayend'] + `</span></h6>
                    <h6>Tên khách hàng: <span class="fw-bold">` + data[0]['name-customer'] + `</span></h6>
                    <h6>Email: <span class="fw-bold">` + data[0]['email-customer'] + `</span></h6>
                    <h6>Số điện thoại: <span class="fw-bold">` + data[0]['phone-customer'] + `</span></h6>
                </div>
                <div>
                    
                    <h6>Địa chỉ: <span class="fw-bold">` + data[0]['address-customer'] + `</span></h6>
                    <h6>Số người lớn: <span class="fw-bold">` + data[0]['number-adult'] + `</span></h6>
                    <h6>Số trẻ em: <span class="fw-bold">` + data[0]['number-child'] + `</span></h6>
                    <h6>Ghi chú: <span class="fw-bold">` + data[0]['note'] + `</span></h6>
                    <h6>Thành tiền: <span class="fw-bold">` + data[0]['price-total'] + `</span></h6>
                    <h6>Phương thức thanh toán: <span class="fw-bold">` + paymentMethod + `</span></h6>
                </div>  
            `)

            // $('#tableDetailOrder').DataTable({
            //     data: data
            // })
        })
    }

    function loadTableTour() {
        $.post("index.php?controller=cuser&action=loadTableTourByIdOrder", {
            idorder: idorder,
            iduser: iduser
        }, function(data) {
            data = JSON.parse(data)
            $('#tbTour').DataTable({
                data: data
            })
        })
    }

    function loadNameOfUser()
    {
        $.post("index.php?controller=cuser&action=findUserById", {
            iduser: iduser
        }, function(data){
            data = JSON.parse(data)
            $('#info').append('<h6>Tên khách hàng: <span class="fw-bold">'+data[0]['name']+'</span></h6>')
        })
    }
</script>