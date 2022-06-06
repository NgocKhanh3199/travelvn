<div class="container-fluid m-5 p-5" id="content">
    <div class="col col-10 mx-auto">
        <p class="fs-2 text-center">Chăm Sóc Khách Hàng</p>
    </div>
    <div class="col col-10 mx-auto">
        <p class="fs-6 text-center">Vui lòng nhập thông tin bạn muốn đóng góp/trợ giúp vào form hoặc bạn có thể tìm
            kiếm câu hỏi và câu trả lời trợ giúp ở dưới. <br> Cảm ơn thông tin của bạn!</p>
    </div>
    <form class="col col-10 mb-3 mx-auto" action="">
        <label for="cauhoi" class="form-label fs-5">Thông tin đóng góp/câu hỏi trợ giúp</label>
        <textarea class="form-control mt-2" id="cauhoi" rows="6" placeholder="Nhập thông tin tại đây"></textarea>
        <div class="text-end mt-3">
            <button class="btn btn-primary" type="button" onclick="guicauhoi()">Gửi</button>
        </div>
    </form>
    <div class="cauhoikh mt-5 mb-5" id="cauhoikh">
        <div class="col col-10 mx-auto">
            <p class="fs-5">Câu hỏi của bạn</p>
        </div>
    </div>
    <div class="col col-10 mx-auto">
        <p class="fs-5">Danh sách câu hỏi</p>
    </div>
    <ul class="col col-10 list-group mx-auto list-group-numbered">
        <li class="list-group-item list-group-item-primary list-group-item-action" data-bs-toggle="collapse"
            href="#cauhoi1" role="button">Làm cách nào để đặt tour?</li>
        <div class="collapse" id="cauhoi1">
            <div class="card card-body">
                Some placeholder content for the collapse component. This panel is hidden by default but revealed
                when the user activates the relevant trigger.
            </div>
        </div>
        <li class="list-group-item list-group-item-warning list-group-item-action" data-bs-toggle="collapse"
            href="#cauhoi2" role="button">Làm cách nào để huỷ tour?</li>
        <div class="collapse" id="cauhoi2">
            <div class="card card-body">
                Some placeholder content for the collapse component. This panel is hidden by default but revealed
                when the user activates the relevant trigger.
            </div>
        </div>
        <li class="list-group-item list-group-item-primary list-group-item-action" data-bs-toggle="collapse"
            href="#cauhoi3" role="button">Làm cách nào để thêm địa điểm yêu thích và xem lại danh sách địa điểm được
            đánh dấu yêu thích?</li>
        <div class="collapse" id="cauhoi3">
            <div class="card card-body">
                Some placeholder content for the collapse component. This panel is hidden by default but revealed
                when the user activates the relevant trigger.
            </div>
        </div>
        <li class="list-group-item list-group-item-warning list-group-item-action" data-bs-toggle="collapse"
            href="#cauhoi4" role="button">Làm cách nào để tìm kiếm một địa điểm?</li>
        <div class="collapse" id="cauhoi4">
            <div class="card card-body">
                Some placeholder content for the collapse component. This panel is hidden by default but revealed
                when the user activates the relevant trigger.
            </div>
        </div>
        <li class="list-group-item list-group-item-primary list-group-item-action" data-bs-toggle="collapse"
            href="#cauhoi5" role="button">Làm cách nào để xem đánh giá về địa điểm đó?</li>
        <div class="collapse" id="cauhoi5">
            <div class="card card-body">
                Some placeholder content for the collapse component. This panel is hidden by default but revealed
                when the user activates the relevant trigger.
            </div>
        </div>
        <li class="list-group-item list-group-item-warning list-group-item-action" data-bs-toggle="collapse"
            href="#cauhoi6" role="button">Thanh toán như thế nào?</li>
        <div class="collapse" id="cauhoi6">
            <div class="card card-body">
                Some placeholder content for the collapse component. This panel is hidden by default but revealed
                when the user activates the relevant trigger.
            </div>
        </div>
        <li class="list-group-item list-group-item-primary list-group-item-action" data-bs-toggle="collapse"
            href="#cauhoi7" role="button">Tìm kiếm địa điểm với mức giá mong muốn?</li>
        <div class="collapse" id="cauhoi7">
            <div class="card card-body">
                Some placeholder content for the collapse component. This panel is hidden by default but revealed
                when the user activates the relevant trigger.
            </div>
        </div>
    </ul>
    <input type="hidden" value="<?php if($_SESSION['iduser']){echo $_SESSION['iduser'];}?>" id="iduser">
</div>
<script>
    var iduser = $('#iduser').val()
    if(iduser == null)
    {
        alert("Bạn phải đăng nhập!")
        location.href = "index.php?controller=cuser&action=loginpage";
    }
    else
    {
        window.onload = function()
        {
            $.post("index.php?controller=cuser&action=getQuestionAndAnswer", {
                iduser: iduser
            }, function(data){
                cauhoi = JSON.parse(data)
                row = 0
                for (i = 0; i < cauhoi.length; i++) {
                    idcauhoi = cauhoi[i]['idquestion']
                    ndtraloi = cauhoi[i]['answer']
                    ndcauhoi = cauhoi[i]['content']
                    if(ndtraloi == '')
                    {
                        $('#cauhoikh').append(`
                            <ul class="col col-10 list-group mx-auto">
                                <li class="list-group-item list-group-item-primary list-group-item-action" data-bs-toggle="collapse" href="#cautraloi`+i+`" role="button" id="cauhoicuaban"> ` + ndcauhoi + `
                                </li>
                                <div class="collapse" id="cautraloi`+i+`">
                                    <div class="card card-body">
                                        Chưa có câu trả lời
                                    </div>
                                </div>
                            </ul>
                        `)
                    }
                    else
                    {
                        $('#cauhoikh').append(`
                            <ul class="col col-10 list-group mx-auto">
                                <li class="list-group-item list-group-item-primary list-group-item-action" data-bs-toggle="collapse" href="#cautraloi`+i+`" role="button" id="cauhoicuaban"> ` + ndcauhoi + `
                                </li>
                                <div class="collapse" id="cautraloi`+i+`">
                                <div class="card card-body">
                                    ` + ndtraloi + `
                                </div>
                                </div>
                            </ul>
                        `)
                    }
                }
            })
        }
        function guicauhoi()
        {
            var content = $('#cauhoi').val()
            if(content == '')
            {
                alert("Bạn phải nhập nội dung!")
            }
            else{
                $.post("index.php?controller=cuser&action=sendQuestion", {
                    iduser:iduser,
                    content:content
                }, function(data){
                    if(data == 1)
                    {
                        alert("Nội dung đã được gửi, cảm ơn bạn!")
                    }
                    else
                    {
                        alert("Nội dung chưa được gửi!")
                    }
                })
            }
        }
    }
</script>