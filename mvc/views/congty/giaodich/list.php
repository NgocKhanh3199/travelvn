<link rel="stylesheet" href="//cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="./public/css/listgiaodich.css">
<div class="container">
    <h4 class="page-title">DANH SÁCH GIAO DỊCH</h4>
    <div class="icon">
        <i class="fa-solid fa-plane"></i>
        <i class="fa-solid fa-plane"></i>
        <i class="fa-solid fa-plane"></i>
    </div>

    <div class="page-table">
        <div class="dd-content">
            <table id="tbGiaodich" class="display">
                <thead>
                    <th style="width: 1%">Stt</th>
                    <th style="width: 6%">Mã đơn hàng</th>
                    <th style="width: 5%">Tổng tiền</th>
                    <th style="width: 7%">Ngày thanh toán</th>
                    <th style="width: 3%">Phương thức thanh toán</th>
                    <th style="width: 7%">Trạng thái giao dịch</th>
                    <th style="width: 1%"></th>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="hd-bill">TravelVN</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="total-price">
                        <p class="total">Tổng tiền</p>
                        <p class="thucte" id="price-total">23056465</p>
                    </div>
                    <div class="total-price">
                        <p class="money_received">Số tiền đã nhận</p>
                        <input class="thucte" id="money_received" type="number">
                    </div>
                    <div class="total-price">
                        <p class="money_refund">Tiền thừa</p>
                        <input class="thucte" id="money_refund" type="number">
                    </div>
                    <div class="hihi">
                        <button onclick="thanhtoan1()">Thanh toán</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
       var idcompany = <?= $_GET['idcompany'] ?>;
    document.onload = load()

    function load() {
        loadTableGiaodich()

    }

    function loadTableGiaodich() {
        $.post('index.php?controller=cgiaodich&action=loadTableGiaodich', {
            idcompany: idcompany,
        }, function(data) {
            data = JSON.parse(data);
            $('#tbGiaodich').DataTable({
                data: data
            })
        })
    }
    var idgiaodich1;

    function thanhtoan(idgiaodich) {
        idgiaodich1 = idgiaodich;
    }

    function thanhtoan1() {
        let d = new Date();
        let year = d.getFullYear();
        let month = d.getMonth() + 1;
        let day = d.getDate();
        date_payment = year + '-' + month + '-' + day
        time_payment = d.getSeconds() + ":" + d.getHours() + ":" + d.getMinutes()
        money_received = $('#money_received').val();
        money_refund = $('#money_refund').val();
        $.post("index.php?controller=cgiaodich&action=thanhtoan", {
            idgiaodich: idgiaodich1,
            date_payment: date_payment,
            time_payment: time_payment,
            money_received: money_received,
            money_refund: money_refund,
        }, function(data) {
            if (data > 0) {
                alert("Thanh toán thành công");
                location.reload();
            } else if (data < 0) {
                alert("Thanh toán thất bại");
            }
        })
    }
</script>