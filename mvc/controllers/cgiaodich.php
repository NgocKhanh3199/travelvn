<?php
class cgiaodich extends controller
{
    private $giaodich;

    public function __construct()
    {
        $this->giaodich = $this->model("mgiaodich");
    }
    public function loadTableGiaodich()
    {
        $idcompany = $_POST['idcompany'];
        $giaodich = $this->giaodich->getAllGiaodich($idcompany);
        $stt = 0;
        $data = [];
        foreach ($giaodich as $g) {
            $stt++;
            $idgiaodich = $g['idbill'];
            $idorder = $g['idorder'];
            $price = $g['price'];
            $day_pay = $g['date_payment'];
            $pay_method = $g['payment-method'];
            $status = $g['status_pay'];

            if ($status == 1) {
                $status_pay = "Thanh toán thành công";
                $thanhtoan = '<a href="" class ="a-edit" ></a>';
            } else if ($status == 0) {
                $status_pay = "Chưa thanh toán";
                $thanhtoan = '<a href="" class ="a-edit" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="thanhtoan(' . $idgiaodich . ',' . $price . ')">Thanh toán</a>';
            }

            // $view = '<a href="index.php?controller=chome&action=admin&path=tour&page=detail&idTour=' . $idgiaodich . '" class="a-view">Xem</a>';
            $row = [$stt, $idorder, $price, $day_pay, $pay_method, $status_pay, $thanhtoan];
            $data[] = $row;
        }
        echo json_encode($data);
    }
    public function thanhtoan()
    {
        $idgiaodich = $_POST['idgiaodich'];
        $date_payment = $_POST['date_payment'];
        $time_payment = $_POST['time_payment'];
        $money_received = $_POST['money_received'];
        $money_refund = $_POST['money_refund'];
        $data = $this->giaodich->thanhtoan($idgiaodich, $time_payment, $date_payment, $money_received, $money_refund);
        echo $data;
    }
    public function add_vnpay()
    {
        $bank = $_POST['bank'];
        $price = $_POST['price'];
        $idgiaodich = $_POST['idgiaodich'];
        $status = $_POST['status'];
        $date_payment = $_POST['daypay'];
        $note = $_POST['note'];
        $idorder = $_POST['idorder'];
        $data = $this->giaodich->thanhtoanonl($idgiaodich, $date_payment, $note, $idorder, $status, $price, $bank);
        echo $data;
    }
}
