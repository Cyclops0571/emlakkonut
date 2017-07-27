<?php


namespace App\Designer;


class ElementOption {

    public function __construct(HtmlObject $object,  HtmlLayout $layout)
    {
            $this->button = $object;
            $this->layout = $layout;
    }
}