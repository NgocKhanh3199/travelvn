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
    public function findCompanyById($idcompany)
    {
        $qr = "SELECT * FROM `company` WHERE idcompany = '$idcompany'";
        return $this->select($qr);
    }
    public function updateCompany($idcompany, $image, $namecompany, $email, $phone, $address, $street, $ward, $district, $city)
    {
        $qr = "UPDATE `company` SET `image`='$image',`namecompany`='$namecompany',`email`='$email',`phone`='$phone',`address`='$address',`street`='$street',`ward`='$ward',`district`='$district',`city`='$city' WHERE idcompany='$idcompany'";
        return $this->update($qr);
    }
    public function deleteCompany($idcompany)
    {
        $qr = "DELETE FROM `company` WHERE idcompany = '$idcompany'";
        return $this->delete($qr);
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
}