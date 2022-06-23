<?php
class muser extends database{

    public function register($name, $username, $passwordhash1, $phone, $email, $gender, $birthday,$token)
    {
        $qr = "INSERT INTO `user`(`name`, `username`, `password`, `phone`, `email`, `gender`, `birthday`,`token`) VALUES ('$name','$username','$passwordhash1','$phone','$email','$gender','$birthday','$token')";
       return $this->insert($qr); 
    }
    public function active_accounts($email)
    {
        $qr = "UPDATE `user` SET `status`= 1 WHERE email = '$email'";
        return $this->update($qr);
    }
    public function login($taikhoan){

        $qr = "SELECT * FROM `user` WHERE username = '$taikhoan'
        AND status = 1;
        ";
        return $this->select($qr);
        
    }
    public function findUserById($iduser)
    {
        $qr = "SELECT * FROM `user` WHERE iduser='$iduser'";
        return $this->select($qr);
    }
    public function updateUser($iduser,  $name, $username, $phone, $email, $gender, $birthday)
    {
        $qr = "UPDATE `user` SET `name`='$name',`username`='$username',`phone`='$phone',`email`='$email',`gender`='$gender',`birthday`='$birthday' WHERE iduser = '$iduser'";
        return $this->update($qr);
        
    }
    public function deleteUser($iduser)
    {
        $qr = "UPDATE `user` SET `status`= 0 WHERE iduser = '$iduser' ";
        return $this->update($qr);
      
    }
    public function checkPassword($iduser)
    {
        $qr = "SELECT * FROM `user` WHERE iduser = '$iduser'";
        return $this->select($qr);
    }
    public function updatePassword($iduser, $newPassword)
    {
        $qr = "UPDATE `user` SET `password`='$newPassword' WHERE iduser = '$iduser'";
        return $this->update($qr);
    }
    public function getAllUser()
    {
        $qr = "SELECT * FROM `user` where status = 1";
        return $this->select($qr);
        
    }
    public function sendQuestion($iduser, $content)
    {
        $qr = "INSERT INTO `question`(`iduser`, `content`, `status`) VALUES ('$iduser', '$content', 'Chưa trả lời')";
        return $this->insert($qr);
    }
    public function getQuestionAndAnswer($iduser)
    {
        $qr = "SELECT * FROM `question` WHERE iduser = '$iduser'";
        return $this->select($qr);
    }
    public function getAllQuestion()
    {
        $qr = "SELECT question.idquestion,question.content, question.answer, user.name,question.status, question.display  FROM `question`, user WHERE question.iduser = user.iduser AND xoa=0 order BY idquestion DESC";
        return $this->select($qr);
    }
    public function getOrderByIdUser($iduser)
    {
        $qr = "SELECT order.idorder, order.idtour, order.iduser,`price-total`, `payment-method` FROM `order` WHERE iduser = '$iduser'";
        return $this->select($qr);
    }
    public function getDetailOrderByIdOrder($idorder)
    {
        $qr = "SELECT order.idorder, order.idtour, order.daystart, order.dayend, `name-customer`, `email-customer`, `phone-customer`, `address-customer`, `number-adult`, `number-child`, order.note, `price-total`, `payment-method`, user.name FROM `order`, user WHERE order.iduser = user.iduser AND order.idorder = '$idorder'";
        return $this->select($qr);
    }
    public function loadTableTourByIdOrder($idorder)
    {
        $qr = "SELECT tour.idtour,tour.hinhanh,tour.nametour, `price-adult`, `price-child`, `day-start`, `day-end` FROM `order`, tour WHERE order.idtour = tour.idtour AND idorder = '$idorder'";
        return $this->select($qr);
    }
    //---------------------------------------themcautraloi------------------------------------------
    public function sendAnswer($idquestion,$answer)
    {
        $qr = "UPDATE `question` SET `answer`='$answer',`status`='Đã trả lời' WHERE idquestion = '$idquestion'";
        return $this->update($qr);
    }
    public function loadCauTraLoiByIdCauHoi($idquestion)
    {
        $qr = "SELECT * FROM `question` WHERE idquestion = '$idquestion'";
        return $this->select($qr);
    }
    public function deleteCauHoiByIdCauHoi($idquestion)
    {
        $qr = "UPDATE `question` SET xoa=1 WHERE idquestion = '$idquestion'";
        return $this->update($qr);
    }
    public function loadQuestionsDisplayed()
    {
        $qr = "SELECT * FROM `question` WHERE display = 1";
        return $this->select($qr);
    }
    public function displayQuestion($idquestion,$answer, $option)
    {
        $qr = "UPDATE `question` SET `answer`='$answer',`status`='Đã trả lời', `display`='$option' WHERE idquestion = '$idquestion'";
        return $this->update($qr);
    }
    public function getimgcongty($idcongty)
    {
        $qr = "SELECT `image` FROM `company` WHERE idcompany='$idcongty'";
        return $this->select($qr);
    }
    public function updateavataUser($iduser,$img)
    {
        $qr = "UPDATE `user` SET `image`='$img' WHERE iduser='$iduser'";
        return $this->update($qr);
    }
}