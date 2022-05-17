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
    public function account()
    {
        return $this->view("account", "qltk");
    }
    public function favorite_place()
    {
        return $this->view("account", "diadiemyeuthich");
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

    public function findUserById()
    {
        $iduser = $_POST['iduser'];
        echo json_encode($this->user->findUserById($iduser));
    }

    public function updateUser()
    {
        $iduser = $_POST['iduser'];
        $image = $_POST['image'];
        $name = $_POST['name'];
        $username = $_POST['username'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $birthday = $_POST['birthday'];
        $data = $this->user->updateUser($iduser,$image, $name, $username, $phone, $email, $gender, $birthday);
        // echo json_encode($data);
        echo $data;
    }

    public function deleteUser()
    {
        $iduser = $_POST['iduser'];
        $data = $this->user->deleteUser($iduser);
        echo $data;
    }

    public function checkPassword()
    {
        $iduser = $_POST['iduser'];
        $oldPassword = $_POST['oldPassword'];
        $data = $this->user->checkPassword($iduser);
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
        $iduser = $_POST['iduser'];
        $newPassword = $_POST['newPassword'];
        $password = password_hash($newPassword, PASSWORD_BCRYPT);
        $data = $this->user->updatePassword($iduser, $password);
        echo $data;
    }
}
