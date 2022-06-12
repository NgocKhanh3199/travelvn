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
    // public function getAlltour()
    // {
    //     echo json_encode($this->tour->getAlltour());
    // }
    public function getAllTour()
    {
        echo json_encode($this->tour->getAllTour());
    }
    public function getTourByIdTour()
    {
        $idTour = $_POST['idTour'];
        echo json_encode($this->tour->getTourByIdTour($idTour));
    }
    public function getin4TourbyIdtour()
    {
        $idtour = $_POST['idtour'];
        echo json_encode($this->tour->getin4TourbyIdtour($idtour));
    }
    public function getPlaceByIdTour()
    {
        $idTour = $_POST['idTour'];
        echo json_encode($this->tour->getPlaceByIdTour($idTour));
    }
    public function add()
    {
        $idtour = $_POST['idtour'];
        $idplace = $_POST['idplace'];
        $hinhanh = $_POST['hinhanh'];
        $nametour = $_POST['nametour'];
        $totalguest = $_POST['totalguest'];
        $priceadult = $_POST['priceadult'];
        $pricechild = $_POST['pricechild'];
        $dayend = $_POST['dayend'];
        $daystar = $_POST['daystar'];
        $numberday = $_POST['numberday'];
        $numbernight = $_POST['numbernight'];
        $in4tour = $_POST['in4tour'];
        $transport = $_POST['transport'];
        $service = $_POST['service'];
        $schedule = $_POST['schedule'];
        $start_place = $_POST['start_place'];
        $end_place = $_POST['end_place'];
        $rs = $_POST['rs'];

        $data = $this->tour->add($idtour, $hinhanh, $nametour, $totalguest, $priceadult, $pricechild, $dayend, $daystar, $numberday, $numbernight, $in4tour, $transport, $service, $schedule, $start_place);
        $result = [
            "message" => "Thêm thất bại !",
            "status" => false,
        ];
        if ($data > 0) {
            $result = [
                "message" => "Thêm thành công !",
                "status" => true,
            ];
            if ($end_place) {
                $row = 0;
                for ($i = 0; $i < count($end_place); $i++) {
                    $nameplace = $end_place[$i];
                    $row += $this->tour->addDetailplace($idtour, $nameplace);
                }
                if ($row <= 0) {
                    $result = [
                        "message" => "end_place",
                        "status" => true,
                    ];
                }
            } else if ($rs) {
                for ($i = 0; $i < count($rs); $i++) {
                    $idplace = $idplace . $i;
                    $hinhanhplace = $rs[$i]["linkplace"];
                    $nameplace = $rs[$i]["nameplace"];
                    $in4 = $rs[$i]["in4"];
                    $address = $rs[$i]["address"];
                    $tinh = $rs[$i]["tinh"];
$huyen = $rs[$i]["huyen"];
                    $xa = $rs[$i]["xa"];
                    $nametinh = $rs[$i]["nametinh"];
                    $namehuyen = $rs[$i]["namehuyen"];
                    $namexa = $rs[$i]["namexa"];
                    $diachifull = $address . ", " . $namexa . ", " . $namehuyen . ", " . $nametinh;
                    $data = $this->tour->addplace($idplace, $hinhanhplace, $nameplace, $in4, $address, $tinh, $huyen, $xa, $diachifull);
                    if ($data > 0) {
                        $result = [
                            "message" => "Thêm tour thành công, thêm đia điểm thành công",
                            "status" => true,
                        ];
                        $row = 0;
                        $row += $this->tour->addDetailplace($idtour, $idplace);
                        if ($row <= 0) {
                            $result = [
                                "message" => "Thêm tour thành công, thêm chi tiết đia điểm thất bại",
                                "status" => true,
                            ];
                        }
                    }
                }
            }
        }
        echo json_encode($result);
    }


    public function edit()
    {
        $idtour = $_POST['idtour'];
        $hinhanh = $_POST['hinhanh'];
        $nametour = $_POST['nametour'];
        $totalguest = $_POST['totalguest'];
        $priceadult = $_POST['priceadult'];
        $pricechild = $_POST['pricechild'];
        $dayend = $_POST['dayend'];
        $daystar = $_POST['daystar'];
        $numberday = $_POST['numberday'];
        $numbernight = $_POST['numbernight'];
        $in4tour = $_POST['in4tour'];
        $transport = $_POST['transport'];
        $service = $_POST['service'];
        $schedule = $_POST['schedule'];
        $start_place = $_POST['start_place'];


        $data = $this->tour->edit($idtour, $hinhanh, $nametour, $totalguest, $priceadult, $pricechild, $dayend, $daystar, $numberday, $numbernight, $in4tour, $transport, $service, $schedule, $start_place);
        $result = [
            "message" => "Cập nhật thất bại !",
            "status" => false,
        ];
        if ($data > 0) {
            $result = [
                "message" => "Cập nhật thành công !",
                "status" => true,
            ];
        }
        echo json_encode($result);
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
            $giaTourAd = $t['price-adult'];
            $giaTourCh = $t['price-child'];
            $day_start = $t['day-start'];
            $day_end = $t['day-end'];
            // load img
            $img = strlen($t['hinhanh']) > 0 ? $t['hinhanh'] : 'delivery.png';
            $hinhanh = '<button class="table-img"><img src="' . $path . $img . '" alt=""></button>';

            $view = '<a href="index.php?controller=chome&action=company&path=tour&page=detail&idTour=' . $idTour . '" class="a-view">Xem</a>';
            $edit = '<a href="index.php?controller=chome&action=company&path=tour&page=edit&idTour=' . $idTour . '" class ="a-edit" onclick="editPlace(' . $idTour . ')">Sửa</a>';
            $delete = '<a href="" class = "a-delete" onclick="deleteTour(' . $idTour . ')">Xóa</a>';
            $row = [$stt, $hinhanh, $tenTour, $giaTourAd, $giaTourCh, $day_start, $day_end,  $view, $edit, $delete];
            $data[] = $row;
        }
        echo json_encode($data);
    }
    public function loadTableTourAdmin()
    {
        $tour = $this->tour->getAllTour();
        $stt = 0;
        $data = [];
        $path = "./public/img/tour/";
        foreach ($tour as $t) {
            $stt++;
            $idTour = $t['idtour'];
            $tenTour = $t['nametour'];
            $giaTourAd = $t['price-adult'];
            $giaTourCh = $t['price-child'];
            $day_start = $t['day-start'];
            $day_end = $t['day-end'];
            $status = $t['status'];
            // load img
            $img = strlen($t['hinhanh']) > 0 ? $t['hinhanh'] : 'delivery.png';
            $hinhanh = '<button class="table-img"><img src="' . $path . $img . '" alt=""></button>';
            if ($status == 1) {
                $view = '<a href="index.php?controller=chome&action=admin&path=tour&page=detail&idTour=' . $idTour . '" class="a-view nav-link text-success">Xem</a>';
                $edit = '<a href="" class ="a-edit nav-link" onclick="duyetTour(' . $idTour . ')">Đã duyệt</a>';
                $delete = '<a href="" class = "a-delete nav-link text-danger" onclick="deleteTour(' . $idTour . ')">Xóa</a>';
                $row = [$stt, $hinhanh, $tenTour, $giaTourAd, $giaTourCh, $day_start, $day_end,  $view, $edit, $delete];
                $data[] = $row;
            } else if ($status == 0) {
                $view = '<a href="index.php?controller=chome&action=admin&path=tour&page=detail&idTour=' . $idTour . '" class="a-view nav-link text-success">Xem</a>';
                $edit = '<a href="" class ="a-edit nav-link" onclick="duyetTour(' . $idTour . ')">Duyệt tour</a>';
                $delete = '<a href="" class = "a-delete nav-link text-danger" onclick="deleteTour(' . $idTour . ')">Xóa</a>';
                $row = [$stt, $hinhanh, $tenTour, $giaTourAd, $giaTourCh, $day_start, $day_end,  $view, $edit, $delete];
                $data[] = $row;
            }
        }
        echo json_encode($data);
    }
    public function deleteTourByIdtour()
    {
        $idTour = $_POST['idTour'];
        $data = $this->tour->deleteTourByIdtour($idTour);
        echo $data;
    }

    public function duyetTourByIdtour()
    {
        $idTour = $_POST['idTour'];
        $data = $this->tour->duyetTourByIdtour($idTour);
        echo $data;
    }

    public function search()
    {
        $name = $_POST['name'];
$data = $this->tour->search($name);
        echo json_encode($data);
    }
    public function getInformationByNamePlace()
    {
        $name = $_POST['name'];
        $data = $this->tour->getInformationByNamePlace($name);
        echo json_encode($data);
    }
    public function getPlaceByUniqueName()
    {
        $name = $_POST['name'];
        $data = $this->tour->getPlaceByUniqueName($name);
        echo json_encode($data);
    }
    public function getCityById()
    {
        $idplace = $_POST['idplace'];
        $data = $this->tour->getCityById($idplace);
        echo json_encode($data);
    }
    public function getCityByIdAndMinPrice()
    {
        $idplace = $_POST['idplace'];
        $minprice = $_POST['minprice'];
        $data = $this->tour->getCityByIdAndMinPrice($idplace, $minprice);
        echo json_encode($data);
    }
    public function getCityByIdAndMaxPrice()
    {
        $idplace = $_POST['idplace'];
        $maxprice = $_POST['maxprice'];
        $data = $this->tour->getCityByIdAndMaxPrice($idplace, $maxprice);
        echo json_encode($data);
    }
    public function getAllTourOrderById()
    {
        $data = $this->tour->getAllTourOrderById();
        echo json_encode($data);
    }
    public function getAllTourOrderByPrice()
    {
        $data = $this->tour->getAllTourOrderByPrice();
        echo json_encode($data);
    }
    public function getAllTourOrderByNumberDay()
    {
        $data = $this->tour->getAllTourOrderByNumberDay();
        echo json_encode($data);
    }
    public function getAllTourByNumberDayAround1To3()
    {
        $idplace = $_POST['idplace'];
        $data = $this->tour->getAllTourByNumberDayAround1To3($idplace);
        echo json_encode($data);
    } 
    public function getAllTourByNumberDayAround4To7()
    {
        $idplace = $_POST['idplace'];
        $data = $this->tour->getAllTourByNumberDayAround4To7($idplace);
        echo json_encode($data);
    }
    public function getAllTourByNumberDayAround8To14()
    {
        $idplace = $_POST['idplace'];
        $data = $this->tour->getAllTourByNumberDayAround8To14($idplace);
        echo json_encode($data);
    }
    public function getAllTourByNumberDayOver14()
    {
        $idplace = $_POST['idplace'];
        $data = $this->tour->getAllTourByNumberDayOver14($idplace);
        echo json_encode($data);
    }
    public function getAllTourByNumberDayAround1To3AndMinPrice()
    {
        $idplace = $_POST['idplace'];
        $minprice = $_POST['minprice'];
        $data = $this->tour->getAllTourByNumberDayAround1To3AndMinPrice($idplace, $minprice);
        echo json_encode($data);
    }
    public function getAllTourByNumberDayAround1To3AndMaxPrice()
    {
        $idplace = $_POST['idplace'];
        $maxprice = $_POST['maxprice'];
        $data = $this->tour->getAllTourByNumberDayAround1To3AndMaxPrice($idplace, $maxprice);
        echo json_encode($data);
    }
public function getAllTourByNumberDayAround4To7AndMinPrice()
    {
$idplace = $_POST['idplace'];
        $minprice = $_POST['minprice'];
        $data = $this->tour->getAllTourByNumberDayAround4To7AndMinPrice($idplace, $minprice);
        echo json_encode($data);
    }
    public function getAllTourByNumberDayAround4To7AndMaxPrice()
    {
        $idplace = $_POST['idplace'];
        $maxprice = $_POST['maxprice'];
        $data = $this->tour->getAllTourByNumberDayAround4To7AndMaxPrice($idplace, $maxprice);
        echo json_encode($data);
    }
    public function getAllTourByNumberDayAround8To14AndMinPrice()
    {
        $idplace = $_POST['idplace'];
        $minprice = $_POST['minprice'];
        $data = $this->tour->getAllTourByNumberDayAround8To14AndMinPrice($idplace, $minprice);
        echo json_encode($data);
    }
    public function getAllTourByNumberDayAround8To14AndMaxPrice()
    {
        $idplace = $_POST['idplace'];
        $maxprice = $_POST['maxprice'];
        $data = $this->tour->getAllTourByNumberDayAround8To14AndMaxPrice($idplace, $maxprice);
        echo json_encode($data);
    }
    public function getAllTourByNumberDayOver14AndMinPrice()
    {
        $idplace = $_POST['idplace'];
        $minprice = $_POST['minprice'];
        $data = $this->tour->getAllTourByNumberDayOver14AndMinPrice($idplace, $minprice);
        echo json_encode($data);
    }
    public function getAllTourByNumberDayOver14AndMaxPrice()
    {
        $idplace = $_POST['idplace'];
        $maxprice = $_POST['maxprice'];
        $data = $this->tour->getAllTourByNumberDayOver14AndMaxPrice($idplace, $maxprice);
        echo json_encode($data);
    }
    public function getInformationByIdCity()
    {
        $idplace = $_POST['idplace'];
        $data = $this->tour->getInformationByIdCity($idplace);
        echo json_encode($data);
    }
    public function permitComment()
    {
        $iduser = $_POST['iduser'];
        $idtour = $_POST['idtour'];
        $data = $this->tour->permitComment($iduser, $idtour);
        echo json_encode($data);
    }
    public function addComment()
    {
        $content = $_POST['content'];
        $iduser = $_POST['iduser'];
        $idtour = $_POST['idtour'];
        $data = $this->tour->addComment($content,$iduser, $idtour);
        echo json_encode($data);
    }
    public function loadAllComment()
    {
        $idtour = $_POST['idtour'];
        $data = $this->tour->loadAllComment($idtour);
        echo json_encode($data);
    }
}