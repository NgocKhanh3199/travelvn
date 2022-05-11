<?php
class ctour extends controller
{
    private $tour;
    public function __construct()
    {
        $this->tour = $this->model("mtour");
    }
    public function add()
    {
        $hinhanh = $_POST['hinhanh'];
        $nametour = $_POST['nametour'];
        $pricetour = $_POST['pricetour'];
        $dayend = $_POST['dayend'];
        $daystar = $_POST['daystar'];
        $numberday = $_POST['numberday'];
        $numbernight = $_POST['numbernight'];
        $in4tour = $_POST['in4tour'];
        $data = $this->tour->add($hinhanh, $nametour, $pricetour, $dayend, $daystar, $numberday, $numbernight, $in4tour);
        echo $data;
    }
}
