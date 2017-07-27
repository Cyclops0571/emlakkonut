<?php


namespace App\Designer;


class Element {

    public $settings;
    public $options;

    function __construct(ElementSetting $setting, ElementOption $option)
    {
        $this->settings = $setting;
        $this->options = $option;
    }
}