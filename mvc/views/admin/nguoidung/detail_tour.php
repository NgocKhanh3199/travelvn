<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>

    <!-- link bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- end_link bootstrap 5 -->
    <!-- link icon -->
    <script src="https://kit.fontawesome.com/5f22631803.js" crossorigin="anonymous"></script>
    <!-- end-link icon -->
    <link rel="stylesheet" href="./public/css/company.css">
    <script src="./public/js/js.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="nd">
            <div class="thongtinchung" id="diadanh">
                <!-- <div class="row diadanh">
                    <div class="col-sm-6">
                        <img src="./public/img/tour/2b95fc58931487994632121fc1f00833_1_55_10_20_5_2022.jpg" alt="" class="w-100 rounded" height="400px">
                    </div>
                    <div class="col-sm-6 row">
                        <div class="col-sm-6">
                            <img src="./public/img/tour/4b7c23abd16c3f271fde1222fc3bff9f_2_45_39_20_5_2022.jpg" alt="" class="w-100 rounded" height="200">
                        </div>
                        <div class="col-sm-6">
                            <img src="./public/img/tour/3a0bd5fbd3e6432d665deab43a33c345_2_44_24_20_5_2022.jpg" alt="" class="w-100 rounded" height="200">
                        </div>
                        <div class="col-sm-12">
                            <img src="./public/img/tour/3b06a2474a4f9f659a7c1879a6946efa_2_22_10_20_5_2022.jpg" alt="" class="w-100 rounded" height="200">
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
        <div class="container container-form">
            <div class="frame1" action="" method="">
                <div class="input-group">
                    <span class="">T??n Tour</span>
                    <input id="nametour" type="text" class="form-control" placeholder="Nh???p T??n Tour">
                </div>
                <div class="input-group">
                    <span class="">Gi??</span>
                    <input id="price" type="text" class="form-control" placeholder="Nh???p Gi??">
                </div>
                <div class="input-group">
                    <span class="">Ng??y B???t ?????u</span>
                    <input id="day-star" type="date" class="form-control" placeholder="Ch???n Ng??y B???t ?????u">
                </div>
                <div class="input-group">
                    <span class="">Ng??y K???t Th??c</span>
                    <input onchange="total()" id="day-end" type="date" class="form-control" placeholder="Ch???n Ng??y K???t Th??c">
                </div>
                <div class="input-group" id="number-day">
                    <span class="">S??? L?????ng Ng??y</span>
                    <input value="` + numberday + `" type="number" id="form-control number-day" class="form-control" placeholder="Ch???n S??? L?????ng Ng??y">
                </div>
                <div class="input-group" id="number-night">
                    <span class="">S??? L?????ng ????m</span>
                    <input value="` + numberday + `" type="number" id="form-control number-night" class="form-control" placeholder="Ch???n S??? L?????ng ????n">
                </div>
                <div class="input-group">
                    <span class="">V????n chuy????n</span>
                    <input id="transport" type="text" class="form-control" placeholder="Loa??i xe di chuy????n">
                </div>
                <div class="input-group">
                    <span class="">N??i xu????t pha??t</span>
                    <input id="start_place" type="text" class="form-control" placeholder="??i??a ??i????m xu????t pha??t">
                </div>
                <div class="input-group">
                    <span class="">M?? T???</span>
                    <textarea id="infotour" aria-colspan="4" type="text" class="form-control" placeholder="Nh???p M?? T???"></textarea>
                </div>
                <div class="input-group">
                    <span class="">Di??ch vu?? bao g????m va?? kh??ng bao g????m</span>
                    <textarea id="service" aria-colspan="4" type="text" class="form-control" placeholder="Nh???p M?? T???"></textarea>
                </div>
                <div class="input-group">
                    <span class="">Li??ch tri??nh</span>
                    <textarea id="schedule" aria-colspan="4" type="text" class="form-control" placeholder="Nh???p M?? T???"></textarea>
                </div>
            </div>
        </div>
        <div class="place text-start">
            <h4 class="header-place">??i???m ?????n: </h4>
            <div class="item-place" id="item-place">
                
            </div>

        </div>

        <div class="button-group">
            <a href="index.php?controller=chome&action=admin&path=nguoidung&page=detail_order&idorder=<?php echo $_GET['idorder'] ?>&iduser=<?php echo $_GET['iduser']?>" class="btn btn-primary" type="button">Tho??t</a>
        </div>
</body>

</html>
<script>
    var idTour = <?= $_GET['idTour'] ?>;
    document.onload = load()

    function load() {

        loadTourByIdtour();
        loadplace();
    }

    function loadTourByIdtour() {
        pathhinhanhtour = "./public/img/tour/";
        $.post("index.php?controller=ctour&action=getTourByIdTour", {
            idTour: idTour,

        }, function(data) {
            Tour = JSON.parse(data);
            console.log(Tour)
            t = Tour[0];
            $('#nametour').val(t['nametour']);
            $('#price').val(t['price']);
            $('#day-end').val(t['day-end']);
            $('#day-star').val(t['day-start']);
            $('#infotour').val(t['infomation']);
            $('#transport').val(t['transport']);
            $('#service').val(t['service']);
            $('#schedule').val(t['schedule']);
            $('#start_place').val(t['start_place']);
            $('#number-night').val(t['numbernight']);
            $('#number-day').val(t['numberday']);
            
            hinhanh = t['hinhanh']
            if (hinhanh.length == 0) {
                hinhanh = 'noimg.png'
            }
            hinhanh = pathhinhanhtour + hinhanh

            hinhanh1 = t['hinhanh1']
            if (hinhanh1.length == 0) {
                hinhanh1 = 'noimg.png'
            }
            hinhanh1 = pathhinhanhtour + hinhanh1

            hinhanh2 = t['hinhanh2']
            if (hinhanh2.length == 0) {
                hinhanh2 = 'noimg.png'
            }
            hinhanh2 = pathhinhanhtour + hinhanh2

            hinhanh3 = t['hinhanh3']
            if (hinhanh3.length == 0) {
                hinhanh3 = 'noimg.png'
            }
            hinhanh3 = pathhinhanhtour + hinhanh3

            $('#diadanh').append(`
            <div class="row diadanh">
                    <div class="col-sm-6">
                        <img src="` + hinhanh + `" alt="" class="w-100 rounded" height="500">
                    </div>
                    <div class="col-sm-6 row">
                        <div class="col-sm-6">
                            <img src="` + hinhanh1 + `" alt="" class="w-100 rounded" height="200">
                        </div>
                        <div class="col-sm-6">
                            <img src="` + hinhanh2 + `" alt="" class="w-100 rounded" height="200">
                        </div>
                        <div class="col-sm-12">
                            <img src="` + hinhanh3 + `" alt="" class="w-100 rounded" height="280">
                        </div>
                    </div>
                </div>
            `)
        })

    }

    function loadplace() {
        
        pathhinhanhplace = "./public/img/diadiem/";
        $.post("index.php?controller=ctour&action=getPlaceByIdTour", {
            idTour: idTour,

        }, function(data) {
            place = JSON.parse(data);
            for (i = 0; i < place.length; i++) {
                nameplace = place[i]['nameplace']
                address = place[i]['full-address']
                in4 = place[i]['information']
                hinhanh = place[i]['hinhanh']
                if (hinhanh.length == 0) {
                    hinhanh = 'noimg.png'
                }
                hinhanh = pathhinhanhplace + hinhanh

                hinhanh1 = place[i]['hinhanh1']
                if (hinhanh1.length == 0) {
                    hinhanh1 = 'noimg.png'
                }
                hinhanh1 = pathhinhanhplace + hinhanh1

                hinhanh2 = place[i]['hinhanh2']
                if (hinhanh2.length == 0) {
                    hinhanh2 = 'noimg.png'
                }
                hinhanh2 = pathhinhanhplace + hinhanh2

                hinhanh3 = place[i]['hinhanh3']
                if (hinhanh3.length == 0) {
                    hinhanh3 = 'noimg.png'
                }
                hinhanh3 = pathhinhanhplace + hinhanh3
                $('#item-place').append(`
                <div class="place-item">
                    <p class="nameplace">` + nameplace + `</p>
                </div>
                <div class="place-item d-flex">
                    <p>?????a ch???: </p>
                    <p class="address">` + address + `</p>
                </div>
                <div class="place-item d-flex">
                    <p>M?? t???: </p>
                    <p class="in4">` + in4 + `</p>
                </div>
                <div class="places-img container">
                    <div class="place-img">
                        <img src="` + hinhanh + `" alt="" srcset="">
                    </div>
                    <div class="place-img">
                        <img src="` + hinhanh1 + `" alt="" srcset="">
                    </div>
                    <div class="place-img">
                        <img src="` + hinhanh2 + `" alt="" srcset="">
                    </div>
                    <div class="place-img">
                        <img src="` + hinhanh3 + `" alt="" srcset="">
                    </div>
                </div>
            `)

            }
        })
    }
</script>