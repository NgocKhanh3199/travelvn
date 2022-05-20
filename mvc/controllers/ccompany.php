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
    public function account()
    {
        return $this->viewcongty("", "qltk");
    }
    public function logout()
    {
        return $this->viewcongty("", "logout");
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

    public function findCompanyById()
    {
        $idcompany = $_POST['idcompany'];
        $data = $this->company->findCompanyById($idcompany);
        echo json_encode($data);
    }

    public function updateCompany()
    {
        $idcompany = $_POST['idcompany'];
        $image = $_POST['image'];
        $namecompany = $_POST['namecompany'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $street = $_POST['street'];
        $ward = $_POST['ward'];
        $district = $_POST['district'];
        $city = $_POST['city'];
        $data = $this->company->updateCompany($idcompany,$image, $namecompany, $email, $phone , $address, $street, $ward, $district, $city);
        // echo json_encode($data);
        echo $data;
    }
    public function deleteCompany()
    {
        $idcompany = $_POST['idcompany'];
        $data = $this->company->deleteCompany($idcompany);
        echo $data;
    }
    public function checkPassword()
    {
        $idcompany = $_POST['idcompany'];
        $oldPassword = $_POST['oldPassword'];
        $data = $this->company->checkPassword($idcompany);
        $row = count($data);
        if ($row > 0) {
            if (password_verify($oldPassword, $data[0]['password'])) {
                $row = 1;
            } else {
                $row = 'k tt';
            }
        }
        echo $row;
    }

    public function updatePassword()
    {
        $idcompany = $_POST['idcompany'];
        $newPassword = $_POST['newPassword'];
        $password = password_hash($newPassword, PASSWORD_BCRYPT);
        $data = $this->company->updatePassword($idcompany, $password);
        echo $data;
    }
}