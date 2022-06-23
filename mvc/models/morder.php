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
        $qr = "SELECT * FROM `order` WHERE `status`='1'";
        return $this->select($qr);
    }
    public function getAllOrdercp($idcompany)
    {
        $qr = "SELECT `order`.`idorder`, `order`.`name-customer`, `order`.`phone-customer`, `order`.`email-customer`,`order`.`address-customer`, `order`.`price-total`, `order`.`status` FROM `order`, tour WHERE `order`.`idtour`=tour.idtour AND tour.idcompany ='$idcompany'";
        return $this->select($qr);
    }
    public function duyetOrderByIdorder($idorder)
    {
        $qr = "UPDATE `order` SET `status`='1' WHERE idorder ='$idorder'";
        return $this->insert($qr);
    }
    public function addbill($idorder, $total_bill)
    {
        $qr = "INSERT INTO `bill`(`idoder`, `price`, `status_pay`) VALUES ('$idorder','$total_bill','0')";
        return $this->insert($qr);
    }
    public function getOrderbyIdorder($idorder)
    {
        $qr = "SELECT * FROM `order`, `customer` WHERE customer.idorder = `order`.`idorder` AND `order`.`idorder`='$idorder'";
        return $this->select($qr);
    }
    public function getOrderbyIdordercp($idorder)
    {
        $qr = "SELECT * FROM `order` WHERE `idorder`='$idorder'";
        return $this->select($qr);
    }
    public function loadTableTourByIdOrder($idorder)
    {
        $qr = "SELECT tour.idtour,tour.hinhanh,tour.nametour, `price-adult`, `price-child`, `day-start`, `day-end` FROM `order`, tour WHERE order.idtour = tour.idtour AND idorder = '$idorder'";
        return $this->select($qr);
    }
    public function loadOrderLimit5()
    {
        $qr = "SELECT `order`.`idorder`,tour.nametour, user.name FROM `order`, tour, user WHERE `order`.idtour = tour.idtour AND `order`.`iduser` = user.iduser LIMIT 5";
        return $this->select($qr);
    }
}
