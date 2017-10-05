<?php

namespace App\Designer;

class Circle
{


    public $id;
    public $title;
    public $x, $y;
    public $tooltip_content;
    public $width;
    public $height;
    public $type;


    public function __construct($blokId, $title, $content = '')
    {
        $this->id = uniqid("oval-");
        $this->type = 'oval';
        $this->title = $title;
        $this->x = 5;
        $this->y = 5;
        $this->width = 4;
        $this->height = 6;
        $this->actions = $this->getAction();
        $this->default_style = $this->getColor("#ff0000", 1);

        $this->tooltip_content = $this->tooltipContent($content);
    }

    public function getAction() {
        $obj = new \stdClass();
        $obj->mouseover = 'no-action';
        return $obj;
    }

    public function getColor($color, $opacity) {
        $obj = new \stdClass();
        $obj->background_color = $color;
        $obj->background_opacity = $opacity;
        return $obj;
    }

    private function tooltipContent($content = '')
    {
        if (is_string($content))
        {
            return $this->plainTextContent($content);
        } else {
            return new ContentBuilder($content);
        }
    }

    private function plainTextContent($text)
    {
        $tooltipContent = '{
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