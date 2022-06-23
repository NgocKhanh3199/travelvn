<?php
require "./public/PHPMailer-master/src/PHPMailer.php";
require "./public/PHPMailer-master/src/SMTP.php";
require "./public/PHPMailer-master/src/Exception.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class ccompany extends controller{
    private $company;
    public function __construct()
    {
        $this->company = $this->model("mcompany");
    }
    public function sendmail($email)
    {
        $mail = new PHPMailer(true);
        // Email server settings
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';             //  smtp host
        $mail->SMTPAuth = true;
        $mail->Username = 'nhannguyen3199@gmail.com';   //  sender username
        $mail->Password = 'jdkbmkmgpczbqobz';       // sender password
        $mail->SMTPSecure = 'tls';                  // encryption - ssl/tls
        $mail->Port = 587;                          // port - 587/465
        $mail->setFrom($email, 'dulich123');
        $mail->addAddress($email);
        $mail->isHTML(true);                // Set email content format to HTML
        $mail->Subject = 'Comfirm Accounts';
        $mail->Body    = '<div style="background: #EEEEEE;text-align:center;border-radius: 10px;padding:5px">
         <h3> Link active accounts </h3>
            <a href="http://dulich123.com/travelvn175/index.php?controller=ccompany&action=activePage&email='.$email.'">click to Active your accounts</a>
     </div>';
        //send
        if (!$mail->send()) {
            return "Message sent to:{$mail->ErrorInfo}\n";
        } else {
            return 'success';
        }
       
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
    public function activePage()
    {
        return $this->viewcongty("", "active");
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
            if (!isset($_SESSION['idcompany']) && !isset($_SESSION['namecompany']) && !isset($_SESSION['position'])) {
                $_SESSION['idcompany'] = $data[0]['idcompany'];
                $_SESSION['namecompany'] = $data[0]['namecompany'];
                $_SESSION['position'] = $data[0]['position'];
            }
        }
        echo $row;
    }

    public function active_accounts()
    {
        $email = $_POST['email'];
        $data = $this->company->active_accounts($email);
        echo $data;
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
        if($data > 0)
        {
                $sendmails = $this->sendmail($email);
        }
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
     
        $namecompany = $_POST['namecompany'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $street = $_POST['street'];
        $ward = $_POST['ward'];
        $district = $_POST['district'];
        $city = $_POST['city'];
        $data = $this->company->updateCompany($idcompany, $namecompany, $email, $phone , $address, $street, $ward, $district, $city);
        // echo json_encode($data);
        echo $data;
    }
    public function deleteCompany()
    {
        $idcompany = $_POST['idCompany'];
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
            $delete = '<a href="" class = "a-delete nav-link text-danger" onclick="deleteCompany(' . $idcompany . ')">Xóa</a>';
            $row = [$stt,$hinhanh, $username, $namecompany, $email, $phone, $view,$delete];
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
    //--------------------------------------chức năng giao dịch tháng-------------------------------------
    public function loadTableGiaoDichVnpayGroupByTime()
    {
        $idcompany = $_POST['idcompany'];
        $giaodich= $this->company->getAllGiaoDichVnpayGroupByTime($idcompany);
        $stt = 0;
        $data = [];
        foreach ($giaodich as $g) {
            $stt++;
            $time = $g['time'];
            $total = $g['total'];
            $total = number_format($total);
            $view = '<a href="index.php?controller=chome&action=admin&path=congty&page=loinhuanthang&idcompany='.$idcompany.'&time=' . $time . '" class="a-view btn btn-primary">Xem</a>';
            $row = [$stt, $time, $total, $view];
            $data[] = $row;
        }
        echo json_encode($data);
    }
    public function loadTableGiaoDichVnpay()
    {
        $idcompany = $_POST['idcompany'];
        $time = $_POST['time'];
        $giaodich = $this->company->getAllGiaoDichVnpayByTime($idcompany,$time);
        $stt = 0;
        $data = [];
        foreach ($giaodich as $g) {
            $stt++;
            $idtrans = $g['idransaction'];
            $idorder = $g['idorder'];
            $idtour = $g['idtour'];
            $namecompany = $g['namecompany'];
            $transtatus = $g['status'];
            if($transtatus == 0)
            {
                $transtatus = "Chưa thanh toán";
            }
            else
            {
                $transtatus = "Đã thanh toán";
            }
            $pricepay = $g['price_pay'];
            $time_pay = $g['time_payment'];

            if ($transtatus == 1) {
                $status_pay = "Thanh toán thành công";
                $thanhtoan = '<a href="" class ="a-edit" ></a>';
            } else if ($transtatus == 0) {
                $status_pay = "Chưa thanh toán";
                $thanhtoan = '<a href="" class ="a-edit" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="thanhtoan(' . $idtrans . ')">Thanh toán</a>';
            }

            // $view = '<a href="index.php?controller=chome&action=admin&path=tour&page=detail&idTour=' . $idgiaodich . '" class="a-view">Xem</a>';
            $row = [$stt, $idtrans, $idorder,  $idtour, $namecompany, $transtatus, $pricepay, $time_pay];
            $data[] = $row;
        }
        echo json_encode($data);
    }
    public function loadTableGiaoDichVnpayByDay()
    {
        $idcompany = $_POST['idcompany'];
        $startday = $_POST['startday'];
        $endday = $_POST['endday'];
        $giaodich = $this->company->getGiaoDichVnpayBySelectTime($idcompany,$startday, $endday);
        $stt = 0;
        $data = [];
        foreach ($giaodich as $g) {
            $stt++;
            $idtrans = $g['idransaction'];
            $idorder = $g['idorder'];
            $idtour = $g['idtour'];
            $namecompany = $g['namecompany'];
            $transtatus = $g['status'];
            $pricepay = $g['price_pay'];
            $time_pay = $g['time_payment'];

            if ($transtatus == 1) {
                $status_pay = "Thanh toán thành công";
                $thanhtoan = '<a href="" class ="a-edit" ></a>';
            } else if ($transtatus == 0) {
                $status_pay = "Chưa thanh toán";
                $thanhtoan = '<a href="" class ="a-edit" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="thanhtoan(' . $idtrans . ')">Thanh toán</a>';
            }

            // $view = '<a href="index.php?controller=chome&action=admin&path=tour&page=detail&idTour=' . $idgiaodich . '" class="a-view">Xem</a>';
            $row = [$stt, $idtrans, $idorder,  $idtour, $namecompany, $transtatus, $pricepay, $time_pay];
            $data[] = $row;
        }
        echo json_encode($data);
    }
    public function loadTongGiaoDich()
    {
        $idcompany = $_POST['idcompany'];
        $time = $_POST['time'];
        $data = $this->company->getAllGiaoDichVnpayByTime($idcompany,$time);
        echo json_encode($data);
    }
    public function loadTongGiaoDichByDay()
    {
        $idcompany = $_POST['idcompany'];
        $startday = $_POST['startday'];
        $endday = $_POST['endday'];
        $data = $this->company->getGiaoDichVnpayBySelectTime($idcompany,$startday, $endday);
        echo json_encode($data);
    }
    public function updateavataCompany()
    {
        $idcompany = $_POST['idcompany'];
        $img = $_POST['image'];
        $data = $this->company->updateavataCompany($idcompany,$img);
        echo json_encode($data);
    }
}