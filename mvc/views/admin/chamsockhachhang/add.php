<form class="container needs-validation" novalidate>
    <h3>Thêm câu trả lời</h3>
    <input type="hidden" name="" id="idquestion" value="<?php echo $_GET['idquestion'] ?>">
    <div class="mb-5 mt-5">
        <textarea required class="form-control" id="answer" rows="8" placeholder="Nhập câu trả lời"></textarea>
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button class="btn btn-primary me-md-2 btn-traloi" type="button">Thêm</button>
        <a class="btn btn-primary" href="?controller=chome&action=admin&path=chamsockhachhang" type="button">Huỷ</a>
    </div>
</form>
<script>
    var forms = document.querySelectorAll('.needs-validation')
    $('.btn-traloi').on('click', function(event) {
        Array.prototype.slice.call(forms)
            .forEach(function(e) {
                if (!e.checkValidity()) {
                    e.classList.add('was-validated')
                    event.preventDefault()
                    event.stopPropagation()
                } else {
                    traloi()
                }
            })
    });

    idquestion = $('#idquestion').val()

    function traloi() {
        var answer = $('#answer').val()
        $.post("index.php?controller=cuser&action=sendAnswer", {
            idquestion: idquestion,
            answer: answer
        }, function(data) {
            if (data > 0) {
                alert("Thêm thành công!")
                window.location.replace("?controller=chome&action=admin&path=chamsockhachhang")
            } else {
                alert("Thêm thất bại!")
            }
        })
    }
</script>