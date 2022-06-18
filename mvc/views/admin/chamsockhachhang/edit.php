<div class="container">
    <h3>Sửa câu trả lời</h3>
    <input type="hidden" name="" id="idquestion" value="<?php echo $_GET['idquestion'] ?>">
    <div class="mb-5 mt-5">
        <textarea class="form-control" id="answer" rows="8" placeholder="Nhập câu trả lời"></textarea>
    </div>
    <h6 class="mb-3"><span class="badge rounded-pill bg-info text-dark">Hiển Thị</span></h6>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="option1" value="1">
        <label class="form-check-label" for="inlineRadio1">Có</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="option2" value="0">
        <label class="form-check-label" for="inlineRadio2">Không</label>
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
        <button class="btn btn-primary me-md-2" type="button" onclick="traloi()">Sửa</button>
        <a class="btn btn-primary" href="?controller=chome&action=admin&path=chamsockhachhang" type="button">Huỷ</a>
    </div>
</div>
<script>
    idquestion = $('#idquestion').val()
    document.onload = loadCauTraLoi()

    function loadCauTraLoi()
    {
        $.post("index.php?controller=cuser&action=loadCauTraLoiByIdCauHoi", {
            idquestion: idquestion
        }, function(data){
            data = JSON.parse(data)
            $('#answer').val(data[0]['answer'])
        })
    }

    function traloi()
    {
        var answer = $('#answer').val()
        if($('#option1').prop("checked"))
        {         
            option = $('#option1').val()
            $.post("index.php?controller=cuser&action=displayQuestion",
            {
                idquestion: idquestion,
                answer: answer,
                option: option
            }, function(data){
                if(data>0)
                {
                    alert("Sửa thành công!")
                    window.location.replace("?controller=chome&action=admin&path=chamsockhachhang")
                }
                else
                {
                    alert("Sửa thất bại!")
                }
            })
        }
        else if($('#option2').prop("checked"))
        {
            option = $('#option2').val()
            $.post("index.php?controller=cuser&action=displayQuestion",
            {
                idquestion: idquestion,
                answer: answer,
                option: option
            }, function(data){
                if(data>0)
                {
                    alert("Sửa thành công!")
                    window.location.replace("?controller=chome&action=admin&path=chamsockhachhang")
                }
                else
                {
                    alert("Sửa thất bại!")
                }
            })
        }
        else
        {
            $.post("index.php?controller=cuser&action=sendAnswer", {
                idquestion: idquestion,
                answer: answer
            }, function(data)
            {
                if(data>0)
                {
                    alert("Sửa thành công!")
                    window.location.replace("?controller=chome&action=admin&path=chamsockhachhang")
                }
                else
                {
                    alert("Sửa thất bại!")
                }
            })
        }
    }
</script>