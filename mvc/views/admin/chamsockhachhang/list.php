<link rel="stylesheet" href="//cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<div class="container">
    <h4 class="page-title">DANH SÁCH CÂU HỎI/GÓP Ý</h4>
    <div class="page-table">
        <div class="dd-content">
            <table id="tbUser" class="display">
                <thead class="text-center">
                    <th>STT</th>
                    <th>Nội Dung Câu Hỏi</th>
                    <th>Tên người dùng</th>
                    <!-- <th style="width: 2%">Nội Dung Trả Lời</th> -->
                    <th>Trạng Thái</th>
                    <th>Hiển Thị</th>
                    <th></th>
                    <th></th>
                    <th></th>
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
        loadTableQuestion()
    }

    function loadTableQuestion() {
        $.post('index.php?controller=cuser&action=loadTableQuestion', {}, function(data) {
            data = JSON.parse(data);
            $('#tbUser').DataTable({
                data: data
            })
        })
    }

    function deleteQuestion(idquestion)
    {
        choice = confirm("Có chắc muốn xóa câu hỏi này ?");
        if(choice)
        {
            $.post("index.php?controller=cuser&action=deleteCauHoiByIdCauHoi", {
            idquestion: idquestion
            }, function(data){
                if(data == 1)
                {
                    
                    alert("Xoá thành công!")
                }
                else
                {
                    alert("Xoá thất bại!")
                }
            })
        }
    }
    
</script>