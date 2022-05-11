<?php
class cuser extends controller
{
    private $user;
    public function __construct()
    {
        $this->user = $this->model("muser");
    }
    public function loginpage()
    {
        return $this->view("account", "login");
    }
    public function registerPage()
    {
        return $this->view("account", "register");
    }
    public function logout()
    {
        return $this->view("account", "logout");
    }
    public function login()
    {
        $taikhoan = $_POST['tendangnhap'];
        $matkhau =  $_POST['matkhau'];
        $data = $this->user->login($taikhoan);
        $row = count($data);
        if ($row > 0) {
            if (password_verify($matkhau, $data[0]['password'])) {
                $_SESSION['position'] = $data[0]['position'];
                $row = 1;
            } else {
                $row = 'k tt';
            }
            if (!isset($_SESSION['iduser']) && !isset($_SESSION['name'])) {
                $_SESSION['iduser'] = $data[0]['iduser'];
                $_SESSION['name'] = $data[0]['name'];
            }
        }
        echo $row;
    }

    public function register()
    {
        $name = $_POST['tennguoidung'];
        $username = $_POST['tendangnhap'];
        $password = $_POST['matkhau'];
        $passwordhash1 = password_hash($password, PASSWORD_BCRYPT);
        $phone = $_POST['sodienthoai'];
        $email = $_POST['email'];
        $gender = $_POST['gioitinh'];
        $birthday = $_POST['ngaysinh'];
        $data = $this->user->register($name, $username, $passwordhash1, $phone, $email, $gender, $birthday);

        echo $data;
    }
}
