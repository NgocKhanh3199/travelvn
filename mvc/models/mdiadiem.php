<?php
class mdiadiem extends database
{
    public function getAllDiadiem()
    {
        $qr="SELECT * FROM `place`";
        return $this->select($qr);
    }
    public function getDiadanhByIddiadanh($iddiadanh)
    {
        $qr="SELECT * FROM `place` WHERE idplace='$iddiadanh'";
        return $this->select($qr);
    }
    public function addplace($hinhanh, $nameplace)
    {
        $qr = "INSERT INTO `place`( ";
        for ($i = 0; $i < count($hinhanh); $i++) {
            $column[$i] = $hinhanh[$i];
            $column[$i] = "`hinhanh$i`";
            if ($column[0] == "`hinhanh0`") {
                $column[0] = "`hinhanh`";
            }

            $qr .= "$column[$i]";
            $qr .= ",";
        }
        $qr .= "`nameplace`)";
        $qr .= " VALUES (";
        for ($j = 0; $j < count($hinhanh); $j++) {
            $value[$j] = $hinhanh[$j];

            $qr .= "'$value[$j]'";
            $qr .= ",";
        }
        $qr .= "'$nameplace')";
        // echo $qr;
        return $this->insert($qr);
    }
    
}
