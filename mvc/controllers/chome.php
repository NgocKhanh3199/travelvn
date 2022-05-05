<?php
class chome extends controller{
    private $home;
    public function home()
    {
        return $this->view("layouts", "layout_home");
    }
}