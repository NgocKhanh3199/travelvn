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
    public function loadTableUser()
    {
        $user = $this->user->getAllUser();
        $stt = 0;
        $data = [];
        foreach ($user as $u) {
            $stt++;
            $iduser = $u['iduser'];
            $tenuser = $u['name'];
            $taikhoan = $u['username'];
            $sdt = $u['phone'];
            $email = $u['email'];
            $gioitinh = $u['gender'];
            $birthday = $u['birthday'];
            $view = '<a href="index.php??controller=chome&action=admin&path=nguoidung&page=detail&idUser=' . $iduser . '" class="a-view nav-link text-success">Xem</a>';
            $delete = '<a href="" class = "a-delete nav-link text-danger" onclick="deleteUser(' . $iduser . ')">Xóa</a>';
            $row = [$stt, $tenuser, $taikhoan, $sdt, $email, $gioitinh, $birthday,$view,$delete];
            $data[] = $row;
        }
        echo json_encode($data);
    }
    public function sendQuestion()
    {
        $iduser = $_POST['iduser'];
        $content = $_POST['content'];
        $data = $this->user->sendQuestion($iduser, $content);
        echo $data;
    }
    public function getQuestionAndAnswer()
    {
        $iduser = $_POST['iduser'];
        $data = $this->user->getQuestionAndAnswer($iduser);
        echo json_encode($data);
    }
    public function loadTableQuestion()
    {
        $question = $this->user->getAllQuestion();
        $stt = 0;
        $data = [];
        foreach($question as $q)
        {
            $stt++;
            $content = $q['content'];
            $nameuser = $q['name'];
            $status = $q['status'];
            if($status === 'Chưa trả lời')
            {
                $response = '<a href="index.php?controller=chome&action=admin&path=chamsockhachhang&page=add" class="a-view">Trả Lời</a>';
                $delete = '<a href="" class = "link-danger" onclick="">Xóa</a>';
            }
            else
            {
                $response = '<a href="" class="a-view">Xem</a>';
                $delete = '<a href="" class = "link-danger" onclick="">Xóa</a>';
            }
            $row = [$stt, $content, $nameuser, $status, $response ,$delete];
            $data[] = $row;
        }
        echo json_encode($data);
    }
    public function loadTableOrderByIdUser()
    {
        $iduser = $_POST['iduser'];
        $order = $this->user->getOrderByIdUser($iduser);
        $stt = 0;
        $data = [];
        foreach ($order as $o) {
            $stt++;
            $idorder = $o['idorder'];
            $idtour = $o['idtour'];
            $iduser = $o['iduser'];
            $priceTotal = $o['price-total'];
            $paymentMethod = $o['payment-method'];
            $view = '<a href="index.php??controller=chome&action=admin&path=nguoidung&page=detail_order&idorder=' . $idorder . '&iduser='.$iduser.'" class="a-view nav-link text-success">Xem</a>';
            $cancel = '<a href="" class = "a-delete nav-link text-danger" onclick="delete(' . $iduser . ')">Huỷ</a>';
            $row = [$stt, $idorder, $idtour, $iduser, $priceTotal, $paymentMethod, $view, $cancel];
            $data[] = $row;
        }
        echo json_encode($data);
    }
    public function loadTableDetailOrderByIdOrder()
    {
        $idorder = $_POST['idorder'];
        $order = $this->user->getDetailOrderByIdOrder($idorder);
        // $data = [];
        // foreach ($order as $o) {
        //     $idorder = $o['idorder'];
        //     $idtour = $o['idtour'];
        //     $daystart = $o['daystart'];
        //     $dayend = $o['dayend'];
        //     $nameCustomer = $o['name-customer'];
        //     $emailCustomer = $o['email-customer'];
        //     $phoneCustomer = $o['phone-customer'];
        //     $addressCustomer = $o['address-customer'];
        //     $numberAdult = $o['number-adult'];
        //     $numberChild = $o['number-child'];
        //     $note = $o['note'];
        //     $priceTotal = $o['price-total'];
        //     $paymentMethod = $o['payment-method'];
        //     $cancel = '<a href="" class = "a-delete nav-link text-danger" onclick="">Huỷ</a>';
        //     $row = [$idorder, $idtour, $daystart, $dayend, $nameCustomer, $emailCustomer, $phoneCustomer, $addressCustomer, $numberAdult, $numberChild, $note, $priceTotal, $paymentMethod, $cancel];
        //     $data[] = $row;
        // }
        echo json_encode($order);
    }
    public function loadTableTourByIdOrder()
    {
        $iduser = $_POST['iduser'];
        $idorder = $_POST['idorder'];
        $tour = $this->user->loadTableTourByIdOrder($idorder);
        $data = [];
        $path = "./public/img/tour/";
        foreach ($tour as $t) {
            $idTour = $t['idtour'];
            $tenTour = $t['nametour'];
            $giaTourAd = $t['price-adult'];
            $giaTourCh = $t['price-child'];
            $day_start = $t['day-start'];
            $day_end = $t['day-end'];
            // load img
            $img = strlen($t['hinhanh']) > 0 ? $t['hinhanh'] : 'delivery.png';
            $hinhanh = '<button class="table-img"><img src="' . $path . $img . '" alt=""></button>';
            $view = '<a href="index.php?controller=chome&action=admin&path=nguoidung&page=detail_tour&idTour=' . $idTour.'&idorder='.$idorder.'&iduser='.$iduser.'" class="a-view nav-link text-success">Xem</a>';
            $row = [$idTour, $hinhanh, $tenTour, $giaTourAd, $giaTourCh, $day_start, $day_end,  $view];
            $data[] = $row;
        }
        echo json_encode($data);
    }
}
