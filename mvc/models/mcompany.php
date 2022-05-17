<?php
class mcompany extends database{

    public function register($username, $passwordhash, $namecompany, $email, $phone, $address, $street, $ward, $district, $city)
    {
        $qr = "INSERT INTO `company`(`username`, `password`, `namecompany`, `email`, `phone`, `address`, `street`, `ward`, `district`, `city`) VALUES ('$username','$passwordhash','$namecompany','$email','$phone','$address','$street','$ward','$district','$city')";
        return $this->insert($qr); 
    }
    public function login($taikhoan){

        $qr = "SELECT * FROM `company` WHERE username='$taikhoan'";
        return $this->select($qr);
        
    }
}