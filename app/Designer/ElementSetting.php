<?php


namespace App\Designer;


class ElementSetting {

    public $name;
    public $iconClass;

    public function __construct($name = 'Buton', $iconClass = 'fa fa-link')
    {
        $this->name = $name;
        $this->iconClass = $iconClass;

    }
}