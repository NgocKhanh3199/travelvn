<?php
class ccompany extends controller{
    public function loginpage()
    {
        return $this->view("congty", "login_company");
    }
    public function registerpage()
    {
        return $this->view("congty", "register_company");
    }
    public function donhang()
    {
        return $this->viewcongty("donhang", "list");
    }
}