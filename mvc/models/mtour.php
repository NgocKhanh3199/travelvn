<?php
class mtour extends database
{
    public function getAllTour()
    {
        $qr = "SELECT * FROM `tour` WHERE xoa ='0'";
        return $this->select($qr);
    }
    public function getAllTourcompany($idcompany)
    {
        $qr = "SELECT * FROM `tour` WHERE xoa ='0' AND tour.idcompany='$idcompany'";
        return $this->select($qr);
    }
    public function getTourByIdTour($idTour)
    {
        $qr = "SELECT * FROM `detail_place`, `place`, `tour` WHERE detail_place.idtour=tour.idtour AND detail_place.idplace=place.idplace AND tour.idtour=$idTour AND tour.xoa ='0'";
        return $this->select($qr);
    }
    public function getin4TourbyIdtour($idtour)
    {
        $qr = "SELECT * FROM `detail_place`, `place`, `tour` WHERE detail_place.idtour=tour.idtour AND detail_place.idplace=place.idplace AND tour.idtour=$idtour AND tour.xoa ='0'";
        return $this->select($qr);
    }
    public function getPlaceByIdTour($idTour)
    {
        $qr = "SELECT * FROM `detail_place`, `place` WHERE detail_place.idtour=$idTour AND detail_place.idplace = place.idplace AND";
        return $this->select($qr);
    }
    public function add($idcompany, $idtour, $hinhanh, $nametour, $totalguest, $priceadult, $pricechild, $dayend, $daystar, $numberday, $numbernight, $in4tour, $transport, $service, $schedule, $start_place)
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
        $qr .= "`nametour`,`total-guest`, `price-adult`, `price-child`, `day-start`, `day-end`, `numberday`, `numbernight`, `transport`, `place_start`, `service_not_include`, `schedule`, `idcompany`, `information`)";
        $qr .= " VALUES ('$idtour',";
        for ($j = 0; $j < count($hinhanh); $j++) {
            $value[$j] = $hinhanh[$j];

            $qr .= "'$value[$j]'";
            $qr .= ",";
        }
        $qr .= "' $nametour','$totalguest', '$priceadult', '$pricechild', '$dayend', '$daystar', '$numberday', '$numbernight','$transport','$start_place','$service','$schedule','$idcompany','$in4tour')";
        return $this->insert($qr);
    }
    public function addDetailplace($idtour, $nameplace)
    {
        $qr = "INSERT INTO `detail_place`(`idtour`, `idplace`) VALUES ('$idtour','$nameplace')";
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
        return $this->insert($qr);
    }
    public function edit($idtour, $hinhanh, $nametour, $totalguest, $priceadult, $pricechild, $dayend, $daystar, $numberday, $numbernight, $in4tour, $transport, $service, $schedule, $start_place)
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
        $qr .= " `nametour`='$nametour',`total-guest`='$totalguest',`price-adult`='$priceadult',`price-child`='$pricechild',`day-start`=' $daystar',`day-end`=' $dayend',`numberday`='$numberday',`numbernight`='$numbernight',`transport`='$transport',`place_start`='$start_place',`service_not_include`='$service',`schedule`='$schedule',`idcompany`='1',`information`='$in4tour'";
        $qr .= " WHERE idtour = '$idtour'";
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
        //$qr = "SELECT tour.hinhanh, tour.idtour, tour.nametour, tour.`price-adult`, 'tour.day-start', tour.numberday, tour.schedule, tour.information, place.information FROM `tour`, place, detail_place WHERE tour.nametour LIKE '%$name%' AND tour.xoa = 0 AND tour.idtour = detail_place.idtour AND place.idplace = detail_place.idplace";
        return $this->select($qr);
    }
    public function getInformationByNamePlace($name)
    {
        // $qr = "SELECT place.information, place.idplace, detail_place.idplace, tour.idtour FROM `place`, detail_place, tour WHERE place.nameplace LIKE '%$name%' AND place.idplace =detail_place.idplace AND tour.idtour = detail_place.idtour";
        $qr = "SELECT place.information, place.idplace, place.nameplace,detail_place.idplace, tour.idtour, tour.nametour, tour.hinhanh, tour.`price-adult`, 'tour.day-start', tour.xoa FROM `place`, detail_place, tour WHERE place.nameplace LIKE '%$name%' AND place.idplace =detail_place.idplace AND tour.idtour = detail_place.idtour AND tour.xoa = 0";
        return $this->select($qr);
    }
    public function getPlaceByUniqueName($name)
    {
        $qr = "SELECT place.information, place.idplace, place.nameplace,detail_place.idplace, tour.idtour, tour.nametour, tour.hinhanh, tour.`price-adult`, 'tour.day-start', tour.xoa FROM `place`, detail_place, tour WHERE place.nameplace LIKE '$name' AND place.idplace =detail_place.idplace AND tour.idtour = detail_place.idtour AND tour.xoa = 0";
        return $this->select($qr);
    }
    public function getCityById($idplace)
    {
        $qr = "SELECT tour.hinhanh, tour.nametour, tour.`price-adult`, 'tour.day-start', tour.idtour, place.nameplace,place.information FROM `detail_place`, place, tour WHERE detail_place.idplace = place.idplace AND detail_place.idtour = tour.idtour AND place.city = '$idplace' AND tour.xoa = 0";
        return $this->select($qr);
    }
    public function getCityByIdAndMinPrice($idplace, $minprice)
    {
        $qr = "SELECT tour.hinhanh, tour.nametour, tour.`price-adult`, 'tour.day-start', tour.idtour FROM `detail_place`, place, tour WHERE detail_place.idplace = place.idplace AND detail_place.idtour = tour.idtour AND place.city = '$idplace' AND tour.`price-adult` > '$minprice' AND tour.xoa = 0";
        return $this->select($qr);
    }
    public function getCityByIdAndMaxPrice($idplace, $maxprice)
    {
        $qr = "SELECT tour.hinhanh, tour.nametour, tour.`price-adult`, 'tour.day-start', tour.idtour FROM `detail_place`, place, tour WHERE detail_place.idplace = place.idplace AND detail_place.idtour = tour.idtour AND place.city = '$idplace' AND tour.`price-adult` < '$maxprice' AND tour.xoa = 0";
        return $this->select($qr);
    }
    public function getAllTourOrderById()
    {
        $qr = "SELECT * FROM `tour` WHERE xoa='0' ORDER BY idtour DESC";
        return $this->select($qr);
    }
    public function getAllTourOrderByPrice()
    {
        $qr = "SELECT * FROM `tour` WHERE xoa='0' ORDER BY `price-adult` DESC";
        return $this->select($qr);
    }
    public function getAllTourOrderByNumberDay()
    {
        $qr = "SELECT * FROM `tour` WHERE xoa='0' ORDER BY numberday DESC";
        return $this->select($qr);
    }
    public function getAllTourByNumberDayAround1To3($idplace)
    {
        $qr = "SELECT tour.hinhanh, tour.nametour, tour.`price-adult`, 'tour.day-start', tour.idtour, tour.numberday FROM `detail_place`, place, tour WHERE detail_place.idplace = place.idplace AND detail_place.idtour = tour.idtour AND place.city = '$idplace' AND tour.numberday >= 1 AND tour.numberday <=3 AND tour.xoa = 0";
        return $this->select($qr);
    }
    public function getAllTourByNumberDayAround4To7($idplace)
    {
        $qr = "SELECT tour.hinhanh, tour.nametour, tour.`price-adult`, 'tour.day-start', tour.idtour, tour.numberday FROM `detail_place`, place, tour WHERE detail_place.idplace = place.idplace AND detail_place.idtour = tour.idtour AND place.city = '$idplace' AND tour.numberday >= 4 AND tour.numberday <=7 AND tour.xoa = 0";
        return $this->select($qr);
    }
    public function getAllTourByNumberDayAround8To14($idplace)
    {
        $qr = "SELECT tour.hinhanh, tour.nametour, tour.`price-adult`, 'tour.day-start', tour.idtour, tour.numberday FROM `detail_place`, place, tour WHERE detail_place.idplace = place.idplace AND detail_place.idtour = tour.idtour AND place.city = '$idplace' AND tour.numberday >= 8 AND tour.numberday <=14 AND tour.xoa = 0";
        return $this->select($qr);
    }
    public function getAllTourByNumberDayOver14($idplace)
    {
        $qr = "SELECT tour.hinhanh, tour.nametour, tour.`price-adult`, 'tour.day-start', tour.idtour, tour.numberday FROM `detail_place`, place, tour WHERE detail_place.idplace = place.idplace AND detail_place.idtour = tour.idtour AND place.city = '$idplace' AND tour.numberday > 14 AND tour.xoa = 0";
        return $this->select($qr);
    }
    public function getAllTourByNumberDayAround1To3AndMinPrice($idplace, $minprice)
    {
        $qr = "SELECT tour.hinhanh, tour.nametour, tour.`price-adult`, tour.`day-start`, tour.idtour, tour.numberday FROM `detail_place`, place, tour WHERE detail_place.idplace = place.idplace AND detail_place.idtour = tour.idtour AND place.city = '$idplace' AND tour.numberday >= 1 AND tour.numberday <=3 AND tour.`price-adult` > $minprice AND tour.xoa = 0";
        return $this->select($qr);
    }
    public function getAllTourByNumberDayAround1To3AndMaxPrice($idplace, $maxprice)
    {
        $qr = "SELECT tour.hinhanh, tour.nametour, tour.`price-adult`, 'tour.day-start', tour.idtour, tour.numberday FROM `detail_place`, place, tour WHERE detail_place.idplace = place.idplace AND detail_place.idtour = tour.idtour AND place.city = '$idplace' AND tour.numberday >= 1 AND tour.numberday <=3 AND tour.`price-adult` < $maxprice AND tour.xoa = 0";
        return $this->select($qr);
    }
    public function getAllTourByNumberDayAround4To7AndMinPrice($idplace, $minprice)
    {
        $qr = "SELECT tour.hinhanh, tour.nametour, tour.`price-adult`, 'tour.day-start', tour.idtour, tour.numberday FROM `detail_place`, place, tour WHERE detail_place.idplace = place.idplace AND detail_place.idtour = tour.idtour AND place.city = '$idplace' AND tour.numberday >= 4 AND tour.numberday <=7 AND tour.`price-adult` > $minprice AND tour.xoa = 0";
        return $this->select($qr);
    }
    public function getAllTourByNumberDayAround4To7AndMaxPrice($idplace, $maxprice)
    {
        $qr = "SELECT tour.hinhanh, tour.nametour, tour.`price-adult`, 'tour.day-start', tour.idtour, tour.numberday FROM `detail_place`, place, tour WHERE detail_place.idplace = place.idplace AND detail_place.idtour = tour.idtour AND place.city = '$idplace' AND tour.numberday >= 4 AND tour.numberday <=7 AND tour.`price-adult` < $maxprice AND tour.xoa = 0";
        return $this->select($qr);
    }
    public function getAllTourByNumberDayAround8To14AndMinPrice($idplace, $minprice)
    {
        $qr = "SELECT tour.hinhanh, tour.nametour, tour.`price-adult`, 'tour.day-start', tour.idtour, tour.numberday FROM `detail_place`, place, tour WHERE detail_place.idplace = place.idplace AND detail_place.idtour = tour.idtour AND place.city = '$idplace' AND tour.numberday >= 8 AND tour.numberday <=14 AND tour.`price-adult` > $minprice AND tour.xoa = 0";
        return $this->select($qr);
    }
    public function getAllTourByNumberDayAround8To14AndMaxPrice($idplace, $maxprice)
    {
        $qr = "SELECT tour.hinhanh, tour.nametour, tour.`price-adult`, 'tour.day-start', tour.idtour, tour.numberday FROM `detail_place`, place, tour WHERE detail_place.idplace = place.idplace AND detail_place.idtour = tour.idtour AND place.city = '$idplace' AND tour.numberday >= 8 AND tour.numberday <=14 AND tour.`price-adult` < $maxprice AND tour.xoa = 0";
        return $this->select($qr);
    }
    public function getAllTourByNumberDayOver14AndMinPrice($idplace, $minprice)
    {
        $qr = "SELECT tour.hinhanh, tour.nametour, tour.`price-adult`, 'tour.day-start', tour.idtour, tour.numberday FROM `detail_place`, place, tour WHERE detail_place.idplace = place.idplace AND detail_place.idtour = tour.idtour AND place.city = '$idplace' AND tour.numberday > 14 AND tour.`price-adult` > $minprice AND tour.xoa = 0";
        return $this->select($qr);
    }
    public function getAllTourByNumberDayOver14AndMaxPrice($idplace, $maxprice)
    {
        $qr = "SELECT tour.hinhanh, tour.nametour, tour.`price-adult`, 'tour.day-start', tour.idtour, tour.numberday FROM `detail_place`, place, tour WHERE detail_place.idplace = place.idplace AND detail_place.idtour = tour.idtour AND place.city = '$idplace' AND tour.numberday > 14 AND tour.`price-adult` < $maxprice AND tour.xoa = 0";
        return $this->select($qr);
    }
    public function getInformationByIdCity($idplace)
    {
        $qr = "SELECT information FROM `place` WHERE city = '$idplace'";
        return $this->select($qr);
    }

    public function permitComment($iduser, $idtour)
    {
        $qr = "SELECT * FROM `order` WHERE iduser = '$iduser' AND idtour = '$idtour'";
        return $this->select($qr);
    }
    public function addComment($content, $iduser, $idtour)
    {
        $qr = "INSERT INTO `rates`(`content`, `iduser`, `idtour`) VALUES ('$content','$iduser','$idtour')";
        return $this->insert($qr);
    }
    public function loadAllComment($idtour)
    {
        $qr = "SELECT rates.content, user.name, user.image FROM `rates`, user, tour WHERE rates.iduser = user.iduser AND rates.idtour = tour.idtour AND tour.idtour = '$idtour' AND tour.xoa = 0";
        return $this->select($qr);
    }
    //-----------------------------------------pagination---------------------------------
    public function getAllTourPagination($startnum)
    {
        $qr = "SELECT * FROM `tour` WHERE xoa ='0' LIMIT $startnum,8";
        return $this->select($qr);
    }
    public function getAllTourOrderByIdPagination($startnum)
    {
        $qr = "SELECT * FROM `tour` WHERE xoa ='0' ORDER BY idtour DESC LIMIT $startnum,8";
        return $this->select($qr);
    }
    //------------------------------------------rating-------------------------------
    // public function addRatingStar($idtour, $iduser, $star)
    // {
    //     $qr = " ";
    //     return $this->select($qr);
    // }
}
