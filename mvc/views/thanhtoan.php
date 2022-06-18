<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>

    <!-- link bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- end_link bootstrap 5 -->
    <!-- link icon -->
    <script src="https://kit.fontawesome.com/5f22631803.js" crossorigin="anonymous"></script>
    <!-- end-link icon -->
    <link rel="stylesheet" href="./public/css/thanhtoan.css">
</head>

<body>
    <?php
    if ($_GET['vnp_TransactionStatus'] == '00') {
        $idorder = $_GET['vnp_TxnRef'];
        $money = $_GET['vnp_Amount'] / 100;
        $note = $_GET['vnp_OrderInfo'];
        $status = $_GET['vnp_TransactionStatus'];
        $idgiaodich = $_GET['vnp_TransactionNo'];
        $bank = $_GET['vnp_BankCode'];
        $time = $_GET['vnp_PayDate'];
        $date_time = substr($time, 0, 4) . '-' . substr($time, 4, 2) . '-' . substr($time, 6, 2) . ' ' . substr($time, 8, 2) . ' ' . substr($time, 10, 2) . ' ' . substr($time, 12, 2);

        require __DIR__ . '/../models/database.php';
        $connect = new database();
        $db = $connect->connect();
        if (mysqli_connect_errno()) {
            echo "Faild connect with MYSQLI " . mysqli_connect_error();
            exit();
        }
        $qr = "SELECT * FROM `vn_pay` WHERE idorder='$idorder'";
        $rs = mysqli_query($db, $qr);
        $row = mysqli_num_rows($rs);
        if ($row > 0) {
            $qr = "UPDATE `vn_pay` SET `namebank`='$bank',`idransaction`='$idgiaodich',`TransactionStatus`='$status',`price_pay`='$money',`time_payment`='$date_time',`note`='$note',`idorder`='$idorder' WHERE idorder ='$idorder'";
            mysqli_query($db, $qr);
        } else {
            $qr = "INSERT INTO `vn_pay`(`namebank`, `idransaction`, `TransactionStatus`, `price_pay`, `time_payment`, `note`, `idorder`) VALUES ('$bank','$idgiaodich','$status','$money','$date_time','$note','$idorder')";
            mysqli_query($db, $qr);
        }
        $status_rs = "Giao dịch thành công";
    } else {
        $status_rs = "Giao dịch không thành công";
    }

    ?>
    <?php
    $time = $_GET['vnp_PayDate'];
    $date_time = substr($time, 8, 2) . ':' . substr($time, 10, 2) . ':' . substr($time, 12, 2) . ' ' . substr($time, 6, 2) . '/' . substr($time, 4, 2) . '/' . substr($time, 0, 4);
    $vnp_TransactionStatus = $_GET['vnp_TransactionStatus'];
    // echo $vnp_TransactionStatus;
    if ($vnp_TransactionStatus == '00') {
        $status = "THANH TOÁN THÀNH CÔNG";
    } else {
        $status = "THANH TOÁN KHÔNG THÀNH CÔNG";
    }
    ?>
    <div class="thanhtoan container" id="thanhtoan">
        <div class="hd_page">
            <header class="hd_page_text">VNpay Digibank</header>
        </div>
        <div class="success">
            <i class="fa-solid fa-circle-check fa-3x"></i>
            <p class="text_success"><?php echo $status ?></p>
            <p class="price_success"><?= number_format($_GET['vnp_Amount'] / 100) ?> VNĐ</p>
            <p class="time_success"><?php echo $date_time ?></p>
        </div>
        <div class="in4_thanhtoan">
            <div class="in4">
                <p class="lb">Ngân hàng</p>
                <p class="ip"><?php echo $_GET['vnp_BankCode'] ?></p>
            </div>
            <div class="in4">
                <p class="lb">Mã giao dịch</p>
                <p class="ip"><?php echo $_GET['vnp_TxnRef'] ?></p>
            </div>
            <div class="in4">
                <p class="lb">Nội dung thanh toán</p>
                <p class="ip"><?php echo $_GET['vnp_OrderInfo'] ?></p>
            </div>
            <div class="in4">
                <p class="lb">Trạng thái giao dịch</p>
                <p class="ip"><?php echo $status_rs ?></p>
            </div>
        </div>
        <div class="btn">
            <button class="btn_thoat" onclick="thoat()">Thoát</button>
        </div>
    </div>

</body>

</html>
<script>
    var iduser = $_SESSION['iduser'];

    function thoat() {
        window.location = "index.php?controller=chome&action=home&iduser="+iduser
    }
</script>
<!-- <script>
   
    date_pay = time_pay.substr(0, 4) + '/' + time_pay.substr(4, 2) + '/' + time_pay.substr(6, 2) + ' ' + time_pay.substr(8, 2) + ':' + time_pay.substr(10, 2) + ':' + time_pay.substr(12, 2);
    document.onload = add_vnpay()

    function add_vnpay() {
        if (trangthai == '00') {
            $.post("index.php?controller=cgiaodich&action=add_vnpay", {
                price: price,
                bank: bank,
                idgiaodich: idgiaodich,
                status: trangthai,
                daypay: date_pay,
                note: note,
                idorder: idorder,
            }, function(data) {
                if (data > 0) {
                    alert('sucess');
                    // window.location.href = "index.php?controller=chome&action=admin&path=diadiem";
                } else if (data <= 0) {
                    alert("Không thành công")
                }
            })
        }
    }
</script> -->