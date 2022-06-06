<?php
class database
{
    public function connect()
    {
        $dbname = "travelvn";
        $username = "root";
        $password = "";
        $host = "localhost";
        $conn = mysqli_connect($host,$username,$password,$dbname);
        if($conn)
        {
            $message =  "connect success";
            return $conn;
        }
        else
        {
            $message = "fail connect".mysqli_connect_error();
        }
    }
    public function close_connect($conn){
        mysqli_close($conn);
    }

    public function select($qr)
    {
        $connect = $this->connect();
        $data = [];
        $result = mysqli_query($connect,$qr);
        while($row = $result ->fetch_assoc())
        {
            $data[] = $row;
        }
        $this->close_connect($connect);
        return $data;
    }
    public function insert($qr)
    {
        $connect = $this->connect();
        $result = mysqli_query($connect,$qr);
        if($result == true)
        {
           $data =  1;
        }
        else
        {
            $data = 0;
        }
        $this-> close_connect($connect);
        return $data;
    }

    public function update($qr)
    {
        $connect = $this->connect();
        $result = mysqli_query($connect,$qr);
        if($result == true)
        {
           $data =  1;
        }
        else
        {
            $data = 0;
        }
        $this-> close_connect($connect);
        return $data;
    }
    public function delete($qr)
    {
        $connect = $this->connect();
        $result = mysqli_query($connect,$qr);
        if($result == true)
        {
           $data =  1;
        }
        else
        {
            $data = 0;
        }
        $this-> close_connect($connect);
        return $data;
    }
    public function insert_mutiple_image($id_room,$image_room,$image_mutipel)
    {
        
        $qr = "INSERT INTO `image`(`id_room`, `image_room` ";
        for ($i = 0; $i < count($image_mutipel); $i++) {
            $column[$i] = $image_mutipel[$i];
            $column[$i] = "`image_detail$i`";
            if ($column[0] == "`image_detail0`") {
                $column[0] = "`image_detail`";
            }
            $qr .= ",";

            $qr .= "$column[$i]";
        }
        $qr .= ")";
        $qr.=" VALUES ('$id_room','$image_room'";
        for ($j = 0; $j < count($image_mutipel); $j++) {
            $value[$j] =$image_mutipel[$j];
            $qr .= ",";
            $qr .= "'$value[$j]'";
        }
        $qr .= ")";

        // echo $qr;
        $conn = $this->connect();
        $result = mysqli_query($conn,$qr);
        $this-> close_connect($conn);
        return $result;

    }

    public function edit_mutiple_image($id_room,$image_room,$image_mutipel)
    {
        $qr = "UPDATE `image` SET `image_room`='$image_room'";
        for ($i = 0; $i < count($image_mutipel); $i++) {
            $column[$i] = $image_mutipel[$i];
            $column[$i] = "`image_detail$i`";
if ($column[0] == "`image_detail0`") {
                $column[0] = "`image_detail`";
            }
            $qr.= ",";
            $qr.=  "$column[$i]";
            $qr.= "=";
            $qr .= "'$image_mutipel[$i]' ";
        }
        $qr.=" WHERE id_room = '$id_room'";
        $conn = $this->connect();
        $result = mysqli_query($conn,$qr);
        $this-> close_connect($conn);
        return $result;

    }
   
}