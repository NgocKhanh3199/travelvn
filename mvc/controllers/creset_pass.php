<?php
// Import PHPMailer classes into the global namespace
// // These must be at the top of your script, not inside a function
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;
// // require '/public/PHPMailer/src/Exception.php';\
// require './public/PHPMailer-master/src/Exception.php';
// require './public/PHPMailer-master/src/PHPMailer.php';
// require './public/PHPMailer-master/src/SMTP.php';
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
        $to      = "lkkhanh1800340@student.ctuet.edu.vn";
        $subject = "Tiêu đề email";
        $message = "Nội dung email";
        $header  =  "From:lkkhanh1800340@student.ctuet.edu.vn \r\n";

        $success = mail($to, $subject, $message, $header);

        if ($success == true) {
            echo 1;
        } else {
            echo "Không gửi đi được...";
        }
        // $mail = new PHPMailer(true);
        // try {
        //     //Server settings
        //     $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
        //     $mail->isSMTP(); // gửi mail SMTP
        //     $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
        //     $mail->SMTPAuth = true; // Enable SMTP authentication
        //     $mail->Username = 'lkkhanh1800340@student.ctuet.edu.vn'; // SMTP username
        //     $mail->Password = 'Kh31990097'; // SMTP password
        //     $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        //     $mail->Port = 587; // TCP port to connect to
        //     //Recipients
        //     $mail->setFrom('lkkhanh1800340@student.ctuet.edu.vn', 'Mailer');
        //     $mail->addAddress($email, 'Joe User'); // Add a recipient
        //     // Content
        //     $mail->isHTML(true);   // Set email format to HTML
        //     $mail->Subject = 'Comfirm accounts';
        //     $mail->Body = 'Your Token is:</b>' . $token;
        //     $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        //     $mail->send();
        //     // echo 'Message has been sent';
        //     echo 1;
        // } catch (Exception $e) {
        //     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        // }
    }
}
