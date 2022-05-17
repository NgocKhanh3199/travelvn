<?php
class mtour extends database
{
    public function getAllTour()
    {
        $qr = "SELECT * FROM `tour` WHERE xoa ='0'";
        return $this->select($qr);
    }
    public function getTourByIdTour($idTour)
    {
        $qr = "SELECT * FROM `tour` WHERE idtour='$idTour'";
        return $this->select($qr);
    }
    public function add($idtour, $hinhanh, $nametour, $pricetour, $dayend, $daystar, $numberday, $numbernight, $in4tour, $transport, $service, $schedule, $start_place)
    {

        $qr = "INSERT INTO `tour`(`idtour` ,";
        for ($i = 0; $i < count($hinhanh); $i++) {
            $column[$i] = $hinhanh[$i];
            $column[$i] = "`hinhanh$i`";
            if ($column[0] == "`hinhanh0`") {
                $column[0] = "`hinhanh`";
            }

            $qr .= "$column[$i]";
            $qr .= ",";
        }
        $qr .= "`nametour`, `price`, `day-start`, `day-end`, `numberday`, `numbernight`, `transport`, `place_start`, `service_not_include`, `schedule`, `idcompany`, `information`)";
        $qr .= " VALUES ('$idtour',";
        for ($j = 0; $j < count($hinhanh); $j++) {
            $value[$j] = $hinhanh[$j];

            $qr .= "'$value[$j]'";
            $qr .= ",";
        }
        $qr .= "' $nametour', '$pricetour', '$dayend', '$daystar', '$numberday', '$numbernight','$transport','$start_place','$service','$schedule','1','$in4tour')";
        return $this->insert($qr);
    }
    public function addDetailplace($idtour, $nameplace)
    {
        $qr="INSERT INTO `detail_place`(`idtour`, `idplace`) VALUES ('$idtour','$nameplace')";
        return $this->insert($qr);
    }
    public function edit($idTour, $hinhanh, $nametour, $pricetour, $dayend, $daystar, $numberday, $numbernight, $in4tour, $transport, $service, $schedule, $start_place)
    {

        $qr = "UPDATE `tour` SET";
        for ($i = 0; $i < count($hinhanh); $i++) {
            $column[$i] = $hinhanh[$i];
            $column[$i] = "`hinhanh$i`";
            if ($column[0] == "`hinhanh0`") {
                $column[0] = "`hinhanh`";
            }

            $qr .=  "$column[$i]";
            $qr .= "=";
            $qr .= "'$hinhanh[$i]' ";
            $qr .= ",";
        }
        $qr .= " `nametour`='$nametour',`price`=' $pricetour',`day-start`=' $daystar',`day-end`=' $dayend',`numberday`='$numberday',`numbernight`='$numbernight',`transport`='$transport',`place_start`='$start_place',`service_not_include`='$service',`schedule`='$schedule',`idcompany`='1',`information`='$in4tour'";
        $qr .= " WHERE idtour = '$idTour'";
        return $this->update($qr);
    }
    public function deleteTourByIdtour($idTour)
    {

        $qr = "UPDATE `tour` SET `xoa`='1' WHERE idtour='$idTour'";
        return $this->update($qr);
    }
    public function duyetTourByIdtour($idTour)
    {

        $qr = "UPDATE `tour` SET `status`='1' WHERE idtour='$idTour'";
        return $this->update($qr);
    }
}
