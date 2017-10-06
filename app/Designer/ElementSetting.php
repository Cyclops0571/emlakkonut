<?php


namespace App\Designer;


class ElementSetting {

    public $name;
    public $iconClass;

    public function __construct($name = 'Button', $iconClass = 'fa fa-link')
    {
        $this->name = $name;
        $this->iconClass = $iconClass;

    }
}