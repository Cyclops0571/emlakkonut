<?php


namespace App\Designer;


class HtmlObject {

    public function __construct($text, $url = "", $newTab = 1, $bg_color = null)
    {
        $this->text = $text;
        $this->link_to = $url;
        $this->new_tab = $newTab;
        if($bg_color) {
            $this->bg_color = $bg_color;
        }
    }
}