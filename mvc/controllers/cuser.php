<?php
class cuser extends controller{
    private $user;
    public function __construct()
    {
        $this->user = $this->model("muser");
    }
    public function loginpage()
    {
        return $this->view("layouts", "login");
    }
    public function login()
    {
        $taikhoan = $_POST['tendangnhap'];
        $matkhau =  $_POST['matkhau'];
        $data = $this->user->login($taikhoan,$matkhau);
        $row = count($data);
        echo $row;
    }
}