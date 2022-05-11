<?php
class mtour extends database
{

    public function add($hinhanh, $nametour, $pricetour, $dayend, $daystar, $numberday, $numbernight, $in4tour)
    {

        $qr = "INSERT INTO `tour`(";
        for ($i = 0; $i < count($hinhanh); $i++) {
            $column[$i] = $hinhanh[$i];
            $column[$i] = "`hinhanh$i`";
            if ($column[0] == "`hinhanh0`") {
                $column[0] = "`hinhanh`";
            }

            $qr .= "$column[$i]";
            $qr .= ",";
        }
        $qr .= "`nametour`, `price`, `day-start`, `day-end`, `numberday`, `numbernight`, `idcompany`, `information`)";
        $qr .= " VALUES (";
        for ($j = 0; $j < count($hinhanh); $j++) {
            $value[$j] = $hinhanh[$j];

            $qr .= "'$value[$j]'";
            $qr .= ",";
        }
        $qr .= "' $nametour', '$pricetour', '$dayend', '$daystar', '$numberday', '$numbernight','1','$in4tour')";
        return $this->insert($qr);

    }
}
