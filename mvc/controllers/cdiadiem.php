<?php
class cdiadiem extends controller
{
    private $diadiem;
    public function __construct()
    {
        $this->diadiem = $this->model("mdiadiem");
    }
    public function list()
    {
        $this->viewadmin("diadiem", "list");
    }
    public function add()
    {
        $this->viewadmin("diadiem", "add");
    }
    public function edit()
    {
        $this->viewadmin("diadiem", "edit");
    }

    public function getDiadiemByIddiadiem()
    {
        $iddiadanh = $_POST['iddiadiem'];
        echo json_encode($this->diadiem->getDiadanhByIddiadanh($iddiadanh));
    }
    public function getAlldiadiem()
    {
        echo json_encode($this->diadiem->getAllDiadiem());
    }

    // //load table san pham
    public function loadTableDiadiem()
    {
        $diadiem = $this->diadiem->getAllDiadiem();
        $stt = 0;
        $data = [];
        $path = "./public/img/diadiem/";
        foreach ($diadiem as $dd) {
            $stt++;
            $iddiadiem = $dd['idplace'];
            $tendiadiem = $dd['nameplace'];
            $diachi = $dd['full-address'];
            // load img
            $img = strlen($dd['hinhanh']) > 0 ? $dd['hinhanh'] : 'delivery.png';
            $hinhanh = '<button class="table-img"><img src="' . $path . $img . '" alt=""></button>';

            $view = '<a href="index.php?controller=chome&action=admin&path=diadiem&page=detail&iddiadiem=' . $iddiadiem . '" class="a-view nav-link link-success">Xem</a>';
            $edit = '<a href="index.php?controller=chome&action=admin&path=diadiem&page=edit&iddiadiem=' . $iddiadiem . '" class ="a-edit nav-link" onclick="editPlace(' . $iddiadiem . ')">Sửa</a>';
            $delete = '<a href="" class = "a-delete nav-link link-danger" onclick="deleteDiadiem(' . $iddiadiem . ')">Xóa</a>';
            $row = [$stt, $hinhanh, $tendiadiem, $diachi, $view, $edit, $delete];
            $data[] = $row;
        }
        echo json_encode($data);
    }
    public function loadTableDiadiemcompany()
    {
       
        $diadiem = $this->diadiem->getAllDiadiem();
        $stt = 0;
        $data = [];
        $path = "./public/img/diadiem/";
        foreach ($diadiem as $dd) {
            $stt++;
            $iddiadiem = $dd['idplace'];
            $tendiadiem = $dd['nameplace'];
            $diachi = $dd['full-address'];
            // load img
            $img = strlen($dd['hinhanh']) > 0 ? $dd['hinhanh'] : 'delivery.png';
            $hinhanh = '<button class="table-img"><img src="' . $path . $img . '" alt=""></button>';

            $view = '<a href="index.php?controller=chome&action=company&path=diadiem&page=detail&iddiadiem=' . $iddiadiem . '" class="a-view">Xem</a>';
            $edit = '<a href="index.php?controller=chome&action=company&path=diadiem&page=edit&iddiadiem=' . $iddiadiem . '" class ="a-edit" onclick="editPlace(' . $iddiadiem . ')">Sửa</a>';
            $delete = '<a href="" class = "a-delete" onclick="deleteDiadiem(' . $iddiadiem . ')">Xóa</a>';
            $row = [$stt, $hinhanh, $tendiadiem, $diachi, $view, $edit, $delete];
            $data[] = $row;
        }
        echo json_encode($data);
    }
    public function addplace()
    {
        $hinhanh = $_POST['hinhanh'];
        $idplace = $_POST['idplace'];
        $nameplace = $_POST['nameplace'];
        $in4 = $_POST['in4'];
        $address = $_POST['address'];
        $tinh = $_POST['tinh'];
        $huyen = $_POST['huyen'];
        $xa = $_POST['xa'];
        $nametinh = $_POST['nametinh'];
        $namehuyen = $_POST['namehuyen'];
        $namexa = $_POST['namexa'];
        $diachifull = $address . ", " . $namexa . ", " . $namehuyen . ", " . $nametinh;
        $kinhdo = $_POST['kinhdo'];
        $vido = $_POST['vido'];
        $data = $this->diadiem->addplace($idplace, $hinhanh, $nameplace, $in4, $address, $tinh, $huyen, $xa, $diachifull, $kinhdo, $vido);
        echo $data;
    }
    public function editplace()
    {
        $iddiadiem = $_POST['iddiadiem'];
        $hinhanh = $_POST['hinhanh'];
        $nameplace = $_POST['nameplace'];
        $in4 = $_POST['in4'];
        $address = $_POST['address'];
        $tinh = $_POST['tinh'];
        $huyen = $_POST['huyen'];
        $xa = $_POST['xa'];
        $nametinh = $_POST['nametinh'];
        $namehuyen = $_POST['namehuyen'];
        $namexa = $_POST['namexa'];
        $diachifull = $address . ", " . $namexa . ", " . $namehuyen . ", " . $nametinh;
        $kinhdo = $_POST['kinhdo'];
        $vido = $_POST['vido'];
        $data = $this->diadiem->editplace($iddiadiem,$hinhanh, $nameplace, $in4, $address, $tinh, $huyen, $xa, $diachifull, $kinhdo, $vido);
        echo $data;
    }
    public function updateDiadiemByIddiadiem()
    {
        $hinhanh = $_POST['hinhanh'];
        $nameplace = $_POST['nameplace'];
        $in4 = $_POST['in4'];
        $address = $_POST['address'];
        $tinh = $_POST['tinh'];
        $huyen = $_POST['huyen'];
        $xa = $_POST['xa'];
        $nametinh = $_POST['nametinh'];
        $namehuyen = $_POST['namehuyen'];
        $namexa = $_POST['namexa'];
        $diachifull = $address . ", " . $namexa . ", " . $namehuyen . ", " . $nametinh;
        $data = $this->diadiem->updateplace($hinhanh, $nameplace, $in4, $address, $tinh, $huyen, $xa, $diachifull);
        echo $data;
    }
    public function deleteDiadiem()
    {
        $iddiadiem = $_POST['iddiadiem'];
        $data = $this->diadiem->deleteDiadiem($iddiadiem);
        echo $data;
    }
    public function getDiadiem()
    {
        echo json_encode($this->diadiem->getAllDiadiem());
    }
    public function getDiadiembyTinh()
    {
        $tinh = $_POST['tinh'];
        echo json_encode($this->diadiem->getAllDiadiembyTinh($tinh));
    }

    public function loadTableTourByIdPlace()
    {
        $idplace = $_POST['iddiadiem'];
        $tour = $this->diadiem->loadTableTourByIdPlace($idplace);
        $stt = 0;
        $data = [];
        $path = "./public/img/tour/";
        foreach ($tour as $t) {
            $stt++;
            $idtour = $t['idtour'];
            $nametour = $t['nametour'];
            $priceAdult = $t['price-adult'];
            $priceChild = $t['price-child'];
            $dayStart = $t['day-start'];
            $dayEnd = $t['day-end'];
            // load img
            $img = strlen($t['hinhanh']) > 0 ? $t['hinhanh'] : 'delivery.png';
            $hinhanh = '<button class="table-img"><img src="' . $path . $img . '" width="100px" height="100px" alt=""></button>';

            $view = '<a href="?controller=chome&action=admin&path=diadiem&page=detail_tour&idtour=' . $idtour . '&iddiadiem='.$idplace.'" class="a-view">Xem</a>';
            $row = [$stt, $idtour, $hinhanh, $nametour, $priceAdult, $priceChild, $dayStart, $dayEnd ,$view];
            $data[] = $row;
        }
        echo json_encode($data);
    }
}
