<?php
class morder extends database
{
    public function checktotal($idtour)
    {
        $qr = "SELECT `total-guest` FROM `tour` WHERE idtour ='$idtour'";
        return $this->select($qr);
    }
    public function updateTotalguest($idtour, $totalguestTour)
    {
        $qr = "UPDATE `tour` SET `total-guest`='$totalguestTour' WHERE idtour='$idtour'";
        return $this->update($qr);
    }
    public function addOrder($idorder, $idtour, $iduser, $daystart, $dayend, $slchild, $slnguoilon, $name, $email, $phone, $address, $pricetotal, $note, $status, $thanhtoan)
    {
        $qr = "INSERT INTO `order`(`idorder`, `iduser`, `idtour`, `daystart`, `dayend`, `name-customer`, `email-customer`, `phone-customer`, `address-customer`, `number-adult`, `number-child`, `note`, `price-total`, `status`, `payment-method`) 
        VALUES ('$idorder','$iduser','$idtour','$daystart','$dayend','$name','$email','$phone','$address','$slnguoilon','$slchild','$note','$pricetotal',' $status','$thanhtoan')";
        return $this->insert($qr);
    }
    public function addCustomerad($idorder, $namead, $genderad, $birthad)
    {
        $qr = "INSERT INTO `customer`(`namecustomer`, `birthday`, `gender`, `age`, `idorder`) VALUES ('$namead','$birthad','$genderad','1','$idorder')";
        return $this->insert($qr);
    }
    public function addCustomerch($idorder, $namech, $genderch, $birthch)
    {
        $qr = "INSERT INTO `customer`(`namecustomer`, `birthday`, `gender`, `age`, `idorder`) VALUES ('$namech','$birthch','$genderch','0','$idorder')";
        return $this->insert($qr);
    }
    public function getAllOrder()
    {
        $qr = "SELECT * FROM `order`";
        return $this->select($qr);
    }
    public function duyetOrderByIdorder($idorder)
    {
        $qr = "UPDATE `order` SET `status`='1' WHERE idorder ='$idorder'";
        return $this->insert($qr);
    }
    public function addbill($idorder, $pricetotal, $thanhtoan)
    {
        $qr = "INSERT INTO `bill`(`idoder`, `price`, `status_pay`) VALUES ('$idorder','$pricetotal','$thanhtoan')";
        return $this->insert($qr);
    }
    public function getOrderbyIdorder($idorder)
    {
        $qr = "SELECT * FROM `order`, `customer` WHERE customer.idorder = `order`.`idorder` AND `order`.`idorder`='$idorder'";
        return $this->select($qr);
    }
}
