<link rel="stylesheet" href="//cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<div class="container">
    <h4 class="page-title">DANH SÁCH ĐƠN HÀNG ĐÃ ĐẶT</h4>
    <div class="page-table">
        <table id="tbOrder" class="display">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã đơn hàng</th>
                    <th>Mã tour</th>
                    <th>Mã khách hàng</th>
                    <th>Thành tiền</th>
                    <th>Phương thức thanh toán</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>#dh0123456</td>
                    <td>01/01/2022</td>
                    <td>50.000đ</td>
                    <td>Thành công</td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(load())

    function load(){
        loadTableOrder()
    }

    function loadTableOrder()
    {
        $.post("index.php?controller=corder&action=loadTableOrder", {}
        , function(data){
            data = JSON.parse(data)
            $('#tbOrder').DataTable({
                data: data
            })
        })
    }
</script>