<link rel="stylesheet" href="//cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<script src="./public/js/js.js"></script>
<div class="container">
    <h4 class="page-title">CHI TIẾT ĐỊA ĐIỂM</h4>
    <h5 style="font-style: italic; text-align:start; margin: 20px; border-bottom: 1px solid black">THÔNG TIN ĐỊA ĐIỂM</h5>
    <input type="hidden" name="" id="iddiadiem" value="<?php echo $_GET['iddiadiem'] ?>">
    <div class="container">
        <div class="hinhanh">
           
        </div>
        <div class="d-flex justify-content-around mt-4 image-items">
            
        </div>
        <div class="container content-detail-order text-start border border-dark p-4 mt-4" id="content-detail-order">

        </div>
    </div>
    <h5 style="font-style: italic; text-align:start; margin: 20px; border-bottom: 1px solid black" class="mt-5">Tour</h5>
    <div class="page-table">
        <table id="tbTour" class="display">
        <thead>
                <th style="width: 1%">Stt</th>
                <th style="width: 1%">ID tour</th>
                <th style="width: 6%">Hình ảnh</th>
                <th style="width: 10%">Tên tour</th>
                <th style="width: 2%">Giá người lớn</th>
                <th style="width: 2%">Giá trẻ em</th>
                <th style="width: 3%">Ngày bắt đầu</th>
                <th style="width: 3%">Ngày kết thúc</th>
                <th style="width: 1%"></th>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
    <button class="admin-button"><a href="?controller=chome&action=admin&path=diadiem"> Trở Lại</a></button>
</div>

<script>
    var iddiadiem = $('#iddiadiem').val()
    document.onload = load()

    function load() {
        loadDetailPlace()
        loadTableTour()
    }

    function loadDetailPlace() {
        pathhinhanhtour = "./public/img/diadiem/";
        $.post("index.php?controller=cdiadiem&action=getDiadiemByIddiadiem", {
            iddiadiem: iddiadiem
        }, function(data) {
            data = JSON.parse(data)
            hinhanh = data[0]['hinhanh']
            hinhanh1 = data[0]['hinhanh1']
            hinhanh2 = data[0]['hinhanh2']
            hinhanh3 = data[0]['hinhanh3']
            $('#content-detail-order').append(`
                <div>
                    <h6>Tên địa điểm: <span class="fw-bold">` + data[0]['nameplace'] + `</span></h6>
                    <h6>Thông tin: <span class="fw-bold">` + data[0]['information'] + `</span></h6>
                    <h6>Địa chỉ: <span class="fw-bold">` + data[0]['address'] + `</span></h6>
                    <h6>Thành phố/tỉnh: <span class="fw-bold">` + data[0]['city'] + `</span></h6>
                    <h6>Quận/huyện: <span class="fw-bold">` + data[0]['district'] + `</span></h6>
                    <h6>Xã/phường/thị trấn: <span class="fw-bold">` + data[0]['ward'] + `</span></h6>
                    <h6>Địa chỉ đầy đủ: <span class="fw-bold">` + data[0]['full-address'] + `</span></h6>
                </div>
            `)
            if(hinhanh.length == 0)
            {
                hinhanh = 'noimg.png'
            }
            if(hinhanh1.length == 0)
            {
                hinhanh1 = 'noimg.png'
            }
            if(hinhanh2.length == 0)
            {
                hinhanh2 = 'noimg.png'
            }
            if(hinhanh3.length == 0)
            {
                hinhanh3 = 'noimg.png'
            }
            hinhanh = pathhinhanhtour + hinhanh
            hinhanh1 = pathhinhanhtour + hinhanh1
            hinhanh2 = pathhinhanhtour + hinhanh2
            hinhanh3 = pathhinhanhtour + hinhanh3
            $('.hinhanh').append(`
                <img src="` + hinhanh + `" alt="" width="50%" height="50%">
            `)
            $('.image-items').append(`
                <img src="` + hinhanh1 + `" alt="" width="250px" height="250px">
                <img src="` + hinhanh2 + `" alt="" width="250px" height="250px">
                <img src="` + hinhanh3 + `" alt="" width="250px" height="250px">
            `)
        })
    }

    function loadTableTour() {
        $.post("index.php?controller=cdiadiem&action=loadTableTourByIdPlace", {
            iddiadiem: iddiadiem
        }, function(data) {
            data = JSON.parse(data)
            $('#tbTour').DataTable({
                data: data
            })
        })
    }
</script>