<link rel="stylesheet" href="//cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="./public/css/listgiaodich.css">
<div class="container">
    <h4 class="page-title">CHI TIẾT LỢI NHUẬN THÁNG</h4>
    <input type="hidden" name="" id="idcompany" value="<?php echo $_GET['idcompany'] ?>">
    <input type="hidden" name="" id="time" value="<?php echo $_GET['time'] ?>">
    <div class="d-flex flex-row">
        <div class="p-2">
            <h1 style="font-size: 20px;font-weight:800">ngày bắt đầu</h1>
            <input id="daystart" type="date">
        </div>
        <div class="p-2">
            <h1 style="font-size: 20px;font-weight:800">ngày kết thúc</h1>
            <input id="dayend" type="date">
        </div>
        <div class="p-4 mt-1">
            <button class="btn btn-dark" onclick="doanhthu()">Chọn</button>
        </div>
    </div>
    <h5 style="font-style: italic; text-align:start; margin: 20px; border-bottom: 1px solid black">Đơn Hàng</h5>
    <div class="page-table dd-content">
        <table id="tbThongke" class="display">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã Giao Dịch</th>
                    <th>Mã Đơn Hàng</th>
                    <th>Mã Tour</th>
                    <th>Tên Công Ty</th>
                    <th>Trạng Thái Đơn Hàng</th>
                    <th>Thanh Toán</th>
                    <th>Thời Gian</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
    <div style="margin-top:50px">
        <h5 id="thue" style="font-style: italic; text-align:start; margin: 20px; border-bottom: 1px solid black">Thanh Toán Giao Dịch: <span style="font-weight: bold;">15%</span></h5>
        <h5 id="tong" style="font-style: italic; text-align:start; margin: 20px; border-bottom: 1px solid black"></h5>
    </div>
    <a class="btn btn-primary" href="?controller=chome&action=admin&path=congty&page=detail&idcompany=<?php echo $_GET['idcompany'] ?>">Trở Lại</a>
</div>

<script>
    idcompany = $('#idcompany').val() 
    time = $('#time').val()
    document.onload = load()

    function load() {
        loadTablethongke()
        loadTongGiaoDich()
    }

    function loadTablethongke() {
        $.post('index.php?controller=ccompany&action=loadTableGiaoDichVnpay', {
            idcompany: idcompany,
            time: time
        }, function(data) {
            data = JSON.parse(data);
            $('#tbThongke').DataTable({
                data: data
            })
        })
    }

    function loadTongGiaoDich() 
    {
        $.post("index.php?controller=ccompany&action=loadTongGiaoDich", {
            idcompany: idcompany,
            time: time
        }, function(data){
            data = JSON.parse(data)
            var pricePay = 0;
            for(var i=0; i<data.length; i++)
            {                
                pricePay =  parseInt(data[i]['price_pay'])
                i++;
                total = pricePay + parseInt(data[i]['price_pay'])
            }
            //27,800,000 2,780,000 25,020,000
            tax = total * 0.15;
            total = total - tax;
            total = total.toLocaleString('vi', {
                style: 'currency',
                currency: 'VND'
            });
            $('#tong').append(`
                Tổng: <span style="border: 1px solid black; font-weight:bold">`+total+`</span>
            `)
        })
    }

    function doanhthu() {
        $('#tong').children().remove()
        var startday = $('#daystart').val()
        var endday = $('#dayend').val() 
        if (!startday && !endday) {
            alert("Vui lòng chọn ngày")
        } else if (startday && endday) {
            $.post('index.php?controller=ccompany&action=loadTableGiaoDichVnpayByDay', {
                idcompany: idcompany,
                startday: startday,
                endday: endday,
            }, function(data) {
                data = JSON.parse(data);
                if (data.length) { 
                    $('#tbThongke').remove()
                    $('#tbThongke_wrapper').remove()
                    $('.thongbao').remove()
                    $('.dd-content').append(`
                    <h6><span>` + startday + `</span> - <span>` + endday + `</span></h6>
                    <table id="tbThongke" class="display">
                        <thead>
                            <th>STT</th>
                            <th>Mã Giao Dịch</th>
                            <th>Mã Đơn Hàng</th>
                            <th>Mã Tour</th>
                            <th>Tên Công Ty</th>
                            <th>Trạng Thái Đơn Hàng</th>
                            <th>Thanh Toán</th>
                            <th>Thời Gian</th>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    `)
                    $('#tbThongke').DataTable({
                        data: data
                    })

                    //---load tổng hanh toán sau khi giao dịch-------
                    $.post("index.php?controller=ccompany&action=loadTongGiaoDichByDay", {
                        idcompany: idcompany,
                        startday: startday,
                        endday: endday
                    }, function(data){
                        data = JSON.parse(data)
                        var pricePay = 0;
                        for(var i=0; i<data.length; i++)
                        {                
                            pricePay =  parseInt(data[i]['price_pay'])
                            i++;
                            total = pricePay + parseInt(data[i]['price_pay'])
                        }
                        tax = total * 0.85;
                        total = total - tax;
                        total = total.toLocaleString('vi', {
                            style: 'currency',
                            currency: 'VND'
                        });
                        $('#tong').append(`
                            <span style="border: 1px solid black; font-weight:bold">`+total+`</span>
                        `)
                    })

                } else {
                    $('#tbThongke').remove()
                    $('#tbThongke_wrapper').remove()
                    $('.dd-content').append(`
                    <p class="thongbao"><i class="fa-solid fa-circle-exclamation"></i> Không tìm thấy giao dịch <i class="fa-solid fa-circle-exclamation"></i></p>
                   `)
                   $('#tong').append(`
                            <span style="border: 1px solid black; font-weight:bold">0</span>
                        `)
                }
            })
        } else if (startday || endday) {
            alert("Vui lòng chọn đủ ngày bắt đầu và kết thúc");
        }
    }
</script>