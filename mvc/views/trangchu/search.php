<script src="./public/js/js.js"></script>
<div class="container-fluid">

    <div class="row mt-5">
        <div class="menu-left col-3 border">
            <div class="w-100 boxq">
                <div class="headerq">
                    <h6 class="m-4 p-2 text-center border border-success">Tìm địa điểm theo quận</h6>
                </div>
                <div class="menuq">
                <select id="city" aria-placeholder="chon tinh" onchange="get_huyen()" name="city" class="form-select" aria-label="Default select example"></select>
                    <ul class="nav flex-column" id="diadiem">
                        <li></li>
                        <li><select id="district" name="district" onchange="get_id_huyen()" class="form-select" aria-label="Default select example"></select></li>
                        <li><select id="ward" name="ward" class="form-select" aria-label="Default select example"></select></li>
                        <!-- <li><a class="dropdown-item" href="#">Ô Môn</a></li>
                        <li><a class="dropdown-item" href="#">Phong Điền</a></li>
                        <li><a class="dropdown-item" href="#">Cờ Đỏ</a></li>
                        <li><a class="dropdown-item" href="#">Vĩnh Thạnh</a></li>
                        <li><a class="dropdown-item" href="#">Thốt Nốt</a></li> -->
                    </ul>
                </div>
            </div>
            <!--</ul>-->
        </div>
        <div class="col-9 bg-light">
            <div class="content bg-white mx-auto h-100 p-4" id="ndtimkiem">
                <h3 class="tieude1 text-center border border-bottom p-2">Kết Quả Tìm Kiếm</h3>
                <input type="hidden" name="" id="tukhoa" value="<?php echo $_GET['name'] ?>">
                <div class="d-flex flex-wrap" id="ketqua">
                    
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
    var name = $('#tukhoa').val()
    $('#tamp').remove()
    $('#temp').remove()
    $('#showimg').append('<div id="tamp"></div>')
    $('#hinhanh').append('<div id="temp"></div>')
    $.post("index.php?controller=ctour&action=search", {
        name: name
    }, function(data) {
        if (data == '[]') {
            $('#ketqua').append("<h4 class='m-5 p-5 mx-auto'>Không tìm thấy kết quả</h4>")
        } else {
            var tour = JSON.parse(data)
            path = "./public/img/tour/"
            for (var i = 0; i < tour.length; i++) {
                img = tour[i]['hinhanh'].length > 0 ? tour[i]['hinhanh'] : "2b95fc58931487994632121fc1f00833_1_55_10_20_5_2022.jpg"
                src = path + img
                $('#ketqua').append('<div class="col-sm-4 item-wrap p-2" id="tour">' +
                    '<div class="khungchuaimg">' +
                    ' <img src="' + src + '" alt="" style="width:100%"></div>' +
                    ' <div class="item-meta">' +
                    '  <p class="item-tua mb-1">' +
                    ' <a class="item-header" href="#">' + tour[i]['nametour'] + '</a>' +
                    '  </p>' +
                    ' <p class="item-price md-1">' +
                    '  <span class="amount" data-price="900000">' + tour[i]['price'] + '</span>' +
                    '  <span>VNĐ</span>' +
                    '  </p>' +
                    ' <p class="item-khoihanh mb-1">' +
                    '     <i class="fa-solid fa-clock"></i>' +
                    '     <span>Khởi hành:</span> ' + tour[i]['day-start'] + ' ' +
                    ' </p>' +
                    '  <div class="d-flex justify-content-between">' +
                    '   <a class="item-chitiet" href="index.php?controller=chome&action=detail_tour">Xem chi tiết</a>' +
                    '</div>' +
                    '</div>' +
                    ' </div>')
            }
        }
    })


    
</script>