<?php
class corder extends controller
{
    private $order;
    public function __construct()
    {
        $this->order = $this->model("morder");
    }
    public function loadTableOrder()
    {
        $order = $this->order->getAllOrder();
        $stt = 0;
        $data = [];
        foreach ($order as $o) {
            $stt++;
            $idorder = $o['idorder'];
            $idtour = $o['idtour'];
            $iduser = $o['iduser'];
            $priceTotal = $o['price-total'];
            $paymentMethod = $o['payment-method'];
            $view = '<a href="index.php??controller=chome&action=admin&path=donhang&page=detail&idorder=' . $idorder . '" class="a-view nav-link text-success">Xem</a>';
            $cancel = '<a href="" class = "a-delete nav-link text-danger" onclick="delete(' . $idorder . ')">Huỷ</a>';
            $row = [$stt, $idorder, $idtour, $iduser, $priceTotal, $paymentMethod, $view, $cancel];
            $data[] = $row;
        }
        echo json_encode($data);
    }
    public function loadTableTourByIdOrder()
    {
        $idorder = $_POST['idorder'];
        $tour = $this->order->loadTableTourByIdOrder($idorder);
        $data = [];
        $path = "./public/img/tour/";
        foreach ($tour as $t) {
            $idTour = $t['idtour'];
            $tenTour = $t['nametour'];
            $giaTourAd = $t['price-adult'];
            $giaTourCh = $t['price-child'];
            $day_start = $t['day-start'];
            $day_end = $t['day-end'];
            // load img
            $img = strlen($t['hinhanh']) > 0 ? $t['hinhanh'] : 'delivery.png';
            $hinhanh = '<button class="table-img"><img src="' . $path . $img . '" alt=""></button>';
            $view = '<a href="index.php?controller=chome&action=admin&path=donhang&page=detail_tour&idTour=' . $idTour.'&idorder='.$idorder.'" class="a-view nav-link text-success">Xem</a>';
            $row = [$idTour, $hinhanh, $tenTour, $giaTourAd, $giaTourCh, $day_start, $day_end,  $view];
            $data[] = $row;
        }
        echo json_encode($data);
    }
}