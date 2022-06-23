<?php
require "./public/PHPMailer-master/src/PHPMailer.php";
require "./public/PHPMailer-master/src/SMTP.php";
require "./public/PHPMailer-master/src/Exception.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class cuser extends controller
{
    private $user;
    public function __construct()
    {
        $this->user = $this->model("muser");
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
            <a href="http://dulich123.com/travelvn175/index.php?controller=cuser&action=active&email='.$email.'">click to Active your accounts</a>
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
    public function active()
    {
        return $this->view("account","active");
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
        $permitted_chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $token = substr(str_shuffle($permitted_chars), 0, 5);
        $data = $this->user->register($name, $username, $passwordhash1, $phone, $email, $gender, $birthday,$token);
        if($data > 0)
        {
                $sendmails = $this->sendmail($email);
        }
        echo $data;
    }
    public function active_accounts()
    {
        $email = $_POST['email'];
        $data = $this->user->active_accounts($email);
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
        $name = $_POST['name'];
        $username = $_POST['username'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $birthday = $_POST['birthday'];
        $data = $this->user->updateUser($iduser,  $name, $username, $phone, $email, $gender, $birthday);
        // echo json_encode($data);
        echo $data;
    }

    public function deleteUser()
    {
        $iduser = $_POST['iduser'];
        $data = $this->user->deleteUser($iduser);
        echo json_encode($data);
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
            if ($gioitinh == 0) {
                $gender = "Nữ";
            } else if ($gioitinh == 1) {
                $gender = "Nam";
            }
            $birthday = $u['birthday'];
            $view = '<a href="index.php??controller=chome&action=admin&path=nguoidung&page=detail&idUser=' . $iduser . '" class="a-view nav-link text-success">Xem</a>';
            $delete = '<a href="" class = "a-delete nav-link text-danger" onclick="deleteUser(' . $iduser . ')">Xóa</a>';
            $row = [$stt, $tenuser, $taikhoan, $sdt, $email, $gender, $birthday, $view,$delete];
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
        foreach ($question as $q) {
            $stt++;
            $idquestion = $q['idquestion'];
            $content = $q['content'];
            $nameuser = $q['name'];
            $status = $q['status'];
            if ($status === 'Chưa trả lời') {
                $response = '<a href="index.php?controller=chome&action=admin&path=chamsockhachhang&page=add&idquestion=' . $idquestion . '" class="a-view nav-link">Trả Lời</a>';
                $delete = '<a href="" class = "link-danger nav-link" onclick="deleteQuestion(' . $idquestion . ')">Xóa</a>';
                $edit = '';
            } else {
                $response = '<a href="?controller=chome&action=admin&path=chamsockhachhang&page=detail&idquestion=' . $idquestion . '" class="a-view nav-link link-success">Xem</a>';
                $edit = '<a href="?controller=chome&action=admin&path=chamsockhachhang&page=edit&idquestion=' . $idquestion . '" class="a-view nav-link">Sửa</a>';
                $delete = '<a href="" class = "link-danger nav-link" onclick="deleteQuestion(' . $idquestion . ')">Xóa</a>';
            }
            $display = $q['display'];
            if ($display == 0) {
                $display = 'Không';
            } else {
                $display = 'Có';
            }
            $row = [$stt, $content, $nameuser, $status, $display, $response, $edit, $delete];
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
            $view = '<a href="index.php??controller=chome&action=admin&path=nguoidung&page=detail_order&idorder=' . $idorder . '&iduser=' . $iduser . '" class="a-view nav-link text-success">Xem</a>';
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
            $view = '<a href="index.php?controller=chome&action=admin&path=nguoidung&page=detail_tour&idTour=' . $idTour . '&idorder=' . $idorder . '&iduser=' . $iduser . '" class="a-view nav-link text-success">Xem</a>';
            $row = [$idTour, $hinhanh, $tenTour, $giaTourAd, $giaTourCh, $day_start, $day_end,  $view];
            $data[] = $row;
        }
        echo json_encode($data);
    }
    //---------------------------------themcautraloi--------------------------------------
    public function sendAnswer()
    {
        $idquestion = $_POST['idquestion'];
        $answer = $_POST['answer'];
        $data = $this->user->sendAnswer($idquestion, $answer);
        echo $data;
    }
    public function loadCauTraLoiByIdCauHoi()
    {
        $idquestion = $_POST['idquestion'];
        $data = $this->user->loadCauTraLoiByIdCauHoi($idquestion);
        echo json_encode($data);
    }
    public function deleteCauHoiByIdCauHoi()
    {
        $idquestion = $_POST['idquestion'];
        $data = $this->user->deleteCauHoiByIdCauHoi($idquestion);
        echo json_encode($data);
    }
    public function loadQuestionsDisplayed()
    {
        $data = $this->user->loadQuestionsDisplayed();
        echo json_encode($data);
    }
    public function displayQuestion()
    {
        $idquestion = $_POST['idquestion'];
        $answer = $_POST['answer'];
        $option = $_POST['option'];
        $data = $this->user->displayQuestion($idquestion, $answer, $option);
        echo $data;
    }
    public function getimgcongty()
    {
        $idcongty = $_POST['idcongty'];
        $data = $this->user->getimgcongty($idcongty);
        echo json_encode($data);
    }
    public function updateavataUser()
    {
        $iduser = $_POST['iduser'];
        $img = $_POST['image'];
        $data = $this->user->updateavataUser($iduser,$img);
        echo json_encode($data);
    }
}
