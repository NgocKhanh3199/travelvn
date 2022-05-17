<?php
class ccompany extends controller{
    private $company;
    public function __construct()
    {
        $this->company = $this->model("mcompany");
    }
    public function loginpage()
    {
        return $this->view("congty", "login_company");
    }
    public function registerpage()
    {
        return $this->view("congty", "register_company");
    }
    public function donhang()
    {
        return $this->viewcongty("donhang", "list");
    }

    public function login()
    {
        $username = $_POST['username'];
        $password =  $_POST['password'];
        $data = $this->company->login($username);
        $row = count($data);
        if ($row > 0) {
            if (password_verify($password, $data[0]['password'])) {
                $row = 1;
            } else {
                $row = 'k tt';
            }
            if (!isset($_SESSION['idcompany']) && !isset($_SESSION['namecompany'])) {
                $_SESSION['idcompany'] = $data[0]['idcompany'];
                $_SESSION['namecompany'] = $data[0]['namecompany'];
            }
        }
        echo $row;
    }

    public function register()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $passwordhash = password_hash($password, PASSWORD_BCRYPT);
        $namecompany = $_POST['namecompany'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $street = $_POST['street'];
        $ward = $_POST['ward'];
        $district = $_POST['district'];
        $city = $_POST['city'];
        $data = $this->company->register($username, $passwordhash,$namecompany ,$email, $phone, $address, $street, $ward, $district, $city);
        echo $data;
    }
}