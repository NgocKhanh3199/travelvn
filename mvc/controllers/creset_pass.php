<?php
// Import PHPMailer classes into the global namespace
// // These must be at the top of your script, not inside a function
require "./public/PHPMailer-master/src/PHPMailer.php";
require "./public/PHPMailer-master/src/SMTP.php";
require "./public/PHPMailer-master/src/Exception.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class creset_pass extends controller
{
    private $reset_pass;
    public function __construct()
    {
        $this->reset_pass = $this->model("mreset_pass");
    }
    public function reset_pass()
    {
        $re_email = $_POST['re_email'];
        $token = $_POST['token'];
        $data = $this->reset_pass->add_reset($re_email, $token);

        echo $data;
    }
    // function rand_string()
    // {
    //     $permitted_chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    //     $str = substr(str_shuffle($permitted_chars), 0, 5);
    //     echo $str;
    // }
    public function checkemail()
    {
        $re_email = $_POST['re_email'];
        $data = $this->reset_pass->checkemail($re_email);
        $row = count($data);
        if ($row > 0) {
            $permitted_chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            $str = substr(str_shuffle($permitted_chars), 0, 5);
            $data = $this->reset_pass->inset_mail($re_email, $str);
            if ($data > 0) {
                $send_mail = $this->sendmail($re_email, $str);
                $data = 1;
            } else {
                $data = 0;
            }
        }
    }
    public function reset()
    {
        $newpass = $_POST['newpass'];
        $passwordhash1 = password_hash($newpass, PASSWORD_BCRYPT);
        $iduser = $_POST['iduser'];
        $data = $this->reset_pass->reset($passwordhash1, $iduser);
        echo $data;
    }
    public function checktoken()
    {
        $email = $_POST['re_email'];
        $token = $_POST['token'];
        $checktoken = $this->reset_pass->checktoken($email, $token);
        echo $checktoken[0]['iduser'];
    }
    public function checkpass()
    {
        $iduser = $_POST['iduser'];
        $newpass = $_POST['newpass'];
        $data = $this->reset_pass->user($iduser);
        if (password_verify($newpass, $data[0]['password'])) {
            echo '1';
        } else {
            echo '0';
        }
    }
    public function sendmail($email, $token)
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
        /////////////for file attachement////////////////////
        //////////////////////////
        $mail->isHTML(true);                // Set email content format to HTML
        $mail->Subject = 'Comfirm Accounts';
        $mail->Body    = '<div style="background: #EEEEEE;text-align:center;border-radius: 10px;padding:5px">
         <h3> Thank you for using our service </h3>
         <br>
         <p>Your Token is: <span style="color: red">' . $token . '</span></p>
     </div>';
        //send
        if (!$mail->send()) {
            return "Message sent to:{$mail->ErrorInfo}\n";
        } else {
            return 'success';
        }
       
    }
}
