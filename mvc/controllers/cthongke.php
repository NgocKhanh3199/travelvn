<?php
class cthongke extends controller
{
    private $thongke;

    public function __construct()
    {
        $this->thongke = $this->model("mthongke");
    }
    public function loadTablethongke()
    {
        $idcompany = $_POST['idcompany'];
        $thongke = $this->thongke->getAllthongke($idcompany);
        $stt = 0;
        $data = [];
        foreach ($thongke as $g) {
            $stt++;
            $idorder = $g['idorder'];
            $idtour = $g['idtour'];
            $tenkh = $g['name-customer'];
            $sdt = $g['phone-customer'];
            $tongtien = $g['price-total'];
            $pttt = $g['payment-method'];
            $tinnhanbill = $g['price'];
            $trangthaibill = $g['status_pay'];
            $trangthaivnpay = $g['TransactionStatus'];
            $tinnhanvnpay = $g['price_pay'];

            if ($pttt == 1) {
                $phuongthuctt = "Thanh toán bằng Vn-pay";
                if ($trangthaivnpay == 1) {
                    $trangthai = "Chưa thanh toán";
                } else if ($trangthaivnpay == 0) {
                    $trangthai = "Đã thanh toán";
                }
                $money = $tinnhanvnpay;
            } else if ($pttt == 0) {
                $phuongthuctt = "Thanh toán trực tiếp";
                if ($trangthaibill == 1) {
                    $trangthai = "Đã thanh toán";
                    $money = $tinnhanbill;
                } else if ($trangthaibill == 0) {
                    $trangthai = "Chưa thanh toán";
                    $money = 0;
                }
            }

            $row = [$stt, $idorder, $idtour, $tenkh, $sdt, $tongtien, $phuongthuctt, $trangthai, $money];
            $data[] = $row;
        }
        echo json_encode($data);
    }
    public function loadTablethongkebyday()
    {
        $idcompany = $_POST['idcompany'];
        $ngaybatdau = $_POST['ngaybatdau'];
        $ngayketthuc = $_POST['ngayketthuc'];
        $thongke = $this->thongke->loadTablethongkebyday($ngaybatdau, $ngayketthuc,$idcompany);
        $stt = 0;
        $data = [];
        foreach ($thongke as $g) {
            $stt++;
            $idorder = $g['idorder'];
            $idtour = $g['idtour'];
            $tenkh = $g['name-customer'];
            $sdt = $g['phone-customer'];
            $tongtien = $g['price-total'];
            $pttt = $g['payment-method'];
            $tinnhanbill = $g['price'];
            $trangthaibill = $g['status_pay'];
            $trangthaivnpay = $g['TransactionStatus'];
            $tinnhanvnpay = $g['price_pay'];
            if ($pttt == 1) {
                $phuongthuctt = "Thanh toán bằng Vn-pay";
                if ($trangthaivnpay == 1) {
                    $trangthai = "Chưa thanh toán";
                } else if ($trangthaivnpay == 0) {
                    $trangthai = "Đã thanh toán";
                }
                $money = $tinnhanvnpay;
            } else if ($pttt == 0) {
                $phuongthuctt = "Thanh toán trực tiếp";
                if ($trangthaibill == 1) {
                    $trangthai = "Đã thanh toán";
                    $money = $tinnhanbill;
                } else if ($trangthaibill == 0) {
                    $trangthai = "Chưa thanh toán";
                    $money = 0;
                }
            }

            $row = [$stt, $idorder, $idtour, $tenkh, $sdt, $tongtien, $phuongthuctt, $trangthai, $money];
            $data[] = $row;
        }
        echo json_encode($data);
    }
    public function tongdoanhthu()
    {
        $idcompany = $_POST['idcompany'];
        $tongdoanhthu = $this->thongke->tongdoanhthu($idcompany);
        $stt = 0;
        $data = [];
        foreach ($tongdoanhthu as $g) {
            $pricebill = $g['SUM(bill.price)'];
            $pricevnpay = $g['SUM(vn_pay.price_pay)'];
            $total = $pricebill + $pricevnpay;
        }
        echo json_encode($total);
    }
}
