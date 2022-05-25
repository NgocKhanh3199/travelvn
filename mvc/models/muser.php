<?php
class muser extends database{

    public function register($name, $username, $passwordhash1, $phone, $email, $gender, $birthday)
    {
        $qr = "INSERT INTO `user`(`name`, `username`, `password`, `phone`, `email`, `gender`, `birthday`) VALUES ('$name','$username','$passwordhash1','$phone','$email','$gender','$birthday')";
        return $this->insert($qr); 
    }
    public function login($taikhoan){

        $qr = "SELECT * FROM `user` WHERE username = '$taikhoan'";
        return $this->select($qr);
        
    }
    public function findUserById($iduser)
    {
        $qr = "SELECT * FROM `user` WHERE iduser='$iduser'";
        return $this->select($qr);
    }
    public function updateUser($iduser, $image, $name, $username, $phone, $email, $gender, $birthday)
    {
        $qr = "UPDATE `user` SET `image`='$image', `name`='$name',`username`='$username',`phone`='$phone',`email`='$email',`gender`='$gender',`birthday`='$birthday' WHERE iduser = '$iduser'";
        return $this->update($qr);
        // return $qr;
    }
    public function deleteUser($iduser)
    {
        $qr = "DELETE FROM `user` WHERE iduser = '$iduser'";
        return $this->delete($qr);
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
        $qr = "SELECT * FROM `user`";
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
        $qr = "SELECT question.content, question.answer, user.name,question.status  FROM `question`, user WHERE question.iduser = user.iduser";
        return $this->select($qr);
    }
    
}