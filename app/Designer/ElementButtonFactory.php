<?php


namespace App\Designer;


use App\Model\EstateProjectApartment;

class ElementButtonFactory {

    public $text;
    public $background;
    public $url;
    public $newTab;
    public $id;
    public $padding = 3;
    public $height = 1;

    public function __construct(EstateProjectApartment $apartment)
    {
        $this->id = 'apartment_' . $apartment->id;
        $this->text = $apartment->KapiNo;
        $this->url = $apartment->url();
        $this->background = $apartment->statusColor();
        $this->newTab = 1;
    }
    public function create()
    {
        $elementSetting = new ElementSetting();
        $butonObject = new ButonProperty($this);
        $htmlLayout = new HtmlLayout();
        $elementOption = new ElementOption($butonObject, $htmlLayout);
        return new Element($elementSetting, $elementOption);
    }
}