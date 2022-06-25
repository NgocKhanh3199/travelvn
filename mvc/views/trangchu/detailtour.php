<script src="./public/js/js.js"></script>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<link rel="stylesheet" href="./public/css/trangchu/menu1.css">
<link rel="stylesheet" href="./public/css/trangchu/media.css">
<link rel="stylesheet" href="./public/css/tour/deteil-tour.css">


<body>
    <div class="detail-tour pt-2">
        <div class="content-tour">
            <div class="hd roww row">
                <div class="header-tour col-sm-6 row">
                    <div id="hd-tour">

                    </div>
                    <div class="rate" id="slyt">

                    </div>
                </div>

                <div class="button-order col-sm-6">
                    <div class="price" id="price">

                    </div>
                    <a href="index.php?controller=chome&action=home&page=oder&idtour=<?php echo $_GET['idtour'] ?>" class="btn-order">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <label>Đặt ngay</label>
                    </a>
                </div>
            </div>
            <div class="content">
                <div class="img-tour row" id="img-tour">

                </div>
                <div class="content-tour">
                    <div class="in4-tour">
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="box-in4" id="box-in4">

                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="group-in4" id="group-in4">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hihi">
                        <div class="calendar">
                            <h3 class="hd-calendar">Lịch trình</h3>
                            <div class="item-day" id="lich">

                            </div>

                        </div>
                        <div class="dichvu">
                            <h3 class="hd-dichvu">Thông tin tour</h3>
                            <div class="item-day">
                                <h2 class="day">Thông tin tổng quát</h2>
                                <div class="in4-day">
                                    <span class="line"></span>
                                    <div>
                                        <div class="content-in4" id="in4" style="text-align: justify;">

                                        </div>
                                        <br>
                                    </div>
                                </div>
                                <h2 class="day">Dịch vụ bao dồm và không bao gồm</h2>
                                <div class="in4-day">
                                    <span class="line"></span>
                                    <div>
                                        <div class="content-in4" id="dichvu" style="text-align: justify;">

                                        </div>
                                        <br>
                                    </div>
                                </div>
                                <h2 class="day">Ghi chú</h2>
                                <div class="in4-day">
                                    <span class="line"></span>
                                    <div>
                                        <div class="content-in4" style="text-align: justify;">
                                            <p>Tour không hoàn, không hủy, không đổi. Trường hợp hoàn, hủy, đổi tour mất 100% trên giá tour.</p>
                                            <p>Trẻ từ 0-4 tuổi, miễn phí tối đa 2 trẻ</p>
                                            <p> Trẻ từ 12 tuổi trở đi tính bằng giá người lớn</p>
                                        </div>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container ms-5 me-5 ps-5 pe-5">
                        <div class="mb-2 submit-comment">
                            <h4 class="mb-4 font-weight-light">Nhận xét Của Bạn</h4>
                            <textarea class="form-control" id="cmtContent" rows="4" placeholder="Nhập nội dung"></textarea>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                                <button class="btn btn-primary me-md-2" type="button" onclick="addComment()">Nhận Xét</button>
                            </div>
                        </div>
                        <div>
                            <h4 class="mb-4 font-weight-light">Đánh Giá</h4>
                            <div class="border border-light p-4 p-4 all-comment">

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>
<?php
if (isset($_SESSION['iduser'])) {
    $iduser = $_SESSION['iduser'];
} else {
    $iduser = "null";
}
?>
<script>
    var idtour = <?= $_GET['idtour'] ?>;

    document.onload = load()

    function load() {
        loadslyt()
        loadtour()
        showCommentForm()
        loadComment()
        showRatingForm()
    }

    function loadslyt() {
        $.post('index.php?controller=ctour&action=getslytbyIdtour', {
                idtour: idtour
            },
            function(data) {
                tour = JSON.parse(data);
                slyt = tour.length;
                $('#slyt').append(`
                <i class="fa-solid fa-heart"></i>
                        <label>` + slyt + `</label>
                `)
            })
    }

    function loadtour() {
        path = "./public/img/tour/";
        $.post('index.php?controller=ctour&action=getin4TourbyIdtour', {
                idtour: idtour
            },
            function(data) {
                var str = 0;
                var str1 = 8;
                var cat = "."
                var day = "Ngày"
                tour = JSON.parse(data);


                t = tour[0];
                nametour = t['nametour']
                timeday = t['numberday']
                timenight = t['numbernight']
                daystart = t['day-start']
                daystart1 = daystart.substr(8, 2) + `/` + daystart.substr(5, 2) + `/` + daystart.substr(0, 4);
                dayend = t['day-end']
                dayend1 = dayend.substr(8, 2) + `/` + dayend.substr(5, 2) + `/` + dayend.substr(0, 4);
                transport = t['transport']

                $.ajax({
                    url: 'https://provinces.open-api.vn/api/p/' + t['place_start'] + '?depth=1',
                    method: "GET",
                    success: function(data) {
                        $('#startplace').append(`
                        Nơi khởi hành: <b>` + data['name'] + `</b>
                        `)
                    }
                })
                tongkhach = t['total-guest']
                priceadult = t['price-adult']
                var priceadult1 = parseInt(priceadult);
                priceadult1 = priceadult1.toLocaleString('vi', {
                    style: 'currency',
                    currency: 'VND'
                });
                pricechild = t['price-child']
                var pricechild1 = parseInt(pricechild);
                pricechild1 = pricechild1.toLocaleString('vi', {
                    style: 'currency',
                    currency: 'VND'
                });
                in4 = t['information']
                for (var i = 0; i < in4.length; i++) {
                    if (in4[i] == cat) {
                        hi = in4.slice(str, i + 1);
                        str = i + 2;
                        $('#in4').append(`
                            <p>` + hi + `</p>  
                        `)
                    }
                }
                lichtrinh = t['schedule']
                arrDay = lichtrinh.split("Ngày")
                for (i = 1; i < arrDay.length; i++) {
                    ngay1 = arrDay[i].substring(4);
                    daynumber = i;
                    $('#lich').append(`
                         <h2 class="day">Ngày ` + daynumber + `</h2>
                                <div class="in4-day">
                                    <span class="line"></span>
                                    <div>
                                    <div class="content-in4" id="lichtrinh" style="text-align: justify;">
                                            ` + ngay1 + `
                                        </div>
                                        <br>
                                    </div>
                                </div>
                `)
                }



                dichvu = t['service_not_include']
                dichvubaogom = dichvu.substring(10, dichvu.indexOf("Không bao gồm"))
                dichvukhongbaogom = dichvu.substring((dichvu.indexOf("Không bao gồm") + 15), dichvu.length)


                hinhanh = t['hinhanh']
                if (hinhanh.length == 0) {
                    hinhanh = 'noimg.png'
                }
                hinhanhtour = path + hinhanh

                hinhanh1 = t['hinhanh1']
                if (hinhanh1.length == 0) {
                    hinhanh1 = hinhanh
                }
                hinhanhtour1 = path + hinhanh1

                hinhanh2 = t['hinhanh2']
                if (hinhanh2.length == 0) {
                    hinhanh2 = hinhanh
                }
                hinhanhtour2 = path + hinhanh2

                hinhanh3 = t['hinhanh3']
                if (hinhanh3.length == 0) {
                    hinhanh3 = hinhanh
                }
                hinhanhtour3 = path + hinhanh3
                $('#hd-tour').append(`
                <header class="hd-tour col-sm-12">` + nametour + `</header>

                `)
                $('#img-tour').append(`
                <div class="col-sm-7">
                        <img class="img-fluid" src="` + hinhanhtour + `" alt="">
                    </div>
                    <div class="col-sm-5">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-6"><img class="img-fluid" src="` + hinhanhtour1 + `" alt=""></div>
                                    <div class="col-sm-6"><img class="img-fluid" src="` + hinhanhtour2 + `" alt=""></div>
                                </div>
                            </div>
                            <div class="col-sm-12 big"><img class="img-fluid " src="` + hinhanhtour3 + `" alt=""></div>
                        </div>
                    </div>
                `)
                $('#box-in4').append(`
                <p>
                                        Ngày khởi hành: <b>` + daystart1 + `</b>
                                    </p>
                                    <p>
                                        Ngày kết thúc: <b>` + dayend1 + `</b>
                                    </p>
                                    <p id="startplace">
                                        
                                    </p>
                                    <p>
                                        Số chỗ còn nhận: <b>` + tongkhach + `</b>
                                    </p>
                `)
                $('#group-in4').append(`
                <div class="item">
                                        <i class="fa-solid fa-money-bill"></i>
                                        <label>Giá vé trẻ em</label>
                                        <p>` + pricechild1 + `</p>
                                    </div>
                                    <div class="item">
                                        <i class="fa-solid fa-money-bill"></i>
                                        <label>Giá vé người lớn</label>
                                        <p>` + priceadult1 + `</p>
                                    </div>
                                    <div class="item">
                                        <i class="fa-solid fa-calendar"></i>
                                        <label>Ngày bắt đầu</label>
                                        <p>` + daystart1 + `</p>
                                    </div>
                                    <div class="item">
                                        <i class="fa-solid fa-calendar"></i>
                                        <label>Ngày kết thúc</label>
                                        <p>` + dayend1 + `</p>
                                    </div>
                                    <div class="item">
                                        <i class="fa-solid fa-flag"></i>
                                        <label>Thời gian</label>
                                        <p>` + timeday + ` ngày ` + timenight + ` đêm</p>
                                    </div>
                                    <div class="item">
                                        <i class="fa-solid fa-bus"></i>
                                        <label>Phương tiện di chuyển</label>
                                        <p>` + transport + `</p>
                                    </div>
                                    <div class="item">
                                    <i class="fa-solid fa-map"></i>
                                    <label>Điểm tham quan</label>
                                    <p id="place-map">
                                   
                                    </p>
                                    </div>
                                    <div class="item">
                                        <i class="fa-solid fa-fire"></i>
                                        <label>Ẩm thực</label>
                                        <p>Theo thực đơn</p>
                                    </div>      
                `)

                $('#dichvu').append(`
                <p>Dịch vụ bao gồm:</p>
                <p>` + dichvubaogom + `</p>
                <p>Dịch vụ không bao gồm:</p>
                <p>` + dichvukhongbaogom + `</p>
                `)
                $('#price').append(`              
                <p><span class="price-tour">` + priceadult1 + `</span> /người</p>
                `)
                for (i = 0; i < tour.length; i++) {
                    place = tour[i]['nameplace']
                    lat = tour[i]['latitude']
                    lng = tour[i]['longitude']
                    $('#place-map').append(`
                    <a href="map.php?lng=` + lng + `&lat=` + lat + `" class="nav-link link-dark">
                                            ` + place + `
                                        </a>
                    `)
                    console.log(lat);
                }
            })

    }

    function addComment() {
        if (<?= $iduser ?> != null) {
            var iduser = <?= $iduser ?>;
            var content = $('#cmtContent').val()
            $.post("index.php?controller=ctour&action=addComment", {
                content: content,
                iduser: iduser,
                idtour: idtour
            }, function(data) {
                alert(data)
            })
        } else if (<?= $iduser ?> == null) {
            var rs = confirm("Đăng nhập để tiếp tục")
            if (rs) {
                window.location = "index.php?controller=cuser&action=loginpage"
            }
        }
    }


    function showCommentForm() {
        $.post("index.php?controller=ctour&action=permitComment", {
            idtour: idtour,
            iduser: iduser
        }, function(data) {
            data = JSON.parse(data)
            if (data != "") {
                $('.submit-comment').append(`
                    <h4 class="mb-4 font-weight-light">Nhận xét Của Bạn</h4>
                    <textarea class="form-control" id="cmtContent" rows="4" placeholder="Nhập nội dung"></textarea>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                        <button class="btn btn-primary me-md-2" type="button" onclick="addComment()">Nhận Xét</button>
                    </div>
                `)
            }
        })
    }


    function loadComment() {
        pathhinhanhuser = "./public/img/nguoidung/";
        $.post("index.php?controller=ctour&action=loadAllComment", {
            idtour: idtour
        }, function(data) {
            data = JSON.parse(data)
            if (data.length > 0) {
                $('.all-comment').append(`
                    <div class="mb-4">
                        <div class="d-flex">
                            <span class="img-user">
                                <!-- <img src="./public/img/nguoidung/avatar.jpg" class="rounded-circle" alt="" width="20px" height="20px"> -->
                            </span>         
                            <h6 class="text-primary ms-2">` + data[0]['name'] + `</h6>
                        </div>
                        <p class="text-dark bg-light m-0 p-2 badge rounded-pill">` + data[0]['content'] + `</p>
                    </div>
                `)
                hinhanh = data[0]['image']
                if (hinhanh.length == 0) {
                    hinhanh = 'avatar.jpg'
                }
                hinhanh = pathhinhanhuser + hinhanh
                $('.img-user').append(`
                    <img src="` + hinhanh + `" class="rounded-circle" alt="" width="20px" height="20px">
                `)
            } else {
                $('.all-comment').append('<h6>Chưa có nhận xét</h6>')
            }
        })
    }

    //----------------------------------------------------rating--------------------------------------------
    function showRatingForm() {
        $.post("index.php?controller=ctour&action=permitComment", {
            idtour: idtour,
            iduser: iduser
        }, function(data) {
            data = JSON.parse(data)
            if (data != "") {
                $('.rating-form').append(`
                    <i class="fa fa-star fa-2x" data-index="0"></i>
                    <i class="fa fa-star fa-2x" data-index="1"></i>
                    <i class="fa fa-star fa-2x" data-index="2"></i>
                    <i class="fa fa-star fa-2x" data-index="3"></i>
                    <i class="fa fa-star fa-2x" data-index="4"></i>
                `)
            }
        })
    }

    var ratedIndex = -1;
    // var ratedIndex = $('#totalRating').val() - 1;
    // var ratedIndexByUser = $('#ratedByUser').val() - 1;
    // var userid = $('#userid').val()
    $(document).ready(function() {
        resetStarColors();

        /* if(localStorage.getItem('ratedIndex') != null)
        { 
        	setStars(parseInt(localStorage.getItem('ratedIndex')))
        } */
        if (ratedIndex != -1) {
            setStars(parseInt(ratedIndex))
            // if(ratedIndexByUser != -1)
            // {
            // 	setStarsByUser(parseInt(ratedIndexByUser))
            // }
        }


        $('.fa-star').on('click', function() {
            ratedIndex = parseInt($(this).data('index'));
            /* localStorage.setItem('ratedIndex', ratedIndex); */
            saveToTheDB();
        })

        $('.fa-star').mouseover(function() {
            resetStarColors();
            var currentIndex = parseInt($(this).data('index'))
            /* for(var i=0; i<=currentIndex; i++)
            {
            	$('.fa-star:eq('+i+')').css('color', 'yellow')
            } */
            setStars(currentIndex);
        })

        $('.fa-star').mouseleave(function() {
            resetStarColors();
            if (ratedIndex != -1) {
                /* for(var i=0; i<=ratedIndex; i++)
                {
                	$('.fa-star:eq('+i+')').css('color', 'yellow')
                } */
                setStars(ratedIndex);
                if (ratedIndexByUser != -1) {
                    setStarsByUser(ratedIndexByUser);
                }
            }
        })
    })

    function saveToTheDB() {
        $.post("index.php?controller=", {
            ratedIndex: ratedIndex + 1,
            blogid: blogid,
            userid: userid
        }, function(data) {
            console.log(data)
            if (data != "") {
                alert("Cảm ơn đánh giá của bạn!")
                window.location.reload()
            } else {
                alert("Đánh giá không thành công!")
            }
        })
    }

    function setStars(max) {
        for (var i = 0; i <= max; i++) {
            $('.fa-star:eq(' + i + ')').css('color', 'yellow');
        }
    }

    // function setStarsByUser(max)
    // {
    // 	for(var i=0; i<=max; i++)
    // 	{
    // 		$('.ratedByUser:eq('+i+')').css('color', 'yellow');
    // 	}
    // }

    function resetStarColors() {
        $('.fa-star').css('color', 'white');
    }
</script>