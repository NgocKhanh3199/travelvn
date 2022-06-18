<?php
class mgiaodich extends database
{
    public function getAllGiaodich($idcompany)
    {
        $qr = "SELECT * FROM `bill`, `order`, `tour` WHERE bill.idoder =`order`.idorder AND `order`.`idtour`= tour.idtour AND tour.idcompany='$idcompany'";
        return $this->select($qr);
    }
    public function thanhtoan($idgiaodich, $time_payment, $date_payment, $money_received, $money_refund)
    {
        $qr = "UPDATE `bill` SET `date_payment`='$date_payment',`time_payment`='$time_payment',`money_received`='$money_received',`money_refund`='$money_refund',`status_pay`='1' WHERE idbill ='$idgiaodich'";
        return $this->update($qr);
    }
    public function thanhtoanonl($idgiaodich, $date_payment, $note, $idorder, $status, $price, $bank)
    {
        $qr = "INSERT INTO `vn_pay`(`namebank`, `idransaction`, `TransactionStatus`, `price_pay`, `time_payment`, `note`, `idorder`) VALUES ('$bank','$idgiaodich','$status','$price','$date_payment','$note','$idorder')";
        return $this->insert($qr);
    }
    //----------------------------------chức năng quản lý giao dịch-------------------------------------------
    public function getAllGiaoDichVnpayByMonth($month, $year)
    {
        $qr = "SELECT idransaction, `order`.idorder, tour.idtour, company.namecompany, `order`.status ,price_pay, time_payment FROM `vn_pay`, `order`, `tour`, company WHERE vn_pay.idorder = `order`.idorder AND `order`.idtour = tour.idtour AND tour.idcompany = company.idcompany AND (vn_pay.time_payment BETWEEN '$year-$month-01' AND '$year-$month-31')  ORDER BY vn_pay.time_payment DESC";
        return $this->select($qr);
    }
    public function getGiaoDichVnpayByDay($startday, $endday)
    {
        $qr = "SELECT idransaction, `order`.idorder, tour.idtour, company.namecompany, `order`.status ,price_pay, time_payment FROM `vn_pay`, `order`, `tour`, company WHERE vn_pay.idorder = `order`.idorder AND `order`.idtour = tour.idtour AND tour.idcompany = company.idcompany AND (time_payment BETWEEN '$startday' AND '$endday') ORDER BY vn_pay.id_vnpay DESC";
        return $this->select($qr);
    }
}
