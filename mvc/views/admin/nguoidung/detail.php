<link rel="stylesheet" href="//cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<div class="container">
    <h4 class="page-title">DANH SÁCH ĐƠN HÀNG ĐÃ ĐẶT</h4>
    <div class="page-table">
        <div id="tenkh"></div>
        <table id="tbOrderByUser" class="display">
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
    <input type="hidden" name="" value="<?php echo $_GET['idUser']?>" id="iduser">
    <button class="admin-button"><a href="?controller=chome&action=admin&path=nguoidung"> Trở Lại</a></button>
</div>

<script>
    var iduser = $('#iduser').val()
    $(document).ready(load())

    function load(){
        loadTableDetail()
        loadNameOfUser()
    }

    function loadTableDetail()
    {
        $.post("index.php?controller=cuser&action=loadTableOrderByIdUser", {
            iduser: iduser
        }, function(data){
            data = JSON.parse(data)
            $('#tbOrderByUser').DataTable({
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
            $('#tenkh').append('<h6>Tên khách hàng: <span class="fw-bold">'+data[0]['name']+'</span></h6>')
        })
    }
</script>