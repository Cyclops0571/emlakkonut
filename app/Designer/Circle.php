<?php

namespace App\Designer;

use App\Model\Block;

class Circle
{
    public $id;
    public $title;
    public $x;
    public $y;
    public $tooltip_content;
    public $width;
    public $height;
    public $type;

    /**
     * Circle constructor.
     *
     * @param Block $block
     */
    public function __construct($block)
    {
        $this->id = 'block_' . $block->block_no;
        $this->type = 'oval';
        $this->title = $block->block_no;
        $this->x = 5;
        $this->y = 5;
        $this->width = 4;
        $this->height = 6;
        $this->actions = $this->getAction($block->clientUrl());
        $this->default_style = $this->getColor("#ff0000", 1);
        $this->tooltip_content = $this->tooltipContent("Blok - " .  $block->block_no);
    }

    public function getAction($link)
    {
        $obj = new \stdClass();
        $obj->mouseover = 'no-action';
        $obj->click = "follow-link";
        $obj->link = $link;

        return $obj;
    }

    public function getColor($color, $opacity)
    {
        $obj = new \stdClass();
        $obj->background_color = $color;
        $obj->background_opacity = $opacity;

        return $obj;
    }

    private function tooltipContent($content = '')
    {
        if (is_string($content)) {
            return $this->plainTextContent($content);
        }

        return new ContentBuilder($content);
    }

    private function plainTextContent($text)
    {
        $tooltipContent
            = '{
        "plain_text": "PLAIN_TEXT",
        "squares_settings": {
          "containers": [
            {
              "id": "sq-container-403761",
              "settings": {
                "elements": [
                  {
                    "settings": {
                      "name": "Paragraph",
                      "iconClass": "fa fa-paragraph"
                    }
                  }
                ]
              }
            }
          ]
        }
      }';

        return json_decode(str_replace('PLAIN_TEXT', $text, $tooltipContent));
    }
}
