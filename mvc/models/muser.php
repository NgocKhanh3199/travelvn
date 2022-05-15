<?php
class muser extends database{

    public function register($name, $username, $passwordhash1, $phone, $email, $gender, $birthday)
    {
        $qr = "INSERT INTO `user`(`name`, `username`, `password`, `phone`, `email`, `gender`, `birthday`) VALUES ('$name','$username','$passwordhash1','$phone','$email','$gender','$birthday')";
        return $this->insert($qr); 
    }
    public function login($taikhoan){

        $qr = "SELECT * FROM `user` WHERE username = '$taikhoan'";
        return $this->select($qr);
        
    }
    public function findUserById($iduser)
    {
        $qr = "SELECT * FROM `user` WHERE iduser='$iduser'";
        return $this->select($qr);
    }
    public function updateUser($iduser, $name, $username, $phone, $email, $gender, $birthday)
    {
        $qr = "UPDATE `user` SET `name`='$name',`username`='$username',`phone`='$phone',`email`='$email',`gender`='$gender',`birthday`='$birthday' WHERE iduser = '$iduser'";
        return $this->update($qr);
    }
    public function deleteUser($iduser)
    {
        $qr = "DELETE FROM `user` WHERE iduser = '$iduser'";
        return $this->delete($qr);
    }
    public function checkPassword($iduser)
    {
        $qr = "SELECT * FROM `user` WHERE iduser = '$iduser'";
        return $this->select($qr);
    }
    public function updatePassword($iduser, $newPassword)
    {
        $qr = "UPDATE `user` SET `password`='$newPassword' WHERE iduser = '$iduser'";
        return $this->update($qr);
    }
}