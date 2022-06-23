<?php
class mcompany extends database{

    public function register($username, $passwordhash, $namecompany, $email, $phone, $address, $street, $ward, $district, $city)
    {
        $qr = "INSERT INTO `company`(`username`, `password`, `namecompany`, `email`, `phone`, `address`, `street`, `ward`, `district`, `city`, `position`) VALUES ('$username','$passwordhash','$namecompany','$email','$phone','$address','$street','$ward','$district','$city', '2')";
        return $this->insert($qr); 
    }
    public function active_accounts($email)
    {
        $qr = "UPDATE `company` SET `status`= 1 WHERE email = '$email'";
        return $this->update($qr);
    }
    public function login($taikhoan){

        $qr = "SELECT * FROM `company` WHERE username='$taikhoan'  AND status = 1 ";
        return $this->select($qr);
        
    }
    public function findCompanyById($idcompany)
    {
        $qr = "SELECT * FROM `company` WHERE idcompany = '$idcompany'";
        return $this->select($qr);
    }
    public function updateCompany($idcompany,  $namecompany, $email, $phone, $address, $street, $ward, $district, $city)
    {
        $qr = "UPDATE `company` SET `namecompany`='$namecompany',`email`='$email',`phone`='$phone',`address`='$address',`street`='$street',`ward`='$ward',`district`='$district',`city`='$city' WHERE idcompany='$idcompany'";
        return $this->update($qr);
    }
    public function deleteCompany($idcompany)
    {
        $qr = "UPDATE `company` SET `status`= 0 WHERE idcompany = '$idcompany'";
        return $this->update($qr);
    }
    public function checkPassword($idcompany)
    {
        $qr = "SELECT * FROM `company` WHERE idcompany = '$idcompany'";
        return $this->select($qr);
    }
    public function updatePassword($idcompany, $newPassword)
    {
        $qr = "UPDATE `company` SET `password`='$newPassword' WHERE idcompany = '$idcompany'";
        return $this->update($qr);
    }
    public function getAllCompany()
    {
        $qr="SELECT * FROM `company` where status = 1 ";
        return $this->select($qr); 
    }
    public function loadDetailCompanyByIdCompany($idcompany)
    {
        $qr = "SELECT * FROM `company` WHERE idcompany = '$idcompany'";
        return $this->select($qr);
    }
    public function loadTourByIdCompany($idcompany)
    {
        $qr = "SELECT * FROM tour WHERE idcompany = '$idcompany'";
        return $this->select($qr);
    }
    //--------------------------------------chức năng giao dịch tháng-------------------------------------
    public function getAllGiaoDichVnpayGroupByTime($idcompany)
    {
        $qr = "SELECT DATE_FORMAT(time_payment, '%Y-%m') as time, SUM(price_pay) as total FROM `vn_pay`, `order`, tour ,company WHERE vn_pay.idorder = `order`.idorder AND `order`.idtour = tour.idtour AND tour.idcompany = company.idcompany AND company.idcompany = '$idcompany' GROUP BY time_payment";
        return $this->select($qr);
    }
    public function getAllGiaoDichVnpayByTime($idcompany, $time)
    {
        $qr = "SELECT idransaction, `order`.idorder, tour.idtour, company.namecompany, `order`.status ,price_pay, time_payment FROM `vn_pay`, `order`, `tour`, company WHERE vn_pay.idorder = `order`.idorder AND `order`.idtour = tour.idtour AND tour.idcompany = company.idcompany AND (vn_pay.time_payment BETWEEN '$time-01' AND '$time-31') AND company.idcompany = '$idcompany' ORDER BY vn_pay.time_payment DESC";
        return $this->select($qr);
    }
    public function getGiaoDichVnpayBySelectTime($idcompany, $startday, $endday)
    {
        $qr = "SELECT idransaction, `order`.idorder, tour.idtour, company.namecompany, `order`.status ,price_pay, time_payment FROM `vn_pay`, `order`, `tour`, company WHERE vn_pay.idorder = `order`.idorder AND `order`.idtour = tour.idtour AND tour.idcompany = company.idcompany AND (time_payment BETWEEN '$startday' AND '$endday') AND company.idcompany = '$idcompany' ORDER BY vn_pay.id_vnpay DESC";
        return $this->select($qr);
    }
    public function updateavataCompany($idcompany,$img)
    {
        $qr = "UPDATE `company` SET `image`='$img' WHERE idcompany='$idcompany'";
        return $this->update($qr);
    }
}