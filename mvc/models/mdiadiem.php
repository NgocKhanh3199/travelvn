<?php
class mdiadiem extends database
{
    public function getAllDiadiem()
    {
        $qr = "SELECT * FROM `place`";
        return $this->select($qr);
    }
    public function getAllDiadiembyTinh($tinh)
    {
        $qr = "SELECT * FROM `place` WHERE city ='$tinh'";
        return $this->select($qr);
    }
    public function getDiadanhByIddiadanh($iddiadanh)
    {
        $qr = "SELECT * FROM `place` WHERE idplace='$iddiadanh'";
        return $this->select($qr);
    }
    public function addplace($idplace, $hinhanh, $nameplace, $in4, $address, $tinh, $huyen, $xa, $diachifull)
    {
        $qr = "INSERT INTO `place`( `idplace`,";
        for ($i = 0; $i < count($hinhanh); $i++) {
            $column[$i] = $hinhanh[$i];
            $column[$i] = "`hinhanh$i`";
            if ($column[0] == "`hinhanh0`") {
                $column[0] = "`hinhanh`";
            }

            $qr .= "$column[$i]";
            $qr .= ",";
        }
        $qr .= "`nameplace`, `information`, `address`, `city`, `district`, `ward`, `full-address`)";
        $qr .= " VALUES ('$idplace',";
        for ($j = 0; $j < count($hinhanh); $j++) {
            $value[$j] = $hinhanh[$j];

            $qr .= "'$value[$j]'";
            $qr .= ",";
        }
        $qr .= "'$nameplace','$in4','$address','$tinh','$huyen','$xa',' $diachifull')";
        // echo $qr;
        return $this->insert($qr);
    }
    public function deleteDiadiem($iddiadiem)
    {
        $qr = "DELETE FROM `place` WHERE idplace='$iddiadiem'";
        return $this->delete($qr);
    }   
}
