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
        $qr = "SELECT * FROM `detail_place`, `place`, `tour` WHERE detail_place.idtour=tour.idtour AND detail_place.idplace=place.idplace AND tour.idtour=$idTour";
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
        // return $qr;
        return $this->insert($qr);
    }
    public function addDetailplace($idtour, $nameplace)
    {
        $qr="INSERT INTO `detail_place`(`idtour`, `idplace`) VALUES ('$idtour','$nameplace')";
        return $this->insert($qr);
    }
    public function addplace($idplace, $hinhanhplace, $nameplace, $in4, $address, $tinh, $huyen, $xa, $diachifull)
    {
        $qr = "INSERT INTO `place`( `idplace`,";
        for ($i = 0; $i < count($hinhanhplace); $i++) {
            $column[$i] = $hinhanhplace[$i];
            $column[$i] = "`hinhanh$i`";
            if ($column[0] == "`hinhanh0`") {
                $column[0] = "`hinhanh`";
            }

            $qr .= "$column[$i]";
            $qr .= ",";
        }
        $qr .= "`nameplace`, `information`, `address`, `city`, `district`, `ward`, `full-address`)";
        $qr .= " VALUES ('$idplace',";
        for ($j = 0; $j < count($hinhanhplace); $j++) {
            $value[$j] = $hinhanhplace[$j];

            $qr .= "'$value[$j]'";
            $qr .= ",";
        }
        $qr .= "'$nameplace','$in4','$address','$tinh','$huyen','$xa',' $diachifull')";
        // echo $qr;
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
    public function search($name)
    {
        $qr = "SELECT * FROM `tour` WHERE nametour LIKE '%$name%' AND xoa ='0'";
        return $this->select($qr);
    }
    public function getCityById($idplace)
    {
        $qr = "SELECT tour.hinhanh, tour.nametour, tour.price, 'tour.day-start', tour.idtour FROM `detail_place`, place, tour WHERE detail_place.idplace = place.idplace AND detail_place.idtour = tour.idtour AND place.city = '$idplace'";
        return $this->select($qr);
    }
    public function getCityByIdAndMinPrice($idplace, $minprice)
    {
        $qr = "SELECT tour.hinhanh, tour.nametour, tour.price, 'tour.day-start', tour.idtour FROM `detail_place`, place, tour WHERE detail_place.idplace = place.idplace AND detail_place.idtour = tour.idtour AND place.city = '$idplace' AND tour.price > '$minprice'";
        return $this->select($qr);
    }
    public function getCityByIdAndMaxPrice($idplace, $maxprice)
    {
        $qr = "SELECT tour.hinhanh, tour.nametour, tour.price, 'tour.day-start', tour.idtour FROM `detail_place`, place, tour WHERE detail_place.idplace = place.idplace AND detail_place.idtour = tour.idtour AND place.city = '$idplace' AND tour.price < '$maxprice'";
        return $this->select($qr);
    }
}
