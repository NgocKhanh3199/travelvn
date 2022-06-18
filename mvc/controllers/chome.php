<?php
class chome extends controller{
    public function home()
    {
        return $this->view("", "home");
    }
    public function company()
    {
        return $this->view("congty", "index_company");
    }
    public function admin()
    {
        return $this->view("admin", "index_admin");
    }
    public function config()
    {
        return $this->view("", "config");
    }
    public function reset_pass()
    {
        return $this->view("account", "reset_pass");
    }
    public function detail_tour()
    {
        return $this->view("trangchu","detailtour");
    }
    public function order()
    {
        return $this->view("trangchu","oder");
    }
    public function vnpay()
    {
       return $this->view("","vn_pay");
    }
    public function returnthanhtoan()
    {
        return $this->view("","thanhtoan");
    }
}