<?php


namespace App\Designer;


class ElementButtonFactory {

    public $text;
    public $background;
    public $url;
    public $newTab;

    public function __construct($text, $url, $background, $newTab = 1)
    {

        if($text) {
            $this->text = $text;
        }

        if ($url) {
            $this->url = $url;
        }

        if($background) {
            $this->background = $background;
        }

        if ($newTab != null) {
            $this->newTab = $newTab;
        }

    }
    public function create()
    {
        $elementSetting = new ElementSetting();
        $htmlObject = new HtmlObject($this->text, $this->url, 1, $this->background);
        $htmlLayout = new HtmlLayout();
        $elementOption = new ElementOption($htmlObject, $htmlLayout);
        return new Element($elementSetting, $elementOption);
    }
}