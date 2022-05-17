<?php
class ctour extends controller
{
    private $tour;
    public function __construct()
    {
        $this->tour = $this->model("mtour");
    }
    public function addtour()
    {
        return $this->viewcongty("tour", "add");
    }
    public function getTourByIdTour()
    {
        $idTour = $_POST['idTour'];
        echo json_encode($this->tour->getTourByIdTour($idTour));
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
        $transport = $_POST['transport'];
        $service = $_POST['service'];
        $schedule = $_POST['schedule'];
        $start_place = $_POST['start_place'];
        $data = $this->tour->add($hinhanh, $nametour, $pricetour, $dayend, $daystar, $numberday, $numbernight, $in4tour, $transport, $service, $schedule, $start_place);
        echo $data;
    }
    public function edit()
    {
        $idTour = $_POST['idTour'];
        $hinhanh = $_POST['hinhanh'];
        $nametour = $_POST['nametour'];
        $pricetour = $_POST['pricetour'];
        $dayend = $_POST['dayend'];
        $daystar = $_POST['daystar'];
        $numberday = $_POST['numberday'];
        $numbernight = $_POST['numbernight'];
        $in4tour = $_POST['in4tour'];
        $transport = $_POST['transport'];
        $service = $_POST['service'];
        $schedule = $_POST['schedule'];
        $start_place = $_POST['start_place'];
        $data = $this->tour->edit($idTour, $hinhanh, $nametour, $pricetour, $dayend, $daystar, $numberday, $numbernight, $in4tour, $transport, $service, $schedule, $start_place);
        echo $data;
    }
    public function loadTableTour()
    {
        $tour = $this->tour->getAllTour();
        $stt = 0;
        $data = [];
        $path = "./public/img/tour/";
        foreach ($tour as $t) {
            $stt++;
            $idTour = $t['idtour'];
            $tenTour = $t['nametour'];
            $giaTour = $t['price'];
            $day_start = $t['day-start'];
            $day_end = $t['day-end'];
            // load img
            $img = strlen($t['hinhanh']) > 0 ? $t['hinhanh'] : 'delivery.png';
            $hinhanh = '<button class="table-img"><img src="' . $path . $img . '" alt=""></button>';

            $view = '<a href="?controller=ctour&action=detail&idTour=' . $idTour . '" class="a-view">Xem</a>';
            $edit = '<a href="index.php?controller=chome&action=company&path=tour&page=edit&idTour=' . $idTour . '" class ="a-edit" onclick="editPlace(' . $idTour . ')">Sửa</a>';
            $delete = '<a href="" class = "a-delete" onclick="deleteTour(' . $idTour . ')">Xóa</a>';
            $row = [$stt, $hinhanh, $tenTour, $giaTour, $day_start, $day_end,  $view, $edit, $delete];
            $data[] = $row;
        }
        echo json_encode($data);
    }
    public function deleteTourByIdtour()
    {
        $idTour = $_POST['idTour'];
        $data= $this->tour->deleteTourByIdtour($idTour);
        echo $data;
    }
}
