<link rel="stylesheet" href="//cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="./public/css/detail_order.css">
<div class="detail_order">
    <div class="hd_detail_order">
        <h3 class="hd_detail">CHI TIẾT ĐƠN HÀNG</h3>
    </div>
    <div class="in4_detail_order" id="in4_detail_order">
        
    </div>
</div>
<script>
    var idorder = <?= $_GET['idorder'] ?>;

    document.onload = loadorder()

    function loadorder() {
        $.post("index.php?controller=corder&action=getOrderbyIdorder", {
            idorder: idorder,
        }, function(data) {
            order = JSON.parse(data);
            console.log(order);
            o = order[0];
            daystart = o['daystart']
            daystart1 = daystart.substr(8, 2) + `/` + daystart.substr(5, 2) + `/` + daystart.substr(0, 4);
            dayend = o['dayend']
            dayend1 = dayend.substr(8, 2) + `/` + dayend.substr(5, 2) + `/` + dayend.substr(0, 4);
            
            name = o['name-customer']
            email = o['email-customer']
            phone = o['phone-customer']
            address = o['address-customer']
            numberadult = o['number-adult']
            numberchild = o['number-child']
            totalkh = (parseInt(o['number-adult']) + parseInt(o['number-child']))
            pay = o['payment-method']
            if (pay == 1) {
                payment = "Thanh toán online"
            } else if (pay == 0) {
                payment = "Thanh toán trực tiếp"
            }
            var totalprice = parseInt(o['price-total']);
            totalprice = totalprice.toLocaleString('vi', {
                style: 'currency',
                currency: 'VND'
            });
            $('#in4_detail_order').append(`
            <div class="in4_tour">
            <div class="hd_in4_tour">
                <h5 class="hd_tour">Thông tin tour</h5>
            </div>
            <div class="item_time">
                <p>Thời gian diễn ra từ: ` + daystart1 + ` - ` + dayend1 + `</p>
            </div>
        </div>
        <div class="in4_khachhang">
            <div class="hd_in4_khachhang">
                <h5 class="hd_khachhang">Khách hàng</h5>
            </div>
            <div class="content_in4_khachhang">
                <div class="content_in4_kh">
                    <div class="name roww">
                        <p class="label">Tên khách hàng:</p>
                        <p class="tt">` + name + `</p>
                    </div>
                </div>
                <div class="content_in4_kh">
                    <div class="name roww">
                        <p class="label">Gmail:</p>
                        <p class="tt">` + email + `</p>
                    </div>
                </div>
                <div class="content_in4_kh">
                    <div class="name roww">
                        <p class="label">Số điện thoại:</p>
                        <p class="tt">` + phone + `</p>
                    </div>
                </div>
                <div class="content_in4_kh">
                    <div class="name roww">
                        <p class="label">Địa chỉ:</p>
                        <p class="tt">` + address + `</p>
                    </div>
                </div>
                <div class="content_in4_kh">
                    <div class="roww">
                        <p class="label">Số lượng hành khách:</p>
                        <p class="tt">` + totalkh + ` người (` + numberadult + ` người lớn, ` + numberchild + ` trẻ em)</p>
                    </div>
                    <div class="adult">
                        <p class="hd_in4_adult">Người lớn:</p>
                        <div id="adult">

                        </div>

                    </div>
                    <div class="child" id="child">
                        <p class="hd_in4_child">Trẻ em:</p>
                        <div id="child">

                        </div>
                    </div>
                </div>
                <div class="in4_total_price">
                    <div class="total_price">
                        <p class="label lb_price">Tổng tiền thanh toán:</p>
                        <p class="tt tt_price">` + totalprice + `</p>
                    </div>
                </div>
                <div class="in4_pttt">
                    <div class="pttt roww">
                        <p class="lb_pttt">Phương thức thanh toán:</p>
                        <p class="tt_pttt">` + payment + `</p>
                    </div>
                </div>
            </div>
        </div>
            `)
            for (let i = 0; i < order.length; i++) {
                age = order[i]['age']
                namecustoment = order[i]['namecustomer']
                gender = order[i]['gender']
                if (gender == 1) {
                    gioitinh = "Nam"
                } else if (gender == 0) {
                    gioitinh = "Nữ"
                }
                birth = order[i]['birthday']
                birth1 = birth.substr(8, 2) + `/` + birth.substr(5, 2) + `/` + birth.substr(0, 4);
                if (age == 1) {
                    $('#adult').append(`
                    <div class="in4_adult">
                            <p class="name_adult">` + namecustoment + `</p>
                            <p class="birth_adult">` + birth1 + `</p>
                            <p class="gender_adult">` + gioitinh + `</p>
                            </div>
                    `)
                } else if (age == 0) {
                    $('#child').append(`
                        <div class="in4_child">
                            <p class="name_child">` + namecustoment + `</p>
                            <p class="birth_child">` + birth1 + `</p>
                            <p class="gender_child">` + gioitinh + `</p>
                        </div>
                    `)
                }

            }

        })
    }
</script>