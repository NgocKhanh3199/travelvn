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
    public function detail()
    {
        $this->viewadmin("diadiem", "detail");
    }
    public function getDiadiemByIddiadiem()
    {
        $iddiadanh = $_POST['iddiadiem'];
        echo json_encode($this->diadiem->getDiadanhByIddiadanh($iddiadanh));
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
            // $diachi = $dd['diachifull'];
            // load img
            $img = strlen($dd['hinhanh']) > 0 ? $dd['hinhanh'] : 'delivery.png';
            $hinhanh = '<button class="table-img"><img src="' . $path . $img . '" alt=""></button>';

            $view = '<a href="?controller=cdiadiem&action=detail&iddiadiem=' . $iddiadiem . '" class="a-view">Xem</a>';
            $edit = '<a href="?controller=cdiadiem&action=edit&iddiadiem=' . $iddiadiem . '" class ="a-edit" onclick="editPlace(' . $iddiadiem . ')">Sửa</a>';
            $delete = '<a href="" class = "a-delete" onclick="deleteDiadiem(' . $iddiadiem . ')">Xóa</a>';
            $row = [$stt, $hinhanh, $tendiadiem,  $view, $edit, $delete];
            $data[] = $row;
        }
        echo json_encode($data);
    }
    public function addplace()
    {
        $hinhanh = $_POST['hinhanh'];
        $nameplace = $_POST['nameplace'];
        // $in4 = $_POST['in4'];
        // $address = $_POST['address'];
        // $tinh = $_POST['tinh'];
        // $huyen = $_POST['huyen'];
        // $xa = $_POST['xa'];
        // $nametinh = $_POST['nametinh'];
        // $namehuyen = $_POST['namehuyen'];
        // $namexa = $_POST['namexa'];
        // $diachifull = $address . ", " . $namexa . ", " . $namehuyen . ", " . $nametinh;
        $data = $this->diadiem->addplace($hinhanh, $nameplace);
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
        $diachifull = $address . ", " . $xa . ", " . $huyen . ", " . $tinh;
        $data = $this->diadiem->updateplace($hinhanh, $nameplace, $in4, $address, $tinh, $huyen, $xa, $diachifull);
        echo $data;
    }
    // public function deleteDiadiemByIddiadiem()
    // {
    //     $iddiadiem = $this->getValue(1, "iddiadiem", "");
    //     echo json_encode($this->diadiem->deleteDiadiemByIddiadiem($iddiadiem));
    // }
    public function getDiadiem()
    {
        echo json_encode($this->diadiem->getAllDiadiem());
    }
}
