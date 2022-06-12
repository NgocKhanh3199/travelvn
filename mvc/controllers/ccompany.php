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
    public function loadTableCompany()
    {
        $company = $this->company->getAllCompany();
        $data = [];
        $stt = 0;
        $path = "./public/img/congty/";
        foreach ($company as $c) {
            $stt++;
            $idcompany = $c['idcompany'];
            $username = $c['username'];
            $namecompany = $c['namecompany'];
            $email = $c['email'];
            $phone = $c['phone'];
            $address = $c['address'];
            $street = $c['street'];
            $ward = $c['ward'];
            $district = $c['district'];
            $city = $c['city'];
            // load img
            $img = strlen($c['image']) > 0 ? $c['image'] : 'việt tour.png';
            $hinhanh = '<button class="table-img"><img src="' . $path . $img . '" width="50px" height="50px" alt=""></button>';
            $view = '<a href="index.php?controller=chome&action=admin&path=congty&page=detail&idcompany=' . $idcompany .'" class="a-view nav-link text-success">Xem</a>';
            $row = [$stt,$hinhanh, $username, $namecompany, $email, $phone, $view];
            $data[] = $row;
        }
        echo json_encode($data);
    }
    public function loadDetailCompanyByIdCompany()
    {
        $idcompany = $_POST['idcompany'];
        $data = $this->company->loadDetailCompanyByIdCompany($idcompany);
        echo json_encode($data);
    }
    public function loadTableTourByIdCompany()
    {
        $idcompany = $_POST['idcompany'];
        $tour = $this->company->loadTourByIdCompany($idcompany);
        $stt = 0;
        $data = [];
        $path = "./public/img/tour/";
        foreach ($tour as $t) {
            $stt++;
            $idTour = $t['idtour'];
            $tenTour = $t['nametour'];
            $giaTourAd = $t['price-adult'];
            $giaTourCh = $t['price-child'];
            $day_start = $t['day-start'];
            $day_end = $t['day-end'];
            // load img
            $img = strlen($t['hinhanh']) > 0 ? $t['hinhanh'] : 'delivery.png';
            $hinhanh = '<button class="table-img"><img src="' . $path . $img . '" alt=""></button>';

            $view = '<a href="index.php?controller=chome&action=admin&path=congty&page=detail_tour&idTour=' . $idTour . '&idcompany='.$idcompany.'" class="a-view nav-link text-success">Xem</a>';
            $delete = '<a href="" class = "a-delete nav-link text-danger" onclick="deleteTour(' . $idTour . ')">Xóa</a>';
            $row = [$stt, $hinhanh, $tenTour, $giaTourAd, $giaTourCh, $day_start, $day_end,  $view, $delete];
            $data[] = $row;
        }
        echo json_encode($data);
    }
}