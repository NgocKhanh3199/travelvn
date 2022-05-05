<?php
class muser extends database{

    public function login($taikhoan, $matkhau){

        $qr = "SELECT * FROM `user` WHERE name = '$taikhoan' AND password = '$matkhau'";
        return $this->select($qr);
        
    }
}