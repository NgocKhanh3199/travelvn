<?php
class mreset_pass extends database
{
    public function add_reset($re_email, $token)
    {
        $qr = "INSERT INTO `reset_pass`(`re-email`, `re-token`) VALUES ('$re_email','$token')";
        return $this->insert($qr);
    }
    public function checkemail($re_email)
    {
        $qr = "SELECT * FROM `user` WHERE email='$re_email'";
        return $this->select($qr);
    }
    public function inset_mail($re_email, $str)
    {
        $qr = "UPDATE `user` SET `token`='$str' WHERE email='$re_email'";
        return $this->update($qr);
    }
    public function checktoken($email, $token)
    {
        $qr = "SELECT * FROM `user` WHERE email='$email' AND token = '$token'";
        return $this->select($qr);
    }
    public function reset($passwordhash1, $iduser)
    {
        $qr = "UPDATE `user` SET `password`='$passwordhash1' WHERE iduser ='$iduser'";
        return $this->update($qr);
    }
    public function user($iduser)
    {
        $qr = "SELECT * FROM `user` WHERE iduser = '$iduser'";
        return $this->select($qr);
    }
}
