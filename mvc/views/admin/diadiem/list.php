<link rel="stylesheet" href="//cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<div class="container">
    <h4 class="page-title">DANH SÁCH ĐỊA ĐIỂM</h4>
    <div class="page-table">
        <button class="admin-button" style="float:right; margin: 10px">
            <a href="index.php?controller=chome&action=admin&path=">Thêm địa chỉ</a>
        </button>
        <div class="dd-content">
            <table id="tbDiadiem" class="display">
                <thead>
                    <th style="width: 5%">Stt</th>
                    <th style="width: 10%">Hình ảnh</th>
                    <th style="width: 20%">Tên địa danh</th>
                    <th style="width: 5%"></th>
                    <th style="width: 5%"></th>
                    <th style="width: 5%"></th>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    document.onload = load()
    function load() {
        loadTableDiadiem()
    }

    function loadTableDiadiem() {
        $.post('index.php?controller=cdiadiem&action=loadTableDiadiem', {}, function(data) {
            data = JSON.parse(data); 
            $('#tbDiadiem').DataTable({
                data: data
            })
        })
    }
</script>