<?php
class mthongke extends database
{
    public function getAllthongke($idcompany)
    {
        $qr = "SELECT `order`.`idorder`, `order`.`idtour`, `order`.`name-customer`, `order`.`phone-customer`, `order`.`price-total`, `order`.`payment-method`, bill.status_pay, vn_pay.TransactionStatus, bill.price, vn_pay.price_pay FROM vn_pay, bill, `order`, tour WHERE `order`.idtour=tour.idtour AND tour.idcompany='$idcompany' AND (vn_pay.idorder = `order`.idorder OR `order`.idorder = bill.idoder) GROUP BY `order`.idorder";
        return $this->select($qr);
    }

    public function loadTablethongkebyday($ngaybatdau, $ngayketthuc, $idcompany)
    {
        $qr = "SELECT `order`.`idorder`, `order`.`idtour`, `order`.`name-customer`, `order`.`phone-customer`, `order`.`price-total`, `order`.`payment-method`, bill.status_pay, vn_pay.TransactionStatus, bill.price, vn_pay.price_pay FROM `bill`, `order`, `vn_pay`, tour WHERE ((bill.date_payment BETWEEN '$ngaybatdau' AND '$ngayketthuc') AND `order`.`idorder`= bill.idoder AND order.idtour=tour.idtour AND tour.idcompany='$idcompany') OR (vn_pay.idorder= `order`.`idorder` AND order.idtour=tour.idtour AND tour.idcompany='$idcompany' AND (vn_pay.time_payment BETWEEN '$ngaybatdau' AND '$ngayketthuc')) GROUP BY `order`.`idorder`";
        return $this->select($qr);
    }
    public function tongdoanhthubill($idcompany)
    {
        $qr = "SELECT SUM(bill.price) FROM bill, `order`, tour WHERE bill.status_pay='1' AND bill.idoder=`order`.`idorder` AND `order`.`idtour`=tour.idtour AND tour.idcompany = '$idcompany'";
        return $this->select($qr);
    }
    public function tongdoanhthuvnpay($idcompany)
    {
        $qr = "SELECT SUM(vn_pay.price_pay) FROM vn_pay, `order`, tour WHERE vn_pay.TransactionStatus='0'  AND vn_pay.idorder=`order`.`idorder` AND `order`.`idtour`=tour.idtour AND tour.idcompany = '$idcompany'";
        return $this->select($qr);
    }
    public function doanhthubydayvnpay($ngaybatdau, $ngayketthuc, $idcompany)
    {
        $qr = "SELECT SUM(vn_pay.price_pay) FROM vn_pay, `order`, tour WHERE vn_pay.TransactionStatus='0' AND vn_pay.idorder=`order`.`idorder` AND `order`.`idtour`=tour.idtour AND (vn_pay.time_payment BETWEEN '$ngaybatdau' AND '$ngayketthuc') AND tour.idcompany = '$idcompany'";
        return $this->select($qr);
    }
    public function doanhthubydaybill($ngaybatdau, $ngayketthuc, $idcompany)
    {
        $qr = "SELECT SUM(bill.price) FROM bill, `order`, tour WHERE bill.status_pay='1' AND bill.idoder=`order`.`idorder` AND `order`.`idtour`=tour.idtour AND (bill.date_payment BETWEEN '$ngaybatdau' AND '$ngayketthuc') AND tour.idcompany = '$idcompany'";
        return $this->select($qr);
    }
    public function tongdoanhthu($idcompany)
    {
        $qr = "SELECT SUM(vn_pay.price_pay), SUM(bill.price)  FROM bill, vn_pay WHERE vn_pay.TransactionStatus='0' AND bill.status_pay='$idcompany'";
        return $this->select($qr);
    }
}
