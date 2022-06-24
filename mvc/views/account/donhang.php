<div class="container p-5">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
    <div class="container">
        <h4 class="page-title text-center mb-4">DANH SÁCH ĐƠN HÀNG ĐÃ ĐẶT</h4>
        <div class="page-table">
            <table id="tbOrder" class="display">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã đơn hàng</th>
                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Tổng đơn hàng</th>
                        <th>Phương thức thanh toán</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <input type="hidden" value="<?php echo $_SESSION['iduser']?>" id="iduser">

    <script>
        var iduser = $('#iduser').val()
        $(document).ready(load())

        function load() {
            loadTableOrder()
        }

        function loadTableOrder() {
            $.post("index.php?controller=corder&action=loadTableOrderByIdUser", {
                iduser
            }, function(data) {
                data = JSON.parse(data)
                $('#tbOrder').DataTable({
                    data: data
                })
            })
        }
    </script>
</div>