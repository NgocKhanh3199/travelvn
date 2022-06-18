<div class="cards">
    <div class="card-single">
        <div>
            <a class="nav-link link-light" href="index.php?controller=chome&action=admin&path=donhang">
                <h1 id="order"></h1>
                <span>Đơn Hàng</span>
            </a>
        </div>
        <div>
            <span><i class="fa-solid fa-clipboard-list"></i></span>
        </div>
    </div>

    <div class="card-single">
        <div>
            <a class="nav-link link-dark" href="index.php?controller=chome&action=admin&path=tour">
                <h1 id="tour"></h1>
                <span>Tour</span>
            </a>
        </div>
        <div>
            <span><i class="fa-solid fa-umbrella-beach"></i></span>
        </div>
    </div>

    <div class="card-single">
        <div>
            <a class="nav-link link-dark" href="index.php?controller=chome&action=admin&path=nguoidung">
                <h1 id="user"></h1>
                <span>Người Dùng</span>
            </a>
        </div>
        <div>
            <span><i class="fa-solid fa-users"></i></span>
        </div>
    </div>

    <div class="card-single">
        <div>
            <a class="nav-link link-dark" href="index.php?controller=chome&action=admin&path=diadiem">
                <h1 id="place"></h1>
                <span>Địa Điểm</span>
            </a>
        </div>
        <div>
            <span><i class="fa-solid fa-location-dot"></i></span>
        </div>
    </div>
</div>
<div class="recent-grid">
    <div class="projects">
        <div class="card">
            <div class="card-header">
                <h3>Đơn Hàng</h3>
                <a href="index.php?controller=chome&action=admin&path=donhang"><button>Xem Tất Cả <span><i class="fa-solid fa-angles-right"></i></span></button></a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">ID Đơn Hàng</th>
                                <th class="text-center">Tour</th>
                                <th class="text-center">Tên người dùng</th>
                            </tr>
                        </thead>
                        <tbody id="donhang">
                            <!-- <tr>
                                <td>#dh1829384</td>
                                <td>Du lịch Bà Nà Hills 7 ngày</td>
                                <td>11/6/2022</td>
                            </tr>
                            <tr>
                                <td>#dh1829384</td>
                                <td>Du lịch Bà Nà Hills 7 ngày</td>
                                <td>11/6/2022</td>
                            </tr>
                            <tr>
                                <td>#dh1829384</td>
                                <td>Du lịch Bà Nà Hills 7 ngày</td>
                                <td>11/6/2022</td> -->
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.onload = load()

    function load() {
        loadOrder()
        loadTour()
        loadUser()
        loadPlace()
        loadListOrder()
    }

    function loadOrder() {
        $.post("index.php?controller=corder&action=loadTableOrder", {}, function(data) {
            data = JSON.parse(data)
            $('#order').append(data.length)
        })
    }

    function loadTour() {
        $.post("index.php?controller=ctour&action=getAllTour", {}, function(data) {
            data = JSON.parse(data)
            $('#tour').append(data.length)
        })
    }

    function loadUser() {
        $.post("index.php?controller=cuser&action=loadTableUser", {}, function(data) {
            data = JSON.parse(data)
            $('#user').append(data.length)
        })
    }

    function loadPlace() {
        $.post("index.php?controller=cdiadiem&action=getAlldiadiem", {}, function(data) {
            data = JSON.parse(data)
            $('#place').append(data.length)
        })
    }

    function loadListOrder()
    {
        $.post("index.php?controller=corder&action=loadOrderLimit5", {}, function(data){
            data = JSON.parse(data)
            for(var i=0; i<data.length; i++)
            {
                $('#donhang').append(`
                    <tr>
                        <td>`+data[0]['idorder']+`</td>
                        <td>`+data[0]['nametour']+`</td>
                        <td>`+data[0]['name']+`</td>
                    </tr>
                `)
            }
        })
    }
</script>