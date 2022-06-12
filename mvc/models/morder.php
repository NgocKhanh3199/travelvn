<?php
class morder extends database{
    public function getAllOrder()
    {
        $qr = "SELECT * FROM `order`";
        return $this->select($qr);
    }
    public function loadTableTourByIdOrder($idorder)
    {
        $qr = "SELECT tour.idtour,tour.hinhanh,tour.nametour, `price-adult`, `price-child`, `day-start`, `day-end` FROM `order`, tour WHERE order.idtour = tour.idtour AND idorder = '$idorder'";
        return $this->select($qr);
    }
}