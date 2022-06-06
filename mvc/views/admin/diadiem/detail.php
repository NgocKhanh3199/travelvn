<link rel="stylesheet" href="./public/css/tour/deteil-tour.css">
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

<div class="place text-start">
    <h4 class="header-place">Điểm đến: </h4>
    <div class="item-place" id="item-place">

    </div>

</div>
<script>
    var iddiadiem = <?= $_GET['iddiadiem'] ?>;
    document.onload = load()

    function load() {
        loadplace()
    }

    function loadplace() {
        console.log("hihi");
        pathhinhanhplace = "./public/img/diadiem/";
        $.post("index.php?controller=cdiadiem&action=getDiadiemByIddiadiem", {
            iddiadiem: iddiadiem,
        }, function(data) {
            place = JSON.parse(data);
            console.log(place)
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
                    <p>Địa chỉ: </p>
                    <p class="address">` + address + `</p>
                </div>
                <div class="place-item d-flex">
                    <p>Mô tả: </p>
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