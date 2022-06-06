<?php
class corder extends controller
{
    private $order;

    public function __construct()
    {
        $this->order = $this->model("morder");
    }
    public function getOrderbyIdorder()
    {
        $idorder = $_POST['idorder'];
        echo json_encode($this->order->getOrderbyIdorder($idorder));
    }
    public function addOrder()
    {
        // $idorder = $_POST['idorder'];
        // $idtour = $_POST['idtour'];
        // $iduser = $_POST['iduser'];
        // $daystart = $_POST['daystart'];
        // $dayend = $_POST['dayend'];
        // $slchild = $_POST['slchild'];
        // $slnguoilon = $_POST['slnguoilon'];
        // $totalguest = intval($_POST['totalguest']);
        // $name = $_POST['name'];
        // $email = $_POST['email'];
        // $phone = $_POST['phone'];
        // $address = $_POST['address'];
        // $pricetotal = $_POST['pricetotal'];
        // $note = $_POST['note'];
        // $rs_adult =  $_POST['rs_adult'];
        // $rs_child =  $_POST['rs_child'];
        $thanhtoan = $_POST['thanhtoan'];
        $method = intval($thanhtoan);
        // $status = $thanhtoan;

        // $check = $this->order->checktotal($idtour);
        // foreach ($check as $o) {
        //     $c = intval($o['total-guest']);
        // }
        // if ($c >= $totalguest) {
        //     $data = $this->order->addOrder($idorder, $idtour, $iduser, $daystart, $dayend, $slchild, $slnguoilon, $name, $email, $phone, $address, $pricetotal, $note, $status, $thanhtoan);
        //     $rs = [$data, $idorder];
        //     // $rs = [$data, "ok order"];
        //     if ($data > 0) {
        //         if ($rs_adult) {
        //             for ($i = 0; $i < $slnguoilon; $i++) {
        //                 $ad = $rs_adult[$i];
        //                 $namead = $ad['name_customer'];
        //                 $genderad = $ad['gender'];
        //                 $birthad = $ad['birth'];
        //                 $data = $this->order->addCustomerad($idorder, $namead, $genderad, $birthad);
        //                 $rs = [$data, $idorder];
        //                 // $rs = [$data, "okad"];
        //             }
        //         }
        //         if ($rs_child) {
        //             for ($i = 0; $i < $slchild; $i++) {
        //                 $ch = $rs_child[$i];
        //                 $namech = $ch['name_customer'];
        //                 $genderch = $ch['gender'];
        //                 $birthch = $ch['birth'];
        //                 $data = $this->order->addCustomerch($idorder, $namech, $genderch, $birthch);
        //                 $rs = [$data, $idorder];
        //             }
        //         }
        //         $totalguestTour = $c - $totalguest;
        //         $upda = $this->order->updateTotalguest($idtour, $totalguestTour);
        //         $rs = [$data, $idorder];

                if ($method == 0) 
                {
                    echo 0;
                    // $data = $this->order->addbill($idorder, $pricetotal, $thanhtoan);
                    // $rs = [$data, $idorder];
                } else if ($method == 1) {
                    // header('Location:index.php?controller=chome&action=vn_pay');
                    echo 1;
                }
        //     } else {
        //         $data = -1;
        //         $rs = [$data,  $idorder];
        //     }
        // } else {
        //     $data = -2;
        // }

        // echo json_encode($rs);
    }


    public function loadTableOrder()
    {
        $order = $this->order->getAllOrder();
        $stt = 0;
        $data = [];
        foreach ($order as $o) {
            $stt++;
            $idorder = $o['idorder'];
            $tenkh = $o['name-customer'];
            $phone = $o['phone-customer'];
            $email = $o['email-customer'];
            $address = $o['address-customer'];
            $total_bill = $o['price-total'];
            $status = $o['status'];
            // $payment_method = $o['payment-method'];

            if ($status == 1) {
                $edit = "Đã thanh toán";
            } else if ($status == 0) {
                $edit = "Chưa thanh toán";
            }
            $view = '<a href="index.php?controller=chome&action=admin&path=tour&page=detail&idTour=' . $idorder . '" class="a-view">Xem</a>';
            $row = [$stt, $tenkh, $phone, $email, $address, $total_bill, $edit,  $view];
            $data[] = $row;
        }
        echo json_encode($data);
    }
    public function loadTableOrdercp()
    {
        $order = $this->order->getAllOrder();
        $stt = 0;
        $data = [];
        foreach ($order as $o) {
            $stt++;
            $idorder = $o['idorder'];
            $tenkh = $o['name-customer'];
            $phone = $o['phone-customer'];
            $email = $o['email-customer'];
            $address = $o['address-customer'];
            $total_bill = $o['price-total'];
            $status = $o['status'];

            if ($status == 0) {
                $view = '<a href="index.php?controller=chome&action=company&path=donhang&page=detail&idorder=' . $idorder . '" class="a-view">Xem</a>';
                $edit = '<a href="" onclick="DuyetOrder(' . $idorder . ')">Duyệt đơn</a>';
                $delete = '<a href="" class = "a-delete" onclick="deleteTour(' . $idorder . ')">Hủy đơn</a>';
                $row = [$stt, $tenkh, $phone, $email, $address, $total_bill, $edit,  $view, $delete];
                $data[] = $row;
            } else if ($status == 1) {
                $view = '<a href="index.php?controller=chome&action=company&path=donhang&page=detail&idorder=' . $idorder . '" class="a-view">Xem</a>';
                $edit = '<a href="" onclick="DuyetOrder(' . $idorder . ')">Đã duyệt</a>';
                $delete = '<a href="" class = "a-delete" onclick="deleteTour(' . $idorder . ')">Hủy đơn</a>';
                $row = [$stt, $tenkh, $phone, $email, $address, $total_bill, $edit,  $view, $delete];
                $data[] = $row;
            }
        }
        echo json_encode($data);
    }

    public function duyetOrderByIdorder()
    {
        $idorder = $_POST['idorder'];
        $data = $this->order->duyetOrderByIdorder($idorder);
        echo $data;
    }
}
