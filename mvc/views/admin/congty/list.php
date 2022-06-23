<link rel="stylesheet" href="//cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<div class="container">
    <h4 class="page-title">DANH SÁCH CÔNG TY</h4>
    <div class="page-table">
        <table id="tbCongty" class="display">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Ảnh Đại Diện</th>
                    <th>Tài Khoản</th>
                    <th>Tên Công Ty</th>
                    <th>Email</th>
                    <th>Điện Thoại</th>
                    <!-- <th>Địa Chỉ</th>
                    <th>Đường</th>
                    <th>Xã/Phường/Thị Trấn</th>
                    <th>Quận/Huyện</th>
                    <th>Tỉnh/Thành Phố</th> -->
                    <th></th>
                    <th></th>

                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
<script>
    document.onload = load()
    function load()
    {
        loadTableCompany()
    }
    function loadTableCompany()
    {
        $.post("index.php?controller=ccompany&action=loadTableCompany", {}
        , function(data){
            data = JSON.parse(data); 
            $('#tbCongty').DataTable({
                data: data
            })
        })
    }
    function deleteCompany(idCompany)
    {
        $.ajax({
            url:"index.php?controller=ccompany&action=deleteCompany",
            method:"post",
            data:{
                idCompany:idCompany
            },success:function(data)
            {
                    alert(data)
            }
        })
    }
</script>