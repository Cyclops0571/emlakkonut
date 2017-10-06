<?php


namespace App\Designer;


class ElementOption {

    public function __construct(ButonProperty $object,  HtmlLayout $layout)
    {
            $this->button = $object;
            $this->layout = $layout;
    }
}