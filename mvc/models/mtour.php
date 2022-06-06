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
        //$qr = "SELECT tour.hinhanh, tour.idtour, tour.nametour, tour.price, 'tour.day-start', tour.numberday, tour.schedule, tour.information, place.information FROM `tour`, place, detail_place WHERE tour.nametour LIKE '%$name%' AND tour.xoa = 0 AND tour.idtour = detail_place.idtour AND place.idplace = detail_place.idplace";
        return $this->select($qr);
    }
    public function getInformationByNamePlace($name)
    {
        // $qr = "SELECT place.information, place.idplace, detail_place.idplace, tour.idtour FROM `place`, detail_place, tour WHERE place.nameplace LIKE '%$name%' AND place.idplace =detail_place.idplace AND tour.idtour = detail_place.idtour";
        $qr = "SELECT place.information, place.idplace, place.nameplace,detail_place.idplace, tour.idtour, tour.nametour, tour.hinhanh, tour.price, 'tour.day-start', tour.xoa FROM `place`, detail_place, tour WHERE place.nameplace LIKE '%$name%' AND place.idplace =detail_place.idplace AND tour.idtour = detail_place.idtour AND tour.xoa = 0";
        return $this->select($qr);
    }
    public function getPlaceByUniqueName($name)
    {
        $qr = "SELECT place.information, place.idplace, place.nameplace,detail_place.idplace, tour.idtour, tour.nametour, tour.hinhanh, tour.price, 'tour.day-start', tour.xoa FROM `place`, detail_place, tour WHERE place.nameplace LIKE '$name' AND place.idplace =detail_place.idplace AND tour.idtour = detail_place.idtour AND tour.xoa = 0";
        return $this->select($qr);
    }
    public function getCityById($idplace)
    {
        $qr = "SELECT tour.hinhanh, tour.nametour, tour.price, 'tour.day-start', tour.idtour, place.nameplace,place.information FROM `detail_place`, place, tour WHERE detail_place.idplace = place.idplace AND detail_place.idtour = tour.idtour AND place.city = '$idplace'";
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
    public function getAllTourOrderById()
    {
        $qr = "SELECT * FROM `tour` ORDER BY idtour DESC";
        return $this->select($qr);
    }
    public function getAllTourOrderByPrice()
    {
        $qr = "SELECT * FROM `tour` ORDER BY price DESC";
        return $this->select($qr);
    }
    public function getAllTourOrderByNumberDay()
    {
        $qr = "SELECT * FROM `tour` ORDER BY numberday DESC";
        return $this->select($qr);
    }
    public function getAllTourByNumberDayAround1To3($idplace)
    {
        $qr = "SELECT tour.hinhanh, tour.nametour, tour.price, 'tour.day-start', tour.idtour, tour.numberday FROM `detail_place`, place, tour WHERE detail_place.idplace = place.idplace AND detail_place.idtour = tour.idtour AND place.city = '$idplace' AND tour.numberday >= 1 AND tour.numberday <=3";
        return $this->select($qr);
    }
    public function getAllTourByNumberDayAround4To7($idplace)
    {
        $qr = "SELECT tour.hinhanh, tour.nametour, tour.price, 'tour.day-start', tour.idtour, tour.numberday FROM `detail_place`, place, tour WHERE detail_place.idplace = place.idplace AND detail_place.idtour = tour.idtour AND place.city = '$idplace' AND tour.numberday >= 4 AND tour.numberday <=7";
        return $this->select($qr);
    }
    public function getAllTourByNumberDayAround8To14($idplace)
    {
        $qr = "SELECT tour.hinhanh, tour.nametour, tour.price, 'tour.day-start', tour.idtour, tour.numberday FROM `detail_place`, place, tour WHERE detail_place.idplace = place.idplace AND detail_place.idtour = tour.idtour AND place.city = '$idplace' AND tour.numberday >= 8 AND tour.numberday <=14";
        return $this->select($qr);
    }
    public function getAllTourByNumberDayOver14($idplace)
    {
        $qr = "SELECT tour.hinhanh, tour.nametour, tour.price, 'tour.day-start', tour.idtour, tour.numberday FROM `detail_place`, place, tour WHERE detail_place.idplace = place.idplace AND detail_place.idtour = tour.idtour AND place.city = '$idplace' AND tour.numberday > 14";
        return $this->select($qr);
    }
    public function getAllTourByNumberDayAround1To3AndMinPrice($idplace, $minprice)
    {
        $qr = "SELECT tour.hinhanh, tour.nametour, tour.price, 'tour.day-start', tour.idtour, tour.numberday FROM `detail_place`, place, tour WHERE detail_place.idplace = place.idplace AND detail_place.idtour = tour.idtour AND place.city = '$idplace' AND tour.numberday >= 1 AND tour.numberday <=3 AND tour.price > $minprice";
        return $this->select($qr);
    }
    public function getAllTourByNumberDayAround1To3AndMaxPrice($idplace, $maxprice)
    {
        $qr = "SELECT tour.hinhanh, tour.nametour, tour.price, 'tour.day-start', tour.idtour, tour.numberday FROM `detail_place`, place, tour WHERE detail_place.idplace = place.idplace AND detail_place.idtour = tour.idtour AND place.city = '$idplace' AND tour.numberday >= 1 AND tour.numberday <=3 AND tour.price < $maxprice";
        return $this->select($qr);
    }
    public function getAllTourByNumberDayAround4To7AndMinPrice($idplace, $minprice)
    {
        $qr = "SELECT tour.hinhanh, tour.nametour, tour.price, 'tour.day-start', tour.idtour, tour.numberday FROM `detail_place`, place, tour WHERE detail_place.idplace = place.idplace AND detail_place.idtour = tour.idtour AND place.city = '$idplace' AND tour.numberday >= 4 AND tour.numberday <=7 AND tour.price > $minprice";
        return $this->select($qr);
    }
    public function getAllTourByNumberDayAround4To7AndMaxPrice($idplace, $maxprice)
    {
        $qr = "SELECT tour.hinhanh, tour.nametour, tour.price, 'tour.day-start', tour.idtour, tour.numberday FROM `detail_place`, place, tour WHERE detail_place.idplace = place.idplace AND detail_place.idtour = tour.idtour AND place.city = '$idplace' AND tour.numberday >= 4 AND tour.numberday <=7 AND tour.price < $maxprice";
        return $this->select($qr);
    }
    public function getAllTourByNumberDayAround8To14AndMinPrice($idplace, $minprice)
    {
        $qr = "SELECT tour.hinhanh, tour.nametour, tour.price, 'tour.day-start', tour.idtour, tour.numberday FROM `detail_place`, place, tour WHERE detail_place.idplace = place.idplace AND detail_place.idtour = tour.idtour AND place.city = '$idplace' AND tour.numberday >= 8 AND tour.numberday <=14 AND tour.price > $minprice";
        return $this->select($qr);
    }
    public function getAllTourByNumberDayAround8To14AndMaxPrice($idplace, $maxprice)
    {
        $qr = "SELECT tour.hinhanh, tour.nametour, tour.price, 'tour.day-start', tour.idtour, tour.numberday FROM `detail_place`, place, tour WHERE detail_place.idplace = place.idplace AND detail_place.idtour = tour.idtour AND place.city = '$idplace' AND tour.numberday >= 8 AND tour.numberday <=14 AND tour.price < $maxprice";
        return $this->select($qr);
    }
    public function getAllTourByNumberDayOver14AndMinPrice($idplace, $minprice)
    {
        $qr = "SELECT tour.hinhanh, tour.nametour, tour.price, 'tour.day-start', tour.idtour, tour.numberday FROM `detail_place`, place, tour WHERE detail_place.idplace = place.idplace AND detail_place.idtour = tour.idtour AND place.city = '$idplace' AND tour.numberday > 14 AND tour.price > $minprice";
        return $this->select($qr);
    }
    public function getAllTourByNumberDayOver14AndMaxPrice($idplace, $maxprice)
    {
        $qr = "SELECT tour.hinhanh, tour.nametour, tour.price, 'tour.day-start', tour.idtour, tour.numberday FROM `detail_place`, place, tour WHERE detail_place.idplace = place.idplace AND detail_place.idtour = tour.idtour AND place.city = '$idplace' AND tour.numberday > 14 AND tour.price < $maxprice";
        return $this->select($qr);
    }
    public function getInformationByIdCity($idplace)
    {
        $qr = "SELECT information FROM `place` WHERE city = '$idplace'";
        return $this->select($qr);
    }

}
