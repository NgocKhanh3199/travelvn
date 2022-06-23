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

    function deleteTour(idtour) {
        choice = confirm("Có chắc muốn xóa tour này?");
        if (choice) {
            $.post("index.php?controller=ctour&action=deleteTour", {
                idtour: idtour
            }, function(data) {
                if (data == 1) {
                    alert("Xóa thành công!");
                    window.location.reload()
                } else {
                    alert("Xóa thất bại!");
                }
            })
        }
    }
</script>