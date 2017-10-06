<?php


namespace App\Designer;


class ButonProperty {

    public function __construct(ElementButtonFactory $buttonFactory)
    {
        $this->id = $buttonFactory->id;
        $this->text = $buttonFactory->text;
        $this->link_to = $buttonFactory->url;
        $this->new_tab = $buttonFactory->newTab;
        $this->bg_color = $buttonFactory->background;
        $this->padding = $buttonFactory->padding;
        $this->height = $buttonFactory->height;
    }
}