<?php
class cadmin extends controller{
    public function diadiem()
    {
        return $this->viewadmin("diadiem", "list");
    }

}