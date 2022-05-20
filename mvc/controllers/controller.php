<?php
function getPage($path)
{
    require "./define.php";
 
    if (isset($path)) {
        $path = $path;
        if (file_exists(path . "/view/$path.php")) {
            require_once path . "/view/$path.php";
        }
        else{
            echo "<div style='width:100%;margin-top: 20px;text-align:center'><h2>Trang không tồn tại<h2/></div>";
        }
    }  else {
        require_once path . "index.php";
    }
}
class controller
{
    public function model($FileName)
    {
        require __DIR__. "/../models/database.php";
        $path = __DIR__ . "/../models/$FileName.php";
        if (file_exists($path)) {
            require $path;
            return new $FileName();
        } else {
            echo "Not find Models";
        }
    }

    public function view($FolderName, $FileName)
    {
        $path = __DIR__ . "/../views/$FolderName/$FileName.php";
        if (file_exists($path)) {
            require $path;
            // echo $path;
        } else {
            echo "Not find Views";
            echo $path;
        }
    }
    public function viewhome($FolderName, $FileName)
    {
        $path = __DIR__ . "/../views/trangchu/$FolderName/$FileName.php";
        if (file_exists($path)) {
            require $path;
            // echo $path;
        } else {
            echo "Not find Views";
            echo $path;
        }
    }
    public function viewadmin($FolderName, $FileName)
    {
        $path = __DIR__ . "/../views/admin/$FolderName/$FileName.php";
        if (file_exists($path)) {
            require $path;
            // echo $path;
        } else {
            echo "Not find Views";
            echo $path;
        }
    }
    public function viewcongty($FolderName, $FileName)
    {
        $path = __DIR__ . "/../views/congty/$FolderName/$FileName.php";
        if (file_exists($path)) {
            require $path;
            // echo $path;
        } else {
            echo "Not find Views";
            echo $path;
        }
    }
    public function viewaccount($FolderName, $FileName)
    {
        $path = __DIR__ . "/../views/account/$FolderName/$FileName.php";
        if (file_exists($path)) {
            require $path;
            // echo $path;
        } else {
            echo "Not find Views";
            echo $path;
        }
    }
    //function upload
    public function uploadFile()
    {
        $uploadTyle = ['image/png,image/jpg,image/jpeg'];
        $uploadSize = 10000000;
        $file = isset($_FILES['file']) ? $_FILES['file'] : [];
        $name = isset($_POST['name']) ? $_POST['name'] : date("h_m_s_d_m_Y"); 
        $folder = isset($_POST['folder']) ? $_POST['folder'] : "img";
        if (count($file) > 0) {
            $check = true;
            if ($file['size'] > $uploadSize) {
                $check = false;
                echo "vượt quá kích thước cho phép";
            }
            if ($check == true && !in_array($file['type'], $uploadTyle)) {
            $path = __DIR__ . "/../../public/img/$folder/$name";
            if (!move_uploaded_file($file['tmp_name'], $path)) {
                echo "Khong di chuyen duoc";
            }
            }
        } else {
            echo "Không đúng định dạng";
        }
    }
}
