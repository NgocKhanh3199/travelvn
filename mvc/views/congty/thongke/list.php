<link rel="stylesheet" href="//cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="./public/css/listgiaodich.css">
<div class="container">
    <h4 class="page-title">THỐNG KÊ DOANH THU</h4>
    <div class="icon">
        <i class="fa-solid fa-plane"></i>
        <i class="fa-solid fa-plane"></i>
        <i class="fa-solid fa-plane"></i>
    </div>
    <div class="d-flex flex-row day">
        <div class="p-2 ngaybatdau">
            <h1 class="hd-ngaybatdau">Ngày bắt đầu</h1>
            <input id="daystart" type="date" onchange="doanhthu()">
        </div>
        <div class="p-2"></div>
        <div class="p-2 ngayketthuc">
            <h1 class="hd-ngayketthuc">Ngày kết thúc</h1>
            <input id="dayend" type="date" onchange="doanhthu()">
        </div>
    </div>


    <div class="page-table">
        <div class="dd-content">
            <table id="tbThongke" class="display">
                <thead>
                    <th style="width: 1%">Stt</th>
                    <th style="width: 6%">Mã đơn hàng</th>
                    <th style="width: 5%">Mã tour</th>
                    <th style="width: 7%">Tên khách hàng</th>
                    <th style="width: 3%">Số điện thoại</th>
                    <th style="width: 7%">Tổng tiền đơn hàng</th>
                    <th style="width: 7%">Phương thức thanh toán</th>
                    <th style="width: 7%">Trạng thái giao dịch</th>
                    <th style="width: 7%">Số tiền đã thanh toán</th>
                    <!-- <th style="width: 1%"></th> -->
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <div id="total">
        <div class="total">
        <div class="totaldoanhthuday">
                <button class="btn" onclick="tongdoanhthubyday()">Tổng doanh thu:</button>
                <div id="doanhthuday">
                   
                </div>
            </div>
            <div class="totaldoanhthu">
                <button class="btn" onclick="tongdoanhthu()">Doanh thu công ty:</button>
                <div id="doanhthunam">
                
                </div>
            </div>
            
        </div>
    </div>




</div>
<script>
    var idcompany = <?= $_GET['idcompany'] ?>;
    document.onload = load()

    function load() {
        // loadTablethongke()
        doanhthu()
    }

    function loadTablethongke() {
        $.post('index.php?controller=cthongke&action=loadTablethongke', {
            idcompany: idcompany,
        }, function(data) {
            data = JSON.parse(data);
            $('#tbThongke').DataTable({
                data: data
            })
        })
    }

    function doanhthu() {
        ngaybatdau = $('#daystart').val()
        ngayketthuc = $('#dayend').val()
        if (!ngaybatdau && !ngayketthuc) {
            loadTablethongke()
        } else if (ngaybatdau && ngayketthuc) {
            $.post('index.php?controller=cthongke&action=loadTablethongkebyday', {
                idcompany: idcompany,
                ngaybatdau: ngaybatdau,
                ngayketthuc: ngayketthuc,
            }, function(data) {
                data = JSON.parse(data);
                if (data.length) {
                    $('#tbThongke').remove()
                    $('#tbThongke_wrapper').remove()
                    $('.thongbao').remove()
                    $('.dd-content').append(`
                    <table id="tbThongke" class="display">
                        <thead>
                            <th style="width: 1%">Stt</th>
                            <th style="width: 6%">Mã đơn hàng</th>
                            <th style="width: 5%">Mã tour</th>
                            <th style="width: 7%">Tên khách hàng</th>
                            <th style="width: 3%">Số điện thoại</th>
                            <th style="width: 7%">Tổng tiền đơn hàng</th>
                            <th style="width: 7%">Phương thức thanh toán</th>
                            <th style="width: 7%">Trạng thái giao dịch</th>
                            <th style="width: 7%">Số tiền đã thanh toán</th>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    `)
                    $('#tbThongke').DataTable({
                        data: data
                    })
                } else {
                    $('#tbThongke').remove()
                    $('#tbThongke_wrapper').remove()
                    $('.dd-content').append(`
                    <p class="thongbao"><i class="fa-solid fa-circle-exclamation"></i> Không tìm thấy đơn hàng <i class="fa-solid fa-circle-exclamation"></i></p>
                    `)

                }

            })
        } else if (ngaybatdau || ngayketthuc) {
            console.log("Chọn ngày kết thúc");
        }
    }

    function tongdoanhthu() {
        $.post('index.php?controller=cthongke&action=tongdoanhthu', {
            idcompany: idcompany,
        }, function(data) {
            $('#doanhthunam').children().remove()
            $('#doanhthunam').append(`
            <p>` + data + `</p>
            `)
        })
    }

    function tongdoanhthubyday() {
        ngaybatdau = $('#daystart').val()
        ngayketthuc = $('#dayend').val()

        $.post('index.php?controller=cthongke&action=doanhthubyday', {
            idcompany: idcompany,
            ngaybatdau: ngaybatdau,
            ngayketthuc: ngayketthuc,
        }, function(data) {
            $('#doanhthuday').children().remove()
            $('#doanhthuday').append(`
            <p>` + data + `</p>
            `)
        })
    }
</script>