<div class="container">
    <h3>Xem câu trả lời</h3>
    <input type="hidden" name="" id="idquestion" value="<?php echo $_GET['idquestion'] ?>">
    <div class="mb-5 mt-5">
        <textarea class="form-control" id="answer" rows="8" disabled></textarea>
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary" href="?controller=chome&action=admin&path=chamsockhachhang" type="button">Trở về</a>
    </div>
</div>
<script>
    idquestion = $('#idquestion').val()
    document.onload = loadCauTraLoi()
    function loadCauTraLoi()
    {
        $.post("index.php?controller=cuser&action=loadCauTraLoiByIdCauHoi", {
            idquestion: idquestion,
        }, function(data)
        {
            data = JSON.parse(data)
            $('#answer').val(data[0]['answer'])
        })
    }
</script>