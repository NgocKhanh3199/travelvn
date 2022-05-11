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
    
}