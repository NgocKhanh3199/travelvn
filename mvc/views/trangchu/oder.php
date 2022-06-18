<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- link bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- end_link bootstrap 5 -->
    <!-- link icon -->
    <script src="https://kit.fontawesome.com/5f22631803.js" crossorigin="anonymous"></script>
    <!-- end-link icon -->
    <link rel="stylesheet" href="./public/css/order.css">
    
    <script src="./public/js/js.js"></script>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

</head>

<body>
    <div class="hd">
        <header class="hd-order1">Đăng ký tour</header>
    </div>
    <div class="body">
        <div class="order">
            <div class="lienlac">
                <header class="hd-lienlac">Thông tin liên lạc</header>
                <div class="item-lienlac row">
                    <div class="col-sm-6 name">
                        <label for="text">Họ tên *</label>
                        <br>
                        <input class="ip-name" id="ip-name" type="text" placeholder="Lê Kim Ngọc Khánh">
                    </div>
                    <div class="col-sm-6 email">
                        <label for="text">Email *</label>
                        <br>
                        <input class="ip-email" id="ip-email" type="text" placeholder="Nhannguyen3199@gmail.com">
                    </div>
                    <div class="col-sm-6 phone">
                        <label for="text">Số điện thoại *</label>
                        <br>
                        <input class="ip-phone" id="ip-phone" type="text" placeholder="0961623308">
                    </div>
                    <div class="col-sm-6 address">
                        <label for="text">Địa chỉ *</label>
                        <br>
                        <input class="ip-address" id="ip-address" type="text" placeholder="89 Trần Việt Châu, phường AN Hòa, Ninh Kiều, Cần Thơ">
                    </div>

                </div>
            </div>
            <div class="soluonghanhkhach">
                <header class="hd-soluonghanhkhach">Hành Khách</header>
                <div class="item-soluonghk row">
                    <div class="col-sm-5 slnguoilon">
                        <label for="text"><i class="fa-solid fa-person-half-dress"></i> Người lớn</label>
                        <input id="slnguoilon" min="0" onchange="loadadult()" class="ip-slnguoilon" type="number">
                    </div>
                    <div class="col-sm-5 sltreem">
                        <label for="text"><i class="fa-solid fa-children"></i> Trẻ em</label>
                        <input id="sltreem" min="0" onchange="loadchild()" class="ip-sltreem" type="number">
                    </div>
                </div>
            </div>
            <div class="quydinhnguoi">
                <div class="nguoilon">
                    <p>
                        <i class="fa-solid fa-person-half-dress"></i>
                        Người lớn sinh trước ngày
                        <span class="ngaynl fw-bold">25/5/2010</span>
                    </p>

                </div>
                <div class="treem">
                    <p>
                        <i class="fa-solid fa-children"></i>
                        Trẻ em sinh sau ngày
                        <span class="ngayte fw-bold">25/5/2010</span>
                    </p>
                </div>
            </div>
            <div class="thongtinkh">
                <header class="hd-ttkhachhang">Thông tin khách hàng</header>
                <h5 class="hd-nguoilon">Người lớn</h5>
                <div class="in4nguoilon" id="in4nguoilon">

                </div>
                <h5 class="hd-treem">Trẻ em</h5>
                <div class="in4treem" id="in4treem">

                </div>
            </div>
            <div class="luuy">
                <header class="hd-note">Quý khách có lưu ý gì với chúng tôi</header>
                <textarea name="note" id="content-luuy" cols="20" rows="5" placeholder="Vui lòng nhập nội dung lời nhắn bằng tiếng Anh hoặc tiếng Việt"></textarea>
            </div>


        </div>

        <div class="thongtinorder">
            <div class="div" id="div">

            </div>

        </div>
    </div>
</body>

</html>
<script>
    var idtour = <?= $_GET['idtour'] ?>;
    var iduser = <?php echo $_SESSION['iduser'] ?>;


    document.onload = Vieworder()

    const renderField = (number, root, id) => {
        // root.children().remove();
        root.append(`
        <div class="item-treem row" id="${id}${number}">
                        <div class="col-sm-4 name">
                            <label for="text">Họ tên *</label>
                            <br>
                            <input class="ip-name" id="ip-name"type="text" placeholder="Lê Kim Ngọc Khánh">
                        </div>
                       
                        <div class="col-sm-3 gioitinh">
                            <label for="text">Giới tính *</label>
                            <br>
                            <select name="gioitinh" id="gioitinh">
                                <option disabled selected>Giới tính</option>
                                <option value="1">Nam</option>
                                <option value="0">Nữ</option>
                            </select>
                        </div>
                        
                        <div class="col-sm-4 ngaysinh">
                            <label for="text">Ngày sinh</label>
                            <input class="ip-ngaysinh" id="ngaysinh" type="date">
                        </div>
                    </div>
        `)
    }

    function loadadult() {
        slnguoilon = $('#slnguoilon').val();
        renderField(slnguoilon, $('#in4nguoilon'), 'item-nguoilon-')
        Vieworder()
    }

    function loadchild() {
        slchild = $('#sltreem').val();
        renderField(slchild, $('#in4treem'), 'item-treem-')
        Vieworder()
    }

    function Vieworder() {
        slchild = $('#sltreem').val();
        slnguoilon = $('#slnguoilon').val();
        if (slchild) {
            slchild = $('#sltreem').val();
        } else {
            slchild = 0;
        }
        if (slnguoilon) {
            slnguoilon = $('#slnguoilon').val();
        } else {
            slnguoilon = 0;
        }
        $('#div').children().remove();
        $.post("index.php?controller=ctour&action=getTourByIdTour", {
            idTour: idtour,
        }, function(data) {
            Tour = JSON.parse(data);
            t = Tour[0];
            priceadult = t['price-adult'];
            pricechild = t['price-child'];
            var priceadult1 = parseInt(priceadult);
            priceadult1 = priceadult1.toLocaleString('vi', {
                style: 'currency',
                currency: 'VND'
            });
            var pricechild1 = parseInt(pricechild);
            pricechild1 = pricechild1.toLocaleString('vi', {
                style: 'currency',
                currency: 'VND'
            });
            total1 = (parseInt(slnguoilon) * parseInt(priceadult)) + (parseInt(slchild) * parseInt(pricechild))
            var total = total1;
            total = total.toLocaleString('vi', {
                style: 'currency',
                currency: 'VND'
            });
            $('#div').append(`
            <header class="hd-ttorder">Thông tin đặt hàng</header>
                <div class="tt-order">
                    <p class=" hd-tt">Số lượng hành khách</p>
                </div>
                <div class="tt-order">
                    <p class="thongtin">Người lớn</p>
                    <p class="thucte">` + slnguoilon + ` người</p>
                </div>
                <div class="tt-order">
                    <p class="thongtin">Trẻ em</p>
                    <p class="thucte">` + slchild + ` người</p>
                </div>
                <div class="price-ticket tt-order">
                    <p class="hd-tt">Giá vé</p>
                </div>
                <div class="price-ticket-adult tt-order">
                    <p class="thongtin">Người lớn</p>
                    <p class="thucte">` + slnguoilon + ` x ` + priceadult1 + `</p>
                </div>
                <div class="price-ticket-child tt-order">
                    <p class="thongtin">Trẻ em</p>
                    <p class="thucte">` + slchild + ` x ` + pricechild1 + `</p>
                </div>
                <div class="thanhtoan">
                    <h6 class="hd-thanhtoan">Phương thức thanh toán</h6>
                    <div class="tt-order">
                        <div class="onl">
                            <input type="radio" id="onl" name="onl" value="1">
                            <label for="onl"> Thanh toán online</label><br>
                        </div>
                        <div class="tructiep">
                            <input type="radio" id="tructiep" name="onl" value="0">
                            <label for="tt"> Thanh toán trực tiếp</label><br>
                        </div>                   
                    </div>
                </div>
                <div class="total-price">
                    <p class="total">Tổng cộng</p>
                    <p class="thucte price-total" id="price-total">` + total + `</p>
                </div>
                
                <div class="btn">
                    <button class="btn-order" onclick="addOrder()">Đặt ngay</button>
                </div>
            `)
        })
    }

    function addOrder() {
        alert("Hãy đảm bảo rằng tất cả thông tin của bạn điều chính xác");
        const count1 = $('#in4nguoilon')[0].childElementCount;
        let rs_adult = []
        for (let i = 0; i < count1; i++) {
            rs_adult = [
                ...rs_adult, {
                    name_customer: $(`#item-nguoilon-${i+1} ` + '#ip-name').val(),
                    gender: $(`#item-nguoilon-${i+1} ` + '#gioitinh').val(),
                    birth: $(`#item-nguoilon-${i+1} ` + '#ngaysinh').val(),
                }
            ]
        }

        const count2 = $('#in4treem')[0].childElementCount;
        let rs_child = []
        for (let i = 0; i < count2; i++) {
            rs_child = [
                ...rs_child, {
                    name_customer: $(`#item-treem-${i+1} ` + '#ip-name').val(),
                    gender: $(`#item-treem-${i+1} ` + '#gioitinh').val(),
                    birth: $(`#item-treem-${i+1} ` + '#ngaysinh').val(),
                }
            ]
        }

        $.post("index.php?controller=ctour&action=getTourByIdTour", {
            idTour: idtour,
        }, function(data) {
            Tour = JSON.parse(data);
            t = Tour[0];
            daystart = t['day-start'];
            dayend = t['day-end'];
            priceadult = t['price-adult'];
            pricechild = t['price-child'];
            slchild = $('#sltreem').val();
            slnguoilon = $('#slnguoilon').val();
            name = $('#ip-name').val();
            email = $('#ip-email').val();
            phone = $('#ip-phone').val();
            address = $('#ip-address').val();
            pricetotal = (parseInt(slnguoilon) * parseInt(priceadult)) + (parseInt(slchild) * parseInt(pricechild))
            totalguest = parseInt(slnguoilon) + parseInt(slchild)
            note = $('#content-luuy').val();

            if ($('#onl').prop("checked")) {
                thanhtoan = $('#onl').val();
            } else if ($('#tructiep').prop("checked")) {
                thanhtoan = $('#tructiep').val();
            }
            $.post("index.php?controller=corder&action=addOrder", {
                idorder: Date.now(),
                idtour: idtour,
                iduser: iduser,
                daystart: daystart,
                dayend: dayend,
                slchild: slchild,
                slnguoilon: slnguoilon,
                totalguest: totalguest,
                name: name,
                email: email,
                phone: phone,
                address: address,
                pricetotal: pricetotal,
                note: note,
                thanhtoan: thanhtoan,
                rs_adult: rs_adult,
                rs_child: rs_child,
            }, function(data) {
                rs = JSON.parse(data);
                data = rs[0]
                idorde = rs[1];
                if (data == 2) {
                    location.href = "index.php?controller=chome&action=vnpay&idorder=" + idorde
                } else if (data == 1) {
                    alert("Đặt tour thành công")
                    window.location = "index.php?controller=chome&action=home&page=detail_order&idorder=" + idorde
                } else if (data == -1) {
                    alert("Đặt tour thất bại")
                } else if (data == -2) {
                    alert("Không đủ số lượng người")
                }
            })
        })
    }
</script>