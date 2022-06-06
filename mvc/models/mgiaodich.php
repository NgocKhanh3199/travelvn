<?php
class mgiaodich extends database
{
    public function getAllGiaodich()
    {
        $qr = "SELECT * FROM `bill`, `order` WHERE bill.idoder =`order`.idorder";
        return $this->select($qr);
    }
    public function thanhtoan($idgiaodich, $time_payment, $date_payment, $money_received, $money_refund)
    {
        $qr = "UPDATE `bill` SET `date_payment`='$date_payment',`time_payment`='$time_payment',`money_received`='$money_received',`money_refund`='$money_refund',`status_pay`='1' WHERE idbill ='$idgiaodich'";
        return $this->update($qr);
    }
    
}
